<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ResultShowController extends Controller
{
    public function index()
    {
    	return view('result.index');
    }
}
