@extends('app')
@section('title', 'Create Result')
@section('content')
<div class="container">
    <div class="page-header">
      <h1>Create "{{ $student->name }}'s" {{$semesters[$semester]}} Semester Result</h1>
    </div>
    <div class="panel panel-default">
        <div class="panel-body">
        @if(session()->has('info'))
            <div class="alert alert-success">{{ session('info') }}</div>
        @endif
        @if($student->department->subjects->count())
            <form class="form-horizontal" role="form" method="POST" action="{{ route('result.add', [$student->id, $semester]) }}">
                {{ csrf_field() }}
                @foreach($student->department->subjects as $key => $s)
                <div class="form-group{{$errors->has('points.' . $key) ? ' has-error' : ''}}">
                    <label for="subject_name_{{$key}}" class="col-md-4 control-label">{{$s->subject_name}} </label>
                    <div class="col-md-6">
                        <input id="subject_name_{{$key}}" type="text" placeholder="Enter {{$s->subject_name}} subject point here..." class="form-control" name="points[]">
                        @if($errors->has('points.' . $key))
                        <b class="help-block">{{ $errors->first('points.' . $key) }}</b>
                        @endif
                    </div>
                </div>
                @endforeach
                <div class="form-group">
                    <div class="col-md-8 col-md-offset-4">
                        <button type="submit" class="btn btn-info">
                            Create Result
                        </button>
                    </div>
                </div>
            </form>
            @else
            <h2>Subject not Found</h2>
            @endif
        </div>
</div>
@endsection