<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dtr;
use App\Employee;
use App\EmployeePay;
use App\PostedBatch;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Support\Facades\DB;


class PayrollController extends Controller
{
    public function index(){

        $processed_dtr = DB::table('employee_pays')
                            ->join('employee_profiles', 'employee_pays.emp_num', 'employee_profiles.emp_num')
                            ->select('employee_pays.cutoff_date', 'employee_profiles.store_assignment')
                            ->groupBy('employee_profiles.store_assignment')
                            ->get()
                            ->toArray();
        // dd($processed_dtr);

        // $processed_dtr = [];
        $cut_offs = [];
        if(empty($processed_dtr)){
            $dtrs = DB::table('dtrs')
                        ->select('cutoff_date')
                        ->groupBy('cutoff_date')
                        ->get()
                        ->toArray();
            $cut_offs = array_column($dtrs, 'cutoff_date');
            // dd($cut_offs);
        }else{
            $dtrs = DB::table('dtrs')
                        ->select('cutoff_date')
                        ->groupBy('cutoff_date')
                        ->get()
                        ->toArray();
            $cut_offs = array_column($dtrs, 'cutoff_date');
            // $cut_offs = $dtrs;
            // dd($cut_offs);

            $cutoff_processed_dtr_dates = array_column($processed_dtr, 'cutoff_date');
            // dd($cutoff_processed_dtr_dates);

            // Processed_stores
            $stores = [];
            for($i = 0; $i < count($processed_dtr); $i++){
                if($cutoff_processed_dtr_dates[$i] == $processed_dtr[$i]->cutoff_date)
                {
                    $stores[$processed_dtr[$i]->cutoff_date][] = $processed_dtr[$i]->store_assignment;
                }
            }
            // dd($stores);


            $cutoff_dates = [];
            foreach($stores as $cutoff_date => $store){
                // dd($store);
                // $store = ['SM Sta. Rosa', 'San Pedro United', 'Muntinlupa Bayan', 'SM Tunasan'];
                $not_processed_stores = DB::table('dtrs')
                                        ->join('employee_profiles', 'dtrs.emp_num', 'employee_profiles.emp_num')
                                        ->select('employee_profiles.store_assignment')
                                        ->whereNotIn('employee_profiles.store_assignment', $store)
                                        ->where('cutoff_date', $cutoff_date)
                                        ->groupBy('employee_profiles.store_assignment')
                                        ->get()
                                        ->toArray();
                // dd($not_processed_stores);

                // dd($cutoff_date);

                if(empty($not_processed_stores)){
                    if(in_array($cutoff_date, $cut_offs)){
                        $index = array_search($cutoff_date, $cut_offs);
                        unset($cut_offs[$index]);
                    }
                }
            }
        }
        // dd($cut_offs);

        if(count($cut_offs) > 0){
            return view('admin.payroll.index', compact('cut_offs'));
        }

        return view('admin.payroll.index');
    }

