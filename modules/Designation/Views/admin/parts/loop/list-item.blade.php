<div class="row">
    <div class="col-md-12 mb-3">
        <div class="table-responsive">
            <table class="table table-striped custom-table mb-0">
                <thead>
                <tr>
                    <th style="width: 30px;">{{__("#")}}</th>
                    <th>{{__("Designation")}} </th>
                    <th>{{__("Department")}} </th>
                    <th class="text-right">{{__("Action")}}</th>
                </tr>
                </thead>
                <tbody>

                @if($rows->count()>0)
                    @foreach($rows as $key => $row)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$row->name}}</td>
                            <td>{{$row->department->name}}</td>
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
                                            href="{{route("designation.admin.edit", ["id" => $row->id])}}">
                                            <i class="fa fa-pencil m-r-5"></i> {{__("Edit")}}</a>
                                        <a
                                            class="dropdown-item {{$randDelete}}"
                                            href="{{route("designation.admin.delete", ["id" => $row->id])}}"
                                            data-toggle="modal"
                                            data-target="#delete_designation">
                                            <i class="fa fa-trash-o m-r-5"></i> {{__("Delete")}}</a>
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

