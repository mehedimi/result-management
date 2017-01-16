@extends('app')
@section('title', 'Adding Subject to '. $department->department_name . ' Department')
@section('content')
<div class="container">
    <div class="page-header">
      <h1>{{'Adding Subject to "'. $department->department_name . '" Department'}}</h1>
    </div>
    <div class="panel panel-default">
    <div class="panel-heading">Please Select Semester</div>
        <div class="panel-body">
         @php
                    $semesters = [
                        1 => 'First', 2 => 'Second', 3 => 'Third', 4 => 'Fourth', 5 => 'Fifth', 6 => 'Sixth', 7 => 'Seventh', 8 => 'Eight'
                    ];
                @endphp
            <ul class="list-group">
              @foreach($semesters as $key => $value)
              <li class="list-group-item"><a href="{{ route('department.subject.add', [$department->id, $key]) }}">{{$value}} Semester</a></li>
              @endforeach
            </ul>
        </div>
</div>
@endsection