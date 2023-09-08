<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\BookController;
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


Route::middleware(['auth'])->group(function () {
    Route::get('home', [HomeController::class, 'index'])->name('home');
    Route::get('dashboard', [StudentController::class, 'dashboard'])->name('student.dashboard');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('books', [BookController::class, 'index'])->name('books.index');
    Route::get('books/{book}', [BookController::class, 'show'])->name('books.show');
    Route::post('books/borrow/{book}', [BookController::class, 'borrow'])->name('books.borrow');
    Route::post('books/return/{book}', [BookController::class, 'returnBook'])->name('books.returnBook');
});


Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::get('books/borrowed', [BookController::class, 'borrowed_Books'])->name('borrowed.books');
    Route::resource('books', BookController::class)->except(['index', 'show']);
    Route::get('post', [HomeController::class, 'post']);
    Route::match(['get', 'post'], 'search-student', [AdminController::class, 'searchStudent'])->name('search.student');
    Route::get('users/all', [AdminController::class, 'allUsers'])->name('all.users');
});
