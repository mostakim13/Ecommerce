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
    <div class="row">
  <div class="col-sm-6">
    <div class="card" style="width: 18rem;">
     <img src="{{asset(Auth::user()->image)}}" class="card-img-top" style="border-radious: 50%;" height="100%;" width="100%;" alt="Card image cap">
  <ul class="list-group list-group-flush">
   <a href="{{ route('user.dashboard') }}" class="btn btn-primary btn-sm btn-block"> Home </a>
   
   <a href="{{ route('user-image') }}" class="btn btn-primary btn-sm btn-block"> Update Image </a>
   <a href="{{ route('update-password') }}" class="btn btn-primary btn-sm btn-block"> Update Password </a>

   <a href="{{ route('logout') }}" class="btn btn-danger btn-sm btn-block" onclick="event.preventDefault();
                		document.getElementById('logout-form').submit();"> Sign Out
					</a>
   
  </ul>
</div>
  </div>
  <div class="col-sm-6">
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
