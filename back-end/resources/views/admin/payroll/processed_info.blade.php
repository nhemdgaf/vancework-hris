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
            @if(isset($cut_offs) AND count($cut_offs) > 0)
                @if(count($cut_offs) > 1)
                    <label class="date-label" for="cutoff_date">Cut-off:</label>
                    <select name="cutoff_date" id="cutoff_date">
                        <option selected disabled>Select cut-off period</option>
                        @foreach($cut_offs as $cut_off)
                            <option value="{{ $cut_off->cutoff_date }}">{{ $cut_off->cutoff_date }}</option>
                        @endforeach
                    </select>
                @else
                    <input type="hidden" class="cutoff_date_hidden" name="cutoff_date_hidden" value="{{ $cut_offs[0]->cutoff_date }}">
                    <label class="h5"><b>Cut-off:</b> {{ $cut_offs[0]->cutoff_date }}</label>
                @endif
            @else
                <h5 class="text-warning">No data to show. Upload data through DTR Module</h5>
            @endif
        </div>

        <div class="col-xl-12" id="pay-period">
            <h5 class="text-dark mt-1 pay-period"></h5>
        </div>

        <input type="hidden" name="batch_number" value="{{ $batch_number }}" class="batch_number">
        <input type="hidden" name="processed_store" value="{{ $processed_store }}" class="processed_store">

        <div class="col-xl-12 mt-1" id="stores">
            <form method="POST" action="{{ route('payroll.postBatch') }}">
                @csrf



            </form>
        </div>
    </div>
</div>

<script>

    $(document).ready(function() {
        // alert('hello');
        if($(".cutoff_date_hidden").val())
        {
            console.log('cutoff_date not greater than 1');
            $("#stores form").empty();

            $("#stores form").append('@csrf');

            let batch_number = $(".batch_number").val();
            // console.log(batch_number);

            let processed_store = $(".processed_store").val();
            processed_store = processed_store.split("; ");
            // console.log(processed_store);

            let selected_date = $(".cutoff_date_hidden").val()
            // console.log(selected_date);

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
            url: "/fetch-processed-stores",
            type:"POST",
            data:{
                batch_number: batch_number,
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
                        console.log(store);

                        if(processed_store.includes(store)){
                            var tr_str =
                                    "<tr>" +
                                        "<td>" +
                                            "<div class='checkbox'>" +
                                                "<label>" +
                                                    "<input type='checkbox' class='stores' name='stores[]' value='" + store +"'> " + store +
                                                "</label>" +
                                            "</div>" +
                                        "</td>" +
                                    "</tr>";

                            $("#stores-table tbody").append(tr_str);
                        }
                    }

                    var process_str = "<input type='hidden' name='cutoff_date' value='" + selected_date + "'>" +
                    '<input type="hidden" name="batch_number" value="' + batch_number + '">' +
                    '<input class="btn btn-outline-warning" id="post-batch" type="submit" value="Post Batch">';

                    $("#stores-table tbody").append(process_str);
                }
            }
            });
        }

        $("#cutoff_date").change(function(event){
            event.preventDefault();

            console.log('cutoff_date greater than 1');
            $("#stores form").empty();

            $("#stores form").append('@csrf');

            let batch_number = $(".batch_number").val();
            // console.log(batch_number);

            let processed_store = $(".processed_store").val();
            processed_store = processed_store.split("; ");
            // console.log(processed_store);

            let $this = $(this);
            let selected_date = $this.val();
            // console.log(selected_date);

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
                batch_number: batch_number,
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

                        if(processed_store.includes(store)){
                            var tr_str =
                                    "<tr>" +
                                        "<td>" +
                                            "<div class='checkbox'>" +
                                                "<label>" +
                                                    "<input type='checkbox' class='stores' name='stores[]' value='" + store +"'> " + store +
                                                "</label>" +
                                            "</div>" +
                                        "</td>" +
                                    "</tr>";

                            $("#stores-table tbody").append(tr_str);
                        }
                    }

                    var process_str = "<input type='hidden' name='cutoff_date' value='" + response['cutoff_date'] + "''>" +
                    '<input type="hidden" name="batch_number" value="' + batch_number + '">' +
                    "<button class='process_summary' id='process_summary' name='process_summary' value='submit'>Process Payroll</button>";

                    $("#stores-table tbody").append(process_str);
                }
            }
            });
        });
    });


</script>
@endsection
