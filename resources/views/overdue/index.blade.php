@extends('layouts.app')

@section('content')
    <h1>Overdue Books</h1>
    <table class="tableBooks">
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
            @foreach($overdueBooks as $overdue)
                <tr>
                @if(Auth::check() && Auth::user()->user_type == 'staff')
                    <td>{{ $overdue->checkout->user->name }}</td>
                @endif
                <td>
                            <a href="{{ route('books.show', $overdue->checkout->id_book) }}">
                                            {{ $overdue->checkout->books->title}}
                                        </a></td>
                   
                    <td>{{ $overdue->checkout->due_date }}</td>
                    
                    <td>{{ $overdue->checkout->return_date }}</td>
                    <td>
                       
                            {{ \Carbon\Carbon::parse($overdue->checkout->due_date)->diffInDays(\Carbon\Carbon::now()) }} days overdue
                       
                    </td>
                    <td>
                    {{ $overdue->fine_amount }}
                    </td>
                    <td>
                    {{ $overdue->status }}</td>
                    @if(Auth::check() && Auth::user()->user_type == 'staff')

                    <td>
                        @if(!$overdue->isPaid())
                            

                            <button class="btn btn-primary" 
                                data-bs-toggle="modal" 
                                data-bs-target="#payModal" 
                                data-fine-id="{{ $overdue->id_fine }}" >
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


@include('components.pay-modal')


@endsection