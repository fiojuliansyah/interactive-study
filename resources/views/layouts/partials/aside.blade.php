<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 " id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="m-0" href=" #">
        <img src="/home/assets/img/logo.png" alt="main_logo" width="70%">
      </a>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <li class="nav-item mt-3">
          <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Admin Page</h6>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Route::is('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
              <div class="fas fa-home"></div>
            </div>
            <span class="nav-link-text ms-1">Dashboard</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Route::is('students*') ? 'active' : '' }}" href="{{ route('students.index') }}">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
              <div class="fas fa-users"></div>
            </div>
            <span class="nav-link-text ms-1">Kelola Data Siswa</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Route::is('predictions*') ? 'active' : '' }}" href="{{ route('predictions.index') }}">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
              <div class="fas fa-chart-bar"></div>
            </div>
            <span class="nav-link-text ms-1">Hasil Prediksi Siswa</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Route::is('questions*') ? 'active' : '' }}" href="{{ route('questions.index') }}">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
              <div class="fas fa-file-alt"></div>
            </div>
            <span class="nav-link-text ms-1">Kelola Kuisioner</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Route::is('materials*') ? 'active' : '' }}" href="{{ route('materials.index') }}">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
              <div class="fas fa-folder"></div>
            </div>
            <span class="nav-link-text ms-1">Kelola Materi</span>
          </a>
        </li>
      </ul>
    </div>
    <div class="sidenav-footer mx-3 ">
      <div class="card card-background shadow-none card-background-mask-secondary" id="sidenavCard">
        <div class="full-background" style="background-image: url('/assets/img/curved-images/white-curved.jpg')"></div>
        <div class="card-body text-start p-3 w-100">
          <div class="icon icon-shape icon-sm bg-white shadow text-center mb-3 d-flex align-items-center justify-content-center border-radius-md">
            <i class="ni ni-diamond text-dark text-gradient text-lg top-0" aria-hidden="true" id="sidenavCardIcon"></i>
          </div>
          <div class="docs-info">
            <h6 class="text-white up mb-0">Lihat Website</h6>
            <p class="text-xs font-weight-bold">Halaman utama siswa</p>
            <a href="/" class="btn btn-white btn-sm w-100 mb-0">Akses</a>
          </div>
        </div>
      </div>
      <form action="{{ route('logout') }}" method="POST">
       @csrf
        <button type="submit" class="btn btn-danger mt-3 w-100" href="https://www.creative-tim.com/product/soft-ui-dashboard-pro?ref=sidebarfree">Logout</button>
      </form>
    </div>
  </aside>