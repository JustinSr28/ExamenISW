<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCourseRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'teacher_id'  => ['required', 'integer'],
            'code'        => ['required', 'string', 'max:255'],
            'course_name' => ['required', 'string', 'max:255'],
            'status'      => ['required', 'integer', 'in:1,2,3'],
            'capacity'    => ['required', 'integer', 'min:1'],
            'start_date'  => ['required', 'date'],
            'start_time'  => ['required', 'date_format:H:i'],
        ];
    }

    public function messages(): array
    {
        return [
            'teacher_id.required' => 'Debe seleccionar un profesor.',
            'teacher_id.integer'  => 'El profesor seleccionado no es válido.',

            'code.required'       => 'El código del curso es obligatorio.',
            'code.string'         => 'El código del curso no es válido.',
            'code.max'            => 'El código del curso no debe superar los 255 caracteres.',

            'course_name.required' => 'El nombre del curso es obligatorio.',
            'course_name.string'   => 'El nombre del curso no es válido.',
            'course_name.max'      => 'El nombre del curso no debe superar los 255 caracteres.',

            'status.required'     => 'Debe seleccionar un estado.',
            'status.integer'      => 'El estado seleccionado no es válido.',
            'status.in'           => 'El estado seleccionado no es válido.',

            'capacity.required'   => 'La capacidad es obligatoria.',
            'capacity.integer'    => 'La capacidad debe ser un número entero.',
            'capacity.min'        => 'La capacidad debe ser mayor o igual a 1.',

            'start_date.required' => 'La fecha de inicio es obligatoria.',
            'start_date.date'     => 'La fecha de inicio no tiene un formato válido.',

            'start_time.required'    => 'La hora de inicio es obligatoria.',
            'start_time.date_format' => 'La hora de inicio no tiene un formato válido.',
        ];
    }
}
