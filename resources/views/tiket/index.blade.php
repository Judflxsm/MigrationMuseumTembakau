
@extends('layouts.app')

@section('title', 'Tiket Museum')

@section('content')
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



<div class="container mx-auto flex flex-col md:flex-row mt-10 gap-8 px-4 items-stretch">
  <!-- Left Section (Information) -->
  <div class="w-full md:w-1/2 relative rounded-lg shadow-lg overflow-hidden transform transition duration-500 hover:shadow-xl flex">
    <img src="image/tiket.jpeg" alt="Museum" class="w-full h-full object-cover rounded-lg">
    <div class="absolute inset-0 bg-gradient-to-t from-black/80 to-transparent p-8 flex flex-col justify-end text-white">
      <h2 class="text-4xl font-bold mb-5 animate-fade-in">Visit Prices</h2>
      <p class="text-lg mb-5 leading-relaxed animate-fade-in fade-delay-1">
        Tiket hanya tersedia secara online. Pastikan Anda memesan tiket sebelum kunjungan untuk memastikan akses ke dalam museum.
      </p>
      <div class="space-y-4">
        <div class="opacity-0 transform translate-y-6 transition duration-500 ease-out animate-fade-in fade-delay-2">
          <p class="text-xl font-medium">DEWASA</p>
          <p class="text-2xl font-semibold">Rp 15.000 / Tiket</p>
        </div>
        <div class="opacity-0 transform translate-y-6 transition duration-500 ease-out animate-fade-in fade-delay-3">
          <p class="text-xl font-medium">ANAK-ANAK</p>
          <p class="text-2xl font-semibold">Rp 5.000 / Tiket</p>
        </div>
      </div>
    </div>
  </div>

  <!-- Right Section (Form) -->
  <!-- Right Section (Form) -->
<div class="w-full md:w-1/2 h-auto bg-gradient-to-br from-[#f1e0b5] to-[#d8c29e] rounded-2xl shadow-xl overflow-hidden mx-auto transform transition-all duration-500  hover:shadow-2xl animate__animated animate__fadeIn">
  <div class="p-8 bg-white">
    <h2 class="text-4xl font-extrabold mb-6 text-center text-[#8b5e34] tracking-wide">Pesan Tiket</h2>
    @if (Session::has('fail'))
      <span class="block bg-red-100 text-red-700 p-2 rounded mb-4">{{ Session::get('fail') }}</span>
    @endif
    <form action="{{ route('AddUser') }}" method="post" class="space-y-6">
      @csrf
      <!-- Full Name -->
      <label for="full_name" class="block text-lg font-semibold text-gray-700 mb-2">Full Name</label>
      <input 
        type="text" 
        name="full_name" 
        id="full_name" 
        class="w-full px-6 py-4 mb-6 rounded-xl bg-gray-50 border-2 border-gray-300 text-gray-700 focus:ring-2 focus:ring-[#c09858] focus:border-[#c09858] outline-none transition duration-300 transform hover:scale-105 hover:bg-gray-100 shadow-md" 
        value="{{ old('full_name') }}" 
        placeholder="Enter Full Name">
      @error('full_name')
        <span class="text-red-500 text-sm">{{ $message }}</span>
      @enderror

      <!-- Email -->
      <label for="email" class="block text-lg font-semibold text-gray-700 mb-2">Email</label>
      <input 
        type="email" 
        name="email" 
        id="email" 
        class="w-full px-6 py-4 mb-6 rounded-xl bg-gray-50 border-2 border-gray-300 text-gray-700 focus:ring-2 focus:ring-[#c09858] focus:border-[#c09858] outline-none transition duration-300 transform hover:scale-105 hover:bg-gray-100 shadow-md" 
        value="{{ old('email') }}" 
        placeholder="Enter Email">
      @error('email')
        <span class="text-red-500 text-sm">{{ $message }}</span>
      @enderror

      <!-- Phone Number -->
      <label for="phone_number" class="block text-lg font-semibold text-gray-700 mb-2">Phone Number</label>
      <input 
        type="text" 
        name="phone_number" 
        id="phone_number" 
        class="w-full px-6 py-4 mb-6 rounded-xl bg-gray-50 border-2 border-gray-300 text-gray-700 focus:ring-2 focus:ring-[#c09858] focus:border-[#c09858] outline-none transition duration-300 transform hover:scale-105 hover:bg-gray-100 shadow-md" 
        value="{{ old('phone_number') }}" 
        placeholder="Enter Phone Number">
      @error('phone_number')
        <span class="text-red-500 text-sm">{{ $message }}</span>
      @enderror

      <!-- Ticket Type -->
      <label for="ticket_type" class="block text-lg font-semibold text-gray-700 mb-2">Tipe Tiket</label>
      <select 
        name="ticket_type" 
        id="ticket_type" 
        class="w-full px-6 py-4 mb-6 rounded-xl bg-gray-50 border-2 border-gray-300 text-gray-700 focus:ring-2 focus:ring-[#c09858] focus:border-[#c09858] outline-none transition duration-300 transform hover:scale-105 hover:bg-gray-100 shadow-md">
        <option value="dewasa">Dewasa - Rp 15.000</option>
        <option value="anak-anak">Anak-anak - Rp 5.000</option>
      </select>
      @error('ticket_type')
        <span class="text-red-500 text-sm">{{ $message }}</span>
      @enderror

      <!-- Ticket Quantity -->
      <label for="ticket_quantity" class="block text-lg font-semibold text-gray-700 mb-2">Jumlah Tiket</label>
      <input 
        type="number" 
        name="ticket_quantity" 
        id="ticket_quantity" 
        class="w-full px-6 py-4 mb-6 rounded-xl bg-gray-50 border-2 border-gray-300 text-gray-700 focus:ring-2 focus:ring-[#c09858] focus:border-[#c09858] outline-none transition duration-300 transform hover:scale-105 hover:bg-gray-100 shadow-md" 
        placeholder="Masukkan jumlah tiket">
      @error('ticket_quantity')
        <span class="text-red-500 text-sm">{{ $message }}</span>
      @enderror

      <!-- Purchase Date -->
      <label for="purchase_date" class="block text-lg font-semibold text-gray-700 mb-2">Tanggal Pembelian</label>
      <input 
        type="date" 
        name="purchase_date" 
        id="purchase_date" 
        class="w-full px-6 py-4 mb-6 rounded-xl bg-gray-50 border-2 border-gray-300 text-gray-700 focus:ring-2 focus:ring-[#c09858] focus:border-[#c09858] outline-none transition duration-300 transform hover:scale-105 hover:bg-gray-100 shadow-md">
      @error('purchase_date')
        <span class="text-red-500 text-sm">{{ $message }}</span>
      @enderror

      <!-- Visit Date -->
      <label for="visit_date" class="block text-lg font-semibold text-gray-700 mb-2">Tanggal Kunjungan</label>
      <input 
        type="date" 
        name="visit_date" 
        id="visit_date" 
        class="w-full px-6 py-4 mb-6 rounded-xl bg-gray-50 border-2 border-gray-300 text-gray-700 focus:ring-2 focus:ring-[#c09858] focus:border-[#c09858] outline-none transition duration-300 transform hover:scale-105 hover:bg-gray-100 shadow-md">
      @error('visit_date')
        <span class="text-red-500 text-sm">{{ $message }}</span>
      @enderror

      <!-- Submit Button -->
      <button 
        type="submit" 
        class="w-full py-4 bg-[#8b5e34] text-white font-semibold text-xl rounded-xl hover:bg-[#704927] transition-all duration-300 focus:ring-2 focus:ring-[#8b5e34] focus:outline-none transform hover:scale-105 shadow-lg">
        Pesan Tiket
      </button>
    </form>
  </div>
