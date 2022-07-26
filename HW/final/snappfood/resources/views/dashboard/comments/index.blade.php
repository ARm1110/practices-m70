@extends('layouts.layout')

@section('content')
    <x-dashboard>

        <x-slot name="content">
            {{-- <li class="mt-1">
                <a href="{{ route('dashboard.admin.offer.trash') }}">
                    <div class="relative">
                        <p class=" text-neutral-100 bg-yellow-500 p-3 rounded-md ">List Deleted</p><br>
                        <div class="absolute top-3 bg-red-500 rounded-full px-2 right-2 ">
                            <span class=" text-neutral-100  ">{{ $data['trash']->count() }}</span>
                        </div>
                    </div>

                </a>
            </li> --}}
        </x-slot>
    @section('homePage')
        <x-table>
            <x-slot name="formSearch">

            </x-slot>
            <x-slot name="title">
                <th scope="col" class="px-6 py-3">
                    Username
                </th>
                <th scope="col" class="px-6 py-3">
                    Comment
                </th>
                <th scope="col" class="px-6 py-3">
                    Food Name
                </th>
                <th scope="col" class="px-6 py-3">
                    Restaurant Name
                </th>
                <th scope="col" class="px-6 py-3">
                    Create-at
                </th>
                <th scope="col" class="px-6 py-3">
                    Status
                </th>
                <th scope="col" class="px-6 py-3">
                    Accept
                </th>
                <th scope="col" class="px-6 py-3">
                    reject
                </th>

            </x-slot>
            <x-slot name="body">
                @foreach ($data['comments'] as $items)
                    <tr
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">

                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                            {{ $items->user->fullName }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $items->comment }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $items->order->menuItems->first()->item_name }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $items->order->menuItems->first()->restaurant->restaurant_name }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $items->created_at }}
                        </td>
                        <td class="px-6 py-4">
                            @if ($items->status == 'pending')
                                <span class="text-red-500">Pending</span>
                            @elseif($items->status == 'approved')
                                <span class="text-green-500">Accepted</span>
                            @elseif($items->status == 'rejected')
                                <span class="text-red-500">Rejected</span>
                            @endif
                        <td class="px-6 py-4">
                            <a href="{{ route('shopper.comment.approve', $items->id) }}" class="text-green-500">
                                <span class="bg-gray-200 p-3 rounded-full hover:bg-green-300"> <i
                                        class="fa-solid fa-check "></i>
                                </span>
                            </a>
                        </td>
                        <td class="px-6 py-4">
                            <form action="">
                                <a href="{{ route('shopper.comment.reject', $items->id) }}" class="text-red-500">

                                    <span class="bg-gray-200 p-3 rounded-full hover:bg-green-300">
                                        <i class="fas fa-times"></i>
                                    </span>
                                </a>
                            </form>
                        </td>


                    </tr>
                @endforeach
            </x-slot>
            <x-slot name="pagination">
                <div class="row">
                    <div class="col-md-12">
                        {{ $data['comments']->links('pagination::tailwind') }}
                    </div>
                </div>
            </x-slot>
        </x-table>
    @endsection
    @section('homePage')
    @endsection
</x-dashboard>
@endsection
