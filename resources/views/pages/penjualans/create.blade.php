@extends('layouts.app')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tambah Penjualan</h1>
        <a href="{{ route('pages.penjualans.index') }}" class="btn btn-secondary btn-sm">Kembali</a>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Form Tambah Penjualan</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('pages.penjualans.store') }}" method="POST">
                @csrf

                <!-- Produk -->
                <div class="form-group">
                    <label for="product_id" class="font-weight-bold">Produk</label>
                    <select name="product_id" id="product_id"
                        class="form-control @error('product_id') is-invalid @enderror" required>
                        <option value="" disabled selected>Pilih Produk</option>
                        @foreach ($products as $product)
                            <option value="{{ $product->id }}" {{ old('product_id') == $product->id ? 'selected' : '' }}>
                                {{ $product->name }} (Stok: {{ $product->stock }}) - Rp {{ number_format($product->price, 0, ',', '.') }}
                            </option>
                        @endforeach
                    </select>
                    @error('product_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Jumlah -->
                <div class="form-group">
                    <label for="jumlah" class="font-weight-bold">Jumlah</label>
                    <input type="number" name="jumlah" id="jumlah" min="1"
                        class="form-control @error('jumlah') is-invalid @enderror" placeholder="Masukkan jumlah penjualan"
                        value="{{ old('jumlah') }}" required>
                    @error('jumlah')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Harga per item -->
                <div class="form-group">
                    <label for="harga" class="font-weight-bold">Harga (per item)</label>
                    <input type="number" name="harga" id="harga" min="0"
                        class="form-control @error('harga') is-invalid @enderror" placeholder="Masukkan harga per item"
                        value="{{ old('harga') }}" required>
                    @error('harga')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Tombol Submit dan Reset -->
                <div class="form-group text-right">
                    <button type="reset" class="btn btn-outline-secondary mr-2">Reset</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
@endsection
