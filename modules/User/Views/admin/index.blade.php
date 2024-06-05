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
                href="{{route("user.admin.create")}}"
                class="btn add-btn mb-3"
                ><i class="fa fa-plus"></i> {{__("Add Employee")}}</a>

        </div>
    </div>

    @include("User::admin.parts.form.search-filter")

    @includeIf("User::admin.loop.".($layout ?? "list-item"))

    @include("User::admin.parts.delete")

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
