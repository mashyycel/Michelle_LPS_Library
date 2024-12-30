
@extends('layouts.app')

@section('title', 'Catalogue')

@section('content')
<div class="row d-flex justify-content-between align-items-center mb-3">
    <div class="col-md-6 d-flex align-items-center">
        <h1>Books List

        @if(Auth::check() && Auth::user()->user_type == 'staff')
        <a href="{{ route('add.book') }}">
            <button class="btn btn-primary">
                <i class="bi bi-plus-circle"></i> Create New Book
            </button>
        </a>
        @endif
        </h1>
    </div>

    <!-- Start of form on the same row -->
    <div class="col-md-6 ms-auto">
        <form action="{{ route('catalogue') }}" method="GET">
            <div class="row ms-auto">
                <!-- Combined Title and Author Search -->
                <div class="col-md-7 ms-auto d-flex">
                    <input type="text" class="form-control" name="search" placeholder="Search by Title or Author" value="{{ request('search') }}">
                </div>

                <!-- Status Filter -->
                <div class="col-md-3 ms-auto" style="margin-left: -15px;">
                    <select class="form-control" name="status">
                        <option value="Available" {{ request('status') == 'Available' ? 'selected' : '' }}>Available</option>
                        <option value="Unavailable" {{ request('status') == 'Unavailable' ? 'selected' : '' }}>Unavailable</option>
                    </select>
                </div>

                <!-- Apply Filter and Clear Filter Buttons -->
                <div class="col-md-2 ms-auto d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary">Filter</button>
                    <a href="{{ route('catalogue') }}" class="btn btn-secondary ms-2">Clear</a>
                </div>
            </div>
        </form>
    </div>
</div>

    <div class="row">
        @foreach ($books as $book)
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="{{ asset('images/' . $book->image) }}" class="card-img-top" alt="Book Image" style="height: 400px;">
                    <div class="card-body">
                        <h5 class="card-title">
                            <a href="{{ route('books.show', $book->id_book) }}">{{ $book->title }}</a>
                        </h5>
                        <p class="card-text"><strong>by</strong> {{ $book->author }}</p>
                        <p class="card-text"><strong>Published Year:</strong> {{ $book->published_year }}</p>
                        <p class="card-text">
                            @if($book->available_copies > 0)
                                <span class="text-success">Available</span>
                            @else
                                <span class="text-danger">Unavailable</span>
                            @endif
                        </p>
                        <a class="btn btn-primary"href="{{ route('books.show', $book->id_book) }}">View</a>
                        @if($book->available_copies > 0)
                            @if(Auth::check())
                                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#borrowModal" data-book-id="{{ $book->id_book }}" data-book-title="{{ $book->title }}">
                                    Borrow
                                </button>
                            @else
                                <button class="btn btn-primary" onclick="window.location.href='{{ route('login') }}'">Login to Borrow</button>
                            @endif
                        @else
                            <button class="btn btn-secondary" disabled>Out of Copies</button>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <div class="pagination-wrapper mt-3">
        {{ $books->links('vendor.pagination.bootstrap-5') }}
    </div>




    <!-- Borrow Confirmation Modal -->
    @include('components.borrow-modal')

@endsection
