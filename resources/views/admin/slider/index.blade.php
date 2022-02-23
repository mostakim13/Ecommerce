@extends('layouts.admin-master')
@section('sliders')
    active
@endsection
@section('admin-content')

<!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="index.html">ShopMama</a>
        <span class="breadcrumb-item active">Slider</span>
      </nav>

      <div class="sl-pagebody">
        <div class="row row-sm">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Sliders List</div>
                    <div class="card-body">
                    <div class="table-wrapper">
                      <table id="datatable1" class="table display responsive nowrap">
                        <thead>
                          <tr>
                            <th class="wd-25p">Slider image</th>
                            <th class="wd-25p">Slider title en</th>
                            <th class="wd-25p">Slider des en</th>
                            <th class="wd-5p">Status</th>
                            <th class="wd-20p">Action</th>
                          </tr>
                        </thead>
                        <tbody>

                            @foreach ($sliders as $item)
                          <tr>
                            <td>
                                <img src="{{ asset($item->image) }}" alt="" style="width: 80px;">
                            </td>
                            <td>
                              @if($item->title_en == NULL)
                                <span class="badge badge-pill badge-danger">Title Not Found</span>
                                @else
                                {{ $item->title_en }}
                              @endif
                            </td>
                            <td>
                              @if($item->description_en == NULL)
                                <span class="badge badge-pill badge-danger">Description Not Found</span>
                                @else
                                {{ $item->description_en }}
                              @endif
                            </td>
                            <td>
                              @if($item->status == 1)
                                <span class="badge badge-pill badge-success">Active</span>
                              @else
                                <span class="badge badge-pill badge-danger">Inactive</span>
                              @endif
                            </td>
                            <td>

                              <a href="{{ url('admin/slider-edit/'.$item->id) }}" class="btn btn-info btn-sm" title="edit data"><i class="fa fa-pencil"></i></a>
                              <a href="{{ url('admin/slider/delete/'.$item->id) }}" class="btn btn-sm btn-danger" id="delete" title="delete data"><i class="fa fa-trash"></i></a>

                              @if($item->status == 1)
                              <a href="{{ url('admin/slider-inactive/'.$item->id) }}" class="btn btn-danger btn-sm" title="inactive"><i class="fa fa-arrow-down"></i></a>
                            @else
                            <a href="{{ url('admin/slider-active/'.$item->id) }}" class="btn btn-success btn-sm" title="active now data"><i class="fa fa-arrow-up"></i></a>
                            @endif

                          </td>
                          </tr>
                          @endforeach

                        </tbody>
                      </table>
                    </div><!-- table-wrapper -->
                </div>
                  </div><!-- card -->
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">Add New Slider</div>
                        <div class="card-body">
                            <form action="{{ route('slider-store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label class="form-control-label">Slider Title English: <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="title_en" value="{{ old('title_en') }}" placeholder="Enter slider title">

                                </div>
                                <div class="form-group">
                                  <label class="form-control-label">Slider Title Bangla: <span class="tx-danger">*</span></label>
                                  <input class="form-control" type="text" name="title_bn" value="{{ old('title_bn') }}" placeholder="Enter slider title">

                              </div>
                                <div class="form-group">
                                    <label class="form-control-label">Slider Description English: <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="description_en" value="{{ old('descroption_en') }}" placeholder="Enter slider description">

                                </div>
                                <div class="form-group">
                                  <label class="form-control-label">Slider Description Bangla: <span class="tx-danger">*</span></label>
                                  <input class="form-control" type="text" name="description_bn" value="{{ old('descroption_bn') }}" placeholder="Enter slider description">

                              </div>
                                <div class="form-group">
                                    <label class="form-control-label">Slider Image: <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="file" name="image">
                                    @error('image')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-layout-footer">
                                    <button type="submit" class="btn btn-info">Add New</button>
                                </div><!-- form-layout-footer -->
                            </form>
                        </div>
                </div>
            </div>
        </div>
      </div>
    </div>
    @endsection
