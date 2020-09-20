@extends('layouts.app')
@section('title', '201 : Admin - Vancework')
@section('content')
<div class="container-fluid">
    <h3 class="text-dark mb-4">201 ENCODING</h3>
    <div class="row ">
        <div class="col-lg-4">
            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                <a class="nav-link" id="v-pills-personal-information-tab" href="create-step-1" aria-controls="v-pills-personal-information" aria-selected="true">Personal Information</a>
                <a class="nav-link" id="v-pills-contact-details-tab" href="create-step-2" aria-controls="v-pills-contact-details" aria-selected="false">Contact Details </a>
                <a class="nav-link " id="v-pills-complete-address-tab" href="create-step-3" aria-controls="v-pills-complete-address" aria-selected="false">Complete Address</a>
                <a class="nav-link" id="v-pills-add-information-tab" href="create-step-4" aria-controls="v-pills-add-information" aria-selected="false">Additional Information</a>
                <a class="nav-link" id="v-pills-contribution-number-tab" href="create-step-5" aria-controls="v-pills-contribution-number" aria-selected="false">Contribution Number</a>
                <a class="nav-link" id="v-pills-employee-profile-tab" href="create-step-6" aria-controls="v-pills-employee-profile" aria-selected="false">Employee Profile</a>
                <a class="nav-link active" id="v-pills-atm-acc-tab" href="create-step-7" aria-controls="v-pills-atm-acc" aria-selected="false">ATM Record</a>
                <a class="nav-link" id="v-pills-review-details-tab" href="create-step-8" aria-controls="v-pills-review-details" aria-selected="true">Review Details</a>
            </div>
        </div>
        <div class="col-lg-8 mb-5">
            <form action="/create-step-7" method="post" autocomplete="off">

                @csrf

                <div class="tab-content" id="v-pills-tabContent">
                    <!-- ATM Info -->
                    <div class="tab-pane fade show active" id="v-pills-atm-acc" role="tabpanel" aria-labelledby="v-pills-atm-acc-tab">
                        <div class="card shadow-lg border-0 rounded-lg">
                            <div class="card-body">
                                <p class="font-weight-bold h3">ATM Account</p>
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
                                <!-- <button type="button" class="btn btn-primary btn-md next mx-1 px-3" id="prevBtn" onclick="nextPrev(-1)">Back</button> -->
                                <!-- <button type="button" class="btn btn-primary btn-md next mx-1 px-3" id="nextBtn" onclick="nextPrev(1)">Next</button> -->
                                <button type="button" class="btn btn-primary mx-1"><a href="create-step-6" class="text-white text-decoration-none">Previous</a></button>
                                <button type="submit" class="btn btn-primary mx-1">Review Details</button>
                            </div>
                        </div>
                    </div>

                </div>
            </form>
        </div>
    </div>
</div>
@endsection
