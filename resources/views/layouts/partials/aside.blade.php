<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 " id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href=" https://demos.creative-tim.com/soft-ui-dashboard/pages/dashboard.html " target="_blank">
        <img src="/assets/img/logo-ct-dark.png" class="navbar-brand-img h-100" alt="main_logo">
        <span class="ms-1 font-weight-bold">Interactive Study</span>
      </a>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <li class="nav-item mt-3">
          <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Siswa Page</h6>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('siswa.dashbard') ? 'active' : '' }}" href="{{ route('siswa.dashboard') }}">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
              <div class="fas fa-home"></div>
            </div>
            <span class="nav-link-text ms-1">Dashboard</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('siswa.kuisioner') ? 'active' : '' }}" href="{{ route('siswa.kuisioner') }}">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
              <div class="fas fa-book-reader"></div>
            </div>
            <span class="nav-link-text ms-1">Isi Kuisioner</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('siswa.prediksi') }}">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
              <div class="fas fa-award"></div>
            </div>
            <span class="nav-link-text ms-1">hasil Prediksi</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('siswa.materi') ? 'active' : '' }}" href="{{ route('siswa.materi') }}">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
              <div class="fas fa-chalkboard-teacher"></div>
            </div>
            <span class="nav-link-text ms-1">Akses Materi</span>
          </a>
        </li>
        @if (Auth::user()->role == 'admin')
        <li class="nav-item mt-3">
          <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Admin Page</h6>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
              <div class="fas fa-home"></div>
            </div>
            <span class="nav-link-text ms-1">Dashboard</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('students*') ? 'active' : '' }}" href="{{ route('students.index') }}">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
              <div class="fas fa-users"></div>
            </div>
            <span class="nav-link-text ms-1">Kelola Data Siswa</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('questions*') ? 'active' : '' }}" href="{{ route('questions.index') }}">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
              <div class="fas fa-file-alt"></div>
            </div>
            <span class="nav-link-text ms-1">Kelola Kuisioner</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('materials*') ? 'active' : '' }}" href="{{ route('materials.index') }}">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
              <div class="fas fa-folder"></div>
            </div>
            <span class="nav-link-text ms-1">Kelola Materi</span>
          </a>
        </li>
        @endif
      </ul>
    </div>
  </aside>