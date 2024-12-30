<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit Book</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="editBookForm" method="POST" action="">
                        @csrf
                        <input type="hidden" name="book_id" id="editBookId">
                        
                        <div class="mb-3">
                            <label for="editBookTitle" class="form-label">Book Title</label>
                            <input type="text" class="form-control" id="editBookTitle" name="title" required>
                        </div>
                        <div class="mb-3">
                            <label for="editBookAuthor" class="form-label">Author</label>
                            <input type="text" class="form-control" id="editBookAuthor" name="author" required>
                        </div>
                        <div class="mb-3">
                            <label for="editBookSummary" class="form-label">Summary</label>
                            <textarea type="textarea" class="form-control" id="editBookSummary" name="summary"  rows="5" required></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>