@extends('layouts.app')
@section('title', 'Employee Record: Admin - Vancework')
@section('dtr', 'active')
@section('employee.nav', 'd-none')
@section('content')
<div class="container-fluid">
    @section('heading')
    <div class="d-sm-flex justify-content-start align-items-center mb-4">
        <h3 class="text-dark mb-0 mr-3 ml-2">DTR</h3>
        <!-- <a class="btn btn-primary btn-sm d-none d-sm-inline-block" role="button" href="{{ route('employees.create-1') }}">
            <i class="fas fa-plus fa-sm text-white-50"></i>&nbsp;Create New Record
        </a> -->
    </div>
    @endsection
    <hr>
    <div class="row">
        <div class="col-xl-1 d-flex justify-content-start align-items-start mt-2">
            <h5>IMPORT</h5>
        </div>

        <div class="col-xl-4">
            <form method="POST" action="{{ route('dtr.parseImport') }}" enctype="multipart/form-data">
                @csrf
                <div class="d-flex flex-row">
                    <div class="custom-file">
                        <!-- <input type="file" class="custom-file-input" id="customfile" name="file"> -->
                        <input id="csv_file" type="file" class="form-control" name="csv_file" required>
                        <!-- <label class="custom-file-label" for="customfile">Choose file</label> -->
                        <label for="csv_file" class="custom-file-label control-label text-truncate" id="csv_file_label">Choose file</label>
                        @if ($errors->has('csv_file'))
                        <span class="help-block">
                            <strong>{{ $errors->first('csv_file') }}</strong>
                        </span>
                        @endif
                    </div>

                    {{-- <div class="ml-4 form-check">
                        <label>
                            <input type="checkbox" name="header" class="form-check-input" checked> File contains header row?
                        </label>
                    </div> --}}

                    <div class="form-group">
                        <button class="btn ml-5 btn-outline-warning dtr-button" type="submit">Validate</button>
                    </div>
                </div>
            </form>
        </div>

        <!-- <div class="col-xl-3">
            <input id="datepicker" placeholder="Cut-off Date" />
            <button class="btn btn-success" type="button">Process</button>
        </div> -->
        <!-- <div class="col-xl-3 offset-xl-3 text-center d-xl-flex justify-content-xl-center align-items-xl-center">

        </div> -->

        @if(isset($csv_data))
        <div class="col-xl-12 mt-5">
            <form class="form-horizontal" method="POST" action="{{ route('dtr.processImport') }}">
                @csrf
                <input type="hidden" name="csv_data_file_id" value="{{ (isset($csv_data_file->id)) ? $csv_data_file->id : '' }}" />
                <table id="dtr_table" class="table">
                    <thead>
                        <tr>
                            <th>Emp. No.</th>
                            <th>Last Name</th>
                            <th>First Name</th>
                            <th>Middle Name</th>
                            <th>Reg. hrs</th>
                            <th>Late (mins.)</th>
                            <th>Reg. OT</th>
                            <th>Rest</th>
                            <th>Rest OT</th>
                            <th>Legal Hol</th>
                            <th>Legal Hol OT</th>
                            <th>Rest Legal Hol</th>
                            <th>Rest Legal Hol OT</th>
                            <th>SPL Hol</th>
                            <th>SPL Hol OT</th>
                            <th>Rest SPL Hol</th>
                            <th>Rest SPL Hol OT</th>
                            <th>ND</th>
                            <th>ND OT</th>
                            <th>ND Rest</th>
                            <th>ND Rest OT</th>
                            <th>ND Legal Hol</th>
                            <th>ND Legal Hol OT</th>
                            <th>ND Rest Legal Hol</th>
                            <th>ND Rest Legal Hol OT</th>
                            <th>ND SPL Hol</th>
                            <th>ND SPL Hol OT</th>
                            <th>ND Rest SPL Hol</th>
                            <th>ND Rest SPL OT</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($csv_data as $row)
                        <tr>
                            @foreach ($row as $key => $value)
                            <td>{{ $value }}</td>
                            @endforeach
                        </tr>
                        @endforeach
                    </tbody>
                    {{-- <tfoot class="d-none">
                        <tr>
                            @foreach ($csv_data[0] as $key => $value)
                            <td>
                                <select name="fields[{{ $key }}]">
                                    @foreach (config('app.db_fields') as $db_field)
                                    <option value="{{ $db_field }}" @if ($key===$loop->index) selected @endif>{{ $db_field }}</option>
                                    @endforeach
                                </select>
                            </td>
                            @endforeach
                        </tr>
                    </tfoot> --}}
                </table>
                <button type="submit" class="btn btn-primary dtr-button">
                    Import Data
                </button>
            </form>
        </div>
        @else
        <div class="col-12 mt-5">
            <table id="dtr_table" class="table">
                <tbody>
                    <tr>
                        <td>No data to show</td>
                    </tr>
                </tbody>
            </table>
        </div>
        @endif
    </div>
</div>
@endsection
