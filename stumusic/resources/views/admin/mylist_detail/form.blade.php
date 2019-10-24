@extends('admin.master')

@section('title', 'form Collection')

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
<form  action="{{ isset($mylist_detail->id) ? route('admin.mylist_detail_update', ['id' => $mylist_detail->id]) : route('admin.mylist_detail_store')}}" method="post" enctype="multipart/form-data">
	@csrf
	@if (isset($mylist_detail->id)) 
	@method('put')
	@endif
	<div class="form-group">
		<label>mylist_id</label>
		<input type="text" class="form-control" name="mylist_id" value="{{ old('mylist_id', $mylist_detail->mylist_id ?? '') }}">
		<small id="emailHelp" class="form-text text-muted">Tên bài hát</small>
	</div>
	<div class="form-group">
		<label>song_id</label>
		<input type="text" class="form-control" name="song_id" value="{{ old('song_id', $mylist_detail->song_id ?? '') }}">
		<small id="emailHelp" class="form-text text-muted">Tên bài hát</small>
	</div>
	<button type="submit" class="btn btn-primary">{{ isset($mylist_detail->id) ? 'Update' : 'Create' }}</button>
</form>
@stop


