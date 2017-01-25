<?php

namespace App\Http\Controllers;

use App\Result;
use App\Student;
use App\Traits\CountResult;
use Illuminate\Http\Request;

class ResultShowController extends Controller
{
	use CountResult;
	protected $semesters = [
            1 => 'First', 2 => 'Second', 3 => 'Third', 4 => 'Fourth', 5 => 'Fifth', 6 => 'Sixth', 7 => 'Seventh', 8 => 'Eight'
        ];
    public function index()
    {
    	return view('result.index')->withSemesters($this->semesters);
    }
    public function showResult(Request $request)
    {
    	$this->validate($request, [
    		'roll' => 'required|exists:students,roll_number'
    	]);
    	$student = Student::where('roll_number', $request->roll)->first();
    	$semester = $request->semester;
    	if (!in_array($semester, array_keys($this->semesters))) {
            abort(404);
        }
        $semesters = $this->semesters;
        $results = Result::where('semester', $semester)->where('student_id',$student->id)->get();
        $countingGrade = $this->countingResult($results);
    	return view('admin-result.show', compact('student', 'semesters', 'semester', 'results', 'countingGrade'));
    }
}
