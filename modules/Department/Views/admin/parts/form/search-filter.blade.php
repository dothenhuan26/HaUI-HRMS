<!-- Search Filter -->
<form
    action=""
    method="GET">
    <div class="row filter-row">
        <div class="col-md-6"></div>
        <div class="col-sm-6 col-md-3">
            <div class="form-group form-focus">
                <input
                    type="text"
                    name="name"
                    value="{{old('name')}}"
                    class="form-control floating">
                <label class="focus-label">{{__("Department Name")}}</label>
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
