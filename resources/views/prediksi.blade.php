<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title>Material Bootstrap Wizard by Creative Tim</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

	<link rel="apple-touch-icon" sizes="76x76" href="/frontpage/assets/img/apple-icon.png" />
	<link rel="icon" type="image/png" href="/frontpage/assets/img/favicon.png" />

	<!--     Fonts and icons     -->
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />

	<!-- CSS Files -->
	<link href="/frontpage/assets/css/bootstrap.min.css" rel="stylesheet" />
	<link href="/frontpage/assets/css/material-bootstrap-wizard.css" rel="stylesheet" />

	<!-- CSS Just for demo purpose, don't include it in your project -->
	<link href="/frontpage/assets/css/demo.css" rel="stylesheet" />
</head>

<body>
	<div class="image-container set-full-height" style="background-image: url('/frontpage/assets/img/wizard-book.jpg')">
	    <!--   Creative Tim Branding   -->
        @guest
            <a href="{{ route('login') }}" class="btn btn-next btn-fill btn-danger btn-wd" style="margin-left: 20px; margin-top: 10px">Login</a>
        @endguest

        @auth
            <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                @csrf
                <button type="submit" class="btn btn-next btn-fill btn-warning btn-wd" style="margin-left: 20px; margin-top: 10px">
                    Logout
                </button>
            </form>
        @endauth
		<!--  Made With Material Kit  -->
		<a href="http://demos.creative-tim.com/material-kit/index.html?ref=material-bootstrap-wizard" class="made-with-mk">
			<div class="brand">MK</div>
			<div class="made-with">Made with <strong>Material Kit</strong></div>
		</a>

	    <div class="container">
	        <div class="row" style="margin-bottom: 50px;">
		        <div class="col-sm-8 col-sm-offset-2">
		            <!--      Wizard container        -->
		            <div class="wizard-container">
		                <div class="card wizard-card" data-color="red" id="wizard">
		                    <form action="" method="">
		                <!--        You can switch " data-color="blue" "  with one of the next bright colors: "green", "orange", "red", "purple"             -->

		                    	<div class="wizard-header">
		                        	<h3 class="wizard-title">
		                        		Interactive Study
		                        	</h3>
									<h5>Hallo @auth {{ Auth::user()->name }} @endauth , Selamat datang di Interactive Study</h5>
		                    	</div>
								<ul>
									<li style="background-color: {{ Route::is('siswa.dashboard') ? '#F44336' : '' }}">
										<a href="{{ route('siswa.dashboard') }}"><span style="color: {{ Route::is('siswa.dashboard') ? 'white' : '' }}">Materi</span></a>
									</li>
									<li style="background-color: {{ Route::is('siswa.kuisioner') ? '#F44336' : '' }};">
										<a href="{{ route('siswa.kuisioner') }}"><span style="color: {{ Route::is('siswa.kuisioner') ? 'white' : '' }}">Kuisioner</span></a>
									</li>
									<li style="background-color: {{ Route::is('siswa.prediksi') ? '#F44336' : '' }}">
										<a href="{{ route('siswa.prediksi') }}"><span style="color: {{ Route::is('siswa.prediksi') ? 'white' : '' }}">Hasil Prediksi</span></a>
									</li>
								</ul>
		                        <div class="tab-content">
		                            <div class="tab-pane active" id="hasil-prediksi">
                                        <div class="table-responsive">
                                            <h5 class="mb-3">Semua Jawaban</h5>
                                            <table class="table table-striped table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Pertanyaan</th>
                                                        <th>Pilihan</th>
                                                        <th>Hasil</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($answers as $index => $answer)
                                                        <tr>
                                                            <td>{{ $index + 1 }}</td>
                                                            <td>{{ $answer->question->question }}</td>
                                                            <td>
                                                                @switch($answer->answer)
                                                                    @case('a') {{ $answer->question->option_a }} @break
                                                                    @case('b') {{ $answer->question->option_b }} @break
                                                                    @case('c') {{ $answer->question->option_c }} @break
                                                                    @case('d') {{ $answer->question->option_d }} @break
                                                                    @default -
                                                                @endswitch
                                                            </td>
                                                            <td>
                                                                @if ($answer->question->answer == $answer->answer)
                                                                    <span class="text-success">Benar</span>
                                                                @else
                                                                    <span class="text-danger">Salah</span>
                                                                @endif
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>

                                            <div class="mt-4">
                                                <h5>Prediksi Tipe Materi:</h5>
                                                <p>
                                                    @if ($predictedType)
                                                        {{ $predictedType ? $predictedType : 'Tipe belum dapat diprediksi' }}
                                                    @else
                                                        Tidak bisa diprediksi.
                                                    @endif
                                                </p>
                                            </div>

                                            <div class="mt-4">
                                                <h5>Persentase Tipe Materi:</h5>
                                                <ul>
                                                    @forelse($typePercentages as $type => $percentage)
                                                        <li>{{ $type }}: {{ $percentage }}%</li>
                                                    @empty
                                                        <li>Tidak ada data persentase tipe materi.</li>
                                                    @endforelse
                                                </ul>
                                            </div>



                                            @if($wrongAnswers->count() > 0)
                                                <div class="mt-5">
                                                    <h5>Pertanyaan yang Dijawab Salah:</h5>
                                                    <table class="table table-bordered">
                                                        <thead>
                                                            <tr>
                                                                <th>No</th>
                                                                <th>Pertanyaan</th>
                                                                <th>Jawaban Siswa</th>
                                                                <th>Jawaban Benar</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach($wrongAnswers as $index => $answer)
                                                                <tr>
                                                                    <td>{{ $index + 1 }}</td>
                                                                    <td>{{ $answer->question->question }}</td>
                                                                    <td>
                                                                        @php
                                                                            $options = [
                                                                                'a' => $answer->question->option_a,
                                                                                'b' => $answer->question->option_b,
                                                                                'c' => $answer->question->option_c,
                                                                                'd' => $answer->question->option_d,
                                                                            ];
                                                                        @endphp
                                                                        {{ $options[$answer->answer] ?? '-' }}
                                                                    </td>
                                                                    <td>{{ $options[$answer->question->answer] ?? '-' }}</td>
                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            @else
                                                <div class="mt-5">
                                                    <h5>Selamat!</h5>
                                                    <p>Semua jawaban Anda benar.</p>
                                                </div>
                                            @endif

                                        </div>
		                            </div>
		                        </div>
	                        	<div class="wizard-footer">
	                            	<div class="pull-right">
                                        @guest
                                            <a href="{{ route('login') }}" class="btn btn-fill btn-danger btn-wd" style="margin-left: 20px; margin-top: 10px">Login dulu yuk !</a>
                                        @endguest
                                        
                                        @auth    
                                            <form action="{{ route('siswa.reset.prediksi') }}" method="POST" onsubmit="return confirm('Yakin ingin mereset semua jawaban?')">
                                                @csrf
                                                <button type="submit" class="btn btn-fill btn-danger btn-wd">Reset Prediksi</button>
                                            </form>
                                        @endauth
	                                </div>
	                                <div class="clearfix"></div>
	                        	</div>
		                    </form>
		                </div>
		            </div> <!-- wizard container -->
		        </div>
	    	</div>
		</div>

	</div>



</body>
	<!--   Core JS Files   -->
	<script src="/frontpage/assets/js/jquery-2.2.4.min.js" type="text/javascript"></script>
	<script src="/frontpage/assets/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="/frontpage/assets/js/jquery.bootstrap.js" type="text/javascript"></script>

	<!--  Plugin for the Wizard -->
	<script src="/frontpage/assets/js/material-bootstrap-wizard.js"></script>

	<!--  More information about jquery.validate here: http://jqueryvalidation.org/	 -->
	<script src="/frontpage/assets/js/jquery.validate.min.js"></script>
    <script>
        function submitKuisioner() {
            document.getElementById('kuisionerForm').submit();
        }
    </script>

</html>
