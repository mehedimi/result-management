<?php

namespace App\Http\Controllers;

use App\Department;
use App\Http\Requests\DepartmentCreateRequest;
use App\Subject;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function index()
    {
    	$departments = Department::paginate(10);
    	return view('department.index', compact('departments'));
    }
    public function create()
    {
    	return view('department.create');
    }
    public function store(DepartmentCreateRequest $request)
    {	
    	Department::create($request->all());
    	return back()->withInfo('Department Created Successfully');
    }

    public function edit(Department $department)
    {
    	return view('department.edit', compact('department'));
    }

    public function update(Department $department, Request $request)
    {
    	$this->validate($request, [
    		'department_name' => 'required|max:255|unique:departments,department_name,' . $department->id
    	]);
    	$department->update($request->all());
    	return back()->withInfo('Department Info Successfully Updated');
    }

    public function addSubject(Department $department)
    {
        return view('department.add-subject', compact('department'));
    }
    public function addSubjectWithSemester(Department $department, $semester)
    {
        $semesters = [
            1 => 'First', 2 => 'Second', 3 => 'Third', 4 => 'Fourth', 5 => 'Fifth', 6 => 'Sixth', 7 => 'Seventh', 8 => 'Eight'
        ];
        if (!in_array($semester, array_keys($semesters))) {
            return abort(404);
        }
        $subjects = Subject::orderBy('subject_name', 'asc')->get();
        return view('department.adding-subject', compact('department', 'semesters', 'semester', 'subjects'));
    }

    public function assignSubject(Department $department, Request $request, $semester)
    {
        $department->subjects()->attach($request->subject_id, ['semester' => $semester]);
        return back();
    }

    public function removeSubject(Subject $subject, Department $department)
    {
        $department->subjects()->detach($subject);
        return back();
    }
   
}
