@extends('admin.layouts.app')

@section("content")

    <div class="row">
        <div class="col-md-8">
            <div class="job-info job-widget">
                <h3 class="job-title">{{$row->title}}</h3>
                <span class="job-dept">{{$row->department->name}}</span>
                <ul class="job-post-det">
                    <li><i class="fa fa-calendar"></i> {{__("Post Date")}}: <span class="text-blue">{{$row->start_date->format("M d, Y")}}</span></li>
                    <li><i class="fa fa-calendar"></i> {{__("Last Date")}}: <span class="text-blue">{{$row->expired_date->format("M d, Y")}}</span>
                    </li>
                    <li><i class="fa fa-user-o"></i> {{__("Applications")}}: <span class="text-blue">{{$row->candidates}}</span></li>
                    <li><i class="fa fa-eye"></i> {{__("Views")}}: <span class="text-blue">{{$row->views}}</span></li>
                </ul>
            </div>
            <div class="job-content job-widget">
                <div class="job-desc-title"><h4>{{__("Job Description")}}</h4></div>
                <div class="job-description">{!! $row->description !!}</div>
            </div>

            <div class="job-content job-widget">
                <div class="job-desc-title"><h4>{{__("Job Requirements")}}</h4></div>
                <div class="job-description">{!! $row->requirements !!}</div>
            </div>

            <div class="job-content job-widget">
                <div class="job-desc-title"><h4>{{__("Job Responsibilities")}}</h4></div>
                <div class="job-description">{!! $row->responsibilities !!}</div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="job-det-info job-widget">
                <a
                    class="btn job-btn"
                    href="{{route("position.admin.update", $row->id)}}">{{__("Edit")}}</a>
                <div class="info-list">
                    <span><i class="fa fa-bar-chart"></i></span>
                    <h5>{{__("Job Type")}}</h5>
                    <p> {{$row->job_type}}</p>
                </div>
                <div class="info-list">
                    <span><i class="fa fa-money"></i></span>
                    <h5>{{__("Salary")}}</h5>
                    <p>${{$row->salary_from}} - ${{$row->salary_to}}</p>
                </div>
                <div class="info-list">
                    <span><i class="fa fa-suitcase"></i></span>
                    <h5>{{__("Experience")}}</h5>
                    <p>{{$row->experiences}} {{__("Years")}}</p>
                </div>
                <div class="info-list">
                    <span><i class="fa fa-ticket"></i></span>
                    <h5>{{__("Vacancy")}}</h5>
                    <p>{{$row->vacancies}}</p>
                </div>
                <div class="info-list">
                    <span><i class="fa fa-map-signs"></i></span>
                    <h5>{{__("Location")}}</h5>
                    <p> {{$row->location}}</p>
                </div>
                <div class="info-list">
                    <p class="text-truncate">
                        {!! $row->contact !!}
                    </p>
                </div>
                <div class="info-list text-center">
                    <a
                        class="app-ends"
                        href="#">{{__("Application ends in :days Days", ["days" => \Carbon\Carbon::now()->diffInDays($row->expired_date)])}}</a>
                </div>
            </div>
        </div>
    </div>

@endsection

