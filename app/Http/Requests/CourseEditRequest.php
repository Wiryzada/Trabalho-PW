<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CourseEditRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->check() && auth()->user()->hasPermissionTo('edit_course');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string',
            'acronym' => 'nullable|string',
            'type' => 'required|in:Ensino Fundamental,Ensino Médio,Ensino Técnico,Bacharelado,Licenciatura,Tecnólogo,Especialização,Mestrado,Doutorado',
            'institution_id' => 'required|exists:institutions,id'
        ];
    }
}
