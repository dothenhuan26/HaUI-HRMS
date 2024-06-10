@extends('admin.layouts.app')

@section("content")

    @include("admin.messages")

    <div class="">
        <form
            method="POST"
            action="{{route("payroll.admin.store", ["id" => $row->id ?? ""])}}">

            @csrf

            <div class="card">
                <div class="card-body">
                    <h3 class="card-title">{{__("Salary Information")}}</h3>
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label class="">{{__("Bank Name")}} <span class="text-danger">*</span></label>
                                <input
                                    name="bank_name"
                                    value="{{old("bank_name", $row->bank_name ?? '')}}"
                                    class="form-control"
                                    placeholder="{{__("Bank Name")}}"
                                    required
                                    type="text">
                            </div>
                            @error("bank_name")
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>

                        <div class="col-sm-3">
                            <div class="form-group">
                                <label class="">{{__("Bank Number")}} <span class="text-danger">*</span></label>
                                <input
                                    name="bank_number"
                                    value="{{old("bank_number", $row->bank_number ?? '')}}"
                                    class="form-control"
                                    placeholder="{{__("Bank Number")}}"
                                    required
                                    type="text">
                            </div>
                            @error("bank_number")
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>

                    </div>

                    <hr>

                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="">{{__("Salary basis")}} <span class="text-danger">*</span></label>
                                <select
                                    name="salary_basis"
                                    class="select">
                                    <option
                                        {{old("salary_basis", $row->salary_basis ?? "")=="hourly"?"selected":false}}
                                        name="hourly">{{__("Hourly")
                                    }}</option>
                                    <option
                                        {{old("salary_basis", $row->salary_basis ?? "")=="daily"?"selected":false}}
                                        value="daily">{{__("Daily")}}</option>
                                    <option
                                        {{old("salary_basis", $row->salary_basis ?? "")=="weekly"?"selected":false}}
                                        value="weekly">{{__("Weekly")}}</option>
                                    <option
                                        {{old("salary_basis", $row->salary_basis ?? "")=="monthly"?"selected":false}}
                                        value="monthly">{{__("Monthly")}}</option>
                                </select>
                            </div>
                            @error("salary_basis")
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="">{{__("Salary amount")}} <small class="text-muted">{{__("(gross)")}}</small></label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">$</span>
                                    </div>
                                    <input
                                        name="salary_gross"
                                        type="text"
                                        class="form-control"
                                        placeholder="0.00"
                                        value="{{old("salary_gross", $row->salary_gross ?? '0.00')}}"
                                    >
                                </div>
                                @error("salary_gross")
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="">{{__("Payment type")}}</label>
                                <select
                                    name="payment_type"
                                    class="select">
                                    <option
                                        {{old("payment_type", $row->payment_type ?? "")=="bank"?"selected":false}}
                                        value="bank">{{__("Bank transfer")}}</option>
                                    <option
                                        {{old("payment_type", $row->payment_type ?? "")=="check"?"selected":false}}
                                        value="check">{{__("Check")}}</option>
                                    <option
                                        {{old("payment_type", $row->payment_type ?? "")=="cash"?"selected":false}}
                                        value="cash">{{__("Cash")}}</option>
                                </select>
                            </div>
                            @error("payment_type")
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label class="">{{__("Overtime")}}</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">$</span>
                                    </div>
                                    <input
                                        name="overtime"
                                        type="text"
                                        class="form-control"
                                        placeholder="0.00"
                                        value="{{old("overtime", $row->overtime ?? '0.00')}}"
                                    >
                                </div>
                                @error("overtime")
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="form-group">
                                <label class="">{{__("Unpaid Leave")}}</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">$</span>
                                    </div>
                                    <input
                                        name="unpaid_leave"
                                        type="text"
                                        class="form-control"
                                        placeholder="0.00"
                                        value="{{old("unpaid_leave", $row->unpaid_leave ?? '0.00')}}"
                                    >
                                </div>
                                @error("unpaid_leave")
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>


                        <div class="col-sm-3">
                            <div class="form-group">
                                <label class="">{{__("Deduction")}}</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">$</span>
                                    </div>
                                    <input
                                        name="deduction"
                                        type="text"
                                        class="form-control"
                                        placeholder="0.00"
                                        value="{{old("deduction", $row->deduction ?? '0.00')}}"
                                    >
                                </div>
                                @error("deduction")
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="form-group">
                                <label class="">{{__("Absent amount")}} <small class="text-muted">{{__("(days)")}}</small></label>
                                <div class="input-group">
                                    <input
                                        name="absent_amount"
                                        type="text"
                                        class="form-control"
                                        placeholder="{{__("Days")}}"
                                        value="{{old("absent_amount", $row->absent_amount ?? '0')}}"
                                    >
                                </div>
                                @error("absent_amount")
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label class="">{{__("Loan")}}</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">$</span>
                                    </div>
                                    <input
                                        name="loan"
                                        type="text"
                                        class="form-control"
                                        placeholder="0.00"
                                        value="{{old("loan", $row->loan ?? '0.00')}}"
                                    >
                                </div>
                                @error("loan")
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="form-group">
                                <label class="">{{__("Allowance")}}</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">$</span>
                                    </div>
                                    <input
                                        name="allowance"
                                        type="text"
                                        class="form-control"
                                        placeholder="0.00"
                                        value="{{old("allowance", $row->allowance ?? '0.00')}}"
                                    >
                                </div>
                                @error("allowance")
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="form-group">
                                <label class="">{{__("Insurance")}}</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">$</span>
                                    </div>
                                    <input
                                        name="insurance"
                                        type="text"
                                        class="form-control"
                                        placeholder="0.00"
                                        value="{{old("insurance", $row->insurance ?? '0.00')}}"
                                    >
                                </div>
                                @error("insurance")
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="form-group">
                                <label class="">{{__("Gratuity")}}</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">$</span>
                                    </div>
                                    <input
                                        name="gratuity"
                                        type="text"
                                        class="form-control"
                                        placeholder="0.00"
                                        value="{{old("gratuity", $row->gratuity ?? '0.00')}}"
                                    >
                                </div>
                                @error("gratuity")
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <hr>

                    <div class="row">
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label class="">{{__("Advance")}}</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">$</span>
                                    </div>
                                    <input
                                        name="advance"
                                        type="text"
                                        class="form-control"
                                        placeholder="0.00"
                                        value="{{old("advance", $row->advance ?? '0.00')}}"
                                    >
                                </div>
                                @error("advance")
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="form-group">
                                <label class="">{{__("Others")}}</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">$</span>
                                    </div>
                                    <input
                                        name="others"
                                        type="text"
                                        class="form-control"
                                        placeholder="0.00"
                                        value="{{old("others", $row->others ?? '0.00')}}"
                                    >
                                </div>
                                @error("others")
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="submit-section">
                <button class="btn btn-primary submit-btn submit-form-btn">{{__("Submit")}}</button>
            </div>
        </form>
    </div>

@endsection

