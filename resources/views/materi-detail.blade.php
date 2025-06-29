@extends('layouts.app')

@section('content')
<div class="jumbotron jumbotron-fluid page-header position-relative overlay-bottom" style="margin-bottom: 90px;">
        <div class="container text-center py-5">
            <h1 class="text-white display-1">{{ $material->title }}</h1>
            <div class="d-inline-flex text-white mb-5">
                <p class="m-0 text-uppercase"><a class="text-white" href="/">Beranda</a></p>
                <i class="fa fa-angle-double-right pt-1 px-3"></i>
                <p class="m-0 text-uppercase">{{ $material->title }}</p>
            </div>
        </div>
    </div>

    <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="row">
                <div class="col-lg-12">
                    <div class="mb-5 text-center">
                        <div class="section-title position-relative mb-5">
                            <h6 class="d-inline-block position-relative text-secondary text-uppercase pb-2">Detail Materi</h6>
                            <h1 class="display-4">{{ $material->title }}</h1>
                        </div>
                         @if($material->video)
                            <div class="mb-3">
                              <video controls width="60%">
                                <source src="{{ asset('storage/' . $material->video) }}" type="video/mp4">
                                Browser Anda tidak mendukung tag video.
                              </video>
                            </div>
                            @else
                            <img class="img-fluid rounded w-100 mb-4" src="/home/assets/img/header.jpg" alt="Image">
                          @endif
                           @if($material->sound)
                            <div class="mb-3">
                              <audio controls>
                                <source src="{{ asset('storage/' . $material->sound) }}" type="audio/mpeg">
                                Browser Anda tidak mendukung tag audio.
                              </audio>
                            </div>
                          @endif
                        <p>{{ $material->content }}</p>
                    </div>

                    <div class="bg-primary mb-5 py-3">
                        <h3 class="text-white py-3 px-4 m-0">Kuisioner</h3>
                        <div class="d-flex justify-content-between border-bottom px-4">
                            <h6 class="text-white my-3">Soal</h6>
                            <h6 class="text-white my-3">{{ $questionCount }}</h6>
                        </div>
                        <div class="d-flex justify-content-between border-bottom px-4">
                            <h6 class="text-white my-3">Tipe Soal Visual</h6>
                            <h6 class="text-white my-3">{{ $visualCount }}</h6>
                        </div>
                        <div class="d-flex justify-content-between border-bottom px-4">
                            <h6 class="text-white my-3">Tipe Soal Auditori</h6>
                            <h6 class="text-white my-3">{{ $auditoryCount }}</h6>
                        </div>
                        <div class="d-flex justify-content-between border-bottom px-4">
                            <h6 class="text-white my-3">Tipe Soal Kinestetik</h6>
                            <h6 class="text-white my-3">{{ $kinestheticCount }}</h6>
                        </div>
                        <div class="py-3 px-4">
                            <a class="btn btn-block btn-info py-3 px-5" href="{{ route('siswa.kuisioner') }}">Kuisioner</a>
                        </div>
                    </div>

                    <h2 class="mb-3">Materi Lainnya</h2>
                    <div class="owl-carousel related-carousel position-relative" style="padding: 0 30px;">
                        @foreach ($materials as $item)     
                            <a class="courses-list-item position-relative d-block overflow-hidden mb-2" href="{{ route('siswa.materi.detail', $item->id) }}">
                                <img class="img-fluid" src="/home/assets/img/courses-1.jpg" alt="">
                                <div class="courses-text">
                                    <h4 class="text-center text-white px-3">{{ $item->title }}</h4>
                                    <div class="border-top w-100 mt-3">
                                        <div class="d-flex justify-content-between p-4">
                                            <span class="text-white"><i class="fa fa-check-square mr-2"></i>{{ $item->type }}</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    </div>
               </div>
            </div>
        </div>
    </div>
@endsection