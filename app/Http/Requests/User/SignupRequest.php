<?php

namespace App\Http\Requests\User;

use App\Enums\Gender;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class SignupRequest extends FormRequest
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
        // dd($this->all());
        return [
            'name'              => 'required|string|min:3|max:50',
            'email'             => 'required|email|unique:users,email',
            'phone'             => 'required|regex:/^(?:\+?(\d{1,3}))?[-. (]*(\d{3})[-. )]*(\d{3})[-. ]*(\d{4})$/|unique:users,phone',
            'gender'            => 'required|' . Rule::in(array_column(Gender::cases(), 'value')),
            'dob'               => 'required|date|before:10 years ago|after:100 years ago',
            'password'          => 'required|string|min:6|max:32',
            'confirm_password'  => 'required|same:password',
        ];
    }

    public function attributes()
    {
        return [
            'dob'       => 'Date of Birth',
            'email'     => 'E-mail address',
            'phone'     => 'Phone number',
        ];
    }


    public function messages()
    {
        return [
            'dob.required' => ___("alert.Date of Birth is required."),
        ];
    }
}
