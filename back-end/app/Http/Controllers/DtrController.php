<?php

namespace App\Http\Controllers;

use App\Dtr;
use App\CsvData;
use App\Employee;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use App\Http\Requests\CsvImportRequest;
use Illuminate\Support\Facades\DB;
use PDO;
use Yoeunes\Toastr\Facades\Toastr;

class DtrController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.dtr.index');
    }

    // Parse CSV Import and send back data to dtr/index.blade.php
    public function parseImport(CsvImportRequest $request)
    {

        $path = $request->file('csv_file')->getPathName();
        $data = Excel::toArray(new CsvImportRequest, request()->file('csv_file'))[0];
        $csv_data = array_slice($data, 1);
        if (!(array_column($csv_data, 0) === [])) {

            $csv_data_file = CsvData::create([
                'csv_filename' => $request->file('csv_file')->getClientOriginalName(),
                'csv_data' => json_encode($data)
            ]);
        } else {
            $errors = 'Empty csv file';
            return redirect()->back() ;
        }
        return view('admin.dtr.index', compact('csv_data', 'csv_data_file'));
    }

    public function processImport(Request $request)
    {
        // get CSV JSON data from database
        $data = CsvData::find($request->csv_data_file_id);

        $csv_filename = $data['csv_filename'];

        // Decode CSV data using json_decode
        $csv_data = json_decode($data->csv_data, true);

        // Remove first row from the array
        $csv_data = array_slice($csv_data, 1);

        // Get all emp_num of $csv_data
        $emp_nums = array_column($csv_data, 0);
        // dd($emp_nums);


        // Duplicate emp_num
        $duplicate = [];
        foreach(array_count_values($emp_nums) as $emp_num => $count)
            if($count > 1)
                $duplicate[] = $emp_num;
        // dd($duplicate);


        // Indexes of duplicate emp_num
        $dup_index = [];
        foreach($duplicate as $dup){
            // make emp_num as index
            $dup_index[$dup] = array_keys($emp_nums, $dup);
        }
        // dd($dup_index);


        // Get data from database
        $employees = Employee::with('employeeprofile:emp_num,employment_status')
                            ->select('emp_num', 'last_name', 'first_name', 'middle_name')
                            ->whereIn('emp_num', $emp_nums)
                            ->orderBy('emp_num', 'asc')
                            ->get()
                            ->toArray();
        $results = $employees;
        // dd($results);


        // Emp_num of results from db
        $results_emp_num = array_column($results, 'emp_num');
        // dd($results_emp_num);


        // Emp_num not found in the database
        $not_matched = array_diff($emp_nums, $results_emp_num);
        // dd($not_matched);



        // Emp_num that is blacklisted, inactive, or resigned
        $inactive = [];
        foreach($results as $result){
            if($result['employeeprofile']['employment_status'] != 'Active'){
                $inactive[] = $result['emp_num'];
            }
        }
        // dd($inactive);



        $wrong_last_name = [];
        $wrong_first_name = [];
        $wrong_middle_name = [];

        $zero_manhour = [];

        foreach($results as $result){
            foreach($csv_data as $csv_datum){
                if($result['emp_num'] == $csv_datum[0]){

                    // Get emp_num of wrong last name
                    if($result['last_name'] !== $csv_datum[1]){
                        $wrong_last_name[] = $csv_datum[0];
                    }

                    // Get emp_num of wrong first name
                    if($result['first_name'] !== $csv_datum[2]){
                        $wrong_first_name[] = $csv_datum[0];
                    }

                    // Get emp_num of wrong middle name
                    if($result['middle_name'] !== $csv_datum[3]){
                        $wrong_middle_name[] = $csv_datum[0];
                    }

                    // Get emp_num of zero manhour
                    $manhour = array_sum(array_slice($csv_datum, 4));
                    if(!$manhour > 0){
                        $zero_manhour[] = $csv_datum[0];
                    }
                }
            }
        }

        // dd($wrong_last_name);
        // dd($wrong_first_name);
        // dd($wrong_middle_name);
        // dd($zero_manhour);


        // If there's an error. Go to import_error.blade.php
        if(count($duplicate) > 0 ||
           count($not_matched) > 0 ||
           count($inactive) > 0 ||
           count($wrong_last_name) > 0 ||
           count($wrong_first_name) > 0 ||
           count($wrong_middle_name) > 0 ||
           count($zero_manhour) > 0)
        {
           // Return error view
           return view('admin.dtr.import_error', compact('csv_data', 'csv_filename', 'dup_index', 'not_matched', 'inactive',
            'wrong_last_name', 'wrong_first_name', 'wrong_middle_name','zero_manhour'));
        }

        $csv_file_id = $data->id;
        // return view('admin.dtr.import_process', compact('csv_data', 'results', 'csv', 'dt', 'csv_nf'));
        toastr()->success('There\'s no error in the data uploaded');
        return view('admin.dtr.import_process', compact('csv_data', 'csv_filename', 'emp_num', 'csv_file_id'));
    }

    public function saveCutOffPeriod(Request $request){
        // get CSV JSON data from database
        $data = CsvData::find($request->csv_data_file_id);

        // Decode CSV data using json_decode
        $csv_data = json_decode($data->csv_data, true);

        // Remove first row from the array
        $csv_data = array_slice($csv_data, 1);

        // Get cutoff_date
        $cutoff_date = $request->cutoff_date;

        // $request->fields = array_flip($request->fields);
        foreach ($csv_data as $row) {
            // Create new Dtr model
            if (!(Dtr::where('emp_num', $row[0])
                        ->where('cutoff_date', $cutoff_date)
                        ->first()))
            {
                $dtr = new Dtr();
                foreach (config('app.db_fields') as $index => $field) {
                    $dtr->$field = $row[$index];
                }
                $dtr->cutoff_date = $cutoff_date;
                // Save to database
                $dtr->save();
            }
        }

        $dtr_summary = DB::table('dtrs')
                        // ->join('employees', 'dtrs.emp_num', 'employees.emp_num')
                        ->join('employee_profiles', 'dtrs.emp_num', 'employee_profiles.emp_num')
                        ->select(DB::raw('count(dtrs.emp_num) as head_count'),
                                DB::raw('sum(dtrs.reg_hours) as reg_hours'),
                                DB::raw('sum(dtrs.late_mins) as late'),
                                DB::raw('sum(dtrs.reg_ot) as reg_ot'),
                                DB::raw('sum(dtrs.rest) as rest'),
                                DB::raw('sum(dtrs.rest_ot) as rest_ot'),
                                DB::raw('sum(dtrs.legal_hol) as hol'),
                                DB::raw('sum(dtrs.legal_hol_ot) as hol_ot'),
                                DB::raw('sum(dtrs.rest_legal_hol) as rest_hol'),
                                DB::raw('sum(dtrs.rest_legal_hol_ot) as rest_hol_ot'),
                                DB::raw('sum(dtrs.spl_hol) as spl_hol'),
                                DB::raw('sum(dtrs.spl_hol_ot) as spl_hol_ot'),
                                DB::raw('sum(dtrs.rest_spl_hol) as rest_spl'),
                                DB::raw('sum(dtrs.rest_spl_hol_ot) as rest_spl_ot'),
                                DB::raw('sum(dtrs.nd) as nd'),
                                DB::raw('sum(dtrs.nd_ot) as nd_ot'),
                                DB::raw('sum(dtrs.nd_rest) as nd_rest'),
                                DB::raw('sum(dtrs.nd_rest_ot) as nd_rest_ot'),
                                DB::raw('sum(dtrs.nd_legal_hol) as nd_hol'),
                                DB::raw('sum(dtrs.nd_legal_hol_ot) as nd_hol_ot'),
                                DB::raw('sum(dtrs.nd_rest_legal_hol) as nd_rest_hol'),
                                DB::raw('sum(dtrs.nd_rest_legal_hol_ot) as nd_rest_hol_ot'),
                                DB::raw('sum(dtrs.nd_spl_hol) as nd_spl_hol'),
                                DB::raw('sum(dtrs.nd_spl_hol_ot) as nd_spl_hol_ot'),
                                DB::raw('sum(dtrs.nd_rest_spl_hol) as nd_rest_spl'),
                                DB::raw('sum(dtrs.nd_rest_spl_hol_ot) as nd_rest_spl_ot'),
                                'employee_profiles.store_assignment' , 'dtrs.cutoff_date')
                        ->where('dtrs.cutoff_date', $cutoff_date)
                        ->groupBy('employee_profiles.store_assignment')
                        ->get();

        $grand_total = DB::table('dtrs')
                    // ->join('employees', 'dtrs.emp_num', 'employees.emp_num')
                    ->join('employee_profiles', 'dtrs.emp_num', 'employee_profiles.emp_num')
                    ->select(DB::raw('count(dtrs.emp_num) as head_count'),
                            DB::raw('sum(dtrs.reg_hours) as reg_hours'),
                            DB::raw('sum(dtrs.late_mins) as late'),
                            DB::raw('sum(dtrs.reg_ot) as reg_ot'),
                            DB::raw('sum(dtrs.rest) as rest'),
                            DB::raw('sum(dtrs.rest_ot) as rest_ot'),
                            DB::raw('sum(dtrs.legal_hol) as hol'),
                            DB::raw('sum(dtrs.legal_hol_ot) as hol_ot'),
                            DB::raw('sum(dtrs.rest_legal_hol) as rest_hol'),
                            DB::raw('sum(dtrs.rest_legal_hol_ot) as rest_hol_ot'),
                            DB::raw('sum(dtrs.spl_hol) as spl_hol'),
                            DB::raw('sum(dtrs.spl_hol_ot) as spl_hol_ot'),
                            DB::raw('sum(dtrs.rest_spl_hol) as rest_spl'),
                            DB::raw('sum(dtrs.rest_spl_hol_ot) as rest_spl_ot'),
                            DB::raw('sum(dtrs.nd) as nd'),
                            DB::raw('sum(dtrs.nd_ot) as nd_ot'),
                            DB::raw('sum(dtrs.nd_rest) as nd_rest'),
                            DB::raw('sum(dtrs.nd_rest_ot) as nd_rest_ot'),
                            DB::raw('sum(dtrs.nd_legal_hol) as nd_hol'),
                            DB::raw('sum(dtrs.nd_legal_hol_ot) as nd_hol_ot'),
                            DB::raw('sum(dtrs.nd_rest_legal_hol) as nd_rest_hol'),
                            DB::raw('sum(dtrs.nd_rest_legal_hol_ot) as nd_rest_hol_ot'),
                            DB::raw('sum(dtrs.nd_spl_hol) as nd_spl_hol'),
                            DB::raw('sum(dtrs.nd_spl_hol_ot) as nd_spl_hol_ot'),
                            DB::raw('sum(dtrs.nd_rest_spl_hol) as nd_rest_spl'),
                            DB::raw('sum(dtrs.nd_rest_spl_hol_ot) as nd_rest_spl_ot'),
                            'employee_profiles.store_assignment' , 'dtrs.cutoff_date')
                    ->where('dtrs.cutoff_date', $cutoff_date)
                    ->get();
        // dd($dtr_summary);
        // dd($dtr_summary[0]->store_assignment);
        // dd($grand_total);

        toastr()->success('Cutoff-period saved!');
        return view('admin.dtr.dtr_summary', compact('dtr_summary', 'cutoff_date', 'grand_total'));
    }

    public function deleteDtrs(Request $request){
        $data = $request->validate([
            'cutoff_date' => 'date|required'
        ]);

        $cutoff_date = $data['cutoff_date'];

        $delete_dtrs = DB::table('dtrs')
                        ->where('cutoff_date', $cutoff_date)
                        ->delete();

        return response()->json(array('cutoff_date'=> $data['cutoff_date']), 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Dtr  $dtr
     * @return \Illuminate\Http\Response
     */
    public function show(Dtr $dtr)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Dtr  $dtr
     * @return \Illuminate\Http\Response
     */
    public function edit(Dtr $dtr)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Dtr  $dtr
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dtr $dtr)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Dtr  $dtr
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dtr $dtr)
    {
        //
    }
}
