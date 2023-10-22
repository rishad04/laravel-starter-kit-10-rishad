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

        $password      = [];
        if(Request::input('password')):
            $password  = ['required','string','min:8'];
        endif;
        return [
            'name'          => ['required','min:4'],
            'email'         => 'required|string|unique:users,email,'.Request::input('id'),
            'dob'           => ['required'],
            'gender'        => ['required','numeric'],
            'phone'         => 'required|regex:/^\+?[0-9]{1,4}-?[0-9]{7,14}$/|unique:users,phone,' . Request::input('id'),
            'role_id'       => ['required','numeric'],
            'password'      => $password,
            'nid_number'    => ['nullable', 'numeric', 'digits_between:4,20'],
            'status'        => ['required', 'boolean'],
            'nid'           => 'nullable|image|mimes:jpeg,png,jpg,webp|max:5098',
            'image'         => 'nullable|image|mimes:jpeg,png,jpg,webp|max:5098',
        ];




        // if (Request::input('id') != 1) {
        //     return [
        //         'name'          => ['required', 'string', 'max:100'],
        //         'email'          => 'required|string|unique:users,email,' . Request::input('id'),
        //         'password'      => ['required', 'string', 'min:6', 'max:32'],
        //         'phone'         => 'required|regex:/^\+?[0-9]{1,4}-?[0-9]{7,14}$/|unique:users,phone,' . Request::input('id'),
        //         'nid_number'    => ['nullable', 'numeric', 'digits_between:4,20'],
        //         'nid'           => 'nullable|image|mimes:jpeg,png,jpg,webp|max:5098',
        //         'image'         => 'nullable|image|mimes:jpeg,png,jpg,webp|max:5098',
        //         'address'       => ['required', 'string', 'max:191'],
        //         'status'        => ['required', 'boolean'],
        //         'role_id'       => 'required|exists:roles,id',
        //     ];
        // } else {
        //     return [
        //         'name'           => ['required', 'string', 'max:191'],
        //         'email'          => 'required|string|unique:users,email,' . Request::input('id'),
        //         'password'       => ['nullable'],
        //         'phone'         => 'required|regex:/^\+?[0-9]{1,4}-?[0-9]{7,14}$/|unique:users,phone,' . Request::input('id'),
        //         'image'          => 'nullable|image|mimes:jpeg,png,jpg,webp|max:5098',
        //         'address'        => ['required', 'string', 'max:191'],
        //         'nid_number'    => ['nullable', 'numeric', 'digits_between:4,20'],
        //         'nid'           => 'nullable|image|mimes:jpeg,png,jpg,webp|max:5098',
        //     ];
        // }
    }
}
