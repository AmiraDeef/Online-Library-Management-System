<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\StudentController;
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

// Admin specific routes
Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::get('books/borrowed', [BookController::class, 'borrowed_Books'])->name('borrowed.books');
    Route::resource('books', BookController::class)->except(['index', 'show']);
    Route::get('post', [HomeController::class, 'post']);
    Route::match(['get', 'post'], 'search-student', [AdminController::class, 'searchStudent'])->name('search.student');
    Route::get('users/all', [AdminController::class, 'allUsers'])->name('all.users');
});

// Route::middleware(['auth'])->group(function () {
//     Route::get('books/borrowed', [BookController::class, 'borrowed_Books'])->name('borrowed.books')->middleware('admin');

//     Route::get('home', [HomeController::class, 'index'])->name('home');
//     Route::get('dashboard', [StudentController::class, 'dashboard'])->name('student.dashboard'); //stu dashboard and all borrowed books



//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');



//     Route::get('books', [BookController::class, 'index'])->name('books.index');
//     Route::get('books/{book}', [BookController::class, 'show'])->name('books.show'); // view book details
//     Route::post('books/borrow/{book}', [BookController::class, 'borrow'])->name('books.borrow'); // borrowing a book
//     Route::post('books/return/{book}', [BookController::class, 'returnBook'])->name('books.returnBook'); // return a book

//     Route::middleware(['admin'])->group(function () {

//         Route::get('books/create', [BookController::class, 'create'])->name('books.create')->middleware('admin');
//         Route::resource('books', BookController::class)->except(['index', 'show', 'create']);

//         Route::get('post', [HomeController::class, 'post']);
//         Route::match(['get', 'post'], '/admin/search-student', [AdminController::class, 'searchStudent'])->name('search.student');
//         Route::get('users/all', [AdminController::class, 'allUsers'])->name('all.users');
//     });
// });






// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');


// Route::get('home', [HomeController::class, 'index'])->middleware('auth')->name('home');


// Route::resource('books', BookController::class)->middleware('auth')->middleware(['auth', 'admin']);

// route::get('post', [HomeController::class, 'post'])->middleware(['auth', 'admin']);

// Route::middleware('auth')->group(function () {
//     // Route::get('books', [BookController::class, 'index']);
//     // Route::resource('books', BookController::class);
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

require __DIR__ . '/auth.php';
