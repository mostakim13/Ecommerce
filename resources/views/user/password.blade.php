@extends('layouts.frontend-master')

@section('content')
<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="home.html">Home</a></li>
				<li class='active'>Login</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content">
	<div class="container">
  <div class="sign-in-page">
    <div class="row">
  <div class="col-md-4">
  
    @include('user.inc.sidebar')

  </div>
  <div class="col-md-8">
    <div class="card">
    <h3 class="text-center"><span class="text-danger">Hi..!</span></h3><strong class="text-warning">{{ Auth::user()->name }}</strong> Update Your Password </h3>
      <div class="card-body">
      <form action="{{ route('password-store') }}" method="POST">
        @csrf
    <div class="form-group">
        <label for="exampleInputEmail">Old Password</label>
        <input type="password" name="old_password" placeholder="old password" class="form-control" id="exampleInputEmail" aria-describedby="emailHelp">
    @error('old_password')
      <span class="text-danger">{{$message}}</span>
    @enderror
    </div>
    <div class="form-group">
        <label for="exampleInputEmail">New Password</label>
        <input type="password" name="new_password" placeholder="new password" class="form-control" id="exampleInputEmail" aria-describedby="emailHelp">
    @error('new_password')
      <span class="text-danger">{{$message}}</span>
    @enderror
    </div>
    <div class="form-group">
        <label for="exampleInputEmail">Confirm Password</label>
        <input type="password" name="password_confirmation" placeholder="Re-type password" class="form-control" id="exampleInputEmail" aria-describedby="emailHelp">
    @error('password_confirmation')
      <span class="text-danger">{{$message}}</span>
    @enderror
    </div>

  
        <div>
            <button type="submit" class="btn btn-danger">Change Password</a>
        </div>
        </form>
    </div>
  </div>
</div>
    </div>
</div>
@endsection
