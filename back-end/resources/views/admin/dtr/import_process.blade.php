@extends('layouts.app')
@section('title', 'Employee Record: Admin - Vancework')
@section('dtr', 'active')
@section('employee.nav', 'd-none')
@section('content')
<div class="container-fluid">
    @section('heading')
    <div class="d-sm-flex justify-content-start align-items-center mb-4">
        <h3 class="text-dark mb-0 mr-3 ml-2">DTR</h3>
    </div>
    @endsection
    <hr>
    <div class="row">
        <div class="col-xl-12 d-flex justify-content-start align-items-start mt-2">
            <h5>Cut-Off Period</h5>
        </div>


        {{ $csv_file_id }}
        <div class="col-xl-12">
            <form class="form-horizontal" method="POST" action="{{ route('dtr.saveCutOff') }}">
                @csrf
                <input type="hidden" name="csv_data_file_id" value="{{ (isset($csv_file_id)) ? $csv_file_id : '' }}" />

                <div class="form-group d-flex justify-content-start align-items-start col-xl-6">
                    <label class="date-label" for="cutoff_date">Please select cut-off period:</label>
                    <input class="form-control" type="date" id="cutoff_date" name="cutoff_date">
                </div>

                <div class="form-group d-flex justify-content-start align-items-start col-xl-6">
                    <button class="btn btn-outline-warning" type="submit">Save Cut-Off</button>
                </div>
                {{-- <button class="btn ml-3 btn-outline-warning" type="button" data-toggle="modal" data-target="#ConfirmPosting">Post</button> --}}
            </form>
        </div>

    </div>
</div>
@endsection
