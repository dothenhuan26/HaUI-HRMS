<div class="row">
    <h3>{{__("Designation")}}</h3>
    <div class="col-md-3">
        <div class="form-group">
            <label>{{__("Designation")}} <span class="text-danger">*</span></label>
            <select
                name="designation_id"
                class="select">
                <option>Select Designation</option>
                @if(!empty($designations))
                    @foreach($designations as $key => $item)
                        <option
                            {{old("designation_id", $row->designation_id ?? '')==$item->id ? "selected" : false}}
                            value="{{$item->id}}">{{$item->name}}</option>
                    @endforeach
                @endif
            </select>
        </div>
        @error("designation_id")
        <span class="text-danger">{{$message}}</span>
        @enderror
    </div>

    <div class="col-md-3">
        <div class="form-group">
            <label>{{__("Status")}} <span class="text-danger">*</span></label>
            <select
                name="is_active"
                class="select">
                <option
                    value="no_active"
                    {{old("is_active", $row->status??"") == "no_active" ? "selected" : false}} name="is_active">{{__("No Active")
                }}</option>
                <option
                    value="active"
                    {{old("is_active", $row->status??"") == "active" ? "selected" : false}} name="is_active">{{__("Active")}}</option>
            </select>
        </div>
        @error("is_active")
        <span class="text-danger">{{$message}}</span>
        @enderror
    </div>

    <div class="col-md-3">
        <div class="form-group">
            <label>{{__("Role")}} <span class="text-danger">*</span></label>
            <select
                name="role_id"
                class="select">
                @if($roles->count()>0)
                    @foreach($roles as $role)
                        <option
                            value="{{$role->id}}"
                            {{old("role_id", $row->role_id ?? 3) == $role->id ? "selected" : false}}>{{$role->name}}</option>
                    @endforeach
                @endif

            </select>
        </div>
        @error("is_active")
        <span class="text-danger">{{$message}}</span>
        @enderror
    </div>

</div>
