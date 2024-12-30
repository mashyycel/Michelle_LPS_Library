<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Books;
use App\Models\Checkout;
use App\Models\Fines;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
       
            // Fetch all books from the view
            $books = Books::limit(5)->get();
            if (Auth::check() && Auth::user()->user_type == 'staff') {
                // If the user is staff, show all borrowed books (for all users)
                $borrowed = Checkout::with(['books', 'user']) // Eager load relationships
                ->orderBy('borrow_date', 'desc') // Then order by borrow date
                ->limit(5)
                ->get();   
                
                $overdue = Fines::with(['checkout.books', 'checkout.user'])
                ->limit(5)
                ->get();
            } else {
            // If the user is not staff, show only the borrowed books for the logged-in user
                $borrowed = Checkout::with(['books', 'user']) // Eager load relationships
                ->where('id_user', Auth::id()) // Filter by logged-in user's ID
                ->orderBy('status', 'desc') // Then order by borrow date
                ->limit(5)
                ->get();

                $overdue = Fines::with(['checkout.books', 'checkout.user'])
                ->whereHas('checkout', function ($query) {
                    $query->where('id_user', Auth::id()); // Filter by logged-in user's ID through the checkout relationship
                })
                ->limit(5)
                ->get();
            }

            // Pass books to the view
            return view('home', compact('books', 'borrowed', 'overdue'));
            
    }
}
