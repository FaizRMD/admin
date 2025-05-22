<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource dengan fitur search dan pagination.
     */
    public function index(Request $request)
    {
        $query = Product::query();

        // Fitur Pencarian Produk
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('code', 'like', "%{$search}%");
            });
        }

        // Mengambil data dengan pagination
        $products = $query->paginate(5)->withQueryString();

        // Mendapatkan URL halaman sebelumnya dan berikutnya
        $previousPageUrl = $products->previousPageUrl();
        $nextPageUrl = $products->nextPageUrl();

        return view('pages.products.index', compact('products', 'previousPageUrl', 'nextPageUrl'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
        ]);

        // Membuat kode unik secara otomatis
        $validated['code'] = 'P' . uniqid();

        Product::create($validated);

        return redirect()->route('pages.products.index')->with('success', 'Product created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('pages.products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('pages.products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
        ]);

        $product->update($validated);

        return redirect()->route('pages.products.index')->with('success', 'Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('pages.products.index')->with('success', 'Berhasil menghapus data');
    }
}
