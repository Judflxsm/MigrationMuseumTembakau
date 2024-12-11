<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tiket Museum</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.28.0/feather.min.js" integrity="sha512-7x3zila4t2qNycrtZ31HO0NnJr8kg2VI67YLoRSyi9hGhRN66FHYWr7Axa9Y1J9tGYHVBPqIjSE1ogHrJTz51g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link rel="stylesheet" href="assets/css/tailwind.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <style>
      @keyframes fadeIn {
        from {
          opacity: 0;
          transform: translateY(20px);
        }
        to {
          opacity: 1;
          transform: translateY(0);
        }
      }
  
      .animate-fade-in {
        animation: fadeIn 1s ease-in-out forwards;
      }
  
      .fade-delay-1 {
        animation-delay: 0.5s;
      }
  
      .fade-delay-2 {
        animation-delay: 1s;
      }
  
      .fade-delay-3 {
        animation-delay: 1.5s;
      }
  
      .fade-delay-4 {
        animation-delay: 2s;
      }
    </style>
</head>
<body class="bg-white font-sans">

    <!-- Navbar -->
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


        <div class="container mx-auto flex flex-col md:flex-row mt-10 gap-6 px-4 h-screen">
          <!-- Left Section (Visit Prices) -->
          <div class="w-full md:w-1/2 h-full relative rounded-lg shadow-lg overflow-hidden transform transition duration-500 hover:scale-105">
            <img src="/image/tiket.jpeg" alt="Edukasi" class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-gradient-to-t from-black/80 to-transparent p-8 flex flex-col justify-end text-white">
              <h2 class="text-5xl font-extrabold mb-6 animate-fade-in">Harga Tiket</h2>
              <div class="space-y-6 text-lg">       
                <div>
                  <p class="text-2xl font-semibold">Domestik Jawa Timur</p>
                  <ul class="list-disc pl-6">
                    <li>Umum: <strong>Rp 10.000</strong></li>
                    <li>Pelajar: <strong>Rp 5.000</strong></li>
                  </ul>
                </div>
                <div>
                  <p class="text-2xl font-semibold">Domestik Luar Jatim</p>
                  <ul class="list-disc pl-6">
                    <li>Umum: <strong>Rp 15.000</strong></li>
                    <li>Pelajar: <strong>Rp 7.500</strong></li>
                  </ul>
                </div>
                <div>
                  <p class="text-2xl font-semibold">Mancanegara</p>
                  <ul class="list-disc pl-6">
                    <li><strong>Rp 50.000</strong></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        
          <!-- Right Section (Book Ticket) -->
          <div class="w-full md:w-1/2 h-full bg-white rounded-lg shadow-xl overflow-hidden p-6">
            <div class="max-w-md mx-auto">
              <h3 class="text-3xl font-bold mb-6 text-center">Pesan Tiket</h3>
              <form id="ticket-form">
                <!-- Ticket Categories Dropdown -->
                <div id="ticket-categories" class="space-y-4">
                  <label class="block text-lg font-medium">Kategori Tiket</label>
                  <div class="flex items-center gap-4">
                    <select id="ticket-category" class="w-full px-4 py-3 rounded-lg bg-gray-100 text-gray-800 focus:ring focus:ring-yellow-900 outline-none">
                      <option value="" disabled selected>Pilih Kategori</option>
                      <option value="jatim-umum">Domestik Jatim - Umum (Rp 10.000)</option>
                      <option value="jatim-pelajar">Domestik Jatim - Pelajar (Rp 5.000)</option>
                      <option value="luar-umum">Domestik Luar Jatim - Umum (Rp 15.000)</option>
                      <option value="luar-pelajar">Domestik Luar Jatim - Pelajar (Rp 7.500)</option>
                      <option value="mancanegara">Mancanegara (Rp 50.000)</option>
                    </select>
                    <input type="number" id="ticket-quantity" placeholder="Jumlah" min="1" value="1" class="w-24 px-4 py-3 rounded-lg bg-gray-100 text-gray-800 focus:ring focus:ring-yellow-900 outline-none" />
                  </div>
                  <button type="button" id="add-ticket-btn" class="bg-yellow-900 text-white px-4 py-2 rounded-lg hover:bg-amber-950 transition w-full mt-4">Tambah</button>
                </div>
        
                <!-- Tanggal Kunjungan -->
                <label for="visit-date" class="block text-lg font-medium">Tanggal Kunjungan</label>
                <input type="date" id="visit-date" class="w-full px-4 py-3 mt-4 rounded-lg bg-gray-100 text-gray-800 focus:ring focus:ring-yellow-900 outline-none" required />
        
                <!-- Selected Tickets -->
                <div id="selected-tickets" class="space-y-4 mt-6">
                  <h4 class="text-lg font-semibold">Tiket yang Dipilih:</h4>
                  <ul class="list-disc pl-6"></ul>
                </div>
        
                <!-- Total Price -->
                <p class="text-lg font-semibold mt-6">Total Harga: <span id="total-price" class="text-yellow-900">Rp 0</span></p>
        
                <!-- Name -->
                <input type="text" placeholder="Nama Anda" id="name" class="w-full px-4 py-3 mt-4 rounded-lg bg-gray-100 text-gray-800 focus:ring focus:ring-yellow-900 outline-none" />
        
                <!-- Email -->
                <input type="email" placeholder="Email Anda" id="email" class="w-full px-4 py-3 mt-4 rounded-lg bg-gray-100 text-gray-800 focus:ring focus:ring-yellow-900 outline-none" />
        
                <!-- Submit Button -->
                <button type="button" id="book-ticket-btn" class="w-full mt-6 bg-yellow-900 text-white px-4 py-3 rounded-lg hover:bg-amber-950 transition">Pesan Tiket</button>
              </form>
            </div>
          </div>
        </div>
        

