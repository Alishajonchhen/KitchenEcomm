<div class="modal fade" id="categoryModal" tabindex="-1" role="dialog" aria-labelledby="categoryModal" aria-hidden="true"
     style="margin-left: 200px; width: 1200px; height: 510px;">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="width: 980px; margin-left: -170px">
            <div class="modal-header">
                <h1 class="modal-title" id="categoryModal">Add Product</h1>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form style="width: 470px;height: 200px;padding: 30px;" action="{{route('admin.addProduct')}}" method="POST">
                    @csrf
                    <div class="col-sm-6">
                        <div class="form-group row">
                            <label for="product_id" class="col-md-10 col-form-label text-md-right">Product ID</label>

                            <div class="col-md-12" style="margin-left: -300px;">
                                <input id="product_id" name="product_id" type="text" class="form-control" placeholder="Product ID">

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="product_name" class="col-md-10 col-form-label text-md-right">Product Name</label>

                            <div class="col-md-12" style="margin-left: -300px;">
                                <input id="product_name" name="product_name" type="text" class="form-control" placeholder="Product Name">

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="product_price" class="col-md-10 col-form-label text-md-right">Product Price</label>

                            <div class="col-md-12" style="margin-left: -300px;">
                                <input id="product_price" name="product_price" type="text" class="form-control" placeholder="Product Price">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="product_discount" class="col-md-10 col-form-label text-md-right">Product Discount</label>

                            <div class="col-md-12" style="margin-left: -300px;">
                                <input id="product_discount" name="product_discount" type="text" class="form-control" placeholder="Product Discount">

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="product_description" class="col-md-10 col-form-label text-md-right">Product Description</label>

                            <div class="col-md-12" style="margin-left: -300px;">
                                <input id="product_description" name="product_description" type="text" class="form-control" placeholder="Product Description">

                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6" style="margin-left: 400px; margin-top: -228px;">
                        <div class="form-group row">
                            <label for="product_voltage" class="col-md-10 col-form-label text-md-right">Product Voltage</label>

                            <div class="col-md-12" style="margin-left: -300px;">
                                <input id="product_voltage" name="product_voltage" type="text" class="form-control" placeholder="Product Voltage">

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="product_color" class="col-md-10 col-form-label text-md-right">Product Color</label>

                            <div class="col-md-12" style="margin-left: -300px;">
                                <input id="product_color" name="product_color" type="text" class="form-control" placeholder="Product Color">

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="product_image" class="col-md-10 col-form-label text-md-right">Product Image</label>

                            <div class="col-md-12" style="margin-left: -300px;">
                                <input id="product_image" name="product_image" type="text" class="form-control" placeholder="Product Image">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="category_id" class="col-md-10 col-form-label text-md-right">Category ID</label>

                            <div class="col-md-12" style="margin-left: -300px;">
                                <input id="category_id" name="category_id" type="text" class="form-control" placeholder="Category ID">

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="status" class="col-md-10 col-form-label text-md-right">Status</label>

                            <div class="col-md-12" style="margin-left: -300px;">
                                <input id="status" name="status" type="text" class="form-control" placeholder="Status">

                            </div>
                        </div>
                    </div>


                    <div class="form-group row mb-0">
                        <div class="col-md-8 offset-md-4">
                            <button type="submit" class="btn btn-success" style="margin-left: 300px; width: 170px;">
                                Submit
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
