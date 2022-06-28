<div class="flex ">
    <aside class="w-64" aria-label="Sidebar">
        <div class="overflow-y-auto  py-4 px-3 bg-yellow-50 rounded dark:bg-gray-800" style="height:900px">
            <ul class="space-y-2">
                {{ $content }}
            </ul>
        </div>
    </aside>
    <div class="px-4">
        @yield('homePage')
    </div>
</div>
