<!-- Chat Right Sidebar -->
<div
    class="col-lg-3 message-view chat-profile-view chat-sidebar"
    id="task_window">
    <div class="chat-window video-window">
        <div class="fixed-header">
            <ul class="nav nav-tabs nav-tabs-bottom">
                <li class="nav-item"><a
                        class="nav-link active"
                        href="#profile_tab"
                        data-toggle="tab">{{__("Information")}}</a></li>
            </ul>
        </div>
        <div class="tab-content chat-contents">
            <div
                class="content-full tab-pane show active"
                id="profile_tab">
                <div class="display-table">
                    <div class="table-row">
                        <div class="table-body">
                            <div class="table-content">
                                <div class="chat-profile-img">
                                    <div class="edit-profile-img">
                                        <img
                                            src="{{asset("assets/img/user.jpg")}}"
                                            alt="">
                                        <span class="change-img">{{__("Change Image")}}</span>
                                    </div>
                                    <h3 class="user-name m-t-10 mb-0">{{__("General")}}</h3>
                                    <small class="text-muted">{{__("Public")}}</small>
                                    <a
                                        href="javascript:void(0);"
                                        class="btn btn-primary edit-btn"><i class="fa fa-pencil"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /Chat Right Sidebar -->
