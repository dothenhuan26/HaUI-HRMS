@extends('admin.layouts.app')

@push("css")
    <!-- Select2 CSS -->
    <link
        rel="stylesheet"
        href="{{asset("assets/css/select2.min.css")}}">

    <!-- Datetimepicker CSS -->
    <link
        rel="stylesheet"
        href="{{asset("assets/css/bootstrap-datetimepicker.min.css")}}">
@endpush

@push("js")
    <!-- Select2 JS -->
    <script src="{{asset("assets/js/select2.min.js")}}"></script>

    <!-- Datetimepicker JS -->
    <script src="{{asset("assets/js/moment.min.js")}}"></script>
    <script src="{{asset("assets/js/bootstrap-datetimepicker.min.js")}}"></script>
@endpush

@section("content")
    <div class="row">
        <div class="col">
            <a
                href="#"
                class="btn add-btn mb-3"
                data-toggle="modal"
                data-target="#add_employee"><i class="fa fa-plus"></i> {{__("Add Employee")}}</a>

        </div>
    </div>

    @include("User::admin.parts.form.search-filter")

    <div class="row staff-grid-row">
        @if($rows->count()>0)
            @foreach($rows as $key => $row)
                <div class="col-md-4 col-sm-6 col-12 col-lg-4 col-xl-3">
                    <div class="profile-widget">
                        <div class="profile-img">
                            <a
                                href="profile.html"
                                class="avatar"><img
                                    src="assets/img/profiles/avatar-02.jpg"
                                    alt=""></a>
                        </div>
                        <div class="dropdown profile-action">
                            <a
                                href="#"
                                class="action-icon dropdown-toggle"
                                data-toggle="dropdown"
                                aria-expanded="false"><i class="material-icons">{{__("more_vert")}}</i></a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a
                                    class="dropdown-item"
                                    href="#"
                                    data-toggle="modal"
                                    data-target="#edit_employee"><i class="fa fa-pencil m-r-5"></i> {{__("Edit")}}</a>
                                <a
                                    class="dropdown-item"
                                    href="#"
                                    data-toggle="modal"
                                    data-target="#delete_employee"><i class="fa fa-trash-o m-r-5"></i> {{__("Delete")}}</a>
                            </div>
                        </div>
                        <h4 class="user-name m-t-10 mb-0 text-ellipsis"><a href="profile.html">{{$row->name}}</a></h4>
                        <div class="small text-muted">{{$row->designation->name}}</div>
                    </div>
                </div>
            @endforeach
        @endif

    </div>

    <div class="row">
        <div class="col">
            {{$rows->links()}}
        </div>
    </div>

@endsection
