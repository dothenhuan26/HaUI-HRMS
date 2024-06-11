@php
    $isEmployee = Auth::user()->hasRole("employee");
    $roleId = Auth::user()->role_id;
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
                                class="noti-dot">
                                {!! Menu::getIcon($module) !!}
                                <span> {{$module}}</span> <span class="menu-arrow"></span></a>
                            <ul style="display: none;">
                                @foreach($list as $key => $item)
                                    @if(in_array($roleId, $item['roles']))
                                    <li>
                                        <a
                                            class="{{Route::currentRouteName()==$item["route"]?"active":false}}"
                                            href="{{route(empty($item["route"]) ? "dashboard.admin.index": $item["route"])}}">
                                            {{$item["label"] ?? ""}}
                                        </a>
                                    </li>
                                    @endif
                                @endforeach
                            </ul>
                        </li>
                    @endforeach
                @endforeach
            </ul>
        </div>
    </div>
</div>
