@extends('app')
@section('title', 'Create Student')
@section('content')
<div class="container">
    <div class="page-header">
      <h1>Create Student</h1>
    </div>
    <div class="panel panel-default">
        <div class="panel-body">
        @if(session()->has('info'))
            <div class="alert alert-success">{{ session('info') }}</div>
        @endif
            <form class="form-horizontal" role="form" method="POST" action="{{ route('student.create') }}">
                {{ csrf_field() }}

                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                    <label for="name" class="col-md-4 control-label">Student name </label>
                    <div class="col-md-6">
                        <input id="name" type="text" value="{{ old('name') }}" class="form-control" name="name">
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
                        <input id="father_name" type="text" value="{{ old('father_name') }}" class="form-control" name="father_name">
                    </div>
                </div>
                <div class="form-group">
                    <label for="mother_name" class="col-md-4 control-label">Student Mother Name </label>
                    <div class="col-md-6">
                        <input id="mother_name" type="text" value="{{ old('mother_name') }}" class="form-control" name="mother_name">
                    </div>
                </div>
                <div class="form-group">
                    <label for="phone_number" class="col-md-4 control-label">Student Phone Number </label>
                    <div class="col-md-6">
                        <input id="phone_number" type="text" value="{{ old('phone_number') }}" class="form-control" name="phone_number">
                    </div>
                </div>
                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <label for="email" class="col-md-4 control-label">Student Email </label>
                    <div class="col-md-6">
                        <input id="email" type="text" value="{{ old('email') }}" class="form-control" name="email">
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
                        <input id="home_number" type="text" value="{{ old('home_number') }}" class="form-control" name="home_number">
                    </div>
                </div>
                <div class="form-group">
                    <label for="gender" class="col-md-4 control-label">Gender </label>
                    <div class="col-md-6">
                        <select class="form-control" name="gender" id="gender">
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </select>
                    </div>
                </div>
                <div class="form-group{{ $errors->has('roll_number') ? ' has-error' : '' }}">
                    <label for="roll_number" class="col-md-4 control-label">Student Roll Number </label>
                    <div class="col-md-6">
                        <input id="roll_number" type="text" value="{{ old('roll_number') }}" class="form-control" name="roll_number">
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
                        <input id="reg_number" type="text" value="{{ old('reg_number') }}" class="form-control" name="reg_number">
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
                                <option value="{{ $d->id }}">{{ $d->department_name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="semester" class="col-md-4 control-label">Semester </label>
                    <div class="col-md-6">
                        <select class="form-control" name="semester" id="semester">
                            <option value="1">First Semester</option>
                            <option value="2">Second Semester</option>
                            <option value="3">Third Semester</option>
                            <option value="4">Fourth Semester</option>
                            <option value="5">Fifth Semester</option>
                            <option value="6">Sixth Semester</option>
                            <option value="7">Seventh Semester</option>
                            <option value="8">Eight Semester</option>
                        </select>
                    </div>
                </div>
                 <div class="form-group">
                    <label for="shift" class="col-md-4 control-label">Shift </label>
                    <div class="col-md-6">
                        <select class="form-control" name="shift" id="shift">
                            <option value="1">First</option>
                            <option value="2">Second</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="present_address" class="col-md-4 control-label">Present Address</label>
                    <div class="col-md-6">
                        <textarea class="form-control" id="present_address" rows="4">{{ old('present_address') }}</textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label for="permanent_address" class="col-md-4 control-label">Present Address</label>
                    <div class="col-md-6">
                        <textarea class="form-control" id="permanent_address" rows="4">{{ old('permanent_address') }}</textarea>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-8 col-md-offset-4">
                        <button type="submit" class="btn btn-info">
                            Create Student
                        </button>
                    </div>
                </div>
            </form>
        </div>
</div>
@endsection