@extends('layouts.layout')

@section('content')
    <x-dashboard>
    @section('homePage')
        <x-table-user>
            <x-slot name="title">
                <th scope="col" class="px-6 py-3">
                    Name
                </th>
            </x-slot>

            <x-slot name="body">
                @foreach ($users as $user)
                    <tr
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">

                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                            {{ $user->name }}
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
                            {{ $user->status ? 'Active' : 'Inactive' }}
                        </td>
                        @if ($user->status)
                            <td class="px-6 py-4 text-right relative">
                                <form action="/dashboard/users/update/{{ $user->id }}/{{ $user->status }}"
                                    method="post" class="text-center">
                                    @method('PUT')
                                    @csrf
                                    <button type="submit"
                                        class="font-medium text-red-600 dark:text-red-500 hover:underline">
                                        <img src="{{ asset('img/icons_denied.png') }}"
                                            class="w-10 hover:w-9 absolute top-3 " alt="">
                                    </button>
                                </form>
                            </td>
                        @else
                            <td class="px-6 py-4 text-right relative">
                                <form action="/dashboard/users/update/{{ $user->id }}/{{ $user->status }}"
                                    method="post" class="text-center">
                                    @method('PUT')
                                    @csrf
                                    <button type="submit"
                                        class="font-medium text-green-600 dark:text-green-500 hover:underline">
                                        <img src="{{ asset('img/icons_checked.png') }}"
                                            class="w-10 hover:w-9 absolute top-3" alt=""> </button>
                                </form>
                            </td>
                        @endif

                        <td class="px-6 py-4 text-right relative">
                            <a href="/dashboard/user/show/{{ $user->id }}"
                                class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                                <p class="w-24 hover:bg-green-200 hover:w-20 absolute  top-3"><svg
                                        xmlns="http://www.w3.org/2000/svg" shape-rendering="geometricPrecision"
                                        text-rendering="geometricPrecision" image-rendering="optimizeQuality"
                                        fill-rule="evenodd" clip-rule="evenodd" viewBox="0 0 503.99 155.38">
                                        <path
                                            d="M55.83 75.77c2.53-3.05 5.11-5.78 7.72-8.15 9.31-8.47 19.4-13 29.85-13.22 10.42-.22 21.1 3.84 31.62 12.51 3.12 2.58 6.23 5.55 9.27 8.89.9.99.93 2.48.11 3.5-3.34 4.7-7.06 8.64-11 11.8-8.23 6.56-17.55 9.82-26.99 9.88-9.4.07-18.91-3.02-27.55-9.13-4.69-3.31-9.14-7.5-13.17-12.56-.84-1.06-.75-2.56.14-3.52zM26.44 0h451.11c14.49 0 26.44 11.95 26.44 26.43v102.52c0 14.43-12 26.43-26.44 26.43H26.44C11.94 155.38 0 143.44 0 128.95V26.43C0 11.88 11.88 0 26.44 0zm409.63 100.1c-4.93 0-8.7-1.4-11.3-4.21-2.6-2.81-3.89-6.69-3.89-11.64 0-2.97.6-5.62 1.81-7.96 1.2-2.34 2.95-4.19 5.22-5.54 2.28-1.36 5.04-2.03 8.27-2.03 1.63 0 3.21.18 4.72.56 1.52.37 2.88 1.02 4.09 1.95 1.21.92 2.18 2.19 2.91 3.8.73 1.61 1.11 3.64 1.13 6.09 0 1.1-.03 2.14-.1 3.13-.06.99-.14 1.81-.24 2.47h-17.94c-.26-1.56-.2-4.08.06-4.94h8.99c.1-1.49.03-2.73-.19-3.72-.23-1-.65-1.74-1.24-2.24-.6-.49-1.4-.74-2.41-.74-1.15 0-2.12.31-2.91.95-.8.63-1.4 1.72-1.8 3.25-.72 2.71-.99 8.17.43 10.68.61 1.09 1.48 1.89 2.61 2.38 1.14.49 2.5.74 4.09.74.99 0 2.02-.07 3.1-.22s2.09-.34 3.01-.57c.92-.24 1.63-.49 2.12-.74l1.54 5.26c-.68.55-1.61 1.07-2.81 1.58-1.2.5-2.59.91-4.17 1.23-1.58.32-3.28.48-5.1.48zm-259.84-.32L161.41 58.9h10.87l6.53 20.57 2.03 7.96 2.03-7.96 6.09-20.57h10.86l-14.7 40.88h-8.89zm27.81-.11V69.1h9.93v30.57h-9.93zm4.5-34.24c-1.59 0-2.9-.49-3.93-1.45-1.04-.96-1.56-2.18-1.56-3.66 0-1 .28-1.93.83-2.77.54-.84 1.28-1.52 2.18-2.02.91-.5 1.89-.75 2.97-.75 1.63 0 2.95.47 3.94 1.41 1 .94 1.5 2.18 1.5 3.69 0 1.51-.58 2.8-1.73 3.9s-2.55 1.65-4.2 1.65zm26.51 34.67c-4.94 0-8.71-1.4-11.3-4.21-2.6-2.81-3.9-6.69-3.9-11.64 0-2.97.6-5.62 1.81-7.96s2.95-4.19 5.23-5.54c2.28-1.36 5.03-2.03 8.27-2.03 1.63 0 3.2.18 4.72.56 1.52.37 2.88 1.02 4.08 1.95 1.21.92 2.18 2.19 2.92 3.8.73 1.61 1.1 3.64 1.12 6.09 0 1.1-.03 2.14-.09 3.13-.07.99-.15 1.81-.24 2.47h-17.94c-.15-1.66-.14-3.31.06-4.94h8.99c.09-1.49.03-2.73-.2-3.72-.23-1-.64-1.74-1.24-2.24-.59-.49-1.39-.74-2.4-.74-1.15 0-2.12.31-2.92.95-.79.63-1.4 1.72-1.8 3.25-.71 2.71-.99 8.17.43 10.68.61 1.09 1.48 1.89 2.62 2.38 1.13.49 2.49.74 4.09.74.98 0 2.01-.07 3.09-.22 1.09-.15 2.09-.34 3.01-.57.93-.24 1.63-.49 2.12-.74l1.54 5.26c-.67.55-1.61 1.07-2.8 1.58-1.21.5-2.59.91-4.18 1.23-1.58.32-3.28.48-5.09.48zm23.82 0-9.16-31h9.66l2.79 12.35 1.63 8.1 1.89-8.1 3.62-12.35h8.89l3.62 12.35 1.72 7.96 1.63-7.96 2.9-12.35h9.22l-9.65 31h-8.68l-4.44-15.03-1.12-7.23-1.24 7.23-4.28 15.03h-9zm49.02-.43 4.72-40.77h13.77l4.94 20.9 1.87 9.55 1.48-9.55 4.39-20.9h13.33l5.05 40.77h-9.82l-1.7-21.46-.61-11.74-2.52 12.07-5.49 21.35h-9.05l-5.93-21.35-2.69-12.07-.71 11.74-1.59 21.46h-9.44zm68.31.43c-2.81 0-5.2-.43-7.16-1.3-1.97-.87-3.55-2.06-4.74-3.58-1.19-1.52-2.05-3.26-2.58-5.23-.53-1.97-.79-4.04-.77-6.24.05-3.25.76-6 2.11-8.23 1.36-2.23 3.21-3.92 5.58-5.07 2.35-1.15 5.06-1.73 8.12-1.73 3.76 0 6.77.75 9.01 2.25s3.84 3.48 4.81 5.95c.97 2.47 1.43 5.17 1.37 8.1-.03 3.27-.72 6.02-2.06 8.26-1.35 2.24-3.2 3.95-5.56 5.1-2.36 1.15-5.07 1.72-8.13 1.72zm.22-6.85c1.96 0 3.33-.73 4.08-2.16.76-1.44 1.14-3.6 1.14-6.51 0-1.65-.15-3.16-.47-4.52-.31-1.36-.83-2.45-1.56-3.27-.73-.81-1.74-1.21-3.02-1.21-1.99 0-3.37.72-4.15 2.17-.78 1.44-1.17 3.55-1.17 6.33 0 1.69.16 3.22.48 4.61.32 1.39.85 2.5 1.6 3.32.75.82 1.78 1.24 3.07 1.24zm30.03-19.23c.37-.93.94-1.78 1.69-2.53.86-.88 1.91-1.57 3.12-2.08 1.22-.5 2.54-.75 3.96-.75.44 0 .88.03 1.32.08.44.06.75.14.93.25v9.82c-.24-.16-.61-.33-1.12-.51-.52-.17-1.24-.25-2.17-.25-1.47 0-2.69.21-3.69.64-.99.43-1.8.93-2.41 1.5l-.81.79v18.69h-9.93V69.1H406l.45 4.92zm71.1-63.44H26.44c-8.71 0-15.86 7.14-15.86 15.85v102.52c0 8.67 7.17 15.85 15.86 15.85h451.11c8.65 0 15.86-7.21 15.86-15.85V26.43c0-8.67-7.18-15.85-15.86-15.85zM95.05 67.84c2.71 0 5.18 1.11 6.95 2.89a9.794 9.794 0 0 1 2.89 6.96c0 2.71-1.1 5.18-2.89 6.96a9.786 9.786 0 0 1-6.95 2.88c-2.71 0-5.17-1.1-6.96-2.88a9.827 9.827 0 0 1-2.88-6.96c0-2.71 1.1-5.17 2.88-6.96 1.79-1.78 4.25-2.89 6.96-2.89zm0-6.18c4.42 0 8.43 1.8 11.33 4.7 2.9 2.9 4.7 6.92 4.7 11.33 0 4.42-1.8 8.44-4.7 11.33-2.9 2.9-6.91 4.7-11.33 4.7s-8.43-1.8-11.33-4.7c-2.91-2.89-4.7-6.91-4.7-11.33 0-4.41 1.79-8.42 4.69-11.33 2.92-2.91 6.93-4.7 11.34-4.7z" />
                                    </svg></p>

                            </a>
                        </td>
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

        </x-table-user>
    @endsection

</x-dashboard>
@endsection
