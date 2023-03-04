<?php

use App\Http\Controllers\AuthorController;
use App\Http\Middleware\IsLibrarian;
use App\Http\Middleware\Authenticate;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LibrarianController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\IsReader;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


// reader
Route::middleware([Authenticate::class])->group(function () {
    Route::get('/home', [BookController::class, 'home'])->name('home');
    // librerian
    Route::middleware([IsLibrarian::class])->group(function () {
        Route::get('/dashboard', [LibrarianController::class, 'index'])->name('dashboard');
        Route::get('/users', [LibrarianController::class, 'users'])->name('users');
        Route::get('/books', [LibrarianController::class, 'books'])->name('books');
        Route::get('/booksdt', [LibrarianController::class, 'booksdt'])->name('booksdt');
        Route::get('/authors', [LibrarianController::class, 'author'])->name('author');
        Route::get('/users/{id}', [LibrarianController::class, 'user'])->name('user');


        Route::get('/books/{book}', [BookController::class, 'show'])->name('books.show');
        Route::get('/books/create', [BookController::class, 'create'])->name('books.create');
        Route::post('/books/store', [BookController::class, 'store'])->name('books.store');
        Route::get('/books/{book}', [BookController::class, 'edit'])->name('books.edit');
        Route::put('/books/{book}', [BookController::class, 'update'])->name('books.update');
        Route::post('/books/{book}', [BookController::class, 'destroy'])->name('books.delete');

        // Route::get('/authors/{id}', [LibrarianController::class, 'authors'])->name('authors');
        // Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        // Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });
});

require __DIR__.'/auth.php';
