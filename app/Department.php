<?php

namespace App;

use App\Group;
use App\Student;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Department extends Model
{
    protected $fillable = [
    	'department_name'
    ];

    public function groups()
    {
    	return $this->hasMany(Group::class);
    }

    public function subjects()
    { 
    	return $this->belongsToMany(Subject::class)->withPivot('semester')->where('semester', request()->semester);
    }
}
