@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card shadow-sm mb-4">
        <div class="card-header bg-info text-white">
            <h3 class="mb-0">Detail Data Barang</h3>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <th>Nama Barang</th>
                    <td>{{ $product->name }}</td>
                </tr>
                <tr>
                    <th>Kode Barang</th>
                    <td>{{ $product->code }}</td>
                </tr>
                <tr>
                    <th>Harga</th>
                    <td>Rp {{ number_format($product->price, 0, ',', '.') }}</td>
                </tr>
                <tr>
                    <th>Stok</th>
                    <td>{{ $product->stock }}</td>
                </tr>
                <tr>
                    <th>Dibuat Pada</th>
                    <td>{{ $product->created_at->format('d-m-Y H:i') }}</td>
                </tr>
                <tr>
                    <th>Terakhir Diperbarui</th>
                    <td>{{ $product->updated_at->format('d-m-Y H:i') }}</td>
                </tr>
            </table>

            <div class="d-flex justify-content-between">
                <a href="{{ route('pages.products.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> Kembali
                </a>
                <a href="{{ route('pages.products.edit', $product->id) }}" class="btn btn-warning">
                    <i class="fas fa-edit"></i> Edit Barang
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
