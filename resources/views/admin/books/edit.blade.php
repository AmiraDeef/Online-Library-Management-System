@extends('layouts.app')

@section('content')

<form method="post" action="/books/{{$book['id']}}">
    @csrf
    @method('PUT')
    Title <input type="text" name="title" value="{{$book['title']}}" placeholder="Title"><br><br>
    Author <input type="text" name="author" value="{{$book['author']}}" placeholder="author"><br><br>
    Description <textarea name="description" rows="2" placeholder="Description">{{ old('description', $book['description']) }}</textarea>
    <br><br>

    Publication Date <input type="date" name="publication_date" value="{{$book['publication_date']}}" placeholder="publication_date"><br><br>

    <input type="submit" value="update">

</form>
<ul>
    @foreach($errors->all() as $error)

    <li style="color:red"> {{$error}}</li>


    @endforeach


</ul>

@endsection