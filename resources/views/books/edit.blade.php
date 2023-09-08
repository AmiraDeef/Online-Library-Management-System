<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Books') }}
        </h2>
    </x-slot>

    <div class="py-12 lg:py-16">
        <div class="w-full mx-auto sm:px-6 lg:px-12 space-y-6">
            <div class="p-6 sm:p-10 lg:p-12 bg-white shadow sm:rounded-lg">

                <form method="post" action="{{ route('books.update', ['book' => $book['id']]) }}">
                    @csrf
                    @method('PUT')
                    Title <input type="text" name="title" value="{{$book['title']}}" placeholder="Title"><br><br>
                    Author <input type="text" name="author" value="{{$book['author']}}" placeholder="author"><br><br>
                    Description <textarea name="description" rows="2" placeholder="Description">{{ old('description', $book['description']) }}</textarea>
                    <br><br>

                    Publication Date <input type="date" name="publication_date" value="{{$book['publication_date']}}" placeholder="publication_date"><br><br>

                    <input type="submit" class="btn btn-outline-primary btn-lg" value="update">

                </form>
                <ul>
                    @foreach($errors->all() as $error)

                    <li style="color:red"> {{$error}}</li>


                    @endforeach


                </ul>




            </div>
        </div>
    </div>
</x-app-layout>