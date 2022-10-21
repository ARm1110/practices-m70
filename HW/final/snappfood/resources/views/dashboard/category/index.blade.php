@extends('layouts.layout')

@section('content')
    <x-dashboard>

        <x-slot name="content">
            <li class="mt-1">
                <a href="{{ route('dashboard.admin.category.trash') }}">
                    <div class="relative">
                        <p class=" text-neutral-100 bg-yellow-500 p-3 rounded-md ">List Deleted</p><br>
                        <div class="absolute top-3 bg-red-500 rounded-full px-2 right-2 ">
                            <span class=" text-neutral-100  ">{{ $data['trash'] }}</span>
                        </div>
                    </div>

                </a>
            </li>
            <li class="mt-1">
                <a href="{{ route('dashboard.admin.category.create') }}">
                    <div class="relative">
                        <p class=" text-neutral-100 bg-yellow-500 p-3 rounded-md ">create new category</p><br>
                    </div>
                </a>
            </li>
        </x-slot>
    @section('homePage')
        @error('status')
            <script>
                alert('{{ $message }}');
            </script>
        @enderror
        <x-table>
            <x-slot name="formSearch">

            </x-slot>
            <x-slot name="title">
                <th scope="col" class="px-6 py-3">
                    Username
                </th>
                <th scope="col" class="px-6 py-3">
                    category name
                </th>
                <th scope="col" class="px-6 py-3">
                    create by
                </th>
                <th scope="col" class="px-6 py-3">
                    status
                </th>

                <th scope="col" class="px-6 py-3">
                    last activity
                </th>
                <th scope="col" class="px-6 py-3">
                    enable / disable
                </th>
                <th scope="col" class="px-6 py-3">
                    delete
                </th>

            </x-slot>
            <x-slot name="body">
                @foreach ($data['categories'] as $items)
                    <tr
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">

                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">

                            {{ $items->user->fullName }}

                        </th>
                        <td class="px-6 py-4">
                            {{ $items->category_name }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $items->user->fullName }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $items->is_active ? 'Active' : 'Inactive' }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $items->created_at->diffForHumans() }}
                        </td>
                        @if ($items->is_active)
                            <td class="px-6 py-4">
                                <form action="{{ route('dashboard.admin.category.update', ['id' => $items->id]) }}"
                                    method="post" class="text-center">
                                    @method('PUT')
                                    @csrf
                                    <input type="hidden" name="status" value={{ $items->is_active }}>
                                    <button type="submit"
                                        class="font-medium text-red-600 dark:text-red-500 hover:underline">
                                        <span class="bg-gray-200 p-3 rounded-full hover:bg-green-300">
                                            <i class="fas fa-times"></i>
                                        </span>
                                    </button>
                                </form>
                            </td>
                        @else
                            <td class="px-6 py-4">

                                <form action="{{ route('dashboard.admin.category.update', ['id' => $items->id]) }}"
                                    method="post" class="text-center">
                                    @method('PUT')
                                    @csrf
                                    <input type="hidden" name="status" value={{ $items->is_active }}>
                                    <button type="submit"
                                        class="font-medium text-green-600 dark:text-green-500 hover:underline">
                                        <span class="bg-gray-200 p-3 rounded-full hover:bg-green-300"> <i
                                                class="fa-solid fa-check "></i>
                                        </span>
                                    </button>
                                </form>
                            </td>
                        @endif
                        <td class="px-6 py-4 text-right relative">
                            <form action="{{ route('dashboard.admin.category.delete', ['id' => $items->id]) }}"
                                method="post" class="text-center">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="font-medium text-red-600 dark:text-red-500 hover:underline">
                                    <img src="{{ asset('image/delete_service.svg') }}"
                                        class="w-8 hover:w-9 absolute left-1 top-3" alt="">
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </x-slot>
            <x-slot name="pagination">
                <div class="row">
                    <div class="col-md-12">
                        {{ $data['categories']->links('pagination::tailwind') }}
                    </div>
                </div>
            </x-slot>
        </x-table>
    @endsection
    @section('homePage')
    @endsection
</x-dashboard>
@endsection
