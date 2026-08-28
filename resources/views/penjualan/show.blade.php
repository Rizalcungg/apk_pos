@extends('layouts.app')

@section('content')
<div class="container my-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Detail Transaksi #{{ $penjualan->id }}</h2>
        <a href="{{ route('penjualan.index') }}" class="btn btn-secondary">Kembali</a>
    </div>

    <div class="card mb-4">
        <div class="card-body">
            <div class="row">
                <div class="col-md-3">
                    <strong>Tanggal Transaksi:</strong>
                    <p>{{ $penjualan->created_at ? $penjualan->created_at->format('d-m-Y H:i:s') : '-' }}</p>
                </div>
                <div class="col-md-3">
                    <strong>Kasir:</strong>
                    <p>{{ $penjualan->user->name ?? '-' }}</p>
                </div>
                <div class="col-md-3">
                    <strong>Metode Pembayaran:</strong>
                    <p><span class="badge bg-info text-dark">{{ $penjualan->metode_pembayaran }}</span></p>
                </div>
                <div class="col-md-3">
                    <strong>Status:</strong>
                    <p>
                        <span class="badge {{ $penjualan->status === 'COMPLETED' ? 'bg-success' : 'bg-warning' }}">
                            {{ $penjualan->status }}
                        </span>
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header fw-bold">Daftar Produk</div>
        <div class="card-body p-0">
            <table class="table table-striped mb-0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama Produk</th>
                        <th>Harga Satuan</th>
                        <th>Jumlah</th>
                        <th>Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($penjualan->itemPenjualan as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->produk->nama ?? 'Produk Dihapus' }}</td>
                            <td>Rp {{ number_format($item->harga_satuan ?? 0, 0, ',', '.') }}</td>
                            <td>{{ $item->kuantitas }}</td>
                            <td>Rp {{ number_format($item->subtotal ?? 0, 0, ',', '.') }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center">Tidak ada item dalam transaksi ini.</td>
                        </tr>
                    @endforelse
                </tbody>
                <tfoot>
                    <tr>
                        <th colspan="4" class="text-end">Total Pembayaran:</th>
                        <th>Rp {{ number_format($penjualan->total_pembayaran, 0, ',', '.') }}</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
@endsection