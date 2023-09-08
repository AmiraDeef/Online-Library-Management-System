<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Books') }}
        </h2>
    </x-slot>

    @if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <div class="py-12 lg:py-16">
        <div class="w-full mx-auto sm:px-6 lg:px-12 space-y-6">
            <div class="p-6 sm:p-10 lg:p-12 bg-white shadow sm:rounded-lg">

                <div class="mb-6 flex items-center space-x-10">
                    <!-- Back Button -->
                    <a href="/home" class="btn btn-primary mr-4">
                        Back
                    </a>

                    <!-- Add Book Button -->
                    @if(Auth::user()->usertype == 'admin')
                    <a href="{{ route('books.create')}}" class="btn btn-outline-primary">
                        Add Book
                    </a>
                    @endif
                </div>

                <table border=2 class="table table-striped">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Title</th>
                        <th scope="col">Author</th>
                        <th scope="col">Description</th>
                        <th scope="col">Status</th>
                        <th scope="col">Publication Date</th>
                        <th scope="col">Created At</th>
                        <th scope="col">Updated At</th>
                        <th scope="col" colspan="2">Actions</th>
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
                        <td><a class="btn btn-outline-primary" href="{{ route('books.show',$book->id) }}">View</a></td>

                        @if(!$book->is_borrowed)
                        <td>
                            <form method="post" action="{{ route('books.borrow', $book->id) }}">
                                @csrf
                                <button type="submit" class="btn btn-outline-secondary">Borrow</button>
                            </form>
                        </td>
                        @elseif($book->borrowed_by == Auth::id())
                        <td>
                            <form method="post" action="{{ route('books.returnBook', $book->id) }}">
                                @csrf
                                <button type="submit" class="btn btn-outline-success">Return</button>
                            </form>
                        </td>
                        @else
                        <td><button class="btn btn-outline-secondary" disabled title="This book is currently borrowed by another student.">Borrowed</button></td>
                        @endif
                        @elseif(Auth::user()->usertype == 'admin')
                        <td><a class="btn btn-outline-primary" href="{{ route('books.edit', $book->id) }}">Edit</a></td>
                        <td>
                            <form action="{{ route('books.destroy', $book->id) }}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-outline-danger">Delete</button>
                            </form>
                        </td>
                        @endif



                    </tr>

                    @endforeach
                </table>


            </div>
        </div>
    </div>
</x-app-layout>