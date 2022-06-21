@extends('layouts.admin-master')
@section('coupon')
    active
@endsection
@section('admin-content')
    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="index.html">ShopMama</a>
            <span class="breadcrumb-item active">Coupon</span>
        </nav>

        <div class="sl-pagebody">
            <div class="row row-sm">

                <div class="col-md-6 m-auto">
                    <div class="card">
                        <div class="card-header">Edit Coupon</div>
                        <div class="card-body">
                            <form action="{{ route('coupon-update', ['id' => $coupon->id]) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label class="form-control-label">Coupon Name: <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="coupon_name"
                                        value="{{ $coupon->coupon_name }}" placeholder="Coupon name">
                                    @error('coupon_name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label">Coupon Discount(%): <span
                                            class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="coupon_discount"
                                        value="{{ $coupon->coupon_discount }}" placeholder="Coupon discount"
                                        min="1" max="99">
                                    @error('coupon_discount')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label">Coupon Validity Date: <span
                                            class="tx-danger">*</span></label>
                                    <input class="form-control" type="date" name="coupon_validity"
                                        value="{{ $coupon->coupon_validity }}"
                                        min="{{ Carbon\Carbon::now()->format('Y-m-d') }}">
                                    @error('coupon_validity')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-layout-footer">
                                    <button type="submit" class="btn btn-info">Update</button>
                                </div><!-- form-layout-footer -->
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
