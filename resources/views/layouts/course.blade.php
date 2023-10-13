<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="keywords" content="Bisa Design">
		<meta name="description" content="Bisa Design">
      	<meta property="og:site_name" content="Bisa Design">
      	<meta property="og:url" content="Bisa.Design">
      	<meta property="og:type" content="website">
      	<meta property="og:title" content="Bisa Design">
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
        <meta name="csrf-token" content="{{ csrf_token() }}">

		<title>Bisa Design Academy</title>
		<!-- Favicon -->
		<link rel="icon" type="image/png" sizes="56x56" href="{{ asset('images/fav-icon/icon.png') }}">
		<!-- Main style sheet -->
		<link rel="stylesheet" type="text/css" href="{{ asset('css/style_20220711.css') }}">
		<!-- responsive style sheet -->
		<link rel="stylesheet" type="text/css" href="{{ asset('css/responsive.css') }}">
        {{-- Slick --}}
        <link rel="stylesheet" type="text/css" href="http://kenwheeler.github.io/slick/slick/slick-theme.css"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.css">
        {{-- FA 6 --}}
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
        {{-- Quill Editor --}}
        <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
        @yield('styles')


		<!-- Fix Internet Explorer ______________________________________-->
		<!--[if lt IE 9]>
			<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
			<script src="vendor/html5shiv.js"></script>
			<script src="vendor/respond.js"></script>
		<![endif]-->
        {{-- <script type="text/javascript">
            // window.history.go();
            window.history.forward();
        </script> --}}
        @yield('js_head')
	</head>



	<body style="background-color: #030034; font-family: 'Fira Code', monospace;">
        {{-- to disable right click paste oncontextmenu="return false;" in ^^ <body ..... > --}}
		{{-- {{ dd($course) }} --}}

		<div class="main-page-wrapper">

			{{-- @include('partials.loading') --}}


			@include('partials.navbar')

			<div class="section">
                @yield('content')
            </div>

			@include('partials.footer')


			<!-- Scroll Top Button -->
			<button class="scroll-top" style="background-color: #fc0101; border:none">
				<i class="fa fa-angle-up" aria-hidden="true"></i>
			</button>

            @yield('modals')

    	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
    	<!-- jQuery -->
		<script src="{{ asset('vendor/jquery.min.js') }}"></script>
		<!-- Popper js -->
		<script src="{{ asset('vendor/popper.js/popper.min.js') }}"></script>
		<!-- Bootstrap JS -->
		<script src="{{ asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script>
	    <!-- menu  -->
		<script src="{{ asset('vendor/mega-menu/assets/js/custom.js') }}"></script>
		<!-- AOS js -->
		<script src="{{ asset('vendor/aos-next/dist/aos.js') }}"></script>
		<!-- js count to -->
		<script src="{{ asset('vendor/jquery.appear.js') }}"></script>
		<script src="{{ asset('vendor/jquery.countTo.js') }}"></script>
		<!-- MixIt Up -->
		<script src="{{ asset('vendor/mixitup-3/mixitup.min.js') }}"></script>
		<!-- Fancybox -->
		<script src="{{ asset('vendor/fancybox/dist/jquery.fancybox.min.js') }}"></script>

		<!-- Theme js -->
		<script src="{{ asset('js/theme.js') }}"></script>
		</div> <!-- /.main-page-wrapper -->

        <!-- Optional JavaScript _____________________________  -->
        @yield('js_bot')
        <script>
            if(performance.navigation.type == 2){
            location.reload(true);
            }
        </script>

	</body>
</html>
