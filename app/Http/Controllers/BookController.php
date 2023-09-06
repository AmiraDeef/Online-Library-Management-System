<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::all();
        return view('books.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('books.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "title" => "required|unique:books|max:255",
            "author" => "required",

        ]);
        Book::create([
            'title' => $request->title,
            'author' => $request->author,
            'description' => $request->description,
            'publication_date' => $request->publication_date
            //'user_id' => Auth::id(),
        ]);

        return redirect(("/books"));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $book = Book::find($id);
        return view('books.show', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $book = Book::find($id);

        return view("books.edit", compact('book'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            "title" => "required|max:255",
            "author" => "required"


        ]);
        $book = Book::find($id);
        $book->title = $request->title;
        $book->author = $request->author;
        $book->description = $request->description;
        $book->publication_date = $request->publication_date;
        // $book->user_id = Auth::id();


        $book->save();
        return redirect("/books");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Book::destroy($id);
        return redirect('/books');
    }


    //to borrow book
    public function borrow(Book $book)
    {

        if ($book->is_borrowed) {
            return redirect()->back()->withErrors('This book is already borrowed.');
        }


        $book->borrowed_by = auth()->id();
        $book->borrowed_at = now();
        $book->is_borrowed = true;
        $book->save();

        return redirect()->back()->withSuccess('You have successfully borrowed the book.');
    }
    public function returnBook(Book $book)
    {
        if ($book->borrowed_by !== auth()->id()) {
            return redirect()->back()->with('error', 'You cannot return a book you didn\'t borrow.');
        }
        $book->returned_at = now();
        $book->borrowed_by = null;
        $book->is_borrowed = false;
        $book->borrowed_at = null;
        $book->save();
        return redirect()->route('books.index')->with('success', 'You have successfully returned the book.');
    }
}
