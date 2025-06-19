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
        <div class="col-lg-6 col-12">
          <div class="row">
            <div class="col-lg-6 col-md-6 col-12">
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
            <div class="col-lg-6 col-md-6 col-12 mt-4 mt-md-0">
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
          </div>
          <div class="row mt-4">
            <div class="col-lg-12 col-md-6 col-12">
              <div class="card">
                <span class="mask bg-dark opacity-10 border-radius-lg"></span>
                <div class="card-body p-3 position-relative">
                  <div class="row">
                    <div class="col-8 text-start">
                      <div class="icon icon-shape bg-white shadow text-center border-radius-2xl">
                        <i class="fas fa-award" style="color: black"></i>
                      </div>
                      <h5 class="text-white font-weight-bolder mb-0 mt-3">
                        n/a
                      </h5>
                      <span class="text-white text-sm">Hasil Prediksi</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-6 col-12 mt-4 mt-lg-0">
          <div class="card shadow h-100">
            <div class="card-header pb-0 p-3">
              <h6 class="mb-0">Hasil Review Jawaban</h6>
            </div>
            <div class="card-body pb-0 p-3">
              <ul class="list-group">
                <li class="list-group-item border-0 d-flex align-items-center px-0 mb-0">
                  <div class="w-100">
                    <div class="d-flex mb-2">
                      <span class="me-2 text-sm font-weight-bold text-dark">Benar</span>
                      <span class="ms-auto text-sm font-weight-bold">80%</span>
                    </div>
                    <div>
                      <div class="progress progress-md">
                        <div class="progress-bar bg-primary w-80" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                    </div>
                  </div>
                </li>
                <li class="list-group-item border-0 d-flex align-items-center px-0 mb-2">
                  <div class="w-100">
                    <div class="d-flex mb-2">
                      <span class="me-2 text-sm font-weight-bold text-dark">Salah</span>
                      <span class="ms-auto text-sm font-weight-bold">17%</span>
                    </div>
                    <div>
                      <div class="progress progress-md">
                        <div class="progress-bar bg-primary w-10" role="progressbar" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                    </div>
                  </div>
                </li>
                <li class="list-group-item border-0 d-flex align-items-center px-0 mb-2">
                  <div class="w-100">
                    <div class="d-flex mb-2">
                      <span class="me-2 text-sm font-weight-bold text-dark">Nilai</span>
                      <span class="ms-auto text-sm font-weight-bold">3%</span>
                    </div>
                    <div>
                      <div class="progress progress-md">
                        <div class="progress-bar bg-primary w-5" role="progressbar" aria-valuenow="5" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                    </div>
                  </div>
                </li>
              </ul>
            </div>
            <div class="card-footer pt-0 p-3 d-flex align-items-center">
              
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>  
@endsection