<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Museum Tembakau</title>
        <link rel="stylesheet" href="assets/css/tailwind.css">
        <script src="https://cdn.tailwindcss.com"></script>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.28.0/feather.min.js" integrity="sha512-7x3zila4t2qNycrtZ31HO0NnJr8kg2VI67YLoRSyi9hGhRN66FHYWr7Axa9Y1J9tGYHVBPqIjSE1ogHrJTz51g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
        <link rel="icon" type="image/png" href="{{ asset('assets/logotembakau.png') }}">
    </head> 

    <body class="font-body">
        <!-- home -->
        <section class="bg-white mb-10 md:mb-42 xl:mb-30">
            <div class="container max-w-screen-xl mx-auto px-4">
                <nav class="flex-wrap lg:flex items-center py-7 xl:relative z-10" x-data="{navbarOpen:false}">
                    <div class="flex items-center justify-between mb-10 lg:mb-0">
                        <a href="/">
                            <img src="{{ asset('assets/logo.png') }}" alt="Logo img" width="150">
                        </a>
                        <button class="lg:hidden w-10 h-10 ml-auto flex items-center justify-center text-green-700 border border-green-700 rounded-md" @click="navbarOpen = !navbarOpen">
                            <i data-feather="menu"></i>
                        </button>
                    </div>
                    <ul class="lg:flex flex-col lg:flex-row lg:items-center lg:mx-auto lg:space-x-8 xl:space-x-16" :class="{'hidden':!navbarOpen,'flex':navbarOpen}">
                        <li class="font-semibold text-gray-900 text-lg hover:text-gray-400 transition ease-in-out duration-300 mb-5 lg:mb-0">
                            <a href="/koleksi">Koleksi</a>
                        </li>
                        <li class="font-semibold text-gray-900 text-lg hover:text-gray-400 transition ease-in-out duration-300 mb-5 lg:mb-0">
                            <a href="/acara">Acara</a>
                        </li>
                        <li class="font-semibold text-gray-900 text-lg hover:text-gray-400 transition ease-in-out duration-300 mb-5 lg:mb-0">
                            <a href="/tiket">Tiket</a>
                        </li>
                        <li class="font-semibold text-gray-900 text-lg hover:text-gray-400 transition ease-in-out duration-300 mb-5 lg:mb-0">
                            <a href="/program-donasi">Donasi</a>
                        </li>
                    </ul>
                </nav>

                <div class="flex items-center justify-center xl:justify-start">
                    <div class="mt-28 text-center xl:text-left">
                        <h1 class="font-semibold text-4xl md:text-6xl lg:text-7xl text-gray-900 leading-normal mb-6">Museum <br>Tembakau &<br> Perpustakaan</h1>
                        <p class="font-normal text-xl text-gray-400 leading-relaxed mb-12">Menyampaikan sejarah pertembakauan dengan elegan & <br> mengedukasi masyarakat melalui narasi yang bermakna.</p>
                        <a href="/tiket" class="px-6 py-4 bg-yellow-900 text-white font-semibold text-lg rounded-xl hover:bg-amber-950 transition ease-in-out duration-500">Pesan Tiket</a>
                    </div>
                    <div class="hidden xl:block xl:absolute z-0 top-0 right-0">
                        <img src="{{ asset('assets/Frame 5.png') }}" alt="Home img">
                    </div>
                </div>
            </div> 
        </section>
        
        <!-- koleksi -->
        <section class="bg-white py-10 md:py-16">
            <div class="container max-w-screen-xl mx-auto px-4">
                <h1 class="font-semibold text-gray-900 text-4xl text-center mb-10">Koleksi Kami</h1>
                <div class="flex space-x-4 md:space-x-6 lg:space-x-8">
                    <div>
                        <img src="{{ asset('assets/Frame 6.png') }}" alt="image" class="mb-4 md:mb-6 lg:mb-8 hover:opacity-75 transition ease-in-out duration-500">
                        <img src="{{ asset('assets/Frame 8.png') }}" alt="image" class="hover:opacity-75 transition ease-in-out duration-500">
                    </div>
                    <div>
                        <img src="{{ asset('assets/Frame 9.png') }}" alt="image" class="mb-4 md:mb-6 lg:mb-8 hover:opacity-75 transition ease-in-out duration-500">
                        <img src="{{ asset('assets/Frame 10.png') }}" alt="image" class="mb-3 md:mb-6 lg:mb-8 hover:opacity-75 transition ease-in-out duration-500">
                        <img src="{{ asset('assets/Frame 11.png') }}" alt="image" class="hover:opacity-75 transition ease-in-out duration-500">
                    </div>
                    <div>
                        <img src="{{ asset('assets/Frame 7.png') }}" alt="image" class="mb-4 md:mb-6 lg:mb-8 hover:opacity-75 transition ease-in-out duration-500">
                        <img src="{{ asset('assets/Frame 12.png') }}" alt="image" class="hover:opacity-75 transition ease-in-out duration-500">
                    </div>
                </div>
            </div> 
        </section>


        <!-- footer -->
        <footer class="bg-white py-10 md:py-16">
            <div class="container max-w-screen-xl mx-auto px-4">
                <div class="flex flex-col lg:flex-row justify-between">
                    <div class="text-center lg:text-left mb-10 lg:mb-0">
                        <div class="flex justify-center lg:justify-start mb-5">
                            <img src="{{ asset('assets/logo.png') }}" alt="Logo img" width="150">
                        </div>
                        <div class="flex items-center justify-center lg:justify-start space-x-5">
                            <a href="#" class="px-3 py-3 bg-gray-200 text-gray-700 rounded-full hover:bg-amber-950 hover:text-white transition ease-in-out duration-500">
                                <i data-feather="facebook"></i>
                            </a>
                            <a href="#" class="px-3 py-3 bg-gray-200 text-gray-700 rounded-full hover:bg-amber-950 hover:text-white transition ease-in-out duration-500">
                                <i data-feather="instagram"></i>
                            </a>
                            <a href="#" class="px-3 py-3 bg-gray-200 text-gray-700 rounded-full hover:bg-amber-950 hover:text-white transition ease-in-out duration-500">
                                <i data-feather="linkedin"></i>
                            </a>
                        </div>
                    </div>
                    <div class="text-center lg:text-left mb-10 lg:mb-0">
                        <h4 class="font-semibold text-gray-900 text-2xl mb-6">Alamat</h4>
                        <a href="#" class="block font-light text-gray-400 text-xl mb-6 hover:text-gray-800 transition ease-in-out duration-300">Jl. Kalimantan No. 1<br> Kecamatan Sumbersari <br>Kabupaten Jember<br> Kodepos 68121</a>
                    </div>
                    <div class="text-center lg:text-left mb-10 lg:mb-0">
                        <h4 class="font-semibold text-gray-900 text-2xl mb-6">Hubungi Kami</h4>
                        <a href="#" class="block font-light text-gray-400 text-xl mb-6 hover:text-gray-800 transition ease-in-out duration-300">pengujianmututembakau@yahoo.co.id</a>
                        <a href="#" class="block font-light text-gray-400 text-xl mb-6 hover:text-gray-800 transition ease-in-out duration-300">Office : (0331) 338396</a>
                        <a href="#" class="block font-light text-gray-400 text-xl mb-6 hover:text-gray-800 transition ease-in-out duration-300">WA : +62 823-3577-3521</a>
                    </div>
            </div>
        </footer>

        <script>
            feather.replace()
        </script>
    </body>
</html>