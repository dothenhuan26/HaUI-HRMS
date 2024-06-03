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
                    <th>{{__("Title")}} </th>
                    <th>{{__("Holiday Date")}}</th>
                    <th>{{__("Day")}}</th>
                    <th class="text-right">{{__("Action")}}</th>
                </tr>
                </thead>
                <tbody>
                @if($rows->count()>0)
                    @foreach($rows as $key => $row)
                        <tr class="{{!(\Carbon\Carbon::now()->gt($row->holiday_date))?"holiday-upcoming":"holiday-completed disable opacity-25"}}">
                            <td>{{$key+1}}</td>
                            <td>{{$row->title}}</td>
                            <td>{{$row->holiday_date->format("d M Y")}}</td>
                            <td>{{$row->day_of_week}}</td>
                            @if((\Carbon\Carbon::now()->gt($row->holiday_date)))
                                <td></td>
                            @else
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
                                                href="{{route("holiday.admin.update", $row->id)}}"
                                            ><i class="fa fa-pencil m-r-5"></i> {{__("Edit")}}</a>
                                            <a
                                                class="dropdown-item {{$randDelete}}"
                                                href="{{route("holiday.admin.delete", $row->id)}}"
                                                id=""
                                                data-toggle="modal"
                                                data-target="#delete_holiday"><i class="fa fa-trash-o m-r-5"></i> {{__("Delete")}}</a>
                                        </div>
                                    </div>
                                </td>
                            @endif
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
