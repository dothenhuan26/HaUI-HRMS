@extends('admin.layouts.app')

@push('css')
    <style>
        .filepond--drop-label {
            color: #4c4e53;
        }

        .filepond--label-action {
            text-decoration-color: #babdc0;
        }

        .filepond--panel-root {
            background-color: #edf0f4;
        }

        .filepond--root {
            width: 120px;
            margin: 0 auto;
        }
    </style>
@endpush

@section("content")
    <!-- Add Employee Modal -->
    <div class="">
        <form
            enctype="multipart/form-data"
            method="POST"
            action="{{route("user.admin.store", ["id" => $row->id ?? ""])}}">

            @csrf

            @include("User::admin.parts.form.profile-info")

            <hr>

            @include("User::admin.parts.form.location")

            <hr>

            @include("User::admin.parts.form.security")

            <hr>

            @include("User::admin.parts.form.designation")

            <hr>

            @include("User::admin.parts.form.level")

            <hr>

            {{--            @include("User::admin.parts.form.permission")--}}

            <div class="submit-section">
                <button class="btn btn-primary submit-btn submit-form-btn">{{__("Submit")}}</button>
            </div>
        </form>
    </div>

    <!-- /Add Employee Modal -->
@endsection
