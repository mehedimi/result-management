<?php

namespace App\Http\Controllers;

use App\Department;
use App\Group;
use App\Http\Requests\GroupCreateRequest;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    public function index(Department $department)
    {	
    	return view('group.index', compact('department')); 
    }

    public function store(Department $department, GroupCreateRequest $request)
    {	
    	$group = new Group;
    	
    	$group->group_name = $request->group_name;
    	$group->department()->associate($department);
    	$group->save();
    	return back()->withInfo('New Group Created for this Department'); 
    }
}
