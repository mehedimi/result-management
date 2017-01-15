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

    public function edit()
    {
    	
    }
}
