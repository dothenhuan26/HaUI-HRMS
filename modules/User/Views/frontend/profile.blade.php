@extends('admin.layouts.app')

@section("content")

    @include("admin.messages")

    @include("User::frontend.parts.basic-info")

    @include("User::frontend.parts.detail-info")


@endsection
