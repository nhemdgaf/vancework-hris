@extends('layouts.app')
@section('title', 'Employee Record: Admin - Vancework')
@section('employee.nav', 'd-none')
@section('201', 'active')
@section('content')
<div class="container-fluid">
    @section('heading')
    <div class="d-sm-flex justify-content-start align-items-center mb-4">
        <h3 class="text-dark mb-0 mr-3 ml-2">Employee Records</h3>
        <a class="btn btn-primary btn-sm d-none d-sm-inline-block" role="button" href="{{ route('employees.create-1') }}">
            <i class="fas fa-plus fa-sm text-white-50"></i>&nbsp;Create New Record
        </a>
    </div>
    @endsection
    <hr>
    <div class="row">
        <div class="col-md-2">
            <div class="form-group">
                <label for="exampleFormControlSelect1">Status</label>
                <form action="/employees/fetch" method="post">
                    @csrf
                    <select class="form-control" id="employment_status" name="employment_status">
                        <option value="">Select Status</option>
                        <option value="Active">Active</option>
                        <option value="Separated">Separated</option>
                        <option value="Suspended">Suspended</option>
                        <option value="Black Listed">Black Listed</option>
                    </select>
                </form>
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <label for="exampleFormControlSelect1">Type</label>
                <select class="form-control" id="exampleFormControlSelect1">
                    <option>All</option>
                    <option>New</option>
                </select>

            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <label for="exampleFormControlSelect1">Year</label>
                <select class="form-control" id="exampleFormControlSelect1">
                    <option>2020</option>
                    <option>2019</option>
                </select>

            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <table id="employees_table" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>Employee Number</th>
                        <th>Name</th>
                        <th>Date Hired</th>
                        <th>Store Assignment</th>
                        <th>Immediate Supervisor</th>
                        <th>Account Number</th>
                        <th>Mobile Number</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- <td>Andrea R</td>
                    <td>0000000</td>
                    <td>01/01/2020</td>
                    <td>Jollibee Corp</td>
                    <td>Jollibee</td>
                    <td>0000 0000 0000</td>
                    <td>051981894</td> -->

                    <!-- Get all employees using for else loop -->
                    @forelse($employees as $employee)
                    <tr data-href="/employees/{{ $employee->emp_num }}">
                        <td><strong>{{ $employee->emp_num }}</strong></td>
                        <td>{{ $employee->last_name }}, {{ $employee->first_name }}</td>
                        <td>{{ $employee->employeeprofile->date_hired }}</td>
                        <td>{{ $employee->employeeprofile->store_assignment }}</td>
                        <td>{{ $employee->employeeprofile->immediate_supervisor }}</td>
                        <td>{{ $employee->atmrecord->account_number }}</td>
                        <td>{{ $employee->contactdetail->phone_number }}</td>
                    </tr>
                    <!-- Output this when there's no employee -->
                    @empty
                    <tr data-href="#">
                        <td colspan="7" class="text-center">No data to show</td>
                    </tr>
                    @endforelse
                </tbody>
                <tfoot>
                    <tr>
                        <th>Name</th>
                        <th>Employee Number</th>
                        <th>Date Hired</th>
                        <th>Store Assignment</th>
                        <th>Immediate Supervisor</th>
                        <th>Account Number</th>
                        <th>Mobile Number</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
@endsection
