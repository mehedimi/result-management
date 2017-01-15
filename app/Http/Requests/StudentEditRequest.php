<?php

namespace App\Http\Requests;

use App\Student;
use Illuminate\Foundation\Http\FormRequest;

class StudentEditRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(Student $student)
    {
        return [
            'name' => 'required',
            'email' => 'email',
            'roll_number' => 'required|integer|unique:students,roll_number,' . $student->id,
            'reg_number' => 'required|integer|unique:students,reg_number,' . $student->id,
        ];
    }
}
