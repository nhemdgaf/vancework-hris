@extends('layouts.app')
@section('title', 'Dtr and Payroll Summary: Admin - Vancework')
@section('payroll', 'active')
@section('employee.nav', 'd-none')
@section('content')
<div class="container-fluid">
    @section('heading')
    <div class="d-sm-flex justify-content-start align-items-center mb-4">
        <h3 class="text-dark mb-0 mr-3 ml-2">Dtr and Payroll</h3>
    </div>
    @endsection
    <hr>
    <div class="row d-flex flex-row">
        <div class="col-xl-6 d-flex justify-content-start align-items-start flex-column my-2">
            <h5>DTR Summary Per Store</h5>
            <h6>Period: {{ date('m/d/Y', strtotime($cutoff_date)) }} - {{ date('m/d/Y', strtotime($cutoff_date. '+15 days')) }}</h6>
            <form id="dtr-summary">
                {{-- <input type="hidden" name="cutoff_date" value="{{ $cutoff_date }}" id="cutoff_date"> --}}
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Company Name</th>
                            <th>Dtr Headcount</th>
                            <th>Dtr Basic pay</th>
                            <th>Payroll Headcount</th>
                            <th>Payroll Basic pay</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($dtr_summary as $d_summary)
                            <tr>
                                <td scrope="row">{{ $d_summary['store_assignment']  }}</td>
                                    <td>{{ $d_summary['headcount'] }}</td>
                                    <td>{{ $d_summary['basic_pay'] }}</td>
                                @foreach($payroll_summary as $p_summary)
                                    @if($p_summary->store_assignment == $d_summary['store_assignment'])
                                        <td>{{ $p_summary->headcount }}</td>
                                        <td>{{ $p_summary->basic_pay }}</td>
                                    @endif
                                @endforeach
                            </tr>
                        @endforeach

                        {{-- @foreach($grand_total as $gt)
                            <tr class="table-warning">
                                <th data-toggle="tooltip" data-placement="top" title="Grand total of all stores">Grand Total: </th>
                            </tr>
                        @endforeach --}}
                    </tbody>
                </table>
            </form>
        </div>

        <div class="col-xl-12">
            <button class="btn btn-warning" id="btn-Continue" type="button" data-toggle="modal" data-target="#ConfirmPosting">Generate Batch Number</button>
            <button class="btn btn-outline-danger" id="btn-Cancel">Cancel uploading</button>
        </div>

        <div class="col-xl-12">
            {{-- <button class="btn ml-5 btn-outline-warning" type="button">Process</button> --}}
            {{-- <button class="btn ml-3 btn-outline-warning" type="button" data-toggle="modal" data-target="#ConfirmPosting">Post</button> --}}
            <button class="btn ml-3 btn-outline-warning" type="button" data-toggle="modal" data-target="#PostedModal">Prompt</button>
        </div>

    </div>
</div>

<!-- MODAL ConfirmPosting -->
<div class="modal fade" id="ConfirmPosting" tabindex="-1" role="dialog" aria-labelledby="ConfirmPostingTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <form method="POST" action="{{ route('payroll.processedInfo') }}">
                @csrf
                @foreach($stores as $store)
                    <input type="hidden" name="processed_store[]" value="{{ $store }}">
                @endforeach
                <div class="modal-header">
                    {{-- <i class="fas fa-question mt-1 mr-2 text-gray-400"></i> --}}
                    <h5 class="modal-title" id="ConfirmPostingTitle">Generated Batch Number: {{ $batch }}</h5>
                    <input type="hidden" value="{{ $batch }}" name="batch_number">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Do you want to proceed with the operation?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                    <button type="submit" class="btn btn-primary">Yes</button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- <!-- MODAL PostedModal -->
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
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    });

    // $('#btn-Cancel').click(function(e){
    //     e.preventDefault();

    //     var selected_date = $("#cutoff_date").val();
    //     var cancel = confirm('Are you sure?');

    //     if(cancel){
    //         $.ajax({
    //         url: "/dtr-deleteDtrs",
    //         type:"POST",
    //         data:{
    //             cutoff_date: selected_date,
    //             _token: '{{csrf_token()}}'
    //         },
    //         success:function(response){}
    //         });
    //         alert('Data successfully deleted');
    //         window.location.href = "dtr";

    //     }
    // });

    // $('#btn-Continue').click(function(e){
    //     e.preventDefault();
    //     alert('Data saved successfully!');
    //     window.location.href = "{{ route('payroll.admin') }}";
    // });


</script>
@endsection

