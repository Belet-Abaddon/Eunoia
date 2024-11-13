<?php

namespace App\Http\Requests;

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
           'cation' => ['required', 'min:3', 'max:100'],
           'description' => ['required', 'min:3', 'max:200'],
           'image' => ['mimes:png,jpg,jpeg,JPG,JPEG'],
           'video' => ['mimes:mp4,MP4']
        ];
    }
}
