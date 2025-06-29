@extends('layouts.guest')


@section('content')
<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					<img src="/home/assets/img/logo.png" alt="">
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-12 col-lg-10">
					<div class="wrap d-md-flex">
						<div class="img" style="background-image: url(/guest/assets/images/bg-1.jpg);">
			      </div>
						<div class="login-wrap p-4 p-md-5">
			      	<div class="d-flex">
			      		<div class="w-100">
			      			<h3 class="mb-4">Daftar</h3>
			      		</div>
								<div class="w-100">
									<p class="social-media d-flex justify-content-end">
										<a href="#" class="social-icon d-flex align-items-center justify-content-center"><span class="fa fa-facebook"></span></a>
										<a href="#" class="social-icon d-flex align-items-center justify-content-center"><span class="fa fa-twitter"></span></a>
									</p>
								</div>
			      	</div>
                    <form class="signin-form" method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="form-group mb-3">
                            <label class="label" for="name">Username</label>
                            <input type="text" class="form-control" name="username" placeholder="username anda" required>
                        </div>
                        <div class="form-group mb-3">
                            <label class="label" for="name">Nama</label>
                            <input type="text" class="form-control" name="name" placeholder="Nama anda" required>
                        </div>
                        <div class="form-group mb-3">
                            <label class="label" for="name">Email</label>
                            <input type="text" class="form-control" name="email" placeholder="Email" required>
                        </div>
                        <div class="form-group mb-3">
                            <label class="label" for="password">Password</label>
                            <input type="password" class="form-control" name="password" placeholder="Password" required>
                        </div>
                        <div class="form-group mb-3">
                            <label class="label" for="password">Ulangi Password</label>
                            <input type="password" class="form-control" name="confirm_password" placeholder="Ulangi Password" required>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="form-control btn btn-primary rounded submit px-3">Daftar</button>
                        </div>
                    </form>
		          <p class="text-center">Sudah Punya Akun? <a href="{{ route('login') }}">Masuk</a></p>
		        </div>
		      </div>
				</div>
			</div>
		</div>
	</section>
@endsection