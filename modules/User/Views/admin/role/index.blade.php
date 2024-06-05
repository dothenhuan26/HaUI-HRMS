@extends('admin.layouts.app')

@section("content")

    @php
        $randDelete = \Illuminate\Support\Str::random();
        $randDeleteContinue = \Illuminate\Support\Str::random();
    @endphp

    @include("admin.messages")

    <div class="row d-flex justify-content-end">
        <div class="col-2">
            <a
                href="{{route("user.admin.create")}}"
                class="btn btn-warning mb-3 w-100"
            > {{__("Permission Matrix")}}</a>

        </div>
        <div class="col-2">
            <a
                href="{{route("user.admin.create")}}"
                class="btn add-btn mb-3 w-100"
            ><i class="fa fa-plus"></i> {{__("Add New Role")}}</a>

        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table table-striped custom-table mb-0">
                    <thead>
                    <tr>
                        <th>{{__("#")}}</th>
                        <th>{{__("ID")}}</th>
                        <th>{{__("Name")}}</th>
                        <th>{{__("Code")}}</th>
                        <th>{{__("Date")}}</th>
                        <th class="text-right">{{__("Actions")}}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if($rows->count()>0)
                        @foreach($rows as $key => $row)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{__("#:id", ["id" => $row->id])}}</td>
                                <td><a href="">{{$row->name}}</a></td>
                                <td>{{$row->code}}</td>
                                <td>{{$row->created_at?->format("d M Y")}}</td>
                                @if(!in_array($row->id, [1,2,3]))
                                    <td class="text-right">
                                        <div class="dropdown dropdown-action">
                                            <a
                                                href="#"
                                                class="action-icon dropdown-toggle"
                                                data-toggle="dropdown"
                                                aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a
                                                    class="dropdown-item"
                                                    href="{{route("position.admin.update", $row->id)}}"
                                                ><i class="fa fa-pencil m-r-5"></i> {{__("Edit")}}</a>
                                                <a
                                                    class="dropdown-item {{$randDelete}}"
                                                    href="{{route("position.admin.delete", $row->id)}}"
                                                    id=""
                                                    data-toggle="modal"
                                                    data-target="#delete_position"><i class="fa fa-trash-o m-r-5"></i> {{__("Delete")}}</a>
                                            </div>
                                        </div>
                                    </td>
                                @else
                                    <td></td> @endif
                            </tr>
                        @endforeach
                    @endif

                    </tbody>
                </table>
            </div>
        </div>
    </div>


    @include("User::admin.parts.delete")

@endsection

@push("js")

@endpush
