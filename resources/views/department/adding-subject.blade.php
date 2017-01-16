@extends('app')
@section('title', 'Adding Subject to '. $department->department_name . ' Department')
@section('content')
<div class="container">
    <div class="page-header">
      <h1>{{'Adding Subject to "'. $department->department_name . '" Department on "' . $semesters[$semester] . ' Semester"'}}</h1>
    </div>
    <div class="panel panel-default">
    <div class="panel-heading">Adding Subject under This Department and Semester</div>
        <div class="panel-body">
            <form action="" method="post">
              <ul class="row list-group">
              @foreach($subjects as $s)
                <li class="list-group-item col-md-6"><label><input type="checkbox" name="subject_id" value="{{ $s->id }}"> {{ $s->subject_name }} ({{$s->subject_code}})</label></li>
                @endforeach
              </ul>
              <button class="btn btn-info">Add Subject</button>
            </form>
        </div>
</div>
@endsection