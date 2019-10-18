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
		<input type="text" class="form-control" name="name" value="{{ old('name', $song->name ?? '') }}">
		<small id="emailHelp" class="form-text text-muted">Tên bài hát</small>
	</div>
	<div class="form-group">
		<label>image</label>
		<input id="url_image_input" type="file" class="form-control" name="image"  onchange="check_image(this)">

		<img src="{{ isset($song->id) ? url($name_image[0]->src ) : ''}}" id="image_change" class="img-rounded" alt="hình ảnh bài hát" style="max-width: 150px;">
		<small id="note_image" id="emailHelp" class="form-text" style="display: none;"></small>
	</div>
	<div class="form-group" style="display: none;">
		<label>NameImage</label>
		<input id="nameimage" type="text" class="form-control" name="nameimage" value="{{ old('nameimage', $name_image[0]->src ?? '') }}">
		<input id="" type="text" class="form-control" name="nameimage_old" value="{{isset($song->id) ? $name_image[0]->src : ''}}">
	</div>
	<div class="form-group">
		<label>bài hát</label>
		<input id="url_song_input" type="file" class="form-control" name="audio" onchange="check_audio(this)">
		<small id="note_song" class="form-text">link bài hát</small>
	</div>
	<div class="form-group" style="display: none;">
		<label>NameAudio</label>
		<input id="nameaudio" type="text" class="form-control" name="nameaudio" value="{{ old('name', $name_audio[0]->src ?? '') }}">
		<input id="" type="text" class="form-control" name="nameaudio_old" value="{{isset($song->id) ? $name_audio[0]->src : ''}}">
	</div>
	<div class="form-group">
		<label>Artist_id</label>
		<select class="browser-default custom-select custom-select-lg mb-3" name="artist_id">
		 <option selected value="{{isset($song->id) ? $artist->id : '0'}}">{{isset($song->id) ? $artist->name : 'Chưa rõ tên'}}</option>
		@foreach($artists as $artist)
		  <option value="{{$artist->id}}" @if (old('artist_id') == $artist->id) {{ 'selected' }} @endif>{{$artist->name}}</option>
		@endforeach
		</select>
		<small id="emailHelp" class="form-text text-muted">Tên ca sỹ</small>
	</div>
	<div class="form-group">
		<label>Author_id</label>
		<select class="browser-default custom-select custom-select-lg mb-3" name="author_id">
		  <option selected value="{{isset($song->id) ? $author->id : '0'}}">{{isset($song->id) ? $author->name : 'Chưa rõ tên'}}</option>
		@foreach($authors as $author)
		  <option value="{{$author->id}}" {{old('author_id') == $author->id ? 'selected' : '' }}>{{$author->name}}</option>
		@endforeach
		</select>
		<small id="emailHelp" class="form-text text-muted">tên nhạc sỹ</small>
	</div>
	<div class="form-group">
		<label>Genre</label>
		<select class="browser-default custom-select custom-select-lg mb-3" name="genre_id">
		  <option value="{{isset($song->id) ? $genre->id : '0'}}">
		  	nhạc: {{isset($song->id) ? $genre->country : 'Chưa rõ tên'}}, thể loại: {{isset($song->id) ? $genre->type : 'Chưa rõ tên'}}
		  </option>
			@foreach($genres as $genre)
				<option value="{{$genre->id}}" {{old('genre_id') == $genre->id ? 'selected' : '' }} >nhạc: {{$genre->country}}, thể loại: {{$genre->type}}</option>
			@endforeach
		</select>
		<small id="emailHelp" class="form-text text-muted">tên thẻ loại nhạc</small>
	</div>
	<button type="submit" class="btn btn-primary">{{ isset($song->id) ? 'Update' : 'Create' }}</button>
</form>
@stop


