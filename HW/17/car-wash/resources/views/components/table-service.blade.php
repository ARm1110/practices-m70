<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <form action="/dashboard/services/filter" method="post" class="">
        @csrf
        @method('put')
        <div class="p-4 grid grid-cols-8 gap-4">
            <div class="">
                <div class="flex items-center border-b-2 border-gray-200 py-2">
                    <input
                        class="appearance-none bg-transparent border-none w-full text-gray-700 mr-3 py-1 px-2 leading-tight focus:outline-none"
                        type="text" name="name" placeholder="name..." aria-label="Full name">
                </div>
            </div>
            <div class="  ">
                <div class="flex items-center border-b-2 border-gray-200 py-2">
                    <input
                        class="appearance-none bg-transparent border-none w-full text-gray-700 mr-3 py-1 px-2 leading-tight focus:outline-none"
                        type="text" name="time" placeholder="time..." aria-label="Full name">
                </div>
            </div>
            <div class="  ">
                <div class="flex items-center border-b-2 border-gray-200 py-2">
                    <input
                        class="appearance-none bg-transparent border-none w-full text-gray-700 mr-3 py-1 px-2 leading-tight focus:outline-none"
                        type="text" name="price" placeholder="price..." aria-label="Full name">
                </div>
            </div>
            <div class=" ">
                <label for="underline_select" class="sr-only">status</label>
                <select id="underline_select" name="status"
                    class="block py-2.5 px-0 w-full text-sm text-gray-500 bg-transparent border-0 border-b-2 border-gray-200 appearance-none dark:text-gray-400 dark:border-gray-700 focus:outline-none focus:ring-0 focus:border-gray-200 peer">

                    <option value="1">Active</option>
                    <option value="0">disable</option>

                </select>
            </div>

            <div class="  ">
                <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                    <button type="submit" name="process" value="edit"
                        class="bg-transparent hover:bg-green-500 text-green-700 font-semi bold hover:text-white py-2 px-4 border border-green-500 hover:border-transparent rounded-full">
                        filter
                    </button>
                </div>
            </div>

    </form>
    <div class="pt-2">
        <div class="md:w-1/2 px-3 mb-6 md:mb-0">
            <a href="/dashboard/services/create" name="process" value="edit"
                class="bg-transparent hover:bg-green-500 text-green-700 font-semi bold hover:text-white py-2 px-4 border border-green-500 hover:border-transparent rounded-lg ">
                Add
            </a>
        </div>
    </div>
</div>

<div>
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>

                <th scope="col" class="px-6 py-3">
                    Name
                </th>
                <th scope="col" class="px-6 py-3">
                    Time
                </th>
                <th scope="col" class="px-6 py-3">
                    Price
                </th>
                <th scope="col" class="px-6 py-3">
                    status
                </th>

                <th scope="col" class="px-6 py-3">
                    Last Activity
                </th>
                <th scope="col" class="px-6 py-3">
                    Active and Deactivate
                </th>
                <th scope="col" class="px-6 py-3">
                    Edit
                </th>
                <th scope="col" class="px-6 py-3">
                    Delete
                </th>
            </tr>
        </thead>
        <tbody>
            {{ $body }}


        </tbody>
    </table>
    {{ $pagination }}

</div>
</div>
