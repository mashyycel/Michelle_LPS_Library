@extends('layouts.app')

@section('content')

<div class="row align-items-center justify-content-between" style="padding-bottom:20px">
    <div class="col-lg-6 boxHome" style="width: 49% !important">
        <div class="dashboard-table table-responsive">
            <div class="d-flex justify-content-between align-items-center">
                <h2 class="dashboardTableTitle">Books Borrowed</h2>
                <a href="{{ route('borrowed') }}" class="btn btn-link">
                <i class="bi bi-box-arrow-up-right"></i> 
                </a>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        @if(Auth::check() && Auth::user()->user_type == 'staff')
                            <th>Member Name</th>
                        @endif
                        <th>Title</th>
                        <th>Borrow Date</th>
                        <th>Due Date</th>
                        @if(Auth::check() && Auth::user()->user_type == 'staff')
                            <th>Action</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @foreach ($borrowed as $book)
                        <tr>
                            <td>{{ $book->id_checkout }}</td>
                            @if(Auth::check() && Auth::user()->user_type == 'staff')
                                <td>{{ $book->user->name }}</td>
                            @endif
                            <td>
                                <a href="{{ route('books.show', $book->id_book) }}">
                                    {{ $book->books->title }}
                                </a>
                            </td>
                            <td>
                                {{ $book->borrow_date }}
                            </td>
                            <td>
                                {{ $book->due_date }}
                            </td>
                            @if(Auth::check() && Auth::user()->user_type == 'staff')

                                <td>
                                    @if(!$book->isReturned())


                                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#returnModal"
                                            data-checkout-id="{{ $book->id_checkout }}">
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
    </div>
    <div class="col-lg-6 boxHome" style="width: 49% !important">
        <div class="dashboard-table table-responsive">
            <div class="d-flex justify-content-between align-items-center">
                <h2 class="dashboardTableTitle">Books List</h2>
                <a href="{{ route('catalogue') }}" class="btn btn-link">
                <i class="bi bi-box-arrow-up-right"></i> 
                </a>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Author</th>
                        <th>Available Copies</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($books as $book)
                        <tr>
                            <td>{{ $book->id_book }}</td>
                            <td>
                                <a href="{{ route('books.show', $book->id_book) }}">
                                    {{ $book->title }}
                                </a>
                            </td>
                            <td>{{ $book->author }}</td>
                            <td>
                                {{ $book->available_copies }}
                            </td>
                            <td>
                                @if($book->available_copies > 0)
                                    <!-- Borrow Button -->
                                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#borrowModal"
                                        data-book-id="{{ $book->id_book }}" data-book-title="{{ $book->title }}">
                                        Borrow
                                    </button>
                                @else
                                    <button class="btn btn-secondary" disabled>Out of Stock</button>
                                @endif
                                @if(Auth::check() && Auth::user()->user_type == 'staff')
                                    <button class="btn btn-sm btn-primary mb-2" 
                                            data-bs-toggle="modal" 
                                            data-bs-target="#editModal" 
                                            data-book-id="{{ $book->id_book }}" 
                                            data-book-title="{{ $book->title }}" 
                                            data-book-author="{{ $book->author }}"
                                            data-book-summary="{{ $book->summary }}">
                                        <i class="bi bi-pencil-fill"></i>
                                    </button>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>



        </div>
    </div>

</div>

<div class="row align-items-center equal-height">
    <div class="col-md-12 boxHome">
        <div class="dashboard-table table-responsive">
            <div class="d-flex justify-content-between align-items-center">
                <h2 class="dashboardTableTitle">Overdue Books</h2>
                <a href="{{ route('overdue') }}" class="btn btn-link">
                <i class="bi bi-box-arrow-up-right"></i> 
                </a>
            </div>
        <table class="table">
            <thead>
                <tr>
                    @if(Auth::check() && Auth::user()->user_type == 'staff')
                        <th>Member Name</th>
                    @endif
                    <th>Book Title</th>
                    <th>Due Date</th>
                    <th>Return Date</th>
                    <th>Overdue</th>
                    <th>Fine Amount</th>
                    <th>Status</th>

                    @if(Auth::check() && Auth::user()->user_type == 'staff')

                        <th>Action</th>
                    @endif
                </tr>
            </thead>
            <tbody>
                @foreach($overdue as $fine)
                    <tr>
                        @if(Auth::check() && Auth::user()->user_type == 'staff')
                            <td>{{ $fine->checkout->user->name }}</td>
                        @endif
                        <td>
                            <a href="{{ route('books.show', $fine->checkout->id_book) }}">
                                {{ $fine->checkout->books->title}}
                            </a>
                        </td>
                        <td>{{ $fine->checkout->due_date }}</td>

                        <td>{{ $fine->checkout->return_date }}</td>
                        <td>

                            {{ \Carbon\Carbon::parse($fine->checkout->due_date)->diffInDays(\Carbon\Carbon::now()) }} days
                            overdue

                        </td>
                        <td>
                            {{ $fine->fine_amount }}
                        </td>
                        <td>
                            {{ $fine->status }}
                        </td>
                        @if(Auth::check() && Auth::user()->user_type == 'staff')

                            <td>
                                @if(!$fine->isPaid())


                                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#payModal"
                                        data-fine-id="{{ $fine->id_fine }}">
                                        Pay Fine
                                    </button>
                                @else
                                    <span class="text-success">Paid</span>
                                @endif
                            </td>
                        @endif
                    </tr>
                @endforeach
            </tbody>
        </table>


    </div>
</div>
</div>

@include('components.borrow-modal')
@include('components.return-modal')
@include('components.pay-modal')
@include('components.edit-modal')
@endsection