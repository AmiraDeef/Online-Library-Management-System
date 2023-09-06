<?php


// app/Http/Controllers/AdminController.php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function allUsers()
    {
        $users = User::where('usertype', 'student')->get();
        $countUsers = User::where('usertype', 'student')->count();
        return view('admin.all_users', compact('users', 'countUsers'));
    }

    public function searchStudent(Request $request)
    {
        $request->validate([
            'student_id' => 'required|integer'
        ]);

        $student = User::find($request->student_id);

        if (!$student) {
            return redirect()->back()->with('error', 'No student found with the given ID.');
        }

        return view('admin.user_detail', compact('student'));
    }
}
