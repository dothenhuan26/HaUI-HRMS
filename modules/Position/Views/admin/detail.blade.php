@extends('admin.layouts.app')

@section("content")

    @include("admin.messages")

    <div class="">
        <form
            method="POST"
            action="{{route("position.admin.store", ["id" => $row->id ?? ""])}}">

            @csrf

            <div class="row">
                <h3>{{__("Position Information")}}</h3>

                <div class="col-sm-4">
                    <div class="form-group">
                        <label class="">{{__("Title")}} <span class="text-danger">*</span></label>
                        <input
                            name="title"
                            value="{{old("title", $row->title ?? '')}}"
                            class="form-control"
                            placeholder="{{__("Title")}}"
                            required
                            type="text">
                        @error("title")
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>

                <div class="col-sm-2">
                    <div class="form-group">
                        <label class="">{{__("No of Vacancies")}} </label>
                        <input
                            name="vacancies"
                            value="{{old("vacancies", $row->vacancies ?? "")}}"
                            class="form-control"
                            placeholder="{{__("No of Vacancies")}}"
                            type="number">
                        @error("vacancies")
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>

                <div class="col-sm-2">
                    <div class="form-group">
                        <label class="">{{__("Age")}} <span class="text-danger">*</span></label>
                        <input
                            name="age"
                            placeholder="{{__("Age")}}"
                            value="{{old("age", $row->age ?? '')}}"
                            class="form-control"
                            required
                            type="number">
                        @error("age")
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-group">
                        <label>{{__("Status")}}</label>
                        <select
                            name="status"
                            class="select form-control">
                            <option {{old("status", $row->status ?? "")=="Open"?"selected":false}} value="Open">{{__("Open")}}</option>
                            <option {{old("status", $row->status ?? "")=="Closed"?"selected":false}} value="Closed">{{__("Closed")}}</option>
                            <option {{old("status", $row->status ?? "")=="Cancelled"?"selected":false}} value="Cancelled">{{__("Cancelled")}}</option>
                        </select>
                    </div>
                    @error("status")
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

                <div class="col-md-2">
                    <div class="form-group">
                        <label>{{__("Job Type")}}</label>
                        <select
                            name="job_type"
                            class="select form-control">
                            <option {{old("job_type", $row->job_type ?? "")=="Full Time"?"selected":false}} value="Full Time">{{__("Full Time")}}</option>
                            <option {{old("job_type", $row->job_type ?? "")=="Part Time"?"selected":false}} value="Part Time">{{__("Part Time")}}</option>
                            <option {{old("job_type", $row->job_type ?? "")=="Internship"?"selected":false}} value="Internship">{{__("Internship")}}</option>
                            <option {{old("job_type", $row->job_type ?? "")=="Temporary"?"selected":false}} value="Temporary">{{__("Temporary")}}</option>
                            <option {{old("job_type", $row->job_type ?? "")=="Remote"?"selected":false}} value="Remote">{{__("Remote")}}</option>
                            <option {{old("job_type", $row->job_type ?? "")=="Others"?"selected":false}} value="Others">{{__("Others")}}</option>
                        </select>
                    </div>
                    @error("job_type")
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

                <div class="col-sm-4">
                    <div class="form-group">
                        <label class="">{{__("Location")}} </label>
                        <input
                            name="location"
                            value="{{old("location", $row->location ?? "")}}"
                            class="form-control"
                            placeholder="{{__("Location")}}"
                            type="text">
                        @error("location")
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>

                <div class="col-sm-3">
                    <div class="form-group">
                        <label class="">{{__("Start Date")}} <span class="text-danger">*</span></label>
                        <div class="cal-icon">
                            <input
                                name="start_date"
                                value="{{old("start_date", $row?->start_date->format("m/d/Y") ?? '')}}"
                                class="form-control datetimepicker"
                                placeholder="{{__("Start Date")}}"
                                type="text">
                        </div>
                        @error("start_date")
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>

                <div class="col-sm-3">
                    <div class="form-group">
                        <label class="">{{__("Expired Date")}} <span class="text-danger">*</span></label>
                        <div class="cal-icon">
                            <input
                                name="expired_date"
                                value="{{old("expired_date", $row?->expired_date->format("m/d/Y") ?? '')}}"
                                class="form-control datetimepicker"
                                placeholder="{{__("Expired Date")}}"
                                type="text">
                        </div>
                        @error("expired_date")
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>

                <div class="col-sm-2">
                    <div class="form-group">
                        <label class="">{{__("Experiences")}} <span class="text-danger">*</span></label>
                        <input
                            name="experiences"
                            placeholder="{{__("Experiences")}}"
                            value="{{old("experiences", $row->experiences ?? '')}}"
                            class="form-control"
                            required
                            type="number">
                        @error("experiences")
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>

                <div class="col-sm-2">
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

                <div class="col-sm-2">
                    <div class="form-group">
                        <label class="">{{__("Salary To")}} <span class="text-danger">*</span></label>
                        <input
                            name="salary_to"
                            placeholder="{{__("Salary To")}}"
                            value="{{old("salary_to", $row->salary_to ?? '')}}"
                            class="form-control"
                            required
                            type="number">
                        @error("salary_to")
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label>{{__("Department")}} <span class="text-danger">*</span></label>
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

                <div class="col-sm-4">
                    <div class="form-group">
                        <label class="">{{__("Requirements")}} <span class="text-danger">*</span></label>
                        <textarea
                            class=""
                            name="requirements"
                            id="tinymce"
                            cols="30"
                            rows="10">{{old("requirements", $row->requirements ?? "")}}</textarea>
                        @error("requirements")
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="form-group">
                        <label class="">{{__("Responsibilities")}} <span class="text-danger">*</span></label>
                        <textarea
                            class=""
                            name="responsibilities"
                            id="tinymce"
                            cols="30"
                            rows="10">{{old("responsibilities", $row->responsibilities ?? "")}}</textarea>
                        @error("responsibilities")
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="form-group">
                        <label class="">{{__("Contact")}} <span class="text-danger">*</span></label>
                        <textarea
                            class=""
                            name="contact"
                            id="tinymce"
                            cols="30"
                            rows="10">{{old("contact", $row->contact ?? "")}}</textarea>
                        @error("contact")
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

