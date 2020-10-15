<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="{{ asset('fonts/fontawesome-all.min.css') }}">
    <!-- <link rel="stylesheet" href="{{ asset('css/form.css') }}"> -->
    <!-- <link rel="stylesheet" href="{{ asset('css/dataTables.min.css') }}"> -->
    <link rel="stylesheet" href="{{ asset('dataTables/datatables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    @toastr_css
    <script src="{{ asset('js/jquery.min.js') }}"></script>
</head>

<body id="page-top">
    <div id="wrapper">

        <!-- <div class="h-100 w-100" style="z-index:1000; position: absolute; background:white" id="pre_loader">BOBO</div> -->

        @include('inc.sideNav')

        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">

                @include('inc.topNav')
                <!-- taking the sidebar from each step blade php since it is the same on all views -->
                <div class="container-fluid">
                    @yield('heading', '201 Encoding')
                    <div class="row ">
                        <div class="col-lg-4 @yield('employee.nav')">
                            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                <!-- href="javascript:void(0)" return none if called -->
                                <a style=" cursor: default;" class="nav-link @yield('step_1')" id="v-pills-personal-information-tab" href="javascript:void(0)" aria-controls="v-pills-personal-information" aria-selected="true">Personal Information</a>
                                <a style=" cursor: default;" class="nav-link @yield('step_2')" id="v-pills-contact-details-tab" href="javascript:void(0)" aria-controls="v-pills-contact-details" aria-selected="false">Contact Details </a>
                                <a style=" cursor: default;" class="nav-link @yield('step_3')" id="v-pills-complete-address-tab" href="javascript:void(0)" aria-controls="v-pills-complete-address" aria-selected="false">Complete Address</a>
                                <a style=" cursor: default;" class="nav-link @yield('step_4')" id="v-pills-add-information-tab" href="javascript:void(0)" aria-controls="v-pills-add-information" aria-selected="false">Additional Information</a>
                                <a style=" cursor: default;" class="nav-link @yield('step_5')" id="v-pills-contribution-number-tab" href="javascript:void(0)" aria-controls="v-pills-contribution-number" aria-selected="false">Contribution Number</a>
                                <a style=" cursor: default;" class="nav-link @yield('step_6')" id="v-pills-employee-profile-tab" href="javascript:void(0)" aria-controls="v-pills-employee-profile" aria-selected="false">Employee Profile</a>
                                <a style=" cursor: default;" class="nav-link @yield('step_7')" id="v-pills-atm-acc-tab" href="javascript:void(0)" aria-controls="v-pills-atm-acc" aria-selected="false">ATM Record</a>
                                <a style=" cursor: default;" class="nav-link @yield('step_8')" id="v-pills-review-details-tab" href="javascript:void(0)" aria-controls="v-pills-review-details" aria-selected="true">Review Details</a>
                            </div>
                        </div>
                        @yield('content')
                    </div>
                </div>
            </div>
            @include('inc.footer')
        </div>

        <a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
    </div>

    <!-- <script src="{{ asset('js/pre_loader.js') }}"></script> -->
    <script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
    <script>
        $("#csv_file").on("change", function() {
            var fileName = $(this).val().split("\\").pop();
            $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
        });
        $(function() {
            $("[data-toggle='tooltip']").tooltip();
        });
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
    <script src="{{ asset('js/script.js') }}"></script>
    <script src="{{ asset('js/chart.min.js') }}"></script>
    <script src="{{ asset('js/bs-init.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
    <!-- <script src="{{ asset('js/form.js') }}"></script> -->
    <script src="{{ asset('js/theme.js') }}"></script>
    <script src="{{ asset('js/employee_table.js') }}"></script>
    <script src="{{ asset('js/dtr_table.js') }}"></script>
    <script type="text/javascript" src="{{ asset('dataTables/datatables.min.js') }}"></script>
    @toastr_js
    @toastr_render
</body>

</html>
