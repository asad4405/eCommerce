<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfilePhotoRequest extends FormRequest
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
            'profile_photo' => 'required|file|mimes:png,jpg,jpeg',
        ];
    }
    public function messages(): array
    {
        return [
            'profile_photo|file|size' => 'Must be 1 mb',
        ];
    }
}
