@extends('admin.layouts.app')

@section("content")

    @include("admin.messages")

    @php
        $randDelete = \Illuminate\Support\Str::random();
        $randDeleteContinue = \Illuminate\Support\Str::random();
    @endphp

    @include("Payroll::admin.parts.form.search-filter")

    @include("Payroll::admin.parts.loop.list-item")

@endsection
