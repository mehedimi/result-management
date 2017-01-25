@extends('app')
@section('title', 'Adding Subject to '. $department->department_name . ' Department')
@section('content')
<div class="container">
    <div class="page-header">
      <h1>{{'Adding Subject to "'. $department->department_name . '" Department on "' . $semesters[$semester] . ' Semester"'}}</h1>
    </div>
    {{-- {{ dd($department->subjects()) }} --}}
    <div class="panel panel-default">
    <div class="panel-heading">Selected Subject This Department And Semester</div>
        <div class="panel-body">
              <ul class="row list-group">
             @foreach($department->subjects as $s)

              <li class="list-group-item col-md-6">{{$s->subject_name }}
                <form action="{{ route('subject.remove', [$s->id, $department->id]) }}" class="remove-subject-form pull-right" method="post">
                  <button class="btn btn-danger btn-xs">Remove Subject</button>
                  {{ csrf_field() }}
                  {{ method_field('DELETE') }}
                </form>
               </li>
            @endforeach
              </ul>
              
        </div>
</div>
<hr>
    <div class="panel panel-default">
    <div class="panel-heading">Adding Subject under This Department and Semester</div>
        <div class="panel-body">
            <form action="{{ route('assign.subject', [$department->id, $semester]) }}" method="post">
              <ul class="row list-group">
              @foreach($subjects as $s)
                <li class="list-group-item col-md-6"><label><input type="checkbox" name="subject_id[]" value="{{ $s->id }}"> {{ $s->subject_name }} ({{$s->subject_code}})</label></li>
              @endforeach
              </ul>
              {{ csrf_field() }}
              <button class="btn btn-info">Add Subject</button>
            </form>
        </div>
</div>
@endsection

@section('script')
<script>
  $('.remove-subject-form').submit(function(e){
    if (confirm("Are you sure remove this subject ?")) {

    }else{
      return e.preventDefault();
    }
    
  });
</script>
@endsection