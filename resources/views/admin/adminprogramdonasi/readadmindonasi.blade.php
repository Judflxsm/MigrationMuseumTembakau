@extends('admin.index')

@section('title', 'Acara Museum')

@section('content')
<div class="container-fluid px-4">
    <div class="card shadow-lg mt-n4"> <!-- Added mt-n4 to pull the card up -->
        <div class="card-header bg-gradient-primary text-white d-flex justify-content-between align-items-center">
            <h3 class="mb-0">
                <i class="fas fa-hand-holding-heart me-2"></i>Donasi Management
            </h3>
            <button class="btn btn-outline-light btn-sm">
                <i class="fas fa-plus-circle text-success me-1"></i> Tambah Donasi Baru
            </button>
        </div>

        <div class="card-body">
            <table id="donationTable" class="table table-bordered table-striped table-hover">
                <thead class="table-dark">
                    <tr>
                        <th class="text-center">ID</th>
                        <th>Nama Donatur</th>
                        <th>Email</th>
                        <th>Nominal</th>
                        <th>Catatan</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($donations as $donation)
                        <tr>
                            <td class="text-center">{{ $donation->id }}</td>
                            <td>{{ $donation->donor_name }}</td>
                            <td>{{ $donation->email }}</td>
                            <td class="text-end">Rp{{ number_format($donation->amount, 0, ',', '.') }}</td>
                            <td>{{ $donation->notes }}</td>
                            <td class="text-center">
                                <form action="{{ route('admin.donations.delete', $donation->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-link delete-donation p-0" title="Hapus Donasi">
                                        <i class="fas fa-trash-alt text-danger"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Custom CSS -->
<style>
    body {
        background-color: #f4f6f9;
    }

    #donationTable {
        font-size: 0.95rem;
        box-shadow: 0 4px 6px rgba(0,0,0,0.1);
    }
    
    #donationTable thead th {
        background: linear-gradient(to right, #4a4a4a, #2c3e50);
        color: white;
        vertical-align: middle;
        text-transform: uppercase;
        font-weight: 600;
        border-bottom: 2px solid #212529;
        padding: 12px;
    }
    
    #donationTable tbody tr {
        transition: all 0.3s ease;
    }

    #donationTable tbody tr:hover {
        background-color: rgba(0,0,0,0.05);
        transform: translateY(-3px);
        box-shadow: 0 4px 6px rgba(0,0,0,0.1);
    }
    
    #donationTable td {
        vertical-align: middle;
        border: 1px solid #dee2e6;
        padding: 10px;
    }

    .delete-donation {
        background: none;
        border: none;
        cursor: pointer;
        transition: transform 0.2s ease;
    }

    .delete-donation:hover {
        transform: scale(1.2);
    }

    .delete-donation i {
        font-size: 1rem;
    }
</style>

<!-- DataTables Script -->
<script>
    $(document).ready(function() {
        $('#donationTable').DataTable({
            responsive: true,
            autoWidth: false,
            language: {
                search: "_INPUT_",
                searchPlaceholder: "🔍 Cari donasi...",
                lengthMenu: "Tampilkan _MENU_ entri"
            },
            columnDefs: [
                { orderable: false, targets: [0, 5] }, // Disable sorting on ID and Aksi columns
                { width: "5%", targets: [5] }         // Reduced width for Aksi column
            ],
            pageLength: 10,
            lengthMenu: [[10, 25, 50, -1], [10, 25, 50, "Semua"]]
        });
    });
</script>

<!-- Required Libraries -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
@endsection
