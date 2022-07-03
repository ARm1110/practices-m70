@extends('layouts.layout')

@section('content')
    <x-dashboard>

        <x-slot name="content">

            <li>
                <a href="{{ route('dashboard.users') }}"
                    class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-red-100 dark:hover:bg-gray-700">
                    <img src="{{ asset('image/settings.svg') }}" class="w-8" alt="">
                    <span class="flex-1 ml-3 whitespace-nowrap">
                        user list</span>
                </a>
            </li>
            <li>
                <a href=""
                    class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-red-100 dark:hover:bg-gray-700">
                    <img src="{{ asset('image/settings.svg') }}" class="w-8" alt="">
                    <span class="flex-1 ml-3 whitespace-nowrap">
                        station</span>
                </a>
            </li>
            <li>
                <a href=""
                    class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-red-100 dark:hover:bg-gray-700">
                    <img src="{{ asset('image/settings.svg') }}" class="w-8" alt="">
                    <span class="flex-1 ml-3 whitespace-nowrap">
                        station</span>
                </a>
            </li>
        </x-slot>
    @section('homePage')
        <x-table>
            <x-slot name="formSearch">
                <form action="/dashboard/users/filter" method="post" class="">
                    @csrf
                    @method('put')
                    <div class="p-4 grid grid-cols-8 gap-4">
                        <div class="">
                            <div class="flex items-center border-b-2 border-gray-200 py-2">
                                <input
                                    class="appearance-none bg-transparent border-none w-full text-gray-700 mr-3 py-1 px-2 leading-tight focus:outline-none"
                                    type="text" name="name" placeholder="name..." aria-label="Full name">
                            </div>
                        </div>
                        <div class=" ">
                            <label for="underline_select" class="sr-only">status</label>
                            <select id="underline_select" name="status"
                                class="block py-2.5 px-0 w-full text-sm text-gray-500 bg-transparent border-0 border-b-2 border-gray-200 appearance-none dark:text-gray-400 dark:border-gray-700 focus:outline-none focus:ring-0 focus:border-gray-200 peer">

                                <option value="1">Active</option>
                                <option value="0">disable</option>

                            </select>
                        </div>

                        <div class="  ">
                            <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                                <button type="submit" name="process" value="edit"
                                    class="bg-transparent hover:bg-green-500 text-green-700 font-semi bold hover:text-white py-2 px-4 border border-green-500 hover:border-transparent rounded-full">
                                    filter
                                </button>
                            </div>
                        </div>

                </form>
            </x-slot>
            <x-slot name="title">
                <th scope="col" class="px-6 py-3">
                    full Name
                </th>
                <th scope="col" class="px-6 py-3">
                    Phone
                </th>
                <th scope="col" class="px-6 py-3">
                    Email
                </th>
                <th scope="col" class="px-6 py-3">
                    Role
                </th>
                <th scope="col" class="px-6 py-3">
                    Last Activity
                </th>
                <th scope="col" class="px-6 py-3">
                    Account status
                </th>
                <th scope="col" class="px-6 py-3">
                    Process
                </th>
            </x-slot>
            <x-slot name="body">
                @foreach ($users as $user)
                    <tr
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">

                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                            {{ $user->fullName }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $user->phone }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $user->email }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $user->role }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $user->updated_at->diffForHumans() }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $user->is_active ? 'Active' : 'Inactive' }}
                        </td>
                        @if ($user->is_active)
                            <td class="px-6 py-4 text-right relative">
                                <form action="/dashboard/users/update/{{ $user->id }}/{{ $user->is_active }}"
                                    method="post" class="text-center">
                                    @method('PUT')
                                    @csrf
                                    <button type="submit"
                                        class="font-medium text-red-600 dark:text-red-500 hover:underline">
                                        <img src="{{ asset('image/icons_denied.png') }}"
                                            class="w-10 hover:w-9 absolute top-3 " alt="">
                                    </button>
                                </form>
                            </td>
                        @else
                            <td class="px-6 py-4 text-right relative">
                                <form action="/dashboard/users/update/{{ $user->id }}/{{ $user->is_active }}"
                                    method="post" class="text-center">
                                    @method('PUT')
                                    @csrf
                                    <button type="submit"
                                        class="font-medium text-green-600 dark:text-green-500 hover:underline">
                                        <img src="{{ asset('image/icons_checked.png') }}"
                                            class="w-10 hover:w-9 absolute top-3" alt=""> </button>
                                </form>
                            </td>
                        @endif


                    </tr>
                @endforeach
            </x-slot>
            <x-slot name="pagination">
                <div class="row">

                    <div class="col-md-12">

                        {{ $users->links('pagination::tailwind') }}

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
