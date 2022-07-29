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
                <a href="{{ route('dashboard.admin.offer.create') }}"
                    class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-red-100 dark:hover:bg-gray-700">
                    <img src="{{ asset('image/settings.svg') }}" class="w-8" alt="">
                    <span class="flex-1 ml-3 whitespace-nowrap">
                        Create a Offer </span>
                </a>
            </li>
            <li>
                <a href="{{ route('dashboard.admin.offer.index') }}"
                    class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-red-100 dark:hover:bg-gray-700">
                    <img src="{{ asset('image/settings.svg') }}" class="w-8" alt="">
                    <span class="flex-1 ml-3 whitespace-nowrap">
                        Offer list </span>
                </a>
            </li>
            <li>
                <a href="{{ route('dashboard.admin.offer.create') }}"
                    class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-red-100 dark:hover:bg-gray-700">
                    <img src="{{ asset('image/settings.svg') }}" class="w-8" alt="">
                    <span class="flex-1 ml-3 whitespace-nowrap">
                        Create Food Party </span>
                </a>
            </li>
            <li>
                <a href="{{ route('dashboard.admin.comment.index') }}"
                    class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-red-100 dark:hover:bg-gray-700">
                    <img src="{{ asset('image/settings.svg') }}" class="w-8" alt="">
                    <span class="flex-1 ml-3 whitespace-nowrap">
                        comment on order</span>
                </a>
            </li>
        </x-slot>

    </x-dashboard>
@endsection
