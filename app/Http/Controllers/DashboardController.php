<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;

class DashboardController extends Controller
{
    public function index() {
        $jumlah_produk = Produk::count();
        $stok_habis = Produk::where('stok', '<=', 0)->count();
        $total_stok = Produk::sum('stok');
        $total_harga = Produk::sum('harga');

        return view('dashboard.index', compact('jumlah_produk', 'stock_habis', 'toal_stok', 'total_harga'));
    }
}
