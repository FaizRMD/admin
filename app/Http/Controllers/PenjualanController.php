<?php

namespace App\Http\Controllers;

use App\Models\Penjualan;
use App\Models\Product;
use Illuminate\Http\Request;

class PenjualanController extends Controller
{
    /**
     * Tampilkan daftar penjualan dengan fitur search.
     */
    public function index(Request $request)
    {
        $query = Penjualan::with('product');

        if ($request->filled('search')) {
            $search = $request->search;

            // Cari berdasarkan nama produk atau kode produk
            $query->whereHas('product', function($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('code', 'like', "%{$search}%");
            });

            // Jika mau cari berdasarkan field lain di tabel penjualan bisa ditambahkan di sini
        }

        $penjualans = $query->paginate(5)->withQueryString();

        // Mengambil data dengan pagination
        $products = $query->paginate(5)->withQueryString();

        // Mendapatkan URL halaman sebelumnya dan berikutnya
        $previousPageUrl = $products->previousPageUrl();
        $nextPageUrl = $products->nextPageUrl();

        return view('pages.penjualans.index', compact('penjualans'));
    }

    /**
     * Tampilkan form tambah penjualan.
     */
    public function create()
    {
        $products = Product::all();
        return view('pages.penjualans.create', compact('products'));
    }

    /**
     * Simpan data penjualan baru.
     */
    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'jumlah' => 'required|integer|min:1',
            'harga' => 'required|numeric|min:0',
        ]);

        $product = Product::find($request->product_id);
        $total_price = $product->price * $request->jumlah;

        Penjualan::create([
            'product_id' => $request->product_id,
            'jumlah' => $request->jumlah,
            'harga' => $product->price,
            'total_price' => $total_price,
        ]);

        // Kurangi stok produk
        $product->decrement('stock', $request->jumlah);

        return redirect()->route('pages.penjualans.index')->with('success', 'Penjualan berhasil ditambahkan!');
    }

    /**
     * Tampilkan detail penjualan.
     */
    public function show($id)
    {
        $penjualan = Penjualan::with('product')->findOrFail($id);
        return view('pages.penjualans.show', compact('penjualan'));
    }

    /**
     * Tampilkan form edit penjualan.
     */
    public function edit($id)
    {
        $penjualan = Penjualan::findOrFail($id);
        $products = Product::all();
        return view('pages.penjualans.edit', compact('penjualan', 'products'));
    }

    /**
     * Update data penjualan.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'jumlah' => 'required|integer|min:1',
        ]);

        $penjualan = Penjualan::findOrFail($id);
        $product = Product::find($request->product_id);
        $total_price = $product->price * $request->jumlah;

        $penjualan->update([
            'product_id' => $request->product_id,
            'jumlah' => $request->jumlah,
            'harga' => $product->price,
            'total_price' => $total_price,
        ]);

        return redirect()->route('pages.penjualans.index')->with('success', 'Penjualan berhasil diperbarui!');
    }

    /**
     * Hapus data penjualan.
     */
    public function destroy($id)
    {
        $penjualan = Penjualan::findOrFail($id);
        $penjualan->delete();
        return redirect()->route('pages.penjualans.index')->with('success', 'Penjualan berhasil dihapus!');
    }
}
