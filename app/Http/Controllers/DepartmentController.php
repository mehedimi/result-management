<?php

namespace App\Http\Controllers;

use App\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function index()
    {
    	$departments = Department::paginate(10);
    	return view('department.index', compact('departments'));
    }
}
