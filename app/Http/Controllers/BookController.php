<?php

namespace App\Http\Controllers;

use App\Models\Books;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\Checkout;
use App\Models\Fines;


class BookController extends Controller
{
    public function show($id)
{
    $book = Books::findOrFail($id);  // Retrieve book by its ID
    return view('books.detail', compact('book'));  // Return view with book data
}

public function borrow(Request $request, $id)
{

    $book = Books::findOrFail($id);

    // Check if there are available copies to borrow
    if ($book->available_copies > 0) {
        // Decrease the available copies by 1
        $book->available_copies -= 1;
        $book->save(); // Save the updated book
        $userId = Auth::id();
        $borrowDate = Carbon::now();
        $dueDate = $borrowDate->copy()->addDays(7);        // Create a record in the 'borrows' table (assuming you have a 'borrows' table to track borrowing transactions)
        Checkout::create([
            'id_user' => $userId, // the user who is borrowing the book
            'id_book' => $book->id_book, // the borrowed book
            'borrow_date' => $borrowDate, // borrow date
            'due_date' => $dueDate
        ]);

        // Redirect with success message
        return redirect()->route('catalogue')->with('success', 'Book borrowed successfully!');
    } else {
        // If no available copies left
        return redirect()->route('catalogue')->with('error', 'No available copies left to borrow.');
    }
    
}

public function return(Request $request, $idCheck)
{
    $borrowedBook = Checkout::findOrFail($idCheck);
    // Calculate the fine if the book is overdue
    $fineAmount = 0;
    if (now()->greaterThan($borrowedBook->due_date) && $borrowedBook->status !== 'returned') {
        // Calculate overdue days
        $overdueDays = now()->diffInDays($borrowedBook->due_date);
        
        // Fine calculation: 1000 per day of overdue
        $fineAmount = $overdueDays * 1000;

        // Add the fine record
        Fines::create([
            'id_checkout' => $borrowedBook->id_checkout,
            'fine_amount' => $fineAmount,
            'status' => 'unpaid',  // Assuming 'unpaid' status for the fine
            'paid_date' => null,
        ]);
    }

    // Update the checkout record as returned
    $borrowedBook->status = 'returned';
    $borrowedBook->return_date = Carbon::now();
    $borrowedBook->save(); // Save the updated book checkout record

    // Fetch the book model
    $book = Books::findOrFail($borrowedBook->id_book);

    // Increment the available copies by 1
    $book->available_copies += 1;
    $book->save(); // Save the updated book record

    return redirect()->route('borrowed')->with('success', 'Book returned successfully!' . ($fineAmount > 0 ? " Fine of {$fineAmount} added." : ""));
}


public function edit(Request $request, $idEdit)
{
    $book = Books::findOrFail($idEdit);
    $book->title = $request->title;
    $book->author = $request->author;
    $book->summary = $request->summary;
    $book->save(); // Save the updated book record


    return redirect()->route('books.show', ['id' => $idEdit])
    ->with('success', 'Book updated successfully!');
}

public function delete(Request $request, $idDelete)
{
    $book = Books::findOrFail($idDelete);
    $book->status = '0';
    $book->save(); // Save the updated book record


    return redirect()->route('catalogue')->with('success', 'Book Deleted successfully!');
}

public function pay(Request $request, $idFines)
{
    $overdueBook = Fines::findOrFail($idFines);

   
    $overdueBook->status = 'paid';
    $overdueBook->paid_date = Carbon::now();
    $overdueBook->save(); // Save the updated book checkout record

    return redirect()->route('overdue')->with('success', 'Book Paid successfully!');
}
}


