{{-- @dd($course) --}}
{{-- @dd(isset($course['name'])) --}}

@extends('layouts.course')

@section('content')



			<!--
			=============================================
				Fancy Hero Six
			==============================================
			-->
			<div class="fancy-hero-six" style="color: white; background-color:#110743">
				<div class="container" >
                    <div class="row justify-content-center">
                        <img src="images/logo/kamer.png" width="260px" alt="">
                    </div>
					<h4 class="heading" style="color: white">Belajar di BISA Design Academy selama 1 Semester, konversi sebanyak 20 SKS di program Kampus Merdeka</h4>
					<p class="sub-heading" style="text-align: justify; text-indent:50px">
                        Kampus Merdeka merupakan bagian dari kebijakan Merdeka Belajar oleh Kementerian Pendidikan, Kebudayaan, Riset, dan Teknologi Republik Indonesia yang memberikan kesempatan bagi mahasiswa/i untuk mengasah kemampuan sesuai bakat dan minat dengan terjun langsung ke dunia kerja sebagai persiapan karier masa depan.
                        BISA Design Academy berkomitmen untuk dapat melatih talent - talent digital pada bidang Desain dan UI/UX agar siap bekerja dan memiliki skill serta kompetensi digital. Ikuti program Kampus Merdeka sekarang dan dapatkan skills serta kompetensi digital!
                    </p>
                    <div class="ket-kamer">
                        <ul>
                            <strong>BISA Design Academy menjalankan Program studi Independen Bersertifikat dengan skema sebagai berikut:</strong>
                            <br>
                            <li><strong>Pembelajaran Terjadwal</strong><br>Peserta mengikuti kegiatan belajar melalui Course yang tersedia di MOOC BISA Design Academy dan bertatap muka langsung secara online dengan pengajar. Pembelajaran terjadwal akan diampu oleh praktisi dan akademisi. Pembelajaran terjadwal ada yang bersifat WAJIB dan ada yang bersifat PILIHAN.</li>
                            <br>
                            <li><strong>Pembelajaran Mandiri</strong><br>Pembelajaran dilakukan di menu Free Course atau Master Class melalui platform BISA Design Academy. Pembelajaran dibantu oleh instruktur virtual dan Penilaian dilakukan secara otomatis dari sistem platform online BISA Design Academy. Pembelajaran mandiri juga dilakukan untuk mendukung peserta dalam mengambil Sertifikasi Kompetensi sesuai dengan acuan SKKNI di mitra LSP mitra BISA Design Academy. Pembelajaran Mandiri dapat dilaksanakan selama pelaksanaan Studi Independen Bersertifikat.</li>
                            <br>
                            <li><strong>Pembelajaran Tamu</strong><br>Pembelajaran dilakukan dengan mengundang rekan asosiasi, industri mitra dari BISA Design Academy. Model pembelajaran adalah kuliah umum (general lecturer) setiap 1 minggu 1 kali selama 4 bulan</li>
                            <br>
                            <li><strong>Proyek Independen</strong><br>Penyelesaian Project Independen yang dibantu oleh mentor BISA Design. Setiap peserta akan diberikan proyek independen oleh mentor yang akan diselesaikan dalam jangka waktu 1 bulan.</li>
                            <br>
                            <li><strong>Sertifikasi Kompetensi</strong><br>Seluruh peserta didorong untuk mendapatkan Sertifikasi Kompetensi di LSP Mitra BISA Design Academy yang berkaitan dengan okupansi/kluster dari topik yang diambil pada Studi Independen Bersertifikat. Setiap peserta akan diberikan topik persiapan sertifikasi sebelum melakukan sertifikasi.</li>
                        </ul>
                    </div>
                    <div class="row justify-content-center" style="margin-top: 20px">
                        <a href="https://kampusmerdeka.kemdikbud.go.id/program/studi-independen" target="_blank" class="theme-btn-fourteen d-flex" style="margin: 0 5px; ">
                        <button style="color: white; text-align:center">DAFTAR SIB</button></a>
                        <a href="https://kampusmerdeka.kemdikbud.go.id/program/magang" target="_blank" class="theme-btn-fourteen d-flex" style="margin: 0 5px">
                        <button style="color: white; justify-content:center" class="text-center">DAFTAR MSIB</button></a>
                    </div>
				</div>


			</div> <!-- /.fancy-hero-six -->

            <div class="row justify-content-center" style="background-color:#110743; padding: 0 140px 80px 140px">
                <div class="ket-prakerja" style="width:90%; border-radius:5px; padding:15px 35px; border:1px solid grey">
                    <strong style="color: white; font-weight:700">Tata Cara Pendaftaran</strong>
                    <ol>
                        <li>
                            Mahasiswa semester 5 keatas dari perguruan tinggi seluruh Indonesia dibawah naungan DIKTI dapat mendaftar program Kampus Merdeka
                        </li>
                        <li>
                            Mekanisme pendaftaran dapat melalui link sebagai berikut:
                            <ul>
                                <li><strong>Pendaftaran Studi Independen Bersertifikat (SIB):</strong> <a href="https://kampusmerdeka.kemdikbud.go.id/program/studi-independen" style="text-decoration:underline"> https://kampusmerdeka.kemdikbud.go.id/program/studi-independen</a></li>
                                <li><strong>Pendaftaran Magang Bersertifikat (MB):</strong> <a href="https://kampusmerdeka.kemdikbud.go.id/program/magang" style="text-decoration:underline"> https://kampusmerdeka.kemdikbud.go.id/program/magang</a></li>
                            </ul>
                        </li>
                        <li>
                            Pilih mitra BISA Design Academy pada kolom pencarian.
                        </li>
                        <li>
                            Ikuti Proses Seleksi
                        </li>
                        <li>
                            Jika anda diterima, anda akan dihubungi oleh pihak BISA Design Academy
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

						<div class="controls po-control-one text-center mb-90 md-mb-50 mt-90 md-mt-60">
				            <button type="button" class="control" data-filter="all">All</button>
				            <button type="button" class="control" data-filter=".coba">Coba</button>
				            <button type="button" class="control" data-filter=".BISA">Bisa Business</button>
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




