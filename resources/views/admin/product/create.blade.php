@extends('layouts.admin-master')
@section('products')
    active show-sub
@endsection
@section('add-product')
    active
@endsection
@section('admin-content')
     <!-- ########## START: MAIN PANEL ########## -->
     <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
          <a class="breadcrumb-item" href="index.html">SHopMama</a>
          <span class="breadcrumb-item active">Add Product</span>
        </nav>
  
        <div class="sl-pagebody">
            <div class="card pd-20 pd-sm-40">
              <h6 class="card-body-title">Add Product</h6>
              <form action="{{ route('update-category') }}" method="POST" enctype="multipart/form-data">
                @csrf
                {{-- <input type="hidden" name="id" value="{{ $category->id }}"> --}}
            <div class="row row-sm">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="form-control-label">Select Brand: <span class="tx-danger">*</span></label>
                            <select class="form-control select2-show-search" data-placeholder="Select one"
                            name="brand_id">
                                <option label="Choose one"></option>
                                @foreach ($brands as $brand)
                                <option value="{{ $brand->id }}">{{ ucwords($brand->brand_name_en) }}</option>
                                @endforeach
                              </select>
                            @error('brand_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="form-control-label">Select Category: <span class="tx-danger">*</span></label>
                            <select class="form-control select2-show-search" data-placeholder="Select one"
                            name="category_id">
                                <option label="Choose one"></option>
                                @foreach ($categories as $cat)
                                <option value="{{ $cat->id }}">{{ ucwords($cat->category_name_en) }}</option>
                                @endforeach
                              </select>
                            @error('category_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div> 
  
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="form-control-label">Select Sub-Category: <span class="tx-danger">*</span></label>
                            <select class="form-control select2-show-search" data-placeholder="Select one"
                            name="category_id">
                                <option label="Choose one"></option>
                                {{-- @foreach ($categories as $cat)
                                <option value="{{ $cat->id }}">{{ ucwords($cat->category_name_en) }}</option>
                                @endforeach --}}
                              </select>
                            @error('category_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>  
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="form-control-label">Select Sub-SubCategory: <span class="tx-danger">*</span></label>
                            <select class="form-control select2-show-search" data-placeholder="Select one"
                            name="category_id">
                                <option label="Choose one"></option>
                                {{-- @foreach ($categories as $cat)
                                <option value="{{ $cat->id }}">{{ ucwords($cat->category_name_en) }}</option>
                                @endforeach --}}
                              </select>
                            @error('category_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>  
                     
                  
                  <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-control-label">Product Name English: <span class="tx-danger">*</span></label>
                        <input class="form-control" type="text" name="product_name_en" value="{{ old('product_name_en') }}" placeholder="Product name english">
                        @error('product_name_en')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                  </div>
                  
                  <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-control-label">Product Name Bangla: <span class="tx-danger">*</span></label>
                        <input class="form-control" type="text" name="product_name_bn" value="{{ old('product_name_bn') }}" placeholder="Product name bangla">
                        @error('product_name_bn')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                  </div>

                  <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-control-label">Product Code: <span class="tx-danger">*</span></label>
                        <input class="form-control" type="text" name="product_code" value="{{ old('product_code') }}" placeholder="Product code">
                        @error('product_code')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                  </div>
                  
                  <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-control-label">Product Quantity: <span class="tx-danger">*</span></label>
                        <input class="form-control" type="text" name="product_quantity" value="{{ old('product_quantity') }}" placeholder="Product quantity">
                        @error('product_quantity')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                  </div> 

                  <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-control-label">Product Tags English: <span class="tx-danger">*</span></label>
                        <input class="form-control" type="text" name="product_tags_en" value="{{ old('product_tags_en') }}" placeholder="Product Tags english">
                        @error('product_tags_en')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                  </div> 

                  <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-control-label">Product Tags Bangla: <span class="tx-danger">*</span></label>
                        <input class="form-control" type="text" name="product_tags_bn" value="{{ old('product_tags_bn') }}" placeholder="Product tags bangla">
                        @error('product_tags_bn')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                  </div>
                  
                  <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-control-label">Product Size English: <span class="tx-danger">*</span></label>
                        <input class="form-control" type="text" name="product_size_en" value="{{ old('product_size_en') }}" placeholder="Product size english">
                        @error('product_size_en')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                  </div>

                  <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-control-label">Product Size Bangla: <span class="tx-danger">*</span></label>
                        <input class="form-control" type="text" name="product_size_bn" value="{{ old('product_size_bn') }}" placeholder="Product size bangla">
                        @error('product_size_bn')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                  </div>

                  <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-control-label">Product Color English: <span class="tx-danger">*</span></label>
                        <input class="form-control" type="text" name="product_color_en" value="{{ old('product_color_en') }}" placeholder="Product color english">
                        @error('product_color_en')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                  </div>

                  <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-control-label">Product color Bangla: <span class="tx-danger">*</span></label>
                        <input class="form-control" type="text" name="product_color_bn" value="{{ old('product_color_bn') }}" placeholder="Product color bangla">
                        @error('product_color_bn')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                  </div>

                  <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-control-label">Selling Price: <span class="tx-danger">*</span></label>
                        <input class="form-control" type="text" name="selling_price" value="{{ old('selling_price') }}" placeholder="Product selling price">
                        @error('selling_price')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                  </div>

                  <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-control-label">Discount Price: <span class="tx-danger">*</span></label>
                        <input class="form-control" type="text" name="discount_price" value="{{ old('discount_price') }}" placeholder="Product discount price">
                        @error('discount_price')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                  </div>

                  <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-control-label">Main Thumbnail: <span class="tx-danger">*</span></label>
                        <input class="form-control" type="file" name="product_thumbnail" value="{{ old('product_thumbnail') }}">
                        @error('product_thumbnail')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                  </div>

                  <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-control-label">Multiple Image: <span class="tx-danger">*</span></label>
                        <input class="form-control" type="file" name="multi_img" value="{{ old('multi_img') }}">
                        @error('multi_img')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-control-label">Short Description English: <span class="tx-danger">*</span></label>
                        <textarea name="short_descp_en" id="summernote"></textarea>
                        @error('short_descp_en')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-control-label">Short Description Bangla: <span class="tx-danger">*</span></label>
                        <textarea name="short_descp_bn" id="summernote2"></textarea>
                        @error('short_descp_bn')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-control-label">Long Description English: <span class="tx-danger">*</span></label>
                        <textarea name="long_descp_en" id="summernote3"></textarea>
                        @error('long_descp_en')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-control-label">Long Description Bangla: <span class="tx-danger">*</span></label>
                        <textarea name="long_descp_bn" id="summernote4"></textarea>
                        @error('long_descp_bn')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                  </div>
                  <div class="col-md-4">
                  <label class="ckbox">
                    <input type="checkbox" checked><span>Hot Deals</span>
                  </label>
                  </div>
                  <div class="col-md-4">
                    <label class="ckbox">
                      <input type="checkbox" checked><span>Featured</span>
                    </label>
                    </div>
                    <div class="col-md-4">
                        <label class="ckbox">
                          <input type="checkbox" checked><span>Special Offer</span>
                        </label>
                        </div>
                        <div class="col-md-4">
                            <label class="ckbox">
                              <input type="checkbox" checked><span>Special Deals</span>
                            </label>
                            </div>

              <div class="form-layout-footer mt-3">
                <button class="btn btn-info mg-r-5" type="submit" style="cursor: pointer;">Add Product</button>
              </div><!-- form-layout-footer -->
            </form>
            </div>
            </div><!-- row --> 


    </div>

@endsection