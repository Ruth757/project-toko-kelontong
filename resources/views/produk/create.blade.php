@extends('layouts.app')

@section('title', 'Tambah Produk')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">Tambah Produk</h1>
    <a href="{{ route('produk.index') }}" class="btn btn-secondary mb-3">← Kembali</a>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Perhatian!</strong> Terdapat kesalahan input:<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card shadow-sm">
        <div class="card-body">
            <form action="{{ route('produk.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Nama Produk</label>
                    <input type="text" name="nama_produk" class="form-control" value="{{ old('nama_produk') }}" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Jumlah</label>
                    <input type="number" name="jumlah" class="form-control" value="{{ old('jumlah_ketersediaan') }}" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Harga</label>
                    <input type="number" name="harga" class="form-control" value="{{ old('harga') }}" step="0.01" required>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ route('produk.index') }}" class="btn btn-light">Batal</a>
            </form>
        </div>
    </div>
</div>
@endsection
