<?php

namespace App\Http\Controllers;

use App\Dtr;
use App\CsvData;
use App\Employee;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use App\Http\Requests\CsvImportRequest;

use DB;

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
            $csv_header_fields = [];
            foreach ($data[0] as $key => $value) {
                $csv_header_fields[] = $key;
            }

            $csv_data = array_slice($data, 0, 3);

            $csv_data = array_slice($data, 1);

            $csv_data_file = CsvData::create([
                'csv_filename' => $request->file('csv_file')->getClientOriginalName(),
                'csv_header' => $request->has('header'),
                'csv_data' => json_encode($data)
            ]);
        } else {
            return redirect()->back();
        }
        return view('admin.dtr.index', compact('csv_header_fields', 'csv_data', 'csv_data_file'));
    }

    public function processImport(Request $request)
    {
        // get CSV JSON data from database
        $data = CsvData::find($request->csv_data_file_id);

        // Decode CSV data using json_decode
        $csv_data = json_decode($data->csv_data, true);

        // Remove first row from the array
        $csv_data = array_slice($csv_data, 1);
        // dd($csv_data);

        // Get total number of row of $csv_data
        $emp_nums = array_map(static function ($array) {
            return $array[0];
        }, $csv_data);
        // dd($emp_nums);

        // Get result
        $employee = Employee::whereIn('emp_num', $emp_nums)->orderBy('emp_num', 'asc')->get()->toArray();
        $results = $employee;
        // dd($results);

        $results_emp_num = array_map(static function ($array) {
            return $array['emp_num'];
        }, $results);
        // dd($results_emp_num);

        $not_matched = array_diff($emp_nums, $results_emp_num);
        // dd($not_matched);

        $request->fields = array_flip($request->fields);
        foreach ($csv_data as $row) {
            if (!(Dtr::where('emp_num', $row[0])->first())) {
                // Create new Dtr model
                $dtr = new Dtr();
                foreach (config('app.db_fields') as $index => $field) {
                    $dtr->$field = $row[$request->fields[$field]];
                }
                // Save to database
                $dtr->save();
            }
        }

        $csv = DB::table('dtrs')
            ->join('employees', 'dtrs.emp_num', '=', 'employees.emp_num')
            ->select('dtrs.emp_num', 'dtrs.last_name', 'dtrs.first_name', 'dtrs.middle_name')
            ->whereIn('dtrs.emp_num', $emp_nums)
            ->orderBy('dtrs.emp_num', 'asc')
            ->get()->toArray();
        // dd($csv);

        // CSV data that is not found on database
        $csv_nf = DB::table('dtrs')->select('emp_num', 'last_name', 'first_name', 'middle_name')
            ->whereIn('emp_num', $not_matched)
            ->get();
        // dd($csv_nf);

        $dt = [];
        if (!empty($csv)) {
            for ($i = 0; $i < count($csv); $i++) {
                $dt[$i][0] = ($csv[$i]->emp_num == $results[$i]['emp_num']) ? 1 : 0;
                $dt[$i][1] = ($csv[$i]->last_name == $results[$i]['last_name']) ? 1 : 0;
                $dt[$i][2] = ($csv[$i]->first_name == $results[$i]['first_name']) ? 1 : 0;
                $dt[$i][3] = ($csv[$i]->middle_name == $results[$i]['middle_name']) ? 1 : 0;
            }
        }

        return view('admin.dtr.import_process', compact('csv_data', 'results', 'csv', 'dt', 'csv_nf'));
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
