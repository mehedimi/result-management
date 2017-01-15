@extends('app')
@section('title', 'Departments')
@section('content')
<div class="container">
    <div class="page-header">
      <h1>All Departments</h1>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Created At</th>
                    <th>Last Update</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($departments as $d)
                <tr>
                    <td>{{$s->department_name}}</td>
                    <td>{{$s->created_at->diffForHumans()}}</td>
                    <td>{{$s->updated_at->diffForHumans()}}</td>
                    <td><a href="">Edit</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    {{$departments->links('vendor.pagination.bootstrap-4')}}
</div>
@endsection
