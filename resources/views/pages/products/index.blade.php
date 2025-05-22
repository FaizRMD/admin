@extends('layouts.app')

@section('content')
    <div class="d-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 text-gray-900 fw-bold">Data Barang</h1>
        <a href="{{ route('pages.products.create') }}" class="btn btn-primary shadow-sm">
            <i class="fas fa-plus me-1"></i> Tambah Barang
        </a>
    </div>

    <div class="card shadow-sm border-0 rounded-3">
        <div class="card-header bg-white border-0">
            <h5 class="mb-0 text-primary fw-semibold">Daftar Barang</h5>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                @if ($products->isEmpty())
                    <div class="alert alert-light text-center m-3" role="alert" style="font-style: italic;">
                        Tidak ada data barang
                    </div>
                @else
                    <table class="table align-middle mb-0">
                        <thead>
                            <tr class="bg-light text-secondary text-uppercase small">
                                <th style="width: 50px;">#</th>
                                <th>Nama Barang</th>
                                <th style="width: 130px;">Harga</th>
                                <th style="width: 80px;">Stok</th>
                                <th style="width: 120px;">Kode</th>
                                <th style="width: 150px;" class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $item)
                                <tr class="hover-shadow" style="cursor: default;">
                                    <td class="fw-semibold text-muted">
                                        {{ ($products->currentPage() - 1) * $products->perPage() + $loop->iteration }}
                                    </td>
                                    <td class="fw-medium text-dark">{{ $item->name }}</td>
                                    <td class="text-primary fw-semibold">Rp {{ number_format($item->price, 0, ',', '.') }}</td>
                                    <td>{{ $item->stock }}</td>
                                    <td class="text-muted">{{ $item->code }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('pages.products.show', $item->id) }}" class="btn btn-sm btn-outline-info me-1" title="Lihat Detail">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="{{ route('pages.products.edit', $item->id) }}" class="btn btn-sm btn-outline-warning me-1" title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('pages.products.destroy', $item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus produk ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-outline-danger" title="Hapus">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
        </div>

        <div class="card-footer bg-white border-0 d-flex justify-content-between align-items-center">
            {{-- Previous --}}
            @if ($products->onFirstPage())
                <button class="btn btn-outline-secondary btn-sm" disabled>
                    <i class="fas fa-arrow-left"></i> Previous
                </button>
            @else
                <a href="{{ $products->previousPageUrl() }}" class="btn btn-outline-primary btn-sm">
                    <i class="fas fa-arrow-left"></i> Previous
                </a>
            @endif

            {{-- Next --}}
            @if ($products->hasMorePages())
                <a href="{{ $products->nextPageUrl() }}" class="btn btn-outline-primary btn-sm">
                    Next <i class="fas fa-arrow-right"></i>
                </a>
            @else
                <button class="btn btn-outline-secondary btn-sm" disabled>
                    Next <i class="fas fa-arrow-right"></i>
                </button>
            @endif
        </div>
    </div>

    {{-- Tambahan CSS --}}
    <style>
        .hover-shadow:hover {
            background-color: #f9f9f9;
            transition: background-color 0.3s ease;
        }
        .fw-medium {
            font-weight: 500;
        }
        .fw-semibold {
            font-weight: 600;
        }
    </style>
@endsection
