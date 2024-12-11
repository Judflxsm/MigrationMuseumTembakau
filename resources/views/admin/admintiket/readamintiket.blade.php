<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Manajemen Koleksi</title>
</head>
<body>
    <div class="flex h-screen">
        <!-- Sidebar -->
        @include('admin.sidebar')

        <!-- Main Content -->
        <div class="flex-1 p-6">
            <h1 class="text-3xl font-bold text-gray-700">TIKETTTTTTT</h1>
        </div>
    </div>
    <table>
        <thead>
            <tr>
                <th>Tipe Tiket</th>
                <th>Jumlah Maksimal</th>
                <th>Jumlah Dipesan</th>
                <th>Tanggal Pemesanan</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tikets as $tiket)
            <tr>
                <td>{{ $tiket->tipe_tiket }}</td>
                <td>{{ $tiket->jumlah_maksimal_pengunjung }}</td>
                <td>{{ $tiket->reserved_tickets }}</td>
                <td>{{ $tiket->tanggal_pemesanan }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    
</body>
</html>