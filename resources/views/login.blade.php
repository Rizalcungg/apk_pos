<!-- memanggil file app.blade.php -->
@extends('layouts.app')

<!-- mengirimkan nilai ke tittle untuk ditampilkan -->
@section('title', 'Ini Halaman Ujicoba')

<!-- batas awal isi konten -->
@section('content')

<div class="card text-center position-absolute top-50 start-50 translate-middle" style="width: 18rem;">
    <h5 class="card-header">Login POS_JALLL</h5>
    <div class="card-body">
      <form action="{{ route('auth') }}" method="POST">
        @csrf
         <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
    @error('email')
    <div class="badge text-bg-denger">{{ $message }}</div>
    @enderror
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" name="password" class="form-control" id="exampleInputPassword1">
    @error('email')
    <div class="badge text-bg-denger">{{ $message }}</div>
    @enderror
  </div>
  <div class="mb-3 form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

<!-- batas Akhir isi konten -->
@endsection