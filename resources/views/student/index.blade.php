@extends('app')
@section('title', 'Students')
@section('content')
<div class="container">
    <div class="page-header">
      <h1>All Students</h1>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Father's Name</th>
                    <th>Mother's Name</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Gender</th>
                    <th>Roll</th>
                    <th>Reg</th>
                    <th>Created At</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($students as $s)
                <tr>
                    <td>{{$s->name}}</td>
                    <td>{{$s->father_name}}</td>
                    <td>{{$s->mother_name}}</td>
                    <td>{{$s->phone_number}}</td>
                    <td>{{$s->email}}</td>
                    <td>{{ucfirst($s->gender)}}</td>
                    <td>{{$s->roll_number}}</td>
                    <td>{{$s->reg_number}}</td>
                    <td>{{$s->created_at->diffForHumans()}}</td>
                    <td><a href="{{ route('student.edit', $s->id) }}">Edit</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    {{$students->links('vendor.pagination.bootstrap-4')}}
</div>
@endsection
