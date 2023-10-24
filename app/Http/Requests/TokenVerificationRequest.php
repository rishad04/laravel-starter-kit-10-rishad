<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\JsonResponse;

class TokenVerificationRequest extends FormRequest
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
            'email' => 'required|email|exists:users,email',
            'token' => 'required|exists:users,token',
        ];
    }

    public function messages(): array
    {
        return [
            'token' => 'Invalid Token',
        ];
    }

    public function response(array $errors)
    {
        if ($this->expectsJson()) {
            return new JsonResponse($errors, JsonResponse::HTTP_UNPROCESSABLE_ENTITY);
        }

        return parent::response($errors);
    }
}
