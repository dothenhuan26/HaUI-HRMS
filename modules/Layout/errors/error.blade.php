@extends("Layout::app")

@section("css")
    <!-- Chart CSS -->
    <link
        rel="stylesheet"
        href="{{asset('assets/plugins/morris/morris.css')}}">
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

                <div class="error-box">
                    <h1>403</h1>
                    <h3><i class="fa fa-warning"></i> Oops! {{__("Forbidden")}}!</h3>
                    <h2>{{"Permission Denied!"}}</h2>
                    <a href="/" class="btn btn-custom">{{__("Back to Home")}}</a>
                </div>

            </div>
            <!-- /Page Content -->

        </div>
        <!-- /Page Wrapper -->
        @include("Layout::admin.parts.footer")
    </div>
    <!-- /Main Wrapper -->
@endsection

@section("js")
    <!-- Slimscroll JS -->
    <script src="{{asset('assets/js/jquery.slimscroll.min.js')}}"></script>
@endsection
