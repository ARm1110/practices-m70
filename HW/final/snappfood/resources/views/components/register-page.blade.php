<!-- component -->
<div class="container signup relative ">
    <div class="min-h-screen flex mb-4 row-signup">
        <div class="w-3/5 h-12 row-right">

            <div class="text-dig">
                <p class="w-full text-base sm:text-lg md:text-xl text-center lg:text-2xl xl:text-5xl">
                    Join the easy <br> online food
                </p>
                <div class="text-center mb-4 w-full ">
                    <img src="{{ asset('image/auth-re.png') }}" class=" p-24 ">
                </div>
            </div>
        </div>
        <div class="flex items-center justify-center min-h-screen bg-gray-100">
            <div class="px-2 py-2 mx-4 mt-4 text-left bg-white shadow-lg ">
                <h3 class="text-2xl font-bold text-center">Join us</h3>
                <form action="{{ route('home.register') }}" method="post">
                    @csrf
                    <div class="mt-4">
                        <div>
                            <label class="block" for="Name">Name<label>
                                    <input type="text" placeholder="Name" name="name" value="{{ old('name') }}"
                                        class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600">
                                    @error('name')
                                        <span class="text-xs text-red-400"> {{ $message }}!</span>
                                    @enderror
                        </div>
                        <div>
                            <label class="block" for="Phone">Phone<label>
                                    <input type="text" placeholder="+1 (752) 544-3268" name="phone"
                                        value="{{ old('name') }}"
                                        class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600">
                                    @error('phone')
                                        <span class="text-xs text-red-400"> {{ $message }}!</span>
                                    @enderror
                        </div>
                        <div class="mt-4">
                            <label class="block" for="email">Email<label>
                                    <input type="text" placeholder="Email" name="email"
                                        value="{{ old('email') }}"
                                        class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600">
                                    @error('email')
                                        <span class="text-xs text-red-400"> {{ $message }}!</span>
                                    @enderror
                        </div>
                        <div class="mt-4">
                            <label for="countries"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Select an
                                country</label>
                            <select id="countries" name="city"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option value="null">Select an country</option>
                                {{ $countries }}
                            </select>
                            @error('city')
                                <span class="text-xs text-red-400"> {{ $message }}!</span>
                            @enderror
                        </div>
                        <div class="mt-4">
                            <label class="block">Password<label>
                                    <input type="password" placeholder="*************" name="password"
                                        class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600">
                                    @error('password')
                                        <span class="text-xs text-red-400"> {{ $message }}!</span>
                                    @enderror
                        </div>

                        <div class="mt-4">
                            <label class="block">Confirm Password<label>
                                    <input type="password" placeholder="*************" name="password_confirmation"
                                        class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600">
                                    @error('password_confirmation')
                                        <span class="text-xs text-red-400"> {{ $message }}!</span>
                                    @enderror
                        </div>

                        <div class="flex">
                            <button type="submit"
                                class="w-full px-6 py-2 mt-4 text-white bg-red-600 rounded-lg hover:bg-orange-900">Create
                                Account</button>
                        </div>
                        <div class="mt-6 text-grey-dark">
                            Already have an account?
                            <a class="text-red-600 hover:underline" href="{{ route('home.show.login') }}">
                                Log in
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>
x