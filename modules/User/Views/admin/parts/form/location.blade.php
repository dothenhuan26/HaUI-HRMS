<div class="row">
    <h3>Location</h3>
    <div class="col-md-4">
        <div class="form-group">
            <label>{{__("Address")}}</label>
            <input
                name="address"
                type="text"
                class="form-control"
                value="{{old("address", $row->address ?? "")}}">
            @error("address")
            <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
    </div>

    <div class="col-md-3">
        <div class="form-group">
            <label>{{__("Country")}}</label>
            <input
                type="text"
                name="country"
                class="form-control"
                value="{{old("country", $row->country ?? "")}}">
            @error("country")
            <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
    </div>

    <div class="col-md-3">
        <div class="form-group">
            <label>{{__("Nationality")}} <span class="text-danger">*</span></label>
            <input
                name="national"
                class="form-control"
                type="text"
                value="{{old("national", $row->national ?? "")}}">
            @error("national")
            <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
    </div>
</div>
