@extends('layouts.layout')


@section('content')
    <div class="w-full flex justify-center" style="height: 1200px">
        <div class="w-full max-w-xs mt-10 ">
            @error('record')
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                    <strong class="font-bold">{{ $message }}</strong>
                </div>
            @enderror
            <form class="bg-gray-100 shadow-md rounded w-96 px-8 pt-6 pb-8 mb-4" method="post"
                action="{{ route('shopper.menu.setPivot') }}">
                @csrf
                <input type="hidden" name="product_id" value="{{ $data['menus'] }}">
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="price">
                        Discount
                    </label>

                    <h3>select one offer</h3>
                    @foreach ($data['offers'] as $item)
                        <span
                            class="inline-block bg-gray-200 rounded-lg px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">
                            <label for="" class="block text-gray-700 text-sm font-bold">
                                <input type="checkbox" name="offer_id" value="{{ $item->id }}" onclick="onlyOne(this)">
                                select
                            </label>
                            discount name: {{ $item->name }} <br>
                            discount value: {{ $item->discount }}
                        </span>
                    @endforeach

                </div>
                <script>
                    function onlyOne(checkbox) {
                        var checkboxes = document.getElementsByName('offer_id')
                        checkboxes.forEach((item) => {
                            if (item !== checkbox) item.checked = false
                        })
                    }
                </script>

                <div class="flex items-center justify-between">
                    <button
                        class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                        type="submit">
                        Add offer
                    </button>
                </div>
            </form>

        </div>
    </div>
@endsection
