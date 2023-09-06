<div>
    <h3><a class="btn btn-secondary" href="/books/create">Add Book</a> </h3>
</div>

<table border=2 class="table table-striped">
    <tr>
        <th>ID</th>
        <th>Title</th>
        <th>Author</th>
        <th>Description</th>
        <th>Status</th>
        <th>Publication Date</th>
        <th>Created At</th>
        <th>Updated At</th>
        <th colspan="2">Actions</th>
    </tr>
    @foreach($books as $book)
    <tr>

        <td> {{ $book->id }} </td>
        <td> {{ $book->title }} </td>
        <td> {{ $book->author }} </td>
        <td> {{ $book->description }} </td>
        <td>
            @if($book->is_borrowed)
            Borrowed
            @else
            Available
            @endif
        </td>
        <td> {{ $book->publication_date }} </td>


        <td> {{ $book->created_at }} </td>
        <td> {{ $book->updated_at}} </td>



        @if(Auth::user()->usertype == 'student')
        <td><a class="btn btn-primary" href="/books/{{$book->id}}/view">View</a></td>

        @elseif(Auth::user()->usertype == 'admin')
        <td><a class="btn btn-primary" href="/books/{{$book->id}}/edit">Edit</a></td>
        <td>
            <form action="/books/{{$book->id}}" method="post">
                @csrf
                @method('delete')
                <input type="submit" class="btn btn-danger" value="Delete">
            </form>
        </td>
        @endif

    </tr>

    @endforeach
</table>