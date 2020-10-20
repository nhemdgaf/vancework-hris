@extends('layouts.app')
@section('title', 'Employee Record: Admin - Vancework')
@section('payroll', 'active')
@section('employee.nav', 'd-none')
@section('content')
<style>
    .disabled:hover{
        cursor:not-allowed;
    }
</style>

<div class="container-fluid">
    @section('heading')
    <div class="d-sm-flex justify-content-start align-items-center mb-4">
        <h3 class="text-dark mb-0 mr-3 ml-2">PAYROLL</h3>
    </div>
    @endsection
    <hr>
    <div class="row">
        {{-- <div class="col-xl-4">
            <h1 class="success">Hello</h1>
                <form id="cut-off">
                    @if(isset($stores))
                        @foreach($stores as $store)
                            <h5>Stores: {{ $store }}</h5><br>
                        @endforeach
                    @endif
                    <h5>Cut-off: {{ $cutoff_date }}</h5>
                    <input type="date" id="cutoff_date" name="cutoff_date">

                    <button class="btn ml-5 btn-outline-warning" type="button">Process</button>
                    <button class="btn ml-3 btn-outline-warning" type="button" data-toggle="modal" data-target="#ConfirmPosting">Post</button>
                </form>
        </div> --}}
        @if(isset($wrongRate) AND count($wrongRate) > 0 ||
            isset($moreThanTen) AND count($moreThanTen) > 0 ||
            isset($emptySSS) AND count($emptySSS) > 0 ||
            isset($emptyPhilhealth) AND count($emptyPhilhealth) > 0 ||
            isset($emptyPagibig) AND count($emptyPagibig) > 0)

            <div class="col-xl-12 mb-4">
                <h4 class="text-dark">Error Validation</h4>
            </div>
        @else
            <div class="col-xl-12 mb-4">
                <h5 class="text-dark">No errors found</h5>
            </div>
        @endif

        @if(isset($wrongRate) AND count($wrongRate) > 0)
            <div class="col-xl-12" id="">
                <h5 class="mt-1">Employee number who have wrong <b>rates</b>:
                    <span class="text-danger">
                        @foreach($wrongRate as $index => $item)
                            @if($index == count($wrongRate) - 1)
                                {{ $item }}
                            @else
                                {{ $item }},
                            @endif
                        @endforeach
                    </span>
                </h5>
            </div>
        @endif

        @if(isset($moreThanTen) AND count($moreThanTen) > 0)
            <div class="col-xl-12" id="">
                <h5 class="mt-1">Employee number who's net pay is greater than <b>10,000</b>:
                    <span class="text-danger">
                        @foreach($moreThanTen as $index => $item)
                            @if($index == count($moreThanTen) - 1)
                                {{ $item }}
                            @else
                                {{ $item }},
                            @endif
                        @endforeach
                    </span>
                </h5>
            </div>
        @endif

        @if(isset($emptySSS) AND count($emptySSS) > 0)
            <div class="col-xl-12" id="">
                <h5 class="mt-1">Employee number who have no deduction on <b>SSS</b>:
                    <span class="text-danger">
                        @foreach($emptySSS as $index => $item)
                            @if($index == count($emptySSS) - 1)
                                {{ $item }}
                            @else
                                {{ $item }},
                            @endif
                        @endforeach
                    </span>
                </h5>
            </div>
        @endif

        @if(isset($emptyPhilhealth) AND count($emptyPhilhealth) > 0)
            <div class="col-xl-12" id="">
                <h5 class="mt-1">Employee number who have no deduction on <b>Philhealth</b>:
                    <span class="text-danger">
                        @foreach($emptyPhilhealth as $index => $item)
                            @if($index == count($emptyPhilhealth) - 1)
                                {{ $item }}
                            @else
                                {{ $item }},
                            @endif
                        @endforeach
                    </span>
                </h5>
            </div>
        @endif

        @if(isset($emptyPagibig) AND count($emptyPagibig) > 0)
            <div class="col-xl-12" id="">
                <h5 class="mt-1">Employee number who have no deduction on <b>Pagibig</b>:
                    <span class="text-danger">
                        @foreach($emptyPagibig as $index => $item)
                            @if($index == count($emptyPagibig) - 1)
                                {{ $item }}
                            @else
                                {{ $item }},
                            @endif
                        @endforeach
                    </span>
                </h5>
            </div>
        @endif

        {{-- @if(isset()) --}}

        <div class="col-xl-12 mt-4">
            @if(isset($wrongRate) AND count($wrongRate) > 0 ||
                isset($emptySSS) AND count($emptySSS) > 0 ||
                isset($emptyPhilhealth) AND count($emptyPhilhealth) > 0 ||
                isset($emptyPagibig) AND count($emptyPagibig) > 0)

                <button class="btn btn-success disabled" id="btn-Validate" aria-disabled="true" disabled>Validate</button>
            @else
                <form action="{{ route('payroll.dtrPayrollSummary') }}" method="POST">
                    @csrf
                    @foreach($stores as $store)
                        <input type="hidden" name="validate_store[]" value="{{ $store }}">
                    @endforeach
                    <input type="submit" class="btn btn-success" id="btn-Validate" value="Validate">
                </form>
            @endif

            <button class="btn btn-outline-danger" id="btn-Cancel">Cancel</button>
        </div>

    </div>
</div>

{{-- <!-- MODAL ConfirmPosting -->
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
</div> --}}

<script>
    $('#btn-Cancel').click(function(e){
        e.preventDefault();

        var selected_date = $("#cutoff_date").val();
        var cancel = confirm('Are you sure?');

        if(cancel){
            $.ajax({
            url: "/dtr-deleteDtrs",
            type:"POST",
            data:{
                cutoff_date: selected_date,
                _token: '{{csrf_token()}}'
            },
            success:function(response){}
            });
            alert('Data successfully deleted');
            window.location.href = "dtr";

        }
    });

    $('#btn-Validate').click(function(e){
        // e.preventDefault();
        alert('Data saved successfully!');
        $(this).submit();
    });
</script>
@endsection
