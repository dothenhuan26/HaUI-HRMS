<?php

namespace Modules\Designation\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DesignationRequest extends FormRequest
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
            "name"             => "required|string|max:255",
            "description"      => "required",
            "requirements"     => "required",
            "responsibilities" => "required",
            "salary_from"      => "decimal:0,4",
            "salary_to"        => "decimal:0,4",
            'department_id'       => ['required', 'integer', function ($attribute, $value, $fail) {
                if ($value < 0) {
                    $fail(__("Department is not valid"));
                }
                if ($value == 0) {
                    $fail(__("Department is required"));
                }
            }],
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
