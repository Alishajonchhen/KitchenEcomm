<div class="modal fade" id="changePassword" tabindex="-1" role="dialog" aria-labelledby="changePassword"
    aria-hidden="true" style="margin-left:20px;background-color:unset !important;;width:unset !important;">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Change Password</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('change-password') }}" method="Post">
                    @csrf
                    @method('PATCH')
                    <div class="form-group">
                        <div class="row pass">
                            <label for="current-password">Current Password</label>
                            <input type="password" name="current_password" class="form-control">
                        </div>
                        <div class="row pass">
                            <label for="new-password">New Password</label>
                            <input type="password" name="password" class="form-control">
                        </div>
                        <div class="row pass">
                            <label for="confirm-password">Confirm Password</label>
                            <input type="password" class="form-control" name="password_confirmation">
                        </div>
                    </div>
                    <button class="btn btn-primary" type="submit" style="background-color: black;
                     color: white;">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>
<style>
    .pass {
        margin-right: 4px !important;
        margin-left: 4px !important;
    }

    .modal-title{
        font-family: Baskerville Old Face;
    }
</style>
