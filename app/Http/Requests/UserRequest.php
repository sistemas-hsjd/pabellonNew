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
            'gl_rut' => 'required',
            'gl_nombre' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'gl_rut.required' => 'El campo rut es obligatorio.',
            'gl_nombre.required' => 'El campo nombre es obligatorio.',
        ];
    }
}
