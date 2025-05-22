<ul class="navbar-nav bg-light sidebar sidebar-light accordion shadow-sm" id="accordionSidebar" style="border-right: 1px solid #ced4da;">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center py-4" href="/dashboard">
        <div class="sidebar-brand-icon rotate-n-15" style="color: #0d6efd;">
            <i class="fas fa-store fa-lg"></i>
        </div>
        <div class="sidebar-brand-text mx-3 fw-semibold" style="color: #212529;">Toko Faiz</div>
    </a>

    <hr class="sidebar-divider my-0" style="border-top: 1px solid #ced4da;">

    <!-- Dashboard -->
    <li class="nav-item {{ Request::is('dashboard') ? 'active' : '' }}">
        <a class="nav-link" href="/dashboard">
            <i class="fas fa-home me-2" style="color: #0d6efd;"></i>
            <span class="text-dark">Dashboard</span>
        </a>
    </li>

    <hr class="sidebar-divider" style="border-top: 1px solid #ced4da;">

    <div class="sidebar-heading text-secondary fw-semibold small">
        Manajemen Barang
    </div>

    <!-- Data Barang -->
    <li class="nav-item {{ Request::is('products') ? 'active' : '' }}">
        <a class="nav-link" href="/products">
            <i class="fas fa-boxes me-2" style="color: #198754;"></i>
            <span class="text-dark">Data Barang</span>
        </a>
    </li>

    <!-- Penjualan -->
    <li class="nav-item {{ Request::is('penjualans') ? 'active' : '' }}">
        <a class="nav-link" href="/penjualans">
            <i class="fas fa-cash-register me-2" style="color: #fd7e14;"></i>
            <span class="text-dark">Penjualan</span>
        </a>
    </li>

    <!-- Produk -->
    <li class="nav-item {{ Request::is('barang') ? 'active' : '' }}">
        <a class="nav-link" href="/barang">
            <i class="fas fa-tags me-2" style="color: #0dcaf0;"></i>
            <span class="text-dark">Produk</span>
        </a>
    </li>

    <hr class="sidebar-divider d-none d-md-block" style="border-top: 1px solid #ced4da;">

    <!-- Toggler -->
    <div class="text-center d-none d-md-inline mt-2">
        <button class="rounded-circle border-0" id="sidebarToggle" style="background-color: #0d6efd;"></button>
    </div>

</ul>
