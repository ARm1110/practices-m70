@extends('layouts.layout')

@section('content')
    <div class="flex justify-between my-4">

        <x-form-booking-page>
            <x-slot name="body">
                <select name="service"
                    class="form-select appearance-none  block w-full px-3py-1.5text-base font-normal text-gray-700 bg-white bg-clip-padding bg-no-repeatborder border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                    aria-label="Default select example">
                    <option disabled selected> select...</option>
                    @foreach ($services as $service)
                        <option value="{{ $service->id }}">{{ $service->name }}</option>
                    @endforeach
                </select>
            </x-slot>
        </x-form-booking-page>
    </div>
@endsection
