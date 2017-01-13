<?php

namespace App\Http\Controllers;

use App\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {	
    	$students = Student::orderBy('name', 'asc')->paginate(10);
    	return view('student.index', compact('students'));
    }
}
