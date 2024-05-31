@extends('admin.layouts.app')

@section("content")
    <!-- Add Employee Modal -->
    <div class="">
        <form
            method="POST"
            action="{{route("user.admin.store")}}">

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

            @include("User::admin.parts.form.permission")

            <div class="submit-section">
                <button class="btn btn-primary submit-btn submit-form-btn">{{__("Submit")}}</button>
            </div>
        </form>
    </div>

    <!-- /Add Employee Modal -->
@endsection
