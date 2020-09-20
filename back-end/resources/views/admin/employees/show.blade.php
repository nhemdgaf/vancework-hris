@extends('layouts.app')
@section('title', 'Employee Record: Admin - Vancework')
@section('employee.nav', 'd-none')
@section('201', 'active')
@section('content')
<div class="container-fluid">
    @section('heading')
    <h3 class="text-dark mb-4 ml-2">Employee Details</h3>
    @endsection
    <div class="row mb-3">
        <div class="col-lg-4 col-xl-4">
            <div class="card mb-3">
                <div class="card-body text-center shadow">
                    <img class="rounded-circle mb-3 mt-4" src="{{ asset('/img/user.png') }}" width="160" height="160">
                    <div class="mb-3"></div>
                    <div class="mb-3">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr></tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Employee No.</td>
                                        <td>{{ $employee->emp_num }}</td>
                                    </tr>
                                    <tr>
                                        <td>Full Name</td>
                                        <td>{{ $employee->first_name }} {{ $employee->middle_name }} {{ $employee->last_name }}</td>
                                    </tr>
                                    <tr>
                                        <td>Date Hired</td>
                                        <td>{{ $employee->employeeprofile->date_hired }}</td>
                                    </tr>
                                    <tr>
                                        <td>Store Assignment</td>
                                        <td>{{ $employee->employeeprofile->store_assignment }}</td>
                                    </tr>
                                    <tr>
                                        <td>Imediate Supervisor</td>
                                        <td>{{ $employee->employeeprofile->immediate_supervisor }}</td>
                                    </tr>
                                    <tr>
                                        <td>Account No.</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>Mobile No.</td>
                                        <td>{{ $employee->contactdetail->mobile_number }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-8 col-xl-8">
            <div class="row">
                <div class="col">
                    <div>
                        <ul class="nav nav-tabs">
                            <li class="nav-item"><a class="nav-link active" role="tab" data-toggle="tab" href="#tab-1">Personal Information</a></li>
                            <li class="nav-item"><a class="nav-link" role="tab" data-toggle="tab" href="#tab-2">Contact Details</a></li>
                            <li class="nav-item"><a class="nav-link" role="tab" data-toggle="tab" href="#tab-3">Complete Address</a></li>
                            <li class="nav-item"><a class="nav-link" role="tab" data-toggle="tab" href="#tab-4">Additional Information</a></li>
                            <li class="nav-item"><a class="nav-link" role="tab" data-toggle="tab" href="#tab-5">Contribution Number</a></li>
                            <li class="nav-item"><a class="nav-link" role="tab" data-toggle="tab" href="#tab-6">Employee Profile</a></li>
                            <li class="nav-item"><a class="nav-link" role="tab" data-toggle="tab" href="#tab-7">ATM Record</a></li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" role="tabpanel" id="tab-1">
                                <div class="card shadow mb-3">
                                    <div class="card-header py-3">
                                        <p class="text-primary m-0 font-weight-bold">Personal Information</p>
                                    </div>
                                    <div class="card-body">
                                        <div class="form-row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="small mb-1" for="">Employee Number</label>
                                                    <input class="form-control" id="inputEmpNum" value="{{ old('emp_num') ? old('emp_num') : $employee->emp_num }}" type=" text" placeholder="Enter Employee Number" name="emp_num" />
                                                    <p class="text-danger small">@error('emp_num') {{ $message }} @enderror</p>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="small mb-1" for="inputFirstName">First Name</label>
                                                    <input class="form-control" id="inputFirstName" value="{{ old('first_name') ? old('first_name') : $employee->first_name }}" type="text" placeholder="Enter first name" name="first_name" />
                                                    <p class="text-danger small">@error('first_name') {{ $message }} @enderror</p>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="small mb-1" for="inputLastName">Last Name</label>
                                                    <input class="form-control" id="inputLastName" value="{{ old('last_name') ? old('last_name') : $employee->last_name }}" type="text" placeholder="Enter last name" name="last_name" />
                                                    <p class="text-danger small">@error('last_name') {{ $message }} @enderror</p>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="small mb-1" for="inputMiddleName">Middle Name</label>
                                                    <input class="form-control" id="inputMiddleName" value="{{ old('middle_name') ? old('middle_name') : $employee->middle_name }}" type="text" placeholder="Enter middle name" name="middle_name" />
                                                    <p class="text-danger small">@error('middle_name') {{ $message }} @enderror</p>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="small mb-1" for="inputSuffix">
                                                        Suffix
                                                    </label>
                                                    <input class="form-control" id="inputSuffix" value="{{ old('suffix') ? old('suffix') : $employee->suffix }}" type="text" placeholder="Enter name suffix" name="suffix" />
                                                    <p class="text-danger small">@error('suffix') {{ $message }} @enderror</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="small mb-1" for="bday">Date of Birth</label>
                                                    <input class="form-control item" id="bday" value="{{ old('date_of_birth') ? old('date_of_birth') : $employee->date_of_birth }}" type="date" placeholder="Date" name="date_of_birth" />
                                                    <p class="text-danger small">@error('date_of_birth') {{ $message }} @enderror</p>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="small mb-1" for="age">Age</label>
                                                    <input class="form-control item" id="age" value="{{ old('age') ? old('age') : $employee->age }}" type="number" placeholder="Enter Age" name="age" />
                                                    <p class="text-danger small">@error('age') {{ $message }} @enderror</p>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div>
                                                    <label class="small" for="">Gender</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <!-- {{ $gender = session()->get('employee.gender') }} -->
                                                    <input class="form-check-input" type="radio" name="gender" id="gender_male" value="1" {{ ($employee->gender === 1) ? "checked" : "" }}>
                                                    <label class="form-check-label" for="inlineRadio1">Male</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="gender" id="gender_female" value="0" {{ ($employee->gender == 0) ? "checked" : "" }}>
                                                    <label class="form-check-label" for="">Female</label>
                                                </div>
                                                <p class="text-danger small">@error('gender') {{ $message }} @enderror</p>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="small mb-1" for="religion">Religion</label>
                                                    <input class="form-control" id="religion" value="{{ old('religion') ? old('religion') : $employee->religion }}" type="text" placeholder="Enter Religion" name="religion" />
                                                    <p class="text-danger small">@error('religion') {{ $message }} @enderror</p>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="small mb-1" for="Citizenship">Citizenship</label>
                                                    <input class="form-control" id="Citizenship" value="{{ old('citizenship') ? old('citizenship') : $employee->citizenship }}" type="text" placeholder="Enter Citizenship" name="citizenship" />
                                                    <p class="text-danger small">@error('citizenship') {{ $message }} @enderror</p>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="small mb-1" for="pob">Place of Birth</label>
                                                    <input class="form-control" id="pob" value="{{ old('place_of_birth') ? old('place_of_birth') : $employee->place_of_birth }}" type="text" placeholder="Enter Place of Birth" name="place_of_birth" />
                                                    <p class="text-danger small">@error('place_of_birth') {{ $message }} @enderror</p>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="small mb-1" for="status">Civil Status</label>
                                                    <select class="form-control" id="status" name="civil_status">
                                                        <option value="Single" {{ $employee->civil_status === "Single" ? "Selected" : "" }}>Single</option>
                                                        <option value="Married" {{ $employee->civil_status === "Married" ? "Selected" : "" }}>Married</option>
                                                        <option value="Widowed" {{ $employee->civil_status === "Widowed" ? "Selected" : "" }}>Widowed</option>
                                                        <option value="Legally Seperated" {{ $employee->civil_status === "Legally Seperated" ? "Selected" : "" }}>Legally Separated</option>
                                                        <option value="Others" {{ $employee->civil_status === "Single" ? "Others" : "" }}>Others</option>
                                                    </select>
                                                    <p class="text-danger small">@error('civil_status') {{ $message }} @enderror</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" role="tabpanel" id="tab-2">
                                <div class="card shadow mb-3">
                                    <div class="card-header py-3">
                                        <p class="text-primary m-0 font-weight-bold">Contact Details</p>
                                    </div>
                                    <div class="card-body">
                                        <div class="form-row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="small mb-1" for="email">Email Address:</label>
                                                    <input class="form-control" id="email" value="{{ old('email_address') ? old('email_address') : $employee->contactdetail->email_address }}" type="text" placeholder="Enter Email Address" name="email_address" />
                                                    <p class="text-danger small">@error('email_address') {{ $message }} @enderror</p>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="small mb-1" for="phone-number">Landline Number</label>
                                                    <input class="form-control item" id="phone-number" value="{{ old('phone_number') ? old('phone_number') : $employee->contactdetail->phone_number }}" type="text" placeholder="0000-0000" name="phone_number" />
                                                    <p class="text-danger small">@error('phone_number') {{ $message }} @enderror</p>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="small mb-1" for="mobile-number">Phone Number</label>
                                                    <input class="form-control item" id="mobile-number" value="{{ old('mobile_number') ? old('mobile_number') : $employee->contactdetail->mobile_number }}" type="text" placeholder="0000-000-0000" name="mobile_number" />
                                                    <p class="text-danger small">@error('mobile_number') {{ $message }} @enderror</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" role="tabpanel" id="tab-3">
                                <div class="card shadow">
                                    <div class="card-header py-3">
                                        <p class="text-primary m-0 font-weight-bold">Complete Address</p>
                                    </div>
                                    <div class="card-body">
                                        <div class="form-row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="small mb-1" for="house_number">House Number</label>
                                                    <!-- store the value of this input, name == table column.  -->
                                                    <input class="form-control" id="house_number" value="{{ old('house_number') ? old('house_number') : $employee->completeaddress->house_number }}" type="text" placeholder="Enter House Number" name="house_number" />
                                                    <!-- display error message if there's any -->
                                                    <p class="text-danger small">@error('house_number') {{ $message }} @enderror</p>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="small mb-1" for="street">Street</label>
                                                    <input class="form-control" id="street" value="{{ old('street') ? old('street') : $employee->completeaddress->street }}" name="street" type="text" placeholder="Enter Street" />
                                                    <p class="text-danger small">@error('street') {{ $message }} @enderror</p>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="small mb-1" for="city">City</label>
                                                    <input class="form-control" id="city" value="{{ old('city') ? old('city') : $employee->completeaddress->city }}" name="city" type="text" placeholder="Enter City" />
                                                    <p class="text-danger small">@error('city') {{ $message }} @enderror</p>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="small mb-1" for="province">Province</label>
                                                    <input class="form-control" id="province" value="{{ old('province') ? old('province') : $employee->completeaddress->province }}" name="province" type="text" placeholder="Enter Province" />
                                                    <p class="text-danger small">@error('province') {{ $message }} @enderror</p>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="small mb-1" for="">Region</label>
                                                    <select class="form-control" id="" name="region">
                                                        <!-- If complete_address.region is null echo "selected" -->
                                                        <option disabled {{ $employee->completeaddress->region === null ? "Selected" : "" }}>Select Region</option>
                                                        <option value="NCR" {{ $employee->completeaddress->region === "NCR" ? "Selected" : "" }}>NCR</option>
                                                        <option value="CAR" {{ $employee->completeaddress->region === "CAR" ? "Selected" : "" }}>CAR</option>
                                                        <option value="Region I" {{ $employee->completeaddress->region === "Region I" ? "Selected" : "" }}>Region I</option>
                                                        <option value="Region II" {{ $employee->completeaddress->region === "Region II" ? "Selected" : "" }}>Region II</option>
                                                        <option value="Region III" {{ $employee->completeaddress->region === "Region III" ? "Selected" : "" }}>Region III</option>
                                                        <option value="Region IV-A" {{ $employee->completeaddress->region === "Region IV-A" ? "Selected" : "" }}>Region IV-A</option>
                                                        <option value="Region IV-B" {{ $employee->completeaddress->region === "Region IV-B" ? "Selected" : "" }}>Region IV-B</option>
                                                        <option value="Region V" {{ $employee->completeaddress->region === "Region V" ? "Selected" : "" }}>Region V</option>
                                                        <option value="Region VI" {{ $employee->completeaddress->region === "Region VI" ? "Selected" : "" }}>Region VI</option>
                                                        <option value="Region VII" {{ $employee->completeaddress->region === "Region VII" ? "Selected" : "" }}>Region VII</option>
                                                        <option value="Region VIII" {{ $employee->completeaddress->region === "Region VIII" ? "Selected" : "" }}>Region VIII</option>
                                                        <option value="Region IX" {{ $employee->completeaddress->region === "Region IX" ? "Selected" : "" }}>Region IX</option>
                                                        <option value="Region X" {{ $employee->completeaddress->region === "Region X" ? "Selected" : "" }}>Region X</option>
                                                        <option value="Region XI" {{ $employee->completeaddress->region === "Region XI" ? "Selected" : "" }}>Region XI</option>
                                                        <option value="Region XII" {{ $employee->completeaddress->region === "Region XII" ? "Selected" : "" }}>Region XII</option>
                                                        <option value="Region XIII" {{ $employee->completeaddress->region === "Region XIII" ? "Selected" : "" }}>Region XIII</option>
                                                        <option value="ARMM" {{ $employee->completeaddress->region === "ARMM" ? "Selected" : "" }}>ARMM</option>
                                                    </select>
                                                    <p class="text-danger small">@error('region') {{ $message }} @enderror</p>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="small mb-1" for="zip">ZIP Code</label>
                                                    <input class="form-control" id="zip" value="{{ old('zip_code') ? old('zip_code') : $employee->completeaddress->zip_code }}" name="zip_code" type="text" placeholder="Enter ZIP Code" />
                                                    <p class="text-danger small">@error('zip_code') {{ $message }} @enderror</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" role="tabpanel" id="tab-4">
                                <div class="card shadow mb-3">
                                    <div class="card-header py-3">
                                        <p class="text-primary m-0 font-weight-bold">Mother's Information</p>
                                    </div>
                                    <div class="card-body">
                                        <div class="form-row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="small mb-1" for="inputFirstName">Mother's Maiden First Name</label>
                                                    <input class="form-control" id="inputFirstName" value="{{ old('m_first_name') ? old('m_first_name') : $employee->additionalinformation->m_first_name }}" name="m_first_name" type="text" placeholder="Enter first name" />
                                                    <p class="text-danger small">@error('m_first_name') {{ $message }} @enderror</p>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="small mb-1" for="inputLastName">Mother's Maiden Last Name</label>
                                                    <input class="form-control" id="inputLastName" value="{{ old('m_last_name') ? old('m_last_name') : $employee->additionalinformation->m_last_name }}" name="m_last_name" type="text" placeholder="Enter last name" />
                                                    <p class="text-danger small">@error('m_last_name') {{ $message }} @enderror</p>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="small mb-1" for="inputMiddleName">Mother's Maiden Middle Name</label>
                                                    <input class="form-control" id="inputMiddleName" value="{{ old('m_middle_name') ? old('m_middle_name') : $employee->additionalinformation->m_middle_name }}" name="m_middle_name" type="text" placeholder="Enter middle name" />
                                                    <p class="text-danger small">@error('m_middle_name') {{ $message }} @enderror</p>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="small mb-1" for="inputSuffix">Mother's Maiden Suffix</label>
                                                    <input class="form-control" id="inputSuffix" value="{{ old('m_suffix') ? old('m_suffix') : $employee->additionalinformation->m_suffix }}" name="m_suffix" type="text" placeholder="Enter name suffix" />
                                                    <p class="text-danger small">@error('m_suffix') {{ $message }} @enderror</p>
                                                </div>
                                            </div>
                                        </div>
                                        <p class="font-weight-bold h3 mt-4">In Case of Emergency</p>
                                        <hr>
                                        <div class="form-row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="small mb-1" for="econtactperson">Full Name of Contact Person</label>
                                                    <input class="form-control item" id="econtactperson" value="{{ old('e_contact_person') ? old('e_contact_person') : $employee->additionalinformation->e_contact_person }}" name="e_contact_person" type="text" placeholder="Enter Contact Person" />
                                                    <p class="text-danger small">@error('e_contact_person') {{ $message }} @enderror</p>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="small mb-1" for="mobile-number">Contact Number</label>
                                                    <input class="form-control item" id="mobile-number" value="{{ old('e_mobile_number') ? old('e_mobile_number') : $employee->additionalinformation->e_mobile_number }}" name="e_mobile_number" type="text" placeholder="0000-000-0000" />
                                                    <p class="text-danger small">@error('e_mobile_number') {{ $message }} @enderror</p>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" role="tabpanel" id="tab-5">
                                <div class="card shadow mb-3">
                                    <div class="card-header py-3">
                                        <p class="text-primary m-0 font-weight-bold">Government Issued Numbers</p>
                                    </div>
                                    <div class="card-body">
                                        <div class="form-row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="small mb-1" for="sss">SSS Number</label>
                                                    <input class="form-control item" id="sss" value="{{ old('sss') ? old('sss') : $employee->contributionnumber->sss }}" name="sss" type="text" placeholder="00-000000000-0" />
                                                    <p class="text-danger small">@error('sss') {{ $message }} @enderror</p>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="small mb-1" for="gender">PhilHealth Number</label>
                                                    <input class="form-control item" id="philhealth" value="{{ old('philhealth') ? old('philhealth') : $employee->contributionnumber->philhealth }}" name="philhealth" type="text" placeholder="00-000000000-0" />
                                                    <p class="text-danger small">@error('philhealth') {{ $message }} @enderror</p>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="small mb-1" for="st">HDMF Number</label>
                                                    <input class="form-control item" id="pagibig" value="{{ old('pagibig') ? old('pagibig') : $employee->contributionnumber->pagibig }}" name="pagibig" type="text" placeholder="0000-0000-0000" />
                                                    <p class="text-danger small">@error('pagibig') {{ $message }} @enderror</p>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="small mb-1" for="province">TIN Number</label>
                                                    <input class="form-control item" id="tin" value="{{ old('tin') ? old('tin') : $employee->contributionnumber->tin }}" name="tin" type="text" placeholder="000-000-000" />
                                                    <p class="text-danger small">@error('tin') {{ $message }} @enderror</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" role="tabpanel" id="tab-6">
                                <div class="card shadow mb-3">
                                    <div class="card-header py-3">
                                        <p class="text-primary m-0 font-weight-bold">Employee Profile</p>
                                    </div>
                                    <div class="card-body">
                                        <div class="form-row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="small mb-1" for="position">Employee Position</label>
                                                    <input class="form-control" id="position" type="text" value="{{ old('position') ? old('position') : $employee->employeeprofile->position }}" name="position" placeholder="Enter Employee Position" />
                                                    <p class="text-danger small">@error('position') {{ $message }} @enderror</p>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="small mb-1" for="employment_status">Employment Status</label>
                                                    <input class="form-control" id="employment_status" type="text" value="{{ old('employment_status') ? old('employment_status') : $employee->employeeprofile->employment_status }}" name="employment_status" placeholder="Enter Employment Status" />
                                                    <p class="text-danger small">@error('employment_status') {{ $message }} @enderror</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="small mb-1" for="date_hired">Date Hired</label>
                                                    <input class="form-control" id="date_hired" type="text" value="{{ old('date_hired') ? old('date_hired') : $employee->employeeprofile->date_hired }}" name="date_hired" placeholder="Enter Date Hired" />
                                                    <p class="text-danger small">@error('date_hired') {{ $message }} @enderror</p>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="small mb-1" for="store_assignment">Store Assignment</label>
                                                    <input class="form-control" id="store_assignment" type="text" value="{{ old('store_assignment') ? old('store_assignment') : $employee->employeeprofile->store_assignment }}" name="store_assignment" placeholder="Enter Store Assignement" />
                                                    <p class="text-danger small">@error('store_assignment') {{ $message }} @enderror</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="small mb-1" for="immediate_supervisor">Immediate Supervisor</label>
                                                    <input class="form-control" id="immediate_supervisor" type="text" value="{{ old('immediate_supervisor') ? old('immediate_supervisor') : $employee->employeeprofile->immediate_supervisor }}" name="immediate_supervisor" placeholder="Enter Immediate Supervisor" />
                                                    <p class="text-danger small">@error('immediate_supervisor') {{ $message }} @enderror</p>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="form-row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="small mb-1" for="client_group">Basic Pay</label>
                                                    <input class="form-control" id="client_group" type="text" value="{{ old('basic_pay') ? old('basic_pay') : $employee->employeeprofile->basic_pay }}" name="basic_pay" placeholder="PHP 0.00" />
                                                    <p class="text-danger small">@error('basic_pay') {{ $message }} @enderror</p>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="small mb-1" for="ecola">Ecola</label>
                                                    <input class="form-control" id="ecola" type="text" value="{{ old('ecola') ? old('ecola') : $employee->employeeprofile->ecola }}" name="ecola" placeholder="Enter Ecola" />
                                                    <p class="text-danger small">@error('ecola') {{ $message }} @enderror</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="small mb-1" for="billing_group">Billing Group</label>
                                                    <input class="form-control" id="billing_group" type="text" value="{{ old('billing_group') ? old('billing_group') : $employee->employeeprofile->billing_group }}" name="billing_group" placeholder="Enter Billing Group" />
                                                    <p class="text-danger small">@error('billing_group') {{ $message }} @enderror</p>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="small mb-1" for="client_group">Client Group</label>
                                                    <input class="form-control" id="client_group" type="text" value="{{ old('client_group') ? old('client_group') : $employee->employeeprofile->client_group }}" name="client_group" placeholder="Enter Client Group" />
                                                    <p class="text-danger small">@error('client_group') {{ $message }} @enderror</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="small mb-1" for="mcrs">MCRS</label>
                                                    <input class="form-control" id="mcrs" type="text" value="{{ old('mcrs') ? old('mcrs') : $employee->employeeprofile->mcrs }}" name="mcrs" placeholder="Enter MCRS" />
                                                    <p class="text-danger small">@error('mcrs') {{ $message }} @enderror</p>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="small mb-1" for="payroll_code">Payroll Code</label>
                                                    <input class="form-control" id="payroll_code" type="text" value="{{ old('payroll_code') ? old('payroll_code') : $employee->employeeprofile->payroll_code }}" name="payroll_code" placeholder="Enter Payroll Code" />
                                                    <p class="text-danger small">@error('payroll_code') {{ $message }} @enderror</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" role="tabpanel" id="tab-7">
                                <div class="card shadow mb-3">
                                    <div class="card-header py-3">
                                        <p class="text-primary m-0 font-weight-bold">ATM Account</p>
                                    </div>
                                    <div class="card-body">
                                        <div class="form-row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="small mb-1" for="card_holder">Card Holder</label>
                                                    <input class="form-control item" id="card_holder" type="text" value="{{ old('card_holder') ? old('card_holder') : $employee->atmrecord->card_holder }}" name="card_holder" placeholder="Card Holder">
                                                    <p class="text-danger small">@error('card_holder') {{ $message }} @enderror</p>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="small mb-1" for="card_number">Card Number</label>
                                                    <input class="form-control item" id="card_number" type="text" value="{{ old('card_number') ? old('card_number') : $employee->atmrecord->card_number }}" name="card_number" placeholder="0000-0000-0000-0000">
                                                    <p class="text-danger small">@error('card_number') {{ $message }} @enderror</p>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="small mb-1" for="expiry_date">Expiration date</label>
                                                    <div class="input-group expiration-date">
                                                        <input class="form-control item" id="expiry_date" type="text" value="{{ old('expiry_date') ? old('expiry_date') : $employee->atmrecord->expiry_date }}" name="expiry_date" placeholder="MM/YY">
                                                    </div>
                                                    <p class="text-danger small">@error('expiry_date') {{ $message }} @enderror</p>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="small mb-1">CVC</label>
                                                    <input class="form-control item" id="cvc" type="text" value="{{ old('cvc') ? old('cvc') : $employee->atmrecord->cvc }}" name="cvc" placeholder="CVC">
                                                    <p class="text-danger small">@error('cvc') {{ $message }} @enderror</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endsection
