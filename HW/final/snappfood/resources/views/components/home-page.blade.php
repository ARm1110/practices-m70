    <style>
        /* small css for the mobile nav close */
        #nav-mobile-btn.close span:first-child {
            transform: rotate(45deg);
            top: 4px;
            position: relative;
            background: #a0aec0;
        }

        #nav-mobile-btn.close span:nth-child(2) {
            transform: rotate(-45deg);
            margin-top: 0px;
            background: #a0aec0;
        }
    </style>

    <div
        class="relative items-center justify-center w-full h-full overflow-x-hidden lg:pt-40 lg:pb-40 xl:pt-40 xl:pb-64">
        <div
            class="container flex flex-col items-center justify-between h-full max-w-6xl px-8 mx-auto -mt-32 lg:flex-row xl:px-0">
            <div
                class="z-30 flex flex-col items-center w-full max-w-xl pt-48 text-center lg:items-start lg:w-1/2 lg:pt-20 xl:pt-40 lg:text-left">
                <h1 class="relative mb-4 text-3xl font-black leading-tight text-red-500 sm:text-6xl xl:mb-8">
                    online food </h1>
                <p class="pr-0 mb-8 text-base text-gray-600 sm:text-lg xl:text-xl lg:pr-20">
                    Online food ordering is the process of ordering food, for delivery or pickup, from a website or
                    other application. The product can be either ready-to-eat food (e.g., direct from a home-kitchen,
                    restaurant, or a ghost kitchen) or food that has not been specially prepared for direct consumption
                    (e.g., vegetables direct from a farm/garden, fruits, frozen meats. etc).
                </p>
                @if (Auth::check() && auth()->user()->role == 'user')
                    <x-button>

                    </x-button>
                @endif

                {{-- <a href="#"
                    class="relative self-start inline-block w-auto px-8 py-4 mx-auto mt-0 text-base font-bold text-white bg-red-600 border-t border-gray-200 rounded-md shadow-xl sm:mt-1 fold-bold lg:mx-0">Get
                    Service Now!</a> --}}
            </div>
            <div class="relative z-50 flex flex-col items-end justify-center w-full h-full lg:w-1/2 ms:pl-10">
                <div class="container relative left-0 w-full max-w-4xl lg:absolute xl:max-w-6xl lg:w-screen">

                    <img class="max-w-full  " style="width: 800px" src="{{ asset('image/home-logo.jpg') }}"
                        alt="Food Logo">
                </div>
            </div>
        </div>
    </div>
