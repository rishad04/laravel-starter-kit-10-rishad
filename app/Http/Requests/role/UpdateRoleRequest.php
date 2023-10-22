<?php

namespace App\Http\Requests\role;

use Illuminate\Http\Request;
use Illuminate\Foundation\Http\FormRequest;

class UpdateRoleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules()
    {
        return [
            'name'   => 'required|string|max:60|unique:roles,name,'.Request::input('id'),
            'status' => ['required','numeric'],
        ];
    }
}
