<!-- component -->
<div class="container signup relative ">
    {{-- @if (session('error'))
        <div class="bg-red-100 border-l-4 border-red-500 text-orange-700 p-2 absolute right-0 ">
            <p class="font-bold">alert</p>
            <p> {{ session('error') }}</p>
        </div>
    @endif
    @if (session('success'))
        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-2 absolute right-0 ">
            <p class="font-bold">success</p>
            <p> {{ session('success') }}</p>
        </div>
    @endif --}}

    <div class="min-h-screen flex mb-4 row-signup">
        <div class="w-3/5 h-12 row-right">

            <div class="text-dig">
                <p class="w-full text-base sm:text-lg md:text-xl text-center lg:text-2xl xl:text-5xl">
                    Join the easy <br> carwash online
                </p>
                <div class="text-center mb-4 w-3/5 ">
                    <img src="{{ asset('img/carwash.jpeg') }}" class=" p-24 ">
                </div>
            </div>
        </div>
        <div class="w-2/5  h-12 row-left">

            <div class="form-signup-dig">
                <div class="w-full max-w-xs">
                    <form class="max-w-md mb-4 form-input" action="{{ route('user.register') }}" method="post">
                        @csrf
                        <div class="mb-4">
                            <label class="block text-grey-darker text-sm font-bold mb-2" for="username">
                                name
                            </label>
                            <input
                                class="shadow appearance-none border rounded w-full h-12 py-2 px-3 text-grey-darker leading-tight focus:outline-none focus:shadow-outline"
                                id="username" name="name" value="{{ old('name') }}" type="text"
                                placeholder="Username">

                            @error('name')
                                <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label class="block text-grey-darker text-sm font-bold mb-2" for="phone">
                                phone
                            </label>
                            <input
                                class="shadow appearance-none border rounded w-full h-12 py-2 px-3 text-grey-darker leading-tight focus:outline-none focus:shadow-outline"
                                id="phone" name="phone" value="{{ old('phone') }}" type="text"
                                placeholder="phone">

                            @error('phone')
                                <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <div class="mb-4 relative">
                            <div class="absolute top-10 left-1">
                                <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor"
                                    stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round"
                                    class="h-5 w-5">
                                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                    <circle cx="12" cy="7" r="4"></circle>
                                </svg>
                            </div>
                            <label class="block text-grey-darker  text-sm font-bold mb-2" for="email">
                                Email
                            </label>
                            <input
                                class="shadow appearance-none border border rounded h-12 w-full py-2 px-7    text-grey-darker mb-3 leading-tight focus:outline-none focus:shadow-outline"
                                id="email" type="email" name="email" value="{{ old('email') }}"
                                placeholder="email">
                            @error('email')
                                <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <div class="mb-6">
                            <label class="block text-grey-darker text-sm font-bold mb-2" for="password">
                                Password
                            </label>

                            <input
                                class="shadow appearance-none border border rounded w-full h-12 py-2 px-3 text-grey-darker mb-3 leading-tight focus:outline-none focus:shadow-outline"
                                id="password" name="password" type="password" placeholder="******************">
                            @error('password')
                                <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <div class="mb-6">
                            <label class="block text-grey-darker text-sm font-bold mb-2" for="confirm_password">
                                Confirm Password
                            </label>
                            <input
                                class="shadow appearance-none border border rounded w-full h-12 py-2 px-3 text-grey-darker mb-3 leading-tight focus:outline-none focus:shadow-outline"
                                id="confirm_password" name="confirm_password" type="password"
                                placeholder="******************">
                            @error('confirm_password')
                                <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <div class="flex items-center justify-between">
                            <button type="submit"
                                class="inline-block px-7 py-3 bg-blue-600 text-white font-medium text-sm leading-snug uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">
                                register
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

</div>
