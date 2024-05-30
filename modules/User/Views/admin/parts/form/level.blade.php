<div class="row">
    <div class="col-md-6">
        <h3>{{__("Education Informations")}}</h3>
        <div class="form-scroll form-group-item">
            <div class="group-items">
                @if(!empty($row->educations))
                    @foreach($row->educations as $key => $education)
                        <div
                            class="card item"
                            data-index="{{$key}}">
                            <div class="card-body">
                                <h3 class="card-title">{{__("Education Informations")}} <a
                                        href="javascript:void(0);"
                                        class="delete-icon btn-remove-item"><i class="fa fa-trash-o"></i></a></h3>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group form-focus focused">
                                            <input
                                                type="text"
                                                name="educations[{{$key}}][institution]"
                                                value="{{$education["institution"]}}"
                                                class="form-control floating">
                                            <label class="focus-label">{{__("Institution")}}</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group form-focus focused">
                                            <input
                                                type="text"
                                                name="educations[{{$key}}][subject]"
                                                value="{{$education["subject"]}}"
                                                class="form-control floating">
                                            <label class="focus-label">{{__("Subject")}}</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group form-focus focused">
                                            <div class="cal-icon">
                                                <input
                                                    type="text"
                                                    name="educations[{{$key}}][start_date]"
                                                    value="{{$education["start_date"]}}"
                                                    class="form-control floating datetimepicker">
                                            </div>
                                            <label class="focus-label">{{__("Starting Date")}}</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group form-focus focused">
                                            <div class="cal-icon">
                                                <input
                                                    type="text"
                                                    name="educations[{{$key}}][complete_date]"
                                                    value="{{$education["complete_date"]}}"
                                                    class="form-control floating datetimepicker">
                                            </div>
                                            <label class="focus-label">{{__("Complete Date")}}</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group form-focus focused">
                                            <input
                                                type="text"
                                                name="educations[{{$key}}][degree]"
                                                value="{{$education["degree"]}}"
                                                class="form-control floating">
                                            <label class="focus-label">{{__("Degree")}}</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group form-focus focused">
                                            <input
                                                type="text"
                                                name="educations[{{$key}}][grade]"
                                                value="{{$education["grade"]}}"
                                                class="form-control floating">
                                            <label class="focus-label">{{__("Grade")}}</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
            <div class="add-more">
                <a
                    class="btn-add-item"
                    href="javascript:void(0);"><i class="fa fa-plus-circle"></i> {{__("Add More")}}</a>
            </div>
            <div class="form-item d-none">
                <div
                    class="card item"
                    data-index="__index__">
                    <div class="card-body">
                        <h3 class="card-title">{{__("Education Informations")}} <a
                                href="javascript:void(0);"
                                class="delete-icon btn-remove-item"><i class="fa fa-trash-o"></i></a></h3>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group form-focus">
                                    <input
                                        type="text"
                                        name="educations[__index__][institution]"
                                        value=""
                                        class="form-control floating">
                                    <label class="focus-label">{{__("Institution")}}</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group form-focus">
                                    <input
                                        type="text"
                                        name="educations[__index__][subject]"
                                        value=""
                                        class="form-control floating">
                                    <label class="focus-label">{{__("Subject")}}</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group form-focus focused">
                                    <div class="cal-icon">
                                        <input
                                            type="text"
                                            name="educations[__index__][start_date]"
                                            value=""
                                            class="form-control floating datetimepicker">
                                    </div>
                                    <label class="focus-label">{{__("Starting Date")}}</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group form-focus focused">
                                    <div class="cal-icon">
                                        <input
                                            type="text"
                                            name="educations[__index__][complete_date]"
                                            value=""
                                            class="form-control floating datetimepicker">
                                    </div>
                                    <label class="focus-label">{{__("Complete Date")}}</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group form-focus focused">
                                    <input
                                        type="text"
                                        name="educations[__index__][degree]"
                                        value=""
                                        class="form-control floating">
                                    <label class="focus-label">{{__("Degree")}}</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group form-focus focused">
                                    <input
                                        type="text"
                                        name="educations[__index__][grade]"
                                        value=""
                                        class="form-control floating">
                                    <label class="focus-label">{{__("Grade")}}</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="col-md-6">
        <h3>{{__("Experience Informations")}}</h3>
        <div class="form-scroll form-group-item">
            <div class="group-items">
                @if(!empty($row->experiences))
                    @foreach($row->experiences as $key => $experience)
                        <div
                            class="card item"
                            data-index="{{$key}}">
                            <div class="card-body">
                                <h3 class="card-title">{{__("Experience Informations")}} <a
                                        href="javascript:void(0);"
                                        class="delete-icon btn-remove-item"><i class="fa fa-trash-o"></i></a></h3>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group form-focus">
                                            <input
                                                type="text"
                                                class="form-control floating"
                                                name="experience[{{$key}}][company_name]"
                                                value="{{$experience["company_name"]}}"
                                            >
                                            <label class="focus-label">{{__("Company Name")}}</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group form-focus">
                                            <input
                                                type="text"
                                                class="form-control floating"
                                                name="experience[{{$key}}][location]"
                                                value="{{$experience["location"]}}"
                                            >
                                            <label class="focus-label">{{__("Location")}}</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group form-focus">
                                            <input
                                                type="text"
                                                class="form-control floating"
                                                name="experience[{{$key}}][job_position]"
                                                value="{{$experience["job_position"]}}"
                                            >
                                            <label class="focus-label">{{__("Job Position")}}</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group form-focus">
                                            <div class="cal-icon">
                                                <input
                                                    type="text"
                                                    class="form-control floating datetimepicker"
                                                    name="experience[{{$key}}][period_from]"
                                                    value="{{$experience["period_from"]}}"
                                                >
                                            </div>
                                            <label class="focus-label">{{__("Period From")}}</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group form-focus">
                                            <div class="cal-icon">
                                                <input
                                                    type="text"
                                                    class="form-control floating datetimepicker"
                                                    name="experience[{{$key}}][period_to]"
                                                    value="{{$experience["period_to"]}}"
                                                >
                                            </div>
                                            <label class="focus-label">{{__("Period To")}}</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
            <div class="add-more">
                <a
                    class="btn-add-item"
                    href="javascript:void(0);"><i class="fa fa-plus-circle"></i> {{__("Add More")}}</a>
            </div>
            <div class="form-item d-none">
                <div
                    class="card item"
                    data-index="__index__">
                    <div class="card-body">
                        <h3 class="card-title">{{__("Experience Informations")}} <a
                                href="javascript:void(0);"
                                class="delete-icon btn-remove-item"><i class="fa fa-trash-o"></i></a></h3>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group form-focus">
                                    <input
                                        type="text"
                                        class="form-control floating"
                                        name="experience[__index__][company_name]"
                                        value=""
                                    >
                                    <label class="focus-label">{{__("Company Name")}}</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group form-focus">
                                    <input
                                        type="text"
                                        class="form-control floating"
                                        name="experience[__index__][location]"
                                        value=""
                                    >
                                    <label class="focus-label">{{__("Location")}}</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group form-focus">
                                    <input
                                        type="text"
                                        class="form-control floating"
                                        name="experience[__index__][job_position]"
                                        value=""
                                    >
                                    <label class="focus-label">{{__("Job Position")}}</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group form-focus">
                                    <div class="cal-icon">
                                        <input
                                            type="text"
                                            class="form-control floating datetimepicker"
                                            name="experience[__index__][period_from]"
                                            value=""
                                        >
                                    </div>
                                    <label class="focus-label">{{__("Period From")}}</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group form-focus">
                                    <div class="cal-icon">
                                        <input
                                            type="text"
                                            class="form-control floating datetimepicker"
                                            name="experience[__index__][period_to]"
                                            value=""
                                        >
                                    </div>
                                    <label class="focus-label">{{__("Period To")}}</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
