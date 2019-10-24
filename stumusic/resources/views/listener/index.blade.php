@extends('listener.master')

@section('title', 'index')

@section('main_content')
	<form>
		<select class="custom-select" id="select_1" onchange="tong()">
		    <option selected>Choose...</option>
		    <option value="1">One</option>
		    <option value="2">Two</option>
		    <option value="3">Three</option>
		  </select>
		<label>+</label>
		<select class="custom-select" id="select_2" onchange="tong()">
		    <option selected>Choose...</option>
		    <option value="1">One</option>
		    <option value="2">Two</option>
		    <option value="3">Three</option>
		  </select>
		<label>-</label>
		<select class="custom-select" id="select_3" onchange="tong()">
		    <option selected>Choose...</option>
		    <option value="1">One</option>
		    <option value="2">Two</option>
		    <option value="3">Three</option>
		  </select>
		<label>=</label>
		<p id="ketqua">0</p>
		<input type="button" class="button" value="tinh" onclick="return tong()">
	</form>
@stop





@section('footer')
	footer
@stop