<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Borrowed Books') }}
        </h2>
    </x-slot>

    <div class="py-12 lg:py-16">
        <div class="w-full mx-auto sm:px-6 lg:px-12 space-y-6">
            <div class="p-6 sm:p-10 lg:p-12 bg-white shadow sm:rounded-lg">

                <!-- Back Button -->
                <div class="mb-4">
                    <a href="{{ url()->previous() }}" class="btn btn-primary">
                        Back
                    </a>
                </div>

                <h3 class="mb-4 text-lg">Total Borrowed Books: {{ $countBorrowedBook }}</h3>

                @if($countBorrowedBook > 0)
                <table class="min-w-full table-auto">
                    <thead>
                        <tr>
                            <th class="px-4 py-2">ID</th>
                            <th class="px-4 py-2">Title</th>
                            <th class="px-4 py-2">Author</th>
                            <th class="px-4 py-2">Borrowed By</th>
                            <!-- Add more columns as needed -->
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($borrowedBooks as $book)
                        <tr>
                            <td class="border px-4 py-2">{{ $book->id }}</td>
                            <td class="border px-4 py-2">{{ $book->title }}</td>
                            <td class="border px-4 py-2">{{ $book->author }}</td>
                            <td class="border px-4 py-2">{{ $book->borrowed_by }}</td>
                            <!-- Add more data cells as needed -->
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @else
                <p class="text-gray-700">Currently, there are no borrowed books.</p>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>