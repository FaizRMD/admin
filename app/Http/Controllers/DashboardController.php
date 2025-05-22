<?php

namespace App\Http\Controllers;

use App\Models\Penjualan;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        // Menghitung total penjualan, total produk terjual, total pendapatan, dan total produk
        // Menggunakan Eloquent ORM untuk menghitung data
    $totalPenjualan = Penjualan::count();
    $totalProdukTerjual = Penjualan::sum('jumlah');
    $totalPendapatan = Penjualan::sum(DB::raw('jumlah * harga'));
    $totalProduk = Product::count();

    return view('pages.dashboard', compact(
        'totalPenjualan',
        'totalProdukTerjual',
        'totalPendapatan',
        'totalProduk'
    ));
}

}
