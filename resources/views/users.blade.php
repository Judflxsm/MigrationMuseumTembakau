@extends('admin.index')

@section('title', 'Koleksi Museum')
@section('content')
        <!-- Main Content -->
        <div class="container">
            <div class="card">
                <div class="card-header">
                    Manajement Tiket
                </div>
                @if (Session::has('success'))
                    <span class="alert alert-success p-2">{{ Session::get('success') }}</span>
                @endif
                @if (Session::has('fail'))
                    <span class="alert alert-danger p-2">{{ Session::get('fail') }}</span>
                @endif
                <div class="card-body">
                    <table class="table table-sm table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>S/N</th>
                                <th>Full Name</th>
                                <th>Email</th>
                                <th>Phone Number</th>
                                <th>Tipe Tiket</th>
                                <th>Jumlah Tiket</th>
                                <th>Total Harga</th>
                                <th>Tanggal Pembelian</th>
                                <th>Tanggal Kunjungan</th> <!-- Tambahkan ini -->
                                <th>Registration Date</th>
                                <th>Last Update</th>
                                <th colspan="2">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (count($all_users) > 0)
                                @foreach ($all_users as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>{{ $item->phone_number }}</td>
                                        <td>{{ ucfirst($item->ticket_type) }}</td>
                                        <td>{{ $item->ticket_quantity }}</td>
                                        <td>Rp {{ number_format($item->total_price) }}</td>
                                        <td>{{ $item->purchase_date }}</td>
                                        <td>{{ $item->visit_date }}</td> <!-- Tambahkan ini -->
                                        <td>{{ $item->created_at }}</td>
                                        <td>{{ $item->updated_at }}</td>
                                        
                                        <td><a href="/delete/{{ $item->id }}" class="btn btn-danger btn-sm">Delete</a></td>
                                    </tr>    
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="12">No Ticket Found!</td> <!-- Update jumlah kolom -->
                                </tr>
                            @endif
                        </tbody>
                        
                    </table>
                </div>
            </div>
        </div>
@endsection