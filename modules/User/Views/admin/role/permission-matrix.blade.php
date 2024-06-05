@extends('admin.layouts.app')

@section("content")


    <div class="row">
        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table table-striped custom-table mb-0">
                    <thead>
                    <tr>
                        <th><strong>{{__("Role")}}</strong></th>
                        @foreach($roles as $role)
                            <th><strong>{{ucfirst($role->name)}}</strong></th>
                        @endforeach
                    </tr>
                    </thead>
                    <tbody>

                    @if(!empty($permissions))
                        @foreach($permissions as $permisison)
                            <tr>
                                <td>{{$permisison}}</td>
                                @foreach($roles as $role)
                                    <td>
                                        <input
                                            type="checkbox"
                                            @if(in_array($permisison, $selectedIds[$role->id])) checked
                                            @endif
                                            name="matrix[{{$role->id}}][]"
                                            value="{{$permisison}}"
                                        >
                                    </td>
                                @endforeach
                            </tr>
                        @endforeach
                    @endif

                    </tbody>
                </table>
            </div>
        </div>
    </div>



@endsection

@push("js")

@endpush
