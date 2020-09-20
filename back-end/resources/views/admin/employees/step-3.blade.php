@extends('layouts.app')
@section('title', '201 : Admin - Vancework')
<!-- parameter for each template -->
@section('step_3', 'active')
@section('201', 'active')

@section('heading')
<h3 class="text-dark mb-4 ml-2">201 Encoding</h3>
@endsection

@section('content')
<div class="col-lg-8 mb-5">
    <!-- form action will request a post request to the employee controller. See web.php in the routes folder-->
    <form action="/employees/create-step-3" method="post" autocomplete="off">
        @csrf
        <!-- Form token -->
        <div class="tab-content" id="v-pills-tabContent">
            <!-- Address -->
            <div class="tab-pane fade show active" id="v-pills-complete-address" role="tabpanel" aria-labelledby="v-pills-complete-address-tab">
                <div class="card shadow-lg border-0 rounded-lg">
                    <div class="card-body">
                        <p class="font-weight-bold h3">Complete Address</p>
                        <hr>
                        <div class="form-row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="small mb-1" for="house_number">House Number</label>
                                    <!-- store the value of this input, name == table column.  -->
                                    <input class="form-control" id="house_number" value="{{ old('house_number') ? old('house_number') : session()->get('complete_address.house_number') }}" type="text" placeholder="Enter House Number" name="house_number" />
                                    <!-- display error message if there's any -->
                                    <p class="text-danger small">@error('house_number') {{ $message }} @enderror</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="small mb-1" for="street">Street</label>
                                    <input class="form-control" id="street" value="{{ old('street') ? old('street') : session()->get('complete_address.street') }}" name="street" type="text" placeholder="Enter Street" />
                                    <p class="text-danger small">@error('street') {{ $message }} @enderror</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="small mb-1" for="city">City</label>
                                    <input class="form-control" id="city" value="{{ old('city') ? old('city') : session()->get('complete_address.city') }}" name="city" type="text" placeholder="Enter City" />
                                    <p class="text-danger small">@error('city') {{ $message }} @enderror</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="small mb-1" for="province">Province</label>
                                    <input class="form-control" id="province" value="{{ old('province') ? old('province') : session()->get('complete_address.province') }}" name="province" type="text" placeholder="Enter Province" />
                                    <p class="text-danger small">@error('province') {{ $message }} @enderror</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="small mb-1" for="">Region</label>
                                    <select class="form-control" id="" name="region">
                                        <!-- If complete_address.region is null echo "selected" -->
                                        <option disabled {{ session()->get('complete_address.region') === null ? "Selected" : "" }}>Select Region</option>
                                        <option value="NCR" {{ session()->get('complete_address.region') === "NCR" ? "Selected" : "" }}>NCR</option>
                                        <option value="CAR" {{ session()->get('complete_address.region') === "CAR" ? "Selected" : "" }}>CAR</option>
                                        <option value="Region I" {{ session()->get('complete_address.region') === "Region I" ? "Selected" : "" }}>Region I</option>
                                        <option value="Region II" {{ session()->get('complete_address.region') === "Region II" ? "Selected" : "" }}>Region II</option>
                                        <option value="Region III" {{ session()->get('complete_address.region') === "Region III" ? "Selected" : "" }}>Region III</option>
                                        <option value="Region IV-A" {{ session()->get('complete_address.region') === "Region IV-A" ? "Selected" : "" }}>Region IV-A</option>
                                        <option value="Region IV-B" {{ session()->get('complete_address.region') === "Region IV-B" ? "Selected" : "" }}>Region IV-B</option>
                                        <option value="Region V" {{ session()->get('complete_address.region') === "Region V" ? "Selected" : "" }}>Region V</option>
                                        <option value="Region VI" {{ session()->get('complete_address.region') === "Region VI" ? "Selected" : "" }}>Region VI</option>
                                        <option value="Region VII" {{ session()->get('complete_address.region') === "Region VII" ? "Selected" : "" }}>Region VII</option>
                                        <option value="Region VIII" {{ session()->get('complete_address.region') === "Region VIII" ? "Selected" : "" }}>Region VIII</option>
                                        <option value="Region IX" {{ session()->get('complete_address.region') === "Region IX" ? "Selected" : "" }}>Region IX</option>
                                        <option value="Region X" {{ session()->get('complete_address.region') === "Region X" ? "Selected" : "" }}>Region X</option>
                                        <option value="Region XI" {{ session()->get('complete_address.region') === "Region XI" ? "Selected" : "" }}>Region XI</option>
                                        <option value="Region XII" {{ session()->get('complete_address.region') === "Region XII" ? "Selected" : "" }}>Region XII</option>
                                        <option value="Region XIII" {{ session()->get('complete_address.region') === "Region XIII" ? "Selected" : "" }}>Region XIII</option>
                                        <option value="ARMM" {{ session()->get('complete_address.region') === "ARMM" ? "Selected" : "" }}>ARMM</option>
                                    </select>
                                    <p class="text-danger small">@error('region') {{ $message }} @enderror</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="small mb-1" for="zip">ZIP Code</label>
                                    <input class="form-control" id="zip" value="{{ old('zip_code') ? old('zip_code') : session()->get('complete_address.zip_code') }}" name="zip_code" type="text" placeholder="Enter ZIP Code" />
                                    <p class="text-danger small">@error('zip_code') {{ $message }} @enderror</p>
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

                        <!-- Go back to previous step -->
                        <button type="button" class="btn btn-primary mx-1"><a href="create-step-2" class="text-white text-decoration-none">Previous</a></button>
                        <!-- Continue to the next step -->
                        <button type="submit" class="btn btn-primary mx-1">Continue</button>
                    </div>
                </div>
            </div>

        </div>
    </form>
</div>
@endsection
