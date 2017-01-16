@extends('app')
@section('title', 'Subjects')
@section('content')
<div class="container">
    <div class="page-header clearfix">
      <h1 style="display: inline-block">All Subjects</h1>
      <a href="{{ route('subject.create') }}" class="btn pull-right btn-info">Add New</a>
    </div>
    @if($subjects->count())
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Code</th>
                    <th>Credit</th>
                    <th>Created At</th>
                    <th>Last Update</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($subjects as $s)
                <tr>
                    <td>{{$s->subject_name}}</td>
                    <td>{{$s->subject_code}}</td>
                    <td>{{$s->subject_credit}}</td>
                    <td>{{$s->created_at->diffForHumans()}}</td>
                    <td>{{$s->updated_at->diffForHumans()}}</td>
                    <td><a href="{{ route('subject.edit', $s->id) }}">Edit</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{$subjects->links('vendor.pagination.bootstrap-4')}}
    @else
    <h2>No Subject Found!</h2>
    @endif
</div>
@endsection
