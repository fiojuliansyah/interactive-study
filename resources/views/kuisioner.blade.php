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
							<form id="kuisionerForm"  action="{{ route('siswa.kuisioner.submit') }}" method="POST">
								@csrf
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
                                    <div class="tab-pane active" id="kuisioner">
                                        <h4 class="info-text mb-4">Harap diisi yaa!</h4>
										<div class="row" style="margin-left: 20px">
											@foreach ($questions as $question)
												<div style="margin-bottom: 50px">
													<div class="p-3 border rounded shadow-sm h-100">
														<h5 class="font-weight-bold">{{ $loop->iteration }}. {{ $question->question }}</h5>
														<input type="hidden" name="questions[]" value="{{ $question->id }}">

														<div class="row">
															@foreach (['a', 'b', 'c', 'd'] as $opt)
																<div class="col-sm-6 mt-2">
																	<label class="form-check-label d-block border rounded p-2 shadow-sm w-100">
																		<input 
																			class="form-check-input me-2" 
																			type="radio" 
																			name="answers[{{ $question->id }}]" 
																			value="{{ $opt }}" 
																			required
																		>
																		{{ strtoupper($opt) }}. {{ $question->{'option_' . $opt} }}
																	</label>
																</div>
															@endforeach
														</div>
													</div>
												</div>
											@endforeach
										</div>
                                    </div>
		                        </div>
	                        	<div class="wizard-footer">
	                            	<div class="pull-right">
                                        @guest
                                            <a href="{{ route('login') }}" class="btn btn-fill btn-danger btn-wd" style="margin-left: 20px; margin-top: 10px">Login dulu yuk !</a>
                                        @endguest
                                        
                                        @auth    
                                            <button type="submit" class="btn btn-fill btn-danger btn-wd" style="margin-left: 20px; margin-top: 10px">Next</button>
                                        @endauth
	                                </div>
	                                <div class="clearfix"></div>
	                        	</div>
							</form>
		                </div>
		            </div> <!-- wizard container -->
		        </div>
	    	</div> <!-- row -->
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

</html>
