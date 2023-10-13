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

	<body style="background-color: #030034; font-family: 'Fira Code', monospace;">
		<div class="main-page-wrapper p0" style="margin-top: -30px">
			<!-- ===================================================
				Loading Transition
			==================================================== -->
			{{-- @include('partials.loading') --}}

			{{-- {{ dd($message) }} --}}


			<!--
			=============================================
				Sign In
			==============================================
			-->
			<div class="user-data-page clearfix d-lg-flex" >
				<div class="illustration-wrapper d-flex align-items-center justify-content-center flex-column" style="background-color: #030034">
					<h3 style="color: white"></h3>
					<h3 style="color: white"></h3>
					<h3 style="color: white"></h3>
					<h3 style="color: white"></h3>
					<h3 style="color: white"></h3>
					<div class="illustration-holder">
						{{-- <img src="images/assets/ils_08.svg" alt="" class="illustration"> --}}
						<img src="{{ asset('images/logo_home.png') }}" alt="" class="shapes shape-one">
						{{-- <img src="images/assets/ils_08.1.svg" alt="" class="shapes shape-one">
						<img src="images/assets/ils_08.2.svg" alt="" class="shapes shape-two"> --}}
					</div>
				</div> <!-- /.illustration-wrapper -->

				<div class="form-wrapper">
					<div class="d-flex justify-content-between">
						{{-- <div class="logo"><a href="/"><img src="{{ asset('images/fav-icon/icon.png') }}" width="50px" alt=""></a></div> --}}
						<a href="/login" class="go-back-button" style="color: white; font-weight:700; font-size:20px">Kembali</a>
					</div>

					{{-- @if(session()->has('successLogin'))
					<div class="alert alert-success alert-dismissible fade show" role="alert" style="position:absolute; top:50px; right:10px; z-index:9999">
						{{ session('successLogin') }}
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						  <span aria-hidden="true">&times;</span>
						</button>
					</div>
					@endif --}}

					@if(session()->has('errorPass'))
					<div class="alert alert-danger alert-dismissible fade show" role="alert" style="position:absolute; top:50px; right:10px; z-index:9999">
						{{ session()->get('errorPass') }}
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						  <span aria-hidden="true">&times;</span>
						</button>
					</div>
					@endif

					<form action="/forgot-pass" method="POST" class="user-data-form mt-20 md-mt-40">
						@csrf
						{{-- <h2>Hello, welcome <br> Back!</h2> --}}
						<div class="row" style="margin-top: 100px">
                            <div class="col-12 text-center" style="margin-bottom: 100PX">
                                <h2 style="color: white">Lupa Password</h2>
                            </div>
							<div class="col-12">
								<div class="input-group-meta mb-80 sm-mb-70">
									<label>Masukkan Email</label>
									<input type="email" placeholder="Email" name="email" id="email" autofocus required autocomplete="on">
								</div>
							</div>

							<div class="col-12">
								<button type="submit" class="theme-btn-fourteen mt-50 mb-50 m-auto">Reset Password</button>
							</div>
							{{-- <div class="col-12 text-center" style="margin-top: 22px">
								<a href="#" style="align-items: center; font-size:14px">Forgot Password?</a>
                                <p style="color: white">Belum punya akun? <a href="/register" style="color: red">SIGN UP</a> atau <a href="/forgot-pass" style="color: red">LUPA PASSWORD</a></p>
							</div> --}}
							<hr>
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
        <script>
            // reload page when back button is clicked
            window.addEventListener( "pageshow", function ( event ) {
            var historyTraversal = event.persisted || ( typeof window.performance != "undefined" && window.performance.navigation.type === 2 );
            if ( historyTraversal ) {
                // Handle page restore.
                //alert('refresh');
                window.location.reload();
            }
            });
        </script>
	</body>
</html>
