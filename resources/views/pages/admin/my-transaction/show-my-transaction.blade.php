<div class="modal fade" id="showMyTransactionModal{{ $row->id }}" tabindex="-1">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">My Transcation - <strong>{{ $row->name }}</strong></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <ul class="list-group">
                    <li class="list-group-item">Reciever Name   : <strong>{{ $row->name }}</strong></li>
                    <li class="list-group-item">Email           : <strong>{{ $row->email }}</strong></li>
                    <li class="list-group-item">Phone           : <strong>{{ $row->phone }}</strong></li>
                    <li class="list-group-item">Address         : <strong>{{ $row->address }}</strong></li>
                    <li class="list-group-item">Courier         : <strong>{{ $row->courier }}</strong></li>
                    <li class="list-group-item">Payment         : <strong>{{ $row->payment }}</strong></li>
                    <li class="list-group-item">Payment URL     : <strong>{{ $row->payment_url }}</strong></li>
                    <li class="list-group-item">Status          : <strong>{{ $row->status }}</strong></li>
                    <li class="list-group-item">Total Price     : <strong>{{ $row->total_price }}</strong></li>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
