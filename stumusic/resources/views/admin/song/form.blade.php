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
<form  action="{{ isset($collection->id) ? route('admin.collection_update', ['id' => $collection->id]) : route('admin.collection_store')}}" method="post">
	@csrf
	@if (isset($collection->id)) 
	@method('put')
	@endif
	
	<div class="form-group">
		<label>Name</label>
		<input type="text" class="form-control" name="name" value="{{ old('name', $collection->name ?? '') }}">
		<small id="emailHelp" class="form-text text-muted">Tên của 1 collection</small>
	</div>
	<div class="form-group">
		<label>image</label>
		<input type="text" class="form-control" name="image" value="{{ old('image', $collection->image ?? '') }}">
		<small id="emailHelp" class="form-text text-muted">Tên quốc gia của bài hát</small>
	</div>
	<div class="form-group">
		<label>hot</label>
		<input type="text" class="form-control" name="hot" value="{{ old('hot', $collection->hot ?? '') }}">
		<small id="emailHelp" class="form-text text-muted">thể loại nhạc</small>
	</div>
	<div class="form-group">
		<label>singer_id</label>
		<input type="text" class="form-control" name="singer_id" value="{{ old('singer_id', $collection->singer_id ?? '') }}">
		<small id="emailHelp" class="form-text text-muted">Tên quốc gia của bài hát</small>
	</div>
	<div class="form-group">
		<label>musician_id</label>
		<input type="text" class="form-control" name="musician_id" value="{{ old('musician_id', $collection->musician_id ?? '') }}">
		<small id="emailHelp" class="form-text text-muted">thể loại nhạc</small>
	</div>
	<div class="form-group">
		<label>type</label>
		<input type="text" class="form-control" name="type" value="{{ old('type', $collection->type ?? '') }}">
		<small id="emailHelp" class="form-text text-muted">Tên quốc gia của bài hát</small>
	</div>
	<div class="form-group">
		<label>Type</label>
		<input type="text" class="form-control" name="type" value="{{ old('type', $collection->type ?? '') }}">
		<small id="emailHelp" class="form-text text-muted">thể loại nhạc</small>
	</div>
	<div class="form-group">
		<label>view</label>
		<input type="text" class="form-control" name="view" value="{{ old('view', $collection->view ?? '') }}">
		<small id="emailHelp" class="form-text text-muted">Tên quốc gia của bài hát</small>
	</div>
	<div class="form-group">
		<label>heart</label>
		<input type="text" class="form-control" name="heart" value="{{ old('heart', $collection->heart ?? '') }}">
		<small id="emailHelp" class="form-text text-muted">thể loại nhạc</small>
	</div>
	<button type="submit" class="btn btn-primary">{{ isset($collection->id) ? 'Update' : 'Create' }}</button>
</form>
@stop