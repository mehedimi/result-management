<?php

namespace App;

use App\Group;
use Illuminate\Database\Eloquent\Model;

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
    	return $this->belongsToMany(Subject::class);
    }
}
