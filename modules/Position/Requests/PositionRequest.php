<?php

namespace Modules\Position\Requests;

use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;

class PositionRequest extends FormRequest
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
            "title"            => "required|string|max:255",
            "location"         => "required",
            "description"      => "required",
            "vacancies"        => "required",
            "age"              => "required|integer|min:18",
            "job_type"         => "required",
            "experiences"      => "required",
            "requirements"     => "required",
            "responsibilities" => "required",
            "salary_from"      => "required|decimal:0,4",
            "salary_to"        => "required|decimal:0,4",
            "status"           => "required",
            "department_id"    => ['required', 'integer', function ($attribute, $value, $fail) {
                if ($value < 0) {
                    $fail(__("Department is not valid"));
                }
                if ($value == 0) {
                    $fail(__("Department is required"));
                }
            }],
            'start_date'       => 'required|date|date_format:m/d/Y',
            'expired_date'     => "required|date|date_format:m/d/Y|after_or_equal:start_date",
            "contact"          => "required",
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
