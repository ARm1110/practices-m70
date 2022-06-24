@extends('layouts.layout')

@section('content')
    <x-dashboard>
    @section('homePage')
        <!-- component -->
        <form action="/dashboard/stations/{{ $station->id }}/edit" method="post">
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
                            id="grid-first-name" type="text" name="name" value="{{ $station->name }}">
                        @error('name')
                            <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                    <div class="md:w-1/2 px-3">
                        <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2"
                            for="description">
                            description
                        </label>
                        <textarea
                            class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4"
                            id="description" type="textarea" name="description" value="">{{ $station->description }}</textarea>
                        @error('description')
                            <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                                {{ $message }}
                            </span>
                        @enderror
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
