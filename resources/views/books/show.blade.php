<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Books') }}
        </h2>
    </x-slot>

    <div class="py-12 lg:py-16">
        <div class="w-full mx-auto sm:px-6 lg:px-12 space-y-6">
            <div class="p-6 sm:p-10 lg:p-12 bg-white shadow sm:rounded-lg">

                <!-- Back Button -->
                <a href="{{ url()->previous() }}" class="btn btn-primary mr-4">
                    Back
                </a>


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

            </div>
        </div>
    </div>
</x-app-layout>