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

            {{-- Duplicates --}}
            @if(isset($duplicate))
                @foreach($duplicate as $dup)
                    <div>{{ $dup }}</div>
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
