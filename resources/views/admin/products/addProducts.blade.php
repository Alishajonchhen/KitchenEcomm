<style>
    .form-control{
        width:270px;
    }
</style>

<div class="modal fade" id="productModal" tabindex="-1" role="dialog" aria-labelledby="productModal" aria-hidden="true"
     style="margin-left: 170px; width: 1200px; height: 590px;">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="width: 1100px; margin-left: -240px">
            <div class="modal-header">
                <h1 class="modal-title" id="productModal">Add Product</h1>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form style="width: 470px;height: 350px;padding: 30px;" action="{{route('admin.addProducts')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="col-sm-6">
                <div class="form-group row">
                    <label for="id" class="col-md-10 col-form-label text-md-right">Product ID</label>
                    <div class="col-md-12" style="margin-left: -300px;">
                        <input name="id" type="text" class="form-control" placeholder="Product ID" required style="height: 25px;">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="product_name" class="col-md-10 col-form-label text-md-right">Product Name</label>

                    <div class="col-md-12" style="margin-left: -300px;">
                        <input name="product_name" type="text" class="form-control" placeholder="Product Name" required style="height: 25px;">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="product_price" class="col-md-10 col-form-label text-md-right">Product Price</label>

                    <div class="col-md-12" style="margin-left: -300px;">
                        <input name="product_price" type="text" class="form-control" placeholder="Product Price" required style="height: 25px;">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="product_discount" class="col-md-10 col-form-label text-md-right">Product Discount</label>

                    <div class="col-md-12" style="margin-left: -300px;">
                        <input name="product_discount" type="text" class="form-control" placeholder="Product Discount" required style="height: 25px;">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="product_description" class="col-md-10 col-form-label text-md-right">Product Description</label>

                    <div class="col-md-12" style="margin-left: -300px;">
                        <input name="product_description" type="text" class="form-control" placeholder="Product Description" required style="height: 25px;">
                    </div>
                </div>
            </div>
                    <div class="col-sm-6" style="margin-left: 500px; margin-top: -258px;">
                        <div class="form-group row">
                            <label for="product_voltage" class="col-md-10 col-form-label text-md-right">Product Voltage</label>

                            <div class="col-md-12" style="margin-left: -300px;">
                                <input name="product_voltage" type="text" class="form-control" placeholder="Product Voltage" required style="height: 25px;">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="product_color" class="col-md-10 col-form-label text-md-right">Product Color</label>

                            <div class="col-md-12" style="margin-left: -300px;">
                                <input name="product_color" type="text" class="form-control" placeholder="Product Color" required style="height: 25px;">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="product_image" class="col-md-10 col-form-label text-md-right">Product Image</label>

                            <div class="col-md-12" style="margin-left: -300px;">
                                <input name="product_image" type="file" class="btn btn-primary" placeholder="Product Image" required style="margin-left: 300px; height: 30px; width: 270px;">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="category_id" class="col-md-10 col-form-label text-md-right">Category ID</label>

                            <div class="col-md-12" style="margin-left: -300px;">
                                <input name="category_id" type="text" class="form-control" placeholder="Category ID" required style="height: 25px;">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="status" class="col-md-10 col-form-label text-md-right">Status</label>

                            <div class="col-md-12" style="margin-left: -300px;">
                                <input name="status" type="text" class="form-control" placeholder="Status" required style="height: 25px;">
                            </div>
                        </div>
                    </div>


                    <div class="form-group row mb-0">
                        <div class="col-md-8 offset-md-4">
                            <button type="submit" class="btn btn-success" style="margin-left: 300px; width: 170px;">
                                Add Product
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


