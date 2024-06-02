@extends('admin.layouts.app')

@section("content")

    @include("admin.messages")

    <div class="">
        <form
            method="POST"
            action="{{route("designation.admin.store", ["id" => $row->id ?? ""])}}">

            @csrf

            <div class="row">
                <h3>{{__("Designation Information")}}</h3>

                <div class="col-sm-4">
                    <div class="form-group">
                        <label class="">{{__("Name")}} <span class="text-danger">*</span></label>
                        <input
                            name="name"
                            value="{{old("name", $row->name ?? '')}}"
                            class="form-control"
                            placeholder="{{__("Name")}}"
                            required
                            type="text">
                        @error("name")
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="form-group">
                        <label class="">{{__("Salary From")}} </label>
                        <input
                            name="salary_from"
                            value="{{old("salary_from", $row->salary_from ?? "")}}"
                            class="form-control"
                            placeholder="{{__("Salary From")}}"
                            type="number">
                        @error("salary_from")
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="form-group">
                        <label class="">{{__("Salary To")}} </label>
                        <input
                            name="salary_to"
                            value="{{old("salary_to", $row->salary_to ?? "")}}"
                            class="form-control"
                            placeholder="{{__("Salary To")}}"
                            type="number">
                        @error("salary_to")
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label>{{__("Department")}}</label>
                        <select
                            name="department_id"
                            class="select form-control">
                            <option
                                value=""
                                class="disabled">{{__(" -- Select Department -- ")}}</option>
                            @if($departments->count()>0)
                                @foreach($departments as $key => $department)
                                    <option
                                        {{old("department_id", $row->department_id ?? "")==$department->id?"selected":false}}
                                        value="{{$department->id}}">{{$department->name}}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                    @error("department_id")
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label>{{__("Status")}}</label>
                        <select
                            name="status"
                            class="select form-control">
                            <option {{old("status", $row->status ?? "")=="publish"?"selected":false}} value="publish">{{__("Publish")}}</option>
                            <option {{old("status", $row->status ?? "")=="draft"?"selected":false}} value="draft">{{__("Draft")}}</option>
                        </select>
                    </div>
                    @error("status")
                    <span class="text-danger">{{$message}}</span>
                    @enderror
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

                <div class="col-sm-12">
                    <div class="form-group">
                        <label class="">{{__("Requirements")}} </label>
                        <textarea
                            class="form-control"
                            name="requirements"
                            id="tinymce"
                            cols="30"
                            rows="10">{{old("requirements", $row->requirements ?? "")}}</textarea>
                        @error("requirements")
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>

                <div class="col-sm-12">
                    <div class="form-group">
                        <label class="">{{__("Responsibilities")}} </label>
                        <textarea
                            class="form-control"
                            name="responsibilities"
                            id="tinymce"
                            cols="30"
                            rows="10">{{old("responsibilities", $row->responsibilities ?? "")}}</textarea>
                        @error("responsibilities")
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

