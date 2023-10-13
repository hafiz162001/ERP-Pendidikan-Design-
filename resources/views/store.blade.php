{{-- @dd($course) --}}
@extends('layouts.course')

@section('content')
			<!--
			=============================================
				Fancy Hero Six
			==============================================
			-->
			<div class="fancy-hero-six">
				<div class="container">
					<h4 class="heading"><strong>Bisa Design's Store</strong></h4>
					<p class="sub-heading"><strong> REDEEM POINT</strong> Lorem ipsum dolor sit amet consectetur adipisicing elit. Eaque nesciunt optio molestias, <br> veritatis sit cum odio quibusdam aut autem dicta!</p>
				</div>

			</div> <!-- /.fancy-hero-six -->

			<!--
			=============================================
				Fancy Portfolio Four
			==============================================
			-->
			<div class="fancy-portfolio-four lg-container" style="margin-top: -70px">
				<div class="container">
					<div class="bottom-border pb-130 md-pb-90">
                        <div class="row">
                            <div class="col-5 d-flex justify-content-start">
                                <div class="search-filter-form mt-30 d-flex">
                                    <form action="#"  style="padding: 0 15px 0 0" >
                                        <select style="width:200px; height:100%; border:none; padding: 5px 0 0 15px">
                                            <option value="terbaru">Point Terendah</option>
                                            <option value="terpopuler">Point Tertinggi</option>
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
                        </div>

						{{-- <div class="controls po-control-one text-center mb-90 md-mb-50 mt-90 md-mt-60">
				            <button type="button" class="control" data-filter="all">All</button>
				            <button type="button" class="control" data-filter=".coba">Coba</button>
				            <button type="button" class="control" data-filter=".BISA">Bisa Business</button>
				        </div> --}}

				        <div class="mixitUp-container gutter-space-two d-flex flex-wrap"  style="margin-top: 50px">
							<div class="col-md-3 item mix design">
								<div class="block-style-twentyTwo" onclick="location.href='#';" style="border-radius:5px;" >
									<div class="row" style="border-radius:5px 5px 0 0;margin-top:-40px; ">
										{{-- <img src="images/logo/course-logo.png" alt="" style="background-color: black"> --}}
                                            <img src="images/logo/course-logo.png" height="300px" style="border-radius: 10px 10px 0 0" alt="">
									</div>
									<h4>Course</h4>
                                    <div class="grid-container mt-3" style="display:grid; grid-template-columns: 50% 50% ;">
										<div class="grid-item text-left">
                                            <strong style="color: green">1000 Pts</strong>
										</div>
										<div class="grid-item text-right">
										</div>
									</div>
								</div> <!-- /.block-style-twentyTwo -->
							</div>
							<div class="col-md-3 item mix design">
								<div class="block-style-twentyTwo" onclick="location.href='#';" style="border-radius:5px;" >
									<div class="row" style="border-radius:5px 5px 0 0;margin-top:-40px; ">
										{{-- <img src="images/logo/course-logo.png" alt="" style="background-color: black"> --}}
                                            <img src="images/gallery/shirt1.jpg" height="300px" style="border-radius: 10px 10px 0 0" alt="">
									</div>
									<h4>Bisa Design Shirt 1</h4>
                                    <div class="grid-container mt-3" style="display:grid; grid-template-columns: 50% 50% ;">
										<div class="grid-item text-left">
                                            <strong style="color: green">1000 Pts</strong>
										</div>
										<div class="grid-item text-right">
										</div>
									</div>
								</div> <!-- /.block-style-twentyTwo -->
							</div>
							<div class="col-md-3 item mix design">
								<div class="block-style-twentyTwo" onclick="location.href='#';" style="border-radius:5px;" >
									<div class="row" style="border-radius:5px 5px 0 0;margin-top:-40px; ">
										{{-- <img src="images/logo/course-logo.png" alt="" style="background-color: black"> --}}
                                            <img src="images/gallery/shirt2.jpg"  style="border-radius: 10px 10px 0 0" alt="">
									</div>
									<h4>Bisa Design Shirt 2</h4>
                                    <div class="grid-container mt-3" style="display:grid; grid-template-columns: 50% 50% ;">
										<div class="grid-item text-left">
                                            <strong style="color: green">1000 Pts</strong>
										</div>
										<div class="grid-item text-right">
										</div>
									</div>
								</div> <!-- /.block-style-twentyTwo -->
							</div>
							<div class="col-md-3 item mix design">
								<div class="block-style-twentyTwo" onclick="location.href='#';" style="border-radius:5px;" >
									<div class="row" style="border-radius:5px 5px 0 0;margin-top:-40px; ">
										{{-- <img src="images/logo/course-logo.png" alt="" style="background-color: black"> --}}
                                            <img src="images/gallery/mug.jpg" height="300px" style="border-radius: 10px 10px 0 0" alt="">
									</div>
									<h4>Mug</h4>
                                    <div class="grid-container mt-3" style="display:grid; grid-template-columns: 50% 50% ;">
										<div class="grid-item text-left">
                                            <strong style="color: green">1000 Pts</strong>
										</div>
										<div class="grid-item text-right">
										</div>
									</div>
								</div> <!-- /.block-style-twentyTwo -->
							</div>


				        </div> <!-- /.mixitUp-container -->


					</div>
				</div>
			</div> <!-- /.fancy-portfolio-four -->

			@endsection




