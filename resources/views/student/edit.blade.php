@extends('app')
@section('title', 'Edit Student')
@section('content')
<div class="container">
    <div class="page-header">
      <h1>Edit Student</h1>
    </div>
    <div class="panel panel-default">
        <div class="panel-body">
        @if(session()->has('info'))
            <div class="alert alert-success">{{ session('info') }}</div>
        @endif
            <form class="form-horizontal" role="form" method="POST" action="{{ route('student.edit', $student->id) }}">
                {{ csrf_field() }}

                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                    <label for="name" class="col-md-4 control-label">Student name </label>
                    <div class="col-md-6">
                        <input id="name" type="text" value="{{ $student->name }}" class="form-control" name="name">
                        @if ($errors->has('name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <label for="father_name" class="col-md-4 control-label">Student Father Name </label>
                    <div class="col-md-6">
                        <input id="father_name" type="text" value="{{ $student->father_name }}" class="form-control" name="father_name">
                    </div>
                </div>
                <div class="form-group">
                    <label for="mother_name" class="col-md-4 control-label">Student Mother Name </label>
                    <div class="col-md-6">
                        <input id="mother_name" type="text" value="{{ $student->mother_name }}" class="form-control" name="mother_name">
                    </div>
                </div>
                <div class="form-group">
                    <label for="phone_number" class="col-md-4 control-label">Student Phone Number </label>
                    <div class="col-md-6">
                        <input id="phone_number" type="text" value="{{ $student->phone_number }}" class="form-control" name="phone_number">
                    </div>
                </div>
                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <label for="email" class="col-md-4 control-label">Student Email </label>
                    <div class="col-md-6">
                        <input id="email" type="text" value="{{ $student->email }}" class="form-control" name="email">
                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <label for="home_number" class="col-md-4 control-label">Student Home Number </label>
                    <div class="col-md-6">
                        <input id="home_number" type="text" value="{{ $student->home_number }}" class="form-control" name="home_number">
                    </div>
                </div>
                <div class="form-group">
                    <label for="gender" class="col-md-4 control-label">Gender </label>
                    <div class="col-md-6">
                        <select class="form-control" id="gender">
                            <option value="male">Male</option>
                            <option value="female"{{ $student->gender == 'female' ? ' selected' : '' }}>Female</option>
                        </select>
                    </div>
                </div>
                <div class="form-group{{ $errors->has('roll_number') ? ' has-error' : '' }}">
                    <label for="roll_number" class="col-md-4 control-label">Student Roll Number </label>
                    <div class="col-md-6">
                        <input id="roll_number" type="text" value="{{ $student->roll_number }}" class="form-control" name="roll_number">
                        @if ($errors->has('roll_number'))
                            <span class="help-block">
                                <strong>{{ $errors->first('roll_number') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group{{ $errors->has('reg_number') ? ' has-error' : '' }}">
                    <label for="reg_number" class="col-md-4 control-label">Student Reg Number </label>
                    <div class="col-md-6">
                        <input id="reg_number" type="text" value="{{ $student->reg_number }}" class="form-control" name="reg_number">
                        @if ($errors->has('reg_number'))
                            <span class="help-block">
                                <strong>{{ $errors->first('reg_number') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <label for="department_id" class="col-md-4 control-label">Department</label>
                    <div class="col-md-6">
                        <select class="form-control" name="department_id" id="department_id">
                            @foreach($departments as $d)
                            <option value="{{ $d->id }}"{{ $student->department_id == $d->id ? ' selected' : '' }}>{{ $d->department_name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                @php
                    $semesters = [
                        1 => 'First', 2 => 'Second', 3 => 'Third', 4 => 'Fourth', 5 => 'Fifth', 6 => 'Sixth', 7 => 'Seventh', 8 => 'Eight'
                    ];
                @endphp
                <div class="form-group">
                    <label for="semester" class="col-md-4 control-label">Semester </label>
                    <div class="col-md-6">
                        <select class="form-control" name="semester" id="semester">
                            @foreach($semesters as $key => $s)
                            <option value="{{ $key }}"{{ $key == $student->semester ? ' selected' : '' }}>{{ $s }} Semester</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="present_address" class="col-md-4 control-label">Present Address</label>
                    <div class="col-md-6">
                        <textarea class="form-control" id="present_address" rows="4">{{ $student->present_address }}</textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label for="permanent_address" class="col-md-4 control-label">Present Address</label>
                    <div class="col-md-6">
                        <textarea class="form-control" id="permanent_address" rows="4">{{ $student->permanent_address }}</textarea>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-8 col-md-offset-4">
                        <button type="submit" class="btn btn-info">
                            Update
                        </button>
                    </div>
                </div>
            </form>
        </div>
</div>
@endsection