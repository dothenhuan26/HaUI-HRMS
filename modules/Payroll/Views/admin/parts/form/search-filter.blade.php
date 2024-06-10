<!-- Search Filter -->
<form
    action=""
    method="GET">
    <div class="row filter-row">
        <div class="col-sm-6 col-md-3 col-lg-3 col-xl-2 col-12">
            <div class="form-group form-focus">
                <input
                    type="text"
                    name="name"
                    class="form-control floating">
                <label class="focus-label">{{__("Employee Name")}}</label>
            </div>
        </div>
        <div class="col-sm-6 col-md-3 col-lg-3 col-xl-2 col-12">
            <div class="form-group form-focus select-focus">
                <select
                    name="role_id"
                    class="select floating">

                    <option value=""> -- {{__("Select")}} --</option>
                    @if($roles->count()>0)
                        @foreach($roles as $role)
                            <option value="{{$role->id}}">{{$role->name}}</option>
                        @endforeach
                    @endif
                </select>
                <label class="focus-label">{{__("Role")}}</label>
            </div>
        </div>
        <div class="col-sm-6 col-md-3 col-lg-3 col-xl-2 col-12">
            <div class="form-group form-focus select-focus">
                <select class="select floating">
                    <option> -- {{__("Select")}} --</option>
                    <option> {{__("Pending")}}</option>
                    <option> {{__("Approved")}}</option>
                    <option> {{__("Rejected")}}</option>
                </select>
                <label class="focus-label">{{__("Leave Status")}}</label>
            </div>
        </div>
        <div class="col-sm-6 col-md-3 col-lg-3 col-xl-2 col-12">
            <div class="form-group form-focus">
                <div class="cal-icon">
                    <input
                        name="from"
                        class="form-control floating datetimepicker"
                        type="text">
                </div>
                <label class="focus-label">{{__("From")}}</label>
            </div>
        </div>
        <div class="col-sm-6 col-md-3 col-lg-3 col-xl-2 col-12">
            <div class="form-group form-focus">
                <div class="cal-icon">
                    <input
                        name="to"
                        class="form-control floating datetimepicker"
                        type="text">
                </div>
                <label class="focus-label">{{__("To")}}</label>
            </div>
        </div>
        <div class="col-sm-6 col-md-3 col-lg-3 col-xl-2 col-12">
            <button
                class="btn btn-success btn-block"
                type="submit">{{__("Search")}}
            </button>
        </div>
    </div>

</form>
<!-- Search Filter -->
