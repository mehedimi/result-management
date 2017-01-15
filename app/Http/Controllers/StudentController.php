<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudentEditRequest;
use App\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {	
    	$students = Student::orderBy('name', 'asc')->paginate(10);
    	return view('student.index', compact('students'));
    }
    public function edit(Student $student)
    {
    	return view('student.edit', compact('student'));
    }
    public function update(Request $request, Student $student)
    {
    	$this->validate($request, [
            'name' => 'required',
            'email' => 'email',
            'roll_number' => 'required|integer|unique:students,roll_number,' . $student->id,
            'reg_number' => 'required|integer|unique:students,reg_number,' . $student->id,
        ]);
        $student->update($request->all());
        return back()->withInfo('Student Information Successfully Updated');
    }
}
