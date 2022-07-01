@extends('layouts.layout')


@section('content')
    <div class="w-full flex justify-center" style="height: 1200px">
        <div class="w-full max-w-xs mt-10 ">
            <form class="bg-white shadow-md rounded w-96 px-8 pt-6 pb-8 mb-4" method="post"
                action="/shopper/food-category/create">
                @csrf

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="restaurant">
                        food category name
                    </label>
                    <input
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="restaurant" name="name" type="text" value="{{ old('name') }}"
                        placeholder="category name">
                    @error('name')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="city" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Select
                        restaurant
                    </label>
                    <select id="city" name="restaurant"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option selected>Choose a restaurant</option>
                        @foreach ($data['restaurants'] as $item)
                            <option value="{{ $item->id }}">{{ $item->restaurant_name }}</option>
                        @endforeach
                    </select>

                    @error('restaurant')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex items-center justify-between">
                    <button
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                        type="submit">
                        Add food category
                    </button>
                </div>
            </form>

        </div>
    </div>
@endsection
