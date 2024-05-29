@extends("Layout::app")

@section("css")
    <!-- Chart CSS -->
    <link
        rel="stylesheet"
        href="{{asset('assets/plugins/morris/morris.css')}}">
@endsection

@section("header")
    @include("Layout::admin.parts.header")
@endsection

@section("sidebar")
    @include("Layout::admin.parts.sidebar")
@endsection

@section("body")
    <!-- Main Wrapper -->
    <div class="main-wrapper">

        <!-- Header -->
    @yield("header")
    <!-- /Header -->

        <!-- Sidebar -->
    @yield("sidebar")
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
        @yield("footer")
    </div>
    <!-- /Main Wrapper -->
@endsection

@section("footer")

@endsection

@section("js")
    <!-- Slimscroll JS -->
    <script src="{{asset('assets/js/jquery.slimscroll.min.js')}}"></script>

    <!-- Chart JS -->
    <script src="{{asset('assets/plugins/morris/morris.min.js')}}"></script>
    <script src="{{asset('assets/plugins/raphael/raphael.min.js')}}"></script>
    <script src="{{asset('assets/js/chart.js')}}"></script>
@endsection
