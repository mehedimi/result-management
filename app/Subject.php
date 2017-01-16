<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $fillable = [
    	'subject_name', 'subject_code', 'subject_credit'
    ];
}
