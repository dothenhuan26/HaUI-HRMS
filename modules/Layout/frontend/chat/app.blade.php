@extends("Layout::app")

@section("css")

@endsection

@section("body")
    <!-- Main Wrapper -->
    <div class="main-wrapper">

        <!-- Header -->
        @include("Layout::frontend.parts.header")
        <!-- /Header -->

        @if(Auth::check())
            @include("Layout::frontend.chat.parts.sidebar")
        @endif

        <div class="page-wrapper">


            @yield("content")


        </div>
    </div>
    <!-- /Main Wrapper -->
@endsection

@section("js")
    <!-- Dropfiles JS -->
    <script src="assets/js/dropfiles.js"></script>
@endsection
