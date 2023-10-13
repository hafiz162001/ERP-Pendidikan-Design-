{{-- @dd($data) --}}
@php
$certification = 'https://gate.bisaai.id/bisa_design_prod/certification/media/foto_certification/';
$partner = 'https://gate.bisaai.id/bisa_design_prod/certification/media/foto_partner/';
@endphp

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
					<h2 style="color: white; font-family: 'Fira Code', monospace; font-weight:700"><strong>Certification</strong></h2>
					{{-- <p class="sub-heading" style="color: white">Tersedia +50 Course <strong> GRATIS </strong> yang dapat kamu ikuti untuk belajar berbagai topik.<br>Dapatkan Sertifikat setelah menyelesaikan Quiz dan Tugas-nya</p> --}}
				</div>

			</div> <!-- /.fancy-hero-six -->
      <!--
			=============================================
				Portfolio Details One
			==============================================
			-->
      <div class="portfolio-details-one mt-75 mb-150 md-mb-100" style="background-color: #110743; min-height:1000px">
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
                    {{-- {!! $course['info'] !!} --}}
                    <hr />
                    <h4 style="color: white">{{ $data['nama_sertifikasi'] }}</h4>
                    <p>
                      Waktu Daftar: {{ $data['waktu_daftar'] }}
                    </p>
                    <p>
                      Waktu Selesai: {{ $data['waktu_selesai'] }}
                    </p>
                  </div>
                  <div class="col-md-4">
                    <ul class="project-info clearfix pl-xl-5" style="color:white">
                        <li class="text-center" style="margin-bottom: 25px">
                            <strong style="font-size: 24px; ">DETAIL SERTIFIKASI</strong>
                        </li>
                        <li style="margin-bottom: 25px; background-color:white; border-radius:10px">
                            <img src="{{ $certification.$data['foto_sertifikasi'] }}" style="border-radius: 5%"  alt="">
                        </li>
                      {{-- <li>
                        <div class="row">
                          <div class="col"><span class="text-left">PARTNER</span></div>
                          <div class="col"><img src="{{ $partner.$data['foto_partner'] }}" alt=""></div>
                        </div>
                      </li> --}}
                      <li>
                        <div class="row">
                          <div class="col"><span class="text-left to-upper">Jumlah Ujian</span></div>
                          <div class="col"><span class="text-right">{{ $data['jumlah_ujian'] }}</span></div>
                        </div>
                      </li>
                      <li>
                        <div class="row">
                          <div class="col"><span class="text-left to-upper">Nilai Anda</span></div>
                          <div class="col"><span class="text-right">{{ $data['nilai_akhir'] }}</span></div>
                        </div>
                      </li>



                      {{-- <li>
                        <div class="row">
                          <div class="col"><span class="text-left">Harga</span></div>

                          <div class="col"><span class="text-right">SS</span></div>
                        </div>
                      </li> --}}
                      {{-- <hr /> --}}

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


@endsection


