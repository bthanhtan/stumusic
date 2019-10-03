@extends('layouts.app')

@section('content')
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">


<div class="container">

<div class="row">
    <aside class="col-sm-12">
<div class="card">
<article class="card-body">
<!-- <a href="" class="float-right btn btn-outline-primary">Login</a> -->
<h4 class="card-title mb-4 mt-1">Login</h4>
<form method="POST" action="{{ route('login') }}">
    @csrf
    <div class="form-group">
        <label>Your email</label>
        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

        @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div> <!-- form-group// -->
    <div class="form-group">
        <label>Your password</label>
         <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

        @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div> <!-- form-group// -->

    <div class="form-group">
        <button type="submit" class="btn btn-primary">
            {{ __('Login') }}
        </button>

        @if (Route::has('password.request'))
            <a class="btn btn-link" href="{{ route('password.request') }}">
                {{ __('Forgot Your Password?') }}
            </a>
        @endif
    </div> <!-- form-group// -->                                                           
</form>
</article>
</div> <!-- card.// -->


    </aside> <!-- col.// -->
</div> <!-- row.// -->

</div> 
<!--container end.//-->
@endsection
