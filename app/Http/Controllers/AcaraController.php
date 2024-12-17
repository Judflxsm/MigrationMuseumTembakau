<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Support\Facades\File;
use App\Models\Acara;
use Illuminate\Http\Request;
use Carbon\Carbon;

class AcaraController extends Controller
{
    public function indexAdmin()
    {
        $acaras = Acara::all();
        return view('acara.index', ['acaras' => $acaras]);
    }


    public function create() {
        $acaras = Acara::all();
        return view('admin.adminacara.readadminacara', compact('acaras'));
    }


    public function store(Request $request)
    {
        try {
            $request->validate([
                'nama_acara' => 'required|string|max:255',
                'tanggal_acara' => 'required|date',
                'deskripsi_singkat' => 'required|string|max:255',
                'deskripsi' => 'required',
                'gambar' => 'nullable|image|mimes:png,jpg,jpeg,webp|max:2048',
                'google_map_url' => 'nullable|url',
            ]);

            $gambarPath = null;
            if ($request->hasFile('gambar')) {
                $gambarPath = $request->file('gambar')->store('uploads','public');
            }

            Acara::create([
                'judul' => $request->judul,
                'nama_acara' => $request->nama_acara,
                'tanggal_acara' => $request->tanggal_acara,
                'deskripsi_singkat' => $request->deskripsi_singkat,
                'deskripsi' => $request->deskripsi,
                'google_map_url' => $request->google_map_url,
                'gambar' => $gambarPath
            ]);

            return redirect()->route('admin.read_adminacara')->with('success', 'Acara berhasil ditambahkan!');
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }


    public function showAcara()
    {
        $acaras = Acara::all(); 
        return view('acara.index', compact('acaras'));  
    }

    public function detailAcara($id)
    {
        $acara = Acara::where('acara_id', $id)->get()->first(); 
        return view('acara.detail', compact('acara'));
    }
    


    public function edit($id)
    {
        $acara = Acara::find($id);

        if (!$acara) {
            return redirect()->route('admin.adminacara.readadminacara')->with('error', 'Data tidak ditemukan.');
        }

        return view('acara.edit', compact('acara'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_acara' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'tanggal_acara' => 'required|date',
            'deskripsi_singkat' => 'required|string|max:255',
            'google_map_url' => 'nullable|url',
        ]);
    
        $acara = Acara::findOrFail($id);
    
        $acara->nama_acara = $request->nama_acara;
        $acara->deskripsi = $request->deskripsi;
        $acara->tanggal_acara = $request->tanggal_acara;
        $acara->deskripsi_singkat = $request->deskripsi_singkat;
        $acara->google_map_url = $request->google_map_url;
    
        $acara->save();
    
        return redirect()->back()->with('success', 'Acara berhasil diperbarui!');
    }
    


    public function destroy($id)
    {
        if (!$id) {
            return redirect()->back()->with('error', 'ID acara tidak ditemukan.');
        }
        $acara = Acara::find($id);
        if (!$acara) {
            return redirect()->back()->with('error', 'Acara tidak ditemukan.');
        }
        try {
            File::delete($acara->gambar);
            $acara->delete(); 
            return redirect()->back()->with('success', 'Acara berhasil dihapus!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }
}
