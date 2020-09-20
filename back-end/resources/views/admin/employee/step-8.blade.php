@extends('layouts.app')
@section('title', '201 : Admin - Vancework')
@section('content')
<div class="container-fluid">
    <h3 class="text-dark mb-4">201 ENCODING</h3>
    <div class="row ">
        <div class="col-lg-4 mb-4">
            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                <a class="nav-link" id="v-pills-personal-information-tab" href="create-step-1" aria-controls="v-pills-personal-information" aria-selected="false">Personal Information</a>
                <a class="nav-link" id="v-pills-contact-details-tab" href="create-step-2" aria-controls="v-pills-contact-details" aria-selected="false">Contact Details </a>
                <a class="nav-link" id="v-pills-complete-address-tab" href="create-step-3" aria-controls="v-pills-complete-address" aria-selected="false">Complete Address</a>
                <a class="nav-link" id="v-pills-add-information-tab" href="create-step-4" aria-controls="v-pills-add-information" aria-selected="false">Additional Information</a>
                <a class="nav-link" id="v-pills-contribution-number-tab" href="create-step-5" aria-controls="v-pills-contribution-number" aria-selected="false">Contribution Number</a>
                <a class="nav-link" id="v-pills-employee-profile-tab" href="create-step-6" aria-controls="v-pills-employee-profile" aria-selected="false">Employee Profile</a>
                <a class="nav-link" id="v-pills-atm-acc-tab" href="create-step-7" aria-controls="v-pills-atm-acc" aria-selected="false">ATM Record</a>
                <a class="nav-link active" id="v-pills-review-details-tab" href="create-step-8" aria-controls="v-pills-review-details" aria-selected="true">Review Details</a>
            </div>
        </div>
        <div class="col-lg-8 mb-5">
            <form action="/store" method="post" autocomplete="off">

                @csrf

                <div class="tab-content" id="v-pills-tabContent">
                    <div class="tab-pane fade show active" id="v-pills-review-details" role="tabpanel" aria-labelledby="v-pills-review-details">
                        <div class="card shadow-lg border-0 rounded-lg">
                            <div class="card-body">
                                <!-- Personal Information -->
                                <div class="pt-2 col-lg-12 justfy-content-between align-items-center d-flex">
                                    <span class="font-weight-bold h3">Personal Information</span>
                                    <a class="text-decoration-none ml-auto btn btn-outline-warning btn-sm" href="/create-step-1">edit</a>
                                </div>
                                <hr>
                                <div class="form-row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="small mb-1" for="">Employee Number</label>
                                            <input class="form-control" id="inputEmpNum" value="{{ session()->get('employee.emp_num') }}" type=" text" placeholder="Enter Employee Number" name="emp_num" />
                                            <p class="text-danger small">@error('emp_num') {{ $message }} @enderror</p>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="small mb-1" for="inputFirstName">First Name</label>
                                            <input class="form-control" id="inputFirstName" value="{{ session()->get('employee.first_name') }}" type="text" placeholder="Enter first name" name="first_name" />
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="small mb-1" for="inputLastName">Last Name</label>
                                            <input class="form-control" id="inputLastName" value="{{ session()->get('employee.last_name') }}" type="text" placeholder="Enter last name" name="last_name" />
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="small mb-1" for="inputMiddleName">Middle Name</label>
                                            <input class="form-control" id="inputMiddleName" value="{{ session()->get('employee.middle_name') }}" type="text" placeholder="Enter middle name" name="middle_name" />
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="small mb-1" for="inputSuffix">
                                                Suffix
                                            </label>
                                            <input class="form-control" id="inputSuffix" value="{{ session()->get('employee.suffix') }}" type="text" placeholder="Enter name suffix" name="suffix" />
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="small mb-1" for="bday">Date of Birth</label>
                                            <input class="form-control item" id="bday" value="{{ session()->get('employee.date_of_birth') }}" type="date" placeholder="Date" name="date_of_birth" />
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="small mb-1" for="age">Age</label>
                                            <input class="form-control item" id="age" value="{{ session()->get('employee.age') }}" type="number" placeholder="Enter Age" name="age" />
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div>
                                            <label class="small" for="">Gender</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <!-- {{ $gender = session()->get('employee.gender') }} -->
                                            <input class="form-check-input" type="radio" name="gender" id="gender_male" value="1" {{ ($gender == 1 AND $gender != '') ? "checked" : "" }}>
                                            <label class="form-check-label mb-1" for="inlineRadio1">Male</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="gender" id="gender_female" value="0" {{ ($gender == 0 AND $gender != '') ? "checked" : "" }}>
                                            <label class="form-check-label mb-1" for="">Female</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="small mb-1" for="religion">Religion</label>
                                            <input class="form-control" id="religion" value="{{ session()->get('employee.religion') }}" type="text" placeholder="Enter Religion" name="religion" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="small mb-1" for="Citizenship">Citizenship</label>
                                            <input class="form-control" id="Citizenship" value="{{ session()->get('employee.citizenship') }}" type="text" placeholder="Enter Citizenship" name="citizenship" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="small mb-1" for="pob">Place of Birth</label>
                                            <input class="form-control" id="pob" value="{{ session()->get('employee.place_of_birth') }}" type="text" placeholder="Enter Place of Birth" name="place_of_birth" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="small mb-1" for="status">Civil Status</label>
                                            <select class="form-control" id="status" name="civil_status">
                                                <option value="Single" {{ session()->get('employee.civil_status') === "Single" ? "Selected" : "" }}>Single</option>
                                                <option value="Married" {{ session()->get('employee.civil_status') === "Married" ? "Selected" : "" }}>Married</option>
                                                <option value="Widowed" {{ session()->get('employee.civil_status') === "Widowed" ? "Selected" : "" }}>Widowed</option>
                                                <option value="Legally Seperated" {{ session()->get('employee.civil_status') === "Legally Seperated" ? "Selected" : "" }}>Legally Separated</option>
                                                <option value="Others" {{ session()->get('employee.civil_status') === "Single" ? "Others" : "" }}>Others</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mt-4 card shadow-lg border-0 rounded-lg">
                            <div class="card-body">
                                <!-- Contact Info -->
                                <div class="pt-2 col-lg-12 justfy-content-between align-items-center d-flex">
                                    <span class="font-weight-bold h3">Contact Details</span>
                                    <a class="text-decoration-none ml-auto btn btn-outline-warning btn-sm" href="/create-step-1">edit</a>
                                </div>
                                <hr>
                                <div class="form-row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="small mb-1" for="email">Email Address:</label>
                                            <input class="form-control" id="email" value="{{ session()->get('employee.email_address') }}" type="text" placeholder="Enter Email Address" name="email_address" />
                                            <p class="text-danger small">@error('email_address') {{ $message }} @enderror</p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="small mb-1" for="phone-number">Landline Number</label>
                                            <input class="form-control item" id="phone-number" value="{{ session()->get('employee.phone_number') }}" type="text" placeholder="0000-0000" name="phone_number" />
                                            <p class="text-danger small">@error('phone_number') {{ $message }} @enderror</p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="small mb-1" for="mobile-number">Phone Number</label>
                                            <input class="form-control item" id="mobile-number" value="{{ session()->get('employee.mobile_number') }}" type="text" placeholder="0000-000-0000" name="mobile_number" />
                                            <p class="text-danger small">@error('mobile_number') {{ $message }} @enderror</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mt-4 card shadow-lg border-0 rounded-lg">
                            <div class="card-body">
                                <!-- Address -->
                                <div class="pt-2 col-lg-12 justfy-content-between align-items-center d-flex">
                                    <span class="font-weight-bold h3">Complete Address</span>
                                    <a class="text-decoration-none ml-auto btn btn-outline-warning btn-sm" href="/create-step-1">edit</a>
                                </div>
                                <hr>
                                <div class="form-row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="small mb-1" for="house_number">House Number</label>
                                            <!-- store the value of this input, name == table column.  -->
                                            <input class="form-control" id="house_number" value="{{ session()->get('employee.house_number') }}" type="text" placeholder="Enter House Number" name="house_number" />
                                            <!-- display error message if there's any -->
                                            <p class="text-danger small">@error('house_number') {{ $message }} @enderror</p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="small mb-1" for="street">Street</label>
                                            <input class="form-control" id="street" value="{{ session()->get('employee.street') }}" name="street" type="text" placeholder="Enter Street" />
                                            <p class="text-danger small">@error('street') {{ $message }} @enderror</p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="small mb-1" for="city">City</label>
                                            <input class="form-control" id="city" value="{{ session()->get('employee.city') }}" name="city" type="text" placeholder="Enter City" />
                                            <p class="text-danger small">@error('city') {{ $message }} @enderror</p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="small mb-1" for="province">Province</label>
                                            <input class="form-control" id="province" value="{{ session()->get('employee.province') }}" name="province" type="text" placeholder="Enter Province" />
                                            <p class="text-danger small">@error('province') {{ $message }} @enderror</p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="small mb-1" for="">Region</label>
                                            <select class="form-control" id="" name="region">
                                                <!-- If employee.region is null echo "selected" -->
                                                <option disabled {{ session()->get('employee.region') === null ? "Selected" : "" }}>Select Region</option>
                                                <option value="NCR" {{ session()->get('employee.region') === "NCR" ? "Selected" : "" }}>NCR</option>
                                                <option value="CAR" {{ session()->get('employee.region') === "CAR" ? "Selected" : "" }}>CAR</option>
                                                <option value="Region I" {{ session()->get('employee.region') === "Region I" ? "Selected" : "" }}>Region I</option>
                                                <option value="Region II" {{ session()->get('employee.region') === "Region II" ? "Selected" : "" }}>Region II</option>
                                                <option value="Region III" {{ session()->get('employee.region') === "Region III" ? "Selected" : "" }}>Region III</option>
                                                <option value="Region IV-A" {{ session()->get('employee.region') === "Region IV-A" ? "Selected" : "" }}>Region IV-A</option>
                                                <option value="Region IV-B" {{ session()->get('employee.region') === "Region IV-B" ? "Selected" : "" }}>Region IV-B</option>
                                                <option value="Region V" {{ session()->get('employee.region') === "Region V" ? "Selected" : "" }}>Region V</option>
                                                <option value="Region VI" {{ session()->get('employee.region') === "Region VI" ? "Selected" : "" }}>Region VI</option>
                                                <option value="Region VII" {{ session()->get('employee.region') === "Region VII" ? "Selected" : "" }}>Region VII</option>
                                                <option value="Region VIII" {{ session()->get('employee.region') === "Region VIII" ? "Selected" : "" }}>Region VIII</option>
                                                <option value="Region IX" {{ session()->get('employee.region') === "Region IX" ? "Selected" : "" }}>Region IX</option>
                                                <option value="Region X" {{ session()->get('employee.region') === "Region X" ? "Selected" : "" }}>Region X</option>
                                                <option value="Region XI" {{ session()->get('employee.region') === "Region XI" ? "Selected" : "" }}>Region XI</option>
                                                <option value="Region XII" {{ session()->get('employee.region') === "Region XII" ? "Selected" : "" }}>Region XII</option>
                                                <option value="Region XIII" {{ session()->get('employee.region') === "Region XIII" ? "Selected" : "" }}>Region XIII</option>
                                                <option value="ARMM" {{ session()->get('employee.region') === "ARMM" ? "Selected" : "" }}>ARMM</option>
                                            </select>
                                            <p class="text-danger small">@error('region') {{ $message }} @enderror</p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="small mb-1" for="zip">ZIP Code</label>
                                            <input class="form-control" id="zip" value="{{ session()->get('employee.zip_code') }}" name="zip_code" type="text" placeholder="Enter ZIP Code" />
                                            <p class="text-danger small">@error('zip_code') {{ $message }} @enderror</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mt-4 card shadow-lg border-0 rounded-lg">
                            <div class="card-body">
                                <!-- Additional Information -->
                                <div class="pt-2 col-lg-12 justfy-content-between align-items-center d-flex">
                                    <span class="font-weight-bold h3">Additional Information</span>
                                    <a class="text-decoration-none ml-auto btn btn-outline-warning btn-sm" href="/create-step-1">edit</a>
                                </div>
                                <hr>
                                <div class="form-row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="small mb-1" for="inputFirstName">Mother's Maiden First Name</label>
                                            <input class="form-control" id="inputFirstName" value="{{ session()->get('employee.m_first_name') }}" name="m_first_name" type="text" placeholder="Enter first name" />
                                            <p class="text-danger small">@error('m_first_name') {{ $message }} @enderror</p>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="small mb-1" for="inputLastName">Mother's Maiden Last Name</label>
                                            <input class="form-control" id="inputLastName" value="{{ session()->get('employee.m_last_name') }}" name="m_last_name" type="text" placeholder="Enter last name" />
                                            <p class="text-danger small">@error('m_last_name') {{ $message }} @enderror</p>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="small mb-1" for="inputMiddleName">Mother's Maiden Middle Name</label>
                                            <input class="form-control" id="inputMiddleName" value="{{ session()->get('employee.m_middle_name') }}" name="m_middle_name" type="text" placeholder="Enter middle name" />
                                            <p class="text-danger small">@error('m_middle_name') {{ $message }} @enderror</p>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="small mb-1" for="inputSuffix">Mother's Maiden Suffix</label>
                                            <input class="form-control" id="inputSuffix" value="{{ session()->get('employee.m_suffix') }}" name="m_suffix" type="text" placeholder="Enter name suffix" />
                                            <p class="text-danger small">@error('m_suffix') {{ $message }} @enderror</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="pt-2 col-lg-12 justfy-content-between align-items-center d-flex">
                                    <span class="font-weight-bold h3">In Case of Emergency</span>
                                </div>
                                <hr>
                                <div class="form-row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="small mb-1" for="econtactperson">Full Name of Contact Person</label>
                                            <input class="form-control item" id="econtactperson" value="{{ session()->get('employee.e_contact_person') }}" name="e_contact_person" type="text" placeholder="Enter Contact Person" />
                                            <p class="text-danger small">@error('e_contact_person') {{ $message }} @enderror</p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="small mb-1" for="mobile-number">Contact Number</label>
                                            <input class="form-control item" id="mobile-number" value="{{ session()->get('employee.e_mobile_number') }}" name="e_mobile_number" type="text" placeholder="0000-000-0000" />
                                            <p class="text-danger small">@error('e_mobile_number') {{ $message }} @enderror</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mt-4 card shadow-lg border-0 rounded-lg">
                            <div class="card-body">
                                <!-- Contribution Numbers -->
                                <div class="pt-2 col-lg-12 justfy-content-between align-items-center d-flex">
                                    <span class="font-weight-bold h3">Government Issued Numbers</span>
                                    <a class="text-decoration-none ml-auto btn btn-outline-warning btn-sm" href="/create-step-1">edit</a>
                                </div>
                                <hr>
                                <div class="form-row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="small mb-1" for="sss">SSS Number</label>
                                            <input class="form-control item" id="sss" value="{{ session()->get('employee.sss') }}" name="sss" type="text" placeholder="00-000000000-0" />
                                            <p class="text-danger small">@error('sss') {{ $message }} @enderror</p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="small mb-1" for="gender">PhilHealth Number</label>
                                            <input class="form-control item" id="philhealth" value="{{ session()->get('employee.philhealth') }}" name="philhealth" type="text" placeholder="00-000000000-0" />
                                            <p class="text-danger small">@error('philhealth') {{ $message }} @enderror</p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="small mb-1" for="st">HDMF Number</label>
                                            <input class="form-control item" id="pagibig" value="{{ session()->get('employee.pagibig') }}" name="pagibig" type="text" placeholder="0000-0000-0000" />
                                            <p class="text-danger small">@error('pagibig') {{ $message }} @enderror</p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="small mb-1" for="province">TIN Number</label>
                                            <input class="form-control item" id="tin" value="{{ session()->get('employee.tin') }}" name="tin" type="text" placeholder="000-000-000" />
                                            <p class="text-danger small">@error('tin') {{ $message }} @enderror</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mt-4 card shadow-lg border-0 rounded-lg">
                            <div class="card-body">
                                <!-- Employee Profile -->
                                <div class="pt-2 col-lg-12 justfy-content-between align-items-center d-flex">
                                    <span class="font-weight-bold h3">Employee Profile</span>
                                    <a class="text-decoration-none ml-auto btn btn-outline-warning btn-sm" href="/create-step-1">edit</a>
                                </div>
                                <hr>
                                <div class="form-row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="small mb-1" for="position">Employee Position</label>
                                            <input class="form-control" id="position" type="text" value="{{ session()->get('employee.position') }}" name="position" placeholder="Enter Employee Position" />
                                            <p class="text-danger small">@error('position') {{ $message }} @enderror</p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="small mb-1" for="employment_status">Employment Status</label>
                                            <input class="form-control" id="employment_status" type="text" value="{{ session()->get('employee.employment_status') }}" name="employment_status" placeholder="Enter Employment Status" />
                                            <p class="text-danger small">@error('employment_status') {{ $message }} @enderror</p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="small mb-1" for="client_group">Basic Pay</label>
                                            <input class="form-control" id="client_group" type="text" value="{{ session()->get('employee.basic_pay') }}" name="basic_pay" placeholder="PHP 0.00" />
                                            <p class="text-danger small">@error('basic_pay') {{ $message }} @enderror</p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="small mb-1" for="ecola">Ecola</label>
                                            <input class="form-control" id="ecola" type="text" value="{{ session()->get('employee.ecola') }}" name="ecola" placeholder="Enter Ecola" />
                                            <p class="text-danger small">@error('ecola') {{ $message }} @enderror</p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="small mb-1" for="billing_group">Billing Group</label>
                                            <input class="form-control" id="billing_group" type="text" value="{{ session()->get('employee.billing_group') }}" name="billing_group" placeholder="Enter Billing Group" />
                                            <p class="text-danger small">@error('billing_group') {{ $message }} @enderror</p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="small mb-1" for="client_group">Client Group</label>
                                            <input class="form-control" id="client_group" type="text" value="{{ session()->get('employee.client_group') }}" name="client_group" placeholder="Enter Client Group" />
                                            <p class="text-danger small">@error('client_group') {{ $message }} @enderror</p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="small mb-1" for="mcrs">MCRS</label>
                                            <input class="form-control" id="mcrs" type="text" value="{{ session()->get('employee.mcrs') }}" name="mcrs" placeholder="Enter MCRS" />
                                            <p class="text-danger small">@error('mcrs') {{ $message }} @enderror</p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="small mb-1" for="payroll_code">Payroll Code</label>
                                            <input class="form-control" id="payroll_code" type="text" value="{{ session()->get('employee.payroll_code') }}" name="payroll_code" placeholder="Enter Payroll Code" />
                                            <p class="text-danger small">@error('payroll_code') {{ $message }} @enderror</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mt-4 card shadow-lg border-0 rounded-lg">
                            <div class="card-body">
                                <!-- ATM Record -->
                                <div class="pt-2 col-lg-12 justfy-content-between align-items-center d-flex">
                                    <span class="font-weight-bold h3">ATM Account</span>
                                    <a class="text-decoration-none ml-auto btn btn-outline-warning btn-sm" href="/create-step-1">edit</a>
                                </div>
                                <hr>
                                <div class="form-row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="small mb-1" for="card_holder">Card Holder</label>
                                            <input class="form-control item" id="card_holder" type="text" value="{{ session()->get('employee.card_holder') }}" name="card_holder" placeholder="Card Holder">
                                            <p class="text-danger small">@error('card_holder') {{ $message }} @enderror</p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="small mb-1" for="card_number">Card Number</label>
                                            <input class="form-control item" id="card_number" type="text" value="{{ session()->get('employee.card_number') }}" name="card_number" placeholder="0000-0000-0000-0000">
                                            <p class="text-danger small">@error('card_number') {{ $message }} @enderror</p>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="small mb-1" for="expiry_date">Expiration date</label>
                                            <div class="input-group expiration-date">
                                                <input class="form-control item" id="expiry_date" type="text" value="{{ session()->get('employee.expiry_date') }}" name="expiry_date" placeholder="MM/YY">
                                            </div>
                                            <p class="text-danger small">@error('expiry_date') {{ $message }} @enderror</p>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="small mb-1">CVC</label>
                                            <input class="form-control item" id="cvc" type="text" value="{{ session()->get('employee.cvc') }}" name="cvc" placeholder="CVC">
                                            <p class="text-danger small">@error('cvc') {{ $message }} @enderror</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row justify-content-center align-items-center d-flex">
                        <div class="col-4 mb-3 justify-content-center align-items-center d-flex">
                            <div class="btn-group mt-4 ">
                                <!-- <button type="button" class="btn btn-primary btn-md next mx-1 px-3" id="prevBtn" onclick="nextPrev(-1)">Back</button>
                                <button type="button" class="btn btn-primary btn-md next mx-1 px-3" id="nextBtn" onclick="nextPrev(1)">Next</button> -->
                                <button type="button" class="btn btn-primary mx-1"><a href="create-step-7" class="text-white text-decoration-none">Previous</a></button>
                                <button type="submit" class="btn btn-primary mx-1">Save Record</button>
                            </div>
                        </div>
                    </div>

                </div>
            </form>
        </div>
    </div>
</div>
@endsection
