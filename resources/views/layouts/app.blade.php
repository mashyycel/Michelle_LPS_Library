<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- Noty CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/noty/3.2.0-beta/noty.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/noty/3.2.0-beta/themes/metroui.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <!-- Noty JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/noty/3.2.0-beta/noty.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>

    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm" style="padding-left:20px;padding-right:20px">
                <div class="col-md-6">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                </div>
                <div class="col-md-6">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('home') }}">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('catalogue') }}">Catalogue</a>
                            </li>
                            <li class="nav-item">
                            <a class="nav-link" href="{{ route('borrowed') }}">
                                <i class="bi bi-card-list"></i> Borrowed Books
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route(name: 'overdue') }}">
                                <i class="bi bi-card-list"></i> Overdue Books
                            </a>
                        </li>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>

                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
                </div>
            
        </nav>

        <main class="py-4" style="padding:20px">
            @yield('content')
        </main>
    </div>

    
</body>
 <script>
        document.addEventListener('DOMContentLoaded', () => {

            //borrow modal
            const borrowButtons = document.querySelectorAll('[data-bs-toggle="modal"]');
            const borrowForm = document.getElementById('borrow-form');
            const bookTitleElement = document.getElementById('book-title');
            const bookIdInput = document.getElementById('book-id');
            const confirmBorrowButton = document.getElementById('confirm-borrow');
            borrowButtons.forEach(button => {
                button.addEventListener('click', function () {
                    const bookId = this.getAttribute('data-book-id');
                    const bookTitle = this.getAttribute('data-book-title');

                    // Update modal content
                    bookTitleElement.textContent = bookTitle;
                    bookIdInput.value = bookId;

                    // Update form action URL
                    borrowForm.action = "{{ route('books.borrow', ':id') }}".replace(':id', bookId);
                });
            });

            //return modal
            const returnButtons =  document.querySelectorAll('[data-bs-toggle="modal"]');
            const returnForm = document.getElementById('return-form');
            const checkoutIdInput = document.getElementById('checkout-id');

            returnButtons.forEach(button => {
                button.addEventListener('click', function () {
                    const checkoutId = this.getAttribute('data-checkout-id');

                    checkoutIdInput.value = checkoutId;
                    returnForm.action = "{{ route('books.return', ':id') }}".replace(':id', checkoutId);

                });
            });

             //pay modal
            const payButtons =  document.querySelectorAll('[data-bs-toggle="modal"]');
            const payForm = document.getElementById('pay-form');
            const fineIdInput = document.getElementById('fine-id');

            payButtons.forEach(button => {
                button.addEventListener('click', function () {
                    const fineId = this.getAttribute('data-fine-id');

                    fineIdInput.value = fineId;
                    payForm.action = "{{ route('books.pay', ':id') }}".replace(':id', fineId);

                });
            });

            //edit modal
            const editButtons = document.querySelectorAll('[data-bs-toggle="modal"]');
            const editBookForm = document.getElementById('editBookForm');
            const editBookIdInput = document.getElementById('editBookId');
            const editBookTitleInput = document.getElementById('editBookTitle');
            const editBookAuthorInput = document.getElementById('editBookAuthor');
            const editBookSummaryInput = document.getElementById('editBookSummary');


            editButtons.forEach(button => {
                button.addEventListener('click', function () {
                    const bookId = this.getAttribute('data-book-id');
                    const bookTitle = this.getAttribute('data-book-title');
                    const bookAuthor = this.getAttribute('data-book-author');
                    const bookSummary = this.getAttribute('data-book-summary');

                    editBookIdInput.value = bookId;
                    editBookTitleInput.value = bookTitle;
                    editBookAuthorInput.value = bookAuthor;
                    editBookSummaryInput.textContent = bookSummary;

                    editBookForm.action = "{{ route('books.edit', ':id') }}".replace(':id', bookId);

                });
            });

            //delete modal
            const deleteButtons = document.querySelectorAll('[data-bs-toggle="modal"]');
            const deleteBookForm = document.getElementById('deleteBookForm');
            const deleteBookIdInput = document.getElementById('deleteBookId');
            const deleteBookTitleInput = document.getElementById('book-title');

            deleteButtons.forEach(button => {
                button.addEventListener('click', function () {
                    const bookId = this.getAttribute('data-book-id');
                    const bookTitle = this.getAttribute('data-book-title');

                    deleteBookIdInput.value = bookId;
                    deleteBookTitleInput.textContent = bookTitle;

                    deleteBookForm.action = "{{ route('books.delete', ':id') }}".replace(':id', bookId);

                });
            });
        });

         $(document).ready(function() {
    $('.tableBooks').DataTable({
        paging: true,  
        searching: true,  
        ordering: true, 
        order: [[1, 'asc']],  
    });

    $(document).ready(function() {
    $('#booksTable').DataTable({
        paging: true,
         pageLength: 9,          
        searching: true,       
    });
});

});
    </script>

@if (session('success'))
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            new Noty({
                type: 'success',
                text: '{{ session('success') }}',
                timeout: 3000,
                layout: 'top',  
                theme: 'custom',                  
            }).show();
        });
    </script>
    @elseif (session('error'))
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            new Noty({
                type: 'error',
                text: '{{ session('success') }}',
                timeout: 3000,
                layout: 'top',  
                theme: 'custom',          
            }).show();
        });
    </script>
@endif
</html>
