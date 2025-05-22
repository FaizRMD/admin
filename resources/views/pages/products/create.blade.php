@extends('layouts.app')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tambah Barang</h1>
        <a href="{{ route('pages.products.index') }}" class="btn btn-secondary btn-sm">Kembali</a>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Form Tambah Barang</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('pages.products.store') }}" method="POST">
                @csrf

                <!-- Nama Barang -->
                <div class="form-group">
                    <label for="name" class="font-weight-bold">Nama Barang</label>
                    <input type="text" name="name" id="name"
                        class="form-control @error('name') is-invalid @enderror" placeholder="Masukkan nama barang"
                        value="{{ old('name') }}">
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Harga -->
                <div class="form-group">
                    <label for="price" class="font-weight-bold">Harga</label>
                    <input type="number" name="price" id="price"
                        class="form-control @error('price') is-invalid @enderror" placeholder="Masukkan harga barang"
                        value="{{ old('price') }}">
                    @error('price')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Stok -->
                <div class="form-group">
                    <label for="stock" class="font-weight-bold">Stok</label>
                    <input type="number" name="stock" id="stock"
                        class="form-control @error('stock') is-invalid @enderror" placeholder="Masukkan jumlah stok"
                        value="{{ old('stock') }}">
                    @error('stock')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="code" class="font-weight-bold">Kode Barang</label>
                    <input type="text" name="code" id="code"
                        class="form-control @error('code') is-invalid @enderror" placeholder="Masukkan kode barang"
                        value="{{ old('code') }}">
                    @error('code')
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
