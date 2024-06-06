@extends('admin.layouts.app')

@section("content")
    @include("admin.messages")
    <form
        action=""
        method="POST">
        @csrf
        <div class="row mb-3">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table table-striped custom-table mb-0">
                        <thead>
                        <tr>
                            <th><strong>{{__("Role")}}</strong></th>
                            @foreach($roles as $role)
                                <th class="text-center"><strong>{{ucfirst($role->name)}}</strong></th>
                            @endforeach
                        </tr>
                        </thead>
                        <tbody>

                        @if(!empty($permissionsGroup))
                            @foreach($permissionsGroup as $groupName => $permissions)
                                <tr class="">
                                    <td><strong>{{ucfirst($groupName)}}</strong></td>
                                    @foreach($roles as $role)
                                        <td></td>
                                    @endforeach
                                </tr>
                                @if(!empty($permissions))
                                    @foreach($permissions as $permission)
                                        <tr>
                                            <td>{{$permission}}</td>
                                            @foreach($roles as $role)
                                                <td class="text-center">
                                                    <input
                                                        type="checkbox"
                                                        @if(in_array($permission, $selectedIds[$role->id])) checked
                                                        @endif
                                                        name="matrix[{{$role->id}}][]"
                                                        value="{{$permission}}"
                                                    >
                                                </td>
                                            @endforeach

                                        </tr>

                                    @endforeach

                                @endif

                            @endforeach
                        @endif

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <hr/>

        <div class="d-flex justify-content-end">
            <button
                type="submit"
                class="btn btn-success">{{__("Save Change")}}</button>
        </div>

    </form>




@endsection

@push("js")

@endpush
