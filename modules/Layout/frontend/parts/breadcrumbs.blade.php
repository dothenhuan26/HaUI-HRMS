<!-- Page Header -->
<div class="page-header">
    <div class="row align-items-center">
        <div class="col">
            <h3 class="page-title">{{$page_title}}</h3>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route("dashboard.admin.index")}}">{{__("Home")}}</a></li>
                @if(!empty($breadcrumbs))
                    @foreach($breadcrumbs as $key => $breadcrumb)
                        @if(isset($breadcrumb["url"]))
                            <li class="breadcrumb-item">
                                <a href="{{$breadcrumb["url"]}}">{{$breadcrumb["name"]}}</a>
                            </li>
                        @else
                            <li class="breadcrumb-item {{$breadcrumb["class"]}}">
                                {{$breadcrumb["name"]}}
                            </li>
                        @endif
                    @endforeach
                @endif
            </ul>
        </div>
        <div class="col-auto float-right ml-auto">
            @if(isset($has_views) && $has_views)
                <div class="view-icons">
                    <a
                        href="{{route("user.admin.index", ["layout" => "grid-item"])}}"
                        class="grid-view btn btn-link active"><i class="fa fa-th"></i></a>
                    <a
                        href="{{route("user.admin.index")}}"
                        class="list-view btn btn-link"><i class="fa fa-bars"></i></a>
                </div>
            @endif
        </div>
    </div>
</div>
<!-- /Page Header -->
