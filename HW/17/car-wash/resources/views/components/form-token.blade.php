{{-- errors --}}

<div role="alert" id="error" class=" absolute top-4  opacity-90 right-0 w-96 hidden  ">
    <div class="bg-red-500 text-white font-bold rounded-t px-4 py-2 " id="title">
        Danger
    </div>
    <div id="body" class="border border-t-0 border-red-400 rounded-b bg-red-100 px-4 py-3 text-red-700">
        <p>Something not ideal might be happening.</p>
    </div>
</div>
{{-- success --}}
<div role="alert" id="success" class=" absolute top-4  opacity-90 right-0 w-96 hidden  ">
    <div class="bg-green-500 text-white font-bold rounded-t px-4 py-2 " id="title">
        success
    </div>
    <div id="body_massage" class="border border-t-0 border-green-400 rounded-b bg-green-100 px-4 py-3 text-green-700">
        <p>this massage success.</p>
    </div>
</div>



<div class="px-8 py-6 mx-4 mt-4 text-left bg-white shadow-lg md:w-1/3 lg:w-1/3 sm:w-1/3">
    <div class="flex justify-center">
        <img class="  " style="width: 100px" src="{{ asset('img/token.png') }}" alt="car-wash">
    </div>
</div>


<form>


    <div class="mt-4">
        <div>
            <label class="block " for="Name">token<label>
                    <input type="text" placeholder="token" name="token"
                        class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600">
        </div>
    </div>

    <div class="flex">
        <button id="send_token" type="submit"
            class="w-full px-6 py-2 mt-4 text-white bg-blue-600 rounded-lg hover:bg-blue-900">
            show service
        </button>
    </div>
    <script src="{{ asset('js/ajax.js') }}"></script>
</form>
</div>
