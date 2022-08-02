<nav class="bg-yellow-300 border-gray-200 px-2 sm:px-4 py-2.5 rounded dark:bg-gray-800">
    <div class="container flex flex-wrap justify-between items-center mx-auto">
        <ul href="#" class="flex items-center">
            <img src="{{ asset('image/reslogo(2).svg') }}" class="mr-3 h-6 sm:h-9" alt="logo image" />
            <span class="self-center text-red-700 text-xl font-semibold whitespace-nowrap dark:text-white"
                style="font-family: 'Lobster Two', cursive;">Online Food</span>

        </ul>
        <div class="flex md:order-2">
            @if (Auth::guest())
                <a href="{{ route('home.show.login') }}"
                    class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-3 md:mr-0 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">Singup
                    or Login </a>
            @else
                <ul class="flex flex-col mt-4 md:flex-row md:space-x-8 md:mt-0 md:text-sm md:font-medium">
                    <li>
                        <a href="#"
                            class="block py-2 pr-4 pl-3 text-gray-700 border-b border-gray-100 hover:bg-gray-50 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 md:dark:hover:text-white dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">
                            {{ Auth::user()->name }}</a>
                    </li>
                    <li>

                        @if (Auth::check() &&
                            Auth::user()->getMedia()->count() > 0)
                            <a href="">
                                <img src=" {{ Auth::user()->getMedia()[0]->getUrl() }}" alt="img-user" width="35px  "
                                    height="35px" class=" rounded-full ">
                            </a>
                        @else
                            <a href="{{ route('profile.index') }}">
                                <img src=" {{ asset('image/user-profile-1.svg') }}" alt="img-user" width="35px  "
                                    height="35px" class=" rounded-full "></a>
                        @endif

                    </li>
                    <li>
                        @if (Auth::check() && Auth::user()->role == 'admin')
                            <div class="relative">
                                <img src="{{ asset('image/bell.svg') }}" class="mr-3 h-6 sm:h-9" alt="logo image" />
                                <div class="absolute">
                                    <span class=" text-white bg-red-600  rounded-full  px-1   ">
                                        <a href="{{ route('dashboard.admin.notification.index') }}">
                                            {{ Auth::user()->unreadNotifications->count() }}</a></span>
                                </div>
                            </div>
                        @endif


                    </li>

                    <li>
                        @if (Auth::check())
                            <a href="#"
                                class="block mt-2 py-2 pr-4 pl-3 text-gray-700 border-b border-gray-100 hover:bg-gray-50 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 md:dark:hover:text-white dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">
                                {{ Auth::user()->fullName }}</a>
                        @endif

                    </li>

                    <li>
                        <a href="{{ route('home.logout') }}"
                            class="block py-2 pr-4 pl-3 text-gray-700 border-b border-gray-100 hover:bg-gray-50 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 md:dark:hover:text-white dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">
                            <img src="{{ asset('image/logout(1).svg') }}" alt="logo" class=" w-8 h-8 ">
                        </a>
                    </li>
                </ul>
            @endif
        </div>
        <div class="hidden justify-between items-center w-full md:flex md:w-auto md:order-1" id="mobile-menu-4">

            <ul class="flex flex-col mt-4 md:flex-row md:space-x-8 md:mt-0 md:text-sm md:font-medium">


                {{-- @if (Auth::check() && Auth::user()->role == 'shopper')
                    <li>
                        <a href="{{ route('home.dashboard') }}"
                            class="block py-2 pr-4 pl-3 text-red-700 border-b border-gray-100 hover:bg-gray-50 md:hover:bg-transparent md:border-0 md:hover:text-red-700 md:p-0 md:dark:hover:text-white dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">dashboard</a>
                    </li>
                @endif --}}
                @if (Auth::check() && Auth::user()->role == 'admin')
                    <li>
                        <a href="{{ route('dashboard.admin') }}"
                            class="block py-2 pr-4 pl-3 text-red-700 border-b border-gray-100 hover:bg-gray-50 md:hover:bg-transparent md:border-0 md:hover:text-red-700 md:p-0 md:dark:hover:text-white dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">
                            Admin Panel</a>
                    </li>
                @endif
                @if (Auth::check() && Auth::user()->role == 'shopper')
                    <li>
                        <a href="{{ route('shopper.index') }}"
                            class="block py-2 pr-4 pl-3 text-red-700 border-b border-gray-100 hover:bg-gray-50 md:hover:bg-transparent md:border-0 md:hover:text-red-700 md:p-0 md:dark:hover:text-white dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">
                            Shopper Panel</a>
                    </li>
                @endif

            </ul>
            {{-- @if (Auth::check() && Auth::user()->role == 'user')
                <li>

                    <a href="/booking"
                        class="block py-2 pr-4 pl-3 text-gray-700 border-b border-gray-100 hover:bg-gray-50 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 md:dark:hover:text-white dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Services
                        List</a>
                </li>
                <li> 
                    <a href="#"
                        class="block py-2 pr-4 pl-3 text-gray-700 border-b border-gray-100 hover:bg-gray-50 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 md:dark:hover:text-white dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Contact</a>
                </li>
            @endif --}}
        </div>
    </div>

</nav>
