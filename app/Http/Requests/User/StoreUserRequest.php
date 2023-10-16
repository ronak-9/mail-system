<?php

namespace App\Http\Requests\User;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;

class StoreUserRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['bail','required','email', 'unique:users,email', 'max:255'],
            'password' => ['bail','required','string','min:5','max:255'],
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw ValidationException::withMessages([
            'error' => $validator->messages()->first(),
        ]);
    }
}