    public function fetchStores(Request $request){
        $data = $request->all();
        // dd($data);

        $processed_dtr = DB::table('employee_pays')
                            ->join('employee_profiles', 'employee_pays.emp_num', 'employee_profiles.emp_num')
                            ->select('employee_pays.cutoff_date', 'employee_profiles.store_assignment')
                            ->groupBy('employee_profiles.store_assignment')
                            ->where('employee_pays.cutoff_date', $data['cutoff_date'])
                            ->get()
                            ->toArray();
        // dd($processed_dtr);

        $stores = [];
        if(empty($processed_dtr)){
            $dtrs = DB::table('dtrs')
                        ->join('employee_profiles', 'dtrs.emp_num', 'employee_profiles.emp_num')
                        ->select('employee_profiles.store_assignment')
                        ->where('dtrs.cutoff_date', $data['cutoff_date'])
                        ->groupBy('employee_profiles.store_assignment')
                        ->get()
                        ->toArray();
            $stores = $dtrs;
        }else{

            $cutoff_processed_dtr_dates = array_column($processed_dtr, 'cutoff_date');
            // dd($cutoff_processed_dtr_dates);

            $processed_stores = [];
            for($i = 0; $i < count($processed_dtr); $i++){
                if($cutoff_processed_dtr_dates[$i] == $processed_dtr[$i]->cutoff_date)
                {
                    $processed_stores[$processed_dtr[$i]->cutoff_date][] = $processed_dtr[$i]->store_assignment;
                }
            }
            // dd($stores);

            $not_processed = [];
            foreach($processed_stores as $cutoff_date => $store){
                // dd($store);
                // $store = ['SM Sta. Rosa', 'San Pedro United', 'Muntinlupa Bayan', 'SM Tunasan'];
                $not_processed_stores = DB::table('dtrs')
                                        ->join('employee_profiles', 'dtrs.emp_num', 'employee_profiles.emp_num')
                                        ->select('employee_profiles.store_assignment')
                                        ->whereNotIn('employee_profiles.store_assignment', $store)
                                        ->where('cutoff_date', $cutoff_date)
                                        ->groupBy('employee_profiles.store_assignment')
                                        ->get()
                                        ->toArray();
                // dd($not_processed_stores);

                if(!(empty($not_processed_stores))){
                    foreach($not_processed_stores as $not_processed_store){
                        $not_processed[] = $not_processed_store;
                    }
                }
            }

            $stores = $not_processed;
        }

        return response()->json(array('stores' => $stores, 'cutoff_date'=> $data['cutoff_date']), 200);
    }

    public function processSummary(Request $request){
        // dd($request);

        $data = $request->validate([
            'stores'        => 'required',
            'cutoff_date'   => 'required',
        ]);

        $cutoff_date = $data['cutoff_date'];
        $stores = $data['stores'];
        // dd($stores);

        $employees = DB::table('dtrs')
                    ->join('employee_profiles', 'dtrs.emp_num', 'employee_profiles.emp_num')
                    ->where('cutoff_date', $cutoff_date)
                    ->whereIn('employee_profiles.store_assignment', $stores)
                    ->get();
        // dd($employees);

        // Employees who have wrong basic daily rate
        $wrongRate = [];
        foreach($employees as $employee){
            if($employee->basic_pay > 537)
                $wrongRate[] = $employee->emp_num;
        }
        // dd($wrongRate);

        // Employees pay
        $empPay = $this->computePay($employees);
        // dd($empPay);

        // Employees net pay
        $nets = array_column($empPay, 'net_pay', 'emp_num');
        // dd($nets);

        // Employees who have net pay that is greater than 10,000
        $moreThanTen = [];
        foreach($nets as $index => $net){
            if($net > 10000)
                $moreThanTen[] = $index;
        }
        // dd($moreThanTen);

        // Employees who have no sss contrib
        $emptySSS = $this->checkEmptyContribution($empPay, 'sss');
        // dd($emptySSS);

        // Employees who have no philhealth contrib
        $emptyPhilhealth = $this->checkEmptyContribution($empPay, 'philhealth');
        // dd($emptyPhilhealth);

        // Employees who have no pagibig contrib
        $emptyPagibig = $this->checkEmptyContribution($empPay, 'pagibig');
        // dd($emptyPagibig);

        // $wrongRate = [2323,131];
        // $moreThanTen = [];
        // $emptySSS = [154,642];
        // $emptyPhilhealth = [4541];
        // $emptyPagibig = [33232,13];

        if(!(count($wrongRate)  > 0)
            // AND !(count($moreThanTen) > 0)
            AND !(count($emptySSS) > 0) AND !(count($emptyPhilhealth) > 0)
            AND !(count($emptyPagibig) > 0))
        {
            foreach($empPay as $pay){
                $employee = EmployeePay::where('emp_num', $pay['emp_num'])
                                        ->where('cutoff_date', $pay['cutoff_date'])
                                        ->get();
                // dd($employee);
                if(!(count($employee) > 0)){
                    $employee_pay = EmployeePay::create($pay);
                }
                // $special = EmployeePay::create($pay);
            }
            // dd($cutoff_date);

            return view('admin.payroll.payroll_summary', compact('empPay', 'cutoff_date', 'stores'));
        }

        // dd('hello');
        return view('admin.payroll.payroll_summary', compact('empPay', 'cutoff_date', 'stores', 'emptySSS', 'emptyPhilhealth', 'emptyPagibig', 'wrongRate', 'moreThanTen'));
    }

