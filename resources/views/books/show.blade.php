<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Book Details') }}
        </h2>
    </x-slot>

    <div class="py-12 lg:py-16">
        <div class="w-full mx-auto sm:px-6 lg:px-12 space-y-6">
            <div class="p-6 sm:p-10 lg:p-12 bg-white shadow sm:rounded-lg">

                <!-- Back Button -->
                <div class="mb-6">
                    <a href="/books" class="btn btn-primary">
                        <i class="fas fa-arrow-left"></i> Back
                    </a>
                </div>

                <ul class="list-disc pl-5 space-y-2">
                    <li>
                        <strong>No:</strong> {{ $book->id }}
                    </li>
                    <li>
                        <strong>Title:</strong> {{ $book->title }}
                    </li>
                    <li>
                        <strong>Author:</strong> {{ $book->author }}
                    </li>
                    <li>
                        <strong>Description:</strong> {{ $book->description }}
                    </li>
                    <li>
                        <strong>Added Date:</strong> {{ $book->created_at->format('d M, Y') }}
                    </li>
                    <li>
                        <strong>Updated Date:</strong> {{ $book->updated_at->format('d M, Y') }}
                    </li>
                    @if(!$book->borrowed_by)
                    <li>
                        <form method="post" action="{{ route('books.borrow', $book->id) }}" class="mt-4">
                            @csrf
                            <button type="submit" class="btn btn-outline-primary px-4 py-2">
                                <i class="fas fa-book-reader"></i> Borrow
                            </button>
                        </form>
                    </li>
                    @elseif($book->borrowed_by == auth()->id())
                    <li>
                        <form method="post" action="{{ route('books.returnBook', $book->id) }}" class="mt-4">
                            @csrf
                            <button type="submit" class="btn btn-warning px-4 py-2">
                                <i class="fas fa-undo-alt"></i> Return this book
                            </button>
                        </form>
                    </li>
                    @else
                    <li>
                        <p class="text-red-600">This book is currently borrowed by another student.</p>
                    </li>
                    @endif
                </ul>

            </div>
        </div>
    </div>
</x-app-layout>