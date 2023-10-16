<?php

namespace App\Http\Requests\User\Message;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;

class ReplyMessageRequest extends FormRequest
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
            'thread_id' => ['bail','required','numeric','exists:threads,id'],
            'receiver_id' => ['bail','required','numeric','exists:users,id'],
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
