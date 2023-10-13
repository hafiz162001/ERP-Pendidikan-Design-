{{-- @dd($rekomen) --}}
{{-- @dd($portfolio) --}}
{{-- @dd($course) --}}
@php
$url = 'https://gate.bisaai.id/bisa_design_prod/';
$url2 = 'https://portal2.bisaai.id:8080/bisa_business_dev/';
$media = $url.'course/media/';
$media_p = 'https://gate.bisaai.id/bisa_design_prod/portofolio/media/foto_portofolio/';
@endphp

@extends('layouts.course')

@section('content')
<!--
			=============================================
				Fancy Hero Six
			==============================================
			-->
			{{-- <div class="fancy-hero-six" style="background: url({{ asset('images/bannerimg/banner2.jpg') }}) no-repeat scroll center center/cover"> --}}
			<div class="fancy-hero-six">
				<div class="container">
                    {{-- <div class="title-style-ten">
                        <h2 style="color: white">{{ $course['name'] }}</h2>
                      </div> --}}
					<h2 style="color: white; font-family: 'Fira Code', monospace; font-weight:700"><strong>{{ $course['name'] }}</strong></h2>
					{{-- <p class="sub-heading" style="color: white">Tersedia +50 Course <strong> GRATIS </strong> yang dapat kamu ikuti untuk belajar berbagai topik.<br>Dapatkan Sertifikat setelah menyelesaikan Quiz dan Tugas-nya</p> --}}
				</div>

			</div> <!-- /.fancy-hero-six -->
      <!--
			=============================================
				Portfolio Details One
			==============================================
			-->
      <div class="portfolio-details-one mt-75 mb-150 md-mb-100">
        <div class="container">
          <div class="row">
            <div class="col-xl-11 m-auto">
              {{-- <div class="header text-center">
                <div class="tag">ss</div>
                <div class="title-style-ten">
                  <h2>{{ $course['name'] }}</h2>
                </div>
                <ul class="d-flex justify-content-center social-icon mt-35">
                  <li>
                    <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                  </li>
                  <li>
                    <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                  </li>
                  <li>
                    <a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                  </li>
                </ul>
              </div> --}}
            </div>
          </div>

          <div class="main-content mt-45">
            {{-- <img src="{{ $media.$course['photo'] }}" alt="" class="mb-90 md-mb-50" /> --}}
            <div class="row">
              <div class="col-xl-11 m-auto">
                <div class="row">
                  <div class="col-md-8" style="color: white">
                    {{-- <h4>Masterclass On Job Training : Graphic Design Batch 1</h4>
                    <p>Graphic Design merupakan sebuah ilmu yang memahami bagaimana sebuah desain dibuat sedemikian rupa</p> --}}
                    {!! $course['info'] !!}
                    <hr />
                    <h4 style="color: white">Task</h4>
                    <p>
                      {!! $course['task_description'] !!}
                    </p>
                  </div>
                  <div class="col-md-4">
                    <ul class="project-info clearfix pl-xl-5" style="color:white">
                        <li class="text-center" style="margin-bottom: 25px">
                            <strong style="font-size: 24px; ">DETAIL COURSE</strong>
                        </li>
                        <li style="margin-bottom: 25px">
                            <img src="{{ $media.$course['photo'] }}" style="border-radius: 5%"  alt="">
                        </li>
                      <li>
                        <div class="row">
                          <div class="col"><span class="text-left">PEMBUAT</span></div>
                          <div class="col"><span class="text-right">BISA AI ACADEMY</span></div>
                        </div>
                      </li>
                      <li>
                        <div class="row">
                          <div class="col"><span class="text-left to-upper">Pengikut</span></div>
                          <div class="col"><span class="text-right">{{ $course['number_of_students'] }}</span></div>
                        </div>
                      </li>

                      <li>
                        <div class="row">
                          <div class="col"><span class="text-left to-upper">Silabus</span></div>
                          <div class="col"><span class="text-right">{{ $course['number_of_syllabus'] }}</span></div>
                        </div>
                      </li>

                      <li>
                        <div class="row">
                          <div class="col"><span class="text-left">Harga</span></div>
                          @php
                          if($course['price'] == 0) {
                            $harga = 'FREE';
                            } else {
                            $harga = 'Rp. '.number_format($course['price'], 0, ',', '.');
                            }
                          @endphp
                          <div class="col"><span class="text-right">{{ $harga }}</span></div>
                        </div>
                      </li>
                      {{-- <hr /> --}}

                      @if (session()->has('token') && $registered == false)
                        @php
                        $id_course = $course['id_course'];
                        $id_course = base64_encode($id_course);
                        $id_course = str_replace('=', '', $id_course);
                        @endphp
                        <li>
                          <a href="/course/pembelian/{{ $id_course }}" >
                            <button class="theme-btn-fourteen" style="font-weight: 700">Registrasi</button></a>
                          {{-- <a href="/course-detail/{{ Str::slug($course['name']) }}/checkout" class="theme-btn-eight w-100 text-center">Registrasi</a> --}}
                        </li>
                      @elseif (session()->has('token') && $registered == true)
                        <li>
                            <p class="text-center text-success"><strong>Anda Sudah Terdaftar</strong></p>
                        </li>
                        <li>
                            <a href=""></a>
                        </li>
                      @else
                      <li>
                          <div class="text-center">
                              <p>Silahkan <a href="/login" style="text-decoration: underline; color:red"><strong>Login</strong> </a> Untuk Mendaftar!</p>
                          </div>
                      </li>
                      @endif

                      <span> </span>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- /.portfolio-details-one -->
