<?php

namespace App\Http\Requests\Admin;

use App\Rules\Slug;
use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
            'title' => 'required|max:191',
            'slug' => ['required', new Slug, 'max:191'],
            'content_short' => 'required|max:191',
            'content' => 'required',
            'image' => 'max:2560|mimes:jpeg,jpg,png,gif'
        ];
    }
}
