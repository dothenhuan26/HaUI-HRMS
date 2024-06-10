<?php

namespace Modules\User\Requests;

use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            "first_name"     => "required",
            "last_name"      => "required",
            "name"           => "",
            "birthday"       => "required",
            "gender"         => "required",
            "id_card"        => "required",
            "phone"          => "required|string|size:10",
            "email"          => "required|email|unique:users",
            //            "code" => "required|unique:users",
            "passport"       => "required",
            "passport_exp"   => "required",
            "religion"       => "",
            "address"        => "required",
            "country"        => "",
            "national"       => "required",
            "designation_id" => ['required', 'integer', function ($attribute, $value, $fail) {
                if ($value < 0) {
                    $fail(__("Designation is not valid"));
                }
                if ($value == 0) {
                    $fail(__("Designation is required"));
                }
            }],
            'is_active'      => "required",
            "educations"     => "",
            "experiences"    => "",
        ];

        if ($id) {
            $rules["email"] = 'required|email|unique:users,email,' . $id;
        } else {
            $rules['password'] = 'required|string|min:8';
            $rules['confirm_password'] = 'required|string|min:8|same:password';
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
