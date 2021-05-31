<div class="modal fade" id="orderItemStatusModal{{ $key }}" tabindex="-1" role="dialog"
    aria-labelledby="orderItemStatusModal{{ $key }}" aria-hidden="true"
    style="margin-left:30px;background-color:unset !important;;width:unset !important;">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Update Status</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('update-order-item-status', $item->id) }}" method="Post">
                    @csrf
                    @method('PATCH')
                    <div class="form-group">
                        <div class="row">
                            <label for="">Status</label>
                            <select name="status">
                                <option value="0">Running</option>
                                <option value="1">Completed</option>
                                <option value="2">Reject</option>
                            </select>
                        </div>
                    </div>
                    <button class="btn btn-primary" type="submit"
                    style="background-color: rgba(65,195,152,0.8) !important;">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>
