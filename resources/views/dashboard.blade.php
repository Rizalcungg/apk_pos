<!-- memanggil file app.blade.php -->
@extends('layouts.app')

<!-- mengirimkan nilai ke title untuk ditampilkan -->
@section('title', 'Login')

<!-- batas awal isi konten -->
@section('content')

@include('layouts.navbar')

<div class="text-center">
  <div class="row">
    <div class="col-md-12">
      <h1>Today's Sales</h1>
    </div>
    <div class="col-md-6">
        <h3>Total Nilai Penjualan Hari ini</h3>
      <div class="card">
  <div class="card-header">
    Featured
  </div>
  <div class="card-body">
    <h5 class="card-title">Special title treatment</h5>
    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
    <a href="#" class="btn btn-primary">Go somewhere</a>
  </div>
</div>
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="card">
        <div class="card-header">
          Jumlah Transaksi Hari ini
        </div>
        <div class="card-body">
          <h5 class="card-title">{{ $ringkasan['total_transaksi'] }}</h5>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <h1>Cash & Payment Status</h1>
    </div>
    <div class="col-md-6">
      <h3>Total pembayaran tunai</h3>
    </div>
    <div class="col-md-6">
      <h3>Total pembayaran non-tunai</h3>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <h1>Critical Inventory Status</h1>
    </div>
    <div class="col-md-6">
      <h3>Daftar produk stok rendah</h3>
    </div>
    <div class="col-md-6">
      <h3>Produk habis stok</h3>
    </div>
  </div>
</div>
    </div>
  </div>
</div>

<!-- batas Akhir isi konten -->
@endsection