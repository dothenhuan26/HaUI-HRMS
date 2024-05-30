@extends('admin.layouts.app')

@section("content")
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

@endsection

