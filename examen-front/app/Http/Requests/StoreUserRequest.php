<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name'      => ['required', 'string', 'max:255'],
            'email'     => ['required', 'email', 'max:255'],
            'password'  => ['required', 'string', 'min:8', 'confirmed'],
            'telephone' => ['nullable', 'string', 'max:20'],
            'role_id'   => ['required', 'integer'],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'El nombre es obligatorio.',
            'name.string'   => 'El nombre no es válido.',
            'name.max'      => 'El nombre no debe superar los 255 caracteres.',

            'email.required' => 'El correo electrónico es obligatorio.',
            'email.email'    => 'El correo electrónico no tiene un formato válido.',
            'email.max'      => 'El correo electrónico no debe superar los 255 caracteres.',
            'email.unique'   => 'El correo electrónico ya está registrado.',

            'password.required'  => 'La contraseña es obligatoria.',
            'password.string'    => 'La contraseña no es válida.',
            'password.min'       => 'La contraseña debe tener al menos 8 caracteres.',
            'password.confirmed' => 'La confirmación de la contraseña no coincide.',

            'telephone.string' => 'El teléfono no es válido.',
            'telephone.max'    => 'El teléfono no debe superar los 20 caracteres.',

            'role_id.required' => 'Debe seleccionar un rol.',
            'role_id.integer'  => 'El rol seleccionado no es válido.',
        ];
    }
}

