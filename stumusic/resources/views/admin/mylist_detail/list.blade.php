@extends('admin.master')

@section('title', 'list mylist_detail')

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
<a href="{{route('admin.mylist_detail_create')}}" class="btn btn-primary">Create</a>
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">mylist_id</th>
      <th scope="col">song_id</th>
    </tr>
  </thead>
  <tbody>
  	@foreach ($mylist_details as $key => $mylist_detail)
    <tr>
      <th scope="row">{{$key + 1}}</th>
      <td>{{$mylist_detail->mylist_id}}</td>
      <td>{{$mylist_detail->song_id}}</td>
      <td>
      	<a href="{{route('admin.mylist_detail_edit',['id'=>$mylist_detail->id])}}" class="btn btn-warning">Edit</a> <br>
      	<form action="{{route('admin.mylist_detail_delete',['id'=>$mylist_detail->id])}}" method="post" accept-charset="utf-8">
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