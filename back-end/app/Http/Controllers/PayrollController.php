<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dtr;
use App\Employee;
use App\PostedPeriod;
use Illuminate\Support\Facades\DB;


class PayrollController extends Controller
{
    public function index()
    {
        $cutoff_date = PostedPeriod::select('cutoff_date')->get();
        // dd($cutoff_date);

        $cut_offs = DB::table('dtrs')
                        ->whereNotIn('cutoff_date', $cutoff_date)
                        ->groupBy('cutoff_date')
                        ->get();
        // dd($cut_offs);
        if(count($cut_offs) > 0){
            return view('admin.payroll.index', compact('cut_offs'));
        }

        return view('admin.payroll.index');
    }

    public function showStores(Request $request){
        $data = $request->all();
        // dd($data);

        $dtrs = DB::table('dtrs')
                    ->where('cutoff_date', $data['cutoff_date'])
                    ->get()
                    ->toArray();
        // dd($dtrs);

        $dtrs_emp_num = array_column($dtrs, 'emp_num');
        // dd($dtrs_emp_num);

        $stores = DB::table('employees')
                    ->join('employee_profiles', 'employees.emp_num', 'employee_profiles.emp_num')
                    ->whereIn('employees.emp_num', $dtrs_emp_num)
                    ->select('employees.emp_num', 'employee_profiles.store_assignment')
                    ->groupBy('employee_profiles.store_assignment')
                    ->get();
        // dd($stores);

        return response()->json(array('stores'=> $stores, 'cutoff_date'=> $data['cutoff_date']), 200);
    }

    public function processSummary(Request $request){
        $data = $request->validate([
            'stores'        => 'required',
            'cutoff_date'   => 'required',
        ]);

        dd($data);

        // $summary = DB::table('dtrs')
        //             ->where('cutoff_date', $data['cutoff_date'])
        //             ->get();

        // $stores = DB::table('employees')
        //             ->join('employee_profiles', 'employees.emp_num', 'employee_profiles.emp_num')
        //             ->whereIn('employees.emp_num', $dtrs_emp_num)
        //             ->select('employees.emp_num', 'employee_profiles.store_assignment')
        //             ->groupBy('employee_profiles.store_assignment')
        //             ->get();
    }
}
