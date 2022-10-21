@extends('layouts.layout')


@section('content')
    <div class="w-full  flex justify-center" style="height: 1200px">
        <div class="w-full max-w-xs mt-10 ">
            @if (session()->get('info'))
                <form class="bg-gray-300 shadow-md rounded w-96 px-8 pt-6 pb-8 mb-4" method="post"
                    action="{{ route('shopper.menu.store') }}">
                    @csrf
                    <div class="mb-4">
                        <label for="city" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Select
                            food category
                        </label>
                        <select id="city" name="category"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option selected>Choose a category</option>
                            @foreach (session()->get('data') as $item)
                                @foreach ($item as $key => $category)
                                    @if (is_array($category))
                                        <option value="{{ $category['id'] }}">{{ $category['category_name'] }}</option>
                                    @endif
                                @endforeach
                            @endforeach
                        </select>
                        @error('restaurant')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                        @enderror
                    </div>
                    @foreach (session()->get('data') as $key => $item)
                        @if ($key == 'category')
                            @foreach (session()->get('data')['menu_items'] as $key => $menu_items)
                                <input type="hidden" name="{{ $key }}" value="{{ $menu_items }}">
                            @endforeach
                        @endif
                    @endforeach
                    <div class="flex items-center justify-between">
                        <button
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                            type="submit">
                            submit
                        </button>
                    </div>
                </form>
            @else
                <form class="bg-gray-300 shadow-md rounded w-96 px-8 pt-6 pb-8 mb-4" method="post"
                    action="{{ route('shopper.menu.next') }}">
                    @csrf

                    <div class="mb-4">
                        <label class="block  text-gray-700 text-sm font-bold mb-2" for="restaurant">
                            menu name
                        </label>
                        <input
                            class="shadow   appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            id="restaurant" name="name" value="{{ old('name') }}" type="text" placeholder="menu">
                        @error('name')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                        @enderror

                    </div>
                    <div class="mb-4 ">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="restaurant">
                            price
                        </label>
                        <input
                            class="shadow  appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            id="restaurant" name="price" value="{{ old('price') }}" type="text" placeholder="1234">
                        @error('price')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                        @enderror

                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="restaurant">
                            description
                        </label>
                        <textarea class="form-control" name="description" id="" rows="3">{{ old('description') }}</textarea>
                        @error('description')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="city" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Select
                            food restaurant
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
                            Next
                        </button>
                    </div>
                </form>
            @endif
        </div>
    </div>
@endsection
