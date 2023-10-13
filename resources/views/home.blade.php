{{-- @dd($crs) --}}
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="keywords" content="Bisa.Design">
		<meta name="description" content="Bisa.Design">
      	<meta property="og:site_name" content="bisa.design">
      	<meta property="og:url" content="Bisa Design">
      	<meta property="og:type" content="website">
      	<meta property="og:title" content="Bisa.Design">
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
		<title> Bisa Design Academy</title>
		<!-- Favicon -->
		<link rel="icon" type="image/png" sizes="56x56" href="{{ asset('images/fav-icon/icon.png') }}">
		<!-- Main style sheet -->
		<link rel="stylesheet" type="text/css" href="{{ asset('css/style_20220711.css') }}">
		<!-- responsive style sheet -->
		<link rel="stylesheet" type="text/css" href="{{ asset('css/responsive.css') }}">
        {{-- FA 6 --}}
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
        {{-- font --}}
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Fira+Code:wght@400;500;700&display=swap" rel="stylesheet">

        <script type="text/javascript">
            // prevent user back to login page
            // function preventBack() { window.history.forward(); }
            // setTimeout("preventBack()", 0);
            // window.onunload = function () { null };

            // window.history.forward();

            // prevent back
            // window.history.forward();
        </script>
	</head>

	{{-- <body data-spy="scroll" data-target="#one-page-nav" data-offset="120" oncontextmenu="return false;"> --}}
	<body style="background-color: #030034; font-family: 'Fira Code', monospace;">
		<div class="main-page-wrapper ">
			<!-- ===================================================
				Loading Transition
			==================================================== -->
			{{-- <section>
				<div id="preloader">
					<div id="ctn-preloader" class="ctn-preloader">
						<div class="animation-preloader">
							<div class="spinner"></div>
							<div class="txt-loading">
								<span data-text-preloader="B" class="letters-loading">
									B
								</span>
								<span data-text-preloader="I" class="letters-loading">
									I
								</span>
								<span data-text-preloader="S" class="letters-loading">
									S
								</span>
								<span data-text-preloader="A" class="letters-loading">
									A
								</span>
								<span data-text-preloader="D" class="letters-loading">
									D
								</span>
								<span data-text-preloader="E" class="letters-loading">
									E
								</span>
								<span data-text-preloader="S" class="letters-loading">
									S
								</span>
								<span data-text-preloader="I" class="letters-loading">
									I
								</span>
								<span data-text-preloader="G" class="letters-loading">
									G
								</span>
								<span data-text-preloader="N" class="letters-loading">
									N
								</span>
							</div>
						</div>
					</div>
				</div>
			</section> --}}

			@include('partials.navbar')

            <div class="section">
                <!--
			=============================================
				Theme Hero Banner
			=============================================
			-->
			<div class="hero-banner-seven lg-container" style="margin-top: -1px; margin-bottom:30px; padding:90px 0; background-color:#030034">
				<div class="container">
					<div class="illustration-container">
						<img src="{{ asset('images/logo_home.png') }}" alt="" style="height:400px">
					</div>
					<div class="row">
						<div class="col-lg-6">
							{{-- <p style="color: black"><strong>Selamat Datang di</strong> </p> --}}
							<h1 class="hero-heading" style="color: white;font-size:3.1vw; font-weight:700"><strong>WELCOME TO OUR <br> ORBIT</strong></h1>
							<p class="hero-sub-heading" style="color: white; line-height:31.84px; font-size:16px; text-align:justify"><strong>BELAJAR UX/UI, DESAIN GRAFIS DAN VIDEO DAN BANGUN <span style="font-size: 20px">PORTOFOLIO</span>  PERTAMAMU  BERSAMA BISA DESIGN ACADEMY</strong> </p>
                            <a href="/course/all_course/1" style="margin: 1px">
								<button class="theme-btn-fourteen">MULAI BELAJAR</button>
                            </a>
                            {{-- <a href="https://play.google.com/store/apps/details?id=bisa.ai.bisa_design_mobile" target="_blank" style="margin: 1px">
                                <button class="theme-btn-fourteen" style="display: flex; align-items:center;">
                                    <span>Download</span>
                                    <img src="{{ asset('images/fav-icon/google-play.png') }}" width="40px" alt="">
                                </button>
                            </a> --}}
						</div>
					</div>
				</div>
            </div>

            <!--
			=============================================
				Popular Portfolio
			==============================================
			-->
			<div class="fancy-feature-four" style="margin-top: 75px; background:#110743">
				<div class="bg-wrapper" >
					<div class="container">
						<div class="title-style-two mb-100 md-mb-50">
							<div class="row">
								<div class="col-xl-8 col-lg-9 col-md-10" style="display: flex; align-items:center;">
                                    <i class="fa-solid fa-fire" style="display: inline-block;
                                    border-radius: 60px;
                                    padding: 0.5em 0.6em;
                                    color: white;
                                    font-size:40px; margin-right:25px;
                                    background: linear-gradient(
                                        90deg,
                                        rgba(197, 75, 189, 0.47) -69.94%,
                                        rgba(67, 56, 200, 0) 245.71%
                                    );"></i>

									<h3 style="font-size:3.1vw">
										<strong style="color: white">PORTFOLIO TERPOPULER</strong>
									</h3>
								</div>

							</div>
						</div>
						<div class="inner-content">
							<div class="row justify-content-center">
								@foreach($porto as $port)
                                @php
                                $id_porto = $port['id_portofolio'];
                                $id_porto = base64_encode($id_porto);
                                $id_porto = str_replace('=', '', $id_porto);
                                @endphp
                                    <div class="col-lg-4 item mix SS">
                                        <a class="block-style-twentyTwo" href="/portofolio/detail/{{ $id_porto }}" style="border-radius:30px; background:linear-gradient(180deg, #D9D9D9 0%, rgba(217, 217, 217, 0) 100%); display:block; color: inherit" id="course" >
                                            <div class="row" style="border-radius:30px 30px 0 0;margin-top:-40px; display:block; position:relative; background-color: #ca2221">
                                                <img src="{{ $media_p.$port['foto_portofolio'] }}" style="border-radius: 30px 30px 0 0" alt="">
                                            </div>
                                            <h4 style="color: white">{{ $port['nama_portofolio'] }}</h4>
                                            <div class="grid-container mt-3" style="display:grid; grid-template-columns: 70% 0% 30% ;">
                                                <div class="grid-item text-left">
                                                    <p style="color: white">{{ $port['nama_user'] }}</p>
                                                </div>
                                                <div class="gridotem"></div>
                                                <div class="grid-item text-right">
                                                    <strong style="color: white">
                                                        <i class="fa-solid fa-heart" style="color: red"> {{ $port['jumlah_like'] }}</i>
                                                    </strong>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                @endforeach
                                <a href="/portofolio" style="margin-top: 95px">
                                    <button class="theme-btn-fourteen">LIHAT LEBIH</button>
                                </a>
							</div>
						</div>
					</div>
				</div>
			</div> <!-- /.fancy-feature-four -->

            <!--
			=============================================
				Favorite Courses
			==============================================
			-->
			<div class="fancy-feature-four" style="margin-top: 0px; background:#110743">
				<div class="bg-wrapper" >
					<div class="container">
						<div class="title-style-two mb-100 md-mb-50">
							<div class="row">
								<div class="col-xl-8 col-lg-9 col-md-10" style="display: flex; align-items:center;">
                                    <i class="fa-solid fa-fire" style="display: inline-block;
                                    border-radius: 60px;
                                    padding: 0.5em 0.6em;
                                    color: WHITE;
                                    font-size:40px; margin-right:25px;
                                    background: linear-gradient(
                                        90deg,
                                        rgba(197, 75, 189, 0.47) -69.94%,
                                        rgba(67, 56, 200, 0) 245.71%
                                    );"></i>

									<h3 style="font-size:3.1vw">
										<strong style="color: white">PEMBELAJARAN TERFAVORIT</strong>
									</h3>
								</div>
							</div>
						</div>
                        {{-- Content --}}
						<div class="inner-content">
							<div class="row justify-content-center">
                                @foreach($crs as $crs)
                                @php
                                $id_course = $crs['id_course'];
                                $id_course = base64_encode($id_course);
                                $id_course = str_replace('=', '', $id_course);
                                @endphp
                                    <div class="col-lg-4 item mix {{ $crs['arranged_by'] }}">
                                        <a class="block-style-twentyTwo" href="/course/detail/{{ $id_course }}/1" style="border-radius:30px; background:linear-gradient(180deg, #D9D9D9 0%, rgba(217, 217, 217, 0) 100%); display:block; color: inherit" id="course" >
                                            <div class="row" style="border-radius:30px 30px 0 0;margin-top:-40px; display:block; position:relative; background-color: #ca2221">
                                                <div class="icon d-flex align-items-center justify-content-center" >
                                                    <img src="{{ $media.$crs['photo'] }}" alt="">

                                                </div>
                                            </div>
                                            <div class="grid-container mt-3" style="display:grid; grid-template-columns:20% 20% 45% 15%;">
                                                <div class="grid-item">
                                                        <i class="fa fa-user" aria-hidden="true" style="color: white; margin-right: 2px"></i>
                                                            <small id="students" style="color: white">{{ $crs['number_of_students'] }}</small>
                                                </div>
                                                  <div class="grid-item">
                                                        <i class="fa-solid fa-book" aria-hidden="true" style="color: white; margin-right: 2px"></i>
                                                          <small style="color: white">{{ $crs['number_of_syllabus'] }}</small>
                                                </div>
                                                <div class="grid-item"></div>
                                                <div class="grid-item text-right">
                                                        <i class="fa fa-certificate" aria-hidden="true" style="color: white; margin-right: 2px"></i>
                                                            <small style="color: white">{{ $crs['point'] }}</small>
                                                </div>
                                            </div>
                                            <h4 style="color: white">{{ $crs['name'] }}</h4>
                                            <div class="grid-container mt-3" style="display:grid; grid-template-columns: 50% 50% ;">
                                                <div class="grid-item text-left">
                                                    @if ($crs['rating'] == 0)
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    @elseif ($crs['rating'] == 1)
                                                    <i class="fa-solid fa-star checked-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    @elseif ($crs['rating'] == 2)
                                                    <i class="fa-solid fa-star checked-star"></i>
                                                    <i class="fa-solid fa-star chekced-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    @elseif ($crs['rating'] == 3)
                                                    <i class="fa-solid fa-star checked-star"></i>
                                                    <i class="fa-solid fa-star checked-star"></i>
                                                    <i class="fa-solid fa-star checked-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    @elseif ($crs['rating'] == 4)
                                                    <i class="fa-solid fa-star checked-star"></i>
                                                    <i class="fa-solid fa-star checked-star"></i>
                                                    <i class="fa-solid fa-star checked-star"></i>
                                                    <i class="fa-solid fa-star checked-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    @elseif ($crs['rating'] == 5)
                                                    <i class="fa-solid fa-star checked-star"></i>
                                                    <i class="fa-solid fa-star checked-star"></i>
                                                    <i class="fa-solid fa-star checked-star"></i>
                                                    <i class="fa-solid fa-star checked-star"></i>
                                                    <i class="fa-solid fa-star checked-star"></i>
                                                    @endif
                                                </div>
                                                <div class="grid-item text-right">
                                                    @php
                                                        if($crs['price'] == 0){
                                                            $price = "Gratis";
                                                        }else{
                                                            $price = "Rp. ".number_format($crs['price'],0,',','.');
                                                        }
                                                    @endphp
                                                    <strong style="color: white">{{ $price }}</strong>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                @endforeach
                                <a href="/course/all_course/1" style="margin-top: 95px">
                                    <button class="theme-btn-fourteen">LIHAT LEBIH</button>
                                </a>
							</div>
						</div>
					</div>
				</div>
			</div> <!-- /.fancy-feature-four -->
            <!--
			=============================================
				Favorite CERTIFICATE
			==============================================
			-->
            @php
                $media_c = 'https://gate.bisaai.id/bisa_design_prod/certification/media/foto_certification/';
            @endphp
			<div class="fancy-feature-four" style="margin-top: 0px; background:#110743">
				<div class="bg-wrapper" >
					<div class="container">
						<div class="title-style-two mb-100 md-mb-50">
							<div class="row">
								<div class="col-xl-8 col-lg-9 col-md-10" style="display: flex; align-items:center;">
                                    <i class="fa-solid fa-fire" style="display: inline-block;
                                    border-radius: 60px;
                                    padding: 0.5em 0.6em;
                                    color: WHITE;
                                    font-size:40px; margin-right:25px;
                                    background: linear-gradient(
                                        90deg,
                                        rgba(197, 75, 189, 0.47) -69.94%,
                                        rgba(67, 56, 200, 0) 245.71%
                                    );"></i>

									<h3 style="font-size:3.1vw">
										<strong style="color: white">SERTIFIKASI TERFAVORIT</strong>
									</h3>
								</div>
							</div>
						</div>
                        {{-- Content --}}
						<div class="inner-content">
							<div class="row justify-content-center">
                                @foreach($certif as $cer)
                                    <div class="col-lg-4 item mix SS">
                                        <a class="block-style-twentyTwo" href="/certification/detail/{{ $cer['id_certification'] }}" style="border-radius:30px; background:linear-gradient(180deg, #D9D9D9 0%, rgba(217, 217, 217, 0) 100%);" id="course" >
                                            <div class="row" style="border-radius:30px 30px 0 0;margin-top:-40px; display:block; position:relative; background-color: white">
                                                <div class="icon d-flex align-items-center justify-content-center" >
                                                    <img src="{{ $media_c.$cer['foto'] }}" alt="">

                                                </div>
                                            </div>
                                            <div class="grid-container mt-3" style="display:grid; grid-template-columns:100%;">
                                                <div class="grid-item text-left">
                                                        <i class="fa fa-user" aria-hidden="true" style="color: white; margin-right: 2px"></i>
                                                            <small id="students" style="color: white">{{ $cer['jumah_peserta'] }}</small>
                                                </div>
                                            </div>
                                            <h4 style="color: white">{{ $cer['nama'] }}</h4>
                                            <div class="grid-container mt-3" style="display:grid; grid-template-columns: 50% 50% ;">
                                                <div class="grid-item text-left">
                                                    @if ($cer['jumlah_rating'] == 0)
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    @elseif ($cer['jumlah_rating'] == 1)
                                                    <i class="fa-solid fa-star checked-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    @elseif ($cer['jumlah_rating'] == 2)
                                                    <i class="fa-solid fa-star checked-star"></i>
                                                    <i class="fa-solid fa-star chekced-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    @elseif ($cer['jumlah_rating'] == 3)
                                                    <i class="fa-solid fa-star checked-star"></i>
                                                    <i class="fa-solid fa-star checked-star"></i>
                                                    <i class="fa-solid fa-star checked-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    @elseif ($cer['jumlah_rating'] == 4)
                                                    <i class="fa-solid fa-star checked-star"></i>
                                                    <i class="fa-solid fa-star checked-star"></i>
                                                    <i class="fa-solid fa-star checked-star"></i>
                                                    <i class="fa-solid fa-star checked-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    @elseif ($cer['jumlah_rating'] == 5)
                                                    <i class="fa-solid fa-star checked-star"></i>
                                                    <i class="fa-solid fa-star checked-star"></i>
                                                    <i class="fa-solid fa-star checked-star"></i>
                                                    <i class="fa-solid fa-star checked-star"></i>
                                                    <i class="fa-solid fa-star checked-star"></i>
                                                    @endif
                                                </div>
                                                <div class="grid-item text-right">
                                                    @php
                                                        if($cer['harga'] == 0){
                                                            $price = "Gratis";
                                                        }else{
                                                            $price = "Rp. ".number_format($cer['harga'],0,',','.');
                                                        }
                                                    @endphp
                                                    <strong style="color: white">{{ $price }}</strong>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                @endforeach
                                <a href="/certification" style="margin-top: 95px">
                                    <button class="theme-btn-fourteen">LIHAT LEBIH</button>
                                </a>
							</div>
						</div>
					</div>
				</div>
			</div> <!-- /.fancy-feature-four -->

			<!--
			=============================================
				APK MOBILE BISA DESIGN
			==============================================
			-->
			<div class="fancy-feature-sixteen md-mt-100" id="feature" style="background: url({{ asset('images/gallery/nebula.png') }}) no-repeat scroll center center/cover; padding:20px 0 200px 0">
				<div class="container">
					<div class="block-style-eighteen mt-200 md-mt-80">
						<div class="row align-items-center">
							<div class="col-lg-5" data-aos="fade-right" data-aos-duration="1200" >
								<div class="text-wrapper">
									{{-- <h6>Silabus</h6> --}}
									<h5 style="color: white; font-weight:700; font-size:20px; line-height:31.84px" class="text-center">DOWNLOAD APLIKASI MOBILE BISA DESIGN ACADEMY</h5>
									{{-- <p >Baru memulai belajar di BISA Design Academy? Unduh Silabus lengkap untuk setiap pembelajaran di BISA Design Academy.</p> --}}
                                    <div class="row justify-content-center">
                                        <a href="https://play.google.com/store/apps/details?id=bisa.ai.bisa_design_mobile" target="_blank">
                                            <img src="{{ asset('images/mobile/google-play-badge.png') }}" width="250px" alt="">
                                        </a>
                                    </div>
								</div> <!-- /.text-wrapper -->
							</div>
							<div class="col-lg-7" data-aos="fade-left" data-aos-duration="1200">
								<div class="screen-holder-three d-flex align-items-center justify-content-center">
									<img src="{{ asset('images/mobile/group_mobile.png') }}" alt="">
								</div>
							</div>
						</div>
					</div> <!-- /.block-style-eighteen -->
				</div>
			</div> <!-- /.fancy-feature-sixteen -->

            <!--
			=============================================
				Why Bisa Design Academy
			==============================================
			-->
			<div class="fancy-feature-four" style="margin-top: 75px;">
				<div class="bg-wrapper" style="background-color: #030034">
					<div class="container">
						<div class="title-style-two mb-100 md-mb-50">
							<div class="row">
								<div class="col-xl-8 col-lg-9 col-md-10" style="display: flex; align-items:center;">
                                    <i class="fa-solid fa-book" style="display: inline-block;
                                    border-radius: 60px;
                                    padding: 0.5em 0.6em;
                                    color:white;
                                    font-size:40px; margin-right:25px;
                                    background: linear-gradient(
                                        90deg,
                                        rgba(197, 75, 189, 0.47) -69.94%,
                                        rgba(67, 56, 200, 0) 245.71%
                                    );"></i>

									<h3 style="font-size:3.1vw">
										<strong style="color: white">KENAPA BISA DESIGN ACADEMY</strong>
									</h3>
								</div>

							</div>
						</div>
						<div class="inner-content">
							<div class="row justify-content-center">
								<div class="col-lg-4 col-md-6 d-flex" data-aos="fade-up" data-aos-duration="1200">
									<div class="block-style-five">
										<div class="icon"><img src="{{ asset('images/logo/Pembelajaran_berbasis_skkni.png') }}" alt=""></div>
										<h6 class="title"><span>Pembelajaran Basis SKKNI</span></h6>
										<p>Pembelajaran mengacu kepada Standar Kompetensi Kerja Nasional Indonesia (SKKNI) dilengkapi dengan silabus lengkap, quiz setiap silabus dan tugas setiap pertemuan.</p>
									</div> <!-- /.block-style-five -->
								</div>
								<div class="col-lg-4 col-md-6 d-flex" data-aos="fade-up" data-aos-duration="1200" data-aos-delay="100">
									<div class="block-style-five-2">
										<div class="icon"><img src="{{ asset('images/logo/Portofolio.png') }}" alt=""></div>
										<h6 class="title"><span>Portfolio Industri</span></h6>
										<p>Setiap pembelajaran akan terdapat project industri dimana peserta akan mendapatkan portofolio industri untuk setiap pembelajaran.</p>
									</div> <!-- /.block-style-five -->
								</div>
								<div class="col-lg-4 col-md-6 d-flex" data-aos="fade-up" data-aos-duration="1200" data-aos-delay="200">
									<div class="block-style-five">
										<div class="icon"><img src="{{ asset('images/logo/certificate.png') }}" alt=""></div>
										<h6 class="title"><span>Sertifikat dari Lembaga Pelatihan Kerja (LPK) Kelaskoding</span></h6>
										<p>Kelaskoding (PT Solusi Kecerdasan Buatan) terdaftar sebagai Lembaga Pelatihan Kerja (LPK) dimana setiap peserta akan mendapatkan sertifikat LPK setiap menyelesaikan pelatihan.</p>
									</div> <!-- /.block-style-five -->
								</div>
								<div class="col-lg-4 col-md-6 d-flex" data-aos="fade-up" data-aos-duration="1200">
									<div class="block-style-five-2">
										<div class="icon"><img src="{{ asset('images/logo/pembelajaran_bahasa_indonesia.png') }}" alt=""></div>
										<h6 class="title"><span>Pembelajaran Bahasa Indonesia</span></h6>
										<p>Setiap pembelajaran dalam bahasa Indonesia terdiri atas silabus dan video pembelajaran.</p>
									</div> <!-- /.block-style-five -->
								</div>
								<div class="col-lg-4 col-md-6 d-flex" data-aos="fade-up" data-aos-duration="1200" data-aos-delay="100">
									<div class="block-style-five">
										<div class="icon"><img src="{{ asset('images/logo/pengajar_industri.png') }}" alt=""></div>
										<h6 class="title"><span>Pengajar Bersertifikasi Industri</span></h6>
										<p>Pengajar yang mengajar baik pembelajaran asynchronous maupun synchronous merupakan pengajar yang telah memiliki sertifikasi internasional.</p>
									</div> <!-- /.block-style-five -->
								</div>
								<div class="col-lg-4 col-md-6 d-flex" data-aos="fade-up" data-aos-duration="1200" data-aos-delay="100">
									<div class="block-style-five-2">
										<div class="icon"><img src="{{ asset('images/logo/project_consultation.png') }}" alt=""></div>
										<h6 class="title"><span>Konsultasi Proyek</span></h6>
										<p class="ket">Setiap proyek yang dikerjakan akan diberikan kesempatan untuk konsultasi proyek dengan pengajar.</p>
									</div> <!-- /.block-style-five -->
								</div>
							</div>
						</div>
					</div>
				</div>
			</div> <!-- /.fancy-feature-four -->

            <!--
			=============================================
				STATISTIK
			==============================================
			-->
            <div class="partner-slider-two mt-70 md-mt-80" style="margin-bottom: 190px">
				<div class="container">
                    <div class="col text-center" style="margin-bottom: 20px">
                    </div>
					<p class="text-center mb-5" style="color: white; font-weight:700; font-size:40px; line-height:31.84px;"><strong>STATISTIK</strong> </p>
					<div class="row justify-content-center">
						<div class="col-lg-3 col-6" data-aos="fade-up" data-aos-duration="1200" style="padding:0 0 30px 0;">
							<div class="counter-box-three">
								<div class="icon"><i class="fa-solid fa-user-graduate" aria-hidden="true" style="font-size: 48px; color:white"></i></div>
								<h2 class="number" style="color: white"><strong>+ <span class="timer" data-from="0" data-to="10" data-speed="1500" data-refresh-interval="5">0</span>K</strong> </h2>
						      	<strong style="color: white; font-size:24px">Pengguna Aktif</strong>
							</div> <!-- /.counter-box-three -->
						</div>
						<div class="col-lg-3 col-6" data-aos="fade-up" data-aos-duration="1200" data-aos-delay="100" style="padding:0 0 30px 0;">
							<div class="counter-box-three">
								<div class="icon"><i class="fa fa-book" aria-hidden="true" style="font-size: 48px; color:white"></i></div>
								<h2 class="number" style="color: white"><strong>+ <span class="timer" data-from="0" data-to="25" data-speed="1200" data-refresh-interval="5">0</span></strong> </h2>
                                <strong style="color: white; font-size:24px">Course Academy</strong>
							</div> <!-- /.counter-box-three -->
						</div>
						<div class="col-lg-3 col-6" data-aos="fade-up" data-aos-duration="1200" data-aos-delay="200" style="padding:0 0 30px 0;">
							<div class="counter-box-three">
								<div class="icon"><i class="fa fa-certificate" aria-hidden="true" style="font-size: 48px; color:white"></i></div>
								<h2 class="number" style="color: white"><strong>+ <span class="timer" data-from="0" data-to="15" data-speed="1200" data-refresh-interval="5">0</span></strong> </h2>
                                <strong style="color: white; font-size:24px">Sertifikasi Professional</strong>
							</div> <!-- /.counter-box-three -->
						</div>
						<div class="col-lg-3 col-6" data-aos="fade-up" data-aos-duration="1200" data-aos-delay="200" style="padding:0 0 30px 0;">
							<div class="counter-box-three">
								<div class="icon"><i class="fa-solid fa-briefcase" aria-hidden="true" style="font-size: 48px; color:white"></i></div>
								<h2 class="number" style="color: white"><strong>+ <span class="timer" data-from="0" data-to="5" data-speed="1200" data-refresh-interval="5">0</span></strong> </h2>
                                <strong style="color: white; font-size:24px">OJT/bulan</strong>
							</div> <!-- /.counter-box-three -->
						</div>
					</div>
				</div>
			</div> <!-- /.partner-slider-two -->

            <!--
			=============================================
				KERJASAMA
			==============================================
			-->
            <div class="partner-slider-two mt-70 md-mt-80" style="margin-bottom: 190px">
				<div class="container">
                    <div class="title-style-two mb-100 md-mb-50">
                        <div class="row">
                            <div class="col-xl-8 col-lg-9 col-md-10" style="display: flex; align-items:center;">
                                <i class="fa-solid fa-handshake" style="display: inline-block;
                                border-radius: 60px;
                                padding: 0.5em 0.6em;
                                color:white;
                                font-size:40px; margin-right:25px;
                                background: linear-gradient(
                                    90deg,
                                    rgba(197, 75, 189, 0.47) -69.94%,
                                    rgba(67, 56, 200, 0) 245.71%
                                );"></i>

                                <h3 style="font-size:42px">
                                    <strong style="color: white">KERJASAMA</strong>
                                </h3>
                            </div>

                        </div>
                    </div>
					<div class="partnerSliderTwo">
                        <div class="item">
                            <div class="img-meta d-flex align-items-center justify-content-center"><img src="{{ asset('images/logo/logomain.png') }}"  width="100px" alt=""></div>
                        </div>
                        <div class="item">
                            <div class="img-meta d-flex align-items-center justify-content-center"><img src="{{ asset('images/logo/anaksekolah.png') }}"  width="100px" alt=""></div>
						</div>
						<div class="item">
                            <div class="img-meta d-flex align-items-center justify-content-center"><img src="{{ asset('images/logo/mascot-mini.png') }}"  width="100px" alt=""></div>
						</div>
						<div class="item">
                            <div class="img-meta d-flex align-items-center justify-content-center"><img src="{{ asset('images/logo/central-ai-logo.png') }}"  width="100px" alt=""></div>
						</div>
						<div class="item">
                            <div class="img-meta d-flex align-items-center justify-content-center"><img src="{{ asset('images/logo/coworking.png') }}"  width="100px" alt=""></div>
						</div>
						<div class="item">
                            <div class="img-meta d-flex align-items-center justify-content-center"><img src="{{ asset('images/logo/huawei_cloud.png') }}" width="110px" alt=""></div>
						</div>
						<div class="item">
                            <div class="img-meta d-flex align-items-center justify-content-center"><img src="{{ asset('images/logo/kelaskoding.png') }}"  width="70px" alt=""></div>
						</div>
						<div class="item">
                            <div class="img-meta d-flex align-items-center justify-content-center"><img src="{{ asset('images/logo/kptk.png') }}"  width="70px" alt=""></div>
						</div>
						<div class="item">
                            <div class="img-meta d-flex align-items-center justify-content-center"><img src="{{ asset('images/logo/lapangan.png') }}"  width="100px" alt=""></div>
						</div>
						<div class="item">
                            <div class="img-meta d-flex align-items-center justify-content-center"><img src="{{ asset('images/logo/puskaj.png') }}" width="100px" alt=""></div>
						</div>
						<div class="item">
                            <div class="img-meta d-flex align-items-center justify-content-center"><img src="{{ asset('images/logo/smk.png') }}" width="100px" alt=""></div>
						</div>
                        <div class="item">
                            <div class="img-meta d-flex align-items-center justify-content-center"><img src="{{ asset('images/logo/logoai.png') }}"  width="100px" alt=""></div>
                        </div>
						<div class="item">
							<div class="img-meta d-flex align-items-center justify-content-center"><img src="{{ asset('images/logo/wajahid.png') }}"  width="100px" alt=""></div>
						</div>
					</div>
				</div>
			</div> <!-- /.partner-slider-two -->



            			<!--
			=============================================
				Video
			==============================================
			-->
			<div class="fancy-text-block-twenty" style="background: url({{ asset('images/gallery/nebula.png') }}) no-repeat scroll center center/cover;">
				<div class="container">
                    <div style="margin-bottom: 30px">
                        <h1 class="text-center" style="color: white; font-size:40px; line-height:31.84px; font-weight:700; letter-spacing:10%">Tutorial Penggunaan <br> <br> BISA DESIGN ACADEMY</h1>

                    </div>
					<div class="fancy-video-box-one mb-130 md-mb-70">
						<img src="{{ asset('images/logo_video.png') }}" style="border-radius: 30px" alt="" class="main-img">
						<a data-fancybox="" href="https://www.youtube.com/watch?v=PTiGrlOfdbI&ab_channel=BISAAIAcademy" class="fancybox video-button d-flex align-items-center"><img src="{{ asset('images/icon/66.svg') }}" alt=""></a>
					</div> <!-- /.fancy-video-box-one -->


				</div>
			</div> <!-- /.fancy-text-block-twenty -->

            			<!--
			=============================================
				Download Syllabus
			==============================================
			-->
			<div class="fancy-feature-sixteen md-mt-100" id="feature">
				<div class="container">
					<div class="block-style-eighteen mt-200 md-mt-80">
						<div class="row align-items-center">
							<div class="col-lg-5" data-aos="fade-right" data-aos-duration="1200" >
								<div class="text-wrapper">
									{{-- <h6>Silabus</h6> --}}
									<h4 style="color: white; font-weight:700; font-size:24px; line-height:31.84px" class="text-left">Unduh Silabus dan Handbook Pelatihan BISA Design Academy</h4>
									<p style="color: white; font-size:16px">Baru memulai belajar di BISA Design Academy? Unduh Silabus lengkap untuk setiap pembelajaran di BISA Design Academy.</p>
                                    <div class="row justify-content-start">
                                        <a href="https://drive.google.com/file/d/1ELMfH1HDBbXatK_dWu5tcO6N09eiDKw_/view" target="_blank" style="margin: 1px">
                                            <button class="theme-btn-fourteen">DOWNLOAD SILABUS</button>
                                        </a>
                                    </div>
								</div> <!-- /.text-wrapper -->
							</div>
							<div class="col-lg-7" data-aos="fade-left" data-aos-duration="1200">
								<div class="screen-holder-three d-flex align-items-center justify-content-center">
									<img src="{{ asset('images/logo/panduan.png') }}"  alt="">
								</div>
							</div>
						</div>
					</div> <!-- /.block-style-eighteen -->
				</div>
			</div> <!-- /.fancy-feature-sixteen -->



			@include('partials.footer')

			<!-- Scroll Top Button -->
			<button class="scroll-top" style="background-color: #fc0101; border:none">
				<i class="fa fa-angle-up" aria-hidden="true"></i>
			</button>

        </div> <!-- /.main-page-wrapper -->

		<!-- Optional JavaScript _____________________________  -->

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
		<!-- Slick Slider -->
		<script src="{{ asset('vendor/slick/slick.min.js') }}"></script>
		<!-- Fancybox -->
		<script src="{{ asset('vendor/fancybox/dist/jquery.fancybox.min.js') }}"></script>

		<!-- Theme js -->
		<script src="{{ asset('js/theme.js') }}"></script>
		</div> <!-- /.main-page-wrapper -->
        <script>
            if(performance.navigation.type == 2){
            location.reload(true);
            }
        </script>
	</body>
</html>
