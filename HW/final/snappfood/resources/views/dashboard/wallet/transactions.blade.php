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
                    id
                </th>
                <th scope="col" class="px-6 py-3">
                    type
                </th>
                <th scope="col" class="px-6 py-3">
                    confirmed
                </th>
                <th scope="col" class="px-6 py-3">
                    activity
                </th>
                <th scope="col" class="px-6 py-3">
                    amount
                </th>


            </x-slot>
            <x-slot name="body">
                @foreach ($data['transactions'] as $transactions)
                    <tr
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">

                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                            {{ $transactions->id }}
                        </th>
                        <td class="px-6 py-4">
                            @if ($transactions->type == 'deposit')
                                <span class="text-green-500">{{ $transactions->type }}</span>
                            @elseif($transactions->type == 'withdraw')
                                <span class="text-red-500">{{ $transactions->type }}</span>
                            @endif
                        </td>
                        <td class="px-6 py-4">
                            @if ($transactions->confirmed == 1)
                                <span class="text-green-500">Confirmed</span>
                            @else
                                <span class="text-red-500">Not Confirmed</span>
                            @endif
                        </td>
                        <td class="px-6 py-4">
                            {{ $transactions->created_at->diffForHumans() }}
                        </td>
                        <td class="px-6 py-4">
                            @if ($transactions->type == 'deposit')
                                <span class="text-green-500">{{ $transactions->amount }}</span>
                            @elseif($transactions->type == 'withdraw')
                                <span class="text-red-500">{{ $transactions->amount }}</span>
                            @endif
                        </td>


                        </td>

                    </tr>
                @endforeach
            </x-slot>
            <x-slot name="pagination">
                <div class="row">
                    <div class="col-md-12">
                        {{ $data['transactions']->links('pagination::tailwind') }}
                    </div>
                </div>
            </x-slot>
        </x-table>
    @endsection
    @section('homePage')
    @endsection
</x-dashboard>
@endsection
