{{-- @dd($course) --}}
{{-- @dd(isset($course['name'])) --}}
@php
$url = 'https://gate.bisaai.id/bisa_design_prod/';
$media = $url.'course/media/'
@endphp

@extends('layouts.course')

@section('content')

			<!--
			=============================================
				Fancy Hero Six
			==============================================
			-->
			<div class="fancy-hero-six" style="background: url({{ asset('images/bannerimg/banner1.jpg') }}) no-repeat scroll center center/cover;">
				<div class="container">
					<h4 class="heading" style="color: white">{{ $title }}</h4>
					{{-- <p class="sub-heading" style="color: white">Tersedia +50 Course <strong> GRATIS </strong> yang dapat kamu ikuti untuk belajar berbagai topik.<br>Dapatkan Sertifikat setelah menyelesaikan Quiz dan Tugas-nya</p> --}}
				</div>

			</div> <!-- /.fancy-hero-six -->

			<!--
			=============================================
				Fancy Portfolio Four
			==============================================
			-->
			<div class="fancy-portfolio-four lg-container" style="margin-top: -10px">
				<div class="container">
					<div class="bottom-border pb-130 md-pb-90">
                        <div class="row">
                            {{-- <div class="col-5 d-flex justify-content-start">
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
                                        <input type="text" placeholder="Pencarian" id="search">
                                        <button><img src="images/icon/54.svg" alt=""></button>
                                    </form>
                                </div>
                            </div> --}}
                        </div>

						{{-- <div class="controls po-control-one text-center mb-90 md-mb-50 mt-90 md-mt-60">
				            <button type="button" class="control" data-filter="all">All</button>
				            <button type="button" class="control" data-filter=".coba">Coba</button>
				            <button type="button" class="control" data-filter=".BISA">Bisa Business</button>
				        </div> --}}

				        <div class="mixitUp-container gutter-space-two d-flex flex-wrap"  style="margin-top: 50px" id="content">



                            {{-- @dd(isset($crs['name']), isset($course['name'])) --}}

							<div class="col-md-4 item mix SS">

								{{-- <div class="block-style-twentyTwo" onclick="location.href='/course-detail/{{ Str::slug($crs['name']) }}';" style="border-radius:5px;"> --}}
								<div class="block-style-twentyTwo" onclick="location.href='/course-detail/SS';" style="border-radius:5px;">
									<div class="row" style="background-color: #a32124; border-radius:5px 5px 0 0;margin-top:-40px; display:block; position:relative">
										{{-- <img src="images/logo/course-logo.png" alt="" style="background-color: black"> --}}
                                        <img style="border-radius: 5px 5px 0 0" src="SS" alt="">
                                        <span class="badge badge-success" style="position: absolute; top:15px; left:15px">Certificate</span>
										{{-- <div class="icon d-flex align-items-center justify-content-center" >

                                        </div> --}}
									</div>
									<div class="grid-container mt-3" style="display:grid; grid-template-columns:15% 10% 10% 65% ;">

										<div class="grid-item">
												<i class="fa fa-user" aria-hidden="true" style="color: black; margin-right: 2px"></i>
													<small>SS</small>
										</div>
  										<div class="grid-item">
											  <div class="row">
												  <img src="images/icon/book-solid.svg" width="13px" alt="" style="margin-right: 3px"></i>

												  <small>SS</small>
											  </div>
										</div>

										<div class="grid-item">
											<div class="row">
												<div><i class="fa fa-certificate" aria-hidden="true" style="color: rgb(253, 173, 0); margin-right: 2px"></i></div>
													<small>SS</small>
											</div>
										</div>

                                        <div class="grid-item"></div>

									</div>
									<h4>SS</h4>
									<p>SS</p>
									<hr>
                                    <div class="grid-container mt-3" style="display:grid; grid-template-columns: 50% 50% ;">
										<div class="grid-item text-left">

										</div>
										<div class="grid-item text-right">
											<strong style="color: green">SS</strong>
										</div>

									</div>

								</div> <!-- /.block-style-twentyTwo -->
							</div>


				        </div> <!-- /.mixitUp-container -->


					</div>
				</div>
			</div> <!-- /.fancy-portfolio-four -->

            {{-- <script>
                var search = document.getElementById('search');
                var content = document.getElementById('content');

                search.addEventListener('keyup', function(e) {
                    var filter = e.target.value.toUpperCase();
                    var items = content.getElementsByClassName('item');
                    var item;

                    for (var i = 0; i < items.length; i++) {
                        item = items[i].getElementsByTagName('h4')[0];
                        if (item.innerHTML.toUpperCase().indexOf(filter) > -1) {
                            items[i].style.display = '';
                        } else {
                            items[i].style.display = 'none';
                        }
                    }
                });
            </script> --}}

@endsection




