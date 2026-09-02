@extends('layouts.app')

@section('title', 'Tambah User')

@section('content')
<div class="container mt-4">
    <h4>Tambah User</h4>

    <form action="{{ route('admin.users.store') }}" method="POST">
        @include('users._form')
    </form>
</div>
@endsection