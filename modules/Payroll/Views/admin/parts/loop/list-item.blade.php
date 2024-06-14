<div class="row">
    <div class="col-md-12">
        <div class="d-flex justify-content-end">
            <p><i>{{__("Found :number items", ["number" => $rows->count()])}}</i></p>
        </div>
        <div class="table-responsive">
            <table class="table table-striped custom-table">
                <thead>
                <tr>
                    <th>{{__("Employee")}}</th>
                    <th>{{__("Employee ID")}}</th>
                    <th>{{__("Email")}}</th>
                    <th>{{__("Join Date")}}</th>
                    <th>{{__("Role")}}</th>
                    <th>{{__("Salary")}}</th>
                    <th>{{__("Payslip")}}</th>
                    <th class="text-right">{{__("Action")}}</th>
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
                                            alt=""
                                            src="{{$row->avatar?->url}}"></a>
                                    <a href="">{{$row->name}} <span>{{$row->designation?->name}}</span></a>
                                </h2>
                            </td>
                            <td>{{$row->code}}</td>
                            <td>{{$row->email}}</td>
                            <td>{{$row->created_at->format("d M Y")}}</td>
                            <td>{{$row->role->name}}</td>
                            <td>{{$row->payroll->salary}}</td>
                            <td>
                                <a
                                    class="btn btn-sm btn-primary"
                                    href="">{{__("Generate Slip")}}</a>
                            </td>
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
                                            href="{{route("payroll.admin.update", $row->id)}}"
                                        ><i class="fa fa-pencil m-r-5"></i> {{__("Edit")}}</a>
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

