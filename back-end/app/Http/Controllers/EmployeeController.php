<?php

namespace App\Http\Controllers;

use App\AdditionalInformation;
use App\AtmRecord;
use App\ContactDetail;
use App\ContributionNumber;
use App\CompleteAddress;
use App\Employee;
use App\EmployeeProfile;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index(Request $request)
    {
        $request->session()->forget('employee');
        $request->session()->forget('contact_detail');
        $request->session()->forget('complete_address');
        $request->session()->forget('additional_information');
        $request->session()->forget('contribution_number');
        $request->session()->forget('employee_profile');
        $request->session()->forget('atm_record');

        $employees = Employee::with('employeeprofile', 'contactdetail', 'atmrecord')
                             ->orderBy('emp_num', 'asc')
                             ->get();
        return view('admin.employees.index', compact('employees'));
    }

    // Step 1
    public function createStep1(Request $request)
    {
        $gender = '';
        $employee = $request->session()->get('employee');
        if(isset($employee)){
            if (isset($employee->gender)) {
                if ($employee->gender === "1") {
                    $gender = true;
                } else {
                    $gender = false;
                };
                return view('admin.employees.step-1', compact('employee', $gender));
            }
        }
        return view('admin.employees.step-1');
    }

    public function PostcreateStep1(Request $request)
    {
        $validatedData = $request->validate(
            [
                'emp_num'       => 'required|unique:employees',
                'first_name'    => 'required',
                'last_name'     => 'required',
                'middle_name'   => 'nullable',
                'suffix'        => 'nullable',
                'date_of_birth' => 'required',
                'age'           => 'required|numeric',
                'gender'        => 'required',
                'religion'      => 'required',
                'citizenship'   => 'required',
                'place_of_birth' => 'required',
                'civil_status'  => 'required',
            ],
            [
                'emp_num.required' => 'The employee number field is required.',
                'emp_num.unique' => 'The employee number has already been taken',
            ]
        );

        if (empty($request->session()->get('employee'))) {
            $employee = new Employee();
            $employee->fill($validatedData);
            $request->session()->put('employee', $employee);
        } else {
            $employee = $request->session()->get('employee');
            $employee->fill($validatedData);
            $request->session()->put('employee', $employee);
        }

        toastr()->success('Success Message');
        return redirect('employees/create-step-2');
    }

    // Step 2
    public function createStep2(Request $request)
    {
        $employee = $request->session()->get('employee');
        $contact_detail = $request->session()->get('contact_detail');
        return view('admin.employees.step-2', compact('employee', 'contact_detail'));
    }
    public function PostcreateStep2(Request $request)
    {

        $validatedData = $request->validate([
            'email_address'     => 'required|email|unique:contact_details',
            'phone_number'      => 'nullable',
            'mobile_number'     => 'required|unique:contact_details',
        ]);

        $contact_detail = $request->session()->get('contact_detail');
        $employee = $request->session()->get('employee');

        if (empty($request->session()->get('contact_detail'))) {
            $contact_detail = new ContactDetail();
            $contact_detail['emp_num'] = $employee->emp_num;
            $contact_detail->fill($validatedData);
            $request->session()->put('contact_detail', $contact_detail);
        } else {
            $contact_detail = $request->session()->get('contact_detail');
            $contact_detail->fill($validatedData);
            $request->session()->put('contact_detail', $contact_detail);
        }

        toastr()->success('Success Message');
        return redirect('employees/create-step-3');
    }

    // Step 3
    public function createStep3(Request $request)
    {
        $employee = $request->session()->get('employee');
        return view('admin.employees.step-3', compact('employee'));
    }

    public function PostcreateStep3(Request $request)
    {
        $validatedData = $request->validate([
            'house_number'     => 'required',
            'street'      => 'required',
            'city'     => 'required',
            'province'     => 'required',
            'region'     => 'required',
            'zip_code'     => 'required',
        ]);

        $complete_address = $request->session()->get('complete_address');
        $employee = $request->session()->get('employee');

        if (empty($request->session()->get('complete_address'))) {
            $complete_address = new CompleteAddress();
            $complete_address['emp_num'] = $employee->emp_num;
            $complete_address->fill($validatedData);
            $request->session()->put('complete_address', $complete_address);
        } else {
            $complete_address = $request->session()->get('complete_address');
            $complete_address['emp_num'] = $employee->emp_num;
            $complete_address->fill($validatedData);
            $request->session()->put('complete_address', $complete_address);
        }
        toastr()->success('Success Message');
        return redirect('employees/create-step-4');
    }

    // Step 4
    public function createStep4(Request $request)
    {
        $employee = $request->session()->get('employee');
        return view('admin.employees.step-4', compact('employee'));
    }

    public function PostcreateStep4(Request $request)
    {
        $validatedData = $request->validate([
            'm_first_name'     => 'required',
            'm_last_name'      => 'required',
            'm_middle_name'     => 'nullable',
            'm_suffix'     => 'nullable',
            'e_contact_person'     => 'required',
            'e_mobile_number'     => 'required',
        ], [
            'm_first_name.required'     => "The field is required",
            'm_last_name.required'      => "The field is required",
            'e_contact_person.required' => "The field is required",
            'e_mobile_number.required'  => "The field is required",
        ]);

        $additional_information = $request->session()->get('additional_information');
        $employee = $request->session()->get('employee');

        if (empty($request->session()->get('additional_information'))) {
            $additional_information = new AdditionalInformation();
            $additional_information['emp_num'] = $employee->emp_num;
            $additional_information->fill($validatedData);
            $request->session()->put('additional_information', $additional_information);
        } else {
            $additional_information = $request->session()->get('additional_information');
            $additional_information['emp_num'] = $employee->emp_num;
            $additional_information->fill($validatedData);
            $request->session()->put('additional_information', $additional_information);
        }
        toastr()->success('Success Message');
        return redirect('employees/create-step-5');
    }

    // Step 5
    public function createStep5(Request $request)
    {
        $employee = $request->session()->get('employee');
        return view('admin.employees.step-5', compact('employee'));
    }

    public function PostcreateStep5(Request $request)
    {
        $validatedData = $request->validate([
            'sss'           => 'required',
            'philhealth'    => 'required',
            'pagibig'       => 'required',
            'tin'           => 'required',
        ]);

        $contribution_number = $request->session()->get('contribution_number');
        $employee = $request->session()->get('employee');

        if (empty($request->session()->get('contribution_number'))) {
            $contribution_number = new ContributionNumber();
            $contribution_number['emp_num'] = $employee->emp_num;
            $contribution_number->fill($validatedData);
            $request->session()->put('contribution_number', $contribution_number);
        } else {
            $contribution_number = $request->session()->get('contribution_number');
            $contribution_number['emp_num'] = $employee->emp_num;
            $contribution_number->fill($validatedData);
            $request->session()->put('contribution_number', $contribution_number);
        }

        toastr()->success('Success Message');
        return redirect('employees/create-step-6');
    }

    // Step 6
    public function createStep6(Request $request)
    {
        $employee = $request->session()->get('employee');
        return view('admin.employees.step-6', compact('employee'));
    }

    public function PostcreateStep6(Request $request)
    {
        $validatedData = $request->validate([
            'position'              => 'required',
            'employment_status'     => 'required',
            'date_hired'            => 'required',
            'store_assignment'      => 'required',
            'immediate_supervisor'  => 'required',
            'basic_pay'             => 'required',
            'ecola'                 => 'required',
            'billing_group'         => 'required',
            'client_group'          => 'required',
            'mcrs'                  => 'required',
            'payroll_code'          => 'required',
        ]);

        $employee_profile = $request->session()->get('employee_profile');
        $employee = $request->session()->get('employee');

        if (empty($request->session()->get('employee_profile'))) {
            $employee_profile = new EmployeeProfile();
            $employee_profile['emp_num'] = $employee->emp_num;
            $employee_profile->fill($validatedData);
            $request->session()->put('employee_profile', $employee_profile);
        } else {
            $employee_profile = $request->session()->get('employee_profile');
            $employee_profile['emp_num'] = $employee->emp_num;
            $employee_profile->fill($validatedData);
            $request->session()->put('employee_profile', $employee_profile);
        }

        toastr()->success('Success Message');
        return redirect('employees/create-step-7');
    }

    // Step 7
    public function createStep7(Request $request)
    {
        $employee = $request->session()->get('employee');
        return view('admin.employees.step-7', compact('employee'));
    }

    public function PostcreateStep7(Request $request)
    {
        $validatedData = $request->validate([
            'card_holder'   => 'required',
            'card_number'   => 'required',
            'expiry_date'   => 'required',
            'cvc'           => 'required',
        ]);

        $atm_record = $request->session()->get('atm_record');
        $employee = $request->session()->get('employee');

        if (empty($request->session()->get('atm_record'))) {
            $atm_record = new AtmRecord();
            $atm_record['emp_num'] = $employee->emp_num;
            $atm_record->fill($validatedData);
            $request->session()->put('atm_record', $atm_record);
        } else {
            $atm_record = $request->session()->get('atm_record');
            $atm_record['emp_num'] = $employee->emp_num;
            $atm_record->fill($validatedData);
            $request->session()->put('atm_record', $atm_record);
        }
        toastr()->success('Success Message');
        return redirect('employees/create-step-8');
    }

    public function createStep8(Request $request)
    {
        $employee = $request->session()->get('employee');
        return view('admin.employees.step-8', compact('employee'));
    }

    public function store(Request $request, Employee $employee)
    {
        $employee_data = $request->validate(
            [
                'emp_num'           => 'required|unique:employees',
                'first_name'        => 'required',
                'last_name'         => 'required',
                'middle_name'       => 'nullable',
                'suffix'            => 'nullable',
                'date_of_birth'     => 'required',
                'age'               => 'required|numeric',
                'gender'            => 'required',
                'religion'          => 'required',
                'citizenship'       => 'required',
                'place_of_birth'    => 'required',
                'civil_status'      => 'required',
            ],
            [
                'emp_num.required'          => 'The employee number field is required.',
                'emp_num.unique'            => 'The employee number has already been taken',
            ]
        );

        $contact_detail_data = $request->validate(
        [
            'email_address'     => 'required|email|unique:contact_details',
            'phone_number'      => 'nullable',
            'mobile_number'     => 'required|unique:contact_details',
        ]);

        $complete_address_data = $request->validate([
            'house_number'      => 'required',
            'street'            => 'required',
            'city'              => 'required',
            'province'          => 'required',
            'region'            => 'required',
            'zip_code'          => 'required',
        ]);

        $additional_information_data = $request->validate([
            'm_first_name'      => 'required',
            'm_last_name'       => 'required',
            'm_middle_name'     => 'nullable',
            'm_suffix'          => 'nullable',
            'e_contact_person'  => 'required',
            'e_mobile_number'   => 'required',
        ],
        [
            'm_first_name.required'     => "The field is required",
            'm_last_name.required'      => "The field is required",
            'e_contact_person.required' => "The field is required",
            'e_mobile_number.required'  => "The field is required",
        ]);

        $contribution_number_data = $request->validate([
            'sss'               => 'required',
            'philhealth'        => 'required',
            'pagibig'           => 'required',
            'tin'               => 'required',
        ]);

        $employee_profile_data = $request->validate([
            'position'              => 'required',
            'employment_status'     => 'required',
            'date_hired'            => 'required',
            'store_assignment'      => 'required',
            'immediate_supervisor'  => 'required',
            'basic_pay'             => 'required',
            'ecola'                 => 'required',
            'billing_group'         => 'required',
            'client_group'          => 'required',
            'mcrs'                  => 'required',
            'payroll_code'          => 'required',
        ]);

        $atm_record_data = $request->validate([
            'card_holder'       => 'required',
            'card_number'       => 'required',
            'expiry_date'       => 'required',
            'cvc'               => 'required',
        ]);

        $employee = Employee::create($employee_data);
        $contact_detail = $employee->contactdetail()->create($contact_detail_data);
        $complete_address = $employee->completeaddress()->create($complete_address_data);
        $additional_information = $employee->additionalinformation()->create($additional_information_data);
        $contribution_number = $employee->contributionnumber()->create($contribution_number_data);
        $employee_profile = $employee->employeeprofile()->create($employee_profile_data);
        $atm_record = $employee->atmrecord()->create($atm_record_data);

        toastr()->success('Success Message');
        return redirect('employees/');
    }

    public function show(Employee $employee){
        return view('admin.employees.show', compact('employee'));
    }
}