    public function dtrPayrollSummary(Request $request){
        // dd($request);
        $validate_store = $request->validate_store;
        // dd($validate_store);

        $payroll_summary = DB::table('employee_pays')
                                ->join('employee_profiles', 'employee_pays.emp_num', 'employee_profiles.emp_num')
                                ->select('employee_profiles.store_assignment',
                                        DB::raw('count(employee_pays.emp_num) as headcount'),
                                        DB::raw('sum(employee_pays.basic_pay) as basic_pay'),
                                        'employee_pays.cutoff_date')
                                ->whereIn('employee_profiles.store_assignment', $validate_store)
                                ->groupBy('employee_profiles.store_assignment')
                                ->get()
                                ->toArray();
        // dd($payroll_summary);

        $stores = array_column($payroll_summary, 'store_assignment');
        // dd($stores);

        $payroll_emp = DB::table('employee_pays')
                            ->join('employee_profiles', 'employee_pays.emp_num', 'employee_profiles.emp_num')
                            ->select('employee_pays.emp_num', 'employee_profiles.store_assignment')
                            ->whereIn('employee_profiles.store_assignment', $stores)
                            ->get()
                            ->toArray();
        // dd($payroll_emp);

        $pay_emp_num = array_column($payroll_emp, 'emp_num');
        // dd($pay_emp_num);

        $cutoff_date = $payroll_summary[0]->cutoff_date;
        // dd($cutoff_date);

        $dtr_employees = DB::table('dtrs')
                            ->select('employee_profiles.store_assignment',
                                    DB::raw('count(dtrs.emp_num) as headcount'),
                                    DB::raw('sum(dtrs.reg_hours) as reg_hours'),
                                    DB::raw('sum(dtrs.late_mins) as late_mins'),
                                    'employee_profiles.basic_pay')
                            ->join('employee_profiles', 'dtrs.emp_num', 'employee_profiles.emp_num')
                            ->whereIn('dtrs.emp_num', $pay_emp_num)
                            ->where('dtrs.cutoff_date', $cutoff_date)
                            ->groupBy('employee_profiles.store_assignment')
                            ->get()
                            ->toArray();
        // dd($dtr_employees);

        $dtr_summary = [];
        foreach($dtr_employees as $index => $dtr){
            // dd($dtr);
            $dtr_summary[$index]['store_assignment'] = $dtr->store_assignment;
            $dtr_summary[$index]['headcount'] = $dtr->headcount;
            $rate = $dtr->basic_pay/8;
            $dtr_summary[$index]['basic_pay'] = round(($rate * $dtr->reg_hours), 2) - round(($rate * ($dtr->late_mins / 60)), 2);
        }
        // dd($dtr_summary);

        $batch = $this->generateBatchNumber();

        return view('admin.payroll.dtr_payroll_summary', compact('payroll_summary', 'dtr_summary', 'stores', 'cutoff_date', 'batch'));
    }

    public function generateBatchNumber(){
        $suffix = '2020';
        $letters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $small_letters = 'abcdefghijklmnopqrstuvwxyz';
        $number = rand(10000,99999);

        $string = $letters[rand(0,25)] . $small_letters[rand(0,25)] . $letters[rand(0,25)] . $small_letters[rand(0,25)];

        return $string . $number . $suffix;
    }

