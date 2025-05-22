@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card shadow-sm mb-4">
        <div class="card-header bg-primary text-white">
            <h3 class="mb-0">Hasil Pencarian untuk: "{{ $query }}"</h3>
        </div>
        <div class="card-body">
            @if($products->isEmpty() && $penjualans->isEmpty())
                <div class="alert alert-warning text-center">Tidak ada hasil yang ditemukan.</div>
            @else
                @if(!$products->isEmpty())
                    <div class="card mb-4">
                        <div class="card-header bg-success text-white">
                            <h4 class="mb-0">Produk</h4>
                        </div>
                        <div class="card-body p-0">
                            <table class="table table-hover mb-0">
                                <thead class="table-dark">
                                    <tr>
                                        <th>#</th>
                                        <th>Nama</th>
                                        <th>Kode</th>
                                        <th>Harga</th>
                                        <th>Stok</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($products as $product)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $product->name }}</td>
                                            <td>{{ $product->code }}</td>
                                            <td>Rp {{ number_format($product->price, 0, ',', '.') }}</td>
                                            <td>{{ $product->stock }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                @endif

                @if(!$penjualans->isEmpty())
                    <div class="card">
                        <div class="card-header bg-info text-white">
                            <h4 class="mb-0">Penjualan</h4>
                        </div>
                        <div class="card-body p-0">
                            <table class="table table-hover mb-0">
                                <thead class="table-dark">
                                    <tr>
                                        <th>#</th>
                                        <th>Produk</th>
                                        <th>Jumlah</th>
                                        <th>Harga Satuan</th>
                                        <th>Total Harga</th>
                                        <th>Tanggal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($penjualans as $penjualan)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $penjualan->product->name ?? 'Tidak ada' }}</td>
                                            <td>{{ $penjualan->jumlah }}</td>
                                            <td>Rp {{ number_format($penjualan->harga, 0, ',', '.') }}</td>
                                            <td>Rp {{ number_format($penjualan->total_price, 0, ',', '.') }}</td>
                                            <td>{{ $penjualan->created_at->format('d-m-Y') }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                @endif
            @endif
        </div>
    </div>
</div>
@endsection
