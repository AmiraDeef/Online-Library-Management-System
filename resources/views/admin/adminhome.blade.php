<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex">

            <!-- Sidebar -->
            <div class="w-1/4 bg-gray-300 p-6 rounded-lg shadow-sm">
                <h3 class="mb-6 font-bold text-xl border-b pb-2">Admin Actions:</h3>
                <ul class="list-disc pl-5">
                    <li class="my-2"><a class="btn btn-primary btn-block btn-sm" href="{{ route('borrowed.books') }}" class="hover:text-blue-500 transition ease-in-out duration-150">View Borrowed Books</a></li>
                    <li class="my-2"><a class="btn btn-primary btn-block btn-sm" href="{{ route('books.index') }}" class="hover:text-blue-500 transition ease-in-out duration-150">Manage Books</a></li>
                    <li class="my-2"><a class="btn btn-primary btn-block btn-sm" href="{{ route('all.users') }}" class="hover:text-blue-500 transition ease-in-out duration-150">Manage Users</a></li>
                </ul>
            </div>

            <!-- Main Content -->
            <div class="w-3/4 ml-8 bg-white p-6 overflow-hidden shadow-lg sm:rounded-lg">

                <!-- Centered Hello, User -->
                <div class="flex justify-center items-center h-24 bg-gray-100 rounded shadow-sm mb-4">
                    <h1 class="text-2xl font-semibold">Hello, {{ Auth::user()->name }}</h1>
                </div>

                <!-- Your provided div -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mt-4">
                    <div class="p-6 text-gray-900">
                        {{ __("You're logged in as Admin!") }}
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>