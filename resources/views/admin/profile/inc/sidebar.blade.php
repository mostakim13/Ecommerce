<div class="card" style="width: 18rem;">
     <img src="{{asset(Auth::user()->image)}}" class="card-img-top" style="border-radious: 50%;" height="100%;" width="100%;" alt="Card image cap">
  <ul class="list-group list-group-flush">
   <a href="{{ route('admin.dashboard') }}" class="btn btn-primary btn-sm btn-block"> Home </a>

   <a href="{{ route('admin-image') }}" class="btn btn-primary btn-sm btn-block"> Update Image </a>
   <a href="{{ route('change-password') }}" class="btn btn-primary btn-sm btn-block"> Change Password </a>

   <a href="{{ route('logout') }}" class="btn btn-danger btn-sm btn-block" onclick="event.preventDefault();
                		document.getElementById('logout-form').submit();"> Sign Out
					</a>

  </ul>
</div>
