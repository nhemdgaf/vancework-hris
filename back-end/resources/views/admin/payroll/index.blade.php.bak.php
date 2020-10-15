@extends('layouts.app')
@section('title', 'Employee Record: Admin - Vancework')
@section('payroll', 'active')
@section('employee.nav', 'd-none')
@section('content')
<div class="container-fluid">
    @section('heading')
    <div class="d-sm-flex justify-content-start align-items-center mb-4">
        <h3 class="text-dark mb-0 mr-3 ml-2">PAYROLL</h3>
    </div>
    @endsection
    <hr>
    <div class="row">
        <div class="col-xl-4">
            <h1 class="success"></h1>
            @if(isset($cut_offs))
                <form id="cut-off">
                    <label class="date-label" for="cutoff_date">Cut-off:</label>
                    <select name="cutoff_date" id="cutoff_date">
                        <option selected disabled>Select cut-off period</option>
                        @foreach($cut_offs as $cut_off)
                            <option value="{{ $cut_off->cutoff_date }}">{{ $cut_off->cutoff_date }}</option>
                        @endforeach
                    </select>
                    {{-- <input type="date" id="cutoff_date" name="cutoff_date"> --}}

                    {{-- <button class="btn ml-5 btn-outline-warning" type="button">Process</button> --}}
                    {{-- <button class="btn ml-3 btn-outline-warning" type="button" data-toggle="modal" data-target="#ConfirmPosting">Post</button> --}}
                </form>
            @else
                <h5 class="text-warning">No data to show. Upload data through DTR Module</h5>
            @endif
        </div>

        <div class="col-xl-12" id="pay-period">
            <h5 class="text-dark mt-1 pay-period"></h5>
        </div>

        <div class="col-xl-12 mt-1" id="stores">
            <form method="POST" action="{{ route('payroll.processSummary') }}">
                @csrf


            </form>
        </div>


        @if(isset($stores))
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
                        @foreach($stores as $store)
                        <tr>
                            <td>
                                <div class="checkbox">
                                    <label><input type="checkbox" value=""> {{ $store->store_assignment }}</label>
                                </div>
                            </td>
                        </tr>

                        @endforeach
                        {{-- <div class="checkbox disabled">
                            <label><input type="checkbox" value="" disabled> SM STA.ROSA
                                <img src="https://img.icons8.com/color/18/000000/info--v1.png" data-original-title="This store has been posted." data-placement="right" data-toggle="tooltip"></img>
                            </label>
                        </div> --}}
                    </tbody>
                </table>
                <form>
            </div>
        @endif
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

    $("#cutoff_date").change(function(event){
        event.preventDefault();

        let $this = $(this);
        let selected_date = $this.val();

        $('.pay-period').text('Pay Period: ' + selected_date);

        var table_str = "<table id='stores-table'>" +
                            "<thead class='mb-3'>" +
                                "<tr>" +
                                    "<th scope='col'>List of Stores</th>" +
                                "</tr>" +
                            "</thead>" +
                            "<tbody>" +

                            "</tbody>" +
                        "</table>";

        $("#stores form").append(table_str);

        $.ajax({
          url: "/fetch-stores",
          type:"POST",
          data:{
            cutoff_date: selected_date,
            _token: '{{csrf_token()}}'
          },
          success:function(response){
            // console.log(response);

            var len = 0;
            // console.log(response['stores']);

            if(response['stores'] != null){
                len = response['stores'].length;
                //   console.log(len);
            }

            if(len > 0) {
                for(var i = 0; i < len; i++){
                    var store = response['stores'][i].store_assignment;
                    // console.log(store);

                    var tr_str =
                            "<tr>" +
                                "<td>" +
                                    "<div class='checkbox'>" +
                                        "<label>" +
                                            "<input type='checkbox' value='" + store +"'> " + store +
                                        "</label>" +
                                    "</div>" +
                                "</td>";
                            "</tr>" +

                    $("#stores-table tbody").append(tr_str);
                }

                var process_str = "<button class='process_summary' id='process_summary' name='process_summary' value='submit'>Process Summary</button>";

                $("#stores-table tbody").append(process_str);
            }
          },
         });
    });
</script>
@endsection
