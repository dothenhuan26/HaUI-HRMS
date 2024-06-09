@extends("Layout::app")

@section("css")
    <!-- Chart CSS -->
    <link
        rel="stylesheet"
        href="{{asset('assets/plugins/morris/morris.css')}}">

    <!-- Datatable CSS -->
    <link rel="stylesheet" href="{{asset("assets/css/dataTables.bootstrap4.min.css")}}">

    <!-- Select2 CSS -->
    <link
        rel="stylesheet"
        href="{{asset("assets/css/select2.min.css")}}">

    <!-- Datetimepicker CSS -->
    <link
        rel="stylesheet"
        href="{{asset("assets/css/bootstrap-datetimepicker.min.css")}}">
    @endsection

@section("body")
    <!-- Main Wrapper -->
    <div class="main-wrapper">

        <!-- Header -->
    @include("Layout::admin.parts.header")
    <!-- /Header -->

        <!-- Sidebar -->
    @include("Layout::admin.parts.sidebar")
    <!-- /Sidebar -->

        <!-- Page Wrapper -->
        <div class="page-wrapper">

            <!-- Page Content -->
            <div class="content container-fluid">

                @include("Layout::admin.parts.breadcrumbs")

                @yield("content")

            </div>
            <!-- /Page Content -->

        </div>
        <!-- /Page Wrapper -->
        @include("Layout::admin.parts.footer")
    </div>
    <!-- /Main Wrapper -->
@endsection

@section("js")

    <!-- Chart JS -->
    <script src="{{asset('assets/plugins/morris/morris.min.js')}}"></script>
    <script src="{{asset('assets/plugins/raphael/raphael.min.js')}}"></script>
    <script src="{{asset('assets/js/chart.js')}}"></script>

    <!-- Select2 JS -->
    <script src="{{asset("assets/js/select2.min.js")}}"></script>

    <!-- Datetimepicker JS -->
    <script src="{{asset("assets/js/moment.min.js")}}"></script>
    <script src="{{asset("assets/js/bootstrap-datetimepicker.min.js")}}"></script>

    <!-- Datatable JS -->
    <script src="{{asset("assets/js/jquery.dataTables.min.js")}}"></script>
    <script src="{{asset("assets/js/dataTables.bootstrap4.min.js")}}"></script>
@endsection
