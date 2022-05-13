<!-- Modal -->
<div class="modal fade" id="cartModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="pName"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-4">
                        <div class="card" style="width: 16rem;">
                            <img src="" class="card-img-top" alt="" height="200px" id="pImage">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <ul class="list-group">
                            <li class="list-group-item">Price: <strong class="text-danger">$<span id="pPrice"></span>
                                </strong>
                                <del id="oldPrice">$</del>
                            </li>
                            <li class="list-group-item">Product Code: <strong id="pCode"></strong></li>
                            <li class="list-group-item">Category: <strong id="pCategory"></strong></li>
                            <li class="list-group-item">Brand: <strong id="pBrand"></strong></li>
                            <li class="list-group-item">Stock: <span class="bagde badge-pill badge-success"
                                    id="available" style="background-color: green; color: white"></span>
                                <span class="bagde badge-pill badge-danger" id="stockout"
                                    style="background-color: red; color: white"></span>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Select Color</label>
                            <select class="form-control" id="exampleFormControlSelect1" name="color">

                            </select>
                        </div>
                        <div class="form-group" id="sizeArea">
                            <label for="exampleFormControlSelect1">Select Size</label>
                            <select class="form-control" id="exampleFormControlSelect1" name="size">

                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Quantity</label>
                            <input type="number" class="form-control" id="exampleFormControlInput1" value="1" min="1">
                        </div>
                        <button type="submit" class="btn btn-danger">Add To Cart</button>
                    </div>
                </div>
            </div>
            {{-- <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div> --}}
        </div>
    </div>
</div>
