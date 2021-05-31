<style>
    .form-control {
        width: 270px;
    }
</style>

{{-- <div class="modal fade" id="productModal" tabindex="-1" role="dialog" aria-labelledby="productModal" aria-hidden="true"
    style="margin-left: 170px; width: 1200px; height: 590px;"> --}}
<div class="modal fade" id="productModal" tabindex="-1" role="dialog" aria-labelledby="productModal" aria-hidden="true"
    style="margin-left:20px;background-color:unset !important;;width:unset !important;">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="width: 1100px; margin-left: -240px">
            <div class="modal-header">
                <h3 class="modal-title">Add Product</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form style="width: 470px;height: 350px;padding: 30px;" action="{{route('admin.addProducts')}}"
                    method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="col-sm-6">
                        <div class="form-group row">
                            <label for="id" class="col-md-10 col-form-label text-md-right">Product Code</label>
                            <div class="col-md-12" style="margin-left: -300px;">
                                <input name="product_code" type="text" class="form-control" placeholder="Product Code"
                                    style="height: 25px;">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="product_name" class="col-md-10 col-form-label text-md-right">Product
                                Name *</label>

                            <div class="col-md-12" style="margin-left: -300px;">
                                <input name="product_name" type="text" class="form-control" placeholder="Product Name"
                                    required style="height: 25px;">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="product_price" class="col-md-10 col-form-label text-md-right">Product
                                Price *</label>

                            <div class="col-md-12" style="margin-left: -300px;">
                                <input name="product_price" type="text" class="form-control" placeholder="Product Price"
                                    required style="height: 25px;">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="quantity" class="col-md-10 col-form-label text-md-right">Product
                                Quantity *</label>

                            <div class="col-md-12" style="margin-left: -300px;">
                                <input name="quantity" type="number" class="form-control" min="1" required
                                    style="height: 25px;" value="1">
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="product_discount" class="col-md-10 col-form-label text-md-right">Product
                                Discount(%)</label>

                            <div class="col-md-12" style="margin-left: -300px;">
                                <input name="product_discount" type="number" class="form-control"
                                    placeholder="Product Discount" style="height: 25px;" min="0">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="status" class="col-md-10 col-form-label text-md-right">Status *</label>

                            <div class="col-md-12" style="margin-left: -300px;">

                                <select name="status" id="status" class="form-control" required>
                                    <option value="1" selected>Active</option>
                                    <option value="0">Inactive</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6" style="margin-left: 500px; margin-top: -308px;">
                        <div class="form-group row">
                            <label for="product_voltage" class="col-md-10 col-form-label text-md-right">Product
                                Voltage (W)</label>

                            <div class="col-md-12" style="margin-left: -300px;">
                                <input name="product_voltage" type="text" class="form-control"
                                    placeholder="Product Voltage" style="height: 25px;">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="product_color" class="col-md-10 col-form-label text-md-right">Product
                                Color *</label>

                            <div class="col-md-12" style="margin-left: -300px;">
                                <input name="product_color" type="text" class="form-control" placeholder="Product Color"
                                    required style="height: 25px;">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="product_image" class="col-md-10 col-form-label text-md-right">Product
                                Image *</label>

                            <div class="col-md-12" style="margin-left: -300px;">
                                <input name="product_image" type="file" placeholder="Product Image" required
                                    style="margin-left: 300px; height: 30px; width: 270px;">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="category_id" class="col-md-10 col-form-label text-md-right">Category *</label>
                            <div class="col-md-12" style="margin-left: -300px;">
                                <select name="category_id" id="category" class="form-control" required>
                                    <option value="">Select Category</option>
                                    @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="product_description" class="col-md-10 col-form-label text-md-right">Product
                                Description *</label>

                            <div class="col-md-12" style="margin-left: -300px;">
                                <textarea name="product_description" type="text" class="form-control"
                                       placeholder="Product Description" required style="height: 100px; resize: none;">
                                </textarea>
                            </div>
                        </div>
                    </div>


                    <div class="form-group row mb-0">
                        <div class="col-md-8 offset-md-4">
                            <button type="submit" class="btn btn-success"
                                    style="margin-left: 780px; width: 170px;">
                                Add Product
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