@if ($rekomen != null)
<!--
			=============================================
				Rekomendasi
			==============================================
			-->
			<div class="fancy-hero-six" >
				<div class="container">
					<h2 class="heading font-gordita" style="color: white"><strong>Course Terkait</strong></h2>
				</div>

			</div>

            <div class="mixitUp-container gutter-space-two d-flex flex-wrap"  style="margin-top: 50px; padding:0 170px" id="content">
                @foreach($rekomen as $rek)

                <div class="col-md-4 item mix {{ $rek['arranged_by'] }}">

                    <div class="block-style-twentyTwo" onclick="location.href='/course-detail/{{ $rek['id_course'] }}';" style="border-radius:30px; background:linear-gradient(180deg, #D9D9D9 0%, rgba(217, 217, 217, 0) 100%);" id="course" >
                        <div class="row" style="border-radius:30px 30px 0 0;margin-top:-40px; display:block; position:relative; background-color: #ca2221">
                            <div class="icon d-flex align-items-center justify-content-center" >
                                <img src="{{ $media.$rek['photo'] }}" alt="">
                            </div>
                        </div>
                        <div class="grid-container mt-3" style="display:grid; grid-template-columns:25% 25% 50% ;">
                            <div class="grid-item">
                                <i class="fa fa-user" aria-hidden="true" style="color: white; margin-right: 2px"></i>
                                    <small id="students" style="color: white">{{ $rek['number_of_students'] }}</small>
                            </div>
                            <div class="grid-item">
                                    <i class="fa-solid fa-book" aria-hidden="true" style="color: white; margin-right: 2px"></i>
                                    <small style="color: white">{{ $rek['number_of_syllabus'] }}</small>
                            </div>
                            <div class="grid-item"></div>
                        </div>
                        <h4 style="color: white">{{ $rek['name'] }}</h4>
                        <div class="grid-container mt-3" style="display:grid; grid-template-columns: 50% 50% ;">
                            <div class="grid-item text-left">

                            </div>
                            <div class="grid-item text-right">
                                @php
                                    $price = $rek['price'];
                                    if($price == 0){
                                        $price = 'FREE';
                                    }else{
                                        $price = 'Rp'.number_format($price, 0, ',', '.');
                                    }
                                @endphp
                                <strong style="color: white">{{ $price }}</strong>
                            </div>

                        </div>

                    </div>
                </div>
                @endforeach

            </div>

