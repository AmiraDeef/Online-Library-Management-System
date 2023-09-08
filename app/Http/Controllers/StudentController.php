<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function dashboard()
    {
        $user = auth()->user();
        $borrowedBooks = Book::where('borrowed_by', $user->id)->get();

        return view('dashboard', [
            'borrowedBooks' => $borrowedBooks,
            'countUserBook' => $borrowedBooks->count(),
        ]);
    }
}
