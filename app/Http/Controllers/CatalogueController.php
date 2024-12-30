<?php

namespace App\Http\Controllers;

use App\Models\Books;
use Illuminate\Http\Request;

class CatalogueController extends Controller
{
    public function index(Request $request)
{
    // Start the query for books
    $query = Books::query();

    // Apply search filter for title and author (combined)
    if ($request->has('search') && $request->input('search') !== '') {
        $searchTerm = $request->input('search');
        $query->where(function ($query) use ($searchTerm) {
            $query->where('title', 'like', '%' . $searchTerm . '%')
                  ->orWhere('author', 'like', '%' . $searchTerm . '%');
        });
    }

    // Filter by status (Available or Unavailable)
    if ($request->has('status') && $request->input('status') !== '') {
        $status = $request->input('status');
        if ($status == 'Available') {
            $query->where('available_copies', '>', 0); // Show available books
        } elseif ($status == 'Unavailable') {
            $query->where('available_copies', 0); // Show unavailable books
        }
    }
    // Fetch the books with pagination
    $books = $query->where('status', '1')->paginate(9);

    // Pass the books to the view
    return view('catalogue.index', compact('books'));
}

    public function create()
    {
        return view('catalogue.create');
    }
    public function store(Request $request)
{
    $request->validate([
        'title' => 'required|string',
        'author' => 'required|string',
        'isbn' => 'required',
        'total_copies' => 'required|integer',
        'available_copies' => 'required|integer'
    ]);

    // Check if the book with the same ISBN already exists
    $existingBook = Books::where('isbn', $request->isbn)->first();

    if ($existingBook) {
        // If the book exists, update the available copies and total copies
        $existingBook->total_copies += 1;
        $existingBook->available_copies += 1;
        $existingBook->save();

        return redirect()->route('catalogue')->with('success', 'Book already exists, copies updated successfully!');
    } else {
        // If the book doesn't exist, create a new book
        $book = new Books();
        $book->title = $request->title;
        $book->author = $request->author;
        $book->isbn = $request->isbn;
        $book->genre = $request->genre;
        $book->language = $request->language;
        $book->published_year = $request->published_year;
        $book->total_copies = $request->total_copies;
        $book->available_copies = $request->available_copies;
        $book->summary = $request->summary;
        $book->physical_description = $request->physical_description;
        $book->other_title = $request->other_title;

        // Handle image upload
        if ($request->hasFile('book_image')) {
            $image = $request->file('book_image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
            $book->image = $imageName;
        }

        $book->save();

        return redirect()->route('catalogue')->with('success', 'Book added successfully!');
    }
}

}

