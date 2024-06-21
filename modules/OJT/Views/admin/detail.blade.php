@extends('admin.layouts.app')

@php
    $randSelectDepartmentId = \Illuminate\Support\Str::random();
    $ids = [];
    if($row = $row ?? null)
        $ids = $row?->users?->pluck("id")->toArray();
@endphp

@section("content")

    @include("admin.messages")

    <div class="">
        <form
            method="POST"
            action="{{route("ojt.admin.store", ["id" => $row?->id ?? ""])}}">

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

            </div>
            <hr>
            <div class="row">
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
            </div>
            <hr>
            <div class="row">
                <div class="col-sm-12">
                    <h3>{{__("Description")}} <span class="text-danger">*</span></h3>
                    <div class="form-group">
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

            <hr>

            <div class="row">
                <div class="col-sm-12">
                    <h3>{{__("Trained Employees")}}</h3>

                    <div class="card">
                        <div class="card-header">
                            <h4>{{__("Filter Employees")}}</h4>

                            <div class="row filter-row">
                                <div class="col-sm-6 col-md-3">
                                    <div class="form-group form-focus select-focus">
                                        <select
                                            id="{{$randSelectDepartmentId}}"
                                            name="department_id"
                                            class="select floating">
                                            <option
                                                value=""
                                                class="disabled">{{__("Select Department")}}</option>
                                            @if(!empty($departments))
                                                @foreach($departments as $key => $item)
                                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                        <label class="focus-label">{{__("Departments")}}</label>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="card-body">
                            <div class="table-responsive form-scroll form-group-item">
                                <table
                                    id="users"
                                    class="table table-striped custom-table"
                                    style="width:100%">
                                    <thead>
                                    <tr>
                                        <th width="5%"><input
                                                type="checkbox"
                                                class="check-all">
                                        </th>
                                        <th width="15%">{{__("Name")}}</th>
                                        <th>{{__("Email")}}</th>
                                    </tr>
                                    </thead>

                                    <tbody class="list-user">

                                    </tbody>
                                </table>
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


@push("js")
    <script>
        const ids = {{json_encode($ids)}};

        function genUserElementFromApi(apiPath, listUser) {
            window.axios.get(apiPath).then(function(response) {
                const data = response.data;
                const users = data.users;
                listUser.empty();
                users.forEach(e => listUser.append(createUserRowElement(e)));
            });
        }

        function createUserRowElement(user) {
            const rowElement = jQuery('<tr>', {
                id: '',
                class: '',
                title: '',
            });

            const tdInputElement = jQuery('<td>', {
                id: '',
                class: '',
                title: '',
            });

            const inputElement = jQuery('<input>', {
                id: '',
                class: 'user-selected',
                title: '',
                name: 'user_ids[]',
                type: 'checkbox',
                value: user.id,
                checked: ids.includes(user.id),
            });

            const tdNameElement = jQuery('<td>', {
                id: '',
                class: '',
                title: '',
                text: user.name,
            });

            const tdEmailElement = jQuery('<td>', {
                id: '',
                class: '',
                title: '',
                text: user.email,
            });

            tdInputElement.append(inputElement);
            rowElement.append(tdInputElement);
            rowElement.append(tdNameElement);
            rowElement.append(tdEmailElement);
            $('.list-user').append(rowElement);
        }

    </script>

    <script type="module">
        $(document).ready(() => {
            $('#{{$randSelectDepartmentId}}').change(e => {
                let id = e.target.value;
                const listUser = $('.list-user');
                let apiPath = "{{parse_url(route('api.user.index'))['path']}}";
                if (!id) {
                    window.axios.get(apiPath).then(function(response) {
                        genUserElementFromApi(apiPath, listUser);
                    });
                } else {
                    apiPath = "{{parse_url(route('api.department.users', "department_id"))['path']}}";
                    apiPath = apiPath.replace('department_id', id);
                    genUserElementFromApi(apiPath, listUser);
                }
                $('.check-all').prop('checked', false).change(function(e) {
                    $('.user-selected').prop('checked', this.checked);
                });

            });
        })

        genUserElementFromApi("{{parse_url(route('api.user.index'))['path']}}", $('.list-user'));
    </script>
@endpush
