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
        // dd($this->all());
        return [
            'name'          => ['required', 'string', 'max:100'],
            'email'         => ['required', 'email', 'unique:users'],
            'password'      => ['required', 'string', 'min:6', 'max:32'],
            'phone'         => ['required', 'regex:/^\+?[0-9]{1,4}-?[0-9]{7,14}$/', 'unique:users,phone'],
            'nid_number'    => ['nullable', 'numeric', 'digits_between:4,20'],
            'nid'           => 'nullable|image|mimes:jpeg,png,jpg,webp|max:5098',
            'image'         => 'required|image|mimes:jpeg,png,jpg,webp|max:5098',
            'address'       => ['required', 'string', 'max:191'],
            'status'        => ['required', 'boolean'],
            'role_id'       => 'required|exists:roles,id',
        ];
    }
}
