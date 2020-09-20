@extends('layouts.app')
@section('title', '201 : Admin - Vancework')
@section('content')
<div class="container-fluid">
    <h3 class="text-dark mb-4">201 ENCODING</h3>
    <div class="row ">
        <div class="col-lg-4">
            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                <a class="nav-link active" id="v-pills-personal-information-tab" data-toggle="pill" href="#v-pills-personal-information" role="tab" aria-controls="v-pills-personal-information" aria-selected="true">Personal Information</a>
                <a class="nav-link" id="v-pills-contact-details-tab" data-toggle="pill" href="#v-pills-contact-details" role="tab" aria-controls="v-pills-contact-details" aria-selected="false">Contact Details </a>
                <a class="nav-link" id="v-pills-complete-address-tab" data-toggle="pill" href="#v-pills-complete-address" role="tab" aria-controls="v-pills-complete-address" aria-selected="false">Complete Address</a>
                <a class="nav-link" id="v-pills-add-information-tab" data-toggle="pill" href="#v-pills-add-information" role="tab" aria-controls="v-pills-add-information" aria-selected="false">Additional Information</a>
                <a class="nav-link" id="v-pills-contribution-number-tab" data-toggle="pill" href="#v-pills-contribution-number" role="tab" aria-controls="v-pills-contribution-number" aria-selected="false">Contribution Number</a>
                <a class="nav-link" id="v-pills-employee-profile-tab" data-toggle="pill" href="#v-pills-employee-profile" role="tab" aria-controls="v-pills-employee-profile" aria-selected="false">Employee Profile</a>
                <a class="nav-link" id="v-pills-atm-acc-tab" data-toggle="pill" href="#v-pills-atm-acc" role="tab" aria-controls="v-pills-atm-acc" aria-selected="false">ATM Record</a>
            </div>
        </div>
        <div class="col-lg-8 mb-5">
            <form autocomplete="off">
                <div class="tab-content" id="v-pills-tabContent">

                    <!-- Personal Information -->
                    <div class="tab-pane fade show active" id="v-pills-personal-information" role="tabpanel" aria-labelledby="v-pills-personal-information">
                        <div class="card shadow-lg border-0 rounded-lg">
                            <div class="card-body">
                                <p class="font-weight-bold"> Personal Information</p>
                                <hr>
                                <div class="form-row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="small mb-1" for="">Employee Number</label>
                                            <input class="form-control" id="" type="text" placeholder="Enter Employee Number" required />
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="small mb-1" for="inputFirstName">First Name</label>
                                            <input class="form-control" id="inputFirstName" type="text" placeholder="Enter first name" />
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="small mb-1" for="inputLastName">Last Name</label>
                                            <input class="form-control" id="inputLastName" type="text" placeholder="Enter last name" />
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="small mb-1" for="inputMiddleName">Middle Name</label>
                                            <input class="form-control" id="inputMiddleName" type="text" placeholder="Enter middle name" />
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="small mb-1" for="inputSuffix">
                                                Suffix
                                            </label>
                                            <input class="form-control" id="inputSuffix" type="text" placeholder="Enter name suffix" />
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label class="small mb-1" for="bday">Date of Birth</label>
                                            <input class="form-control item" id="bday" placeholder="Date" type="text" />
                                        </div>
                                    </div>
                                    <div class="col-md-2">
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
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="small mb-1" for="age">Age</label>
                                            <input class="form-control item" id="age" type="" />
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div>
                                            <label class="small" for="">Gender</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                                            <label class="form-check-label small mb-1" for="inlineRadio1">Male</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input " type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                                            <label class="form-check-label small mb-1" for="">Female</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="small mb-1" for="religion">Religion</label>
                                            <input class="form-control" id="religion" type="datepicker" placeholder="Enter Religion" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="small mb-1" for="Citizenship">Citizenship</label>
                                            <input class="form-control" id="Citizenship" type="text" placeholder="Enter Citizenship" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="small mb-1" for="pob">Place of Birth</label>
                                            <input class="form-control" id="pob" type="text" placeholder="Enter Place of Birth" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="small mb-1" for="status">Civil Status</label>
                                            <select class="form-control" id="status">
                                                <option>Single</option>
                                                <option>Married</option>
                                                <option>Widowed</option>
                                                <option>Legally Separated</option>
                                                <option>Others</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="col-md-2 offset-md-9">
                                <div class="form-group mt-4">
                                    <a class="btn btn-primary btn-block" href="">Next</a>
                                </div>
                            </div> -->
                        </div>
                    </div>

                    <!-- Contact Info -->
                    <div class="tab-pane fade" id="v-pills-contact-details" role="tabpanel" aria-labelledby="v-pills-contact-details-tab">
                        <div class="card shadow-lg border-0 rounded-lg">
                            <div class="card-body">
                                <p class="font-weight-bold h3">Contact Details</p>
                                <hr>
                                <div class="form-row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="small mb-1" for="email">Email Address:</label>
                                            <input class="form-control" id="email" type="text" placeholder="Enter Email Address" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="small mb-1" for="phone-number">Landline Number</label>
                                            <input class="form-control item" id="phone-number" type="text" placeholder="0000-0000" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="small mb-1" for="mobile-number">Phone Number</label>
                                            <input class="form-control item" id="mobile-number" type="text" placeholder="0000-000-0000" />
                                        </div>
                                    </div>
                                </div>
                                <!-- <div class="col-md-3 offset-md-9">
                                    <div class="btn-group mt-4">
                                        <button type="button" class="btn btn-primary btn-md">Back</button>
                                        <button type="button" class="btn btn-primary btn-md">Next</button>
                                    </div>
                                </div> -->
                            </div>
                        </div>
                    </div>


                    <!-- Address -->
                    <div class="tab-pane fade" id="v-pills-complete-address" role="tabpanel" aria-labelledby="v-pills-complete-address-tab">
                        <div class="card shadow-lg border-0 rounded-lg">
                            <div class="card-body">
                                <p class="font-weight-bold h3">Complete Address</p>
                                <hr>
                                <div class="form-row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="small mb-1" for="stno">Street Number</label>
                                            <input class="form-control" id="stno" type="text" placeholder="Enter Street Number" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="small mb-1" for="street">Street</label>
                                            <input class="form-control" id="street" type="text" placeholder="Enter Street" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="small mb-1" for="city">City</label>
                                            <input class="form-control" id="city" type="datepicker" placeholder="Enter City" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="small mb-1" for="state">State</label>
                                            <input class="form-control" id="state" type="text" placeholder="Enter State" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="small mb-1" for="">Region</label>
                                            <select class="form-control" id="">
                                                <option>NCR</option>
                                                <option>CAR</option>
                                                <option>Region I</option>
                                                <option>Region II</option>
                                                <option>Region III</option>
                                                <option>Region IV-A</option>
                                                <option>Region IV-B</option>
                                                <option>Region V</option>
                                                <option>Region VI</option>
                                                <option>Region VII</option>
                                                <option>Region VIII</option>
                                                <option>Region IX</option>
                                                <option>Region X</option>
                                                <option>Region XI</option>
                                                <option>Region XII</option>
                                                <option>Region XIII</option>
                                                <option>BARMM</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="small mb-1" for="zip">ZIP Code</label>
                                            <input class="form-control" id="zip" type="text" placeholder="Enter ZIP Code" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="col-md-3 offset-md-9 mb-3">
                                <div class="btn-group mt-4 ">
                                    <button type="button" class="btn btn-primary btn-md">Back</button>
                                    <button type="button" class="btn btn-primary btn-md">Next</button>
                                </div>
                            </div> -->
                        </div>
                    </div>

                    <!-- Mother's Info -->
                    <div class="tab-pane fade" id="v-pills-add-information" role="tabpanel" aria-labelledby="v-pills-add-information-tab">
                        <div class="card shadow-lg border-0 rounded-lg">
                            <div class="card-body">
                                <p class="font-weight-bold h3">Mother's Information</p>
                                <hr>
                                <div class="form-row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="small mb-1" for="inputFirstName">Mother's Maiden First Name</label>
                                            <input class="form-control" id="inputFirstName" type="text" placeholder="Enter first name" />
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="small mb-1" for="inputLastName">Last Name</label>
                                            <input class="form-control" id="inputLastName" type="text" placeholder="Enter last name" />
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="small mb-1" for="inputMiddleName">Middle Name</label>
                                            <input class="form-control" id="inputMiddleName" type="text" placeholder="Enter middle name" />
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="small mb-1" for="inputSuffix">
                                                Suffix
                                            </label>
                                            <input class="form-control" id="inputSuffix" type="text" placeholder="Enter name suffix" />
                                        </div>
                                    </div>
                                </div>
                                <p class="font-weight-bold h3">In Case of Emergency</p>
                                <hr>
                                <div class="form-row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="small mb-1" for="econtactperson">Full Name of Contact Person</label>
                                            <input class="form-control item" id="econtactperson" type="text" placeholder="Enter Contact Person" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="small mb-1" for="mobile-number">Contact Number</label>
                                            <input class="form-control item" id="mobile-number" type="text" placeholder="0000-000-0000" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="col-md-3 offset-md-9 mb-3">
                                <div class="btn-group mt-4 ">
                                    <button type="button" class="btn btn-primary btn-md">Back</button>
                                    <button type="button" class="btn btn-primary btn-md">Next</button>
                                </div>
                            </div> -->
                        </div>
                    </div>

                    <!-- Contribution Numbers -->
                    <div class="tab-pane fade" id="v-pills-contribution-number" role="tabpanel" aria-labelledby="v-pills-contribution-number-tab">
                        <div class="card shadow-lg border-0 rounded-lg">
                            <div class="card-body">
                                <p class="font-weight-bold h3">Government Issued Numbers</p>
                                <hr>
                                <div class="form-row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="small mb-1" for="sss">SSS Number</label>
                                            <input class="form-control item" id="sss" type="text" placeholder="00-000000000-0" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="small mb-1" for="gender">PhilHealth Number</label>
                                            <input class="form-control item" id="philhealth" type="text" placeholder="00-000000000-0" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="small mb-1" for="st">HDMF Number</label>
                                            <input class="form-control item" id="pagibig" type="datepicker" placeholder="0000-0000-0000" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="small mb-1" for="province">TIN Number</label>
                                            <input class="form-control item" id="tin" type="text" placeholder="000-000-000" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="col-md-3 offset-md-9 mb-3">
                                <div class="btn-group mt-4 ">
                                    <button type="button" class="btn btn-primary btn-md">Back</button>
                                    <button type="button" class="btn btn-primary btn-md">Next</button>
                                </div>
                            </div> -->
                        </div>
                    </div>

                    <!-- Employee Profile -->
                    <div class="tab-pane fade" id="v-pills-employee-profile" role="tabpanel" aria-labelledby="v-pills-employee-profile-tab">
                        <div class="card shadow-lg border-0 rounded-lg">
                            <div class="card-body">
                                <p class="font-weight-bold h3">Employee Profile</p>
                                <hr>
                                <div class="form-row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="small mb-1" for="">Store Assignment</label>
                                            <input class="form-control" id="" type="text" placeholder="Enter Employee Number" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="small mb-1" for="">Employee Position</label>
                                            <input class="form-control" id="" type="text" placeholder="Enter Employee Position" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="small mb-1" for="">Employment Status</label>
                                            <input class="form-control" id="" type="text" placeholder="Enter Employment Status" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="small mb-1" for="">Basic Pay</label>
                                            <input class="form-control" id="" type="text" placeholder="PHP 0.00" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="small mb-1" for="">Ecola</label>
                                            <input class="form-control" id="" type="text" placeholder="Enter Ecola" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="small mb-1" for="">Billing Group</label>
                                            <input class="form-control" id="" type="text" placeholder="Enter Billing Group" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="small mb-1" for="">Client Group</label>
                                            <input class="form-control" id="" type="text" placeholder="Enter Client Group" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="small mb-1" for="">MCRS</label>
                                            <input class="form-control" id="" type="text" placeholder="Enter MCRS" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="small mb-1" for="">Payroll Code</label>
                                            <input class="form-control" id="" type="text" placeholder="Enter Payroll Code" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="col-md-3 offset-md-9 mb-3">
                                <div class="btn-group mt-4 ">
                                    <button type="button" class="btn btn-primary btn-md">Back</button>
                                    <button type="button" class="btn btn-primary btn-md">Next</button>
                                </div>
                            </div> -->
                        </div>
                    </div>

                    <!-- ATM Info -->
                    <div class="tab-pane fade" id="v-pills-atm-acc" role="tabpanel" aria-labelledby="v-pills-atm-acc-tab">
                        <div class="card shadow-lg border-0 rounded-lg">
                            <div class="card-body">
                                <p class="font-weight-bold h3">ATM Account</p>
                                <hr>
                                <div class="form-row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="small mb-1">Card Holder</label>
                                            <input class="form-control" type="text" placeholder="Card Holder">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="small mb-1">Card Number</label>
                                            <input class="form-control item" type="text" id="atm" placeholder="0000-0000-0000-0000">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="small mb-1">Expiration date</label>
                                            <div class="input-group expiration-date">
                                                <input class="form-control item" type="text" id="atm_mm_yy" placeholder="MM/YY">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="small mb-1">CVC</label>
                                            <input class="form-control item" type="text" id="atm_cvc" placeholder="CVC">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="col-md-3 offset-md-9 mb-3">
                                <div class="btn-group mt-4 ">
                                    <button type="button" class="btn btn-primary btn-md">Back</button>
                                    <a href="post-record.html">
                                        <button type="button" class="btn btn-primary btn-md">Next</button>
                                    </a>
                                </div>
                            </div> -->
                        </div>
                    </div>

                    <div class="row justify-content-center align-items-center d-flex">
                        <div class="col-4 mb-3 justify-content-center align-items-center d-flex">
                            <div class="btn-group mt-4 ">
                                <button type="button" class="btn btn-primary btn-md next mx-1 px-3" id="prevBtn" onclick="nextPrev(-1)">Back</button>
                                <button type="button" class="btn btn-primary btn-md next mx-1 px-3" id="nextBtn" onclick="nextPrev(1)">Next</button>
                            </div>
                        </div>
                    </div>

                </div>
            </form>
        </div>
    </div>
</div>
@endsection