    public function showProcessedInfo(Request $request){
        // dd($request);

        $r_processed_store = $request->processed_store;
        // dd($processed_store);

        $r_batch_number = $request->batch_number;
        // dd($batch_number);

        $r_cutoff_date = $request->cutoff_date;
        // dd($cutoff_date);

        // $posted_batches = DB::table('posted_batches')
        //                     ->where('cutoff_date', $r_cutoff_date)
        //                     ->get()
        //                     ->toArray();
        // // dd($posted_batches[0]->stores);

        // $cutoff_posted_stores = [];
        // foreach($posted_batches as $batch)
        // {
        //     $stores = explode("; ", $batch->stores);
        //     // dd($stores);
        //     $cutoff_posted_stores[$batch->cutoff_date] = [];
        //     // dd($cutoff_date_stores[$batch->cutoff_date]);

        //     foreach($stores as $store){
        //         array_push($cutoff_posted_stores[$batch->cutoff_date], $store);
        //     }
        //     // array_push($cutoff_date_stores[$batch->cutoff_date], $stores);
        // }
        // // dd($cutoff_posted_stores);


        $employee_pays = DB::table('employee_pays')
                            ->join('employee_profiles', 'employee_pays.emp_num', 'employee_profiles.emp_num')
                            ->select('employee_pays.cutoff_date', 'employee_profiles.store_assignment')
                            ->whereNotIn('employee_profiles.store_assignment', $r_cutoff_date)
                            ->groupBy('employee_profiles.store_assignment')
                            ->get();
        dd($employee_pays);




        /* Not yet done
            =============================
        */

        $batches = DB::table('posted_batches')
                    ->select('stores', 'cutoff_date')
                    ->get()
                    ->toArray();
        // dd($batches);

        $cutoff_dates = array_unique(array_column($batches, 'cutoff_date'));
        // dd($cutoff_dates);

        $cutoffs = [];
        foreach($batches as $batch){
            $batch->stores = explode('; ', $batch->stores);
            $cutoffs[$batch->cutoff_date][] = $batch->stores;
        }
        // dd($cutoffs);

        /*
            ==============================
        */

        $cut_offs = DB::table('employee_pays')
                    ->select('cutoff_date')
                    ->whereNotIn('cutoff_date', $cutoff_dates)
                    ->groupBy('cutoff_date')
                    ->get()
                    ->toArray();
        // dd($cut_offs);

        $processed_store = implode("; ", $processed_store);

        return view('admin.payroll.processed_info', compact('cut_offs', 'batch_number', 'cutoffs', 'processed_store'));
    }

    public function fetchProcessedStores(Request $request){
        $data = $request->all();
        // dd($data);

        $stores = DB::table('employee_pays')
                    ->join('employee_profiles', 'employee_pays.emp_num', 'employee_profiles.emp_num')
                    ->select('employee_profiles.store_assignment')
                    ->groupBy('employee_profiles.store_assignment')
                    ->get();

        return response()->json(array('stores'=> $stores, 'data' => $data), 200);
    }

    public function postBatch(Request $request){
        // dd($request);
        $data = $request->all();
        // dd($data);
        $stores = $data['stores'];
        $store = implode("; ", $stores);
        // dd($store);
        $batch = new PostedBatch();
        $batch->stores = $store;
        $batch->cutoff_date = $data['cutoff_date'];
        // dd($batch->cutoff_date);
        $batch->batch_number = $data['batch_number'];
        // $batch->stores = $store
        $batch->save();

        toastr()->success('Batch posted successfully!');
        return redirect()->route('payroll.admin');
    }

    public function checkSSS($gross){
        $range_min = 19750;
        $ee = 800;
        while(!($gross >= $range_min)){
            $range_min = $range_min - 500;
            $ee = $ee - 20;
        }

        return $ee;
    }

