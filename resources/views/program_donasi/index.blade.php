@extends('layouts.app')

@section('title', 'Donasi Museum')

@section('content')
<!-- About Donation Program -->
<section class="py-12 bg-white">
    <div class="container mx-auto px-6">
        <h2 class="text-3xl font-bold text-center mb-8 text-yellow-900 tracking-wide animate-slide-up relative">
            Bergabung dalam Program Donasi Kami
            <span class="absolute left-1/2 transform -translate-x-1/2 bottom-[-6px] w-16 h-1 bg-[#c8a876] rounded"></span>
        </h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-center">
            <img 
                src="/image/awalan.png" 
                alt="Gambar Museum" 
                class="w-full max-h-[500px] aspect-[3/4] object-cover rounded-lg shadow-lg hover:scale-105 transform transition duration-300 animate-fade-in">
            <div class="animate-slide-up">
                <h3 class="text-2xl font-semibold mb-4 text-gray-800 underline decoration-[#c09858] decoration-2">Mengapa Donasi?</h3>
                <p class="text-gray-700 mb-6 leading-relaxed">
                    Dengan mendonasikan uang, Anda berkontribusi dalam pelestarian sejarah dan edukasi tentang dampak budaya dan ekonomi tembakau.
                    Dukungan Anda membantu kami untuk menjaga koleksi, mengadakan acara edukasi, dan memperluas koleksi kami.
                </p>
                <ul class="list-disc pl-6 space-y-2 text-gray-700">
                    <li class="hover:text-[#c09858] transition">Mendukung upaya konservasi untuk artefak bersejarah.</li>
                    <li class="hover:text-[#c09858] transition">Memberikan dana untuk program pendidikan di komunitas lokal.</li>
                    <li class="hover:text-[#c09858] transition">Menambah pengalaman pengunjung dengan pameran interaktif.</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<!-- Benefits Section -->
<section class="py-12 bg-white">
    <div class="container mx-auto px-6">
        <h2 class="text-3xl font-bold text-center mb-8 text-yellow-900 tracking-wide animate-slide-up relative">
            Bagaimana Donasi Anda Membantu
            <span class="absolute left-1/2 transform -translate-x-1/2 bottom-[-6px] w-16 h-1 bg-[#c8a876] rounded"></span>
        </h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="text-center animate-fade-in">
                <img src="/image/image 8.png" alt="Konservasi" class="w-full h-40 object-cover rounded-lg mb-4">
                <h3 class="text-xl font-semibold mb-2 underline decoration-[#c09858] decoration-2">Konservasi</h3>
                <p class="text-gray-700">Menjaga dan melindungi artefak serta pameran bersejarah.</p>
            </div>
            <div class="text-center animate-fade-in">
                <img src="/image/edukasi.jpeg" alt="Edukasi" class="w-full h-40 object-cover rounded-lg mb-4">
                <h3 class="text-xl font-semibold mb-2 underline decoration-[#c09858] decoration-2">Edukasi</h3>
                <p class="text-gray-700">Mendanai workshop, seminar, dan pameran interaktif untuk segala usia.</p>
            </div>
            <div class="text-center animate-fade-in">
                <img src="/image/komunitas.jpeg" alt="Keterlibatan Komunitas" class="w-full h-40 object-cover rounded-lg mb-4">
                <h3 class="text-xl font-semibold mb-2 underline decoration-[#c09858] decoration-2">Keterlibatan Komunitas</h3>
                <p class="text-gray-700">Mendukung komunitas lokal melalui program edukasi dan penyuluhan.</p>
            </div>
        </div>
    </div>
  </section>

