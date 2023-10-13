{{-- {{ dd($course, $registered) }} --}}
{{-- {{ dd(session()->all()) }} --}}
{{-- @dd($data) --}}
{{-- @dd($detail) --}}
@php
$url = 'https://gate.bisaai.id/bisa_design_prod/';
$url2 = 'https://portal2.bisaai.id:8080/bisa_business_dev/';
$media = 'https://gate.bisaai.id/bisa_design_prod/learning_path/media/';
$photo_c = 'https://gate.bisaai.id/bisa_design_prod/course/media/';
@endphp

@extends('layouts.course')

@section('content')
@if(session()->has('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert" style="position:fixed; top:115px; right:20px; z-index:9999">
        {{ session()->get('error') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
<!--
			=============================================
				Fancy Hero Six
			==============================================
			-->
			{{-- <div class="fancy-hero-six" style="background: url({{ asset('images/bannerimg/banner2.jpg') }}) no-repeat scroll center center/cover"> --}}
			<div class="fancy-hero-six">
				<div class="container">
                    <div class="title-style-ten">
                        <h2 style="color: white">{{ $data['name'] }}</h2>
                      </div>
					{{-- <h2 style="color: white; font-family: 'Fira Code', monospace; font-weight:700"><strong>{{ $course['name'] }}</strong></h2> --}}
					{{-- <p class="sub-heading" style="color: white">Tersedia +50 Course <strong> GRATIS </strong> yang dapat kamu ikuti untuk belajar berbagai topik.<br>Dapatkan Sertifikat setelah menyelesaikan Quiz dan Tugas-nya</p> --}}
				</div>

			</div> <!-- /.fancy-hero-six -->
      <!--
			=============================================
				Portfolio Details One
			==============================================
			-->
      <div class="portfolio-details-one mt-75 mb-150 md-mb-100" style="background-color: #110743">
        <div class="container">
          <div class="row">
          </div>

          <div class="main-content mt-45">
            <div class="row">
              <div class="col-xl-11 m-auto">
                <div class="row">
                  <div class="col-md-8" style="color: white;">
                    {{-- {!! $course['info'] !!} --}}
                    <hr />
                    <h4 style="color: white">Anda Akan Terdaftar Pada Course-Course Ini</h4>
                    <div class="row">
                        @foreach ($detail as $det)
                        <div class="col-md-3">
                            <img src="{{ $photo_c.$det['course_photo'] }}" alt="">
                            <p>{{ $det['course_name'] }}</p>
                        </div>

                        @endforeach
                    </div>
                    {{-- <h4 style="color: white">Deskripsi</h4> --}}
                    <div class="row">
                        @foreach ($detail as $det)
                        <div class="col-md-12">
                            <div class="row">
                                <p>{{ $det['course_name'] }}</p>
                                <p>{!! $det['course_description'] !!}</p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                  </div>
                  <div class="col-md-4">
                    <ul class="project-info clearfix pl-xl-5" style="color:white">
                        <li class="text-center" style="margin-bottom: 25px">
                            <strong style="font-size: 24px; ">DETAIL COURSE</strong>
                        </li>
                        <li style="margin-bottom: 25px">
                            <img src="{{ $media.$data['photo'] }}" style="border-radius: 20px; border:1px solid white"  alt="">
                        </li>
                      <li>
                        <div class="row">
                          <div class="col"><span class="text-left">PEMBUAT</span></div>
                          <div class="col"><span class="text-right">BISA AI ACADEMY</span></div>
                        </div>
                      </li>
                      <li>
                        <div class="row">
                          <div class="col"><span class="text-left to-upper">Jumlah Course</span></div>
                          <div class="col"><span class="text-right">{{ $data['course_count'] }}</span></div>
                        </div>
                      </li>

                      <li>
                        <div class="row">
                          <div class="col"><span class="text-left to-upper">Jumlah SIlabus</span></div>
                          <div class="col"><span class="text-right">{{ $data['syllabus_count'] }}</span></div>
                        </div>
                      </li>

                      <li>
                        <div class="row">
                          <div class="col"><span class="text-left">Harga</span></div>
                          @php
                          if($data['price'] == 0) {
                            $harga = 'FREE';
                            } else {
                            $harga = 'Rp. '.number_format($data['price'], 0, ',', '.');
                            }
                          @endphp
                          <div class="col"><span class="text-right">{{ $harga }}</span></div>
                        </div>
                      </li>
                      {{-- <hr /> --}}
                      <form action="/learning-path/{{ $data['id_learning_path'] }}" method="POST">
                        @csrf
                        <input type="hidden" name="id_lpath" value="{{ $data['id_learning_path'] }}">
                          @if (session()->has('token'))
                            <li>
                              <a href="/course-detail/SS/checkout" >
                                <button class="theme-btn-fourteen" style="font-weight: 700">ENROLL</button></a>

                            </li>
                          @else
                          <li>
                              <div class="text-center">
                                  <p>Silahkan <a href="/login" style="text-decoration: underline; color:red"><strong>Login</strong> </a> Untuk Mendaftar!</p>
                              </div>
                          </li>
                          @endif
                      </form>

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

<!--
			=============================================
				Rekomendasi
			==============================================
			-->
			{{-- <div class="fancy-hero-six" >
				<div class="container">
					<h2 class="heading font-gordita" style="color: white"><strong>Course Terkait</strong></h2>
				</div>

			</div> --}}

            {{-- <div class="mixitUp-container gutter-space-two d-flex flex-wrap"  style="margin-top: 50px; padding:0 170px" id="content">
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
                        <hr>
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
            </div> --}}

@endsection

