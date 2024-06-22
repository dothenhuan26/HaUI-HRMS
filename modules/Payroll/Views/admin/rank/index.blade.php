@extends('admin.layouts.app')

@section("content")

    @include("admin.messages")

    @php
        $randDelete = \Illuminate\Support\Str::random();
        $randDeleteContinue = \Illuminate\Support\Str::random();
    @endphp

    <div class="row">
        <div class="col">
            <a
                    href="{{route("rank.admin.detail")}}"
                    class="btn btn-primary mb-3"
            >{{__("Update Salary Rank")}}</a>

        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="d-flex justify-content-end">
                <p><i>{{__("Found :number items", ["number" => $rows->count()])}}</i></p>
            </div>
            <div class="table-responsive">
                <table class="table table-striped custom-table">
                    <thead>
                    <tr>
                        <th>{{__("Rank")}}</th>
                        <th>{{__("Coefficient")}}</th>
                        <th>{{__("From")}}</th>
                        <th>{{__("Description")}}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if($rows->count()>0)
                        @foreach($rows as $key => $row)
                            <tr>
                                <td>{{$row->rank}}</td>
                                <td>{{$row->coefficient}}</td>
                                <td>{{$row->from}}</td>
                                <td>{{$row->description}}</td>
                            </tr>
                        @endforeach
                    @endif

                    </tbody>
                </table>
            </div>
        </div>
        <div class="d-flex justify-content-end">
            {{$rows->links()}}
        </div>
    </div>



@endsection
