<?php

namespace App\Http\Requests;

use App\Rules\TypeCheck;
use Illuminate\Foundation\Http\FormRequest;

class ApplicationRequest extends FormRequest
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
            'surname'=>'required|max:191',
            'email'=>'required|max:191|email',
            'phone_number'=>'required|max:191',
            'type_id'=>['required',new TypeCheck],
            'message'=>'required|max:1000'
        ];
    }

    public function messages(): array
    {
        return [
            'name.required'=>'Ad sahəsi boş buraxıla bilməz!',
            'name.max'=>'Ad sahəsinin uzunluğu max :max olar bilər!',
            'surname.required'=>'Soyad sahəsi boş buraxıla bilməz!',
            'surname.max'=>'Soyad sahəsinin uzunluğu max :max olar bilər!',
            'email.required'=>'Email sahəsi boş buraxıla bilməz!',
            'email.max'=>'Email sahəsinin uzunluğu max :max olar bilər!',
            'email.email'=>'Email formatı yanlışdır!',
            'phone_number.required'=>'Əlaqə nömrəsi sahəsi boş buraxıla bilməz!',
            'phone_number.max'=>'Əlaqə nömrəsi sahəsinin uzunluğu max :max olar bilər!',
            'type_id.required'=>'Tip sahəsi boş buraxıla bilməz!',
            'message.required'=>'Mesaj sahəsi boş buraxıla bilməz!',
            'message.max'=>'Mövzu sahəsinin uzunluğu max :max olar bilər!',
            
        ];
    }
}
