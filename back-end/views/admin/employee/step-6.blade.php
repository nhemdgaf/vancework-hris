@extends('layouts.app')
@section('title', '201 : Admin - Vancework')
<!-- parameter for each template -->
@section('step_6', 'active')
@section('content')
<div class="col-lg-8 mb-5">
    <form action="/create-step-6" method="post" autocomplete="off">

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
