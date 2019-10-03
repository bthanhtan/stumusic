@extends('admin.master')

@section('title', 'form musician')

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
<form  action="{{ isset($musician->id) ? route('admin.musician_update', ['id' => $musician->id]) : route('admin.musician_store')}}" method="post">
	@csrf
	@if (isset($musician->id)) 
	@method('put')
	@endif
	<div class="form-group">
		<label>Name</label>
		<input type="text" class="form-control" name="name" value="{{ old('name', $musician->name ?? '') }}">
		<small id="emailHelp" class="form-text text-muted">Tên của 1 musician</small>
	</div>
	<div class="form-group">
		<label>image</label>
		<input type="text" class="form-control" name="image" value="{{ old('image', $musician->image ?? '') }}">
		<small id="emailHelp" class="form-text text-muted">hình ảnh ca sỹ</small>
	</div>
	<div class="form-group">
		<label>content</label>
		<input type="text" class="form-control" name="content" value="{{ old('content', $musician->content ?? '') }}">
		<small id="emailHelp" class="form-text text-muted">thông tin về ca sỹ</small>
	</div>
	<div class="form-group">
		<label>follow</label>
		<input type="text" class="form-control" name="follow" value="{{ old('follow', $musician->follow ?? '') }}">
		<small id="emailHelp" class="form-text text-muted">số lượt follow, cai này làm ajax khi làm xong user</small>
	</div>
	<div class="form-group">
		<label>song_id</label>
		<input type="text" class="form-control" name="song_id" value="{{ old('song_id', $musician->song_id ?? '') }}">
		<small id="emailHelp" class="form-text text-muted">danh sách các bài hát của ca sỹ</small>
	</div>
	<button type="submit" class="btn btn-primary">{{ isset($musician->id) ? 'Update' : 'Create' }}</button>
</form>
@stop