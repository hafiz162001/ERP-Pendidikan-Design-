<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">

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
		<title>404 | Page Not Found</title>
		<!-- Favicon -->
		<link rel="icon" type="image/png" sizes="56x56" href="{{ asset('images/fav-icon/icon.png') }}">
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

	<body style="background-color: #030034; font-family: 'Fira Code', monospace;">
		<div class="main-page-wrapper p0">
			{{-- <!-- ===================================================
				Loading Transition
			==================================================== -->
			<section>
				<div id="preloader">
					<div id="ctn-preloader" class="ctn-preloader">
						<div class="animation-preloader">
							<div class="spinner"></div>
							<div class="txt-loading">
								<span data-text-preloader="D" class="letters-loading">
									D
								</span>
								<span data-text-preloader="E" class="letters-loading">
									E
								</span>
								<span data-text-preloader="S" class="letters-loading">
									S
								</span>
								<span data-text-preloader="K" class="letters-loading">
									K
								</span>
								<span data-text-preloader="I" class="letters-loading">
									I
								</span>
							</div>
						</div>
					</div>
				</div>
			</section> --}}


			<div class="error-page d-lg-flex align-items-center">
				<div class="img-holder order-lg-last" style="display:flex; justify-content:center; align-items:center">
					<img src="{{ asset('images/logo_home.png') }}" height="600px" alt="" >
					{{-- <img src="{{ asset('images/logo_home.png') }}" alt="" class="w-80 illustration"> --}}
					{{-- <img src="images/media/404-q.svg" alt="" class="shapes qus"> --}}
				</div>
				<div class="text-wrapper order-lg-first">
					{{-- <div class="logo"><a href="index.html"><img src="images/logo/deski_05.svg" alt=""></a></div> --}}
					<h1 class="font-slab" style="color: white">404 <br>Maaf<br>Halaman tidak ditemukan.</h1>
                    <br>
                    <br>
					{{-- <p class="font-rubik">quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat</p> --}}
					<a href="/" class="theme-btn-fourteen font-rubik d-flex align-items-center justify-content-center">
						<span>Back to Home</span>
					</a>
				</div> <!-- /.text-wrapper -->
			</div> <!-- /.error-page -->





		<!-- Optional JavaScript _____________________________  -->

    	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
    	<!-- jQuery -->
		<script src="vendor/jquery.min.js"></script>
		<!-- Popper js -->
		<script src="vendor/popper.js/popper.min.js"></script>
		<!-- Bootstrap JS -->
		<script src="vendor/bootstrap/js/bootstrap.min.js"></script>


		<!-- Theme js -->
		<script src="js/theme.js"></script>
		</div> <!-- /.main-page-wrapper -->
	</body>
</html>
