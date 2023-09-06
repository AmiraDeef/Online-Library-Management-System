@extends('layouts.app')

@section('content')




<style>
    li span {
        font-weight: bold;
        color: #333;
        margin-right: 10px;

    }
</style>


<ul>
    <li>
        <span>no. </span> {{ $book->id }}
    </li>
    <li><span> Title </span> {{ $book->title }} </li>
    <li><span> author </span> {{ $book->author }} </li>
    <li><span> Description </span> {{ $book->description }} </li>
    <li> <span> Adding date </span> {{ $book->created_at }}</li>
    <li><span> updating date </span> {{ $book->updated_at}}</li>
    @if(!$book->borrowed_by)
    <li>
        <form method="post" action="{{ route('books.borrow', $book->id) }}">
            @csrf
            <input type="submit" value="Borrow" class="btn btn-primary">
        </form>
    </li>
    @elseif($book->borrowed_by == auth()->id())
    <li>
        <form method="post" action="{{ route('books.return', $book->id) }}">
            @csrf
            <input type="submit" value="Return this book" class="btn btn-warning">
        </form>
    </li>
    @else
    <li>
        <p>This book is currently borrowed by another student.</p>
    </li>
    @endif




</ul>
@endsection