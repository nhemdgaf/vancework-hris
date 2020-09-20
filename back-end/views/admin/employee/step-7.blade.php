@extends('layouts.app')
@section('title', '201 : Admin - Vancework')
<!-- parameter for each template -->
@section('step_7', 'active')
@section('content')
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
@endsection
