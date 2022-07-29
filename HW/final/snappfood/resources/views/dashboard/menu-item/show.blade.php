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
                    new food
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
                            <form action="{{ url('/shopper/menu/add-offer') }}" method="post" class="form-horizontal">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="menu" value="{{ $menuItem->id }}">
                                <button class=" p-1 bg-green-400 text-white rounded-lg hover:bg-green-900  ">add
                                    discount
                                </button>
                            </form>


                        </th>


                        <th scope="row" class="px-6 py-4  font-medium text-gray-900 dark:text-white whitespace-nowrap">
                            <span class="bg-green-500 p-2 rounded-full">
                                {{ $menuItem->updated_at->diffForHumans() }}</span>
                        </th>

                        <td class="px-6 py-4">
                            @if ($menuItem->is_active == 1)
                                <span class="bg-green-500 p-2 text-emerald-50 rounded-full">
                                    Active</span>
                            @else
                                <span class="bg-red-500 p-2 text-red-50 rounded-full">
                                    Inactive</span>
                            @endif
                        </td>
                        <td class="px-6 py-4">
                            @if ($menuItem->is_new == 1)
                                <span class="bg-green-500 p-2 text-emerald-50 rounded-full">
                                    Active</span>
                            @else
                                <span class="bg-red-500 p-2 text-red-50 rounded-full">
                                    Inactive</span>
                            @endif
                        </td>
                        @if ($menuItem->is_active)
                            <td class="px-6 py-4 text-right relative">
                                <form action="" method="post" class="text-center">
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
                                <form action="" method="post" class="text-center">
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
                            <a href="" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                                <img src="{{ asset('image/edit.svg') }}" class="w-8 hover:w-9 absolute top-3 "
                                    alt="">

                            </a>
                        </td>
                        <td class="px-6 py-4 text-right relative">
                            <form action="" method="post" class="text-center">
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

                        {{ $data['menuItems']->links('pagination::tailwind') }}

                    </div>

                </div>
            </x-slot>

        </x-table>
    @endsection
    @section('homePage')
    @endsection
</x-dashboard>
@endsection
