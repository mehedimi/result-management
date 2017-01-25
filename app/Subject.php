<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $fillable = [
    	'subject_name', 'subject_code', 'subject_credit'
    ];

    public function departments()
    {
    	return $this->belongToMany(Subject::class);
    }
    public function results()
    {
    	return $this->hasMany(Result::class)->where('semester', request()->semester);
    }
}
