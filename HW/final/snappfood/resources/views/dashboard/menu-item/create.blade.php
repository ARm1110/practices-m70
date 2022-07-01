@extends('layouts.layout')


@section('content')
    <div class="w-full flex justify-center" style="height: 1200px">
        <div class="w-full max-w-xs mt-10 ">
            <form class="bg-white shadow-md rounded w-96 px-8 pt-6 pb-8 mb-4" method="post" action="/menu-item/create">
                @csrf

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="restaurant">
                        menu name
                    </label>
                    <input
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="restaurant" name="name" type="text" placeholder="menu">
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="restaurant">
                        price
                    </label>
                    <input
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="restaurant" name="price" type="text" placeholder="$$$$$$">
                </div>

                <div class="mb-4">
                    <label for="city" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Select
                        food category
                    </label>
                    <select id="city" name="city"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option selected>Choose a category</option>
                        {{-- @for ($i = 0; $i < count($query); $i++)
                            <option value="{{ $query[$i]->restaurant_id }}">{{ $query[$i]->restaurant_name }}</option>
                        @endfor --}}

                    </select>
                </div>

                <div class="flex items-center justify-between">
                    <button
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                        type="submit">
                        Add menu item
                    </button>
                </div>
            </form>

        </div>
    </div>
@endsection
