<?php

namespace App\Http\Requests\Profile;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
        return [
            'name'          => 'required|string|min:4|max:50',
            'dob'           => 'required|date|before:today',
            'gender'        => 'required|integer',
            'image'         => 'nullable|image|mimes:jpeg,png,jpg,webp|max:5098',
            'address'       => 'required|string|min:5|max:100',
            'about'         => 'nullable|string|min:5|max:200',
        ];
    }
}
