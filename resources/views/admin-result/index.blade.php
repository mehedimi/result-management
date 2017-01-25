@extends('app')
@section('title', 'Select Department')
@section('content')
<div class="container">
    <div class="page-header">
      <h1>Select Department</h1>
    </div>
  <div class="row">
    <div class="col-md-6 col-md-offset-3">
        <div class="panel panel-default">
      <div class="panel-heading">Please Select Department</div>
          <div class="panel-body">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th>Department Name</th>
                  </tr>
                </thead>
                <tbody>
                @foreach($departments as $department)
                  <tr>
                    <td><a href="{{ route('result.select.dep', $department->id) }}">{{ $department->department_name }}</a></td>
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