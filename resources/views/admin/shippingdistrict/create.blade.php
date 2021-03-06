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
            <span class="breadcrumb-item active">District</span>
        </nav>

        <div class="sl-pagebody">
            <div class="row row-sm">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">District List</div>
                        <div class="card-body">
                            <div class="table-wrapper">
                                <table id="datatable1" class="table display responsive nowrap">
                                    <thead>
                                        <tr>
                                            <th class="wd-30p">Division Name</th>
                                            <th class="wd-30p">District Name</th>
                                            <th class="wd-20p">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($districts as $item)
                                            <tr>
                                                <td>{{ optional($item->division)->division_name }}</td>
                                                <td>{{ $item->district_name }}</td>
                                                <td>
                                                    <a href="{{ url('admin/district-edit/' . $item->id) }}"
                                                        class="btn btn-info btn-sm" title="edit data"><i
                                                            class="fa fa-pencil"></i></a>
                                                    <a href="{{ url('admin/district-delete/' . $item->id) }}"
                                                        class="btn btn-sm btn-danger" id="delete" title="delete data"><i
                                                            class="fa fa-trash"></i></a>
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
                        <div class="card-header">Add New District</div>
                        <div class="card-body">
                            <form action="{{ route('district-store') }}" method="POST">
                                @csrf

                                <div class="form-group">
                                    <label class="form-control-label">Divsion Name: <span class="tx-danger">*</span></label>
                                    <select class="form-control" aria-label="Default select example" name="division_id">
                                        <option selected>Select Division</option>
                                        @foreach ($divisions as $division)
                                            <option value="{{ $division->id }}">{{ $division->division_name }}</option>
                                        @endforeach
                                    </select>
                                    @error('division_name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label">District Name: <span
                                            class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="district_name"
                                        placeholder="District name">
                                    @error('district_name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-layout-footer">
                                    <button type="submit" class="btn btn-info">District Create</button>
                                </div><!-- form-layout-footer -->
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
