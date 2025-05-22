@extends('layouts.app')

@section('content')
<style>
  .product-card {
    border: none;
    border-radius: 15px;
    overflow: hidden;
    cursor: pointer;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
  }
  .product-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 15px 25px rgba(78, 115, 223, 0.4);
  }
  .product-card img {
    height: 220px;
    object-fit: cover;
    border-top-left-radius: 15px;
    border-top-right-radius: 15px;
    transition: transform 0.4s ease;
  }
  .product-card:hover img {
    transform: scale(1.05);
  }
  .card-body {
    padding: 1rem 1.25rem;
  }
  .product-name {
    font-weight: 600;
    font-size: 1.1rem;
    color: #1d2a5c; /* Navy blue */
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
  }
  .product-price {
    color: #4e73df; /* Primary blue */
    font-weight: 700;
    font-size: 1.2rem;
  }
</style>

<div class="container py-4">
    <h3 class="mb-4 fw-bold text-primary d-flex align-items-center gap-2">
      <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#4e73df" class="bi bi-cart3" viewBox="0 0 16 16">
        <path d="M0 1.5A.5.5 0 0 1 .5 1h1a.5.5 0 0 1 .485.379L2.89 5H14.5a.5.5 0 0 1 .49.598l-1.5 7A.5.5 0 0 1 13 13H4a.5.5 0 0 1-.491-.408L1.01 2H.5a.5.5 0 0 1-.5-.5zM4.415 12h7.147l1.313-6.102L3.89 4.995 4.415 12z"/>
        <circle cx="6" cy="14" r="1"/>
        <circle cx="12" cy="14" r="1"/>
      </svg>
      Daftar Produk
    </h3>
    <div class="row g-4">
        @forelse ($products as $barang)
        <div class="col-6 col-md-4 col-lg-3">
            <div class="card product-card shadow-sm h-100">
                <img src="{{ $barang['url'] }}" alt="{{ $barang['name'] }}" class="card-img-top" />
                <div class="card-body text-center">
                    <h5 class="product-name" title="{{ $barang['name'] }}">{{ $barang['name'] }}</h5>
                    <p class="product-price">Rp {{ number_format($barang['price'], 0, ',', '.') }}</p>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12 text-center text-muted fs-5 mt-5">
            Tidak ada produk tersedia.
        </div>
        @endforelse
    </div>
</div>
@endsection
