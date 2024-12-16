<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Koleksi;
use Illuminate\Support\Facades\Auth;
use Illumintate\Foundation\Auth\User as Authcenticable;
use App\Models\Acara;
use App\Models\Donation;
use Illuminate\Support\Facades\Hash;


class AdminController extends Controller
{
    // Menampilkan form login
    public function showLoginForm()
    {
        return view('admin.login');
    }

    // Proses login
    public function login(Request $request)
    {
    // Validasi input username dan password
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        // Cari admin berdasarkan username
        $admin = \App\Models\Admin::where('username', $credentials['username'])->first();

        // Cek apakah admin ditemukan dan password cocok
        if ($admin && Hash::check($credentials['password'], $admin->password)) {
            // Simpan informasi admin ke sesi atau gunakan mekanisme login Laravel
            // session(['admin_id' => $admin->admin_id]);
            // Auth::login($admin);
            $request->session()->put('admin_logged_in', true);
            $request->session()->put('admin_id', $admin->admin_id);

            // Redirect ke dashboard jika login berhasil
            return redirect()->route('admin.dashboard')->with('success', 'Login berhasil!');
        }

            // Jika login gagal, beri pesan error
        return back()->with('error', 'Username atau Password salah');
    }



    // Menampilkan halaman dashboard admin 
    public function dashboard()
    {
        return view('admin.dashboard'); // pastikan Anda memiliki file view 'admin.dashboard'
    }

    // Menampilkan halaman Manajemen Acara (ubah menjadi readAdminAcara)
    public function readAdminAcara()
    {
        $acaras = Acara::all(); // Ambil semua data acara
        return view('admin.adminacara.readadminacara', compact('acaras'));
    }

    public function readAdminKoleksi()
    {
        $koleksis = Koleksi::all(); // Ambil semua data koleksi 
        return view('admin.adminkoleksi.readadminkoleksi', compact('koleksis')); // Kirim ke view
    }
    
    
    public function readAdminTiket()
    {
        return view('admin.admintiket.readadmintiket'); // Halaman untuk melihat acara
    }

    public function readAdminDonasi()
    {
        $donations = Donation::all(); 
        return view('admin.adminprogramdonasi.readadmindonasi', compact('donations'));
    }


}
