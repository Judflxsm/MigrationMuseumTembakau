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
    public function showLoginForm()
    {
        return view('admin.login');
    }


    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $admin = \App\Models\Admin::where('username', $credentials['username'])->first();

        if ($admin && Hash::check($credentials['password'], $admin->password)) {
            $request->session()->put('admin_logged_in', true);
            $request->session()->put('admin_id', $admin->admin_id);
            return redirect()->route('admin.dashboard')->with('success', 'Login berhasil!');
        }

        return back()->with('error', 'Username atau Password salah');
    }



    public function dashboard()
    {
        return view('admin.dashboard'); 
    }


    public function readAdminAcara()
    {
        $acaras = Acara::all();
        return view('admin.adminacara.readadminacara', compact('acaras'));
    }


    public function readAdminKoleksi()
    {
        $koleksis = Koleksi::all(); 
        return view('admin.adminkoleksi.readadminkoleksi', compact('koleksis')); 
    }
    
    
    public function readAdminTiket()
    {
        return view('admin.admintiket.readadmintiket'); 
    }

    
    public function readAdminDonasi()
    {
        $donations = Donation::all(); 
        return view('admin.adminprogramdonasi.readadmindonasi', compact('donations'));
    }


}
