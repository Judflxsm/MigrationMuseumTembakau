<aside id="sidebar"
    class="fixed hidden z-20 h-full top-0 left-0 pt-16 flex lg:flex flex-shrink-0 flex-col w-64 transition-width duration-75"
    aria-label="Sidebar">
    <div class="relative flex-1 flex flex-col min-h-0 border-r border-gray-200 bg-white pt-0">
        <div class="flex-1 flex flex-col pt-5 pb-4 overflow-y-auto">
            <div class="flex-1 px-3 bg-white divide-y space-y-1">
                <ul class="space-y-2 pb-2">
                    <li>
                        <a href="{{ route('admin.read_adminacara') }}" class="block px-4 py-2 rounded-md hover:bg-gray-700">
                            Manajemen Acara
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.read_adminkoleksi') }}" class="block px-4 py-2 rounded-md hover:bg-gray-700">
                            Manajemen Koleksi
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.users') }}" class="block px-4 py-2 rounded-md hover:bg-gray-700">
                            Manajemen Tiket
                        </a>    
                    </li>
                    <li>
                        <a href="{{ route('admin.read_admindonasi') }}" class="block px-4 py-2 rounded-md hover:bg-gray-700">
                            Manajemen Donasi
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</aside>
