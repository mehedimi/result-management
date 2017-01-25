@extends('app')
@section('title', 'Select Semester')
@section('content')
<div class="container">
    <div class="page-header">
      <h1>"{{ $department->department_name }}" Department And "{{ $semesters[$semester] }}" Semester Selected</h1>
    </div>
 
  <div class="panel panel-default">
  <div class="panel-heading">Please Select Student</div>
      <div class="panel-body">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th>Student Name</th>
                <th>Roll</th>
                <th>Reg</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
            @foreach($students as $s)
              <tr>
                <td>{{$s->name}}</td>
                <td>{{$s->roll_number}}</td>
                <td>{{$s->reg_number}}</td>
                <td>
                <a href="{{ route('result.add', [$s->id, $semester]) }}">Make Result</a> | 
                <a href="{{ route('result.show', [$s->id, $semester]) }}">View Result</a>
                </td>
              </tr>
            @endforeach
            </tbody>
          </table>
          {{$students->links('vendor.pagination.bootstrap-4')}}
      </div>
  </div>
</div>
@endsection