@extends('admin.master')

@section('title', 'form singer')

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
<form  action="{{ isset($singer->id) ? route('admin.singer_update', ['id' => $singer->id]) : route('admin.singer_store')}}" method="post" enctype="multipart/form-data">
	@csrf
	@if (isset($singer->id)) 
	@method('put')
	@endif
	<div class="form-group">
		<label>Name</label>
		<input type="text" class="form-control" name="name" value="{{ old('name', $singer->name ?? '') }}">
		<small id="emailHelp" class="form-text text-muted">Tên của 1 singer</small>
	</div>
	<div class="form-group">
		<label>image</label>
		<input type="file" class="form-control" name="image">
		<small id="emailHelp" class="form-text text-muted">hình ảnh ca sỹ</small>
	</div>
	<div class="form-group">
		<label>content</label>
		<input type="text" class="form-control" name="content" value="{{ old('content', $singer->content ?? '') }}">
		<small id="emailHelp" class="form-text text-muted">thông tin về ca sỹ</small>
	</div>
	<div class="form-group">
		<label>follow</label>
		<input type="text" class="form-control" name="follow" value="{{ old('follow', $singer->follow ?? '') }}">
		<small id="emailHelp" class="form-text text-muted">số lượt follow, cai này làm ajax khi làm xong user</small>
	</div>
	<div class="form-group">
		<label>song_id</label>
		<input type="text" class="form-control" name="song_id" value="{{ old('song_id', $singer->song_id ?? '') }}">
		<small id="emailHelp" class="form-text text-muted">danh sách các bài hát của ca sỹ</small>
	</div>
	<button type="submit" class="btn btn-primary">{{ isset($singer->id) ? 'Update' : 'Create' }}</button>
</form>
@stop