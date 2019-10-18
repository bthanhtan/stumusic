@extends('admin.master')

@section('title', 'form author')

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
<form  action="{{ isset($author->id) ? route('admin.author_update', ['id' => $author->id]) : route('admin.author_store')}}" method="post" enctype="multipart/form-data">
	@csrf
	@if (isset($author->id)) 
	@method('put')
	@endif
	<div class="form-group">
		<label>Name</label>
		<input type="text" class="form-control" name="name" value="{{ old('name', $author->name ?? '') }}">
		<small id="emailHelp" class="form-text text-muted">Tên của 1 author</small>
	</div>
	<div class="form-group">
		<label>image</label>
		<input id="url_image_input" type="file" class="form-control" name="image"  onchange="check_image(this)">
		
		<img src="{{isset($author->id) ? url($author->images[0]->src) : ''}}" id="image_change" class="img-rounded" alt="hình ảnh bài hát" style="max-width: 150px;">
		<small id="note_image" id="emailHelp" class="form-text" style="display: none;"></small>
	</div>
	<div class="form-group" style="display: none;">
		<label>NameImage</label>
		<input id="nameimage" type="text" class="form-control" name="nameimage" value="{{isset($author->id) ? $author->images[0]->src : ''}}">
		<input id="nameimage" type="text" class="form-control" name="nameimage_old" value="{{isset($author->id) ? $author->images[0]->src : ''}}">
	</div>
	<div class="form-group">
		<label>content</label>
		<input type="text" class="form-control" name="content" value="{{ old('content', $author->content ?? '') }}">
		<small id="emailHelp" class="form-text text-muted">thông tin về ca sỹ</small>
	</div>
	<button type="submit" class="btn btn-primary">{{ isset($author->id) ? 'Update' : 'Create' }}</button>
</form>
@stop