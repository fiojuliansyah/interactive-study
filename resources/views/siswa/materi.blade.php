@extends('layouts.main')


@section('content')
  <div class="main-content position-relative max-height-vh-100 h-100">

    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12 mt-4">
          <div class="card mb-4">
            <div class="card-header pb-0 p-3">
              <h6 class="mb-1">Materi</h6>
              <p class="text-sm">Akses Materi Pembelajaran</p>
            </div>
            <div class="card-body p-3">
              <div class="row">
                @foreach ($materials as $material)  
                    <div class="col-xl-3 col-md-6 mb-xl-0 mb-4">
                    <div class="card card-blog card-plain">
                        <div class="position-relative">
                        <a class="d-block">
                            <img src="../assets/img/home-decor-1.jpg" alt="img-blur-shadow" class="img-fluid shadow border-radius-md">
                        </a>
                        </div>
                        <div class="card-body px-1 pb-0">
                        <p class="text-secondary mb-0 text-sm">{{ $material->type }}</p>
                        <a href="javascript:;">
                            <h5 class="font-weight-bolder">
                                {{ $material->title }}
                            </h5>
                        </a>
                        <p class="mb-4 text-sm">
                            {{ Str::limit($material->description, 100, '...') }}
                        </p>
                        <div class="d-flex align-items-center justify-content-between">
                            <button type="button" class="btn btn-outline-primary btn-sm mb-0">Lihat Materi</button>
                            <div class="avatar-group mt-2">
                            <a href="javascript:;" class="avatar avatar-xs rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Elena Morison">
                                <img alt="Image placeholder" src="../assets/img/team-1.jpg">
                            </a>
                            <a href="javascript:;" class="avatar avatar-xs rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Ryan Milly">
                                <img alt="Image placeholder" src="../assets/img/team-2.jpg">
                            </a>
                            <a href="javascript:;" class="avatar avatar-xs rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Nick Daniel">
                                <img alt="Image placeholder" src="../assets/img/team-3.jpg">
                            </a>
                            <a href="javascript:;" class="avatar avatar-xs rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Peterson">
                                <img alt="Image placeholder" src="../assets/img/team-4.jpg">
                            </a>
                            </div>
                        </div>
                        </div>
                    </div>
                    </div>
                @endforeach
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection