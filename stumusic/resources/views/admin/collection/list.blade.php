@extends('admin.master')

@section('title', 'list Collection')

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
<a href="{{route('admin.collection_create')}}" class="btn btn-primary">Create</a>
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Country</th>
      <th scope="col">Type</th>
      <th scope="col">Tool</th>
    </tr>
  </thead>
  <tbody>
  	@foreach ($collections as $key => $collection)
    <tr>
      <th scope="row">{{$key + 1}}</th>
      <td>{{$collection->name}}</td>
      <td>{{$collection->country}}</td>
      <td>{{$collection->type}}</td>
      <td>
      	<a href="{{route('admin.collection_edit',['id'=>$collection->id])}}" class="btn btn-warning">Edit</a> <br>
      	<form action="{{route('admin.collection_delete',['id'=>$collection->id])}}" method="post" accept-charset="utf-8">
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