@endif

            {{-- Portfolio Hasil --}}
            @if ($portfolio != null)
            <div class="fancy-hero-six" style="margin-top: 30px">
                <div class="container">
                    <h2 class="heading font-gordita" style="color: white"><strong>Portfolio yang dihasilkan</strong></h2>
                </div>

			<div class="fancy-feature-four">
				<div class="bg-wrapper" >
					<div class="container">
						<div class="inner-content">
							<div class="row justify-content-center">
								@foreach($portfolio as $port)
                                    <div class="col-md-4 item mix SS">
                                        <div class="block-style-twentyTwo" onclick="location.href='/portfolio/{{ $port['id_portofolio'] }}';" style="border-radius:30px; background:linear-gradient(180deg, #D9D9D9 0%, rgba(217, 217, 217, 0) 100%);" id="course" >
                                            <div class="row" style="border-radius:30px 30px 0 0;margin-top:-40px; display:block; position:relative; background-color: #ca2221">
                                                <img src="{{ $media_p.$port['foto_portofolio'] }}" style="border-radius: 30px 30px 0 0" alt="">
                                            </div>
                                            <h4 style="color: white; text-align:left">{{ $port['nama_portofolio'] }}</h4>

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
                                        </div>
                                    </div>
                                @endforeach
							</div>
						</div>
					</div>
				</div>
			</div> <!-- /.fancy-feature-four -->
            @endif

            {{-- Testimoni --}}
            @if ($testi != null)
            <!--
			=============================================
				Testimonial
			==============================================
			-->
            <div class="fancy-hero-six" style="margin-top: 30px">
                <div class="container">
                    <h2 class="heading" style="color: white"><strong>Testimonial</strong></h2>
                </div>

			<div class="fancy-feature-four">
				<div class="bg-wrapper" >
					<div class="container">
						<div class="inner-content">
							<div class="row justify-content-center">
								@foreach($testi as $testi)
                                    <div class="col-md-4 item mix SS" style="margin: 0 0 13px 0">
                                        <div class="block-style-twentyTwo" style="border-radius:30px; background: linear-gradient(90deg, rgba(197, 75, 189, 0.47) -69.94%, rgba(67, 56, 200, 0) 245.71%);" id="course" >
                                            <div class="row" style="border-radius:30px 30px 0 0;margin-top:-40px; display:block; position:relative; background-color: #ca2221">

                                            </div>
                                            <div class="grid-container" style="display:grid; grid-template-columns: 100% ; padding:8px 0">
                                                <div class="grid-item text-left">
                                                    <strong style="color: white; font-weight:700">{{ $testi['testimonial'] }}</strong>
                                                </div>
                                            </div>
                                            <div class="grid-container mt-3" style="display:grid; grid-template-columns: 70% 0% 30% ; padding:8px 0 0 0">
                                                <div class="grid-item text-left">
                                                    <p style="color: white">{{ $testi['nama_user'] }}</p>
                                                </div>
                                                <div class="gridotem"></div>
                                                <div class="grid-item text-right">
                                                    @if ($testi['rating'] == 0)
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    @elseif ($testi['rating'] == 1)
                                                    <i class="fa-solid fa-star checked-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    @elseif ($testi['rating'] == 2)
                                                    <i class="fa-solid fa-star checked-star"></i>
                                                    <i class="fa-solid fa-star chekced-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    @elseif ($testi['rating'] == 3)
                                                    <i class="fa-solid fa-star checked-star"></i>
                                                    <i class="fa-solid fa-star checked-star"></i>
                                                    <i class="fa-solid fa-star checked-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    @elseif ($testi['rating'] == 4)
                                                    <i class="fa-solid fa-star checked-star"></i>
                                                    <i class="fa-solid fa-star checked-star"></i>
                                                    <i class="fa-solid fa-star checked-star"></i>
                                                    <i class="fa-solid fa-star checked-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    @elseif ($testi['rating'] == 5)
                                                    <i class="fa-solid fa-star checked-star"></i>
                                                    <i class="fa-solid fa-star checked-star"></i>
                                                    <i class="fa-solid fa-star checked-star"></i>
                                                    <i class="fa-solid fa-star checked-star"></i>
                                                    <i class="fa-solid fa-star checked-star"></i>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
							</div>
						</div>
					</div>
				</div>
			</div> <!-- /.fancy-feature-four -->
            @endif



@endsection

