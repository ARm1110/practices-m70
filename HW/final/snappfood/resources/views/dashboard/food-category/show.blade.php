@extends('layouts.layout')

@section('content')
    <x-dashboard>

        <x-slot name="content">

        </x-slot>
    @section('homePage')
        <x-table>
            <x-slot name="formSearch">

            </x-slot>
            <x-slot name="title">
                <th scope="col" class="px-6 py-3">
                    Restaurant Name
                </th>
                <th scope="col" class="px-6 py-3">
                    Category count
                </th>

                <th scope="col" class="px-6 py-3">
                    view more
                </th>


            </x-slot>
            <x-slot name="body">
                @foreach ($data['foodCategories'] as $foodCategory)
                    <tr
                        class="bg-white border-b w-full dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">

                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                            {{ $foodCategory->restaurant_name }}
                        </th>



                        <th scope="row" class="px-6 py-4  font-medium text-gray-900 dark:text-white whitespace-nowrap">
                            <span class="bg-green-500 p-2 rounded-full">
                                {{ $foodCategory['foodCategories']->count() }}</span>
                        </th>

                        <td class="px-6 py-4 text-right relative">
                            <form action="/shopper/food-category-show/{{ $foodCategory->id }}" method="post"
                                class="text-center">
                                @method('PUT')
                                @csrf
                                <button type="submit" class="font-medium text-red-600 dark:text-red-500 hover:underline">
                                    <img src="{{ asset('image/view-more.svg') }}" class="w-24 hover:w-20 absolute top-3 "
                                        alt="">
                                </button>
                            </form>
                        </td>





                    </tr>
                @endforeach
            </x-slot>
            <x-slot name="pagination">
                <div class="row">

                    <div class="col-md-12">

                        {{ $data['foodCategories']->links('pagination::tailwind') }}

                    </div>

                </div>
            </x-slot>

        </x-table>
    @endsection
    @section('homePage')
        test
    @endsection
</x-dashboard>
@endsection
