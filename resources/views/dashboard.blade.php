<!-- memanggil file app.blade.php -->
@extends('layouts.app')

<!-- mengirimkan nilai ke title untuk ditampilkan -->
@section('title', 'Login')

<!-- batas awal isi konten -->
@section('content')

@include('layouts.navbar')

<div class="text-center">
  <h1>
  Ringkasan Hari Ini
  <small class="text-muted">
    {{ $tanggalHariIni->translatedFormat('l, d F Y') }}
  </small>
</h1>
  <div class="row">
    <div class="col-md-12">
      @can('viewAny', App\Models\user::class)
      <h1>Today's Sales</h1>
    </div>
    <div class="col-md-6">
      <div class="card">
  <div class="card-header">
    Total Nilai Penjualan Hari ini
  </div>
  <div class="card-body">
    <h5 class="card-title">Rp {{ number_format($ringkasan['total_penjualan']) }}</h5>
  </div>
</div>
      <h3>Total Nilai Penjualan Hari ini</h3>
      <div class="card">
        <div class="card">
  <div class="card-header">
    Jumlah Transaksi Hari ini
  </div>
  <div class="card-body">
    <h5 class="card-title">{{ $ringkasan['total_transaksi'] }}</h5>
  </div>
</div>
  <div class="card-header">
    Featured
  </div>
  <div class="card-body">
    <h5 class="card-title">Special title treatment</h5>
    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
    <a href="#" class="btn btn-primary">Go somewhere</a>
  </div>
  <div class="card">
  <div class="card-header">
    Total pembayaran tunai
  </div>
  <div class="card-body">
    <h5 class="card-title">Rp {{ number_format($ringkasan['total_cash']) }}</h5>
  </div>
</div>
</div>
    </div>
    <div class="col-md-6">
      <div class="card">
  <div class="card-header">
    Total pembayaran non-tunai
  </div>
  <div class="card-body">
    <h5 class="card-title">Rp {{ number_format($ringkasan['total_non_tunai']) }}</h5>
  </div>
</div>
@endcan
      <h3>Jumlah Transaksi Hari ini</h3>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <h1>Cash & Payment Status</h1>
      <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nama</th>
      <th scope="col">Stok</th>
    </tr>
  </thead>
  <tbody>
    @forelse ($produkStokRendah as $index => $produk)
      <tr>
        <td>{{ $produkStokRendah->firstItem() + $index }}</td>
        <td>{{ $produk->nama }}</td>
        <td>{{ $produk->stok }}</td>
      </tr>
    @empty
      <tr>
        <td colspan="3" class="text-muted text-center">
          Seluruh produk berada dalam kondisi stok aman.
        </td>
      </tr>
    @endforelse
  </tbody>
</table>

{{ $produkStokRendah->links() }}
    </div>
    <div class="col-md-6">
      <h3>Total pembayaran tunai</h3>
      <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nama</th>
      <th scope="col">Stok</th>
    </tr>
  </thead>
  <tbody>
    @forelse ($produkStokHabis as $index => $produk)
      <tr>
        <td>{{ $produkStokHabis->firstItem() + $index }}</td>
        <td>{{ $produk->nama }}</td>
        <td>{{ $produk->stok }}</td>
      </tr>
    @empty
      <tr>
        <td colspan="3" class="text-muted text-center">
          Seluruh produk berada dalam kondisi stok aman.
        </td>
      </tr>
        @endforelse
      </tbody>
   </table>
    {{ $produkStokHabis->links() }}
    </div>
    <div class="row">
  <div class="col-md-12">
    <h1>Best Seller Products</h1>
  </div>
  <div class="col-md-12">
   <table class="table">
  <thead>
    <tr>
      <th scope="col">Nama</th>
      <th scope="col">Stok</th>
      <th scope="col">Unit Terjual</th>
    </tr>
  </thead>
  <tbody>
    @forelse ($produkTerlaris as $produk)
      <tr>
        <td>{{ $produk->nama }}</td>
        <td>{{ $produk->stok }}</td>
        <td>{{ $produk->total_terjual }}</td>
      </tr>
    @empty
      <tr>
        <td colspan="3" class="text-muted text-center">
          Seluruh produk berada dalam kondisi stok aman.
        </td>
      </tr>
    @endforelse
  </tbody>
</table> 
  </div>
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
      <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">First</th>
      <th scope="col">Last</th>
      <th scope="col">Handle</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Jacob</td>
      <td>Thornton</td>
      <td>@fat</td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td>John</td>
      <td>Doe</td>
      <td>@social</td>
    </tr>
  </tbody>
</table>
    </div>
    <div class="col-md-6">
      <h3>Produk habis stok</h3>
    </div>
  </div>
</div>

<!-- batas Akhir isi konten -->
@endsection