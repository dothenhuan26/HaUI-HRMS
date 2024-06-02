<div class="row">
    <div class="col-md-12">
        <div>
            <table class="table table-striped custom-table mb-0 datatable">
                <thead>
                <tr>
                    <th style="width: 30px;">{{__("#")}}</th>
                    <th>{{__("Department Name")}}</th>
                    <th class="text-right">{{__("Action")}}</th>
                </tr>
                </thead>
                <tbody>
                @if($rows->count()>0)
                    @foreach($rows as $key => $row)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$row->name}}</td>
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
                                            href="{{route("department.admin.update", $row->id)}}"
                                        ><i class="fa fa-pencil m-r-5"></i> {{__("Edit")}}</a>
                                        <a
                                            class="dropdown-item {{$randDelete}}"
                                            href="{{route("department.admin.delete", $row->id)}}"
                                            id=""
                                            data-toggle="modal"
                                            data-target="#delete_department"><i class="fa fa-trash-o m-r-5"></i> {{__("Delete")}}</a>
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
</div>
