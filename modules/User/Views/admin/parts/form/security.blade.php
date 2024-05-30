<div class="row">
    <h3>{{__("Security")}}</h3>
    <div class="col-sm-6">
        <div class="form-group">
            <label class="col-form-label">{{__("Password")}}</label>
            <input
                name="password"
                class="form-control"
                type="password">
            @error("password")
            <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
    </div>
    <div class="col-sm-6">
        <div class="form-group">
            <label class="col-form-label">{{__("Confirm Password")}}</label>
            <input
                name="confirm_password"
                class="form-control"
                type="password">
            @error("confirm_password")
            <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
    </div>
</div>
