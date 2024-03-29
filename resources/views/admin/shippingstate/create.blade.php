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
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">State List</div>
                        <div class="card-body">
                            <div class="table-wrapper">
                                <table id="datatable1" class="table display responsive nowrap">
                                    <thead>
                                        <tr>
                                            <th class="wd-30p">Division Name</th>
                                            <th class="wd-30p">District Name</th>
                                            <th class="wd-30p">State Name</th>
                                            <th class="wd-20p">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($states as $item)
                                            <tr>
                                                <td>{{ optional($item->division)->division_name }}</td>
                                                <td>{{ optional($item->district)->district_name }}</td>
                                                <td>{{ $item->state_name }}</td>
                                                <td>
                                                    <a href="{{ url('admin/state-edit/' . $item->id) }}"
                                                        class="btn btn-info btn-sm" title="edit data"><i
                                                            class="fa fa-pencil"></i></a>
                                                    <a href="{{ url('admin/state-delete/' . $item->id) }}"
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
                        <div class="card-header">Add New State</div>
                        <div class="card-body">
                            <form action="{{ route('state-store') }}" method="POST">
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
                                    <label class="form-control-label">Select District: <span
                                            class="tx-danger">*</span></label>
                                    <select class="form-control select2-show-search" data-placeholder="Select One"
                                        name="district_id">
                                        <option label="Choose one"></option>

                                    </select>
                                    @error('district_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label">State Name: <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="state_name" placeholder="State name">
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

    <script src="{{ asset('backend') }}/lib/jquery-2.2.4.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('select[name="division_id"]').on('change', function() {
                var division_id = $(this).val();
                if (division_id) {
                    $.ajax({
                        url: "{{ url('/admin/district-get/ajax') }}/" + division_id,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            var d = $('select[name="district_id"]').empty();
                            $.each(data, function(key, value) {
                                $('select[name="district_id"]').append(
                                    '<option value="' + value.id + '">' + value
                                    .district_name + '</option>');
                            });
                        },
                    });
                } else {
                    alert('danger');
                }
            });
        });
    </script>
@endsection
