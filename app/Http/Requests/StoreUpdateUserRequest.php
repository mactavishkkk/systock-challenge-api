<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreUpdateUserRequest extends FormRequest
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
        $rules = [
            'name' => [
                'required',
                'max:255'
            ],
            'cpf' => [
                'required',
                'min:11',
                'max:11',
                'unique:users'
            ],
            'email' => [
                'required',
                'max:100',
                'unique:users'
            ],
            'password' => [
                'required',
                'min:6',
                'max:100'
            ],
            'active' => [
                'nullable'
            ]
        ];

        if ($this->method() === 'PUT') {
            $rules['name'] = [
                'nullable',
            ];

            $rules['cpf'] = [
                'required',
                'min:11',
                'max:11',
                Rule::unique('users')->ignore($this->id),
            ];

            $rules['email'] = [
                'required',
                'max:255',
                Rule::unique('users')->ignore($this->id),
            ];

            $rules['password'] = [
                'nullable',
            ];

            $rules['active'] = [
                'nullable',
            ];
        }

        return $rules;
    }
}
