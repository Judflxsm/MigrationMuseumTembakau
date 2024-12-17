<?php


namespace App\Http\Controllers;

use App\Models\Donation;
use Illuminate\Http\Request;

class DonationController extends Controller
{
    // Tampilkan form donasi untuk user
    public function index()
    {
        $donations= Donation::all(); 
        return view('program_donasi.index', compact('donations'));
    }

    // Simpan data donasi
    public function store(Request $request)
    {
        // Validasi input   
        $request->validate([
            'donor_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'donation_amount' => 'required|numeric',
            'notes' => 'nullable|string',
        ]);

        // Simpan data ke database 
        Donation::create([
            'donor_name' => $request->donor_name,
            'email' => $request->email,
            'amount' => $request->donation_amount, // Pastikan ini sesuai dengan nama field di migration
            'notes' => $request->notes,
        ]);

        // Redirect atau memberikan response
        // return redirect()->back()->with('success', 'Donasi berhasil dikirim!');
        return redirect()->route('program_donasi.index')->with('success', 'Donasi berhasil ditambahkan!');

    }
    // Tampilkan halaman admin dengan data donasi
    public function adminIndex()
    {
        $donations = Donation::all();
        return view('admin.adminprogramdonasi.readadmindonasi', compact('donations'));
    }

    // Hapus donasi
    public function destroy($id)
    {
        $donation = Donation::findOrFail($id);
        $donation->delete();
        return redirect()->route('admin.donations.index')->with('success', 'Donasi berhasil dihapus.');
    }
}
