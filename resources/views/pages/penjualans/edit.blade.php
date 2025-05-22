@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card shadow-sm mb-4">
        <div class="card-header bg-warning text-white">
            <h3 class="mb-0">Edit Data Penjualan</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('pages.penjualans.update', $penjualan->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="product_id" class="form-label">Produk</label>
                    <select class="form-select" name="product_id" id="product_id" required>
                        @foreach($products as $product)
                            <option value="{{ $product->id }}"
                                {{ $penjualan->product_id == $product->id ? 'selected' : '' }}>
                                {{ $product->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('product_id')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="jumlah" class="form-label">Jumlah</label>
                    <input type="number" name="jumlah" class="form-control" id="jumlah"
                        value="{{ old('jumlah', $penjualan->jumlah) }}" min="1" required>
                    @error('jumlah')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="harga" class="form-label">Harga Satuan (Rp)</label>
                    <input type="number" name="harga" class="form-control" id="harga"
                        value="{{ old('harga', $penjualan->harga) }}" min="0" required>
                    @error('harga')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="total_price" class="form-label">Total Harga (Rp)</label>
                    <input type="number" name="total_price" class="form-control" id="total_price"
                        value="{{ old('total_price', $penjualan->total_price) }}" readonly>
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('pages.penjualans.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> Kembali
                    </a>
                    <button type="submit" class="btn btn-warning">
                        <i class="fas fa-save"></i> Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    const jumlahInput = document.getElementById('jumlah');
    const hargaInput = document.getElementById('harga');
    const totalInput = document.getElementById('total_price');

    function calculateTotal() {
        const jumlah = parseInt(jumlahInput.value) || 0;
        const harga = parseInt(hargaInput.value) || 0;
        totalInput.value = jumlah * harga;
    }

    jumlahInput.addEventListener('input', calculateTotal);
    hargaInput.addEventListener('input', calculateTotal);
</script>
@endsection
