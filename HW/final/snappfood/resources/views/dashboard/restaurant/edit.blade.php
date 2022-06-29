@extends('layouts.layout')

@section('content')
    <x-dashboard>

        <x-slot name="content">


        </x-slot>
    @section('homePage')
        <!-- component -->
        <form action="/shopper/restaurant/{{ $restaurant->id }}/edit" method="post">
            @method('put')
            @csrf
            <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 flex flex-col my-2">
                <div class="-mx-3 md:flex mb-6">
                    <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2"
                            for="grid-first-name">
                            Name
                        </label>
                        <input
                            class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4 mb-3"
                            id="grid-first-name" type="text" name=" restaurant_name"
                            value="{{ $restaurant->restaurant_name }}">
                        @error('name')
                            <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                    <div class="md:w-1/2 px-3">
                        <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="time">
                            close time
                        </label>
                        <input
                            class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4"
                            id="time" type="time" name="closing_hours" value="{{ $restaurant->closing_hours }}">
                        @error('close_time')
                            <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                    <div class="md:w-1/2 px-3">
                        <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="time">
                            open time
                        </label>
                        <input
                            class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4"
                            id="time" type="time" name="opening_hours" value="{{ $restaurant->opening_hours }}">
                        @error('open_time')
                            <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                    <div class="md:w-1/2 px-3">
                        <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="time">
                            phone number
                        </label>
                        <input
                            class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4"
                            id="time" type="text" name="phone" value="{{ $restaurant->phone_number }}">
                        @error('phone')
                            <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="-mx-3 md:flex mb-6">
                    <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                        <div class="flex flex-col">
                            <div class="md:w-1/2 px-3">
                                <label for="price"
                                    class="mt-4 mb-1 uppercase text-grey-darker text-xs font-bold">description</label>
                                <textarea name="description" id="" cols="30" rows="10"></textarea>
                            </div>
                            <input id="lat" type="hidden" name="lat" value="none">
                            <input id="lng" type="hidden" name="lng" value="none">
                            <div class="mb-4 w-80  h-96 bg-blue-400 relative  ">

                                <x-mapbox id="mapId" :navigationControls="true" :draggable="true" :center="['long' => 51.42, 'lat' => 35.69]"
                                    class=" hellomap  absolute " style="height: 384px; width: 320px ;" />

                                <script>
                                    marker.on('dragend', function(e) {
                                        // here you can get the coordinates as follows 
                                        document.getElementById('lat').value = e.target.getLngLat().lat;
                                        document.getElementById('lng').value = e.target.getLngLat().lng;

                                    });
                                </script>

                            </div>

                        </div>

                    </div>
                </div>
                <div class="-mx-3 md:flex mb-6">
                    <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                        <button type="submit" name="process" value="edit"
                            class="bg-transparent hover:bg-green-500 text-green-700 font-semi bold hover:text-white py-2 px-4 border border-green-500 hover:border-transparent rounded">
                            Update
                        </button>

                    </div>
                </div>
            </div>
        </form>
    @endsection
</x-dashboard>
@endsection
