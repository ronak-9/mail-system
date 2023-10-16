<?php

namespace App\Http\Requests\User\Message;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;

class SendMessageRequest extends FormRequest
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
            'receiver_id' => ['bail','required','numeric','exists:users,id'],
            'subject' => ['bail','required','string','max:255'],
            'body' => ['bail','required']
        ];
    }

    
    protected function failedValidation(Validator $validator)
    {
        throw ValidationException::withMessages([
            'error' => $validator->messages()->first(),
        ]);
    }
}
