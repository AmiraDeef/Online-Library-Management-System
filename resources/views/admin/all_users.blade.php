<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('All Students') }}
        </h2>
    </x-slot>

    <div class="py-12 lg:py-16">
        <div class="w-full mx-auto sm:px-6 lg:px-12">
            <div class="p-6 sm:p-10 lg:p-12 bg-white shadow sm:rounded-lg">
                <!-- Back Button -->
                <a href="/home" class="btn btn-primary mr-4">
                    Back
                </a>

                <!-- Student Count -->
                <div class="mb-6">
                    <h3 class="text-lg font-bold mb-3">Total Students: {{ $countUsers }}</h3>
                </div>

                <!-- Search Section -->
                <div class="mb-6">
                    <h3 class="text-center mb-4">Search student in details</h3>
                    <form action="{{ route('search.student') }}" method="post" class="d-flex justify-content-center align-items-center">
                        @csrf
                        <input type="text" name="student_id" placeholder="Enter Student ID" class="border rounded p-2 mr-2">
                        <button type="submit" class="btn btn-outline-info">Search</button>
                    </form>
                </div>

                <!-- Students Table -->
                <div class="mt-6">
                    @if(count($users) > 0)
                    <table class="table table-bordered table-hover">
                        <thead class="thead-light">
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @else
                    <p class="text-gray-700">There are currently no students registered.</p>
                    @endif
                </div>

            </div>
        </div>
    </div>
</x-app-layout>