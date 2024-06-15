@extends('admin.layouts.app')

@section("content")

    @include("admin.messages")

    <div class="">
        <form
                method="POST"
                action="{{route("ojt.admin.store", ["id" => $row->id ?? ""])}}">

            @csrf

            <div class="row">
                <h3>{{__("On Job Training")}}</h3>

                <div class="col-sm-4">
                    <div class="form-group">
                        <label class="">{{__("Title")}} <span class="text-danger">*</span></label>
                        <input
                                name="title"
                                value="{{old("title", $row->title ?? '')}}"
                                class="form-control"
                                placeholder="{{__("Title")}}"
                                type="text">
                        @error("title")
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>

                <div class="col-sm-12">
                    <h3>{{__("Stages")}}</h3>
                    <div class="form-scroll form-group-item">
                        <div class="group-items">
                            @if(!empty($row->stages))
                                @foreach($row->stages as $key => $stage)
                                    <div
                                            class="card item"
                                            data-index="{{$key}}">
                                        <div class="card-body">
                                            <h3 class="card-title">{{__("Stage")}} {{$key+1}}<a
                                                        href="javascript:void(0);"
                                                        class="delete-icon btn-remove-item"><i class="fa fa-trash-o"></i></a></h3>
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <div class="form-group form-focus focused">
                                                        <div class="cal-icon">
                                                            <input
                                                                    type="text"
                                                                    name="stages[{{$key}}][start_date]"
                                                                    value="{{$stage["start_date"]}}"
                                                                    class="form-control floating datetimepicker">
                                                        </div>
                                                        <label class="focus-label">{{__("Starting Date")}}</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group form-focus focused">
                                                        <div class="cal-icon">
                                                            <input
                                                                    type="text"
                                                                    name="stages[{{$key}}][complete_date]"
                                                                    value="{{$stage["complete_date"]}}"
                                                                    class="form-control floating datetimepicker">
                                                        </div>
                                                        <label class="focus-label">{{__("Complete Date")}}</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group form-focus focused">
                                                        <input
                                                                type="text"
                                                                name="stages[{{$key}}][title]"
                                                                value="{{$stage["title"]}}"
                                                                class="form-control floating">
                                                        <label class="focus-label">{{__("Title")}}</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-5">
                                                    <div class="form-group form-focus focused ojt-stage-content">
                                                <textarea
                                                        name="stages[{{$key}}][content]"
                                                        class="form-control floating h-100"
                                                >{{$stage["content"]}}</textarea>
                                                        <label class="focus-label">{{__("Content")}}</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                        <div class="add-more">
                            <a
                                    class="btn-add-item"
                                    href="javascript:void(0);"><i class="fa fa-plus-circle"></i> {{__("Add More")}}</a>
                        </div>
                        <div class="form-item d-none">
                            <div
                                    class="card item"
                                    data-index="__index__">
                                <div class="card-body">
                                    <h3 class="card-title">{{__("Stage")}} __order__<a
                                                href="javascript:void(0);"
                                                class="delete-icon btn-remove-item"><i class="fa fa-trash-o"></i></a></h3>
                                    <div class="row">
                                        <div class="col-md-2">
                                            <div class="form-group form-focus focused">
                                                <div class="cal-icon">
                                                    <input
                                                            type="text"
                                                            name="stages[__index__][start_date]"
                                                            value=""
                                                            class="form-control floating datetimepicker">
                                                </div>
                                                <label class="focus-label">{{__("From")}}</label>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group form-focus focused">
                                                <div class="cal-icon">
                                                    <input
                                                            type="text"
                                                            name="stages[__index__][complete_date]"
                                                            value=""
                                                            class="form-control floating datetimepicker">
                                                </div>
                                                <label class="focus-label">{{__("To")}}</label>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group form-focus focused">
                                                <input
                                                        type="text"
                                                        name="stages[__index__][title]"
                                                        value=""
                                                        class="form-control floating">
                                                <label class="focus-label">{{__("Title")}}</label>
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="form-group form-focus focused ojt-stage-content">
                                                <textarea
                                                        name="stages[__index__][content]"
                                                        class="form-control floating h-100"
                                                ></textarea>
                                                <label class="focus-label">{{__("Content")}}</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-12">
                    <div class="form-group">
                        <label class="">{{__("Description")}} <span class="text-danger">*</span></label>
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

