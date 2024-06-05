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
                href="{{route("holiday.admin.create")}}"
                class="btn add-btn mb-3"
            ><i class="fa fa-plus"></i> {{__("Add Holiday")}}</a>

        </div>
    </div>

    @include("Holiday::admin.parts.form.search-filter")

    @include("Holiday::admin.parts.loop.list-item")

    @include("Holiday::admin.parts.delete")

@endsection

@push("js")

    <script>
        $(document).ready(function() {
            $('.{{$randDelete}}').on('click', function() {
                $('.{{$randDeleteContinue}}').attr('href', $(this).attr('href'));
            });
        });
    </script>

@endpush
