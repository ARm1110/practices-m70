@extends('layouts.layout')

@section('content')
    <x-dashboard>
    @section('homePage')
        <x-table-service>

            <x-slot name="body">
                @foreach ($services as $service)
                    <tr
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">

                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                            {{ $service->name }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $service->time }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $service->price }}
                        </td>

                        <td class="px-6 py-4">
                            {{ $service->status ? 'Active' : 'Inactive' }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $service->updated_at->diffForHumans() }}
                        </td>
                        @if ($service->status)
                            <td class="px-6 py-4 text-right relative">
                                <form action="/dashboard/service/update/{{ $service->id }}/{{ $service->status }}"
                                    method="post" class="text-center">
                                    @method('PUT')
                                    @csrf
                                    <button type="submit" name="process" value="update_status"
                                        class="font-medium text-red-600 dark:text-red-500 hover:underline ">
                                        <img src="{{ asset('img/server-de.svg') }}" class="w-10 hover:w-9 absolute top-3"
                                            alt="">
                                    </button>
                                </form>
                            </td>
                        @else
                            <td class="px-6 py-4 text-right relative">
                                <form action="/dashboard/service/update/{{ $service->id }}/{{ $service->status }}"
                                    method="post" class="text-center">
                                    @method('PUT')
                                    @csrf
                                    <button type="submit" name="process" value="update_status"
                                        class="font-medium text-green-600 dark:text-green-500 hover:underline">
                                        <img src="{{ asset('img/server-en.svg') }}"
                                            class="w-10 hover:w-9 absolute top-3 " alt=""></button>
                                </form>
                            </td>
                        @endif

                        <td class="px-6 py-4 text-right relative">
                            <a href="/dashboard/service/{{ $service->id }}/edit"
                                class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                                <img src="{{ asset('img/edit.svg') }}" class="w-8 hover:w-9 absolute top-3 "
                                    alt="">

                            </a>
                        </td>
                    </tr>
                @endforeach
            </x-slot>
            <x-slot name="pagination">
                <div class="row">

                    <div class="col-md-12">

                        {{ $services->links('pagination::tailwind') }}

                    </div>

                </div>
            </x-slot>

        </x-table-service>
    @endsection

</x-dashboard>
@endsection
