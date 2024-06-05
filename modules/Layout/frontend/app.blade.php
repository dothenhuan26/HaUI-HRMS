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
            @include("Layout::admin.parts.sidebar")
        @endif

        <div class="page-wrapper job-wrapper">
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
