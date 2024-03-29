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
                            <option value="{{ $cut_off }}">{{ $cut_off }}</option>
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
    </div>
</div>

<script>

    $("#cutoff_date").change(function(event){
        event.preventDefault();

        $("#stores form").empty();

        $("#stores form").append('@csrf');

        let $this = $(this);
        let selected_date = $this.val();

        $('.pay-period').text('Pay Period: ' + selected_date);

        var table_str = "<table id='stores-table'>" +
                            "<thead class='mb-3'>" +
                                "<tr>" +
                                    "<th scope='col'>List of Not Processed Stores</th>" +
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
            _token: '{{ csrf_token() }}'
          },
          success:function(response){
            console.log(response);

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
                                            "<input type='checkbox' name='stores[]' value='" + store +"'> " + store +
                                        "</label>" +
                                    "</div>" +
                                "</td>";
                            "</tr>" +

                    $("#stores-table tbody").append(tr_str);
                }

                var process_str = "<input type='hidden' name='cutoff_date' value='" + response['cutoff_date'] + "''>" +
                "<button class='process_summary' id='process_summary' name='process_summary' value='submit'>Process Payroll</button>";

                $("#stores-table tbody").append(process_str);
            }
          }
         });
    });
</script>
@endsection
