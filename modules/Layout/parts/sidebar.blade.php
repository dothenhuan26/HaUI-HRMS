@php

    $isEmployee = Auth::user()->hasRole("employee");

@endphp

<div
        class="sidebar"
        id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div
                id="sidebar-menu"
                class="sidebar-menu">
            <ul>
                @foreach(Menu::get() as $cateKey => $category)
                    <li class="menu-title">
                        <span>{{$cateKey}}</span>
                    </li>
                    @foreach($category as $module => $list)
                        <li class="submenu">
                            <a
                                    href="#"
                                    class="noti-dot"><i class="la la-user"></i> <span> {{$module}}</span> <span class="menu-arrow"></span></a>
                            <ul style="display: none;">
                                @foreach($list as $key => $item)
                                    <li>
                                        <a
                                                class="{{Route::currentRouteName()==$item["route"]?"active":false}}"
                                                href="{{route(empty($item["route"]) ? "dashboard.admin.index": $item["route"])}}">
                                            {{$item["label"] ?? ""}}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                    @endforeach
                @endforeach
            </ul>
        </div>
    </div>
</div>
