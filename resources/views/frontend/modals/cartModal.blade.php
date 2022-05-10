<!-- Modal -->
<div class="modal fade" id="cartModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">View Product</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-4">
                        <div class="card" style="width: 16rem;">
                            <img src="" class="card-img-top" alt="" style="height: 250px">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <ul class="list-group">
                            <li class="list-group-item">Price: </li>
                            <li class="list-group-item">Product Code: </li>
                            <li class="list-group-item">Category: </li>
                            <li class="list-group-item">Brand: </li>
                            <li class="list-group-item">Stock: </li>
                        </ul>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Select Color</label>
                            <select class="form-control" id="exampleFormControlSelect1">
                                <option>1</option>

                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Select Size</label>
                            <select class="form-control" id="exampleFormControlSelect1">
                                <option>1</option>

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
