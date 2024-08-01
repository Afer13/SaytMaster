<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class SettingRequest extends FormRequest
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
            'logo'=>'max:2560|mimes:jpeg,jpg,png,gif',
            'logo_2'=>'max:2560|mimes:jpeg,jpg,png,gif',
            'favicon'=>'max:2560|mimes:jpeg,jpg,png,gif',
            'email'=>'required|email|max:191',
            'phone_number'=>'required|max:191'
        ];
    }
}
