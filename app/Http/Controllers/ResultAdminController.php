<?php

namespace App\Http\Controllers;

use App\Department;
use App\Http\Requests\ResultStoreRequest;
use App\Result;
use App\Student;
use App\Traits\CountResult;
use Illuminate\Http\Request;

class ResultAdminController extends Controller
{
    use CountResult;

	protected $semesters = [
            1 => 'First', 2 => 'Second', 3 => 'Third', 4 => 'Fourth', 5 => 'Fifth', 6 => 'Sixth', 7 => 'Seventh', 8 => 'Eight'
        ];
    
    public function index()
    {
    	$departments = Department::all();
    	return view('admin-result.index', compact('departments'));
    }
    public function selectSemester(Department $department)
    {
    	$semesters = $this->semesters;
    	return view('admin-result.select-semester', compact('department', 'semesters'));
    }
    public function selectStudent(Department $department, $semester)
    {
    	if (!in_array($semester, array_keys($this->semesters))) {
    		abort(404);
    	}
    	$semesters = $this->semesters;
    	$students = Student::where('department_id', $department->id)->where('semester', $semester)->paginate(15);
    	return view('admin-result.select-student', compact('department', 'semester', 'semesters', 'students'));
    }
    public function addResult(Student $student, $semester)
    {
        if (!in_array($semester, array_keys($this->semesters))) {
            abort(404);
        }
        $semesters = $this->semesters;
        return view('admin-result.create', compact('student', 'semester', 'semesters'));
    }
    public function storeResult(ResultStoreRequest $request, Student $student, $semester)
    {
        
        foreach($student->department->subjects as $key => $subject){
            Result::create([
                'subject_id' => $subject->id,
                'student_id' => $student->id,
                'semester' => $semester,
                'subject_point' => $request->input('points.' . $key)
            ]);
        }
        return back()->withInfo('Result Successfully Inserted');
    }
    public function showResult(Student $student, $semester)
    {
        if (!in_array($semester, array_keys($this->semesters))) {
            abort(404);
        }
        $semesters = $this->semesters;
        $results = Result::where('semester', $semester)->where('student_id',$student->id)->get();
        $countingGrade = $this->countingResult($results);
        return view('admin-result.show', compact('student', 'semester', 'semesters', 'results', 'countingGrade'));
    }
}
