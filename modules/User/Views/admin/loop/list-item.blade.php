<div class="row">
    <div class="col-md-12">
        <div class="d-flex justify-content-end">
            <p><i>{{__("Found :number items", ["number" => $rows->count()])}}</i></p>
        </div>
        <div class="table-responsive">
            <table class="table table-striped custom-table">
                <thead>
                <tr>
                    <th>{{__("Name")}}</th>
                    <th>{{__("Employee ID")}}</th>
                    <th>{{__("Email")}}</th>
                    <th>{{__("Mobile")}}</th>
                    <th class="text-nowrap">{{__("Join Date")}}</th>
                    <th>{{__("Role")}}</th>
{{--                    <th>{{__("On Job Training")}}</th>--}}
                    <th>{{__("Contract")}}</th>
                    <th class="text-right no-sort">{{__("Action")}}</th>
                </tr>
                </thead>
                <tbody>
                @if($rows->count()>0)
                    @foreach($rows as $key => $row)
                        <tr>
                            <td>
                                <h2 class="table-avatar">
                                    <a
                                        href=""
                                        class="avatar"><img
                                            alt="{{__("Avatar")}}"
                                            src="{{$row->avatar?->url ?? asset("assets/img/user.jpg")}}"></a>
                                    <a href="">{{$row->name}} <span>{{$row->designation?->name}}</span></a>
                                </h2>
                            </td>
                            <td>{{limit($row->code, 7)}}</td>
                            <td>{{$row->email}}</td>
                            <td>{{mask($row->phone, '*', strlen($row->phone)-6)}}</td>
                            <td>{{$row->created_at->format("d M Y")}}</td>
                            <td>
                                {{$row->role->name}}
                            </td>
                            <td>
                                <a
                                    href="{{route("user.admin.contract", ["id" => $row->contract->id])}}"
                                    class="btn btn-info">{{__("Contract")}}</a>
                            </td>
{{--                            <td>--}}
{{--                                <a--}}
{{--                                    href="{{route("user.admin.ojt", ["id" => $row])}}"--}}
{{--                                    class="btn btn-info">{{__("Contract")}}</a>--}}
{{--                            </td>--}}
                            <td class="text-right">
                                <div class="dropdown dropdown-action">
                                    <a
                                        href="#"
                                        class="action-icon dropdown-toggle"
                                        data-toggle="dropdown"
                                        aria-expanded="false"><i class="material-icons">{{__("more_vert")}}</i></a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a
                                            class="dropdown-item"
                                            href="{{route("user.admin.update", $row->id)}}"
                                        ><i class="fa fa-pencil m-r-5"></i> {{__("Edit")}}</a>
                                        <a
                                            class="dropdown-item {{$randDelete}}"
                                            href="{{route("user.admin.delete", $row->id)}}"
                                            id=""
                                            data-toggle="modal"
                                            data-target="#delete_user"><i class="fa fa-trash-o m-r-5"></i> {{__("Delete")}}</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
        </div>
    </div>
    <div class="d-flex justify-content-end">
        {{$rows->links()}}
    </div>
</div>

