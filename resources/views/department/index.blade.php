@extends('app')
@section('title', 'Departments')
@section('content')
<div class="container">
    <div class="page-header clearfix">
      <h1 style="display: inline-block">All Departments</h1>
      <a href="{{ route('department.create') }}" class="btn pull-right btn-info">Add New</a>
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
                    <td>{{$d->department_name}}</td>
                    <td>{{$d->created_at->diffForHumans()}}</td>
                    <td>{{$d->updated_at->diffForHumans()}}</td>
                    <td><a href="">Edit</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    {{$departments->links('vendor.pagination.bootstrap-4')}}
</div>
@endsection
