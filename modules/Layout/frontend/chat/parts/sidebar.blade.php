<!-- Sidebar -->
<div
    class="sidebar"
    id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div class="sidebar-menu">
            <ul class="chat-groups">
                <li>
                    <a href="/"><i class="la la-home"></i> <span>{{__("Back to Home")}}</span></a>
                </li>
                <li class="menu-title"><span>{{__("Chat Groups")}}</span> <a
                        href="#"
                        data-toggle="modal"
                        data-target="#add_group"><i
                            class="fa
                fa-plus"></i></a></li>
                <li class="active">
                    <a href="#">
									<span class="chat-avatar-sm user-img">
										<img
                                            class="rounded-circle"
                                            alt=""
                                            src="{{asset("assets/img/user.jpg")}}">
									</span>
                        <span class="chat-user">#{{__("General")}}</span>
                    </a>
                </li>


                {{--                Direct Chats--}}
            </ul>
            <ul class="direct-chats">
                <li class="menu-title">{{__("Direct Chats")}} <a
                        href="#"
                        data-toggle="modal"
                        data-target="#add_chat_user"><i class="fa fa-plus"></i></a></li>
{{--                <li>--}}
{{--                    <a href="chat.html">--}}
{{--									<span class="chat-avatar-sm user-img">--}}
{{--										<img--}}
{{--                                            class="rounded-circle"--}}
{{--                                            alt=""--}}
{{--                                            src="assets/img/profiles/avatar-02.jpg"><span class="status online"></span>--}}
{{--									</span>--}}
{{--                        <span class="chat-user">John Doe</span> <span class="badge badge-pill bg-danger">1</span>--}}
{{--                    </a>--}}
{{--                </li>--}}
            </ul>
        </div>
    </div>
</div>
<!-- /Sidebar -->
