@extends('layouts.layout')

@section('content')
    <x-dashboard>

        <x-slot name="content">


        </x-slot>
    @section('homePage')
        <!-- component -->
        @foreach ($data['foodCategories'] as $item)
            <form action="/shopper/food-category/{{ $item->id }}/edit" method="post">
        @endforeach
        @method('put')
        @csrf
        <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 flex flex-col my-2">
            <div class="-mx-3 md:flex mb-6">
                <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2"
                        for="grid-first-name">
                        Name
                    </label>
                    @foreach ($data['foodCategories'] as $item)
                        <input
                            class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4 mb-3"
                            id="grid-first-name" type="text" name="name" value="{{ $item->category_name }}">
                    @endforeach
                    @error('name')
                        <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                            {{ $message }}
                        </span>
                    @enderror
                </div>


            </div>
            <div class="-mx-3 md:flex mb-6">
                <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                    <div class="flex flex-col">
                        <div class="mb-4">
                            <label for="restaurant"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Select
                                restaurant
                            </label>
                            <select id="restaurant" name="category"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option selected>Choose a restaurant</option>
                                @foreach ($data['restaurants'] as $item)
                                    <option value="{{ $item->category_id }}">{{ $item->restaurant_name }}</option>
                                @endforeach
                            </select>

                            @error('category')
                                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                            @enderror
                        </div>


                    </div>

                </div>
            </div>
            <div class="-mx-3 md:flex mb-6">
                <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                    <button type="submit" name="process" value="edit"
                        class="bg-transparent hover:bg-green-500 text-green-700 font-semi bold hover:text-white py-2 px-4 border border-green-500 hover:border-transparent rounded">
                        Update
                    </button>

                </div>
            </div>
        </div>
        </form>
    @endsection
</x-dashboard>
@endsection
