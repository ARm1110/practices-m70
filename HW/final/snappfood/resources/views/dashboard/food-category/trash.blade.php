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
                    Category Name
                </th>
                <th scope="col" class="px-6 py-3">
                    last deleted
                </th>
                <th scope="col" class="px-6 py-3">
                    last activity
                </th>
                <th scope="col" class="px-6 py-3">
                    Restore
                </th>
                <th scope="col" class="px-6 py-3">
                    delete
                </th>
            </x-slot>
            <x-slot name="body">
                @foreach ($data['trashed'] as $trashBox)
                    <tr
                        class="bg-white border-b w-full dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">

                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                            {{ $trashBox->category_name }}
                        </th>

                        <th scope="row" class="px-6 py-4  font-medium text-gray-900 dark:text-white whitespace-nowrap">
                            <span class="bg-red-500 p-2 rounded-full">
                                {{ $trashBox->deleted_at->diffForHumans() }}</span>
                        </th>
                        <th scope="row" class="px-6 py-4  font-medium text-gray-900 dark:text-white whitespace-nowrap">
                            <span class="bg-green-500 p-2 rounded-full">
                                {{ $trashBox->updated_at->diffForHumans() }}</span>
                        </th>
                        <td class="px-6 py-4 text-right relative">
                            <form action="{{ route('shopper.food-category.restore', ['id' => $trashBox->id]) }}"
                                method="post" class="text-center">
                                @method('PUT')
                                @csrf
                                <button type="submit" class="font-medium text-red-600 dark:text-red-500 hover:underline">
                                    <img src="{{ asset('image/trash.svg') }}" class="w-8 hover:w-9 absolute top-3"
                                        alt="">
                                </button>
                            </form>
                        </td>

                        <td class="px-6 py-4 text-right relative">
                            <form action="{{ route('shopper.food-category.forceDelete', ['id' => $trashBox->id]) }}"
                                method="post" class="text-center">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="font-medium text-red-600 dark:text-red-500 hover:underline">
                                    <img src="{{ asset('image/delete_service.svg') }}"
                                        class="w-8 hover:w-9 absolute top-3" alt="">
                                </button>
                            </form>
                        </td>

                        </td>

                    </tr>
                @endforeach

            </x-slot>
            <x-slot name="pagination">
                <div class="row">

                    <div class="col-md-12">

                        {{ $data['trashed']->links('pagination::tailwind') }}

                    </div>

                </div>
            </x-slot>

        </x-table>
    @endsection
    @section('homePage')
    @endsection
</x-dashboard>
@endsection
