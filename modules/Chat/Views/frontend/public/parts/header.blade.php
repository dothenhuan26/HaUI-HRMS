<div class="fixed-header">
    <div class="navbar">
        <div class="user-details mr-auto">
            <div class="float-left user-img">
                <a
                    class="avatar"
                    href="#"
                    title="{{__("General")}}">
                    <img
                        src="{{asset("assets/img/user.jpg")}}"
                        alt=""
                        class="rounded-circle">
                    <span class="status online"></span>
                </a>
            </div>
            <div class="user-info float-left">
                <a
                    href="#"
                    title="{{__("General")}}"><span>{{__("General")}}</span> <i class="typing-text">{{__("")}}</i></a>
                <span class="last-seen">{{__("All members")}}</span>
            </div>
        </div>
        <div class="search-box">
            <div class="input-group input-group-sm">
                <input
                    type="text"
                    placeholder="Search"
                    class="form-control">
                <span class="input-group-append">
													<button
                                                        type="button"
                                                        class="btn"><i class="fa fa-search"></i></button>
												</span>
            </div>
        </div>
        <ul class="nav custom-menu">
            <li class="nav-item">
                <a
                    class="nav-link task-chat profile-rightbar float-right"
                    id="task_chat"
                    href="#task_window"><i class="fa fa-user"></i></a>
            </li>
            <li class="nav-item">
                <a
                    href="#"
                    class="nav-link"><i class="fa fa-phone"></i></a>
            </li>
            <li class="nav-item">
                <a
                    href="#"
                    class="nav-link"><i class="fa fa-video-camera"></i></a>
            </li>
            <li class="nav-item dropdown dropdown-action">
                <a
                    aria-expanded="false"
                    data-toggle="dropdown"
                    class="nav-link dropdown-toggle"
                    href=""><i class="fa fa-cog"></i></a>
                <div class="dropdown-menu dropdown-menu-right">
                    <a
                        href="javascript:void(0)"
                        class="dropdown-item">Delete Conversations</a>
                    <a
                        href="javascript:void(0)"
                        class="dropdown-item">Settings</a>
                </div>
            </li>
        </ul>
    </div>
</div>
