<?php

namespace Modules\Payroll\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PayrollRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $id = $this->route()->id;

        $rules = [
            "bank_name"     => "required|string",
            "bank_number"   => "required|string",
            "salary_basis"  => "required|string",
            "payment_type"  => "required|string",
            "gratuity"      => "required|decimal:0,4",
            "salary_gross"  => "required|decimal:0,4",
            "overtime"      => "required|decimal:0,4",
            "deduction"     => "required|decimal:0,4",
            "unpaid_leave"  => "required|decimal:0,4",
            "advance"       => "required|decimal:0,4",
            "absent_amount" => "required|integer",
            "allowance"     => "required|decimal:0,4",
            "loan"          => "required|decimal:0,4",
            "insurance"     => "required|decimal:0,4",
            "others"        => "required|decimal:0,4",
        ];

        return $rules;
    }

    public function messages()
    {
        return [
        ];
    }

    public function attributes()
    {
        return [
        ];
    }

}
