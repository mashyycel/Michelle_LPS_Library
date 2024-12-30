<div class="modal fade" id="returnModal" tabindex="-1" aria-labelledby="returnModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="returnModalLabel">Return Book</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            Are you sure you have already received this book and want to return it?       
            </div>
            <div class="modal-footer">
                <form id="return-form" method="POST" action="">
                    @csrf
                    <input type="hidden" name="id_checkout" id="checkout-id">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Return Book</button>
                </form>
            </div>
        </div>
    </div>
</div>