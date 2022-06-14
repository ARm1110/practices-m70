@extends('layouts.layout')

@section('content')

    <div class="flex  justify-center my-4">
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">



        @section('content')
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">


                    <tr>
                        <th scope="col" class="px-6 py-3">start service</th>
                        <th scope="col" class="px-6 py-3">end service</th>
                        <th scope="col" class="px-6 py-3">service</th>
                        <th scope="col" class="px-6 py-3">price</th>
                        <th scope="col" class="px-6 py-3">Edit</th>
                        <th scope="col" class="px-6 py-3">Delete</th>

                    </tr>
                </thead>
                <tbody>
                    <tr>
                        @foreach ($booking->getAttributes() as $item => $value)
                            @if ($item == 'service')
                                <td> {{ $value }} </td>
                            @endif
                            @if ($item == 'start_time')
                                <td> {{ $value }} </td>
                            @endif
                            @if ($item == 'end_time')
                                <td> {{ $value }} </td>
                            @endif
                            @if ($item == 'price')
                                <td> {{ $value }} </td>
                            @endif
                        @endforeach

                        <td class="px-6 py-4 text-right ">
                            <input type="hidden" name="edit" id="edit" value="edit">
                            <button id="send_edit"
                                class="font-medium text-yellow-600  dark:text-blue-500 hover:underline">Edit</button>
                        </td>
                        <td class="px-6 py-4 text-right ">
                            <input type="hidden" name="delete" id="delete" value="delete">
                            <button id="send_delete"
                                class="font-medium text-red-600  dark:text-blue-500 hover:underline">Delete</button>
                        </td>


                </tbody>
            </table>
        @endsection



    </div>
@endsection
