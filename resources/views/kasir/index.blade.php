@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="card shadow-lg p-4">
        <h2 class="text-center mb-4">💰 Kasir - Transaksi Penjualan</h2>

        {{-- Notifikasi sukses atau error --}}
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif
        @if($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- Form Transaksi --}}
        <form action="{{ route('kasir.store') }}" method="POST" class="mt-3">
            @csrf
            <div class="mb-3">
                <label for="produk_id" class="form-label fw-bold">Pilih Produk</label>
                <select name="produk_id" id="produk_id" class="form-select" required>
                    <option value="">-- Pilih Produk --</option>
                    @foreach($produk as $p)
                        <option value="{{ $p->id }}">
                            {{ $p->nama_produk }} 
                            (Stok: {{ $p->jumlah }}) 
                            - Rp {{ number_format($p->harga, 0, ',', '.') }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="jumlah" class="form-label fw-bold">Jumlah Beli</label>
                <input type="number" name="jumlah" id="jumlah" class="form-control" min="1" placeholder="Masukkan jumlah" required>
            </div>

            <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-success">
                    <i class="bi bi-printer"></i> Proses & Cetak Struk
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
