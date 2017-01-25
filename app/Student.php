<?php

namespace App;

use App\Department;
use App\Student;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{
    use SoftDeletes;

    protected $fillable = [
    	'name', 'father_name', 'mother_name', 'phone_number', 'email',
    	'home_number', 'gender', 'roll_number', 'reg_number', 'department_id',
    	'shift', 'semester', 'present_address', 'permanent_address'
    ];
    public function department()
    {
    	return $this->belongsTo(Department::class);
    }
}
