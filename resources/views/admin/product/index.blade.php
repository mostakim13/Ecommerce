@extends('layouts.admin-master')
@section('products')
    active show-sub
@endsection
@section('manage-product')
    active
@endsection
@section('admin-content')

<!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="index.html">ShopMama</a>
        <span class="breadcrumb-item active">Products</span>
      </nav>

      <div class="sl-pagebody">
        <div class="row row-sm">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Product List</div>
                    <div class="card-body">
                    <div class="table-wrapper">
                      <table id="datatable1" class="table display responsive nowrap">
                        <thead>
                          <tr>
                            <th class="wd-20p">Image</th>
                            <th class="wd-20p">Product Name English</th>
                            <th class="wd-20p">Product Price</th>
                            <th class="wd-15p">Product Quantity</th>
                            <th class="wd-5p">Product Discount</th>
                            <th class="wd-5p">Status</th>
                            <th class="wd-15p">Action</th>
                          </tr>
                        </thead>
                        <tbody>

                            @foreach ($products as $item)
                          <tr>
                            <td>
                                <img src="{{ asset($item->product_thambnail) }}" alt="" style="height: 60px; width: 60px;">
                            </td>
                            <td>{{ $item->product_name_en }}</td>
                            <td>{{ $item->selling_price }}</td>
                            <td>{{ $item->product_qty }}</td>
                            <td>
                              @if($item->discount_price == NULL)
                              <span class="badge badge-pill badge-danger">No</span>
                              @else
                              @php
                                $amount =  $item->discount_price/$item->selling_price ;
                                $discount = $amount*100;
                              @endphp
                              <span class="badge badge-pill badge-success">{{ round($discount) }}%</span>
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
                                <a href="{{ url('admin/product-view/'.$item->id) }}" class="btn btn-info btn-sm" title="view data"><i class="fa fa-eye"></i></a>

                                <a href="{{ url('admin/product-edit/'.$item->id) }}" class="btn btn-info btn-sm" title="edit data"><i class="fa fa-pencil"></i></a>

                                <a href="{{ url('admin/product-delete/'.$item->id) }}" class="btn btn-sm btn-danger" id="delete" title="delete data"><i class="fa fa-trash"></i></a>

                                @if($item->status == 1)
                                <a href="{{ url('admin/product-inactive/'.$item->id) }}" class="btn btn-danger btn-sm" title="inactive"><i class="fa fa-arrow-down"></i></a>
                              @else
                              <a href="{{ url('admin/product-active/'.$item->id) }}" class="btn btn-success btn-sm" title="active now data"><i class="fa fa-arrow-up"></i></a>
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
        </div>
      </div>
    </div>
    @endsection
