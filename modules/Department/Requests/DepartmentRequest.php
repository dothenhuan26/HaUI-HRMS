<?php

namespace Modules\Department\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DepartmentRequest extends FormRequest
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
            "name"       => "required|string|max:255",
            "location"   => "required",
            "phone"      => "required|size:10",
            "budget"     => "decimal:0,4",
            "email"      => "required|email|unique:departments,email",
            'manager_id' => ['required', 'integer', function ($attribute, $value, $fail) {
                if ($value < 0) {
                    $fail(__("Manager is not valid"));
                }
                if ($value == 0) {
                    $fail(__("Manager is required"));
                }
            }],
        ];

        if ($id) {
            $rules["email"] = 'required|email|unique:departments,email,' . $id;
        }

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
