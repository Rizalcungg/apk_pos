@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')

@include('layouts.navbar')

<div class="container py-4">
    <!-- Header Ringkasan -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold mb-1">Ringkasan Hari Ini</h2>
            <p class="text-muted mb-0"><i class="bi bi-calendar-event me-1"></i> {{ \Carbon\Carbon::now()->translatedFormat('l, d F Y') }}</p>
        </div>
        <a href="{{ route('penjualan.create') }}" class="btn btn-primary shadow-sm">
            <i class="bi bi-plus-lg me-1"></i> Transaksi Baru
        </a>
    </div>

    <!-- Statistik Transaksi & Pembayaran -->
    <h5 class="mb-3 text-secondary fw-semibold">Statistik Transaksi & Pembayaran</h5>
    <div class="row g-3 mb-4">
        <div class="col-md-3 col-sm-6">
            <div class="card border-0 shadow-sm p-3 h-100">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <span class="text-muted small">Total Penjualan</span>
                        <h4 class="fw-bold text-dark mb-0 mt-1">Rp {{ number_format($totalPenjualan ?? 64000, 0, ',', '.') }}</h4>
                    </div>
                    <div class="bg-primary bg-opacity-10 p-2 rounded text-primary">
                        <i class="bi bi-currency-dollar fs-4"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6">
            <div class="card border-0 shadow-sm p-3 h-100">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <span class="text-muted small">Jumlah Transaksi</span>
                        <h4 class="fw-bold text-dark mb-0 mt-1">{{ $jumlahTransaksi ?? 5 }}</h4>
                    </div>
                    <div class="bg-info bg-opacity-10 p-2 rounded text-info">
                        <i class="bi bi-receipt fs-4"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6">
            <div class="card border-0 shadow-sm p-3 h-100">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <span class="text-muted small">Total Tunai</span>
                        <h4 class="fw-bold text-dark mb-0 mt-1">Rp {{ number_format($totalTunai ?? 64000, 0, ',', '.') }}</h4>
                    </div>
                    <div class="bg-success bg-opacity-10 p-2 rounded text-success">
                        <i class="bi bi-wallet2 fs-4"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6">
            <div class="card border-0 shadow-sm p-3 h-100">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <span class="text-muted small">Total Non-Tunai</span>
                        <h4 class="fw-bold text-dark mb-0 mt-1">Rp {{ number_format($totalNonTunai ?? 0, 0, ',', '.') }}</h4>
                    </div>
                    <div class="bg-warning bg-opacity-10 p-2 rounded text-warning">
                        <i class="bi bi-credit-card fs-4"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Status Inventaris Kritis -->
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h5 class="text-secondary fw-semibold mb-0">Status Inventaris Kritis</h5>
        <a href="{{ route('produk.index') }}" class="btn btn-outline-secondary btn-sm">Lihat Semua Produk</a>
    </div>
    
    <div class="row g-3 mb-4">
        <div class="col-md-6">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <div class="text-warning fw-semibold mb-3"><i class="bi bi-exclamation-triangle-fill me-1"></i> Produk Stok Rendah</div>
                    <div class="text-center py-4 text-muted">
                        <i class="bi bi-check-circle-fill text-success fs-2 mb-2"></i>
                        <p class="mb-0 small">Seluruh produk berada dalam kondisi stok aman.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <div class="text-danger fw-semibold mb-3"><i class="bi bi-x-circle-fill me-1"></i> Produk Habis Stok</div>
                    <div class="text-center py-4 text-muted">
                        <i class="bi bi-check-circle-fill text-success fs-2 mb-2"></i>
                        <p class="mb-0 small">Seluruh produk berada dalam kondisi stok aman.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Produk Terlaris -->
    <h5 class="mb-3 text-secondary fw-semibold">Produk Terlaris</h5>
    <div class="card border-0 shadow-sm">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th scope="col" class="py-3 ps-4">Nama Produk</th>
                            <th scope="col" class="py-3 text-center">Sisa Stok</th>
                            <th scope="col" class="py-3 text-center pe-4">Total Unit Terjual</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($produkTerlaris ?? [
                            (object)['nama' => 'nasikuning', 'stok' => 49, 'total_terjual' => 1],
                            (object)['nama' => 'roti bakar', 'stok' => 49, 'total_terjual' => 1],
                            (object)['nama' => 'martabak manis', 'stok' => 49, 'total_terjual' => 1],
                            (object)['nama' => 'seblak', 'stok' => 49, 'total_terjual' => 1],
                            (object)['nama' => 'matcha', 'stok' => 49, 'total_terjual' => 1],
                        ] as $item)
                        <tr>
                            <td class="ps-4 fw-semibold text-dark">{{ ucwords($item->nama) }}</td>
                            <td class="text-center">
                                <span class="badge bg-light text-dark border px-2 py-1">{{ $item->stok }}</span>
                            </td>
                            <td class="text-center pe-4">
                                <span class="text-primary fw-bold">{{ $item->total_terjual ?? 1 }} Unit</span>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="3" class="text-center py-4 text-muted">Belum ada data penjualan.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection