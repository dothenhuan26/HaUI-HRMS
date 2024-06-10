@extends('admin.layouts.app')

@section("content")
    <!-- Add Employee Modal -->

    @include("admin.messages")

    <div class="">
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
    </div>

    <!-- /Add Employee Modal -->
@endsection
