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
                            <img src="https://miro.medium.com/v2/resize:fit:1400/1*ZdboO7zjowgjR_LOziPIog.jpeg" 
                                alt="img" 
                                class="img-fluid shadow border-radius-md" 
                                style="height: 180px; object-fit: cover;">
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
                              <button type="button" class="btn btn-outline-primary btn-sm mb-0" 
                                      data-bs-toggle="modal" data-bs-target="#modal-materi-{{ $material->id }}">
                                  Lihat Materi
                              </button>
                          </div>
                        </div>
                    </div>
                  </div>

                  <!-- MODAL -->
                  <div class="modal fade" id="modal-materi-{{ $material->id }}" tabindex="-1" aria-labelledby="modalLabel{{ $material->id }}" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-centered">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="modalLabel{{ $material->id }}">{{ $material->title }}</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                        </div>
                        <div class="modal-body">
                          @if($material->video)
                            <div class="mb-3">
                              <video controls width="100%">
                                <source src="{{ asset('storage/' . $material->video) }}" type="video/mp4">
                                Browser Anda tidak mendukung tag video.
                              </video>
                            </div>
                          @endif

                          @if($material->sound)
                            <div class="mb-3">
                              <audio controls>
                                <source src="{{ asset('storage/' . $material->sound) }}" type="audio/mpeg">
                                Browser Anda tidak mendukung tag audio.
                              </audio>
                            </div>
                          @endif

                          @if($material->content)
                            <div>
                              {!! nl2br(e($material->content)) !!}
                            </div>
                          @else
                            <p class="text-muted">Tidak ada konten tertulis.</p>
                          @endif
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