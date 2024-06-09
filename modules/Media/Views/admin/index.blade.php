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
            width: 170px;
            margin: 0 auto;
        }
    </style>
@endpush

@extends('admin.layouts.app')

@section("content")
    <input
        type="file"
        class="filepond"
        name="filepond"
        accept="image/png, image/jpeg, image/gif"/>
@endsection


