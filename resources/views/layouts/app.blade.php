<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Interstudy | platform Pembelajaran Interaktif</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="/home/assets/img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@500;600;700&family=Open+Sans:wght@400;600&display=swap" rel="stylesheet"> 

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="/home/assets/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="/home/assets/css/style.css" rel="stylesheet">
</head>

<body>
    {{-- <div class="container-fluid bg-dark">
        <div class="row py-2 px-lg-5">
            <div class="col-lg-6 text-center text-lg-left mb-2 mb-lg-0">
                <div class="d-inline-flex align-items-center text-white">
                    <small><i class="fa fa-phone-alt mr-2"></i>+012 345 6789</small>
                    <small class="px-3">|</small>
                    <small><i class="fa fa-envelope mr-2"></i>hello@interstudy.com</small>
                </div>
            </div>
            <div class="col-lg-6 text-center text-lg-right">
                <div class="d-inline-flex align-items-center">
                    <a class="text-white px-2" href="">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a class="text-white px-2" href="">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a class="text-white px-2" href="">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                    <a class="text-white px-2" href="">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a class="text-white pl-2" href="">
                        <i class="fab fa-youtube"></i>
                    </a>
                </div>
            </div>
        </div>
    </div> --}}

    <div class="container-fluid p-0">
        <nav class="navbar navbar-expand-lg bg-white navbar-light py-3 py-lg-0 px-lg-5">
            <a href="index.html" class="navbar-brand ml-lg-3">
                <img src="/home/assets/img/logo.png" alt="" width="60%">
            </a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-between px-lg-3" id="navbarCollapse">
                <div class="navbar-nav mx-auto py-0">
                    <a href="{{ route('siswa.dashboard') }}" class="nav-item nav-link {{ Route::is('siswa.dashboard') ? 'active' : '' }}">Beranda</a>
                    <a href="{{ route('siswa.kuisioner') }}" class="nav-item nav-link {{ Route::is('siswa.kuisioner') ? 'active' : '' }}">Kuisioner</a>
                    <a href="{{ route('siswa.prediksi') }}" class="nav-item nav-link {{ Route::is('siswa.prediksi') ? 'active' : '' }}">Hasil Prediksi</a>
                    <a href="{{ route('siswa.materi') }}" class="nav-item nav-link {{ Route::is('siswa.materi') ? 'active' : '' }}">Materi</a> 
                </div>
                @guest 
                    <a href="{{ route('login') }}" class="btn btn-primary py-2 px-4 d-none d-lg-block">Login</a>
                @endguest

                @auth
                    <div class="dropdown d-inline-block">
                        <button class="btn btn-primary dropdown-toggle py-2 px-4 d-none d-lg-block" type="button" id="userDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{ Auth::user()->role }}
                        </button>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                            @if (Auth::user()->role == 'admin')  
                                <a class="dropdown-item" href="{{ route('dashboard') }}">
                                    <i class="fa fa-home mr-2"></i> Dashboard
                                </a>
                            @endif
                            <a class="dropdown-item" href="{{ route('siswa.profile') }}">
                                <i class="fa fa-user mr-2"></i> Profil
                            </a>
                            @if (Auth::user()->role == 'siswa')  
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="dropdown-item">
                                    <i class="fa fa-sign-out-alt mr-2"></i> Logout
                                </button>
                            </form>
                            @endif
                        </div>
                    </div>
                @endauth
            </div>
        </nav>
    </div>
    @include('sweetalert::alert')
    @yield('content')

    <div class="container-fluid position-relative overlay-top bg-dark text-white-50 py-5" style="margin-top: 90px;">
        <div class="container mt-5 pt-5">
            <div class="row">
                <!-- Logo & Deskripsi -->
                <div class="col-md-6 mb-5">
                    <a href="index.html" class="navbar-brand">
                        <img src="/home/assets/img/logo.png" alt="" width="60%">
                    </a>
                    <p class="m-0">Kami berkomitmen untuk menghadirkan pengalaman belajar Bahasa Indonesia yang interaktif dan adaptif. Dengan sistem prediksi gaya belajar yang terintegrasi dan materi yang disesuaikan dengan kebutuhan siswa, platform ini dirancang untuk mendukung peningkatan pemahaman siswa secara optimal dan personal.</p>
                </div>

                <!-- Newsletter -->
                <div class="col-md-6 mb-5">
                    <h3 class="text-white mb-4">SMKN 33 JAKARTA</h3>
                    <div class="w-100">
                        <div class="input-group">
                            <input type="text" class="form-control border-light" style="padding: 30px;" placeholder="Alamat Email Anda">
                            <div class="input-group-append">
                                <button class="btn btn-primary px-4">Daftar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Kontak & Navigasi -->
            <div class="row">
                <!-- Kontak -->
                <div class="col-md-4 mb-5">
                    <h3 class="text-white mb-4">Hubungi Kami</h3>
                    <p><i class="fa fa-map-marker-alt mr-2"></i>Kelapa Gading, Jakarta, Indonesia</p>
                    <p><i class="fa fa-phone-alt mr-2"></i>+62 812 3456 7890</p>
                    <p><i class="fa fa-envelope mr-2"></i>smkn33@gmail.com</p>
                    <div class="d-flex justify-content-start mt-4">
                        <a class="text-white mr-4" href="#"><i class="fab fa-2x fa-twitter"></i></a>
                        <a class="text-white mr-4" href="#"><i class="fab fa-2x fa-facebook-f"></i></a>
                        <a class="text-white mr-4" href="#"><i class="fab fa-2x fa-linkedin-in"></i></a>
                        <a class="text-white" href="#"><i class="fab fa-2x fa-instagram"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <a href="#" class="btn btn-lg btn-primary rounded-0 btn-lg-square back-to-top"><i class="fa fa-angle-double-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="/home/assets/lib/easing/easing.min.js"></script>
    <script src="/home/assets/lib/waypoints/waypoints.min.js"></script>
    <script src="/home/assets/lib/counterup/counterup.min.js"></script>
    <script src="/home/assets/lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="/home/assets/js/main.js"></script>
    @stack('js')
</body>

</html>