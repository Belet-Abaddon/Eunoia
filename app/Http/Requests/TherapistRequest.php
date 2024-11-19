<?php

namespace App\Http\Requests;
use app\Models\User;
use Illuminate\Validation\Rules;
use Illuminate\Foundation\Http\FormRequest;

class TherapistRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'age' => ['required', 'integer'],
            'gender' => ['required', 'string', 'max:10'],
            'country' => ['required', 'string', 'max:100'],
            'degree' => ['required', 'string'],
            'experience' => ['required', 'integer'],
            'specialists' => ['required', 'string'],
            'university' => ['required', 'string'],
        ];
    }
}
