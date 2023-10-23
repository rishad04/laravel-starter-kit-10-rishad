<?php

namespace App\Http\Requests\Settings;

use Illuminate\Foundation\Http\FormRequest;

class GeneralSettingsUpdateRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'brand_name'        => 'required|string',
            'brand_phone'       => 'required|regex:/^\+?[0-9]{1,4}-?[0-9]{7,14}$/',
            'brand_info_email'  => 'required|email',
            'copyright'         => 'required|string',

            'logo'              => 'nullable|image|mimes:png,jpg,jpeg,svg,webp|max:5098',
            'favicon'           => 'nullable|image|mimes:png,jpg,jpeg,svg,webp,ico|max:5000',
        ];
    }
}
