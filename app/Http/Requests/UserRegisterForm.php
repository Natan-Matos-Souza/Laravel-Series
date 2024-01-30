<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRegisterForm extends FormRequest
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
            'email'             => ['required', 'email'],
            'password'          => ['required', 'confirmed'],
            'name'              => ['required']
        ];
    }

    public function messages(): array
    {
        return [
            'email.email'                   => "Digite um e-mail válido!",
            'email.required'                => "O campo 'email' é obrigatório!",
            'name.required'                 => "O campo 'nome' é obrigatório!",
            'password.required'             => "'O campo 'senha' é obrigatório!",
            'password.confirmed'            => "As senhas precisam ser idênticas"
        ];
    }
}
