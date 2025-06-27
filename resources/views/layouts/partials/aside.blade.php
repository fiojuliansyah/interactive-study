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
        @if (Auth::user()->role == 'siswa')
        <li class="nav-item mt-3">
          <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Siswa Page</h6>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Route::is('siswa.dashbard') ? 'active' : '' }}" href="{{ route('siswa.dashboard') }}">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
              <div class="fas fa-home"></div>
            </div>
            <span class="nav-link-text ms-1">Dashboard</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Route::is('siswa.kuisioner') ? 'active' : '' }}" href="{{ route('siswa.kuisioner') }}">
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
          <a class="nav-link {{ Route::is('siswa.materi') ? 'active' : '' }}" href="{{ route('siswa.materi') }}">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
              <div class="fas fa-chalkboard-teacher"></div>
            </div>
            <span class="nav-link-text ms-1">Akses Materi</span>
          </a>
        </li>
        @endif
        @if (Auth::user()->role == 'admin')
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
        @endif
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
            <h6 class="text-white up mb-0">Need help?</h6>
            <p class="text-xs font-weight-bold">Please check our docs</p>
            <a href="https://www.creative-tim.com/learning-lab/bootstrap/license/soft-ui-dashboard" target="_blank" class="btn btn-white btn-sm w-100 mb-0">Documentation</a>
          </div>
        </div>
      </div>
      <form action="{{ route('logout') }}" method="POST">
       @csrf
        <button type="submit" class="btn btn-danger mt-3 w-100" href="https://www.creative-tim.com/product/soft-ui-dashboard-pro?ref=sidebarfree">Logout</button>
      </form>
    </div>
  </aside>