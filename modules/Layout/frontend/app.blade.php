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
            @include("Layout::frontend.parts.sidebar")
        @endif

        <div class="page-wrapper">
            <div class="content container">
                @include("Layout::frontend.parts.breadcrumbs")

                @yield("content")

            </div>
        </div>
    </div>
    <!-- /Main Wrapper -->
@endsection

@section("js")

@endsection
