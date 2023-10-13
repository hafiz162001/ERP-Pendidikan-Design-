{{-- @dd($course) --}}
{{-- @dd(isset($course['name'])) --}}

@extends('layouts.course')

@section('content')



			<!--
			=============================================
				Fancy Hero Six
			==============================================
			-->
			<div class="fancy-hero-six" style="color: white; background-color:#110743" >
				<div class="container" >
                    <div class="row justify-content-center">
                        <img src="images/logo/prakerja.png" width="260px" alt="">
                    </div>
					<h4 class="heading" style="color: white">Belajar Desain dan UI/UX di BISA Design Academy <br> melalui Kartu Prakerja</h4>
					<p class="sub-heading" style="text-align: justify; text-indent:50px; color:white"><strong>Program Kartu Prakerja</strong> adalah program pengembangan kompetensi kerja dan kewirausahaan yang ditujukan untuk pencari kerja, pekerja/buruh yang terkena pemutusan hubungan kerja, dan/atau pekerja/buruh yang membutuhkan peningkatan kompetensi, termasuk pelaku usaha mikro dan kecil. Program ini didesain sebagai sebuah produk dan dikemas sedemikian rupa agar memberikan nilai bagi pengguna sekaligus memberikan nilai bagi sektor swasta.

                        Jalan digital melalui marketplace dipilih untuk memudahkan pengguna mencari, membandingkan, memilih dan memberi evaluasi. Hanya dengan cara ini, produk bisa terus diperbaiki, tumbuh dan relevan. Menggandeng pelaku usaha swasta, program ini adalah wujud kerjasama pemerintah dan swasta dalam melayani masyarakat dengan semangat gotong royong demi SDM unggul, Indonesia maju.

                        BISA Design Academy berkomitmen untuk dapat melatih talent - talent digital pada bidang Desain dan UI/UX agar siap bekerja dan memiliki skill serta kompetensi digital. Ikuti program Kartu Prakerja sekarang dan dapatkan skills serta kompetensi digital!
                    </p>
                    <div class="row justify-content-center">
                        <button class="theme-btn-fourteen">Daftar Sekarang</button>

                    </div>


				</div>



			</div> <!-- /.fancy-hero-six -->

            <div class="row justify-content-center" style="background-color:#110743; padding: 0 125px 80px 125px">
                <div class="ket-prakerja" style="width:90%; border-radius:5px; padding:15px 35px; border:1px solid grey; color:white; ">
                    <p>Tata Cara Pendaftaran</p>
                    <ol>
                        <li>
                            Warga Negara Indonesia Berusia 18 Tahun keatas yang tidak sedang menempuh pendidikan formal dapat mendaftar di Kartu Prakerja pada alamat <a href="https://www.prakerja.go.id/" style="text-decoration: underline" target="_blank">prakerja.go.id</a>
                        </li>
                        <li>
                           <span>Daftar pelatihan BISA Design Academy melalui Platform Prakerja<img src="images/logo/karirmu.png" width="100px"alt="" style="display:inline; vertical-align:middle;"> </span>
                        </li>
                        <li>
                            Beli pelatihan BISA Design Academy di <img src="images/logo/karirmu.png" width="100px"alt="" style="display:inline; vertical-align:middle;"> melalui alamat <a href="https://app.karier.mu/mitra/bisa-al-academy" style="text-decoration: underline" target="_blank">
                                app.karier.mu/mitra/bisa-al-academy.</a>
                                Gunakan saldo prakerja anda dan pilih program Pelatihan BISA Design Academy. Dapatkan token / kode dari
                                <img src="images/logo/karirmu.png" width="100px"alt="" style="display:inline; vertical-align:middle;"> untuk menukarkan di pelatihan BISA Design Academy.
                        </li>
                        <li>
                            Pilih program pelatihan Prakerja yang tersedia di <a href="https://bisa.ai/prakerja" style="text-decoration: underline" target="_blank">bisa.ai/prakerja</a>. Ketika Checkout, tukarkan kode/token anda.
                        </li>
                        <li>
                            Mulai Belajar!
                        </li>

                    </ol>
                </div>
            </div>





			<!--
			=============================================
				Fancy Portfolio Four
			==============================================
			-->
			{{-- <div class="fancy-portfolio-four lg-container" style="margin-top: -70px">
				<div class="container">
					<div class="bottom-border pb-130 md-pb-90">
                        <div class="row">
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
                        </div>

				        <div class="mixitUp-container gutter-space-two d-flex flex-wrap"  style="margin-top: 50px">
							<div class="col-md-4 item mix design">

								<div class="block-style-twentyTwo" onclick="location.href='/course-detail/ss';" style="border-radius:5px;">
									<div class="row" style="background-color: #CA2221; border-radius:5px 5px 0 0;margin-top:-40px; display:block; position:relative">
										<img src="images/logo/course-logo.png" alt="" style="background-color: black">
										<div class="icon d-flex align-items-center justify-content-center" >
                                            <img src="images/logo/course-logo.png" alt="">

                                            <span class="badge badge-success" style="position: absolute; top:15px; left:15px">Free Certificate</span>
                                        </div>
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
			</div> <!-- /.fancy-portfolio-four --> --}}

			@endsection




