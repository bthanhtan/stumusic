@extends('admin.master')

@section('title', 'form mylist')

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
<form  action="{{ isset($mylist->id) ? route('admin.mylist_update', ['id' => $mylist->id]) : route('admin.mylist_store')}}" method="post">
	@csrf
	@if (isset($mylist->id)) 
	@method('put')
	@endif
	<div class="form-group">
		<label>Name list</label>
		<input type="text" class="form-control" name="name" value="{{ old('name', $mylist->name ?? '') }}">
		<small id="emailHelp" class="form-text text-muted">Tên quốc gia của bài hát</small>
	</div>
	<button type="submit" class="btn btn-primary">{{ isset($mylist->id) ? 'Update' : 'Create' }}</button>
</form>
@stop