@extends('layouts.layout')


@section('content')
    <div class="w-full flex justify-center" style="height: 1200px">
        <div class="w-full max-w-xs mt-10 ">
            <form class="bg-white shadow-md rounded w-96 px-8 pt-6 pb-8 mb-4" method="post"
                action="{{ route('dashboard.admin.category.store') }}" enctype="multipart/form-data">
                @csrf

                <div class="mb-4">
                    <label for="img">
                        @if (Auth::user()->getMedia()->count() > 0)
                            <img src="{{ Auth::user()->getMedia()[0]->getUrl() }}" alt="img-user" class=" rounded-full ">
                        @else
                            <img class="rounded-t-lg" src="{{ asset('image/user-profile.svg ') }}" alt="" />
                        @endif

                    </label>
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="first_name">
                        upload image
                    </label>
                    <input type="file" name="" id="img">
                    @error('first_name')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4">

                    <label class="block text-gray-700 text-sm font-bold mb-2" for="first_name">
                        First Name
                    </label>
                    <input
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="first_name" name="category_name" type="text" value="{{ old('first_name') }}"
                        placeholder="first name">
                    @error('first_name')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="first_name">
                        First Name
                    </label>
                    <input
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="first_name" name="category_name" type="text" value="{{ old('first_name') }}"
                        placeholder="first name">
                    @error('first_name')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="last_name">
                        Last Name
                    </label>
                    <input
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="last_name" name="last_name" type="text" value="{{ old('last_name') }}"
                        placeholder="last name">
                    @error('last_name')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="email">
                        Email
                    </label>
                    <input
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="email" name="email" type="text" value="{{ old('email') }}" placeholder="email">
                    @error('email')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex items-center justify-between">
                    <button
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                        type="submit">
                        Save
                    </button>
                </div>
            </form>

        </div>
    </div>
@endsection
