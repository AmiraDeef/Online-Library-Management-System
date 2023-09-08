<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex">

            <!-- Sidebar -->
            <div class="bg-gray-300 w-1/4 p-6 rounded-lg shadow-sm mr-4">
                <h3 class="mb-6 font-bold text-xl border-b pb-2 text-gray-700">Student Nook</h3>
                <ul class="list-none">
                    <li class="my-2">
                        <a href="/dashboard" class="btn btn-outline-secondary w-48 block text-center">
                            Your Borrowed Books
                        </a>
                    </li>
                    <li class="my-2">
                        <a href="/books" class="btn btn-outline-secondary w-48 block text-center">
                            All Books
                        </a>
                    </li>
                    <li class="my-2">
                        <a href="/profile" class="btn btn-outline-secondary w-48 block text-center">
                            Your Profile
                        </a>
                    </li>
                </ul>
            </div>


            <!-- Main Content -->
            <div class="flex-1 bg-white p-6 rounded-lg shadow-sm">
                <div class="flex justify-center items-center h-24 bg-gray-100 rounded mb-4">
                    <h1 class="text-2xl font-semibold">Welcome to our Library, {{ Auth::user()->name }}</h1>
                </div>
                @if(Auth::user()->usertype == 'student')
                <div class="bg-blue-100 p-4 rounded mb-4">
                    You have borrowed {{ $countUserBook }} out of a maximum of 5 books.
                </div>
                @endif
                <h3 class="font-bold mb-4">Your Borrowed Books</h3>
                <table class="table table-bordered w-full">
                    <thead>
                        <tr>
                            <th class="px-4 py-2">Book Title</th>
                            <th class="px-4 py-2">Author</th>
                            <th class="px-4 py-2">Borrow Date</th>
                            <th class="px-4 py-2">Return Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($borrowedBooks && $borrowedBooks->count() > 0)
                        @foreach( $borrowedBooks as $book)
                        <tr>
                            <td class="border px-4 py-2">{{ $book->title }}</td>
                            <td class="border px-4 py-2">{{ $book->author }}</td>
                            <td class="border px-4 py-2">{{ $book->borrowed_at }}</td>
                            <td class="border px-4 py-2">{{ $book->due_date }}</td>
                        </tr>
                        @endforeach
                        @else
                        <tr>
                            <td colspan="4" class="text-center border px-4 py-2">You haven't borrowed any books.</td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>