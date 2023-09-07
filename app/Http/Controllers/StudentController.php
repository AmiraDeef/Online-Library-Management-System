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
        $borrowedBooks = auth()->user()->borrowedBooks;
        return view('dashboard', compact('borrowedBooks'));
    }
}
