<aside id="sidebar" class="fixed hidden z-20 h-full top-0 left-0 pt-16 flex lg:flex flex-shrink-0 flex-col w-64 transition-width duration-300" aria-label="Sidebar">
    <div class="relative flex-1 flex flex-col min-h-0 bg-gradient-to-b from-[#8B4513] to-[#5D4037] shadow-xl">
        <div class="flex-1 flex flex-col pt-6 pb-4 overflow-y-auto">
            <div class="flex items-center justify-center mb-6">
                <span class="text-white font-bold text-xl">Admin Panel</span>
            </div>

            <nav class="px-4">
                <ul class="space-y-2">
                    <li>
                        <a href="{{ route('admin.read_adminacara') }}" 
                           class="block px-4 py-3 text-white rounded-lg transition-all duration-300 
                                  hover:bg-[#6D4C41] hover:shadow-lg 
                                  focus:outline-none focus:ring-2 focus:ring-[#D2691E] 
                                  flex items-center space-x-3">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z" />
                            </svg>
                            <span>Manajemen Acara</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.read_adminkoleksi') }}" 
                           class="block px-4 py-3 text-white rounded-lg transition-all duration-300 
                                  hover:bg-[#6D4C41] hover:shadow-lg 
                                  focus:outline-none focus:ring-2 focus:ring-[#D2691E] 
                                  flex items-center space-x-3">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                            </svg>
                            <span>Manajemen Koleksi</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.users') }}" 
                           class="block px-4 py-3 text-white rounded-lg transition-all duration-300 
                                  hover:bg-[#6D4C41] hover:shadow-lg 
                                  focus:outline-none focus:ring-2 focus:ring-[#D2691E] 
                                  flex items-center space-x-3">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.768-.231-1.48-.634-2.026M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.768.231-1.48.634-2.026M14 10a4 4 0 11-8 0 4 4 0 018 0zm-4-2a2 2 0 100 4 2 2 0 000-4z" />
                            </svg>
                            <span>Manajemen Tiket</span>
                        </a>    
                    </li>
                    <li>
                        <a href="{{ route('admin.read_admindonasi') }}" 
                           class="block px-4 py-3 text-white rounded-lg transition-all duration-300 
                                  hover:bg-[#6D4C41] hover:shadow-lg 
                                  focus:outline-none focus:ring-2 focus:ring-[#D2691E] 
                                  flex items-center space-x-3">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <span>Manajemen Donasi</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</aside>

<style>
    /* Custom scrollbar for sidebar */
    #sidebar::-webkit-scrollbar {
        width: 8px;
    }
    
    #sidebar::-webkit-scrollbar-track {
        background: #8B4513;
    }
    
    #sidebar::-webkit-scrollbar-thumb {
        background: #D2691E;
        border-radius: 4px;
    }
</style>