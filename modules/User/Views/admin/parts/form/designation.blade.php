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
                        <option {{old("designation_id")==$item->id ? "selected" : false}} value="{{$item->id}}">{{$item->name}}</option>
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
                name="status"
                class="select">
                <option
                    value="no_active"
                    {{old("status", $row->status??"") == "no_active" ? "selected" : false}} name="no_active">{{__("No Active")
                }}</option>
                <option
                    value="active"
                    {{old("status", $row->status??"") == "active" ? "selected" : false}} name="active">{{__("Active")}}</option>
            </select>
        </div>
        @error("status")
        <span class="text-danger">{{$message}}</span>
        @enderror
    </div>
</div>
