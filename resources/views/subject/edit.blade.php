@extends('app')
@section('title', 'Edit Subject Info')
@section('content')
<div class="container">
    <div class="page-header">
      <h1>Edit Subject Info</h1>
    </div>
    <div class="panel panel-default">
        <div class="panel-body">
        @if(session()->has('info'))
            <div class="alert alert-success">{{ session('info') }}</div>
        @endif
            <form class="form-horizontal" role="form" method="POST" action="{{ route('subject.update', $subject->id) }}">
                {{ csrf_field() }}
                {{ method_field('PUT') }}

                <div class="form-group{{ $errors->has('subject_name') ? ' has-error' : '' }}">
                    <label for="subject_name" class="col-md-4 control-label">Subject Name </label>
                    <div class="col-md-6">
                        <input id="subject_name" value="{{ $subject->subject_name }}" type="text" class="form-control" name="subject_name">
                        @if ($errors->has('subject_name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('subject_name') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group{{ $errors->has('subject_code') ? ' has-error' : '' }}">
                    <label for="subject_code" class="col-md-4 control-label">Subject Code </label>
                    <div class="col-md-6">
                        <input id="subject_code" value="{{ $subject->subject_code }}" type="text" class="form-control" name="subject_code">
                        @if ($errors->has('subject_code'))
                            <span class="help-block">
                                <strong>{{ $errors->first('subject_code') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group{{ $errors->has('subject_credit') ? ' has-error' : '' }}">
                    <label for="subject_credit" class="col-md-4 control-label">Subject Credit </label>
                    <div class="col-md-6">
                        <input id="subject_credit" value="{{ $subject->subject_credit }}" type="text" class="form-control" name="subject_credit">
                        @if ($errors->has('subject_credit'))
                            <span class="help-block">
                                <strong>{{ $errors->first('subject_credit') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-8 col-md-offset-4">
                        <button type="submit" class="btn btn-info">
                            Update Subject
                        </button>
                    </div>
                </div>
            </form>
        </div>
</div>
@endsection