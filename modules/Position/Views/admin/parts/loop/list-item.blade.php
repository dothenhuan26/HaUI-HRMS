<div class="row">
    <div class="col-md-12">
        <div class="d-flex justify-content-end">
            <p><i>{{__("Found :number items", ["number" => $rows->count()])}}</i></p>
        </div>
        <div class="table-responsive">
            <table class="table table-striped custom-table mb-0">
                <thead>
                <tr>
                    <th>{{__("#")}}</th>
                    <th>{{__("Job Title")}}</th>
                    <th>{{__("Department")}}</th>
                    <th>{{__("Start Date")}}</th>
                    <th>{{__("Expire Date")}}</th>
                    <th class="text-center">{{__("Job Type")}}</th>
                    <th class="text-center">{{__("Status")}}</th>
                    <th>{{__("Applicants")}}</th>
                    <th class="text-right">{{__("Actions")}}</th>
                </tr>
                </thead>
                <tbody>
                @if($rows->count()>0)
                    @foreach($rows as $key => $row)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td><a href="{{route("position.admin.preview", ["id" => $row->id])}}">{{$row->title}}</a></td>
                            <td>{{$row->department->name}}</td>
                            <td>{{$row->start_date->format("d M Y")}}</td>
                            <td>{{$row->expired_date->format("d M Y")}}</td>
                            <td>{{$row->job_type}}</td>
                            <td>{{$row->status}}</td>
                            <td><a
                                    href="job-applicants.html"
                                    class="btn btn-sm btn-danger">{{__(":number Candidates", ["number" => $row->candidates])}}</a></td>
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