</div>
<!-- Modal Pop-up -->
<div id="ticketModal" class="fixed inset-0 flex items-center justify-center bg-gray-800 bg-opacity-50 hidden">
  <div class="bg-white rounded-lg p-8 w-96">
    <h2 class="text-2xl font-bold mb-4">Tiket Anda</h2>
    <p><strong>Nama:</strong> <span id="modalName"></span></p>
    <p><strong>Nomor Telepon:</strong> <span id="modalPhone"></span></p>
    <p><strong>Email:</strong> <span id="modalEmail"></span></p>
    <p><strong>Tipe Tiket:</strong> <span id="modalTicketType"></span></p>
    <p><strong>Total Harga:</strong> <span id="modalTotalPrice"></span></p>
    <div class="mt-4">
      <img src="image/QR.jpeg" alt="QRIS" class="w-40 mx-auto">
    </div>
    <div class="mt-4 flex justify-between">
      <button id="confirmBtn" class="px-6 py-2 bg-green-500 text-white rounded">Konfirmasi</button>
      <button id="cancelBtn" class="px-6 py-2 bg-red-500 text-white rounded">Batal</button>
    </div>
  </div>
</div>



  
</div>  
      <script src="https://unpkg.com/@popperjs/core@2"></script>
      <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
  // Menangani klik tombol "Pesan Tiket"
  $('form').submit(function(event) {
    event.preventDefault(); // Mencegah form dikirim langsung

    // Ambil data dari form
    var fullName = $('#full_name').val();
    var email = $('#email').val();
    var phoneNumber = $('#phone_number').val();
    var ticketType = $('#ticket_type').val();
    var ticketQuantity = $('#ticket_quantity').val();
    var purchaseDate = $('#purchase_date').val();
    var visitDate = $('#visit_date').val();

    // Tentukan harga berdasarkan tipe tiket
    var price = ticketType === 'dewasa' ? 15000 : 5000;
    var totalPrice = price * ticketQuantity;

    // Tampilkan data di modal
    $('#modalName').text(fullName);
    $('#modalPhone').text(phoneNumber);
    $('#modalEmail').text(email);
    $('#modalTicketType').text(ticketType.charAt(0).toUpperCase() + ticketType.slice(1) + ' - Rp ' + price.toLocaleString());
    $('#modalTotalPrice').text('Rp ' + totalPrice.toLocaleString());

    // Gambar QRIS (gunakan QRIS sesuai dengan sistem pembayaran Anda)
    $('#qrisImage').attr('src', 'path/to/qris-image.png');

    // Tampilkan modal
    $('#ticketModal').removeClass('hidden');

    // Jika pengguna mengkonfirmasi
    $('#confirmBtn').click(function() {
      // Kirim data ke server menggunakan AJAX
      $.ajax({
        url: "{{ route('AddUser') }}", // Ganti dengan URL endpoint Anda
        method: "POST",
        data: {
          _token: '{{ csrf_token() }}', // CSRF Token
          full_name: fullName,
          email: email,
          phone_number: phoneNumber,
          ticket_type: ticketType,
          ticket_quantity: ticketQuantity,
          purchase_date: purchaseDate,
          visit_date: visitDate
        },
        success: function(response) {
          // Jika sukses, sembunyikan modal dan tampilkan pesan sukses
          alert('Tiket berhasil dipesan!');
          $('#ticketModal').addClass('hidden');
          // Lakukan tindakan tambahan jika diperlukan (misalnya, reset form)
        },
        error: function(xhr, status, error) {
          alert('Terjadi kesalahan, coba lagi.');
        }
      });
    });

    // Jika pengguna membatalkan
    $('#cancelBtn').click(function() {
      $('#ticketModal').addClass('hidden');
    });
  });
</script>

      
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
@endsection