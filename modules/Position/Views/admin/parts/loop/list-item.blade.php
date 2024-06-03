<div class="row">
    <div class="col-md-12">
        <div class="table-responsive">
            <table class="table table-striped custom-table mb-0 datatable">
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
                            <td><a href="job-details.html">{{$row->title}}</a></td>
                            <td>{{$row->department->name}}</td>
                            <td>{{$row->start_date->format("d M Y")}}</td>
                            <td>{{$row->expired_date->format("d M Y")}}</td>
                            <td>{{$row->job_type}}</td>
                            <td>{{$row->status}}</td>
                            <td><a
                                    href="job-applicants.html"
                                    class="btn btn-sm btn-danger">3 Candidates</a></td>
                            <td class="text-right">
                                <div class="dropdown dropdown-action">
                                    <a
                                        href="#"
                                        class="action-icon dropdown-toggle"
                                        data-toggle="dropdown"
                                        aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a
                                            href="#"
                                            class="dropdown-item"
                                            data-toggle="modal"
                                            data-target="#edit_job"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                        <a
                                            href="#"
                                            class="dropdown-item"
                                            data-toggle="modal"
                                            data-target="#delete_job"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
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
