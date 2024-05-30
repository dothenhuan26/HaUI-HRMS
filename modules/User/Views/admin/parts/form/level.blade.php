<div class="row">
    <div class="col-md-6">
        <h3>{{__("Education Informations")}}</h3>
        <div class="form-scroll">
            @if(!empty($row->educations))
                @foreach($row->educations as $key => $education)
{{--                    @php dd($row->educations) @endphp--}}
                    <div class="card">
                        <div class="card-body">
                            <h3 class="card-title">{{__("Education Informations")}} <a
                                    href="javascript:void(0);"
                                    class="delete-icon"><i class="fa fa-trash-o"></i></a></h3>
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
                                @if($loop->last)
                                    <div class="add-more">
                                        <a href="javascript:void(0);"><i class="fa fa-plus-circle"></i> {{__("Add More")}}</a>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            @else

                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title">{{__("Education Informations")}} <a
                                href="javascript:void(0);"
                                class="delete-icon"><i class="fa fa-trash-o"></i></a></h3>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group form-focus focused">
                                    <input
                                        type="text"
                                        value=""
                                        class="form-control floating">
                                    <label class="focus-label">{{__("Institution")}}</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group form-focus focused">
                                    <input
                                        type="text"
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
                                        value=""
                                        class="form-control floating">
                                    <label class="focus-label">{{__("Degree")}}</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group form-focus focused">
                                    <input
                                        type="text"
                                        value=""
                                        class="form-control floating">
                                    <label class="focus-label">{{__("Grade")}}</label>
                                </div>
                            </div>
                            <div class="add-more">
                                <a href="javascript:void(0);"><i class="fa fa-plus-circle"></i> Add More</a>
                            </div>
                        </div>
                    </div>
                </div>

            @endif

        </div>
    </div>

    <div class="col-md-6">
        <h3>{{__("Experience Informations")}}</h3>
        <div class="form-scroll">

            <div class="card">
                <div class="card-body">
                    <h3 class="card-title">Experience Informations <a
                            href="javascript:void(0);"
                            class="delete-icon"><i class="fa fa-trash-o"></i></a></h3>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group form-focus">
                                <input
                                    type="text"
                                    class="form-control floating"
                                    value="Digital Devlopment Inc">
                                <label class="focus-label">Company Name</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-focus">
                                <input
                                    type="text"
                                    class="form-control floating"
                                    value="United States">
                                <label class="focus-label">Location</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-focus">
                                <input
                                    type="text"
                                    class="form-control floating"
                                    value="Web Developer">
                                <label class="focus-label">Job Position</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-focus">
                                <div class="cal-icon">
                                    <input
                                        type="text"
                                        class="form-control floating datetimepicker"
                                        value="01/07/2007">
                                </div>
                                <label class="focus-label">Period From</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-focus">
                                <div class="cal-icon">
                                    <input
                                        type="text"
                                        class="form-control floating datetimepicker"
                                        value="08/06/2018">
                                </div>
                                <label class="focus-label">Period To</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
