@extends('app')
@section('title', 'Search your result')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Find your Result</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="get" action="{{ route('home.result') }}">

                        <div class="form-group{{ $errors->has('roll') ? ' has-error' : '' }}">
                            <label for="roll" class="col-md-4 control-label">Roll </label>

                            <div class="col-md-6">
                                <input id="roll" type="text" placeholder="Enter your board roll" class="form-control" name="roll" value="{{ old('roll') }}" required autofocus>

                                @if ($errors->has('roll'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('roll') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('semester') ? ' has-error' : '' }}">
                            <label for="semester" class="col-md-4 control-label">Semester</label>

                            <div class="col-md-6">
                                <select name="semester" id="semester" class="form-control">
                                    @foreach($semesters as $key => $semester)
                                    <option value="{{ $key }}">{{ $semester }} Semester</option>
                                    @endforeach
                                </select>
                        
                            </div>
                        </div>
                    
                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-info">
                                    Search
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
