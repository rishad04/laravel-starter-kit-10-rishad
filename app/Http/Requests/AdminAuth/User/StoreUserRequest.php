<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'           => ['required', 'string', 'max:191'],
            'email'          => ['required', 'string', 'unique:users'],
            'password'       => ['required', 'string'],
            // 'mobile'         => ['required', 'numeric', 'digits_between:11,14', 'unique:users'],
            'mobile'         => ['required', 'regex:/^\+?[0-9]{1,4}-?[0-9]{7,14}$/', 'unique:users,mobile'],
            'nid_number'     => ['nullable', 'numeric', 'digits_between:1,20'],
            'designation_id' => ['nullable', 'numeric'],
            'department_id'  => ['nullable', 'numeric'],
            'image'          => 'required|image|mimes:jpeg,png,jpg,webp|max:5098',
            'joining_date'   => ['nullable'],
            'salary'         => ['numeric'],
            'address'        => ['required', 'string', 'max:191'],
            'status'         => ['required', 'numeric'],
            'role_id'        => 'required|exists:roles,id',
        ];
    }
}
