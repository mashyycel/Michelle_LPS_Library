<?php

namespace App\Http\Controllers;

use App\Models\Books;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\Fines;


class OverdueController extends Controller
{
    public function index()
    {
        if (Auth::check() && Auth::user()->user_type == 'staff') {
            // If the user is staff, show all borrowed books (for all users)
            $overdueBooks = Fines::with(['checkout.books', 'checkout.user'])
                ->get();
        } else {
            // If the user is not staff, show only the borrowed books for the logged-in user
            $overdueBooks = Fines::with(['checkout.books', 'checkout.user'])
                ->whereHas('checkout', function ($query) {
                    $query->where('id_user', Auth::id()); // Filter by logged-in user's ID through the checkout relationship
                })
                ->get();
        }

        return view('overdue.index', compact('overdueBooks'));
    }

}


