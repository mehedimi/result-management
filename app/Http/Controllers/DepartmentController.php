<?php

namespace App\Http\Controllers;

use App\Department;
use App\Http\Requests\DepartmentCreateRequest;
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
}
