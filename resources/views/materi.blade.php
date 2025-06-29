@extends('layouts.app')

@section('content')
    <!-- Header Start -->
    <div class="jumbotron jumbotron-fluid page-header position-relative overlay-bottom" style="margin-bottom: 90px;">
        <div class="container text-center py-5">
            <h1 class="text-white display-1">Materi</h1>
            <div class="d-inline-flex text-white mb-5">
                <p class="m-0 text-uppercase"><a class="text-white" href="{{ route('siswa.dashboard') }}">Beranda</a></p>
                <i class="fa fa-angle-double-right pt-1 px-3"></i>
                <p class="m-0 text-uppercase">Materi</p>
            </div>
            <div class="mx-auto mb-5" style="width: 100%; max-width: 600px;">
                <form action="{{ route('siswa.materi') }}" method="GET">
                    <div class="input-group">
                        <input type="text" name="search" class="form-control border-light" style="padding: 30px 25px;" placeholder="Keyword" value="{{ request()->query('search') }}">
                        <div class="input-group-append">
                            <button class="btn btn-secondary px-4 px-lg-5">Search</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Header End -->


    <!-- Courses Start -->
    <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="row mx-0 justify-content-center">
                <div class="col-lg-8">
                    <div class="section-title text-center position-relative mb-5">
                        <h6 class="d-inline-block position-relative text-secondary text-uppercase pb-2">Materi Kami</h6>
                        <h1 class="display-4">Semua materi kami yang tersedia</h1>
                    </div>
                </div>
            </div>
            <div class="text-center mb-4">
                <button class="btn btn-outline-primary m-1 filter-btn" data-filter="all">Semua</button>
                @foreach ($materials as $type => $items)
                    <button class="btn btn-outline-primary m-1 filter-btn" data-filter="{{ $type }}">{{ ucfirst($type) }}</button>
                @endforeach
            </div>
            @foreach ($materials as $type => $items)
            <div class="container">
                <div class="mb-5 filter-group" data-type="{{ $type }}">
                    <h3 class="mb-4">{{ ucfirst($type) }}</h3>
                        <div class="owl-carousel related-carousel position-relative" style="padding: 0 30px;">
                            @foreach ($items as $material)     
                                <a class="courses-list-item position-relative d-block overflow-hidden mb-2" href="{{ route('siswa.materi.detail', $material->id) }}">
                                    <img class="img-fluid" src="/home/assets/img/courses-1.jpg" alt="">
                                    <div class="courses-text">
                                        <h4 class="text-center text-white px-3">{{ $material->title }}</h4>
                                        <div class="border-top w-100 mt-3">
                                            <div class="d-flex justify-content-between p-4">
                                                <span class="text-white"><i class="fa fa-check-square mr-2"></i>{{ $material->type }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <!-- Courses End -->
@endsection

@push('js')
<script>
    $(document).ready(function() {
        $('.filter-btn').click(function() {
            var filterType = $(this).data('filter');

            // Active button UI
            $('.filter-btn').removeClass('active');
            $(this).addClass('active');

            if (filterType === 'all') {
                $('.filter-group').show();
            } else {
                $('.filter-group').hide();
                $('.filter-group[data-type="' + filterType + '"]').show();
            }
        });
    });
</script>
@endpush
