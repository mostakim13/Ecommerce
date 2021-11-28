@extends('layouts.admin-master')

@section('admin-content')

<!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="index.html">ShopMama</a>
        <span class="breadcrumb-item active">Update Password</span>
      </nav>

    <div class="sl-pagebody">
        <div class="row row-sm">
            <div class="col-md-4">

                @include('admin.profile.inc.sidebar')

            </div>
            <div class="col-md-8 mt-1">
                <div class="card">
                  <div class="card-body">
                  <form action="{{ route('change-password-store') }}" method="POST">
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
    </div><!-- sl-pagebody -->      
</div><!-- sl-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->
@endsection
