<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ApplicationShortRequest extends FormRequest
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
            'phone_number'=>'required|max:20'
        ];
    }

    public function messages(): array
    {
        return [
            'phone_number.required'=>'Əlaqə nömrəsi sahəsi boş buraxıla bilməz!',
            'phone_number.max'=>'Əlaqə nömrəsi sahəsinin uzunluğu max :max olar bilər!',
        ];
    }
}
