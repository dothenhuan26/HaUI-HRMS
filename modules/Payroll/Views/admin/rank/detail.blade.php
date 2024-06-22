@extends('admin.layouts.app')

@section("content")

    @include("admin.messages")

    <div class="">
        <form
            method="POST"
            action="{{route("rank.admin.store", ["id" => $row->id ?? ""])}}">
            @csrf
            <div class="row">
                <div class="col-sm-12">
                    <h3>{{__("Salary Rank")}}</h3>
                    <div class="form-scroll form-group-item">
                        <div class="group-items">
                            @if(!empty($rows))
                                @foreach($rows as $key => $row)
                                    <div
                                        class="card item"
                                        data-index="{{$key}}">
                                        <div class="card-body">
                                            <h3 class="card-title">{{__("Update Rank")}}<a
                                                    href="javascript:void(0);"
                                                    class="delete-icon btn-remove-item"><i class="fa fa-trash-o"></i></a></h3>
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <div class="form-group form-focus focused">
                                                        <input
                                                            type="text"
                                                            name="rows[{{$key}}][rank]"
                                                            value="{{$row->rank}}"
                                                            class="form-control floating">
                                                        <label class="focus-label">{{__("Rank")}}</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group form-focus focused">
                                                        <input
                                                            type="text"
                                                            name="rows[{{$key}}][coefficient]"
                                                            value="{{$row->coefficient}}"
                                                            class="form-control floating">
                                                        <label class="focus-label">{{__("Coefficient")}}</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group form-focus focused">
                                                        <input
                                                            type="number"
                                                            name="rows[{{$key}}][from]"
                                                            value="{{$row->from}}"
                                                            class="form-control floating">
                                                        <label class="focus-label">{{__("From")}}</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-5">
                                                    <div class="form-group form-focus focused ojt-stage-content">
                                                <textarea
                                                    name="rows[{{$key}}][description]"
                                                    class="form-control floating h-100"
                                                >{{$row->description}}</textarea>
                                                        <label class="focus-label">{{__("Description")}}</label>
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
                                    <h3 class="card-title">{{__("New Rank")}}<a
                                            href="javascript:void(0);"
                                            class="delete-icon btn-remove-item"><i class="fa fa-trash-o"></i></a></h3>
                                    <div class="row">
                                        <div class="col-md-2">
                                            <div class="form-group form-focus focused">
                                                <input
                                                    type="text"
                                                    name="rows[__index__][rank]"
                                                    value=""
                                                    class="form-control floating">
                                                <label class="focus-label">{{__("Rank")}}</label>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group form-focus focused">
                                                <input
                                                    type="text"
                                                    name="rows[__index__][coefficient]"
                                                    value=""
                                                    class="form-control floating">
                                                <label class="focus-label">{{__("Coefficient")}}</label>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group form-focus focused">
                                                <input
                                                    type="number"
                                                    name="rows[__index__][from]"
                                                    value=""
                                                    class="form-control floating">
                                                <label class="focus-label">{{__("From")}}</label>
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="form-group form-focus focused ojt-stage-content">
                                                <textarea
                                                    name="rows[__index__][description]"
                                                    class="form-control floating h-100"
                                                ></textarea>
                                                <label class="focus-label">{{__("Description")}}</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="submit-section">
                <button class="btn btn-primary submit-btn submit-form-btn">{{__("Submit")}}</button>
            </div>
        </form>
    </div>

@endsection

