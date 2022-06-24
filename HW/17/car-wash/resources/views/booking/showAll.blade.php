@extends('layouts.layout')

@section('content')
    <x-dashboard>
    @section('homePage')
        <x-table-booking>

            <x-slot name="body">
                @foreach ($bookings as $booking)
                    <tr
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">

                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                            {{ $booking->user->name }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $booking->service->name }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $booking->station->name }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $booking->token_reserve }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $booking->updated_at->diffForHumans() }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $booking->status ? 'Active' : 'Inactive' }}
                        </td>

                        @if ($booking->status)
                            <td class="px-6 py-4 text-right relative">
                                <form action="/dashboard/booking/update/{{ $booking->id }}/{{ $booking->status }}"
                                    method="post" class="text-center">
                                    @method('PUT')
                                    @csrf
                                    <button type="submit" name="process" value="update_status"
                                        class="font-medium text-red-600 dark:text-red-500 hover:underline ">
                                        <img src="{{ asset('img/booking-d.svg') }}" class="w-10 hover:w-9 absolute top-3"
                                            alt="">
                                    </button>
                                </form>
                            </td>
                        @else
                            <td class="px-6 py-4 text-right relative">
                                <form action="/dashboard/booking/update/{{ $booking->id }}/{{ $booking->status }}"
                                    method="post" class="text-center">
                                    @method('PUT')
                                    @csrf
                                    <button type="submit" name="process" value="update_status"
                                        class="font-medium text-green-600 dark:text-green-500 hover:underline">
                                        <img src="{{ asset('img/booking-e.svg') }}"
                                            class="w-10 hover:w-9 absolute top-3 " alt=""></button>
                                </form>
                            </td>
                        @endif


                        <td class="px-6 py-4 text-right relative">
                            <form action="/dashboard/booking/{{ $booking->id }}" method="post">
                                @method('DELETE')
                                @csrf
                                <button class="font-medium text-blue-600 dark:text-blue-500  hover:underline">
                                    <img src="{{ asset('img/delete_service.svg') }}"
                                        class="w-8 hover:w-9 absolute top-3 right-8 " alt="">

                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </x-slot>
            <x-slot name="pagination">
                <div class="row">

                    <div class="col-md-12">

                        {{ $bookings->links('pagination::tailwind') }}

                    </div>

                </div>
            </x-slot>

        </x-table-booking>
    @endsection

</x-dashboard>
@endsection
