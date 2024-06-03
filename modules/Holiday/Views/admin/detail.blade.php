@extends('admin.layouts.app')

@section("content")

    @include("admin.messages")

    <div class="">
        <form
            method="POST"
            action="{{route("holiday.admin.store", ["id" => $row->id ?? ""])}}">

            @csrf

            <div class="row">
                <h3>{{__("Holiday Information")}}</h3>

                <div class="col-sm-4">
                    <div class="form-group">
                        <label class="">{{__("Holiday Name")}} <span class="text-danger">*</span></label>
                        <input
                            name="title"
                            value="{{old("title", $row->title ?? '')}}"
                            class="form-control"
                            placeholder="{{__("Holiday Name")}}"
                            required
                            type="text">
                        @error("title")
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="form-group">
                        <label class="">{{__("Holiday Date")}} <span class="text-danger">*</span></label>
                        <div class="cal-icon">
                            <input
                                name="holiday_date"
                                value="{{old("holiday_date", $row->holiday_date->format("d/m/Y") ?? '')}}"
                                class="form-control datetimepicker"
                                placeholder="{{__("Holiday Name")}}"
                                required
                                type="text">
                        </div>
                        @error("holiday_date")
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>

                <div class="col-sm-12">
                    <div class="form-group">
                        <label class="">{{__("Description")}} </label>
                        <textarea
                            class="form-control"
                            name="description"
                            id="tinymce"
                            cols="30"
                            rows="10">{{old("description", $row->description ?? "")}}</textarea>
                        @error("description")
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>

            </div>

            <div class="submit-section">
                <button class="btn btn-primary submit-btn submit-form-btn">{{__("Submit")}}</button>
            </div>
        </form>
    </div>

@endsection

