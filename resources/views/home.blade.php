@extends('layouts.app')

@section('content')
    <div class="jumbotron jumbotron-fluid position-relative overlay-bottom" style="margin-bottom: 90px;">
        <div class="container text-center my-5 py-5">
            <h1 class="text-white mt-4 mb-4">InterStudy</h1>
            <h1 class="text-white display-1 mb-5">Platform Belajar Interaktif</h1>
            <div class="mx-auto mb-5" style="width: 100%; max-width: 600px;">
                <form action="{{ route('siswa.materi') }}" method="GET">
                    <div class="input-group">
                        <input type="text" name="search" class="form-control border-light" style="padding: 30px 25px;" placeholder="Cari Materi Langsung" value="{{ request()->query('search') }}">
                        <div class="input-group-append">
                            <button class="btn btn-secondary px-4 px-lg-5">Search</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="row">
                <div class="col-lg-5 mb-5 mb-lg-0" style="min-height: 500px;">
                    <div class="position-relative h-100">
                        <img class="position-absolute w-100 h-100" src="/home/assets/img/smkn33.jpg" style="object-fit: cover;">
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="section-title position-relative mb-4">
                        <h6 class="d-inline-block position-relative text-secondary text-uppercase pb-2">Tentang Kami</h6>
                        <h1 class="display-4">Solusi Cerdas untuk Belajar Bahasa Indonesia Sesuai Gaya Belajar Anda</h1>
                    </div>
                    <p>Kami menghadirkan platform pembelajaran interaktif yang dirancang khusus untuk siswa SMK, dengan pendekatan berdasarkan prediksi gaya belajar (Visual, Auditori, Membaca/Menulis, dan Kinestetik).
                        Dengan sistem yang menyesuaikan materi dan kuis sesuai kebutuhan belajar masing-masing siswa, Anda bisa belajar lebih efektif, kapan saja dan di mana saja. Dengan fitur yang menarik pemahaman materi Bahasa Indonesia akan menjadi lebih mudah, menyenangkan, dan bermakna.</p>
                </div>
            </div>
        </div>
    </div>


    <div class="container-fluid bg-image" style="margin: 90px 0;">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 my-5 pt-5 pb-lg-5">
                    <div class="section-title position-relative mb-4">
                        <h6 class="d-inline-block position-relative text-secondary text-uppercase pb-2">Mengapa Memilih Kami?</h6>
                        <h1 class="display-4">Belajar Bahasa Indonesia Lebih Personal dan Interaktif</h1>
                    </div>
                    <p class="mb-4 pb-2">Kami menawarkan pengalaman belajar yang interaktif, fleksibel, dan berkualitas tinggi. Dengan pengajar berpengalaman, sertifikasi internasional, dan kelas daring yang mudah diakses, proses belajar Anda menjadi lebih efektif dan menyenangkan.</p>
                    
                    <div class="d-flex mb-3">
                        <div class="btn-icon bg-primary mr-4">
                            <i class="fa fa-2x fa-graduation-cap text-white"></i>
                        </div>
                        <div class="mt-n1">
                            <h4>Prediksi Gaya Belajar Akurat</h4>
                            <p>Melalui pengisian kuisioner sederhana di awal, sistem kami memprediksi gaya belajar Anda menggunakan pendekatan ilmiah. Hasil prediksi ini digunakan untuk menyusun materi dan aktivitas belajar yang paling cocok bagi Anda.</p>
                        </div>
                    </div>
                    
                    <div class="d-flex mb-3">
                        <div class="btn-icon bg-secondary mr-4">
                            <i class="fa fa-2x fa-certificate text-white"></i>
                        </div>
                        <div class="mt-n1">
                            <h4>Materi Bahasa Indonesia Terstruktur</h4>
                            <p>Materi disusun sesuai kurikulum Bahasa Indonesia SMK, mencakup teks naratif, argumentatif, eksplanasi, dan lainnya. Disajikan dalam berbagai bentuk—video, audio, simulasi—sesuai dengan gaya belajar masing-masing siswa.</p>
                        </div>
                    </div>
                    
                    <div class="d-flex">
                        <div class="btn-icon bg-warning mr-4">
                            <i class="fa fa-2x fa-book-reader text-white"></i>
                        </div>
                        <div class="mt-n1">
                            <h4>Pembelajaran Interaktif dan Adaptif</h4>
                            <p class="m-0">Setiap siswa akan mendapatkan pengalaman belajar yang berbeda sesuai hasil prediksi. Platform ini mendukung pembelajaran mandiri dan kolaboratif, baik di kelas maupun secara daring.</p>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-5" style="min-height: 500px;">
                    <div class="position-relative h-100">
                        <img class="position-absolute w-100 h-100" src="/home/assets/img/sekolah1.jpeg" style="object-fit: cover;">
                    </div>
                </div>
            </div>
        </div>
    </div>

    @guest
        <div class="container-fluid px-0 py-5">
            <div class="row mx-0 justify-content-center pt-5">
                <div class="col-lg-6">
                    <div class="section-title text-center position-relative mb-4">
                        <h6 class="d-inline-block position-relative text-secondary text-uppercase pb-2">Kursus Kami</h6>
                        <h1 class="display-4">Lihat Rilisan Terbaru dari Kursus Kami</h1>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center bg-image mx-0 mb-5">
                <div class="col-lg-6 py-5">
                    <div class="bg-white p-5 my-5">
                        <h1 class="text-center mb-4">Untuk Siswa Baru</h1>
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="form-row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input type="text" name="name" class="form-control bg-light border-0" placeholder="Nama Anda" style="padding: 30px 20px;">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input type="text" name="username" class="form-control bg-light border-0" placeholder="Username Anda" style="padding: 30px 20px;">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input type="email" name="email" class="form-control bg-light border-0" placeholder="Email Anda" style="padding: 30px 20px;">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input type="password" name="password" placeholder="Password" class="form-control bg-light border-0" style="padding: 30px 20px;">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input type="password" name="password_confirmation" placeholder="Ulangi Password" class="form-control bg-light border-0" style="padding: 30px 20px;">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input type="text" name="nis" class="form-control bg-light border-0" placeholder="No NIS" style="padding: 30px 20px;">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input type="text" name="class" class="form-control bg-light border-0" placeholder="Kelas Anda" style="padding: 30px 20px;">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <button class="btn btn-primary btn-block" type="submit" style="height: 60px;">Daftar Sekarang</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endguest


    <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="section-title text-center position-relative mb-5">
                <h6 class="d-inline-block position-relative text-secondary text-uppercase pb-2">Materi</h6>
                <h1 class="display-4">Materi Pembalajaran Interaktif</h1>
            </div>
            <div class="owl-carousel team-carousel position-relative" style="padding: 0 30px;">
                @foreach ($materials as $materi)
                    <div class="team-item">
                        @if($materi->thumbnail)
                            <img class="img-fluid w-100" src="{{ asset('storage/' . $materi->thumbnail) }}" alt="Thumbnail">
                        @endif
                        <div class="bg-light text-center p-4">
                            <h5 class="mb-3">{{ $materi->title }}</h5>
                            <p class="mb-2">{{ $materi->type }}</p>
                        <div class="d-flex justify-content-center">
                                <a class="btn btn-primary" href="{{ route('siswa.materi') }}">Lihat Selengkapnya</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <div class="container-fluid bg-image py-5" style="margin: 90px 0;">
        <div class="container py-5">
            <div class="row align-items-center">
                <div class="col-lg-5 mb-5 mb-lg-0">
                    <div class="section-title position-relative mb-4">
                        <h6 class="d-inline-block position-relative text-secondary text-uppercase pb-2">Testimoni</h6>
                        <h1 class="display-4">Apa Kata Para Siswa Kami</h1>
                    </div>
                    <p class="m-0">Kami bangga dapat menghadirkan pengalaman belajar Bahasa Indonesia yang disesuaikan dengan gaya belajar masing-masing siswa. Berikut adalah beberapa testimoni dari siswa SMKN 33 Jakarta yang telah merasakan manfaat dari sistem prediksi gaya belajar dan materi interaktif yang kami kembangkan.</p>
                </div>
                <div class="col-lg-7">
                    <div class="owl-carousel testimonial-carousel">
                        <div class="bg-white p-5">
                            <i class="fa fa-3x fa-quote-left text-primary mb-4"></i>
                            <p>Setelah mengikuti kuisioner, saya mendapatkan materi pembelajaran berupa video dan ilustrasi yang sangat membantu saya memahami isi teks Bahasa Indonesia. Saya jadi lebih mudah menangkap makna karena bisa melihat langsung visualnya.</p>
                            <div class="d-flex flex-shrink-0 align-items-center mt-4">
                                <img class="img-fluid mr-4" src="/home/assets/img/laras.jpg" alt="">
                                <div>
                                    <h5>Laras</h5>
                                    <span>Kelas XI SMKN 33 JAKARTA</span>
                                </div>
                            </div>
                        </div>
                        <div class="bg-white p-5">
                            <i class="fa fa-3x fa-quote-left text-primary mb-4"></i>
                            <p>Saya lebih nyaman belajar dengan mendengarkan penjelasan. Platform ini memberikan audio pembelajaran yang jelas dan mudah diikuti. Saya merasa seperti sedang didampingi guru secara langsung</p>
                            <div class="d-flex flex-shrink-0 align-items-center mt-4">
                                <img class="img-fluid mr-4" src="/home/assets/img/rafli.jpg" alt="">
                                <div>
                                    <h5>Rafli</h5>
                                    <span>Kelas X SMKN 33 JAKARTA </span>
                                </div>
                            </div>
                        </div>
                        <div class="bg-white p-5">
                            <i class="fa fa-3x fa-quote-left text-primary mb-4"></i>
                            <p>Belajar di platform ini seru karena ada aktivitas interaktif seperti drag-and-drop dan simulasi. Saya tidak cepat bosan, dan materi Bahasa Indonesia jadi lebih mudah saya pahami.</p>
                            <div class="d-flex flex-shrink-0 align-items-center mt-4">
                                <img class="img-fluid mr-4" src="/home/assets/img/nanda.jpg" alt="">
                                <div>
                                    <h5>Nanda</h5>
                                    <span>Kelas XI SMKN 33 Jakarta</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    

@endsection