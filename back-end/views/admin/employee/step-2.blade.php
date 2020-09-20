@extends('layouts.app')
@section('title', '201 : Admin - Vancework')
<!-- parameter for each template -->
@section('step_2', 'active')
@section('content')
<div class="col-lg-8 mb-5">
    <form action="/create-step-2" method="post" autocomplete="off">
        @csrf
        <div class="tab-content" id="v-pills-tabContent">
            <!-- Contact Info -->
            <div class="tab-pane fade show active" id="v-pills-contact-details" role="tabpanel" aria-labelledby="v-pills-contact-details-tab">
                <div class="card shadow-lg border-0 rounded-lg">
                    <div class="card-body">
                        <p class="font-weight-bold h3">Contact Details</p>
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
            </div>

            <div class="row justify-content-center align-items-center d-flex">
                <div class="col-4 mb-3 justify-content-center align-items-center d-flex">
                    <div class="btn-group mt-4 ">
                        <!-- <button type="button" class="btn btn-primary btn-md next mx-1 px-3" id="prevBtn" onclick="nextPrev(-1)">Back</button> -->
                        <!-- <button type="button" class="btn btn-primary btn-md next mx-1 px-3" id="nextBtn" onclick="nextPrev(1)">Next</button> -->
                        <button type="button" class="btn btn-primary mx-1"><a href="create-step-1" class="text-white text-decoration-none">Previous</a></button>
                        <button type="submit" class="btn btn-primary mx-1">Continue</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
