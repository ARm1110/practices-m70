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
                <a href="{{ route('shopper.restaurant.index') }}"
                    class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-red-100 dark:hover:bg-gray-700">
                    <img src="{{ asset('image/settings.svg') }}" class="w-8" alt="">
                    <span class="flex-1 ml-3 whitespace-nowrap">
                        Restaurant list</span>
                </a>
                <a href="{{ route('shopper.menu.create') }}"
                    class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-red-100 dark:hover:bg-gray-700">
                    <img src="{{ asset('image/settings.svg') }}" class="w-8" alt="">
                    <span class="flex-1 ml-3 whitespace-nowrap">
                        Add Food </span>
                </a>
                <a href="{{ route('shopper.food-category.create') }}"
                    class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-red-100 dark:hover:bg-gray-700">
                    <img src="{{ asset('image/settings.svg') }}" class="w-8" alt="">
                    <span class="flex-1 ml-3 whitespace-nowrap">
                        Add food category </span>
                </a>
                <a href="{{ route('shopper.food-category.index') }}"
                    class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-red-100 dark:hover:bg-gray-700">
                    <img src="{{ asset('image/settings.svg') }}" class="w-8" alt="">
                    <span class="flex-1 ml-3 whitespace-nowrap">
                        Food category list</span>
                </a>
                <a href="{{ route('shopper.menu.index') }}"
                    class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-red-100 dark:hover:bg-gray-700">
                    <img src="{{ asset('image/settings.svg') }}" class="w-8" alt="">
                    <span class="flex-1 ml-3 whitespace-nowrap">
                        Food list</span>
                </a>
                <a href="{{ route('shopper.order.index') }}"
                    class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-red-100 dark:hover:bg-gray-700">
                    <img src="{{ asset('image/settings.svg') }}" class="w-8" alt="">
                    <span class="flex-1 ml-3 whitespace-nowrap">
                        order list </span>
                </a>
                <a href="{{ route('shopper.wallet.transactions') }}"
                    class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-red-100 dark:hover:bg-gray-700">
                    <img src="{{ asset('image/settings.svg') }}" class="w-8" alt="">
                    <span class="flex-1 ml-3 whitespace-nowrap">
                        Transactions</span>
                </a>

                <a href="{{ route('shopper.order.archive') }}"
                    class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-red-100 dark:hover:bg-gray-700">
                    <img src="{{ asset('image/settings.svg') }}" class="w-8" alt="">
                    <span class="flex-1 ml-3 whitespace-nowrap">
                        Archive order</span>
                </a>
            </li>

        </x-slot>
    @section('homePage')
        <div class="grid grid-cols-4 m-4">

            <div>
                <!--Metric Card-->
                <div
                    class="bg-gradient-to-b from-green-200 to-green-100 border-b-4 border-green-600 rounded-lg shadow-xl p-5">
                    <div class="flex flex-row items-center">
                        <div class="flex-shrink pr-4">
                            <div class="rounded-full p-2 bg-green-600">
                                <img src="{{ asset('image/wallet-plus.svg') }}" width="30px" height="30px"
                                    alt="">

                            </div>
                        </div>
                        <div class="flex-1 text-right md:text-center">
                            <h2 class="font-bold uppercase text-gray-600">Total Revenue</h2>
                            <p class="font-bold text-3xl">$ {{ $data['totalRevenue'] }}<span class="text-green-500"><i
                                        class="fas fa-caret-up"></i></span>
                            </p>
                        </div>
                    </div>
                </div>
                <!--/Metric Card-->
            </div>
        </div>
    @endsection

</x-dashboard>
@endsection
