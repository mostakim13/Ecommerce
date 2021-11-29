@extends('layouts.admin-master')
@section('categories')
    active
@endsection
@section('admin-content')
     <!-- ########## START: MAIN PANEL ########## -->
     <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
          <a class="breadcrumb-item" href="index.html">SHopMama</a>
          <span class="breadcrumb-item active">Category Update</span>
        </nav>
  
        <div class="sl-pagebody">
            <div class="card pd-20 pd-sm-40">
              <h6 class="card-body-title">Update Category</h6>
              <form action="{{ route('update-category') }}" method="POST">
                @csrf
                <input type="hidden" name="id" value="{{ $category->id }}">
            <div class="row row-sm">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="form-control-label">Category Icon: <span class="tx-danger">*</span></label>
                            <input class="form-control" type="text" name="category_icon" value="{{ $category->category_icon }}" placeholder="Category icon">
                            @error('category_icon')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>  
  
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="form-control-label">Category Name English: <span class="tx-danger">*</span></label>
                            <input class="form-control" type="text" name="category_name_en" value="{{ $category->category_name_en }}" placeholder="Category name english">
                            @error('category_name_en')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>  
                  
                  <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-control-label">Category Name Bangla: <span class="tx-danger">*</span></label>
                        <input class="form-control" type="text" name="category_name_bn" value="{{ $category->category_name_bn }}" placeholder="Category name bangla">
                        @error('category_name_bn')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                  </div> 
              <div class="form-layout-footer mt-3">
                <button class="btn btn-info mg-r-5" type="submit" style="cursor: pointer;">Update Category</button>
              </div><!-- form-layout-footer -->
            </form>
            </div>
            </div><!-- row --> 


    </div>

@endsection