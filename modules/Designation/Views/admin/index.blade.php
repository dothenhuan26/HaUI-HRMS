@extends('admin.layouts.app')

@section("content")

    @include("admin.messages")

    @php
        $randDelete = \Illuminate\Support\Str::random();
        $randDeleteContinue = \Illuminate\Support\Str::random();
    @endphp

    <div class="row">
        <div class="col">
            <a
                href="{{route("designation.admin.create")}}"
                class="btn add-btn mb-3"
            ><i class="fa fa-plus"></i> {{__("Add Designation")}}</a>

        </div>
    </div>

    @include("Designation::admin.parts.form.search-filter")

    @include("Designation::admin.parts.loop.list-item")

    @include("Designation::admin.parts.delete")

@endsection

@push("js")

    <script>
        $(document).ready(function() {

            console.log($('.datatable'));

            $('.{{$randDelete}}').on('click', function() {
                $('.{{$randDeleteContinue}}').attr('href', $(this).attr('href'));
            });
        });
    </script>

@endpush
