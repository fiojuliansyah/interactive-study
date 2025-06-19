@extends('layouts.main')


@section('content')
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <h6 class="font-weight-bolder mb-0">Dashboard</h6>
        </nav>
      </div>
    </nav>
    <!-- End Navbar -->
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-lg-6 col-md-6 col-12 mb-4">
          <div class="card">
            <span class="mask bg-primary opacity-10 border-radius-lg"></span>
            <div class="card-body p-3 position-relative">
              <div class="row">
                <div class="col-8 text-start">
                  <div class="icon icon-shape bg-white shadow text-center border-radius-2xl">
                    <i class="fas fa-chalkboard-teacher" style="color: black"></i>
                  </div>
                  <h5 class="text-white font-weight-bolder mb-0 mt-3">
                    {{ $materialCount }}
                  </h5>
                  <span class="text-white text-sm">Materi</span>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-6 col-md-6 col-12 mb-4">
          <div class="card">
            <span class="mask bg-dark opacity-10 border-radius-lg"></span>
            <div class="card-body p-3 position-relative">
              <div class="row">
                <div class="col-8 text-start">
                  <div class="icon icon-shape bg-white shadow text-center border-radius-2xl">
                    <i class="fas fa-book-reader" style="color: black"></i>
                  </div>
                  <h5 class="text-white font-weight-bolder mb-0 mt-3">
                    {{ $questionCount }}
                  </h5>
                  <span class="text-white text-sm">Kuisioner</span>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-6 col-md-6 col-12 mb-4">
          <div class="card">
            <span class="mask bg-primary opacity-10 border-radius-lg"></span>
            <div class="card-body p-3 position-relative">
              <div class="row">
                <div class="col-8 text-start">
                  <div class="icon icon-shape bg-white shadow text-center border-radius-2xl">
                    <i class="fas fa-users" style="color: black"></i>
                  </div>
                  <h5 class="text-white font-weight-bolder mb-0 mt-3">
                    {{ $studentCount }}
                  </h5>
                  <span class="text-white text-sm">Siswa</span>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-6 col-md-6 col-12 mb-4">
          <div class="card">
            <span class="mask bg-dark opacity-10 border-radius-lg"></span>
            <div class="card-body p-3 position-relative">
              <div class="row">
                <div class="col-8 text-start">
                  <div class="icon icon-shape bg-white shadow text-center border-radius-2xl">
                    <i class="fas fa-book-reader" style="color: black"></i>
                  </div>
                  <h5 class="text-white font-weight-bolder mb-0 mt-3">
                    {{ $adminCount }}
                  </h5>
                  <span class="text-white text-sm">Admin</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>  
@endsection