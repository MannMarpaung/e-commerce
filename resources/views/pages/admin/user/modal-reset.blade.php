<div class="modal fade" id="resetPasswordModal{{ $row->id }}" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Reset Password - {{ $row->name }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>The Password Will Be Reset To <strong>123456</strong>.</p>
                <p>Are You Sure You Want to Reset This Account Password?</p>
            </div>
            <div class="modal-footer">
                <form action="{{ route('admin.resetPassword', $row->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-warning"><i class="bx bx-refresh"></i>Reset Password</button>
                </form>
            </div>
        </div>
    </div>
</div>
