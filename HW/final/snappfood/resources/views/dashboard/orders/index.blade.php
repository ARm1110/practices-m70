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
                    user Name
                </th>
                <th scope="col" class="px-6 py-3">
                    food name
                </th>
                <th scope="col" class="px-6 py-3">
                    status
                </th>
                <th scope="col" class="px-6 py-3">
                    total price
                </th>
                <th scope="col" class="px-6 py-3">
                    reject
                </th>

            </x-slot>
            <x-slot name="body">
                @foreach ($data['orders'] as $orderItem)
                    <tr
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">


                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                            {{ $orderItem->user->fullName }}
                        </th>

                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                            {{ $orderItem->menuItem->item_name }}
                        </th>
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                            {{ $orderItem->status }}
                        </th>
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                            {{ $orderItem->total_price }}
                        </th>

                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                            <form action="{{ route('shopper.order.reject', $orderItem->order_id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="menuItem" value={{ $orderItem->id }}>
                                <button type="submit"
                                    class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                                    Reject
                                </button>
                            </form>
                        </th>
                    </tr>
                @endforeach
            </x-slot>
            <x-slot name="pagination">
                <div class="row">

                    <div class="col-md-12">

                        {{ $data['orders']->links('pagination::tailwind') }}

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
