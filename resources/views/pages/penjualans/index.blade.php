@extends('layouts.app')

@section('content')
<div class="d-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 text-primary fw-bold">Data Penjualan</h1>
    <a href="{{ route('pages.penjualans.create') }}" class="btn btn-primary shadow-sm rounded-pill px-4">
        <i class="fas fa-plus me-2"></i> Tambah Penjualan
    </a>
</div>

<div class="card shadow-sm border-0 rounded-4">
    <div class="card-header bg-white border-0 d-flex justify-content-between align-items-center">
        <h6 class="m-0 fw-bold text-primary">Daftar Penjualan</h6>
        <small class="text-muted fst-italic">Total: {{ $penjualans->total() }} data</small>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive" style="max-height: 500px; overflow-y: auto;">
            <table class="table table-striped table-hover align-middle mb-0" style="min-width: 720px;">
                <thead class="table-primary text-uppercase small" style="position: sticky; top: 0; z-index: 1;">
                    <tr>
                        <th class="text-center" style="width: 50px;">#</th>
                        <th>Produk</th>
                        <th class="text-center" style="width: 80px;">Jumlah</th>
                        <th class="text-end" style="width: 130px;">Harga Satuan</th>
                        <th class="text-end" style="width: 130px;">Total Harga</th>
                        <th class="text-center" style="width: 110px;">Tanggal</th>
                        <th class="text-center" style="width: 110px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($penjualans as $penjualan)
                    <tr style="cursor: default;">
                        <td class="text-center text-secondary">{{ ($penjualans->currentPage() - 1) * $penjualans->perPage() + $loop->iteration }}</td>
                        <td class="fw-semibold">{{ $penjualan->product->name ?? 'Produk tidak ditemukan' }}</td>
                        <td class="text-center">{{ $penjualan->jumlah }}</td>
                        <td class="text-end text-success fw-medium">Rp {{ number_format($penjualan->harga, 0, ',', '.') }}</td>
                        <td class="text-end fw-bold">Rp {{ number_format($penjualan->jumlah * $penjualan->harga, 0, ',', '.') }}</td>
                        <td class="text-center text-muted">{{ $penjualan->created_at->format('d-m-Y') }}</td>
                        <td class="text-center">
                            <a href="{{ route('pages.penjualans.edit', $penjualan->id) }}"
                               class="btn btn-sm btn-outline-warning rounded-circle me-1" title="Edit" data-bs-toggle="tooltip" data-bs-placement="top">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('pages.penjualans.destroy', $penjualan->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        class="btn btn-sm btn-outline-danger rounded-circle"
                                        onclick="return confirm('Yakin ingin menghapus data ini?')"
                                        title="Hapus" data-bs-toggle="tooltip" data-bs-placement="top">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center py-4 fst-italic text-muted">Tidak ada data penjualan</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- Pagination --}}
        <nav class="d-flex justify-content-between align-items-center px-4 py-3 border-top bg-white rounded-bottom">
            <div>
                @if ($penjualans->onFirstPage())
                <button class="btn btn-outline-secondary btn-sm" disabled>
                    <i class="fas fa-arrow-left"></i> Previous
                </button>
                @else
                <a href="{{ $penjualans->previousPageUrl() }}" class="btn btn-primary btn-sm">
                    <i class="fas fa-arrow-left"></i> Previous
                </a>
                @endif
            </div>
            <div class="small text-muted">
                Halaman {{ $penjualans->currentPage() }} dari {{ $penjualans->lastPage() }}
            </div>
            <div>
                @if ($penjualans->hasMorePages())
                <a href="{{ $penjualans->nextPageUrl() }}" class="btn btn-primary btn-sm">
                    Next <i class="fas fa-arrow-right"></i>
                </a>
                @else
                <button class="btn btn-outline-secondary btn-sm" disabled>
                    Next <i class="fas fa-arrow-right"></i>
                </button>
                @endif
            </div>
        </nav>
    </div>
</div>

@push('scripts')
<script>
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    tooltipTriggerList.forEach(function (tooltipTriggerEl) {
        new bootstrap.Tooltip(tooltipTriggerEl)
    })
</script>
@endpush
@endsection
