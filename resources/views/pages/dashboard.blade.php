@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Dashboard</h1>
    <div class="row">

        <!-- Total Penjualan -->
        <div class="col-md-3 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Penjualan</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalPenjualan }}</div>
                </div>
            </div>
        </div>

        <!-- Total Produk Terjual -->
        <div class="col-md-3 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total Produk Terjual</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalProdukTerjual }}</div>
                </div>
            </div>
        </div>

        <!-- Total Pendapatan -->
        <div class="col-md-3 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Total Pendapatan</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">Rp {{ number_format($totalPendapatan, 0, ',', '.') }}</div>
                </div>
            </div>
        </div>

        <!-- Total Produk -->
        <div class="col-md-3 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Total Produk</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalProduk }}</div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
