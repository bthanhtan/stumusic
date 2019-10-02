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
		<label>Country</label>
		<input type="text" class="form-control" name="country" value="{{ old('country', $collection->country ?? '') }}">
		<small id="emailHelp" class="form-text text-muted">Tên quốc gia của bài hát</small>
	</div>
	<div class="form-group">
		<label>Type</label>
		<input type="text" class="form-control" name="type" value="{{ old('type', $collection->type ?? '') }}">
		<small id="emailHelp" class="form-text text-muted">thể loại nhạc</small>
	</div>
	<button type="submit" class="btn btn-primary">{{ isset($collection->id) ? 'Update' : 'Create' }}</button>
</form>
@stop