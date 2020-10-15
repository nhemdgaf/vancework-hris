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
        <div class="col-xl-12 d-flex justify-content-start align-items-start flex-column my-2">
            <h5>DTR Summary per Store</h5>
            <h6>Period: {{ date('m/d/Y', strtotime($cutoff_date)) }} - {{ date('m/d/Y', strtotime($cutoff_date. '+15 days')) }}</h6>
        </div>

        {{-- <div class="col-xl-12">
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
            {{-- </form>
        </div> --}}

        @if(isset($dtr_summary))
            <div class="col-xl-12 d-flex justify-content-start align-items-start table-responsive">
                <form id="dtr-summary">
                    <input type="hidden" name="cutoff_date" value="{{ $cutoff_date }}" id="cutoff_date">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Company Name</th>
                                <th>Headcount</th>
                                <th>Reg. Hrs</th>
                                <th>Late (mins)</th>
                                <th>Reg. OT</th>
                                <th>Rest Day Reg.</th>
                                <th>Rest Day Ext.</th>
                                <th>Hol. Hrs</th>
                                <th>Hol. Ext.</th>
                                <th>Res. Hol.</th>
                                <th>Res. Hol. Ext.</th>
                                <th>ND</th>
                                <th>ND OT</th>
                                <th>Res. ND</th>
                                <th>Res. ND OT</th>
                                <th>Hol. ND</th>
                                <th>Hol. ND OT</th>
                                <th>Res. Hol ND</th>
                                <th>Res. Hol ND OT</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($dtr_summary as $summary)
                                <tr>
                                    <td scrope="row">{{ $summary->store_assignment  }}</td>
                                    <td>{{ $summary->head_count }}</td>
                                    <td>{{ $summary->reg_hours }}</td>
                                    <td>{{ $summary->late }}</td>
                                    <td>{{ $summary->reg_ot }}</td>
                                    <td>{{ $summary->rest }}</td>
                                    <td>{{ $summary->rest_ot }}</td>
                                    <td>{{ $summary->hol+$summary->spl_hol }}</td>
                                    <td>{{ $summary->hol_ot+$summary->spl_hol_ot }}</td>
                                    <td>{{ $summary->rest_hol+$summary->rest_spl }}</td>
                                    <td>{{ $summary->rest_hol_ot+$summary->rest_spl_ot }}</td>
                                    <td>{{ $summary->nd }}</td>
                                    <td>{{ $summary->nd_ot }}</td>
                                    <td>{{ $summary->nd_rest }}</td>
                                    <td>{{ $summary->nd_rest_ot }}</td>
                                    <td>{{ $summary->nd_hol+$summary->nd_spl_hol }}</td>
                                    <td>{{ $summary->nd_hol_ot+$summary->nd_spl_hol_ot }}</td>
                                    <td>{{ $summary->nd_rest_hol+$summary->nd_rest_spl }}</td>
                                    <td>{{ $summary->nd_rest_hol_ot+$summary->nd_rest_spl_ot }}</td>
                                </tr>
                            @endforeach

                            @foreach($grand_total as $gt)
                                <tr class="table-warning">
                                    <th data-toggle="tooltip" data-placement="top" title="Grand total of all stores">Grand Total: </th>
                                    <th data-toggle="tooltip" data-placement="top" title="Total headcounts">{{ $gt->head_count }}</th>
                                    <th data-toggle="tooltip" data-placement="top" title="Total regular hrs.">{{ $gt->reg_hours }}</th>
                                    <th data-toggle="tooltip" data-placement="top" title="Total late mins">{{ $gt->late }}</th>
                                    <th data-toggle="tooltip" data-placement="top" title="Total regular hrs. OT">{{ $gt->reg_ot }}</th>
                                    <th data-toggle="tooltip" data-placement="top" title="Total rest day hrs.">{{ $gt->rest }}</th>
                                    <th data-toggle="tooltip" data-placement="top" title="Total rest day hrs. OT">{{ $gt->rest_ot }}</th>
                                    <th data-toggle="tooltip" data-placement="top" title="Total holiday hrs.">{{ $gt->hol+$summary->spl_hol }}</th>
                                    <th data-toggle="tooltip" data-placement="top" title="Total holiday hrs. OT">{{ $gt->hol_ot+$gt->spl_hol_ot }}</th>
                                    <th data-toggle="tooltip" data-placement="top" title="Total rest day hrs.">{{ $gt->rest_hol+$gt->rest_spl }}</th>
                                    <th data-toggle="tooltip" data-placement="top" title="Total rest day hrs. OT">{{ $gt->rest_hol_ot+$gt->rest_spl_ot }}</th>
                                    <th data-toggle="tooltip" data-placement="top" title="Total night differential hrs.">{{ $gt->nd }}</th>
                                    <th data-toggle="tooltip" data-placement="top" title="Total night differential hrs. OT">{{ $gt->nd_ot }}</th>
                                    <th data-toggle="tooltip" data-placement="top" title="Total night differential rest day hrs.">{{ $gt->nd_rest }}</th>
                                    <th data-toggle="tooltip" data-placement="top" title="Total night differential rest day hrs. OT">{{ $gt->nd_rest_ot }}</th>
                                    <th data-toggle="tooltip" data-placement="top" title="Total night differential holiday hrs.">{{ $gt->nd_hol+$gt->nd_spl_hol }}</th>
                                    <th data-toggle="tooltip" data-placement="top" title="Total night differential holiday hrs. OT">{{ $gt->nd_hol_ot+$gt->nd_spl_hol_ot }}</th>
                                    <th data-toggle="tooltip" data-placement="top" title="Total night differential rest day holiday hrs.">{{ $gt->nd_rest_hol+$gt->nd_rest_spl }}</th>
                                    <th data-toggle="tooltip" data-placement="top" title="Total night differential rest day holiday hrs. OT">{{ $gt->nd_rest_hol_ot+$gt->nd_rest_spl_ot }}</th>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </form>
            </div>

            <div class="col-xl-12">
                <form>
                    <button id="btn-Cancel">Cancel uploading</button>

                    <button id="btn-Continue">Continue to payroll</button>
                </form>
            </div>
        @endif

    </div>
</div>

<script>
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    });

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

    $('#btn-Continue').click(function(e){
        e.preventDefault();
        alert('Data saved successfully!');
        window.location.href = "{{ route('payroll.admin') }}";
    });


</script>
@endsection

