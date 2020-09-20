@extends('layouts.app')
@section('title', '201 : Admin - Vancework')
@section('content')
<div class="container-fluid">
    <h3 class="text-dark mb-4">201 ENCODING</h3>
    <div class="row ">
        <div class="col-lg-4">
            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                <a class="nav-link active" id="v-pills-personal-information-tab" href="create-step-1" aria-controls="v-pills-personal-information" aria-selected="true">Personal Information</a>
                <a class="nav-link" id="v-pills-contact-details-tab" href="create-step-2" aria-controls="v-pills-contact-details" aria-selected="false">Contact Details </a>
                <a class="nav-link" id="v-pills-complete-address-tab" href="create-step-3" aria-controls="v-pills-complete-address" aria-selected="false">Complete Address</a>
                <a class="nav-link" id="v-pills-add-information-tab" href="create-step-4" aria-controls="v-pills-add-information" aria-selected="false">Additional Information</a>
                <a class="nav-link" id="v-pills-contribution-number-tab" href="create-step-5" aria-controls="v-pills-contribution-number" aria-selected="false">Contribution Number</a>
                <a class="nav-link" id="v-pills-employee-profile-tab" href="create-step-6" aria-controls="v-pills-employee-profile" aria-selected="false">Employee Profile</a>
                <a class="nav-link" id="v-pills-atm-acc-tab" href="create-step-7" aria-controls="v-pills-atm-acc" aria-selected="false">ATM Record</a>
                <a class="nav-link" id="v-pills-review-details-tab" href="create-step-8" aria-controls="v-pills-review-details" aria-selected="true">Review Details</a>
            </div>
        </div>
        <div class="col-lg-8 mb-5">
            <form action="/create-step-1" method="post" autocomplete="off">
                @csrf
                <div class="tab-content" id="v-pills-tabContent">
                    <!-- Personal Information -->
                    <div class="tab-pane fade show active" id="v-pills-personal-information" role="tabpanel" aria-labelledby="v-pills-personal-information">
                        <div class="card shadow-lg border-0 rounded-lg">
                            <div class="card-body">
                                <p class="font-weight-bold h3"> Personal Information</p>
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
                                            <p class="text-danger small">@error('first_name') {{ $message }} @enderror</p>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="small mb-1" for="inputLastName">Last Name</label>
                                            <input class="form-control" id="inputLastName" value="{{ session()->get('employee.last_name') }}" type="text" placeholder="Enter last name" name="last_name" />
                                            <p class="text-danger small">@error('last_name') {{ $message }} @enderror</p>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="small mb-1" for="inputMiddleName">Middle Name</label>
                                            <input class="form-control" id="inputMiddleName" value="{{ session()->get('employee.middle_name') }}" type="text" placeholder="Enter middle name" name="middle_name" />
                                            <p class="text-danger small">@error('middle_name') {{ $message }} @enderror</p>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="small mb-1" for="inputSuffix">
                                                Suffix
                                            </label>
                                            <input class="form-control" id="inputSuffix" value="{{ session()->get('employee.suffix') }}" type="text" placeholder="Enter name suffix" name="suffix" />
                                            <p class="text-danger small">@error('suffix') {{ $message }} @enderror</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="small mb-1" for="bday">Date of Birth</label>
                                            <input class="form-control item" id="bday" value="{{ session()->get('employee.date_of_birth') }}" type="date" placeholder="Date" name="date_of_birth" />
                                            <p class="text-danger small">@error('date_of_birth') {{ $message }} @enderror</p>
                                        </div>
                                    </div>
                                    <!-- <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="month"></label>
                                            <select class="form-control item" id="month">
                                                <option disabled>Month</option>
                                                <option value="January">January</option>
                                                <option value="February">February</option>
                                                <option value="March">March</option>
                                                <option value="April">April</option>
                                                <option value="May">May</option>
                                                <option value="June">June</option>
                                                <option value="July">July</option>
                                                <option value="August">August</option>
                                                <option value="September">September</option>
                                                <option value="October">October</option>
                                                <option value="November">November</option>
                                                <option value="December">December</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label class="small mb-1" for="ydate"></label>
                                            <input class="form-control item" id="ydate" placeholder="Year" type="text" />
                                        </div>
                                    </div> -->
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="small mb-1" for="age">Age</label>
                                            <input class="form-control item" id="age" value="{{ session()->get('employee.age') }}" type="number" placeholder="Enter Age" name="age" />
                                            <p class="text-danger small">@error('age') {{ $message }} @enderror</p>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div>
                                            <label class="small" for="">Gender</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <!-- {{ $gender = session()->get('employee.gender') }} -->
                                            <input class="form-check-input" type="radio" name="gender" id="gender_male" value="1" {{ ($gender == 1 AND $gender != '') ? "checked" : "" }}>
                                            <label class="form-check-label" for="inlineRadio1">Male</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="gender" id="gender_female" value="0" {{ ($gender == 0 AND $gender != '') ? "checked" : "" }}>
                                            <label class="form-check-label" for="">Female</label>
                                        </div>
                                        <p class="text-danger small">@error('gender') {{ $message }} @enderror</p>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="small mb-1" for="religion">Religion</label>
                                            <input class="form-control" id="religion" value="{{ session()->get('employee.religion') }}" type="text" placeholder="Enter Religion" name="religion" />
                                            <p class="text-danger small">@error('religion') {{ $message }} @enderror</p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="small mb-1" for="Citizenship">Citizenship</label>
                                            <input class="form-control" id="Citizenship" value="{{ session()->get('employee.citizenship') }}" type="text" placeholder="Enter Citizenship" name="citizenship" />
                                            <p class="text-danger small">@error('citizenship') {{ $message }} @enderror</p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="small mb-1" for="pob">Place of Birth</label>
                                            <input class="form-control" id="pob" value="{{ session()->get('employee.place_of_birth') }}" type="text" placeholder="Enter Place of Birth" name="place_of_birth" />
                                            <p class="text-danger small">@error('place_of_birth') {{ $message }} @enderror</p>
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
                                            <p class="text-danger small">@error('civil_status') {{ $message }} @enderror</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row justify-content-center align-items-center d-flex">
                        <div class="col-4 mb-3 justify-content-center align-items-center d-flex">
                            <div class="btn-group mt-4 ">
                                <!-- <button type="button" class="btn btn-primary btn-md next mx-1 px-3" id="prevBtn" onclick="nextPrev(-1)">Back</button> -->
                                <!-- <button type="button" class="btn btn-primary btn-md next mx-1 px-3" id="nextBtn" onclick="nextPrev(1)">Next</button> -->
                                <button type="submit" class="btn btn-primary">Continue</button>
                            </div>
                        </div>
                    </div>

                </div>
            </form>
        </div>
    </div>
</div>
@endsection
