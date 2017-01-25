<?php

namespace App;

use App\Subject;
use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
	protected $fillable = [
		'subject_id', 'student_id', 'semester', 'subject_point'
	];

	public function subject()
	{
		return $this->belongsTo(Subject::class);
	}
}
