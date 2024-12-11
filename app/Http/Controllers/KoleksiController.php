<?php

namespace App\Http\Controllers;

use App\Models\Koleksi;
use App\Models\Admin;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;


class KoleksiController extends Controller
{
    public function index()
    {
        $koleksi = Koleksi::all();
        return view('koleksi.index', compact('koleksi')); 
        
    } 

    public function indexadmin()
    {
        $koleksis = Koleksi::all();
        return view('admin.adminkoleksi.readadminkoleksi', compact('koleksis')); // Menggunakan 'koleksis' untuk konsistensi
    }
    

    public function store(Request $request)
    {
        // Mengambil admin yang sedang login
        $admin = Admin::find(1); // Misalnya mencari admin dengan ID 1
        
        if ($admin) {
            // Pastikan kita menggunakan relasi yang benar
            $koleksi = new Koleksi();
            $koleksi->judul = $request->judul;
            $koleksi->deskripsi = $request->deskripsi;
            $koleksi->admin_id = $admin->admin_id; // Pastikan menggunakan admin_id dengan benar
            $koleksi->save();
        }
        try {
            // Validasi input
            $request->validate([
                'admin_id' => 'required|exists:admins,admin_id', 
                'judul' => 'required',
                'deskripsi' => 'required',
                'gambar' => 'nullable|image|mimes:png,jpg,jpeg,webp|max:2048'
            ]);
    
            // Upload gambar jika ada
            $gambarPath = null;
            if ($request->file('gambar')) {
                $gambarPath = $request->file('gambar')->store('public');
                $gambarPath = str_replace('public', 'storage', $gambarPath); // Ubah untuk URL
            }
    
            // Simpan data ke tabel Koleksi
            Koleksi::create([
                'admin_id' => $request->admin_id, // Tambahkan admin_id ke dalam data yang disimpan
                'judul' => $request->judul,
                'deskripsi' => $request->deskripsi,
                'gambar' => $gambarPath
            ]);
    
            // Redirect dengan pesan sukses
            return redirect()->route('admin.adminkoleksi.readadminkoleksi')->with('success', 'Koleksi berhasil ditambahkan!');
        } catch (\Exception $e) {
            // Debug error jika terjadi masalah
            dd($e->getMessage());
        }
    }
    

    public function show($id)
    {
        // return Koleksi::with('admin')->findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        // $koleksi = Koleksi::findOrFail($id);

        // $data = $request->validate([
        //     'admin_id' => 'sometimes|exists:admins,admin_id',
        //     'judul' => 'sometimes',
        //     'deskripsi' => 'sometimes',
        //     'gambar' => 'sometimes'
        // ]);

        // $koleksi->update($data);
        // return $koleksi;
    }

    public function destroy($id)
    {
        try {
            $koleksi = Koleksi::findOrFail($id);
    
            // Hapus file gambar dari storage
            if ($koleksi->gambar) {
                Storage::delete(str_replace('storage', 'public', $koleksi->gambar));
            }
    
            $koleksi->delete();
            return redirect()->back()->with('success', 'Koleksi berhasil dihapus!');
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }
    

    public function showKoleksi()
    {
        $koleksis = Koleksi::all(); // Ambil semua koleksi dari database
        return view('koleksi.index', compact('koleksis'));
    }
}
