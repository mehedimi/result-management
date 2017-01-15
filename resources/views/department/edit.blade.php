@extends('app')
@section('title', 'Add New Department')
@section('content')
<div class="container">
    <div class="page-header">
      <h1>Add New Department</h1>
    </div>
    <div class="panel panel-default">
        <div class="panel-body">
        @if(session()->has('info'))
            <div class="alert alert-success">{{ session('info') }}</div>
        @endif
            <form class="form-horizontal" role="form" method="POST" action="{{ route('department.edit', $department->id) }}">
                {{ csrf_field() }}
                {{ method_field('PUT')}}

                <div class="form-group{{ $errors->has('department_name') ? ' has-error' : '' }}">
                    <label for="department_name" class="col-md-4 control-label">Department Name </label>
                    <div class="col-md-6">
                        <input id="department_name" value="{{ $department->department_name }}" type="text" class="form-control" name="department_name">
                        @if ($errors->has('department_name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('department_name') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                
                <div class="form-group">
                    <div class="col-md-8 col-md-offset-4">
                        <button type="submit" class="btn btn-info">
                            Update Department Info
                        </button>
                    </div>
                </div>
            </form>
        </div>
</div>
@endsection