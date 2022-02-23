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
  <div class="col-md-8 mt-1">
    <div class="card">
    <h3 class="text-center"><span class="text-danger">Hi..!</span></h3><strong class="text-warning">{{ Auth::user()->name }}</strong> Update Your Profile </h3>
      <div class="card-body">
      <form action="{{ route('update.profile') }}" method="POST">
        @csrf
    <div class="form-group">
        <label for="exampleInputEmail">Name</label>
        <input type="text" name="name" class="form-control" id="exampleInputEmail" aria-describedby="emailHelp" value="{{ Auth::user()->name }}">
    @error('name')
      <span class="text-danger">{{$message}}</span>
    @enderror
    </div>

    <div class="form-group">
      <label for="exampleInputEmail">Email</label>
      <input type="text" name="email" class="form-control" id="exampleInputEmail" aria-describedby="emailHelp" value="{{ Auth::user()->email }}">
  @error('email')
      <span class="text-danger">{{$message}}</span>
    @enderror
  </div>

  <div class="form-group">
    <label for="exampleInputEmail">Phone</label>
    <input type="text" name="phone" class="form-control" id="exampleInputEmail" aria-describedby="emailHelp" value="{{ Auth::user()->phone }}">
    @error('phone')
      <span class="text-danger">{{$message}}</span>
    @enderror
</div>


        <div>
            <button type="submit" class="btn btn-danger">Submit</a>
        </div>
        </form>
    </div>
  </div>
</div>
    </div>
</div>
@endsection
