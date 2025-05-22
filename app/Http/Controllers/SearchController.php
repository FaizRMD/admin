<?php
 
namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Penjualan;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    /**
     * Menampilkan hasil pencarian produk dan penjualan.
     */
    public function index(Request $request)
    {
        $query = $request->input('query');

        // Cari produk berdasarkan nama atau kode
        $products = Product::where('name', 'like', "%{$query}%")
            ->orWhere('code', 'like', "%{$query}%")
            ->get();

        // Cari penjualan berdasarkan nama produk
        $penjualans = Penjualan::whereHas('product', function($q) use ($query) {
                $q->where('name', 'like', "%{$query}%");
            })->get();

        return view('pages.search', compact('products', 'penjualans', 'query'));
    }
}

