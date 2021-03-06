<div class="px-8 py-6 mx-4 mt-4 text-left bg-white shadow-lg md:w-1/3 lg:w-1/3 sm:w-1/3">
    <div class="flex justify-center">
        <img class="  " style="width: 100px" src="{{ asset('img/reservation.svg') }}" alt="car-wash">
    </div>
</div>
<div>

    <h3 class="text-2xl font-bold text-center">Reserve</h3>
    @if ($errors->any())
        <div class="bg-red-100 border-l-4 border-orange-500 text-orange-700 p-4  " role="alert">
            <p class="font-bold"> Please check the following messages :</p>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</div>
{{-- <form action="{{ route('booking.store') }}" method="POST"> --}}
<form action="{{ route('booking.store') }}" method="POST">
    @csrf
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="mt-4">

        <div class="mt-4">
            <div class="timepicker relative form-floating mb-3 xl:w-96" data-mdb-with-icon="false"
                id="input-toggle-timepicker">
                <input type="date" name="date"
                    class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                    placeholder="Select a date" data-mdb-toggle="input-toggle-timepicker" />

            </div>
        </div>

    </div>
    <div class="mt-4">


        <div class="timepicker relative form-floating mb-3 xl:w-96" data-mdb-with-icon="false"
            id="input-toggle-timepicker">
            <input type="time" name="time"
                class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                placeholder="Select a date" data-mdb-toggle="input-toggle-timepicker" />

        </div>
    </div>
    <div>

        <div class="form-check">
            <label class="form-check-label inline-block text-gray-800" for="flexCheckChecked">
                do you first time get reserve?
            </label>
            <div class="flex justify-center">
                <div class="mb-3 xl:w-96">
                    <select name="fastService"
                        class="form-select appearance-none  block w-full px-3py-1.5text-base font-normal text-gray-700 bg-white bg-clip-padding bg-no-repeatborder border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                        aria-label="Default select example">
                        <option disabled selected> select...</option>
                        <option value="true">Yes <span class=" font-thin">( Not important select time)</span>
                        </option>
                        <option value="false">No</option>
                    </select>
                </div>
            </div>

        </div>

    </div>
    <div class="mt-4">
        <label class="block">select service<label>
                <div class="flex justify-center">
                    <div class="mb-3 xl:w-96">
                        {{ $body }}
                    </div>
                </div>
    </div>

    <div class="flex">
        <button id="send" type="submit"
            class="w-full px-6 py-2 mt-4 text-white bg-blue-600 rounded-lg hover:bg-blue-900">
            Submit a request
        </button>
    </div>
    {{-- <script src="{{ asset('js/ajax.js') }}"></script> --}}
</form>
</div>
