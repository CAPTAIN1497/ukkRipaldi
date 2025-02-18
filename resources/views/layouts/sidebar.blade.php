<div id="sidebar" class="sidebar p-4 shadow-lg rounded">
    <!-- Gambar Pengguna & Nama -->
    <div class="text-center mb-3">
        <img src="{{ asset('images/l.jpg') }}" alt="User Image" class="img-fluid rounded-circle border border-3 border-white shadow-lg" style="width: 100px; height: 100px;">
        <h5 class="mt-2 fw-bold text-light">{{ Auth::user() ? Auth::user()->name : 'Nama Pengguna' }}</h5>
        <p class="text-warning" style="font-size: 0.9em;">ADMIN</p>
    </div>

    <hr class="border-light">

    <ul class="nav flex-column">
        <li class="nav-item">
            <a href="{{ route('dashboard') }}" class="nav-link">
                <i class="bi bi-house-door-fill text-info"></i> <span class="text-light">DASHBOARD</span>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('produks.index') }}" class="nav-link">
                <i class="bi bi-box text-success"></i> <span class="text-light">PRODUK</span>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('penjualans.index') }}" class="nav-link">
                <i class="bi bi-cart-fill text-danger"></i> <span class="text-light">PENJUALAN</span>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('pelanggans.index') }}" class="nav-link">
                <i class="bi bi-people-fill text-primary"></i> <span class="text-light">PELANGGAN</span>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('detailpenjualans.index') }}" class="nav-link">
                <i class="bi bi-file-earmark-text text-warning"></i> <span class="text-light">DETAIL PENJUALAN</span>
            </a>
        </li>
    </ul>
</div>

<style>
    /* Warna Sidebar */
    #sidebar {
        width: 260px;
        min-height: 100vh;
        background: #343a40; /* Warna sidebar abu-abu gelap */
        transition: all 0.3s ease-in-out;
    }

    /* Styling Navigasi */
    .nav {
        padding: 0;
    }

    .nav-item {
        list-style: none;
        margin: 10px 0;
    }

    .nav-link {
        display: flex;
        align-items: center;
        padding: 12px 15px;
        font-weight: 500;
        font-size: 1em;
        text-decoration: none;
        border-radius: 5px;
        transition: all 0.3s ease-in-out;
    }

    .nav-link i {
        font-size: 1.2em;
        margin-right: 10px;
    }

    .nav-link:hover {
        background: rgba(255, 255, 255, 0.2);
        transform: scale(1.05);
    }

    /* Garis Pembatas */
    hr {
        border-top: 1px solid rgba(255, 255, 255, 0.3);
    }
</style>
