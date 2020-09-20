@extends('layouts.app')
@section('title', '201 : Admin - Vancework')
<!-- parameter for each template -->
@section('step_4', 'active')
@section('content')
<div class="col-lg-8 mb-5">
    <form action="/create-step-4" method="post" autocomplete="off">

        @csrf

        <div class="tab-content" id="v-pills-tabContent">

            <!-- Additional Info -->
            <div class="tab-pane fade show active" id="v-pills-add-information" role="tabpanel" aria-labelledby="v-pills-add-information-tab">
                <div class="card shadow-lg border-0 rounded-lg">
                    <div class="card-body">
                        <p class="font-weight-bold h3">Mother's Information</p>
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
                        <p class="font-weight-bold h3 mt-4">In Case of Emergency</p>
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
            </div>

            <div class="row justify-content-center align-items-center d-flex">
                <div class="col-4 mb-3 justify-content-center align-items-center d-flex">
                    <div class="btn-group mt-4 ">
                        <!-- <button type="button" class="btn btn-primary btn-md next mx-1 px-3" id="prevBtn" onclick="nextPrev(-1)">Back</button> -->
                        <!-- <button type="button" class="btn btn-primary btn-md next mx-1 px-3" id="nextBtn" onclick="nextPrev(1)">Next</button> -->
                        <button type="button" class="btn btn-primary mx-1"><a href="create-step-3" class="text-white text-decoration-none">Previous</a></button>
                        <button type="submit" class="btn btn-primary mx-1">Continue</button>
                    </div>
                </div>
            </div>

        </div>
    </form>
</div>
@endsection
