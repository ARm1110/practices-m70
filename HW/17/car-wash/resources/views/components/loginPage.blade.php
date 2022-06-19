<section class="h-screen relative">
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

    <div class="px-6 h-full text-gray-800">

        <div class="flex xl:justify-center lg:justify-between justify-center items-center flex-wrap h-full g-6">
            <div class="grow-0 shrink-1 md:shrink-0 basis-auto xl:w-6/12 lg:w-6/12 md:w-9/12 mb-12 md:mb-0">
                <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.webp"
                    class="w-full" alt="Sample image" />
            </div>

            <div class="xl:ml-20 xl:w-5/12 lg:w-5/12 md:w-8/12 mb-12 md:mb-0">

                <form method="post" action="{{ route('user.login') }}">

                    @csrf
                    <div
                        class="flex items-center my-4 before:flex-1 before:border-t before:border-gray-300 before:mt-0.5 after:flex-1 after:border-t after:border-gray-300 after:mt-0.5">
                        <p class="text-center font-semibold mx-4 mb-0">Login</p>
                    </div>

                    <!-- Email input -->
                    <div class="mb-6">
                        <input type="text"
                            class="form-control block w-full px-4 py-2 text-xl font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                            id="exampleFormControlInput2" name="email" value="{{ old('email') }}"
                            placeholder="Email address" />
                        @error('email')
                            <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>

                    <!-- Password input -->
                    <div class="mb-6">
                        <input type="password"
                            class="form-control block w-full px-4 py-2 text-xl font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                            id="exampleFormControlInput2" name="password" placeholder="******************" />
                        @error('password')
                            <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>

                    <div class="flex justify-between items-center mb-6">
                        <div class="form-group form-check">
                            <input type="checkbox"
                                class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer"
                                id="exampleCheck2" />
                            <label class="form-check-label inline-block text-gray-800" for="exampleCheck2">Remember
                                me</label>
                        </div>
                        <a href="#!" class="text-gray-800">Forgot password?</a>
                    </div>

                    <div class="text-center lg:text-left">
                        <button type="submit"
                            class="inline-block px-7 py-3 bg-blue-600 text-white font-medium text-sm leading-snug uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">
                            Login
                        </button>
                        <p class="text-sm font-semibold mt-2 pt-1 mb-0">
                            Don't have an account?
                            <a href="{{ route('register') }}"
                                class="text-red-600 hover:text-red-700 focus:text-red-700 transition duration-200 ease-in-out">Register</a>
                        </p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
