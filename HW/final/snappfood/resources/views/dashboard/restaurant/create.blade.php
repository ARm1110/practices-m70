@extends('layouts.layout')



@section('content')
    <div class="w-full flex justify-center" style="height: 1200px">
        <div class="w-full max-w-xs mt-10 ">
            <form class="bg-white shadow-md rounded w-96 px-8 pt-6 pb-8 mb-4" method="post" action="/shopper/add-restaurant">
                @csrf
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="restaurant">
                        restaurant name
                    </label>
                    <input
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="restaurant" name="name" type="text" placeholder="restaurant">
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="phone">
                        phone
                    </label>
                    <input
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="phone" type="text" name="phone" placeholder="phone">
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="address">
                        Address
                    </label>
                    <input
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="address" name="address" type="text" placeholder="address">
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="o_time">
                        opening time
                    </label>
                    <input
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="o_time" name="opening_hours" type="time">
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="c_time">
                        closing time
                    </label>
                    <input
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="c_time" name="closing_hours" type="time">
                </div>
                <div class="mb-4">
                    <label for="city" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Select
                        city
                    </label>
                    <select id="city" name="city"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option selected>Choose a city</option>
                        @foreach ($data['cities'] as $city)
                            <option value={{ $city['id'] }}>{{ $city['city_name'] }}</option>
                        @endforeach


                    </select>
                </div>
                <div class="mb-4">
                    <label for="type" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Select
                        type
                    </label>
                    <select id="type" name="category"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option selected>Choose a type</option>
                        @foreach ($data['categories'] as $category)
                            <option value={{ $category['id'] }}>{{ $category['category_name'] }}</option>
                        @endforeach

                    </select>
                </div>
                <input id="lat" type="hidden" name="lat" value="none">
                <input id="lng" type="hidden" name="lng" value="none">
                <div class="mb-4 w-80  h-96 bg-blue-400 relative  ">
                    {{-- <input type="hidden" name="hidden" value="{{  }}"> --}}
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
                <div class="flex items-center justify-between">
                    <button
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                        type="submit">
                        Add
                    </button>
                </div>
            </form>

        </div>
    </div>
@endsection
