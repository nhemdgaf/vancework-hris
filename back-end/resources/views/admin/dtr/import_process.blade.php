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
            <h5>IMPORT</h5>
        </div>

        @if(isset($csv_data))

        <!-- First Table;
             Contains CSV Data
        -->
        <div class="col-xl-6 mt-5">
            <form class="form-horizontal" method="POST" action="{{ route('dtr.processImport') }}">
                @csrf
                <input type="hidden" name="csv_data_file_id" value="{{ (isset($csv_data_file->id)) ? $csv_data_file->id : '' }}" />
                <table id="dtr_table_compare_csv" class="table">
                    <thead>
                        <tr>
                            <th>Emp. No.</th>
                            <th>Last Name</th>
                            <th>First Name</th>
                            <th>Middle Name</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $count = 0; ?>
                        @foreach ($csv as $row)
                        <tr>
                            <td class="{{ (!$dt[$count][0]) ? "bg-danger text-white": "bg-success text-white" }}">{{ $row->emp_num }}</td>
                            <td class="{{ (!$dt[$count][1]) ? "bg-danger text-white": "bg-success text-white" }}">{{ $row->last_name }}</td>
                            <td class="{{ (!$dt[$count][2]) ? "bg-danger text-white": "bg-success text-white" }}">{{ $row->first_name }}</td>
                            <td class="{{ (!$dt[$count][3]) ? "bg-danger text-white": "bg-success text-white" }}">{{ $row->middle_name }}</td>
                        </tr>
                        <?php $count++; ?>
                        @endforeach

                        @if(isset($csv_nf))
                        <?php if($count >= count($csv)){ ?>
                            @foreach ($csv_nf as $nf_row)
                            <tr class="bg-danger text-white">
                                <td>{{ $nf_row->emp_num }}</td>
                                <td>{{ $nf_row->last_name }}</td>
                                <td>{{ $nf_row->first_name }}</td>
                                <td>{{ $nf_row->middle_name }}</td>
                            </tr>
                            @endforeach
                        <?php } ?>
                        @endif
                    </tbody>
                </table>
                <button type="submit" class="btn btn-primary mt-3 dtr-button" id="goPayroll">
                    Continue to Payroll
                </button>
            </form>
        </div>

        <!--
            Second Table;
            Contains DB Data
         -->
        <!-- <div class="col-xl-6 mt-5">
            <form class="form-horizontal" method="POST" action="{{ route('dtr.processImport') }}">
                @csrf
                <input type="hidden" name="csv_data_file_id" value="{{ (isset($csv_data_file->id)) ? $csv_data_file->id : '' }}" />
                <table id="dtr_table_compare_db" class="table">
                    <thead>
                        <tr>
                            <th>Emp. No.</th>
                            <th>Last Name</th>
                            <th>First Name</th>
                            <th>Middle Name</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($results as $result)
                        <tr>
                            <td>{{ $result['emp_num'] }}</td>
                            <td>{{ $result['last_name'] }}</td>
                            <td>{{ $result['first_name'] }}</td>
                            <td>{{ $result['middle_name'] }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </form>
        </div> -->

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
