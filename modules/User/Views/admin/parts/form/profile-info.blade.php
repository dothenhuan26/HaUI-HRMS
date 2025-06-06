@push('css')
    <style>
        .filepond--drop-label {
            color: #4c4e53;

        }

        .filepond--label-action {
            text-decoration-color: #babdc0;
        }

        .filepond--panel-root {
            background-color: #edf0f4;
        }

        .filepond--root {
            width: 120px;
            margin: 0 auto;
            opacity: 0.1;
            cursor: pointer;

        }

        .avatar-wrapper {
            position: relative;
            display: inline-block;
        }

        .prev-avatar {
            border: 2px solid var(--primary-color);
            position: absolute;
            aspect-ratio: 1;
            object-fit: cover;
            border-radius: 999px;
            top: 0;
            right: 0;
            z-index: -999;
        }


    </style>
@endpush

<div class="row">
    <h3>{{__("Profile Information")}}</h3>

    <div class="col-md-12">
        <div class="form-group text-center">
            <p class="col-form-label fw-bold">{{__("Avatar")}}</p>
            <div class="avatar-wrapper">
                <input
                    type="file"
                    class="filepond"
                    name="avatar"
                    accept="image/png, image/jpeg, image/gif"/>

                <img
                    class="prev-avatar"
                    src="{{$row->avatar?->url ?? asset("assets/img/user.jpg")}}"
                    width="120"
                    height="120"
                    alt="">

            </div>


            <input
                type="hidden"
                class="filepond-hidden"
                value="{{$row->avatar?->url ?? ""}}">
        </div>
        @error("avatar")
        <span class="text-danger">{{$message}}</span>
        @enderror
    </div>

    <div class="col-sm-4">
        <div class="form-group">
            <label class="col-form-label">{{__("First Name")}} <span class="text-danger">*</span></label>
            <input
                name="first_name"
                value="{{old("first_name", $row->first_name ?? '')}}"
                class="form-control"
                placeholder="{{__("First name")}}"
                type="text">
            @error("first_name")
            <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
    </div>

    <div class="col-sm-4">
        <div class="form-group">
            <label class="col-form-label">{{__("Last Name")}}</label>
            <input
                name="last_name"
                value="{{old("first_name", $row->last_name ?? '')}}"
                class="form-control"
                placeholder="{{__("Last name")}}"
                type="text">
            @error("last_name")
            <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
    </div>

    <div class="col-sm-4">
        <div class="form-group">
            <label class="col-form-label">{{__("Full Name")}}</label>
            <input
                name="name"
                value="{{old("name", $row->name ?? '')}}"
                class="form-control"
                placeholder="{{__("Full name")}}"
                type="text">
            @error("name")
            <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
    </div>

    <div class="col-md-3">
        <div class="form-group">
            <label>{{__("Birth Date")}}</label>
            <div class="cal-icon">
                <input
                    name="birthday"
                    class="form-control datetimepicker"
                    placeholder="{{__("Birth date")}}"
                    type="text"
                    value="{{old("birthday", $row->birthday ?? \Carbon\Carbon::now()->format('d/m/Y'))}}">
            </div>
        </div>
        @error("birthday")
        <span class="text-danger">{{$message}}</span>
        @enderror
    </div>

    <div class="col-md-3">
        <div class="form-group">
            <label>{{__("Gender")}}</label>
            <select
                name="gender"
                class="select form-control">
                <option value="other">{{__("Other")}}</option>
                <option {{old("gender")=="male"?"selected":false}} value="male">{{__("Male")}}</option>
                <option {{old("gender")=="female"?"selected":false}} value="female">{{__("Female")}}</option>
            </select>
        </div>
        @error("gender")
        <span class="text-danger">{{$message}}</span>
        @enderror
    </div>

    <div class="col-sm-3">
        <div class="form-group">
            <label class="">{{__("Phone")}} </label>
            <input
                name="phone"
                value="{{old("phone", $row->phone ?? "")}}"
                class="form-control"
                placeholder="{{__("Phone")}}"
                type="text">
            @error("phone")
            <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
    </div>

    <div class="col-sm-3">
        <div class="form-group">
            <label class="">{{__("ID Card")}} </label>
            <input
                name="id_card"
                placeholder="{{__("ID card")}}"
                value="{{old("id_card", $row->id_card ?? "")}}"
                class="form-control"
                type="text">
            @error("id_card")
            <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
    </div>

    <div class="col-sm-6">
        <div class="form-group">
            <label class="col-form-label">{{__("Email")}} <span class="text-danger">*</span></label>
            <input
                name="email"
                placeholder="{{__("Email")}}"
                value="{{old("email", $row->email ?? '')}}"
                class="form-control"
                type="email">
            @error("email")
            <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
    </div>

    <div class="col-sm-6">
        <div class="form-group">
            <label class="col-form-label">{{__("Employee ID")}} <span class="text-danger">*</span></label>
            <input
                name="code"
                placeholder="{{__("Employee id")}}"
                type="text"
                value="{{old("code", $row->code ?? "")}}"
                readonly
                class="form-control floating">
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group">
            <label>{{__("Passport No")}}</label>
            <input
                name="passport"
                placeholder="{{__("Passport no")}}"
                value="{{old("passport", $row->passport ?? "")}}"
                type="text"
                class="form-control">
            @error("passport")
            <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group">
            <label>{{__("Passport Expiry Date")}}</label>
            <div class="cal-icon">
                <input
                    name="passport_exp"
                    placeholder="{{__("Passport expiry date")}}"
                    value="{{old("passort_exp", $row->passport_exp ?? \Carbon\Carbon::now()->format('d/m/Y'))}}"
                    class="form-control datetimepicker"
                    type="text">
            </div>
            @error("passport_exp")
            <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group">
            <label>{{__("Religion")}}</label>
            <input
                name="religion"
                value="{{old("religion", $row->religion ?? "Không")}}"
                class="form-control"
                placeholder="{{__("Religion")}}"
                type="text">
            @error("religion")
            <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
    </div>
</div>

@push("js")

    <script type="module">

        const pond = document.querySelector('.filepond--root');

        // listen for events
        pond.addEventListener('FilePond:addfile', (e) => {

            pond.style.opacity = '1';

        });

        pond.addEventListener('FilePond:removefile', (e) => {

            pond.style.opacity = '0.1';

        });

    </script>

@endpush
