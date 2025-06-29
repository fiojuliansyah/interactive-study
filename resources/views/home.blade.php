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
                        <img class="position-absolute w-100 h-100" src="/home/assets/img/about.jpg" style="object-fit: cover;">
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="section-title position-relative mb-4">
                        <h6 class="d-inline-block position-relative text-secondary text-uppercase pb-2">Tentang Kami</h6>
                        <h1 class="display-4">Pilihan Utama untuk Belajar Interaktif di Mana Saja</h1>
                    </div>
                    <p>Kami menyediakan platform pembelajaran interaktif yang memungkinkan siapa pun untuk belajar secara fleksibel, kapan saja dan di mana saja. Dengan berbagai topik dan pengajar ahli, pengalaman belajar Anda akan semakin menyenangkan dan bermakna.</p>
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
                        <h1 class="display-4">Mengapa Anda Harus Mulai Belajar Bersama Kami?</h1>
                    </div>
                    <p class="mb-4 pb-2">Kami menawarkan pengalaman belajar yang interaktif, fleksibel, dan berkualitas tinggi. Dengan pengajar berpengalaman, sertifikasi internasional, dan kelas daring yang mudah diakses, proses belajar Anda menjadi lebih efektif dan menyenangkan.</p>
                    
                    <div class="d-flex mb-3">
                        <div class="btn-icon bg-primary mr-4">
                            <i class="fa fa-2x fa-graduation-cap text-white"></i>
                        </div>
                        <div class="mt-n1">
                            <h4>Instruktur Profesional</h4>
                            <p>Kami menghadirkan pengajar berpengalaman dan ahli di bidangnya untuk memastikan materi tersampaikan dengan efektif dan mudah dipahami.</p>
                        </div>
                    </div>
                    
                    <div class="d-flex mb-3">
                        <div class="btn-icon bg-secondary mr-4">
                            <i class="fa fa-2x fa-certificate text-white"></i>
                        </div>
                        <div class="mt-n1">
                            <h4>Sertifikat Internasional</h4>
                            <p>Setiap peserta berkesempatan mendapatkan sertifikat bertaraf internasional sebagai pengakuan atas kompetensi yang dimiliki.</p>
                        </div>
                    </div>
                    
                    <div class="d-flex">
                        <div class="btn-icon bg-warning mr-4">
                            <i class="fa fa-2x fa-book-reader text-white"></i>
                        </div>
                        <div class="mt-n1">
                            <h4>Kelas Daring Fleksibel</h4>
                            <p class="m-0">Kapan saja dan di mana saja, Anda bisa mengakses kelas daring yang telah dirancang untuk mendukung pembelajaran yang fleksibel dan mandiri.</p>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-5" style="min-height: 500px;">
                    <div class="position-relative h-100">
                        <img class="position-absolute w-100 h-100" src="/home/assets/img/feature.jpg" style="object-fit: cover;">
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
                        @if($material->thumbnail)
                            <img class="img-fluid w-100" src="{{ asset('storage/' . $material->thumbnail) }}" alt="">
                        @else
                            <img class="img-fluid w-100" src="https://img.freepik.com/premium-vector/digital-learning-environment-where-participants-study-online-through-interactive-tools-resources-online-education-business-training-concept-distance-courses_538213-148492.jpg" alt="">
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
                    <p class="m-0">Kami bangga dapat memberikan pengalaman belajar yang bermakna. Berikut adalah beberapa testimoni dari siswa kami yang merasakan langsung manfaat dari pembelajaran interaktif yang kami tawarkan.</p>
                </div>
                <div class="col-lg-7">
                    <div class="owl-carousel testimonial-carousel">
                        <div class="bg-white p-5">
                            <i class="fa fa-3x fa-quote-left text-primary mb-4"></i>
                            <p>Materi mudah dipahami dan instruktur sangat membantu. Saya bisa belajar dengan ritme saya sendiri dan tetap merasa didampingi. Pengalaman belajar yang luar biasa!</p>
                            <div class="d-flex flex-shrink-0 align-items-center mt-4">
                                <img class="img-fluid mr-4" src="/home/assets/img/testimonial-2.jpg" alt="">
                                <div>
                                    <h5>Nama Siswa</h5>
                                    <span>Desain Web</span>
                                </div>
                            </div>
                        </div>
                        <div class="bg-white p-5">
                            <i class="fa fa-3x fa-quote-left text-primary mb-4"></i>
                            <p>Saya awalnya ragu belajar secara online, tapi platform ini sangat user-friendly dan interaktif. Setelah ikut kursus ini, saya jadi lebih percaya diri dalam bidang web development.</p>
                            <div class="d-flex flex-shrink-0 align-items-center mt-4">
                                <img class="img-fluid mr-4" src="/home/assets/img/testimonial-1.jpg" alt="">
                                <div>
                                    <h5>Nama Siswa</h5>
                                    <span>Desain Web</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="row align-items-center">
                <!-- Informasi Kontak -->
                <div class="col-lg-5 mb-5 mb-lg-0">
                    <div class="bg-light d-flex flex-column justify-content-center px-5" style="height: 450px;">
                        <div class="d-flex align-items-center mb-5">
                            <div class="btn-icon bg-primary mr-4">
                                <i class="fa fa-2x fa-map-marker-alt text-white"></i>
                            </div>
                            <div class="mt-n1">
                                <h4>Lokasi Kami</h4>
                                <p class="m-0">123 Jalan Raya, Jakarta, Indonesia</p>
                            </div>
                        </div>
                        <div class="d-flex align-items-center mb-5">
                            <div class="btn-icon bg-secondary mr-4">
                                <i class="fa fa-2x fa-phone-alt text-white"></i>
                            </div>
                            <div class="mt-n1">
                                <h4>Hubungi Kami</h4>
                                <p class="m-0">+62 812 3456 7890</p>
                            </div>
                        </div>
                        <div class="d-flex align-items-center">
                            <div class="btn-icon bg-warning mr-4">
                                <i class="fa fa-2x fa-envelope text-white"></i>
                            </div>
                            <div class="mt-n1">
                                <h4>Email Kami</h4>
                                <p class="m-0">info@contoh.com</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Formulir Kontak -->
                {{-- <div class="col-lg-7">
                    <div class="section-title position-relative mb-4">
                        <h6 class="d-inline-block position-relative text-secondary text-uppercase pb-2">Butuh Bantuan?</h6>
                        <h1 class="display-4">Kirim Pesan Kepada Kami</h1>
                    </div>
                    <div class="contact-form">
                        <form>
                            <div class="row">
                                <div class="col-6 form-group">
                                    <input type="text" class="form-control border-top-0 border-right-0 border-left-0 p-0" placeholder="Nama Anda" required="required">
                                </div>
                                <div class="col-6 form-group">
                                    <input type="email" class="form-control border-top-0 border-right-0 border-left-0 p-0" placeholder="Email Anda" required="required">
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control border-top-0 border-right-0 border-left-0 p-0" placeholder="Subjek" required="required">
                            </div>
                            <div class="form-group">
                                <textarea class="form-control border-top-0 border-right-0 border-left-0 p-0" rows="5" placeholder="Pesan Anda" required="required"></textarea>
                            </div>
                            <div>
                                <button class="btn btn-primary py-3 px-5" type="submit">Kirim Pesan</button>
                            </div>
                        </form>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>

@endsection