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

        if (count($data) > 0) {
            $csv_data = array_slice($data, 1);

            $csv_data_file = CsvData::create([
                'csv_filename' => $request->file('csv_file')->getClientOriginalName(),
                'csv_data' => json_encode($data)
            ]);
        } else {
            return redirect()->back();
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
        $wrong_last_name = [];

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
           count($inactive > 0) ||
           count($wrong_last_name) > 0 ||
           count($wrong_first_name) > 0 ||
           count($wrong_middle_name) > 0 ||
           count($zero_manhour) > 0)
        {
           // Return error view
           return view('admin.dtr.import_error', compact('csv_data', 'csv_filename', 'dup_index', 'not_matched', 'inactive',
            'wrong_last_name', 'wrong_first_name', 'wrong_middle_name','zero_manhour'));
        }



        $request->fields = array_flip($request->fields);
        foreach ($csv_data as $row) {
            if (!(Dtr::where('emp_num', $row[0])->first())) {
                // Create new Dtr model
                $dtr = new Dtr();
                foreach (config('app.db_fields') as $index => $field) {
                    $dtr->$field = $row[$index];
                }
                // Save to database
                $dtr->save();
            }
        }


        // return view('admin.dtr.import_process', compact('csv_data', 'results', 'csv', 'dt', 'csv_nf'));

        return view('admin.dtr.import_process', compact('csv_data'));
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
