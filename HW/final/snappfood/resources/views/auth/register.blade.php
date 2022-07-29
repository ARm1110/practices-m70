@extends('layouts.layout')

@section('content')
    <x-register-page>
        <x-slot name="countries">
            @foreach ($data['countries'] as $country)
                <option value="{{ $country->id }}">{{ $country->city_name }}</option>
            @endforeach
        </x-slot>

    </x-register-page>
@endsection
