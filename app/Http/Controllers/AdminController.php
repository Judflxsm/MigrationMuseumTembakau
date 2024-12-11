<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Koleksi;


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

        // Cek apakah username dan password cocok dengan yang telah ditentukan
        if ($credentials['username'] == 'admin' && $credentials['password'] == 'admin123') {
            // Redirect ke dashboard jika login berhasil
            return redirect()->route('admin.dashboard');
        }

        // Jika login gagal, beri pesan error
        return back()->with('error', 'Username atau Password salah');
    }

    // Menampilkan halaman dashboard admin
    public function index()
    {
        $tikets = Tiket::with('admin')->get();
        return view('admin.tiket.index', compact('tikets'));
    }


    // Menampilkan halaman dashboard admin 
    public function dashboard()
    {
        return view('admin.dashboard'); // pastikan Anda memiliki file view 'admin.dashboard'
    }

    // Menampilkan halaman Manajemen Acara (ubah menjadi readAdminAcara)
    public function readAdminAcara()
    {
        return view('admin.adminacara.readadminacara'); // Halaman untuk melihat acara
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
}
