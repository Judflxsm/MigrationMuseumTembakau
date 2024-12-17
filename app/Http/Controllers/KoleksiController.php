<?php

namespace App\Http\Controllers;

use App\Models\Koleksi;
use App\Models\Admin;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;


class KoleksiController extends Controller
{
    public function indexAdmin()
    {
        $koleksis = Koleksi::all();
        return view('koleksi.index', ['koleksis' => $koleksis]);
    }


    public function create() {
        $koleksis = Koleksi::all();
        return view('admin.adminkoleksi.readadminkoleksi', compact('koleksis'));
    }


    public function store(Request $request)
    {
        try {
            $request->validate([
                'judul' => 'required',
                'deskripsi_singkat' => 'required|string|max:255',
                'deskripsi' => 'required',
                'gambar' => 'required|image|mimes:png,jpg,jpeg,webp|max:2048'
            ]);

            $gambarPath = null;
            if ($request->hasFile('gambar')) {
                $gambarPath = $request->file('gambar')->store('uploads','public');
            }

            Koleksi::create([
                'judul' => $request->judul,
                'deskripsi_singkat' => $request->deskripsi_singkat,
                'deskripsi' => $request->deskripsi,
                'gambar' => $gambarPath
            ]);

            return redirect()->route('admin.read_adminkoleksi')->with('success', 'Koleksi berhasil ditambahkan!');
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }

    public function showKoleksi()
    {
        $koleksis = Koleksi::all();
        return view('koleksi.index', compact('koleksis'));
    }


    public function detailKoleksi($id)
    {
        $koleksi = Koleksi::where('koleksi_id', $id)->get()->first();
        return view('koleksi.detail', compact('koleksi'));
    }


    public function edit($id)
    {
        $koleksi = Koleksi::find($id);

        if (!$koleksi) {
            return redirect()->route('admin.adminkoleksi.readadminkoleksi')->with('error', 'Data tidak ditemukan.');
        }

        return view('koleksi.edit', compact('koleksi'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'deskripsi_singkat' => 'required|string|max:255'
        ]);
        $koleksi = Koleksi::findOrFail($id);

        $koleksi->judul = $request->input('judul');
        $koleksi->deskripsi = $request->input('deskripsi');
        $koleksi->deskripsi_singkat = $request->input('deskripsi_singkat');

        $koleksi->save();

        return redirect()->back()->with('success', 'Koleksi berhasil diperbarui.');
    }


    public function destroy($id)
    {
        if (!$id) {
            return redirect()->back()->with('error', 'ID koleksi tidak ditemukan.');
        }
        $koleksi = Koleksi::find($id);
        if (!$koleksi) {
            return redirect()->back()->with('error', 'koleksi tidak ditemukan.');
        }
        try {
            File::delete($koleksi->gambar); 
            $koleksi->delete(); 
            return redirect()->back()->with('success', 'koleksi berhasil dihapus!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

}
