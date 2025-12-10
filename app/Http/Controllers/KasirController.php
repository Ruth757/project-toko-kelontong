<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class KasirController extends Controller
{
    // Menampilkan halaman utama kasir
    public function index()
    {
        $produk = Produk::where('jumlah', '>', 0)->orderBy('nama_produk')->get();
        return view('kasir.index', compact('produk'));
    }

    // Menyimpan transaksi dan membuat struk PDF
    public function store(Request $request)
    {
        $request->validate([
            'produk_id' => 'required|exists:produks,id',
            'jumlah' => 'required|integer|min:1',
        ]);

        $produk = Produk::findOrFail($request->produk_id);

        // Cek stok cukup atau tidak
        if ($produk->jumlah < $request->jumlah) {
            return back()->with('error', 'Stok produk tidak mencukupi!');
        }

        $total = $produk->harga * $request->jumlah;

        // Kurangi stok produk
        $produk->decrement('jumlah', $request->jumlah);

        // Simpan transaksi
        $transaksi = Transaksi::create([
            'user_id' => 4, // sementara (nanti bisa diganti auth()->id())
            'produk_id' => $produk->id,
            'jumlah' => $request->jumlah,
            'total_harga' => $total,
        ]);

        // Generate struk PDF
        $pdf = Pdf::loadView('kasir.struk', compact('transaksi', 'produk'))
                  ->setPaper('A6', 'portrait');

        return $pdf->download('struk_transaksi_' . $transaksi->id . '.pdf');
    }
}
