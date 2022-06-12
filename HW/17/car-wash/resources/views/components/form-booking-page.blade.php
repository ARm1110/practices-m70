<div class="px-8 py-6 mx-4 mt-4 text-left bg-white shadow-lg md:w-1/3 lg:w-1/3 sm:w-1/3">
    <div class="flex justify-center">
        <img class="  " style="width: 100px" src="{{ asset('img/reservation.svg') }}" alt="car-wash">
    </div>
</div>
<h3 class="text-2xl font-bold text-center">Reserve</h3>
<form action="" method="POST">
    @csrf
    <div class="mt-4">
        <div>
            <label class="block " for="Name">Email<label>
                    <input type="text" placeholder="Email" name="email"
                        class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600">
        </div>
        <div class="mt-4">


            <div class="timepicker relative form-floating mb-3 xl:w-96" data-mdb-with-icon="false"
                id="input-toggle-timepicker">
                <input type="date"
                    class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                    placeholder="Select a date" data-mdb-toggle="input-toggle-timepicker" />

            </div>
        </div>

    </div>
    <div class="mt-4">
        <label class="block">time picker<label>

                <div class="timepicker relative form-floating mb-3 xl:w-96" data-mdb-with-icon="false"
                    id="input-toggle-timepicker">
                    <input type="time"
                        class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                        placeholder="Select a date" data-mdb-toggle="input-toggle-timepicker" />

                </div>
    </div>
    <div class="mt-4">
        <label class="block">select service<label>
                <div class="flex justify-center">
                    <div class="mb-3 xl:w-96">
                        <select
                            class="form-select appearance-none
      block
      w-full
      px-3
      py-1.5
      text-base
      font-normal
      text-gray-700
      bg-white bg-clip-padding bg-no-repeat
      border border-solid border-gray-300
      rounded
      transition
      ease-in-out
      m-0
      focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                            aria-label="Default select example">
                            <option selected>Open service </option>
                            <option value="basic">Basic</option>
                            <option value="internal_washing">Internal washing</option>
                            <option value="full_washing">Full Washing</option>
                        </select>
                    </div>
                </div>
    </div>

    <div class="flex">
        <button class="w-full px-6 py-2 mt-4 text-white bg-blue-600 rounded-lg hover:bg-blue-900">
            Submit a request
        </button>
    </div>

</form>
</div>
