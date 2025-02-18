<nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
    <div class="container">
      <!-- Logo dan Brand -->
      <a class="navbar-brand d-flex align-items-center" href="#">
        <span class="fw-bold">PENJUALAN BARANG</span>
      </a>
  
      <!-- Toggler -->
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" 
              aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
  
      <!-- Menu -->
      <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
        <ul class="navbar-nav">
          @auth
            <li class="nav-item me-2">
              <a class="btn btn-secondary" href="{{ route('dashboard') }}">Dashboard</a>
            </li>
            <li class="nav-item">
              <form action="{{ route('logout') }}" method="POST" class="d-inline">
                @csrf
                <button type="submit" class="btn btn-secondary">Logout</button>
              </form>
            </li>
          @else
            <li class="nav-item me-2">
              <a class="btn btn-secondary" href="{{ route('login') }}">Login</a>
            </li>
            <li class="nav-item">
              <a class="btn btn-secondary" href="{{ route('register') }}">Register</a>
            </li>
          @endauth
        </ul>
      </div>
    </div>
  </nav>
  