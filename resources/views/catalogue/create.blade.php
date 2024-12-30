<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Book</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <div class="container my-5">
        <h2>Add New Book</h2>
        
        <!-- Add Book Form -->
        <form method="POST" action="{{ route('catalogue.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Book Title</label>
                <input type="text" class="form-control" id="title" name="title" required>
            </div>

            <div class="mb-3">
                <label for="author" class="form-label">Author</label>
                <input type="text" class="form-control" id="author" name="author" required>
            </div>

            <div class="mb-3">
                <label for="isbn" class="form-label">ISBN</label>
                <input type="text" class="form-control" id="isbn" name="isbn" required>
            </div>

            <div class="mb-3">
                <label for="genre" class="form-label">Genre</label>
                <input type="text" class="form-control" id="genre" name="genre">
            </div>

            <div class="mb-3">
                <label for="language" class="form-label">Language</label>
                <input type="text" class="form-control" id="language" name="language">
            </div>

            <div class="mb-3">
                <label for="published_year" class="form-label">Published Year</label>
                <input type="number" class="form-control" id="published_year" name="published_year">
            </div>

            <div class="mb-3">
                <label for="total_copies" class="form-label">Total Copies</label>
                <input type="number" class="form-control" id="total_copies" name="total_copies" required>
            </div>

            <div class="mb-3">
                <label for="available_copies" class="form-label">Available Copies</label>
                <input type="number" class="form-control" id="available_copies" name="available_copies" required>
            </div>

            <div class="mb-3">
                <label for="book_image" class="form-label">Book Image</label>
               <input type="file" id="book_image" name="book_image">            </div>

            <button type="submit" class="btn btn-primary">Add Book</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
