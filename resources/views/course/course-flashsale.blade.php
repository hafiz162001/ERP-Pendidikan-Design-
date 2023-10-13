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
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<!-- responsive style sheet -->
		<link rel="stylesheet" type="text/css" href="css/responsive.css">

		<!-- Fix Internet Explorer ______________________________________-->
		<!--[if lt IE 9]>
			<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
			<script src="vendor/html5shiv.js"></script>
			<script src="vendor/respond.js"></script>
		<![endif]-->
	</head>

	<body>
		<div class="main-page-wrapper">
			{{-- include partials.loading --}}
			@include('partials.loading')


			{{-- include partials.navbar --}}
			@include('partials.navbar')



			<!--
			=============================================
				Fancy Hero Six
			==============================================
			-->
			<div class="fancy-hero-six">
				<div class="container">
					<h1 class="heading">FlashSale</h1>
					<p class="sub-heading">An original way to show your works in a good appearance</p>
				</div>

			</div> <!-- /.fancy-hero-six -->


			<!--
			=============================================
				Fancy Portfolio Four
			==============================================
			-->
			<div class="fancy-portfolio-four lg-container" style="margin-top: -70px; ">
				<div class="container">
					<div class=" bottom-border pb-130 md-pb-90" >
                        {{-- <div class="row">
                            <div class="grid-container mt-3" style="display:grid; grid-template-columns: 40% 20% 40% ;">
                                <div class="row grid-item">
                                    <div class="search-filter-form mt-30 d-flex">
                                        <form action="#"  style="padding: 0 15px 0 0" >
                                            <select  style="width:300px; height:100%; border:none; padding: 5px 0 0 15px;">
                                                <option value="terbaru">Terbaru</option>
                                                <option value="terpopuler">Terpopuler</option>
                                            </select>
                                        </form>
                                    </div>

                                </div>
                                <div class="row grid-item"></div>
                                <div class="row grid-item justify-content-end">
                                    <div class="search-filter-form mt-30 d-flex justify-content-end">
                                        <form action="#">
                                            <input type="text" placeholder="Search Somthing..">
                                            <button><img src="images/icon/54.svg" alt=""></button>
                                        </form>
                                    </div>

                                </div>

                            </div>
                            <div class="col-5 d-flex justify-content-start">
                                <div class="search-filter-form mt-30 d-flex">
                                    <form action="#"  style="padding: 0 15px 0 0" >

                                        <select style="width:200px; height:100%; border:none; padding: 5px 0 0 15px">
                                            <option value="terbaru">Terbaru</option>
                                            <option value="terpopuler">Terpopuler</option>
                                        </select>


                                    </form>
                                </div>
                            </div>
                            <div class="col-2"></div>
                            <div class="col-5 d-flex justify-content-end">
                                <div class="search-filter-form mt-30 d-flex justify-content-end">
                                    <form action="#">
                                        <input type="text" placeholder="Search Somthing..">
                                        <button><img src="images/icon/54.svg" alt=""></button>
                                    </form>
                                </div>
                            </div>
                        </div> --}}

						{{-- <div class="controls po-control-one text-center mb-90 md-mb-50 mt-90 md-mt-60">
				            <button type="button" class="control" data-filter="all">All</button>
				            <button type="button" class="control" data-filter=".dev">Development</button>
				            <button type="button" class="control" data-filter=".plugin">Plugin</button>
				            <button type="button" class="control" data-filter=".design">Design</button>
				            <button type="button" class="control" data-filter=".brand">Branding</button>
				        </div> --}}

				        <div class="mixitUp-container gutter-space-two d-flex flex-wrap">
				        	<div class="item mix design" >
								<div class="block-style-twentyTwo" onclick="location.href='/course-detail';">
									<div class="row" style="background-color: #CA2221; border-radius:5px 5px 0 0">
										<div class="icon d-flex align-items-center justify-content-center">
                                            <img src="images/logo/course-logo.png" alt="">
                                        </div>

									</div>
                                    <div class="badges" style="position: absolute; top:10px; left:10px">
                                        <span class="badge badge-pill badge-primary">Primary</span>
                                    </div>

									<div class="grid-container mt-3" style="display:grid; grid-template-columns: 68% 12% 10% 10% ;">
										<div class="grid-item">
											<span class="badge badge-primary">Primary</span>
										</div>
                                        <div class="grid-item">
											<div class="row">
												<div><i class="fa fa-certificate" aria-hidden="true" style="color: rgb(253, 173, 0); margin-right: 2px"></i></div>
													<small>20</small>
											</div>
										</div>
  										<div class="grid-item">
											  <div class="row">
												  <img src="images/icon/book-solid.svg" width="13px" alt="" style="margin-right: 3px"></i>
												  <small>8</small>
											  </div>
										</div>
										<div class="grid-item">
											<div class="row">
												<div><i class="fa fa-user" aria-hidden="true" style="color:black; margin-right: 3px"></i></div>
													<small>201</small>
											</div>
										</div>


									</div>

									<h4 >Manajemen</h4>
									<p>Ini adalah deskripsi course manajemen.</p>
									<hr>
                                    <div class="grid-container mt-3" style="display:grid; grid-template-columns: 50% 50% ;">
										<div class="grid-item text-left">
											<strong style="text-decoration: line-through; color:red">Rp 150.000</strong>
										</div>
										<div class="grid-item text-right">
											<strong style="color:green">Rp 50.000</strong>
										</div>

									</div>

									{{-- <strong>FREE</strong> --}}
								</div> <!-- /.block-style-twentyTwo -->
							</div>
				        	<div class="item mix design" >
								<div class="block-style-twentyTwo" onclick="location.href='/course-detail';">
									<div class="row" style="background-color: #CA2221; border-radius:5px 5px 0 0">
										<div class="icon d-flex align-items-center justify-content-center"><img src="images/logo/course-logo.png" alt=""></div>
									</div>

									<div class="grid-container mt-3" style="display:grid; grid-template-columns: 68% 12% 10% 10% ;">
										<div class="grid-item">
											<span class="badge badge-primary">Primary</span>
										</div>
                                        <div class="grid-item">
											<div class="row">
												<div><i class="fa fa-certificate" aria-hidden="true" style="color: rgb(253, 173, 0); margin-right: 2px"></i></div>
													<small>20</small>
											</div>
										</div>
  										<div class="grid-item">
											  <div class="row">
												  <img src="images/icon/book-solid.svg" width="13px" alt="" style="margin-right: 3px"></i>
												  <small>8</small>
											  </div>
										</div>
										<div class="grid-item">
											<div class="row">
												<div><i class="fa fa-user" aria-hidden="true" style="color:black; margin-right: 3px"></i></div>
													<small>201</small>
											</div>
										</div>


									</div>

									<h4 >Manajemen</h4>
									<p>Ini adalah deskripsi course manajemen.</p>
									<hr>
                                    <div class="grid-container mt-3" style="display:grid; grid-template-columns: 50% 50% ;">
										<div class="grid-item text-left">
											<strong style="text-decoration: line-through; color:red">Rp 150.000</strong>
										</div>
										<div class="grid-item text-right">
											<strong style="color:green">Rp 50.000</strong>
										</div>

									</div>

									{{-- <strong>FREE</strong> --}}
								</div> <!-- /.block-style-twentyTwo -->
							</div>
				        	<div class="item mix design" >
								<div class="block-style-twentyTwo" onclick="location.href='/course-detail';">
									<div class="row" style="background-color: #CA2221; border-radius:5px 5px 0 0">
										<div class="icon d-flex align-items-center justify-content-center"><img src="images/logo/course-logo.png" alt=""></div>
									</div>

									<div class="grid-container mt-3" style="display:grid; grid-template-columns: 68% 12% 10% 10% ;">
										<div class="grid-item">
											<span class="badge badge-primary">Primary</span>
										</div>
                                        <div class="grid-item">
											<div class="row">
												<div><i class="fa fa-certificate" aria-hidden="true" style="color: rgb(253, 173, 0); margin-right: 2px"></i></div>
													<small>20</small>
											</div>
										</div>
  										<div class="grid-item">
											  <div class="row">
												  <img src="images/icon/book-solid.svg" width="13px" alt="" style="margin-right: 3px"></i>
												  <small>8</small>
											  </div>
										</div>
										<div class="grid-item">
											<div class="row">
												<div><i class="fa fa-user" aria-hidden="true" style="color:black; margin-right: 3px"></i></div>
													<small>201</small>
											</div>
										</div>


									</div>

									<h4 >Manajemen</h4>
									<p>Ini adalah deskripsi course manajemen.</p>
									<hr>
                                    <div class="grid-container mt-3" style="display:grid; grid-template-columns: 50% 50% ;">
										<div class="grid-item text-left">
											<strong style="text-decoration: line-through; color:red">Rp 150.000</strong>
										</div>
										<div class="grid-item text-right">
											<strong style="color:green">Rp 50.000</strong>
										</div>

									</div>

									{{-- <strong>FREE</strong> --}}
								</div> <!-- /.block-style-twentyTwo -->
							</div>
				        	<div class="item mix design" >
								<div class="block-style-twentyTwo" onclick="location.href='/course-detail';">
									<div class="row" style="background-color: #CA2221; border-radius:5px 5px 0 0">
										<div class="icon d-flex align-items-center justify-content-center"><img src="images/logo/course-logo.png" alt=""></div>
									</div>

									<div class="grid-container mt-3" style="display:grid; grid-template-columns: 68% 12% 10% 10% ;">
										<div class="grid-item">
											<span class="badge badge-primary">Primary</span>
										</div>
                                        <div class="grid-item">
											<div class="row">
												<div><i class="fa fa-certificate" aria-hidden="true" style="color: rgb(253, 173, 0); margin-right: 2px"></i></div>
													<small>20</small>
											</div>
										</div>
  										<div class="grid-item">
											  <div class="row">
												  <img src="images/icon/book-solid.svg" width="13px" alt="" style="margin-right: 3px"></i>
												  <small>8</small>
											  </div>
										</div>
										<div class="grid-item">
											<div class="row">
												<div><i class="fa fa-user" aria-hidden="true" style="color:black; margin-right: 3px"></i></div>
													<small>201</small>
											</div>
										</div>


									</div>

									<h4 >Manajemen</h4>
									<p>Ini adalah deskripsi course manajemen.</p>
									<hr>
                                    <div class="grid-container mt-3" style="display:grid; grid-template-columns: 50% 50% ;">
										<div class="grid-item text-left">
											<strong style="text-decoration: line-through; color:red">Rp 150.000</strong>
										</div>
										<div class="grid-item text-right">
											<strong style="color:green">Rp 50.000</strong>
										</div>

									</div>

									{{-- <strong>FREE</strong> --}}
								</div> <!-- /.block-style-twentyTwo -->
							</div>

				        </div> <!-- /.mixitUp-container -->
					</div>
				</div>
			</div> <!-- /.fancy-portfolio-four -->





			{{-- Include partials.footer --}}
			@include('partials.footer')


			<!-- Scroll Top Button -->
			<button class="scroll-top">
				<i class="fa fa-angle-up" aria-hidden="true"></i>
			</button>


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
		<!-- Fancybox -->
		<script src="vendor/fancybox/dist/jquery.fancybox.min.js"></script>

		<!-- Theme js -->
		<script src="js/theme.js"></script>
		</div> <!-- /.main-page-wrapper -->
	</body>
</html>
