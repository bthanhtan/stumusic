@extends('admin.master')

@section('title', 'form genre')

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
<form  action="{{ isset($genre->id) ? route('admin.genre_update', ['id' => $genre->id]) : route('admin.genre_store')}}" method="post">
	@csrf
	@if (isset($genre->id)) 
	@method('put')
	@endif
	<div class="form-group">
		<label>Country</label>
		<input type="text" class="form-control" name="country" value="{{ old('country', $genre->country ?? '') }}">
		<small id="emailHelp" class="form-text text-muted">Tên quốc gia của bài hát</small>
	</div>
	<div class="form-group">
		<label>Type</label>
		<input type="text" class="form-control" name="type" value="{{ old('type', $genre->type ?? '') }}">
		<small id="emailHelp" class="form-text text-muted">thể loại nhạc</small>
	</div>
	<button type="submit" class="btn btn-primary">{{ isset($genre->id) ? 'Update' : 'Create' }}</button>
</form>
@stop