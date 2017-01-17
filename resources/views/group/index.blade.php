@extends('app')
@section('title', 'View and create Department Group')
@section('content')
<div class="container">
    <div class="page-header">
      <h1>Add New Group For "{{ $department->department_name }}" Department</h1>
    </div>
    <div class="panel panel-default">
        <div class="panel-body">
        @if($department->groups->count())
        <table class="table table-bordered ">
            <thead>
                <tr>
                    <th>Group Name</th>
                    <th>Created At</th>
                    <th>Last Update</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
             @foreach($department->groups as $group)
                <tr>
                    <td>{{ $group->group_name }}</td>
                    <td>{{ $group->created_at->diffForHumans() }}</td>
                    <td>{{ $group->updated_at->diffForHumans() }}</td>
                    <td><a href="">Edit</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @endif

        @if(session()->has('info'))
            <div class="alert alert-success">{{ session('info') }}</div>
        @endif
            <form class="form-horizontal" role="form" method="POST" action="{{ route('group.index', $department->id) }}">
                {{ csrf_field() }}

                <div class="form-group{{ $errors->has('group_name') ? ' has-error' : '' }}">
                    <label for="group_name" class="col-md-4 control-label">Group Name </label>
                    <div class="col-md-6">
                        <input id="group_name" type="text" class="form-control" name="group_name">
                        @if ($errors->has('group_name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('group_name') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                
                <div class="form-group">
                    <div class="col-md-8 col-md-offset-4">
                        <button type="submit" class="btn btn-info">
                            Add New Group
                        </button>
                    </div>
                </div>
            </form>
        </div>
</div>
@endsection