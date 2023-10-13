<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="keywords" content="Digital marketing agency, Digital marketing company, Digital marketing services, sass, software company">
		<meta name="description" content="Deski is a creative saas and software html template designed for saas and software Agency websites.">
      	<meta property="og:site_name" content="deski">
      	<meta property="og:url" content="https://heloshape.com/">
      	<meta property="og:type" content="website">
      	<meta property="og:title" content="Deski: creative saas and software html template">
		<meta name='og:image' content='images/assets/ogg.png'>
		<!-- For IE -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<!-- For Resposive Device -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<!-- For Window Tab Color -->
		<!-- Chrome, Firefox OS and Opera -->
		<meta name="theme-color" content="#7034FF">
		<!-- Windows Phone -->
		<meta name="msapplication-navbutton-color" content="#7034FF">
		<!-- iOS Safari -->
		<meta name="apple-mobile-web-app-status-bar-style" content="#7034FF">
		<title>Bisa Design Academy | {{ $title }}</title>
		<!-- Favicon -->
		<link rel="icon" type="image/png" sizes="56x56" href="images/fav-icon/icon.png">
		<!-- Main style sheet -->
		<link rel="stylesheet" type="text/css" href="{{ asset('css/style_20220711.css') }}">
		<!-- responsive style sheet -->
		<link rel="stylesheet" type="text/css" href="{{ asset('css/responsive.css') }}">

		<!-- Fix Internet Explorer ______________________________________-->
		<!--[if lt IE 9]>
			<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
			<script src="vendor/html5shiv.js"></script>
			<script src="vendor/respond.js"></script>
		<![endif]-->
	</head>

	<body style="background-color: #030034;">
		<div class="main-page-wrapper p0" style="background-color: #030034; font-family: 'Fira Code', monospace;">
			<!-- ===================================================
				Loading Transition
			==================================================== -->
			{{-- @include('partials.loading') --}}

            @if(session()->has('errorRegist'))
					<div class="alert alert-danger alert-dismissible fade show" role="alert" style="position:fixed; top:10px; right:20px; z-index:9999">
						{{ session()->get('errorRegist') }}
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						  <span aria-hidden="true">&times;</span>
						</button>
					</div>
			@endif

			<!--
			=============================================
				Sign In
			==============================================
			-->
			<div class="user-data-page clearfix d-lg-flex" style="margin-top: -30px">
				<div class="illustration-wrapper d-flex align-items-center justify-content-center flex-column" style="background-color: #030034">
					{{-- <h3 class="font-rubik">We have a “strategic” plan its <br> called doing things.</h3> --}}
                    <h3></h3>
                    <h3></h3>
                    <h3></h3>
                    <h3></h3>
                    <h3></h3>
					<div class="illustration-holder">
						{{-- <img src="images/assets/ils_08.svg" alt="" class="illustration"> --}}
						<img src="{{ asset('images/logo_home.png') }}" alt="" class="shapes shape-one">
						{{-- <img src="images/assets/ils_08.2.svg" alt="" class="shapes shape-two"> --}}
					</div>
				</div> <!-- /.illustration-wrapper -->

				<div class="form-wrapper">
					<div class="d-flex justify-content-between">
						{{-- <div class="logo"><a href="index.html"><img src="images/logo/deski_01.svg" alt=""></a></div> --}}
						<a href="/" class="go-back-button" style="color: white; font-weight:700; font-size:20px">GO TO HOME</a>
					</div>

					<form action="/register" method="post" class="user-data-form mt-30">
						@csrf
						<h2 class="text-center" style="margin-bottom: 20px; color:white">REGISTER</h2>

						@if(session()->has('error'))
						<div class="alert alert-danger alert-dismissible fade show" role="alert" style="margin-top: -15px; margin-bottom:30px">
							{{ session()->get('error') }}
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							  <span aria-hidden="true">&times;</span>
							</button>
						</div>
						@endif

						{{-- <p class="header-info pt-30 pb-50">Already have an account?  <a href="/login">Login</a></p> --}}

						<div class="row" style="margin-top: 60px">
							<div class="col-12">
								<div class="input-group-meta mb-50">
									<label for="name">Name</label>
									<input type="text" placeholder="name" name="name" id="name" required value="{{ old('name') }}">
                                    @error('name')
                                    <div class="text-right" >
                                        <small class="text-danger">
                                            {{ $message }}
                                        </small>
                                    </div>
                                    @enderror
								</div>
							</div>
							<div class="col-12">
								<div class="input-group-meta mb-50">
									<label for="email">Email</label>
									<input type="email" placeholder="email" name="email" id="email" required value="{{ old('email') }}">
                                    @error('email')
                                    <div class="text-right" >
                                        <small class="text-danger">
                                            {{ $message }}
                                        </small>
                                    </div>
                                    @enderror

								</div>
							</div>
							<div class="col-12">
								<div class="input-group-meta mb-50">
									<label for="password">Password</label>
									<input type="password" placeholder="Enter Password" class="pass_log_id" name="password" id="password">
									<span class="placeholder_icon"><span class="passVicon"><img src="{{ asset('images/icon/view.svg') }}" alt=""></span></span>
                                    @error('password')
                                    <div class="text-right" >
                                        <small class="text-danger">
                                            {{ $message }}
                                        </small>
                                    </div>
                                    @enderror
								</div>
							</div>
							<div class="col-12">
								<div class="input-group-meta mb-15">
									<label for="password">Re-type Password</label>
									<input type="password" placeholder="Enter Password" class="pass_log_id" name="confirm_password" id="confirm_password">
									<span class="placeholder_icon"><span class="passVicon"><img src="{{ asset('images/icon/view.svg') }}" alt=""></span></span>
                                    @error('confirm_password')
                                    <div class="text-right" >
                                        <small class="text-danger">
                                            {{ $message }}
                                        </small>
                                    </div>
                                    @enderror
								</div>
							</div>

							<div class="col-12 mt-4">
								<button class="theme-btn-fourteen mt-30 mb-50 m-auto">Sign Up</button>
							</div>
							<div class="col-12 text-center mt-4">
								<p style="color:white">SUDAH PUNYA AKUN? <a href="/login" style="color:red" >LOGIN</a> </p>
							</div>
							{{-- <div class="col-12">
								<p class="text-center font-rubik copyright-text">© Copyright 2021 deski</p>
							</div> --}}
						</div>
					</form>
				</div> <!-- /.form-wrapper -->
			</div> <!-- /.user-data-page -->







		<!-- Optional JavaScript _____________________________  -->

    	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
    	<!-- jQuery -->
		<script src="vendor/jquery.min.js"></script>
		<!-- Popper js -->
		<script src="vendor/popper.js/popper.min.js"></script>
		<!-- Bootstrap JS -->
		<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
	    <!-- menu  -->
		<script src="vendor/mega-menu/assets/js/custom.js"></script>
		<!-- AOS js -->
		<script src="vendor/aos-next/dist/aos.js"></script>
		<!-- js count to -->
		<script src="vendor/jquery.appear.js"></script>
		<script src="vendor/jquery.countTo.js"></script>

		<!-- MixIt Up -->
		<script src="vendor/mixitup-3/mixitup.min.js"></script>


		<!-- Theme js -->
		<script src="js/theme.js"></script>
		</div> <!-- /.main-page-wrapper -->
	</body>
</html>
