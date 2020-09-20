@extends('layouts.app')
@section('title', '201 : Admin - Vancework')
<!-- parameter for each template -->
@section('step_6', 'active')
@section('201', 'active')

@section('heading')
<h3 class="text-dark mb-4 ml-2">201 Encoding</h3>
@endsection

@section('content')
<div class="col-lg-8 mb-5">
    <form action="/employees/create-step-6" method="post" autocomplete="off">

        @csrf

        <div class="tab-content" id="v-pills-tabContent">
            <!-- Employee Profile -->
            <div class="tab-pane fade show active" id="v-pills-employee-profile" role="tabpanel" aria-labelledby="v-pills-employee-profile-tab">
                <div class="card shadow-lg border-0 rounded-lg">
                    <div class="card-body">
                        <p class="font-weight-bold h3">Employee Profile</p>
                        <hr>
                        <div class="form-row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="small mb-1" for="position">Employee Position</label>
                                    <input class="form-control" id="position" type="text" value="{{ old('position') ? old('position') : session()->get('employee_profile.position') }}" name="position" placeholder="Enter Employee Position" />
                                    <p class="text-danger small">@error('position') {{ $message }} @enderror</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="small mb-1" for="employment_status">Employment Status</label>
                                    <input class="form-control" id="employment_status" type="text" value="{{ old('employment_status') ? old('employment_status') : session()->get('employee_profile.employment_status') }}" name="employment_status" placeholder="Enter Employment Status" />
                                    <p class="text-danger small">@error('employment_status') {{ $message }} @enderror</p>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="small mb-1" for="date_hired">Date Hired</label>
                                    <input class="form-control" id="date_hired" type="text" value="{{ old('date_hired') ? old('date_hired') : session()->get('employee_profile.date_hired') }}" name="date_hired" placeholder="Enter Date Hired" />
                                    <p class="text-danger small">@error('date_hired') {{ $message }} @enderror</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="small mb-1" for="store_assignment">Store Assignment</label>
                                    <input class="form-control" id="store_assignment" type="text" value="{{ old('store_assignment') ? old('store_assignment') : session()->get('employee_profile.store_assignment') }}" name="store_assignment" placeholder="Enter Store Assignement" />
                                    <p class="text-danger small">@error('store_assignment') {{ $message }} @enderror</p>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="small mb-1" for="immediate_supervisor">Immediate Supervisor</label>
                                    <input class="form-control" id="immediate_supervisor" type="text" value="{{ old('immediate_supervisor') ? old('immediate_supervisor') : session()->get('employee_profile.immediate_supervisor') }}" name="immediate_supervisor" placeholder="Enter Immediate Supervisor" />
                                    <p class="text-danger small">@error('immediate_supervisor') {{ $message }} @enderror</p>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="form-row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="small mb-1" for="client_group">Basic Pay</label>
                                    <input class="form-control" id="client_group" type="text" value="{{ old('basic_pay') ? old('basic_pay') : session()->get('employee_profile.basic_pay') }}" name="basic_pay" placeholder="PHP 0.00" />
                                    <p class="text-danger small">@error('basic_pay') {{ $message }} @enderror</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="small mb-1" for="ecola">Ecola</label>
                                    <input class="form-control" id="ecola" type="text" value="{{ old('ecola') ? old('ecola') : session()->get('employee_profile.ecola') }}" name="ecola" placeholder="Enter Ecola" />
                                    <p class="text-danger small">@error('ecola') {{ $message }} @enderror</p>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="small mb-1" for="billing_group">Billing Group</label>
                                    <input class="form-control" id="billing_group" type="text" value="{{ old('billing_group') ? old('billing_group') : session()->get('employee_profile.billing_group') }}" name="billing_group" placeholder="Enter Billing Group" />
                                    <p class="text-danger small">@error('billing_group') {{ $message }} @enderror</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="small mb-1" for="client_group">Client Group</label>
                                    <input class="form-control" id="client_group" type="text" value="{{ old('client_group') ? old('client_group') : session()->get('employee_profile.client_group') }}" name="client_group" placeholder="Enter Client Group" />
                                    <p class="text-danger small">@error('client_group') {{ $message }} @enderror</p>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="small mb-1" for="mcrs">MCRS</label>
                                    <input class="form-control" id="mcrs" type="text" value="{{ old('mcrs') ? old('mcrs') : session()->get('employee_profile.mcrs') }}" name="mcrs" placeholder="Enter MCRS" />
                                    <p class="text-danger small">@error('mcrs') {{ $message }} @enderror</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="small mb-1" for="payroll_code">Payroll Code</label>
                                    <input class="form-control" id="payroll_code" type="text" value="{{ old('payroll_code') ? old('payroll_code') : session()->get('employee_profile.payroll_code') }}" name="payroll_code" placeholder="Enter Payroll Code" />
                                    <p class="text-danger small">@error('payroll_code') {{ $message }} @enderror</p>
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
                        <button type="button" class="btn btn-primary mx-1"><a href="create-step-5" class="text-white text-decoration-none">Previous</a></button>
                        <button type="submit" class="btn btn-primary mx-1">Continue</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
