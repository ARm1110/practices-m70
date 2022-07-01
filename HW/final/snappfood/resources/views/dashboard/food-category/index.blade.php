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
                    Name
                </th>


                <th scope="col" class="px-6 py-3">
                    Last Activity
                </th>
                <th scope="col" class="px-6 py-3">
                    status
                </th>

                <th scope="col" class="px-6 py-3">
                    Process
                </th>
                <th scope="col" class="px-6 py-3">
                    Edit
                </th>
            </x-slot>
            <x-slot name="body">
                @foreach ($data['foodCategories'] as $foodCategory)
                    <tr
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">

                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                            {{ $foodCategory->category_name }}
                        </th>



                        <td class="px-6 py-4">
                            {{ $foodCategory->updated_at->diffForHumans() }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $foodCategory->is_active ? 'Active' : 'Inactive' }}
                        </td>


                        @if ($foodCategory->is_active)
                            <td class="px-6 py-4 text-right relative">
                                <form
                                    action="/shopper/update-food-category/{{ $foodCategory->id }}/{{ $foodCategory->is_active }}"
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
                                    action="/shopper/update-food-category/{{ $foodCategory->id }}/{{ $foodCategory->is_active }}"
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
                            <a href="/shopper/food-category/{{ $foodCategory->id }}/edit"
                                class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                                <img src="{{ asset('image/edit.svg') }}" class="w-8 hover:w-9 absolute top-3 "
                                    alt="">

                            </a>
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
