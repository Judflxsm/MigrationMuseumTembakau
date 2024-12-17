<?php


namespace App\Http\Controllers;

use App\Models\Donation;
use Illuminate\Http\Request;

class DonationController extends Controller
{
    public function index()
    {
        $donations= Donation::all(); 
        return view('program_donasi.index', compact('donations'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'donor_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'donation_amount' => 'required|numeric',
            'notes' => 'nullable|string',
        ]);

        Donation::create([
            'donor_name' => $request->donor_name,
            'email' => $request->email,
            'amount' => $request->donation_amount, 
            'notes' => $request->notes,
        ]);

        return redirect()->route('program_donasi.index')->with('success', 'Donasi berhasil ditambahkan!');
    }


    public function adminIndex()
    {
        $donations = Donation::all();
        return view('admin.adminprogramdonasi.readadmindonasi', compact('donations'));
    }


    public function destroy($id)
    {
        $donation = Donation::findOrFail($id);
        $donation->delete();
        return redirect()->route('admin.donations.index')->with('success', 'Donasi berhasil dihapus.');
    }
}
