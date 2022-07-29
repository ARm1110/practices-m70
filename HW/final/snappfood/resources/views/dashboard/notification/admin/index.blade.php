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
                     title
                 </th>
                 <th scope="col" class="px-6 py-3">
                     body
                 </th>
                 <th scope="col" class="px-6 py-3">
                     Accept
                 </th>
                 <th scope="col" class="px-6 py-3">
                     reject
                 </th>

             </x-slot>
             <x-slot name="body">
                 @foreach ($notification as $items)
                     <tr
                         class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">

                         <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                             {{ $items->data['data']['title'] ?? null }}
                         </th>
                         <td class="px-6 py-4">
                             {{ $items->data['data']['body'] ?? null }}
                         </td>


                         <td class="px-6 py-4">
                             <form action="{{ route('dashboard.admin.notification.markAsRead') }}" method="post">
                                 @csrf
                                 @method('PUT')
                                 <input type="hidden" name="id" value="{{ $items->id }}">
                                 <button type="submit">
                                     <span class="bg-gray-200 p-3 rounded-full hover:bg-green-300">
                                         <i class="fa-solid fa-check "></i>
                                     </span>
                                 </button>
                             </form>


                         </td>
                         <td class="px-6 py-4">
                             <form action="{{ route('dashboard.admin.notification.delete') }}" method="post">
                                 @csrf
                                 @method('delete')
                                 <input type="hidden" name="id" value="{{ $items->id }}">
                                 <button type="submit">
                                     <span class="bg-gray-200 p-3 rounded-full hover:bg-green-300">
                                         <i class="fas fa-times"></i>
                                     </span>
                                 </button>

                             </form>
                         </td>


                     </tr>
                 @endforeach
             </x-slot>
             <x-slot name="pagination">

             </x-slot>
         </x-table>
     @endsection
     @section('homePage')
     @endsection
 </x-dashboard>
@endsection
