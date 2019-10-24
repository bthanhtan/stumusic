@extends('admin.master')

@section('title', 'list mylist')

@section('sidebar')
    @parent

    <p>This is appended to the master sidebar.</p>
@stop

@section('content')
@if ($errors->any())
	@foreach ($errors->all() as $error)
		<div style="color: red;">{{$error}}</div>
	@endforeach
@endif
<a href="{{route('admin.mylist_create')}}" class="btn btn-primary">Create</a>
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
    </tr>
  </thead>
  <tbody>
  	@foreach ($mylists as $key => $mylist)
    <tr>
      <th scope="row">{{$key + 1}}</th>
      <td>{{$mylist->name}}</td>
      <td>
      	<a href="{{route('admin.mylist_edit',['id'=>$mylist->id])}}" class="btn btn-warning">Edit</a> <br>
      	<form action="{{route('admin.mylist_delete',['id'=>$mylist->id])}}" method="post" accept-charset="utf-8">
      		@csrf
      		@method('delete')
      		<button type="submit" class="btn btn-danger">Delete</button>
      	</form>

      </td>
    </tr>
    @endforeach
  </tbody>
</table>
@stop