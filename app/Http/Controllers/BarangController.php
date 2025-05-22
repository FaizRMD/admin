<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    public function index()
    {
        // Ambil semua produk dari database, keyBy nama produk lowercase
        $dbProducts = Product::all()->keyBy(function($item) {
            return strtolower($item->name);
        });

        $imageD
        ir = public_path('gambar');
        $products = [];

        if (is_dir($imageDir)) {
            foreach (scandir($imageDir) as $file) {
                $extension = pathinfo($file, PATHINFO_EXTENSION);
                if (in_array(strtolower($extension), ['jpg', 'jpeg', 'png', 'gif'])) {
                    // Nama produk dari nama file (lowercase)
                    $productName = strtolower(pathinfo($file, PATHINFO_FILENAME));

                    if ($dbProducts->has($productName)) {
                        $productFromDb = $dbProducts->get($productName);

                        $products[] = [
                            'url' => asset("gambar/$file"),
                            'name' => $productFromDb->name,
                            'price' => $productFromDb->price,
                        ];
                    } else {
                        // Jika mau, tambahkan produk default atau skip
                        // Contoh menambah default:
                        /*
                        $products[] = [
                            'url' => asset("gambar/$file"),
                            'name' => ucfirst(str_replace('-', ' ', $productName)),
                            'price' => 0, // default harga
                        ];
                        */
                    }
                }
            }
        }

        // Urutkan produk berdasarkan nama, agar tampil rapi (opsional)
        usort($products, function($a, $b) {
            return strcmp($a['name'], $b['name']);
        });

        return view('pages.barang.index', compact('products'));
    }
}
