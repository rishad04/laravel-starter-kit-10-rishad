<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class UpdateUserRequest extends FormRequest
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

        if (Request::input('id') != 1) {
            return [
                'name'           => ['required', 'string', 'max:191'],
                'email'          => 'required|string|unique:users,email,' . Request::input('id'),
                'password'       => ['nullable'],
                // 'mobile'         => 'required|numeric|digits_between:11,14|unique:users,mobile,' . Request::input('id'),
                'mobile'         => 'required|regex:/^\+?[0-9]{1,4}-?[0-9]{7,14}$/|unique:users,mobile,' . Request::input('id'),
                'nid_number'     => ['nullable', 'numeric', 'digits_between:1,20'],

                'designation_id' => ['nullable', 'numeric'],
                'department_id'  => ['nullable', 'numeric'],
                'image'          => 'required|image|mimes:jpeg,png,jpg,webp|max:5098',
                'salary'         => ['numeric'],
                'joining_date'   => ['nullable'],
                'address'        => ['required', 'string', 'max:191'],
                'status'         => ['required', 'numeric'],
                'role_id'        => 'required|exists:roles,id',
            ];
        } else {
            return [
                'name'           => ['required', 'string', 'max:191'],
                'email'          => 'required|string|unique:users,email,' . Request::input('id'),
                'password'       => ['nullable'],
                'mobile'         => 'required|regex:/^\+?[0-9]{1,4}-?[0-9]{7,14}$/|unique:users,mobile,' . Request::input('id'),
                'image'          => 'required|image|mimes:jpeg,png,jpg,webp|max:5098',
                'address'        => ['required', 'string', 'max:191'],
            ];
        }
    }
}
