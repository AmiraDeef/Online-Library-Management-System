@extends('layouts.app')

@section('content')
<form method="post" action="/books">
    @csrf
    Title <input type="text" name="title" placeholder="Title"><br><br>
    Author <input type="text" name="author" placeholder="author"><br><br>
    Description <textarea name="description" id="description" rows="4" cols="50" placeholder="Description">{{ old('description') }}</textarea>
    <br><br>
    Publication Date <input type="date" name='publication_date' placeholder='publication_date'><br><br>

    <input type="submit" value="add">

</form>
<ul>
    @foreach($errors->all() as $error)

    <li style="color:red"> {{$error}}</li>


    @endforeach


</ul>
@endsection