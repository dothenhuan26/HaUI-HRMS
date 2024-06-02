<!-- Search Filter -->
<form
    action=""
    method="GET">
    <div class="row filter-row">
        <div class="col-sm-6 col-md-3"></div>
        <div class="col-sm-6 col-md-3">
            <div class="form-group form-focus">
                <input
                    type="text"
                    name="name"
                    value="{{old('name')}}"
                    class="form-control floating">
                <label class="focus-label">{{__("Designation Name")}}</label>
            </div>
        </div>
        <div class="col-sm-6 col-md-3">
            <div class="form-group form-focus select-focus">
                <select
                    name="department_id"
                    class="select floating">
                    <option value="" class="disabled">{{__("Select Department")}}</option>
                    @if(!empty($departments))
                        @foreach($departments as $key => $item)
                            <option value="{{$item->id}}" {{old("department_id")==$item->id?"selected":false}}>{{$item->name}}</option>
                        @endforeach
                    @endif
                </select>
                <label class="focus-label">{{__("Department")}}</label>
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
