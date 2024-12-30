<?php

namespace App\Http\Controllers;

use App\Models\Books;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\Checkout;


class BorrowedController extends Controller
{
    public function index()
    {
        if (Auth::check() && Auth::user()->user_type == 'staff') {
            // If the user is staff, show all borrowed books (for all users)
            $borrowedBooks = Checkout::with(['books', 'user']) // Eager load relationships
            ->orderBy('borrow_date', 'desc') // Then order by borrow date
            ->get();        
        } else {
            // If the user is not staff, show only the borrowed books for the logged-in user
            $borrowedBooks = Checkout::with(['books', 'user']) // Eager load relationships
            ->where('id_user', Auth::id()) // Filter by logged-in user's ID
            ->orderBy('status', 'desc') // Then order by borrow date
            ->get();
        }
        
    // Loop through each borrowed book and check if it's overdue
        foreach ($borrowedBooks as $borrowedBook) {
            if (now()->greaterThan($borrowedBook->due_date) && $borrowedBook->status !== 'returned') {
                // If the current date is past the due date and the book is not already returned
                $borrowedBook->update(['status' => 'overdue']);
            }
        }

        return view('borrowed.borrowed', compact('borrowedBooks'));
    }

}


