<?php

use App\Http\Middleware\IsLibrarian;
use App\Http\Middleware\Authenticate;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LibrarianController;

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
    Route::get('/home', [BookController::class, 'index']);
    // librerian
    Route::middleware([IsLibrarian::class])->group(function () {
        Route::get('/dashboard', [LibrarianController::class, 'index'])->name('dashboard');
        Route::get('/users', [LibrarianController::class, 'users'])->name('users');
        Route::get('/books', [LibrarianController::class, 'books'])->name('books');
        Route::get('/authors', [LibrarianController::class, 'author'])->name('author');
        Route::get('/users/{id}', [LibrarianController::class, 'user'])->name('user');
        Route::get('/books/{id}', [LibrarianController::class, 'book'])->name('book');
        Route::get('/authors/{id}', [LibrarianController::class, 'authors'])->name('authors');
        // Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        // Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });
});

require __DIR__.'/auth.php';
