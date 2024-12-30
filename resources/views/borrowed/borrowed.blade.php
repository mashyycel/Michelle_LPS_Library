@extends('layouts.app')

@section('content')
<h1>Borrowed Books</h1>
<table class="tableBooks">
    <thead>
        <tr>
            @if(Auth::check() && Auth::user()->user_type == 'staff')
                <th>Member Name</th>
            @endif
            <th>Book Title</th>
            <th>Borrowed Date</th>
            <th>Due Date</th>
            <th>Status</th>
            <th>Return Date</th>
            <th>Overdue</th>
            @if(Auth::check() && Auth::user()->user_type == 'staff')
                <th>Action</th>
            @endif
        </tr>
    </thead>
    <tbody>
        @foreach($borrowedBooks as $borrowedBook)
            <tr>
                @if(Auth::check() && Auth::user()->user_type == 'staff')
                    <td>{{ $borrowedBook->user->name }}</td>
                @endif
                <td> <a href="{{ route('books.show', $borrowedBook->id_book) }}">{{ $borrowedBook->books->title }}</a></td>
                <td>{{ $borrowedBook->borrow_date }}</td>
                <td>{{ $borrowedBook->due_date }}</td>
                <td>
                    {{ $borrowedBook->status }}
                </td>
                <td>
                    @if($borrowedBook->return_date)
                        {{ $borrowedBook->return_date}}
                    @else
                        <span class="text-muted">Not Returned</span>
                    @endif
                </td>
                <td>
                    @if(\Carbon\Carbon::parse($borrowedBook->due_date)->isPast())
                        <!-- Calculate the overdue days -->
                        {{ \Carbon\Carbon::parse($borrowedBook->due_date)->diffInDays(\Carbon\Carbon::now()) }} days overdue
                    @else
                        <span class="text-muted">Not Overdue</span>
                    @endif
                </td>
                @if(Auth::check() && Auth::user()->user_type == 'staff')
                    <td>
                        @if(!$borrowedBook->isReturned())
                            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#returnModal"
                                data-checkout-id="{{ $borrowedBook->id_checkout }}">
                                Return
                            </button>
                        @else
                            <span class="text-success">Returned</span>
                        @endif
                    </td>
                @endif
            </tr>
        @endforeach
    </tbody>
</table>
</div>

<!-- Modal for Returning a Book -->
@include('components.return-modal')
@endsection