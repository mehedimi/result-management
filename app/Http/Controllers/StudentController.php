<?php

namespace App\Http\Controllers;

use App\Department;
use App\Http\Requests\StudentCreateRequest;
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
    public function create()
    {
    	$departments = Department::orderBy('department_name', 'asc')->get();
    	return view('student.create', compact('departments'));
    }
    public function store(StudentCreateRequest $request)
    {
    	Student::create($request->all());
    	return back()->withInfo('New Student Create Successfully');
    }
    public function edit(Student $student)
    {   
        $departments = Department::orderBy('department_name', 'asc')->get();
    	return view('student.edit', compact('student', 'departments'));
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

    public function search(Request $request)
    {
        $students = Student::where('name', 'like', '%' .$request->get('search'). '%')->orderBy('name', 'asc')->paginate(10);
        $students->appends(['search' => $request->search]);
        return view('student.index', compact('students'));
    }
}
