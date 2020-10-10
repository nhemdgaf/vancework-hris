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
            <h4 class="text-danger mb-4"><b>Error importing</b></h4>
        </div>

        @if(isset($csv_data))

            {{-- Duplicates --}}
            @if(isset($dup_index))
                <div class="col-xl-12">
                    <h5 class="text-danger">Please remove duplicate entries:</h5>
                </div>
                @foreach($dup_index as $key => $dup)
                    <div class="col-xl-12">
                         <b>{{ $key }}</b> on {{ $csv_filename }} at line
                        @foreach($dup as $line)
                            <span class="text-danger">{{ $line+2 }}</span>,
                        @endforeach
                    </div>
                @endforeach
            @endif

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