    public function checkPhilHealth($basic){
        $year = date('Y');
        // $year = 2024;
        if($year == 2020){
            if($basic > 60000)
                $contribution = 1800/2;

            if($basic >= 10000 AND $basic < 60000)
                $contribution = ($basic * .03) / 2;

            if($basic <= 10000)
                $contribution = 300/2;
        }

        if($year == 2021){
            if($basic > 70000)
                $contribution = 2450/2;

            if($basic >= 10000 AND $basic < 70000)
                $contribution = ($basic * .035) / 2;

            if($basic <= 10000)
                $contribution = 350/2;
        }

        if($year == 2022){
            if($basic > 80000)
                $contribution = 3200/2;

            if($basic >= 10000 AND $basic < 80000)
                $contribution = ($basic * .04) / 2;

            if($basic <= 10000)
                $contribution = 400/2;
        }

        if($year == 2023){
            if($basic > 90000)
                $contribution = 4050/2;

            if($basic >= 10000 AND $basic < 90000)
                $contribution = ($basic * .045) / 2;

            if($basic <= 10000)
                $contribution = 450/2;
        }

        if($year > 2023){
            if($basic > 100000)
                $contribution = 5000/2;

            if($basic >= 10000 AND $basic < 100000)
                $contribution = ($basic * .05) / 2;

            if($basic <= 10000)
                $contribution = 500/2;
        }

        return $contribution;
    }

    public function checkPagIbig($basic){
        // if($basic == )
        if($basic <= 1500)
            return $basic * .01;

        if($basic > 1500)
            $contribution = $basic * .02;
            if($contribution > 100)
                return 100;

            return $contribution;
    }

