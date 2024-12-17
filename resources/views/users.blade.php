@extends('admin.index')

@section('title', 'Koleksi Museum')

@section('content')
<div class="container-fluid px-4">
    <div class="card shadow-lg mt-n4"> <!-- Added mt-n4 to pull the card up -->
        <div class="card-header bg-gradient-primary text-white d-flex justify-content-between align-items-center">
            <h3 class="mb-0">
                <i class="fas fa-ticket-alt me-2"></i>Ticket Management
            </h3>
            <button class="btn btn-outline-light btn-sm">
                <i class="fas fa-plus-circle text-success me-1"></i> Add New Ticket
            </button>
        </div>

        @if (Session::has('success'))
            <div class="alert alert-success alert-dismissible fade show m-3" role="alert">
                {{ Session::get('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="card-body">
            <table id="ticketTable" class="table table-bordered table-striped table-hover">
                <thead class="table-dark">
                    <tr>
                        <th class="text-center">No</th>
                        <th>Full Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Ticket Type</th>
                        <th>Quantity</th>
                        <th>Total Price</th>
                        <th>Purchase Date</th>
                        <th>Visit Date</th>
                        <th class="text-center">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($all_users as $item)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->phone_number }}</td>
                            <td>{{ ucfirst($item->ticket_type) }}</td>
                            <td class="text-center">{{ $item->ticket_quantity }}</td>
                            <td class="text-end">Rp {{ number_format($item->total_price) }}</td>
                            <td>{{ $item->purchase_date }}</td>
                            <td>{{ $item->visit_date }}</td>
                            <td class="text-center">
                                <button class="btn btn-link delete-ticket p-10" 
                                        data-id="{{ $item->id }}" 
                                        title="Delete Ticket">
                                    <i class="fas fa-trash-alt text-danger "></i>
                                </button>
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

    #ticketTable {
        font-size: 0.95rem;
        box-shadow: 0 4px 6px rgba(0,0,0,0.1);
    }
    
    #ticketTable thead th {
        background: linear-gradient(to right, #4a4a4a, #2c3e50);
        color: white;
        vertical-align: middle;
        text-transform: uppercase;
        font-weight: 600;
        border-bottom: 2px solid #212529;
        padding: 12px;
    }
    
    #ticketTable tbody tr {
        transition: all 0.3s ease;
    }

    #ticketTable tbody tr:hover {
        background-color: rgba(0,0,0,0.05);
        transform: translateY(-3px);
        box-shadow: 0 4px 6px rgba(0,0,0,0.1);
    }
    
    #ticketTable td {
        vertical-align: middle;
        border: 1px solid #dee2e6;
        padding: 10px;
    }

    .delete-ticket {
        background: none;
        border: none;
        cursor: pointer;
        transition: transform 0.2s ease;
    }

    .delete-ticket:hover {
        transform: scale(1.2);
    }

    .delete-ticket i {
        font-size: 1rem;
    }
</style>

<!-- DataTables and Delete Functionality Script -->
<script>
    $(document).ready(function() {
        $('#ticketTable').DataTable({
            responsive: true,
            autoWidth: false,
            language: {
                search: "_INPUT_",
                searchPlaceholder: "🔍 Search tickets...",
                lengthMenu: "Show _MENU_ entries"
            },
            columnDefs: [
                { orderable: false, targets: [0, 9] }, // Disable sorting on No and Delete columns
                { width: "5%", targets: [9] }          // Reduced width for Delete column
            ],
            pageLength: 10,
            lengthMenu: [[10, 25, 50, -1], [10, 25, 50, "All"]]
        });

        // Delete Ticket Confirmation
        $('.delete-ticket').on('click', function() {
            const ticketId = $(this).data('id');
            
            Swal.fire({
                title: 'Delete Ticket',
                text: 'Are you sure you want to delete this ticket? This action cannot be undone.',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d9534f',
                cancelButtonColor: '#5bc0de',
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'Cancel'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = `/delete/${ticketId}`;
                }
            });
        });
    });
</script>

<!-- Required Libraries -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endsection