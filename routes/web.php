<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OverdueController;
use App\Http\Controllers\CatalogueController;
use App\Http\Controllers\BorrowedController;

use App\Http\Controllers\BookController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [CatalogueController::class, 'index'])->name('catalogue');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->middleware('auth')->name('home');
Route::get('/catalogue', [CatalogueController::class, 'index'])->name('catalogue');
Route::get('/borrowed', [BorrowedController::class, 'index'])->name('borrowed');
Route::get('/books/{id}', [BookController::class, 'show'])->name('books.show');

Route::get('/add-book', [CatalogueController::class, 'create'])->name('add.book');
Route::post('/catalogue', [CatalogueController::class, 'store'])->name('catalogue.store');


Route::post('/borrow/{id}', [BookController::class, 'borrow'])->name('books.borrow');
Route::post('/return/{idCheck}', [BookController::class, 'return'])->name('books.return');
Route::post('/edit/{idEdit}', [BookController::class, 'edit'])->name('books.edit');
Route::post('/pay/{idFines}', [BookController::class, 'pay'])->name('books.pay');

Route::post('/delete/{idDelete}', [BookController::class, 'delete'])->name('books.delete');

Route::get('/overdue', [OverdueController::class, 'index'])->name('overdue');
