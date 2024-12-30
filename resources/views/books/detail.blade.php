@extends('layouts.app')

@section('content')
<div><a>
    <a href="{{ route('catalogue') }}">< Back to Catalogue</a>
</a></div>
<div class="row">
        <div class="col-md-6">
        <h2>{{ $book->title }}</h2>
        <div><strong>Author:</strong> {{ $book->author }}</div>
        <div><strong>Published Year:</strong> {{ $book->published_year }}</div>
        <div><strong>Genre:</strong> {{ $book->genre }}</div>
        </div>
        <div class="col-md-6 text-end">
    <img src="{{ asset('images/' . $book->image) }}" alt="Book Image" width="150" height="200" class="mb-3">

    <div>
        @if(Auth::check() && Auth::user()->user_type == 'staff')
        <button class="btn btn-sm btn-primary mb-2" 
                data-bs-toggle="modal" 
                data-bs-target="#editModal" 
                data-book-id="{{ $book->id_book }}" 
                data-book-title="{{ $book->title }}" 
                data-book-author="{{ $book->author }}"
                data-book-summary="{{ $book->summary }}">
            <i class="bi bi-pencil-fill"></i> Edit
        </button>
        <button class="btn btn-sm btn-danger mb-2 ms-2" 
                data-bs-toggle="modal" 
                data-bs-target="#deleteModal" 
                data-book-id="{{ $book->id_book }}" 
                data-book-title="{{ $book->title }}">
            <i class="bi bi-trash-fill"></i> Delete
        </button>
           
        @endif
        </div>
        </div>

    <!-- Tab Navigation -->
<ul class="nav nav-tabs mt-3" id="myTab" role="tablist">
    <li class="nav-item" role="presentation">
        <a class="nav-link active" id="holdings-tab" data-bs-toggle="tab" href="#holdings" role="tab" aria-controls="holdings" aria-selected="true">Holdings</a>
    </li>
    <li class="nav-item" role="presentation">
        <a class="nav-link" id="detail-tab" data-bs-toggle="tab" href="#detail" role="tab" aria-controls="detail" aria-selected="false">Detail</a>
    </li>
</ul>

<!-- Tab Content -->
<div class="tab-content mt-2" id="myTabContent">
    <!-- Holdings Tab -->
    <div class="tab-pane fade show active" id="holdings" role="tabpanel" aria-labelledby="holdings-tab">
    <table class="table table-bordered mt-3">
        <thead>
            <tr>
                <th>Total Copies</th>
                <th>Available Copies</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $book->total_copies }}</td>
                <td>{{ $book->available_copies }}</td>
                @if ($book->available_copies > 0)  
                <td>Available</td>
        <td>
        <button class="btn btn-primary" 
                data-bs-toggle="modal" 
                data-bs-target="#borrowModal" 
                data-book-id="{{ $book->id_book }}" 
                data-book-title="{{ $book->title }}">
            Borrow
        </button></td>
    @else
    <td>Unavailable</td>

       <td><button class="btn btn-secondary" disabled>Out of Copies</button></td>
    @endif
            </tr>
        </tbody>
    </table>
   

</div>
    <!-- Detail Tab -->
    <div class="tab-pane fade" id="detail" role="tabpanel" aria-labelledby="detail-tab">
    <table class="table table-bordered">
    <tbody>
        <tr>
            <th>Summary</th>
            <td>{{ $book->summary }}</td>
        </tr>
        <tr>
            <th>Physical Description</th>
            <td>{{ $book->physical_description }}</td>
        </tr>
        <tr>
            <th>ISBN</th>
            <td>{{ $book->isbn }}</td>
        </tr>
        <tr>
            <th>Language</th>
            <td>{{ $book->language }}</td>
        </tr>
        <tr>
            <th>Other Title</th>
            <td>{{ $book->other_title }}</td>
        </tr>
    </tbody>
</table>

    </div>
</div>

@include('components.borrow-modal')
@include('components.edit-modal')
@include('components.delete-modal')
@endsection

