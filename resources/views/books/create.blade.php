<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Books') }}
        </h2>
    </x-slot>

    <div class="py-12 lg:py-16">
        <div class="w-full mx-auto sm:px-6 lg:px-12 space-y-6">
            <div class="p-6 sm:p-10 lg:p-12 bg-white shadow sm:rounded-lg">
                <form method="POST" action="{{ route('books.store') }}">
                    @csrf
                    Title <input type="text" name="title" placeholder="Title"><br><br>
                    Author <input type="text" name="author" placeholder="author"><br><br>
                    Description <textarea name="description" id="description" rows="4" cols="50" placeholder="Description">{{ old('description') }}</textarea>
                    <br><br>
                    Publication Date <input type="date" name='publication_date' placeholder='publication_date'><br><br>

                    <input class="btn btn-outline-primary btn-lg" type="submit" value="add">


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