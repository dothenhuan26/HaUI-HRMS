<div class="card mb-0">
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <div class="profile-view">
                    <div class="profile-img-wrap">
                        <div class="profile-img">
                            <a href="#"><img
                                    alt=""
                                    src="{{$row->avatar?->url ?? asset("assets/img/user.jpg")}}"></a>
                        </div>
                    </div>
                    <div class="profile-basic">
                        <div class="row">
                            <div class="col-md-5">
                                <div class="profile-info-left">
                                    <h3 class="user-name m-t-0 mb-0">{{$row->name}}</h3>
                                    <h6 class="text-muted">{{$row->designation->department->name}}</h6>
                                    <small class="text-muted">{{$row->designation->name}}</small>
                                    <div class="staff-id">{{$row->code}}</div>
                                    <div class="small doj text-muted">{{__("Date of Join : :date", ["date" => $row->created_at->format("d M Y")])}}</div>
                                    <div class="staff-msg"><a
                                            class="btn btn-custom"
                                            href="{{route("chat.public.index")}}">{{__("Send Message")}}</a></div>
                                </div>
                            </div>
                            <div class="col-md-7">
                                <ul class="personal-info">
                                    <li>
                                        <div class="title">{{__("Phone")}}:</div>
                                        <div class="text"><a href="">{{$row->phone}}</a></div>
                                    </li>
                                    <li>
                                        <div class="title">{{__("Email")}}:</div>
                                        <div class="text"><a href="">{{$row->email}}</a></div>
                                    </li>
                                    <li>
                                        <div class="title">{{__("Birthday")}}:</div>
                                        <div class="text">{{$row->birthday}}</div>
                                    </li>
                                    <li>
                                        <div class="title">{{__("Address")}}:</div>
                                        <div class="text">{{$row->address}}</div>
                                    </li>
                                    <li>
                                        <div class="title">{{__("Gender")}}:</div>
                                        <div class="text">{{$row->gender}}</div>
                                    </li>
                                    <li>
                                        <div class="title">{{__("Reports to")}}:</div>
                                        <div class="text">
                                            <div class="avatar-box">
                                                <div class="avatar avatar-xs">
                                                    <img
                                                        src="{{$row->userCreate->avatar?->url ?? asset("assets/img/user.jpg")}}"
                                                        alt="">
                                                </div>
                                            </div>
                                            <a href="#">
                                                {{$row->userCreate->name}}
                                            </a>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="pro-edit"><a
                            class="edit-icon"
                            href="{{route("user.admin.update", ["id" => $row->id,])}}"><i class="fa fa-pencil"></i></a></div>
                </div>
            </div>
        </div>
    </div>
</div>
