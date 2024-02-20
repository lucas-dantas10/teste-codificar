<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StorePostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'text' => 'required|unique:posts|max:280',
        ];
    }

    public function messages()
    {
        return [
            'text.required' => 'Obrigatório preencher o campo de texto',
            'text.unique' => 'Este post já esta sendo utilizado',
            'text.max' => 'Ultrapassado do limite de caracteres',
        ];
    }
}
