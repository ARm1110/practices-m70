@extends('layouts.layout')

@section('content')
    <x-dashboard>

        <x-slot name="content">

            <ul>

                <li>
                    <a href="{{ route('shopper.restaurant.index') }}">

                        <p class=" text-neutral-100 bg-yellow-500 p-3 rounded-md ">Restaurant:<br>
                            <span>
                                {{ $data['restaurant']['restaurant_name'] }}
                            </span>
                        </p>
                        <br>


                    </a>
                </li>
                {{-- #soft-delete-list --}}
                <li class="mt-1">
                    <a href="{{ route('shopper.food-category.trash', ['id' => $data['restaurant']['id']]) }}">
                        <div class="relative">
                            <p class=" text-neutral-100 bg-yellow-500 p-3 rounded-md ">List Deleted</p><br>
                            <div class="absolute top-3 bg-red-500 rounded-full px-2 right-2 ">
                                <span class=" text-neutral-100  ">{{ $data['trash']->count() }}</span>
                            </div>
                        </div>

                    </a>


            </ul>

        </x-slot>
    @section('homePage')
        <x-table>
            <x-slot name="formSearch">

            </x-slot>
            <x-slot name="title">
                <th scope="col" class="px-6 py-3">
                    menu name
                </th>
                <th scope="col" class="px-6 py-3">
                    Food description
                </th>
                <th scope="col" class="px-6 py-3">
                    Food price
                </th>
                <th scope="col" class="px-6 py-3">
                    food Discount
                </th>
                <th scope="col" class="px-6 py-3">
                    status
                </th>
                <th scope="col" class="px-6 py-3">
                    proses
                </th>
                <th scope="col" class="px-6 py-3">
                    edit
                </th>

                <th scope="col" class="px-6 py-3">
                    delete
                </th>



            </x-slot>
            <x-slot name="body">
                @foreach ($data['menuItems'] as $menuItem)
                    <tr
                        class="bg-white border-b w-full dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">

                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                            {{ $menuItem->item_name }}
                        </th>
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                            {{ $menuItem->description }}
                        </th>
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                            {{ $menuItem->price }}
                        </th>

                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                            @if ($foodCategory['menuItems']->count())
                                <span class="bg-green-500 p-2 rounded-full">
                                    {{ $foodCategory['menuItems']->count() }}</span>
                            @else
                                <span class="bg-red-500 p-2 rounded-full">
                                    {{ $foodCategory['menuItems']->count() }}</span>
                            @endif


                        </th>
                        {{-- food list --}}
                        <td class="px-6 py-4 text-right relative">
                            <form action="/shopper/menu/food/{{ $foodCategory->id }}/{{ $data['restaurant']['id'] }}"
                                method="post" class="text-center">
                                @method('PUT')
                                @csrf
                                <button type="submit" class="font-medium text-red-600 dark:text-red-500 hover:underline">
                                    <img src="{{ asset('image/view-more.svg') }}"
                                        class="w-20 hover:w-24 absolute top-3 left-2 hover:bg-green-300 " alt="">
                                </button>
                            </form>
                        </td>
                        <th scope="row" class="px-6 py-4  font-medium text-gray-900 dark:text-white whitespace-nowrap">
                            <span class="bg-green-500 p-2 rounded-full">
                                {{ $foodCategory->updated_at->diffForHumans() }}</span>
                        </th>
                        <td class="px-6 py-4">
                            @if ($foodCategory->is_active == 1)
                                <span class="bg-green-500 p-2 text-emerald-50 rounded-full">
                                    Active</span>
                            @else
                                <span class="bg-red-500 p-2 text-red-50 rounded-full">
                                    Inactive</span>
                            @endif
                        </td>


                        @if ($foodCategory->is_active)
                            <td class="px-6 py-4 text-right relative">
                                <form
                                    action="{{ route('shopper.food-category.status.update', ['id' => $foodCategory->id, 'status' => $foodCategory->is_active]) }}"
                                    method="post" class="text-center">
                                    @method('PUT')
                                    @csrf
                                    <button type="submit"
                                        class="font-medium text-red-600 dark:text-red-500 hover:underline">
                                        <img src="{{ asset('image/server-en.svg') }}"
                                            class="w-10 hover:w-9 absolute top-3 " alt="">
                                    </button>
                                </form>
                            </td>
                        @else
                            <td class="px-6 py-4 text-right relative">
                                <form
                                    action="{{ route('shopper.food-category.status.update', ['id' => $foodCategory->id, 'status' => $foodCategory->is_active]) }}"
                                    method="post" class="text-center">
                                    @method('PUT')
                                    @csrf
                                    <button type="submit"
                                        class="font-medium text-green-600 dark:text-green-500 hover:underline">
                                        <img src="{{ asset('image/server-de.svg') }}"
                                            class="w-10 hover:w-9 absolute top-3" alt=""> </button>
                                </form>
                            </td>
                        @endif
                        <td class="px-6 py-4 text-right relative">
                            <a href="{{ route('shopper.food-category.edit', ['id' => $foodCategory->id]) }}"
                                class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                                <img src="{{ asset('image/edit.svg') }}" class="w-8 hover:w-9 absolute top-3 "
                                    alt="">

                            </a>
                        </td>
                        <td class="px-6 py-4 text-right relative">
                            <form action="{{ route('shopper.food-category.delete', ['id' => $foodCategory->id]) }}"
                                method="post" class="text-center">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="font-medium text-red-600 dark:text-red-500 hover:underline">
                                    <img src="{{ asset('image/delete_service.svg') }}"
                                        class="w-8 hover:w-9 absolute top-3" alt="">
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
    @endsection
</x-dashboard>
@endsection
