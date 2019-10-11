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
		<input id="url_image_input" type="file" class="form-control" name="image"  onchange="check_image(this)">

		<img src="" id="image_change" class="img-rounded" alt="hình ảnh bài hát" style="max-width: 150px;">
		<small id="note_image" id="emailHelp" class="form-text" style="display: none;"></small>
	</div>
	<div class="form-group" style="display: none;">
		<label>NameImage</label>
		<input id="nameimage" type="text" class="form-control" name="nameimage" value="">
	</div>
	<div class="form-group">
		<label>bài hát</label>
		<input id="url_song_input" type="file" class="form-control" name="audio" onchange="check_audio(this)">
		<small id="note_song" class="form-text">link bài hát</small>
	</div>
	<div class="form-group" style="display: none;">
		<label>NameAudio</label>
		<input id="nameaudio" type="text" class="form-control" name="nameaudio" value="">
	</div>
	<div class="form-group">
		<label>singer_id</label>
		<select class="browser-default custom-select custom-select-lg mb-3" name="singer_id">
		  <option selected value="0">Chưa rõ tên</option>
		@foreach($singers as $singger)
		  <option value="{{$singger->id}}" @if (old('singer_id') == $singger->id) {{ 'selected' }} @endif>{{$singger->name}}</option>
		@endforeach
		</select>
		<small id="emailHelp" class="form-text text-muted">Tên ca sỹ</small>
	</div>
	<div class="form-group">
		<label>musician_id</label>
		<select class="browser-default custom-select custom-select-lg mb-3" name="musician_id">
		  <option selected value="0">Chưa rõ tên</option>
		@foreach($mucicians as $mucician)
		  <option value="{{$mucician->id}}" @if (old('musician_id') == $mucician->id) {{ 'selected' }} @endif>{{$mucician->name}}</option>
		@endforeach
		</select>
		<small id="emailHelp" class="form-text text-muted">tên nhạc sỹ</small>
	</div>
	<div class="form-group">
		<label>type</label>
		<select class="browser-default custom-select custom-select-lg mb-3" name="type">
		  <option value="">Chưa rõ tên</option>
			@foreach($collections as $collection)
				<option value="{{$collection->id}}" @if (old('type') == $collection->id) {{ 'selected' }} @endif>nhạc {{$collection->country}}, thể loại: {{$collection->type}}</option>
			@endforeach
		</select>
		<small id="emailHelp" class="form-text text-muted">tên thẻ loại nhạc</small>
	</div>
	<button type="submit" class="btn btn-primary">{{ isset($collection->id) ? 'Update' : 'Create' }}</button>
</form>
@stop


