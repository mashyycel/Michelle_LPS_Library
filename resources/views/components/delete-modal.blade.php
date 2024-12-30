<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Delete Book</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to delete this book?</p>
                </div>
            <div class="modal-footer">
                <form id="deleteBookForm" method="POST" action="">
                    @csrf
                    <input type="hidden" name="book_id" id="deleteBookId">
                    <button type="submit" class="btn btn-danger">Delete Book</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                </form>
            </div>
               
            </div>
        </div>
    </div>