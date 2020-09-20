@extends('layouts.app')
@section('title', '201 : Admin - Vancework')
<!-- parameter for each template -->
@section('step_5', 'active')
@section('content')
<div class="col-lg-8 mb-5">
    <form action="/create-step-5" method="post" autocomplete="off">

        @csrf

        <div class="tab-content" id="v-pills-tabContent">
            <!-- Contribution Numbers -->
            <div class="tab-pane fade show active" id="v-pills-contribution-number" role="tabpanel" aria-labelledby="v-pills-contribution-number-tab">
                <div class="card shadow-lg border-0 rounded-lg">
                    <div class="card-body">
                        <p class="font-weight-bold h3">Government Issued Numbers</p>
                        <hr>
                        <div class="form-row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="small mb-1" for="sss">SSS Number</label>
                                    <input class="form-control item" id="sss" value="{{ session()->get('employee.sss') }}" name="sss" type="text" placeholder="00-000000000-0" />
                                    <p class="text-danger small">@error('sss') {{ $message }} @enderror</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="small mb-1" for="gender">PhilHealth Number</label>
                                    <input class="form-control item" id="philhealth" value="{{ session()->get('employee.philhealth') }}" name="philhealth" type="text" placeholder="00-000000000-0" />
                                    <p class="text-danger small">@error('philhealth') {{ $message }} @enderror</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="small mb-1" for="st">HDMF Number</label>
                                    <input class="form-control item" id="pagibig" value="{{ session()->get('employee.pagibig') }}" name="pagibig" type="text" placeholder="0000-0000-0000" />
                                    <p class="text-danger small">@error('pagibig') {{ $message }} @enderror</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="small mb-1" for="province">TIN Number</label>
                                    <input class="form-control item" id="tin" value="{{ session()->get('employee.tin') }}" name="tin" type="text" placeholder="000-000-000" />
                                    <p class="text-danger small">@error('tin') {{ $message }} @enderror</p>
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
                        <button type="button" class="btn btn-primary mx-1"><a href="create-step-4" class="text-white text-decoration-none">Previous</a></button>
                        <button type="submit" class="btn btn-primary mx-1">Continue</button>
                    </div>
                </div>
            </div>

        </div>
    </form>
</div>
@endsection