    public function computePay($employees){
        $empPay = [];
        foreach($employees as $index => $employee){
            $basic = $employee->basic_pay;

            $rate = $basic/8;
            $reg = $employee->reg_hours * $rate;
            $late = $employee->late_mins/60 * $rate;
            $reg_ot = (($basic * 1.25)/8) * $employee->reg_ot;
            $nd = (($basic*.1)/8) * $employee->nd;
            $nd_ot = (($basic*.125)/8) * $employee->nd_ot;
            $rest = (($basic * 1.3)/8) * $employee->rest;
            $rest_ot = (($basic * 1.69)/8) * $employee->rest_ot;
            $nd_rest = (($basic * .13)/8) * $employee->nd_rest;
            $nd_rest_ot = (($basic * .169)/8) * $employee->nd_rest_ot;
            $legal_hol = (($basic * 2)/8) * $employee->legal_hol;
            $legal_hol_ot = (($basic * 2.6)/8) * $employee->legal_hol_ot;
            $nd_legal_hol = (($basic * .2)/8) * $employee->nd_legal_hol;
            $nd_legal_hol_ot = (($basic * .26)/8) * $employee->nd_legal_hol_ot;
            $rest_legal_hol = (($basic * 2.6)/8) * $employee->rest_legal_hol;
            $rest_legal_hol_ot = (($basic * 3.38)/8) * $employee->rest_legal_hol_ot;
            $nd_rest_legal_hol = (($basic * .26)/8) * $employee->nd_rest_legal_hol;
            $nd_rest_legal_hol_ot = (($basic * .338)/8) * $employee->nd_rest_legal_hol_ot;
            $spl_hol = (($basic * 1.3)/8) * $employee->spl_hol;
            $spl_hol_ot = (($basic * 1.69)/8) * $employee->spl_hol_ot;
            $nd_spl_hol = (($basic * .13)/8) * $employee->nd_spl_hol;
            $nd_spl_hol_ot = (($basic * .169)/8) * $employee->nd_spl_hol_ot;
            $rest_spl_hol = (($basic * 1.5)/8) * $employee->rest_spl_hol;
            $rest_spl_hol_ot = (($basic * 1.95)/8) * $employee->rest_spl_hol_ot;
            $nd_rest_spl_hol = (($basic * .15)/8) * $employee->nd_rest_spl_hol;
            $nd_rest_spl_hol_ot = (($basic * .195)/8) * $employee->nd_rest_spl_hol_ot;

            $gross_pay = ($reg + $reg_ot + $nd + $nd_ot + $rest + $rest_ot + $nd_rest + $nd_rest_ot +
                        $legal_hol + $legal_hol_ot + $nd_legal_hol + $nd_legal_hol_ot + $rest_legal_hol +
                        $rest_legal_hol_ot + $nd_rest_legal_hol + $nd_rest_legal_hol_ot + $spl_hol +
                        $spl_hol_ot + $nd_spl_hol + $nd_spl_hol_ot + $rest_spl_hol + $rest_spl_hol_ot +
                        $nd_rest_spl_hol + $nd_rest_spl_hol_ot) - $late;

            $basic_pay = $reg - $late;

            // $gross_pay = 2249; // For testing checkSSS function
            $sss = $this->checkSSS($gross_pay);

            // $basic_pay = 1200000.01;
            $philhealth = $this->checkPhilHealth($basic_pay);

            // $basic_pay = 4999;
            $pagibig = $this->checkPagIbig($basic_pay);

            $net_pay = $gross_pay - ($sss + $philhealth + $pagibig);

            $empPay[$index]['emp_num'] = $employee->emp_num;
            $empPay[$index]['reg_hours'] = $reg;
            $empPay[$index]['late'] = $late;
            $empPay[$index]['reg_ot'] = $reg_ot;
            $empPay[$index]['nd'] = $nd;
            $empPay[$index]['nd_ot'] = $nd_ot;
            $empPay[$index]['rest'] = $rest;
            $empPay[$index]['rest_ot'] = $rest_ot;
            $empPay[$index]['nd_rest'] = $nd_rest;
            $empPay[$index]['nd_rest_ot'] = $nd_rest_ot;
            $empPay[$index]['legal_hol'] = $legal_hol;
            $empPay[$index]['legal_hol_ot'] = $legal_hol_ot;
            $empPay[$index]['nd_legal_hol'] = $nd_legal_hol;
            $empPay[$index]['nd_legal_hol_ot'] = $nd_legal_hol_ot;
            $empPay[$index]['rest_legal_hol'] = $rest_legal_hol;
            $empPay[$index]['rest_legal_hol_ot'] = $rest_legal_hol_ot;
            $empPay[$index]['nd_rest_legal_hol'] = $nd_rest_legal_hol;
            $empPay[$index]['nd_rest_legal_hol_ot'] = $nd_rest_legal_hol_ot;
            $empPay[$index]['spl_hol'] = $spl_hol;
            $empPay[$index]['spl_hol_ot'] = $spl_hol_ot;
            $empPay[$index]['nd_spl_hol'] = $nd_spl_hol;
            $empPay[$index]['nd_spl_hol_ot'] = $nd_spl_hol_ot;
            $empPay[$index]['rest_spl_hol'] = $rest_spl_hol;
            $empPay[$index]['rest_spl_hol_ot'] = $rest_spl_hol_ot;
            $empPay[$index]['nd_rest_spl_hol'] = $nd_rest_spl_hol;
            $empPay[$index]['nd_rest_spl_hol_ot'] = $nd_rest_spl_hol_ot;
            $empPay[$index]['basic_pay'] = $basic_pay;
            $empPay[$index]['gross_pay'] = $gross_pay;
            $empPay[$index]['sss'] = $sss;
            $empPay[$index]['philhealth'] = $philhealth;
            $empPay[$index]['pagibig'] = $pagibig;
            $empPay[$index]['net_pay'] = $net_pay;
            $empPay[$index]['cutoff_date'] = $employee->cutoff_date;
        }

        // dd($empPay);
        return $empPay;
    }

    public function checkEmptyContribution($arr, $column){
        $zeroContributions = [];
        $contributions = array_column($arr, $column, 'emp_num');
        foreach($contributions as $key => $contribution){
            if(!($contribution > 0))
                $zeroContributions[] = $key;
        }
        return $zeroContributions;
    }

}
