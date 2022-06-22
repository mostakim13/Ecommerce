@extends('layouts.admin-master')
@section('shipping')
    active show-sub
@endsection
@section('add-division')
    active
@endsection
@section('admin-content')
    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="index.html">ShopMama</a>
            <span class="breadcrumb-item active">Division</span>
        </nav>

        <div class="sl-pagebody">
            <div class="row row-sm">

                <div class="col-md-4 m-auto">
                    <div class="card">
                        <div class="card-header">Add New Division</div>
                        <div class="card-body">
                            <form action="{{ route('division-update', ['id' => $division->id]) }}" method="POST">
                                @csrf

                                <div class="form-group">
                                    <label class="form-control-label">Divsion Name: <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="division_name"
                                        value="{{ $division->division_name }}">
                                    @error('division_name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-layout-footer">
                                    <button type="submit" class="btn btn-info">Division Update</button>
                                </div><!-- form-layout-footer -->
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
