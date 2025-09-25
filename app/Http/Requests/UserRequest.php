<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users,email',
            'age' => 'required|numeric',
            'city' => 'required|string',
        ];
    }

    public function messages()
    {
        return [
            'age.numeric' => 'The age must be a number.',
            'city.required' => 'The city field is required.',
            'city.string' => 'The city must be a string.',
            'age.required' => 'The age field is required.',
            'email.unique' => 'The email has already been taken.',
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'Full Name',
            'email' => 'Email Address',
            'age' => 'Age',
            'city' => 'City',
        ];
    }
}
