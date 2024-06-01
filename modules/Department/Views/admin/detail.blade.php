@extends('admin.layouts.app')

@section("content")

    <div class="">
        <form
            method="POST"
            action="{{route("department.admin.store")}}">

            @csrf

            <div class="row">
                <h3>{{__("Department Information")}}</h3>

                <div class="col-sm-4">
                    <div class="form-group">
                        <label class="">{{__("Name")}} <span class="text-danger">*</span></label>
                        <input
                            name="name"
                            value="{{old("name", $row->first_name ?? '')}}"
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
                        <label class="">{{__("Phone")}} </label>
                        <input
                            name="phone"
                            value="{{old("phone", $row->phone ?? "")}}"
                            class="form-control"
                            placeholder="{{__("Phone")}}"
                            type="text">
                        @error("phone")
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="form-group">
                        <label class="">{{__("Email")}} <span class="text-danger">*</span></label>
                        <input
                            name="email"
                            placeholder="{{__("Email")}}"
                            value="{{old("email", $row->email ?? '')}}"
                            class="form-control"
                            required
                            type="email">
                        @error("email")
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label>{{__("Status")}}</label>
                        <select
                            name="status"
                            class="select form-control">
                            <option {{old("status")=="publish"?"selected":false}} value="publish">{{__("Publish")}}</option>
                            <option {{old("status")=="draft"?"selected":false}} value="draft">{{__("Draft")}}</option>
                        </select>
                    </div>
                    @error("gender")
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label>{{__("Manager")}}</label>
                        <select
                            name="manager_id"
                            class="select form-control">
                            <option value="">{{__(" -- Select Manager -- ")}}</option>
                            @if($users->count()>0)
                                @foreach($users as $key => $user)
                                    <option
                                        {{old("manager_id")==$user->id?"selected":false}}
                                        value="{{$user->id}}">{{$user->name}}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                    @error("manager_id")
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

                <div class="col-sm-3">
                    <div class="form-group">
                        <label class="">{{__("Budget")}} </label>
                        <input
                            name="phone"
                            value="{{old("budget", $row->budget ?? "")}}"
                            class="form-control"
                            placeholder="{{__("Budget")}}"
                            type="number">
                        @error("budget")
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
                            rows="10">{{old("description", $row->budget ?? "")}}</textarea>
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

