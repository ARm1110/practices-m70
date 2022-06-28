@extends('layouts.layout')

@section('content')
    <x-dashboard>
        <x-slot name="content">
            <li>
                <a href="{{ route('shopper.restaurant.create') }}"
                    class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-red-100 dark:hover:bg-gray-700">
                    <img src="{{ asset('image/settings.svg') }}" class="w-8" alt="">
                    <span class="flex-1 ml-3 whitespace-nowrap">
                        Add restaurant</span>
                </a>
            </li>
        </x-slot>
    </x-dashboard>
@endsection
