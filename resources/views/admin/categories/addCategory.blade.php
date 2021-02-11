<div class="modal fade" id="categoryModal" tabindex="-1" role="dialog" aria-labelledby="categoryModal" aria-hidden="true"
style="margin-left: 350px; width: 800px; height: 450px;">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="height: 380px;">
            <div class="modal-header">
                <h1 class="modal-title" id="categoryModal">Add Category</h1>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form style="width: 570px;height: 170px;padding: 35px;" action="{{route('admin.addCategory')}}" method="POST">
                    @csrf
                    <div class="form-group row">
                        <label for="id" class="col-md-4 col-form-label text-md-right">Category ID</label>

                        <div class="col-sm-6" style="margin-left: -300px;">
                            <input name="id" type="text" class="form-control" placeholder="Category ID">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">Category Name</label>

                        <div class="col-sm-6" style="margin-left: -300px;">
                            <input name="name" type="text" class="form-control" placeholder="Category Name">

                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="status" class="col-md-4 col-form-label text-md-right">Status</label>

                        <div class="col-sm-6" style="margin-left: -300px;">
                            <input name="status" type="text" class="form-control" placeholder="Status">
                        </div>
                    </div>
                    <div class="form-group row mb-0">
                        <div class="col-md-8 offset-md-4">
                            <button type="submit" class="btn btn-success" style=" margin-left: 100px; width: 170px;">
                                Submit
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
