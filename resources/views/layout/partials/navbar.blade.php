<nav class="navbar navbar-expand-lg" style="height: 60px; background: transparent;">
  <div class="container-fluid px-5">
    <a class="navbar-brand text-primary fs-2" style="font-weight: 900" href="#">PDKS</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse d-flex align-items-center justify-content-between navbar-collapse" id="navbarNav">
      <ul class="navbar-nav fs-5" style="gap: 10px">
        <li class="nav-item">
          <a class="nav-link text-uppercase text-black fw-medium active" aria-current="page" href="/">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-uppercase text-black fw-medium" href="/prediksi-nilai">Hitung Penilaian</a>
        </li>
      </ul>
      <div class="action-btn">
        @if (@Auth::user()->nim)
        <div class="dropdown">
          <button class="btn" type="button" data-bs-toggle="dropdown" aria-expanded="false">
            <p class="mb-0">Halo, {{ Auth::user()->nama_depan }}</p>
          </button>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Logout</a></li>
          </ul>
        </div>
        @else
        <a href="/login" class="btn btn-primary login-btn fs-5">Login</a>
        <a href="/register" class="btn btn-outline-primary register-btn fs-5">Register</a>
        @endif
      </div>
    </div>
  </div>
</nav>