@extends('layouts.app')
@section('title', 'Employee Record: Admin - Vancework')
@section('payroll', 'active')
@section('employee.nav', 'd-none')
@section('content')
<div class="container-fluid">
    @section('heading')
    <div class="d-sm-flex justify-content-start align-items-center mb-4">
        <h3 class="text-dark mb-0 mr-3 ml-2">PAYROLL</h3>
        <!-- <a class="btn btn-primary btn-sm d-none d-sm-inline-block" role="button" href="{{ route('employees.create-1') }}">
            <i class="fas fa-plus fa-sm text-white-50"></i>&nbsp;Create New Record
        </a> -->
    </div>
    @endsection
    <hr>
    <div class="row">
        <div class="col-xl-4">
            <form action="/action_page.php">
                <label class="date-label" for="cutoff_date">Cut-off:</label>
                <input type="date" id="cutoff_date" name="cutoff_date">

                <button class="btn ml-5 btn-outline-warning" type="button">Process</button>
                <button class="btn ml-3 btn-outline-warning" type="button" data-toggle="modal" data-target="#ConfirmPosting">Post</button>

            </form>
        </div>
        <div class="col-xl-12">
            <h5 class="text-dark mt-1">Pay Period:1 - 21</h5>
        </div>

        <div class="col-xl-12 mt-1">
            <table id="dtr_table" class="table">
                <tbody>
                    <tr>
                        <td>Concerns</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="col-xl-12 mt-1">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">List of Stores</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <div class="checkbox">
                                <label><input type="checkbox" value=""> SM MEGAMALL</label>
                            </div>
                            <div class="checkbox">
                                <label><input type="checkbox" value=""> SM SOUTHMALL</label>
                            </div>
                            <div class="checkbox disabled">
                                <label><input type="checkbox" value="" disabled> SM STA.ROSA
                                    <img src="https://img.icons8.com/color/18/000000/info--v1.png" data-original-title="This store has been posted." data-placement="right" data-toggle="tooltip"></img>
                                </label>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
            <form>
        </div>

        <div class="col-12 mt-5">
            <table id="dtr_table" class="table">
                <tbody>
                    <tr>
                        <td>No data to show</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- MODAL ConfirmPosting -->
<div class="modal fade" id="ConfirmPosting" tabindex="-1" role="dialog" aria-labelledby="ConfirmPostingTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <i class="fas fa-question mt-1 mr-2 text-gray-400"></i>
                <h5 class="modal-title" id="ConfirmPostingTitle">Confirmation</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Do you want to proceed with the operartion?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                <button type="button" class="btn btn-primary">Yes</button>
            </div>
        </div>
    </div>
</div>

<button class="btn ml-3 btn-outline-warning" type="button" data-toggle="modal" data-target="#PostedModal">Prompt</button>
<!-- MODAL PostedModal -->
<div class="modal fade" id="PostedModal" tabindex="-1" role="dialog" aria-labelledby="PostedModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <i class="fas fa-exclamation-circle mt-1 mr-1  text-gray-400"></i>
                    <h5 class="modal-title" id="PostedModalTitle"> &nbsp; Notification</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <div class="modal-body">
                <i class="fas fa-check mt-1 mr-2  text-gray-400"></i> Payroll has been posted.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary">Okay</button>
                <button type="button" class="btn btn-primary">Go to Reports</button>
            </div>
        </div>
    </div>
</div>
@endsection
