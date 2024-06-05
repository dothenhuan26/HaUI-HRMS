<div class="row">
    @if($rows->count()>0)
        @foreach($rows as $key => $row)
            <div class="col-md-6">
                <a
                    class="job-list"
                    href="{{route("job.detail.view", ["slug" => $row->slug])}}">
                    <div class="job-list-det">
                        <div class="job-list-desc">
                            <h3 class="job-list-title">{{$row->title}}</h3>
                            <h4 class="job-department">{{$row->department->name}}</h4>
                        </div>
                        <div class="job-type-info">
                            <span class="job-types">{{$row->job_type}}</span>
                        </div>
                    </div>
                    <div class="job-list-footer">
                        <ul>
                            <li><i class="fa fa-map-signs"></i> {{$row->location}}</li>
                            <li><i class="fa fa-money"></i> ${{$row->salary_from}}-${{$row->salary_to}}</li>
                            <li><i class="fa fa-clock-o"></i> {{__(":days days ago", ["days" => \Carbon\Carbon::now()->diffInDays($row->start_date)])}}</li>
                        </ul>
                    </div>
                </a>
            </div>
        @endforeach
    @endif
</div>
