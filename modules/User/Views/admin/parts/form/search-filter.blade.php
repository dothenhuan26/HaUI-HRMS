<!-- Search Filter -->
<form
    action=""
    method="GET">
    <div class="row filter-row">
        <div class="col-sm-6 col-md-3">
            <div class="form-group form-focus">
                <input
                    type="text"
                    name="code"
                    class="form-control floating">
                <label class="focus-label">{{__("Employee ID")}}</label>
            </div>
        </div>
        <div class="col-sm-6 col-md-3">
            <div class="form-group form-focus">
                <input
                    type="text"
                    name="name"
                    class="form-control floating">
                <label class="focus-label">{{__("Employee Name")}}</label>
            </div>
        </div>
        <div class="col-sm-6 col-md-3">
            <div class="form-group form-focus select-focus">
                <select
                    name="designation_id"
                    class="select floating">
                    <option value="" class="disabled">{{__("Select Designation")}}</option>
                    @if(!empty($designations))
                        @foreach($designations as $key => $item)
                            <option value="{{$item->id}}">{{$item->name}}</option>
                        @endforeach
                    @endif
                </select>
                <label class="focus-label">{{__("Designation")}}</label>
            </div>
        </div>
        <div class="col-sm-6 col-md-3">
            <button
                class="btn btn-success btn-block"
                type="submit">{{__("Search")}}
            </button>
        </div>
    </div>

</form>
<!-- Search Filter -->
