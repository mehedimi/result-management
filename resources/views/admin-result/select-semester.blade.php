@extends('app')
@section('title', 'Select Semester')
@section('content')
<div class="container">
    <div class="page-header">
      <h1>"{{ $department->department_name }}" Department Selected</h1>
    </div>
  <div class="row">
    <div class="col-md-6 col-md-offset-3">
        <div class="panel panel-default">
      <div class="panel-heading">Please Select Semester</div>
          <div class="panel-body">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th>Semester</th>
                  </tr>
                </thead>
                <tbody>
                @foreach($semesters as $key => $value)
                  <tr>
                    <td><a href="{{ route('result.select.stu', [$department->id, $key]) }}">{{ $value }} Semester</a></td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
          </div>
      </div>
    </div>
  </div>
</div>
@endsection