<!-- Donation Form Section -->
<div class="w-full md:w-1/2 h-auto bg-gradient-to-br from-[#f1e0b5] to-[#d8c29e] rounded-2xl shadow-xl overflow-hidden mx-auto transform transition-all duration-500 hover:scale-105 hover:shadow-2xl animate__animated animate__fadeIn">
    <div class="p-8 bg-white">
        <h3 class="text-4xl font-extrabold mb-6 text-center text-[#8b5e34] tracking-wide">Program Donasi</h3>
        <form id="donation-form">
            <!-- Nama Donatur -->
            <label for="donor-name" class="block text-lg font-semibold text-gray-700 mb-2">Nama Donatur</label>
            <input
                type="text"
                id="donor-name"
                placeholder="Nama Lengkap"
                class="w-full px-6 py-4 mb-6 rounded-xl bg-gray-50 border-2 border-gray-300 text-gray-700 focus:ring-2 focus:ring-[#c09858] focus:border-[#c09858] outline-none transition duration-300 transform hover:scale-105 hover:bg-gray-100 shadow-md"
            />

            <!-- Email -->
            <label for="email" class="block text-lg font-semibold text-gray-700 mb-2">Email</label>
            <input
                type="email"
                id="email"
                placeholder="Alamat Email"
                class="w-full px-6 py-4 mb-6 rounded-xl bg-gray-50 border-2 border-gray-300 text-gray-700 focus:ring-2 focus:ring-[#c09858] focus:border-[#c09858] outline-none transition duration-300 transform hover:scale-105 hover:bg-gray-100 shadow-md"
            />

            <!-- Nominal Donasi -->
            <label for="donation-amount" class="block text-lg font-semibold text-gray-700 mb-2">Nominal Donasi</label>
            <select
                id="donation-amount"
                class="w-full px-6 py-4 mb-6 rounded-xl bg-gray-50 border-2 border-gray-300 text-gray-700 focus:ring-2 focus:ring-[#c09858] focus:border-[#c09858] outline-none transition duration-300 transform hover:scale-105 hover:bg-gray-100 shadow-md"
            >
                <option value="50000">Rp50.000</option>
                <option value="100000">Rp100.000</option>
                <option value="200000">Rp200.000</option>
                <option value="500000">Rp500.000</option>
                <option value="custom">Lainnya</option>
            </select>

            <!-- Nominal Custom -->
            <div id="custom-amount-container" class="hidden mt-2">
                <label for="custom-amount" class="block text-lg font-semibold text-gray-700 mb-2">Nominal Lainnya</label>
                <input
                    type="number"
                    id="custom-amount"
                    placeholder="Masukkan nominal"
                    class="w-full px-6 py-4 mb-6 rounded-xl bg-gray-50 border-2 border-gray-300 text-gray-700 focus:ring-2 focus:ring-[#c09858] focus:border-[#c09858] outline-none transition duration-300 transform hover:scale-105 hover:bg-gray-100 shadow-md"
                />
            </div>

            <!-- Catatan -->
            <label for="notes" class="block text-lg font-semibold text-gray-700 mb-2">Catatan (Opsional)</label>
            <textarea
                id="notes"
                placeholder="Tulis pesan atau dedikasi"
                class="w-full px-6 py-4 mb-6 rounded-xl bg-gray-50 border-2 border-gray-300 text-gray-700 focus:ring-2 focus:ring-[#c09858] focus:border-[#c09858] outline-none transition duration-300 transform hover:scale-105 hover:bg-gray-100 shadow-md"
            ></textarea>

            <!-- Submit Button -->
            <button
                type="submit"
                class="w-full py-4 bg-yellow-900 text-white font-semibold text-xl rounded-xl hover:bg-[#704927] transition-all duration-300 focus:ring-2 focus:ring-[#8b5e34] focus:outline-none transform hover:scale-105 shadow-lg"
            >
                DONASI SEKARANG
            </button>
        </form>
    </div>
</div>



<!-- Popup for confirmation -->
<div id="popup" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
    <div class="bg-white rounded-lg shadow-lg p-6 w-80 animate__animated animate__fadeIn animate__delay-2s">
        <h3 class="text-xl font-bold mb-4 text-center text-[#c09858]">Detail Donasi</h3>
        <p class="text-gray-700 mb-2"><strong>Nama Donatur:</strong> <span id="popup-name"></span></p>
        <p class="text-gray-700 mb-2"><strong>Email:</strong> <span id="popup-email"></span></p>
        <p class="text-gray-700 mb-4"><strong>Nominal Donasi:</strong> <span id="popup-amount"></span></p>
        <img id="popup-qris" src="qris-placeholder.png" alt="QRIS Code" class="w-full h-auto rounded shadow mb-4" />
        <button onclick="closePopup()" class="mt-4 bg-[#8b5e34] text-white px-4 py-2 rounded-lg hover:bg-[#704927] transition focus:outline-none focus:ring focus:ring-[#8b5e34]">
            Tutup
        </button>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('donation-form');
    const popup = document.getElementById('popup');
    const popupName = document.getElementById('popup-name');
    const popupEmail = document.getElementById('popup-email');
    const popupAmount = document.getElementById('popup-amount');
    const popupQris = document.getElementById('popup-qris');
    const customAmountInput = document.getElementById('custom-amount');
    const customAmountContainer = document.getElementById('custom-amount-container');

    form.addEventListener('submit', function (event) {
        event.preventDefault();

        const donorName = document.getElementById('donor-name').value;
        const email = document.getElementById('email').value;
        const donationAmount = document.getElementById('donation-amount').value;
        let donationAmountValue = donationAmount === 'custom' ? customAmountInput.value : donationAmount;

        popupName.textContent = donorName;
        popupEmail.textContent = email;
        popupAmount.textContent = `Rp${parseInt(donationAmountValue).toLocaleString()}`;
        popupQris.src = 'qris-placeholder.png'; 

        popup.classList.remove('hidden');
        popup.classList.add('animate__fadeIn');
        form.reset();
    });

    window.closePopup = function () {
        popup.classList.add('hidden');
    };

    document.getElementById('donation-amount').addEventListener('change', function () {
        if (this.value === 'custom') {
            customAmountContainer.classList.remove('hidden');
        } else {
            customAmountContainer.classList.add('hidden');
        }
    });
});
</script>

@endsection
