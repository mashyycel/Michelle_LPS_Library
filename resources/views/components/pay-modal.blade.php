<div class="modal fade" id="payModal" tabindex="-1" aria-labelledby="payModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="payModalLabel">Pay Book</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                                Are you sure you have already received the payment?
            </div>
            <div class="modal-footer">
                <form id="pay-form" method="POST" action="">
                    @csrf
                    <input type="hidden" name="id_fine" id="fine-id">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Pay Book</button>

                </form>
            </div>
        </div>
    </div>
</div>