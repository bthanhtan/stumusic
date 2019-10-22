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
<a href="{{route('admin.author_create')}}" class="btn btn-primary">Create</a>
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">image</th>
      <th scope="col">content</th>
      <th scope="col">Tool</th>
    </tr>
  </thead>
  <tbody>
  	@foreach ($authors as $key => $author)
    <tr>
      <th scope="row">{{$key + 1}}</th>
      <td>{{$author->name}}</td>
      <td><img src="{{url($author->images[0]->src)}}" alt="" width="150"></td>
      <td>{{$author->content}}</td>
      <td>
      	<a href="{{route('admin.author_edit',['id'=>$author->id])}}" class="btn btn-warning">Edit</a> <br>
      	<form action="{{route('admin.author_delete', ['id' => $author->id])}}" method="post" accept-charset="utf-8">
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