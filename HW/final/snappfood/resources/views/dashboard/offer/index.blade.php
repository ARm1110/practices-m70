@extends('layouts.layout')

@section('content')
    <x-dashboard>

        <x-slot name="content">
            <li class="mt-1">
                <a href="{{ route('dashboard.admin.offer.trash') }}">
                    <div class="relative">
                        <p class=" text-neutral-100 bg-yellow-500 p-3 rounded-md ">List Deleted</p><br>
                        <div class="absolute top-3 bg-red-500 rounded-full px-2 right-2 ">
                            <span class=" text-neutral-100  ">{{ $data['trash']->count() }}</span>
                        </div>
                    </div>

                </a>
            </li>
            <li class="mt-1">
                <a href="{{ route('dashboard.admin.offer.create') }}">
                    <div class="relative">
                        <p class=" text-neutral-100 bg-yellow-500 p-3 rounded-md ">create new category</p><br>

                    </div>

                </a>
            </li>
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
                    Discount
                </th>
                <th scope="col" class="px-6 py-3">
                    status
                </th>
                <th scope="col" class="px-6 py-3">
                    food party
                </th>
                <th scope="col" class="px-6 py-3">
                    last activity
                </th>
                <th scope="col" class="px-6 py-3">
                    Process
                </th>
                <th scope="col" class="px-6 py-3">
                    Edit
                </th>
                <th scope="col" class="px-6 py-3">
                    trash
                </th>

            </x-slot>
            <x-slot name="body">
                @foreach ($data['offers'] as $offer)
                    <tr
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">

                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                            {{ $offer->name }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $offer->discount }}
                        </td>
                        <td class="px-6 py-4">
                            @if ($offer->is_active == 1)
                                <span class="text-green-500">Active</span>
                            @else
                                <span class="text-red-500">Inactive</span>
                            @endif
                        </td>
                        <td class="px-6 py-4">
                            @if ($offer->is_food_party == 1)
                                <form action="{{ route('dashboard.admin.offer.update-foodParty', ['id' => $offer->id]) }}"
                                    method="post">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="status" value="{{ $offer->is_food_party }}">
                                    <button type="submit"
                                        class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                                        Yes
                                    </button>
                                </form>
                            @else
                                <form action="{{ route('dashboard.admin.offer.update-foodParty', ['id' => $offer->id]) }}"
                                    method="post">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="status" value="{{ $offer->is_food_party }}">
                                    <button type="submit"
                                        class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-2 rounded">
                                        No
                                    </button>
                                </form>
                            @endif
                        </td>

                        <td class="px-6 py-4">
                            {{ $offer->updated_at->diffForHumans() }}
                        </td>

                        @if ($offer->is_active)
                            <td class="px-6 py-4 text-right relative">
                                <form action="/dashboard/admin/offer/update/{{ $offer->id }}/{{ $offer->is_active }}"
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
                                <form action="/dashboard/admin/offer/update/{{ $offer->id }}/{{ $offer->is_active }}"
                                    method="post" class="text-center">
                                    @method('PUT')
                                    @csrf
                                    <button type="submit"
                                        class="font-medium text-green-600 dark:text-green-500 hover:underline">
                                        <img src="{{ asset('image/server-de.svg') }}" class="w-10 hover:w-9 absolute top-3"
                                            alt=""> </button>
                                </form>
                            </td>
                        @endif
                        <td class="px-6 py-4 text-right relative">
                            <a href="/shopper/restaurant/{{ $offer->id }}/edit"
                                class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                                <img src="{{ asset('image/edit.svg') }}" class="w-8 hover:w-9 absolute top-3 "
                                    alt="">

                            </a>
                        </td>
                        <td class="px-6 py-4 text-right relative">
                            <form action="/dashboard/admin/offer/delete/{{ $offer->id }}" method="post"
                                class="text-center">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="font-medium text-red-600 dark:text-red-500 hover:underline">
                                    <img src="{{ asset('image/delete_service.svg') }}"
                                        class="w-8 hover:w-9 absolute top-3 " alt="">
                                </button>
                            </form>
                        </td>

                    </tr>
                @endforeach
            </x-slot>
            <x-slot name="pagination">
                <div class="row">
                    <div class="col-md-12">
                        {{ $data['offers']->links('pagination::tailwind') }}
                    </div>
                </div>
            </x-slot>
        </x-table>
    @endsection
    @section('homePage')
    @endsection
</x-dashboard>
@endsection
