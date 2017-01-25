@extends('app')
@section('title', $student->name . "'s Result")
@section('content')
<div class="container">
    <div class="page-header">
      <h1>{{ $student->name }}'s {{$semesters[$semester]}} Semester Result</h1>
    </div>
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
      <div class="panel-heading">Result Details</div>
          <div class="panel-body">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th>Subject name</th>
                    <th>Subject Code</th>
                    <th>Subject Credit</th>
                    <th>Grade Point</th>
                    <th>Grade</th>
                  </tr>
                </thead>
                <tbody>
                
                @foreach($results as $result)
                  <tr>
                      <td>{{ $result->subject->subject_name}}</td>
                      <td>{{ $result->subject->subject_code}}</td>
                      <td>{{ $result->subject->subject_credit}}</td>
                      <td>{{ $result->subject_point }}</td>
                      <td>{{grade_count($result->subject_point)}}</td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                  <tr>
                    <td colspan="3">Total</td>
                    <td>{{$countingGrade}}</td>
                    <td>{{ grade_count($countingGrade) }}</td>
                  </tr>
                </tfoot>
              </table>
          </div>
      </div>
    </div>
  </div>
</div>
@endsection