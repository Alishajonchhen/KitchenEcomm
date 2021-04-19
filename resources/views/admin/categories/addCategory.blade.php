<div class="modal fade" id="categoryModal" tabindex="-1" role="dialog" aria-labelledby="categoryModal"
    aria-hidden="true" style="margin-left:20px;background-color:unset !important;;width:unset !important;">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title" id="categoryModal">Add Category</h1>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form style="padding: 35px;" action="{{route('admin.addCategory')}}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                        <label for="id" class="col-md-4 col-form-label text-md-right">Category Code</label>

                        <div class="col-sm-6" style="margin-left: -300px;">
                            <input name="category_code" type="text" class="form-control" placeholder="Category code"
                                style="height: 25px;">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">Category Name</label>

                        <div class="col-sm-6" style="margin-left: -300px;">
                            <input name="name" type="text" class="form-control" placeholder="Category Name" required
                                style="height: 25px;">

                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="category_image" class="col-md-4 col-form-label text-md-right">Catgeory
                            Image *</label>

                        <div class="col-md-12" style="margin-left: -300px;">
                            <input name="category_image" type="file" placeholder="Category Image" required
                                style="margin-left: 300px; height: 30px; width: 270px;">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="status" class="col-md-4 col-form-label text-md-right">Status</label>

                        <div class="col-md-6" style="margin-left: -300px;">
                            <select name="status" id="status" class="form-control" required>

                                <option value="1" selected>Active</option>
                                <option value="0">Inactive</option>

                            </select>
                        </div>
                    </div>
                    <div class="form-group row mb-0">
                        <div class="col-md-8 offset-md-4">
                            <button type="submit" class="btn btn-success" style=" margin-left: 0; width: 170px;">
                                Add Category
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<style>
    #categoryModal .modal {
        background-color: unset !important;
        width: unset !important;
    }
</style>
