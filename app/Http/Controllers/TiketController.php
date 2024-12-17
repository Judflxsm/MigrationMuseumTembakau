<?php

// namespace App\Http\Controllers;

// use App\Models\Tiket;
// use Illuminate\Http\Request;

// class TiketController extends Controller
// {
//     public function index()
//     {
//         $tiket = Tiket::all(); 
//         return view('tiket.index', compact('tiket')); 
//     }

//     public function store(Request $request)
//     {
//         $data = $request->validate([
//             'admin_id' => 'required|exists:admins,admin_id',
//             'tipe_tiket' => 'required',
//             'harga' => 'required|numeric',
//             'deskripsi' => 'nullable',
//             'jumlah_maksimal_pengunjung' => 'required|integer',
//             'tanggal_kadaluarsa' => 'required|date',
//         ]);

//         return Tiket::create($data);
//     }

//     public function show($id)
//     {
//         return Tiket::with('admin')->findOrFail($id);
//     }

//     public function update(Request $request, $id)
//     {
//         $tiket = Tiket::findOrFail($id);

//         $data = $request->validate([
//             'admin_id' => 'sometimes|exists:admins,admin_id',
//             'tipe_tiket' => 'sometimes',
//             'harga' => 'sometimes|numeric',
//             'deskripsi' => 'nullable',
//             'jumlah_maksimal_pengunjung' => 'sometimes|integer',
//             'tanggal_kadaluarsa' => 'sometimes|date',
//         ]);

//         $tiket->update($data);
//         return $tiket;
//     }

//     public function destroy($id)
//     {
//         $tiket = Tiket::findOrFail($id);
//         $tiket->delete();

//         return response()->json(['message' => 'Tiket deleted successfully']);
//     }
// }






    namespace App\Http\Controllers;

    use App\Models\Tiket;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Auth;

    class TiketController extends Controller
    {
        public function index()
        {
            $tiket = Tiket::all(); // Ambil semua data tiket
            return view('tiket.index', compact('tiket')); // Kirim ke view
        }

        public function store(Request $request)
        
        {
            $request->validate([
                'tiket_id' => 'required|exists:tikets,tiket_id',
                'jumlah_pesan' => 'required|integer|min:1',
                'tanggal_pemesanan' => 'required|date', 
            ]);

            $tiket = Tiket::findOrFail($request->tiket_id);

            // Cek apakah melebihi batas pemesanan
            if ($tiket->reserved_tickets + $request->jumlah_pesan > 25) {
                return response()->json(['message' => 'Pemesanan tiket telah mencapai batas maksimal untuk hari ini.'], 400);
            }

            // Update jumlah tiket yang dipesan
            $tiket->reserved_tickets += $request->jumlah_pesan;
            $tiket->tanggal_pemesanan = $request->tanggal_pemesanan;
            $tiket->save();

            return response()->json(['message' => 'Pemesanan tiket berhasil.']);
        }


        public function show($id)
        {
            return Tiket::with('admin')->findOrFail($id);
        }

        public function update(Request $request, $id)
        {
            $tiket = Tiket::findOrFail($id);

            $data = $request->validate([
                'admin_id' => 'sometimes|exists:admins,admin_id',
                'tipe_tiket' => 'sometimes',
                'harga' => 'sometimes|numeric',
                'deskripsi' => 'nullable',
                'jumlah_maksimal_pengunjung' => 'sometimes|integer',
                'tanggal_kadaluarsa' => 'sometimes|date',
            ]);

            $tiket->update($data);
            return $tiket;
        }

        public function destroy($id)
        {
            $tiket = Tiket::findOrFail($id);
            $tiket->delete();

            return response()->json(['message' => 'Tiket deleted successfully']);
        }
    }
