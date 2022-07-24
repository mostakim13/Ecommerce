@extends('layouts.admin-master')
@section('shipping')
    active show-sub
@endsection
@section('add-district')
    active
@endsection
@section('admin-content')
    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="index.html">ShopMama</a>
            <span class="breadcrumb-item active">State</span>
        </nav>

        <div class="sl-pagebody">
            <div class="row row-sm">

                <div class="col-md-6 m-auto">
                    <div class="card">
                        <div class="card-header">Edit State</div>
                        <div class="card-body">
                            <form action="{{ route('state-update') }}" method="POST">
                                @csrf

                                <input type="hidden" name="id" value="{{ $state->id }}">
                                <div class="form-group">
                                    <label class="form-control-label">Divsion Name: <span class="tx-danger">*</span></label>
                                    <select class="form-control" aria-label="Default select example" name="division_id">
                                        <option selected>Select Division</option>
                                        @foreach ($divisions as $division)
                                            <option value="{{ $division->id }}"
                                                {{ $division->id == $state->division_id ? 'selected' : '' }}>
                                                {{ $division->division_name }}</option>
                                        @endforeach
                                    </select>
                                    @error('division_name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label">District: <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="text"
                                        value="{{ optional($state->district)->district_name }}" placeholder="State name"
                                        readonly>
                                    @error('district_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label">State Name: <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="state_name" placeholder="State name"
                                        value="{{ $state->state_name }}">
                                    @error('state_name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-layout-footer">
                                    <button type="submit" class="btn btn-info">State Create</button>
                                </div><!-- form-layout-footer -->
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