<!-- Modal for Confirmation -->
<div id="ticket-modal" class="fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center hidden">
  <div class="bg-white p-8 rounded-lg shadow-lg max-w-sm w-full">
    <h3 class="text-2xl font-bold mb-4 text-center">Konfirmasi Pemesanan</h3>
    <p class="text-lg mb-4"><strong>Nama:</strong> <span id="modal-name"></span></p>
    <p class="text-lg mb-4"><strong>Email:</strong> <span id="modal-email"></span></p>
    <p class="text-lg mb-4"><strong>Total Harga:</strong> <span id="modal-total-price"></span></p>
    <p class="text-lg mb-4"><strong>Tanggal Kunjungan:</strong> <span id="modal-visit-date"></span></p> <!-- Menampilkan tanggal -->
    <img src="/image/qris.png" alt="QRIS" class="w-1/2 mx-auto mb-4" />
    <button id="confirm-btn" class="w-full bg-green-500 text-white px-4 py-3 rounded-lg hover:bg-green-600">Konfirmasi</button>
  </div>
</div>

<script>
  const prices = {
    "jatim-umum": 10000,
    "jatim-pelajar": 5000,
    "luar-umum": 15000,
    "luar-pelajar": 7500,
    "mancanegara": 50000,
  };

  let selectedTickets = [];

  function updateTotalPrice() {
    const totalPrice = selectedTickets.reduce((sum, ticket) => sum + ticket.quantity * prices[ticket.type], 0);
    document.getElementById("total-price").textContent = `Rp ${totalPrice.toLocaleString()}`;
  }

  document.getElementById("add-ticket-btn").addEventListener("click", () => {
    const type = document.getElementById("ticket-category").value;
    const quantity = parseInt(document.getElementById("ticket-quantity").value);
    if (type && quantity > 0) {
      selectedTickets.push({ type, quantity });
      const list = document.querySelector("#selected-tickets ul");
      const ticketLabel = document.querySelector(`#ticket-category option[value="${type}"]`).textContent;
      const listItem = document.createElement("li");
      listItem.textContent = `${ticketLabel} - ${quantity} tiket`;
      list.appendChild(listItem);
      updateTotalPrice();
    }
  });

  document.getElementById("book-ticket-btn").addEventListener("click", () => {
    document.getElementById("modal-name").textContent = document.getElementById("name").value;
    document.getElementById("modal-email").textContent = document.getElementById("email").value;
    document.getElementById("modal-total-price").textContent = document.getElementById("total-price").textContent;
    document.getElementById("modal-visit-date").textContent = document.getElementById("visit-date").value; // Menambahkan tanggal kunjungan
    document.getElementById("ticket-modal").classList.remove("hidden");
  });

  document.getElementById("confirm-btn").addEventListener("click", () => {
    alert("Tiket berhasil dipesan!");
    document.getElementById("ticket-modal").classList.add("hidden");
  });
</script>
<

    <!-- Footer -->
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
  ankac
  
      <script src="https://unpkg.com/@popperjs/core@2"></>
      <script src="https://unpkg.com/tippy.js@6"></script>
      <script>
          //Init tooltips
          tippy('.avatar')
      </script>

  <script>
    feather.replace()
  </script>
</body>
</html>
