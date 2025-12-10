@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="row">
  <div class="col-lg-3 col-6">
    <div class="small-box bg-info">
      <div class="inner">
        <h3>150</h3>
        <p>Total Produk</p>
      </div>
      <div class="icon">
        <i class="fas fa-box"></i>
      </div>
    </div>
  </div>

  <div class="col-lg-3 col-6">
    <div class="small-box bg-warning">
      <div class="inner">
        <h3>Rp 5.000.000</h3>
        <p>Total Nilai Barang</p>
      </div>
      <div class="icon">
        <i class="fas fa-coins"></i>
      </div>
    </div>
  </div>
</div>
@endsection
