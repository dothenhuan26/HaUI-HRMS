<div class="header">

    <!-- Logo -->
    <div class="header-left">
        <a
            href="/"
            class="logo">
            <img
                src="https://i.pinimg.com/564x/78/f7/ce/78f7ce214095e3054ca85972d83d1651.jpg"
                width="40"
                height="40"
                alt="">
        </a>
    </div>
    <!-- /Logo -->

    @if(Auth::check())
        <a
            id="toggle_btn"
            href="javascript:void(0);">
					<span class="bar-icon">
						<span></span>
						<span></span>
						<span></span>
					</span>
        </a>
    @endif
<!-- Header Title -->
    <div class="page-title-box">
        <h3>{{__("human Resource Management System")}}</h3>
    </div>
    <!-- /Header Title -->

    @if(Auth::check())
    <a
        id="mobile_btn"
        class="mobile_btn"
        href="#sidebar"><i class="fa fa-bars"></i></a>
    @endif

    <!-- Header Menu -->
    <ul class="nav user-menu">

        <!-- Search -->
        <li class="nav-item">
            <div class="top-nav-search">
                <a
                    href="javascript:void(0);"
                    class="responsive-search">
                    <i class="fa fa-search"></i>
                </a>
                <form action="search.html">
                    <input
                        class="form-control"
                        type="text"
                        placeholder="Search here">
                    <button
                        class="btn"
                        type="submit"><i class="fa fa-search"></i></button>
                </form>
            </div>
        </li>
        <!-- /Search -->

        <!-- Flag -->
        <li class="nav-item dropdown has-arrow flag-nav">
            <a
                class="nav-link dropdown-toggle"
                data-toggle="dropdown"
                href="#"
                role="button">
                <img
                    src="{{asset("assets/img/flags/us.png")}}"
                    alt=""
                    height="20"> <span>English</span>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                <a
                    href="javascript:void(0);"
                    class="dropdown-item">
                    <img
                        src="{{asset("assets/img/flags/us.png")}}"
                        alt=""
                        height="16"> English
                </a>
                <a
                    href="javascript:void(0);"
                    class="dropdown-item">
                    <img
                        src="{{asset("assets/img/flags/fr.png")}}"
                        alt=""
                        height="16"> French
                </a>
            </div>
        </li>
        <!-- /Flag -->

    @if(Auth::check())
        <!-- Notifications -->
            <li class="nav-item dropdown">
                <a
                    href="#"
                    class="dropdown-toggle nav-link"
                    data-toggle="dropdown">
                    <i class="fa fa-bell-o"></i> <span class="badge badge-pill">3</span>
                </a>
                <div class="dropdown-menu notifications">
                    <div class="topnav-dropdown-header">
                        <span class="notification-title">Notifications</span>
                        <a
                            href="javascript:void(0)"
                            class="clear-noti"> Clear All </a>
                    </div>
                    <div class="noti-content">
                        <ul class="notification-list">
                            <li class="notification-message">
                                <a href="activities.html">
                                    <div class="media">
												<span class="avatar">
													<img
                                                        alt=""
                                                        src="{{asset("assets/img/profiles/avatar-02.jpg")}}">
												</span>
                                        <div class="media-body">
                                            <p class="noti-details"><span class="noti-title">John Doe</span> added new task <span class="noti-title">Patient appointment booking</span>
                                            </p>
                                            <p class="noti-time"><span class="notification-time">4 mins ago</span></p>
                                        </div>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="topnav-dropdown-footer">
                        <a href="activities.html">View all Notifications</a>
                    </div>
                </div>
            </li>
            <!-- /Notifications -->

            <!-- Message Notifications -->
            <li class="nav-item dropdown">
                <a
                    href="#"
                    class="dropdown-toggle nav-link"
                    data-toggle="dropdown">
                    <i class="fa fa-comment-o"></i> <span class="badge badge-pill">8</span>
                </a>
                <div class="dropdown-menu notifications">
                    <div class="topnav-dropdown-header">
                        <span class="notification-title">Messages</span>
                        <a
                            href="javascript:void(0)"
                            class="clear-noti"> Clear All </a>
                    </div>
                    <div class="noti-content">
                        <ul class="notification-list">
                            <li class="notification-message">
                                <a href="chat.html">
                                    <div class="list-item">
                                        <div class="list-left">
													<span class="avatar">
														<img
                                                            alt=""
                                                            src="{{asset("assets/img/profiles/avatar-09.jpg")}}">
													</span>
                                        </div>
                                        <div class="list-body">
                                            <span class="message-author">Richard Miles </span>
                                            <span class="message-time">12:28 AM</span>
                                            <div class="clearfix"></div>
                                            <span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="topnav-dropdown-footer">
                        <a href="chat.html">View all Messages</a>
                    </div>
                </div>
            </li>
            <!-- /Message Notifications -->

            <li class="nav-item dropdown has-arrow main-drop">
                <a
                    href="#"
                    class="dropdown-toggle nav-link"
                    data-toggle="dropdown">
							<span class="user-img"><img
                                    src="{{asset("assets/img/profiles/avatar-09.jpg")}}"
                                    alt="">
							<span class="status online"></span></span>
                    <span>Soeng Souy</span>
                </a>
                <div class="dropdown-menu">
                    <a
                        class="dropdown-item"
                        href="profile.html">My Profile</a>
                    <a
                        class="dropdown-item"
                        href="settings.html">Settings</a>
                    <a
                        class="dropdown-item"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                        href="{{route("auth.logout")}}">{{__("Logout")}}</a>
                    <form
                        id="logout-form"
                        action="{{route("auth.logout")}}"
                        method="POST"
                        class="logout-form">
                        @csrf
                    </form>
                </div>
            </li>
        @else
            <li class="nav-item">
                <a
                    class="nav-link"
                    href="{{route("auth.login")}}">{{__("Login")}}</a>
            </li>
            <li class="nav-item">
                <a
                    class="nav-link"
                    href="register.html">Register</a>
            </li>
        @endif
    </ul>
    <!-- /Header Menu -->

    @if(Auth::check())
    <!-- Mobile Menu -->
        <div class="dropdown mobile-user-menu">
            <a
                href="#"
                class="nav-link dropdown-toggle"
                data-toggle="dropdown"
                aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
            <div class="dropdown-menu dropdown-menu-right">
                <a
                    class="dropdown-item"
                    href="profile.html">My Profile</a>
                <a
                    class="dropdown-item"
                    href="settings.html">Settings</a>
                <a
                    class="dropdown-item"
                    href="login.html">Logout</a>
            </div>
        </div>
        <!-- /Mobile Menu -->
    @else
    <!-- Mobile Menu -->
        <div class="dropdown mobile-user-menu">
            <a
                href="#"
                class="nav-link dropdown-toggle"
                data-toggle="dropdown"
                aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
            <div class="dropdown-menu dropdown-menu-right">
                <a
                    class="dropdown-item"
                    href="login.html">Login</a>
                <a
                    class="dropdown-item"
                    href="register.html">Register</a>
            </div>
        </div>
        <!-- /Mobile Menu -->
    @endif

</div>
