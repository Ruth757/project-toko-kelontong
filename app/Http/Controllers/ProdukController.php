<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    /**
     * Tampilkan daftar semua produk.
     */
    public function index()
    {
        // Ambil semua data produk dari database, urut terbaru dulu
        $produk = Produk::orderBy('created_at', 'desc')->get();

        // Kirim ke view produk.index
        return view('produk.index', compact('produk'));
    }

    /**
     * Tampilkan form tambah produk baru.
     */
    public function create()
    {
        return view('produk.create');
    }

    /**
     * Simpan produk baru ke database.
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama_produk' => 'required|string|max:255',
            'jumlah'      => 'required|integer|min:0',
            'harga'       => 'required|numeric|min:0',
        ]);

        // Simpan data
        Produk::create($request->only(['nama_produk', 'jumlah', 'harga']));

        // Redirect dengan pesan sukses
        return redirect()->route('produk.index')->with('success', 'Produk berhasil ditambahkan!');
    }

    /**
     * Tampilkan form edit produk.
     */
    public function edit(Produk $produk)
    {
        return view('produk.edit', compact('produk'));
    }

    /**
     * Update data produk.
     */
    public function update(Request $request, Produk $produk)
    {
        // Validasi input
        $request->validate([
            'nama_produk' => 'required|string|max:255',
            'jumlah'      => 'required|integer|min:0',
            'harga'       => 'required|numeric|min:0',
        ]);

        // Update data
        $produk->update($request->only(['nama_produk', 'jumlah_ketersediaan', 'harga']));

        return redirect()->route('produk.index')->with('success', 'Produk berhasil diperbarui!');
    }

    /**
     * Hapus produk dari database.
     */
    public function destroy(Produk $produk)
    {
        $produk->delete();

        return redirect()->route('produk.index')->with('success', 'Produk berhasil dihapus!');
    }
}
