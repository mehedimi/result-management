<?php

namespace App;

use App\Department;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    public function department()
    {
    	return $this->belongsTo(Department::class);
    }
}
