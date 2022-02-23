@extends('layouts.admin-master')

@section('admin-content')

<!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="index.html">ShopMama</a>
        <span class="breadcrumb-item active">Profile</span>
      </nav>

    <div class="sl-pagebody">
        <div class="row row-sm">

            <div class="col-md-4">

                @include('admin.profile.inc.sidebar')

              </div>
              <div class="col-md-8">
                <div class="card">
                  <div class="card-body">
                  <form action="{{ route('store-image') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="old_image" value="{{ Auth::user()->image }}">
                    <div class="form-group">
                        <label for="exampleInputEmail">Image</label>
                        <input type="file" name="image" class="form-control" id="exampleInputEmail" aria-describedby="emailHelp">
                        @error('image')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div>
                        <button type="submit" class="btn btn-danger">Upload</a>
                    </div>
                    </form>
                </div>
              </div>
        </div><!-- row -->
    </div><!-- sl-pagebody -->
</div><!-- sl-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->
@endsection
