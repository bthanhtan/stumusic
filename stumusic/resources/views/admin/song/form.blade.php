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
<form  action="{{ isset($song->id) ? route('admin.song_update', ['id' => $song->id]) : route('admin.song_store')}}" method="post" enctype="multipart/form-data">
	@csrf
	@if (isset($song->id)) 
	@method('put')
	@endif
	
	<div class="form-group">
		<label>Name</label>
		<input type="text" class="form-control" name="name" value="{{ old('name', $collection->name ?? '') }}">
		<small id="emailHelp" class="form-text text-muted">Tên bài hát</small>
	</div>
	<div class="form-group">
		<label>image</label>
		<input type="file" class="form-control" name="image">
		<small id="emailHelp" class="form-text text-muted">hình ảnh bài hát</small>
	</div>
	<div class="form-group">
		<label>bài hát</label>
		<input type="file" class="form-control" name="audio" onchange="check(this)">
		<small id="emailHelp" class="form-text text-muted">link bài hát</small>
	</div>
	<div class="form-group">
		<label>hot</label>
		<input type="text" class="form-control" name="hot" value="{{ old('hot', $collection->hot ?? '') }}">
		<small id="emailHelp" class="form-text text-muted">có lên trang chủ hay ko</small>
	</div>
	<div class="form-group">
		<label>singer_id</label>
		<select class="browser-default custom-select custom-select-lg mb-3" name="singer_id">
		  <option selected value="0">Chưa rõ tên</option>
		@foreach($singers as $singger)
		  <option value="{{$singger->id}}">{{$singger->name}}</option>
		@endforeach
		</select>
		<small id="emailHelp" class="form-text text-muted">Tên ca sỹ</small>
	</div>
	<div class="form-group">
		<label>musician_id</label>
		<select class="browser-default custom-select custom-select-lg mb-3" name="musician_id">
		  <option selected value="0">Chưa rõ tên</option>
		@foreach($mucicians as $mucician)
		  <option value="{{$mucician->id}}">{{$mucician->name}}</option>
		@endforeach
		</select>
		<small id="emailHelp" class="form-text text-muted">tên nhạc sỹ</small>
	</div>
	<div class="form-group">
		<label>type</label>
		<select class="browser-default custom-select custom-select-lg mb-3" name="type">
		  <option selected value="0">Chưa rõ tên</option>
		@foreach($collections as $collections)
		  <option value="{{$collections->id}}">nhạc {{$collections->country}}, thể loại: {{$collections->type}}</option>
		@endforeach
		</select>
		<small id="emailHelp" class="form-text text-muted">tên thẻ loại nhạc</small>
	</div>
	<div class="form-group">
		<label>view</label>
		<input type="text" class="form-control" name="view" value="{{ old('view', $collection->view ?? '') }}">
		<small id="emailHelp" class="form-text text-muted">lượt view</small>
	</div>
	<div class="form-group">
		<label>heart</label>
		<input type="text" class="form-control" name="heart" value="{{ old('heart', $collection->heart ?? '') }}">
		<small id="emailHelp" class="form-text text-muted">bắn tim cho bài</small>
	</div>
	<button type="submit" class="btn btn-primary">{{ isset($collection->id) ? 'Update' : 'Create' }}</button>
</form>
@stop

@section('javascript')
<script src="{{ url('admin/song/abcd.js') }}"></script>
@stop
