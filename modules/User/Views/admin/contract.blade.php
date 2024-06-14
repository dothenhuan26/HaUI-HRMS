@extends('admin.layouts.app')

@section("content")

    @include("admin.messages")

    <div class="">
        <div class="">
            <form
                method="POST"
                action="">

                @csrf

                <div class="col-sm-12">
                    <div class="form-group">
                        <label class="">{{__("Contract")}} </label>
                        <textarea
                            class="form-control"
                            name="content"
                            id="tinymce"
                            cols="30"
                            rows="50">{!! old("contract", $row->content ?? "") !!}</textarea>
                        @error("content")
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>

                <div class="submit-section">
                    <button class="btn btn-primary submit-btn submit-form-btn">{{__("Submit")}}</button>
                </div>
            </form>
        </div>
    </div>

@endsection
