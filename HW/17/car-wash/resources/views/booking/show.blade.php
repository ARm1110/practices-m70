@extends('layouts.layout')

@section('content')

    <div class="flex  justify-center my-4">
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">



        @section('content')
            <div class=" h-96 pt-6 px-5 ">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">


                        <tr>
                            <th scope="col" class="px-6 py-3">start service</th>
                            <th scope="col" class="px-6 py-3">end service</th>
                            <th scope="col" class="px-6 py-3">token_reserve</th>
                            <th scope="col" class="px-6 py-3">email</th>
                            <th scope="col" class="px-6 py-3">service</th>
                            <th scope="col" class="px-6 py-3">price</th>
                            <th scope="col" class="px-6 py-3">station name</th>
                            <th scope="col" class="px-6 py-3">booking status</th>
                            {{-- <th scope="col" class="px-6 py-3">Edit</th> --}}
                            <th scope="col" class="px-6 py-3">disable</th>

                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            @foreach ($bookings as $booking)
                                <td> {{ $booking->start_time }} </td>
                                <td> {{ $booking->end_time }} </td>
                                <td> {{ $booking->token_reserve }} </td>
                                <td> {{ $booking->user->email }} </td>
                                <td> {{ $booking->service->name }} </td>
                                <td> {{ $booking->service->price }} </td>
                                <td> {{ $booking->station->name }} </td>
                                <td>
                                    {{ $booking->status ? 'Active' : 'Inactive' }}
                                </td>
                            @endforeach
                            {{-- <td class="px-4 py-4 text-right ">
                                <a href="/booking/{{ request()->token }}/edit"
                                    class="font-medium text-yellow-600  dark:text-blue-500 hover:underline">Edit</a>
                            </td> --}}
                            @if ($booking->status)
                                <td class="px-6 py-4 text-right ">
                                    <form method="POST" action="/booking/update/{{ request()->token }}">
                                        @method('put')
                                        @csrf
                                        <button id="send_delete" name="process" value="user_action"
                                            class="font-medium text-red-600  dark:text-blue-500 hover:underline">Disable</button>
                                    </form>
                                </td>
                            @else
                                <td class="px-6 py-4 text-right ">
                                    <button id="send_delete" name="process" value="user_action"
                                        class="font-medium text-green-600  dark:text-green-500 hover:underline">Disabled</button>
                                </td>
                            @endif



                    </tbody>
                </table>
            </div>
        @endsection



    </div>
@endsection
