<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
            'name'=>'required|max:191',
            'email'=>'required|max:191|email',
            'subject'=>'required|max:191',
            'message'=>'required|max:1000'
        ];
    }

    public function messages(): array
    {
        return [
            'name.required'=>'Ad sahəsi boş buraxıla bilməz!',
            'name.max'=>'Ad sahəsinin uzunluğu max :max olar bilər!',
            'email.required'=>'Email sahəsi boş buraxıla bilməz!',
            'email.max'=>'Email sahəsinin uzunluğu max :max olar bilər!',
            'email.email'=>'Email formatı yanlışdır!',
            'subject.required'=>'Mövzu sahəsi boş buraxıla bilməz!',
            'subject.max'=>'Mövzu sahəsinin uzunluğu max :max olar bilər!',
            'message.required'=>'Mesaj sahəsi boş buraxıla bilməz!',
            'message.max'=>'Mövzu sahəsinin uzunluğu max :max olar bilər!',
            
        ];
    }
}
