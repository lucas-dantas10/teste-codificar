<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

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
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'Obrigatório preencher o campo de e-mail',
            'email.email' => 'E-mail inválido',
            'email.unique' => 'Este e-mail já esta sendo utilizado',
            'name.required' => 'Obrigatório preencher o campo de nome',
            'name.max' => 'Ultrapassado do limite de caracteres',
            'password.required' => 'Obrigatório preencher o campo de senha',
            'password.min' => 'O mínimo de caracteres para senha é 6',
        ];
    }
}
