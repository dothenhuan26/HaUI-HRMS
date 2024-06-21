<div class="tab-content">

    <div
        id="emp_profile"
        class="pro-overview tab-pane fade show active">
        <div class="row">
            <div class="col-md-6 d-flex">
                <div class="card profile-box flex-fill">
                    <div class="card-body">
                        <h3 class="card-title">{{__("Personal Informations")}} <a
                                href="{{route("user.admin.update", ["id" => $row->id,])}}"
                                class="edit-icon"
                            ><i
                                    class="fa
                        fa-pencil"></i></a></h3>
                        <ul class="personal-info">
                            <li>
                                <div class="title">{{__("Passport No.")}}</div>
                                <div class="text">{{$row->passport}}</div>
                            </li>
                            <li>
                                <div class="title">{{__("Passport Exp Date.")}}</div>
                                <div class="text">{{$row->passport_exp}}</div>
                            </li>
                            <li>
                                <div class="title">{{__("Tel")}}</div>
                                <div class="text"><a href="">{{$row->number}}</a></div>
                            </li>
                            <li>
                                <div class="title">{{__("Nationality")}}</div>
                                <div class="text">{{$row->national}}</div>
                            </li>
                            <li>
                                <div class="title">{{__("Country")}}</div>
                                <div class="text">{{$row->country}}</div>
                            </li>
                            <li>
                                <div class="title">{{__("Religion")}}</div>
                                <div class="text">{{$row->religion}}</div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-md-6 d-flex">
                <div class="card profile-box flex-fill">
                    <div class="card-body">
                        <h3 class="card-title">{{__("Bank information")}}</h3>
                        <ul class="personal-info">
                            <li>
                                <div class="title">{{__("Bank name")}}</div>
                                <div class="text">...</div>
                            </li>
                            <li>
                                <div class="title">{{__("Bank account No.")}}</div>
                                <div class="text">...</div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 d-flex">
                <div class="card profile-box flex-fill">
                    <div class="card-body">
                        <h3 class="card-title">{{__("Education Informations")}} <a
                                href="{{route("user.admin.update", ["id" => $row->id,])}}"
                                class="edit-icon"
                            ><i class="fa fa-pencil"></i></a></h3>

                        <div class="experience-box">
                            <ul class="experience-list">
                                @if(!empty($row->educations))
                                    @foreach($row->educations as $item)
                                        <li>
                                            <div class="experience-user">
                                                <div class="before-circle"></div>
                                            </div>
                                            <div class="experience-content">
                                                <div class="timeline-content">
                                                    <a
                                                        href="#/"
                                                        class="name">{{$item["institution"]}}</a>
                                                    <div>{{$item["degree"]}}</div>
                                                    <span class="time">
                                                        {{date("Y", strtotime($item["start_date"]))}} -
                                                        {{date("Y", strtotime($item["complete_date"]))}}
                                                    </span>
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach
                                @endif


                            </ul>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-md-6 d-flex">
                <div class="card profile-box flex-fill">
                    <div class="card-body">
                        <h3 class="card-title">{{__("Experience")}} <a
                                href="{{route("user.admin.update", ["id" => $row->id,])}}"
                                class="edit-icon"
                            ><i class="fa fa-pencil"></i></a></h3>
                        <div class="experience-box">
                            <ul class="experience-list">
                                @if(!empty($row->experiences))
                                    @foreach($row->experiences as $item)
                                        <li>
                                            <div class="experience-user">
                                                <div class="before-circle"></div>
                                            </div>
                                            <div class="experience-content">
                                                <div class="timeline-content">
                                                    <a
                                                        href="#/"
                                                        class="name">
                                                        {{$item["job_position"]}} {{__("at")}} {{$item["company_name"]}}
                                                    </a>
                                                    <span class="time">
                                                        {{date("M Y", strtotime($item["period_from"]))}} -
                                                        {{date("M Y", strtotime($item["period_to"]))}}</span>
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach
                                @endif

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
