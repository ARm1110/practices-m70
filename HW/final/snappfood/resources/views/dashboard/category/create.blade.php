@extends('layouts.layout')


@section('content')
    <div class="w-full flex justify-center" style="height: 1200px">
        <div class="w-full max-w-xs mt-10 ">
            <form class="bg-white shadow-md rounded w-96 px-8 pt-6 pb-8 mb-4" method="post"
                action="{{ route('dashboard.admin.category.store') }}">
                @csrf
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="category">
                        category name
                    </label>
                    <input
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="category" name="category_name" type="text" value="{{ old('name') }}"
                        placeholder="category name">
                    @error('category_name')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex items-center justify-between">
                    <button
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                        type="submit">
                        Add category
                    </button>
                </div>
            </form>

        </div>
    </div>
@endsection
