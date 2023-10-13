{{-- @dd($syllabus) --}}
{{-- @dd($course_info) --}}
{{-- @dd($data) --}}
{{-- @dd($cek_like) --}}
@php
    $carousel = 'https://gate.bisaai.id/bisa_design_prod/portofolio/media/carousel_portofolio/';
    $fporto = 'https://gate.bisaai.id/bisa_design_prod/portofolio/media/foto_portofolio/';
    $media = 'https://gate.bisaai.id/bisa_design_prod/users/media/';
@endphp

@extends('layouts.course')

@section('js_head')
<script type='text/javascript' src='https://platform-api.sharethis.com/js/sharethis.js#property=62b2803c50b54d00193c0e76&product=inline-share-buttons' async='async'></script>
@endsection

@section('content')
			<!--
			=============================================
				Fancy Hero Six
			==============================================
			-->
			<div class="fancy-hero-six">
				<div class="container">
					<h4 class="heading font-gordita" style="color: white"><strong>{{ $data['nama_portofolio'] }}</strong></h4>

					<p class="sub-heading" style="color: white" ><strong> {{ $data['nama_kategori_portofolio'] }} </strong> ~ <strong>{{ $data['nama_user'] }}</strong></p>
				</div>

			</div> <!-- /.fancy-hero-six -->
			<!--
			=============================================
				Fancy Text block Twenty
			==============================================
			-->
			<div class="fancy-text-block-twenty" style="margin-top: -20px; background-color: #110743; ">
				<div class="container">
                    <div class="carousel" style="margin-bottom:60px; margin-top:-90px; background-color:black">
                        <ul class="slider">
                            @if ($data['carousel1'] != null)
                            <li>
                                <img src="{{ $carousel.$data['carousel1'] }}" style="border-radius: 10px; margin:0 auto; max-height:450px" alt="">
                            </li>
                            @endif
                            @if ($data['carousel2'] != null)
                            <li>
                                <img src="{{ $carousel.$data['carousel2'] }}" style="border-radius: 10px; margin:0 auto; max-height:450px " alt="">
                            </li>
                            @endif
                            @if ($data['carousel3'] != null)
                            <li>
                                <img src="{{ $carousel.$data['carousel3'] }}" style="border-radius: 10px; margin:0 auto; max-height:450px " alt="">
                            </li>
                            @endif
                        </ul>
                    </div>

					<div class="row">

						<div class="col-lg-9 " style="padding: 0 70px 0 0px">
                            {{-- <img src="{{ asset('images/gallery/sample.png') }}"  style="border-radius: 5px; margin-bottom:30px" alt=""> --}}

                            {{-- <img src="{{ asset('images/gallery/sample2.png') }}"  style="border-radius: 5px; margin-bottom:30px" alt=""> --}}
							<!-- Nav tabs -->
                            <div class="card" style="border: none">

                                <div class="card-body">
                                    <h4><strong>Deksripsi Singkat</strong></h4>
                                    <br>
                                    <p class="font-rubik">{!! $data['deskripsi_singkat'] !!}</p>
                                    <br>
                                    <h4><strong>Deskripsi Lengkap</strong></h4>
                                    <br>
                                    <p class="font-rubik">{!! $data['deskripsi_lengkap'] !!}</p>
                                </div>
                            </div>
						</div>

                        <div class="col-lg-3 flex-column-reverse" style="padding:10px; color:white" >
							<div class="client-info text-center" style="color: white"><strong>Social Media</strong> </div>

                            <img src="{{ $fporto.$data['foto_portofolio'] }}"  style="border-radius: 5px; margin-bottom:30px" alt="">
                            <!-- ShareThis BEGIN -->
                            <div class="sharethis-inline-share-buttons" style="margin-bottom: 30px"></div>
                            <!-- ShareThis END -->
							<div class="title-style-five">
								{{-- <h2><span>Best event</span><br> & ticket platform platform.</h2> --}}

                                <div class="col mb-4 d-flex">

                                    <div class="row-12 justify-content-center">
                                        @php
                                            $instagram = explode('|', $data['sosmed_instagram']);
                                            $instagram = $instagram[0];
                                            $linkedin = explode('|', $data['sosmed_linkedin']);
                                            $linkedin = $linkedin[0];
                                        @endphp
                                        <div class="col-6 text-end">
                                            <a href="{{ $linkedin }}" target="_blank" ><i class="fa-brands fa-linkedin-in" style="font-size: 24px"></i></a>
                                        </div>
                                        <div class="col-6 text-end">
                                            {{-- @dd($data['sosmed_instagram']) --}}
                                            <a href="{{ $instagram }}" target="_blank"><i class="fa-brands fa-instagram" style="font-size: 24px"></i></a>
                                        </div>

                                    </div>

                                    <div class="col justify-content-center">
                                        <img src="{{ $media.$data['foto_user'] }}" height="110px" alt="" style="justify-content: center">
                                    </div>
                                </div>

                                <p class="mb-2"><i class="fa-solid fa-heart" style="color: red"></i> Jumlah like: {{ $data['jumlah_like'] }}</p>
                                @if (isset($cek_like) && $cek_like['is_like'] == 1)
                                <form action="/portfolio/{{ $data['id_portofolio'] }}/dislike" method="POST">
                                    @csrf
                                    <div class="col mb-1">
                                        <div class="row">
                                            <input type="hidden" name="dislike" value="2">
                                            <input type="hidden" name="id_porto" value="{{ $data['id_portofolio'] }}">
                                            <button type="submit" style="background-color: grey; width:300px; height:50px; border-radius:10px" >
                                                <i class="fa-solid fa-heart-crack" style="color: white"></i><strong style="color: white"> Tidak Suka</strong>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                                @else
                                    <form action="/portfolio/{{ $data['id_portofolio'] }}/like" method="POST">
                                        @csrf
                                        <div class="col mb-1">
                                            <div class="row">
                                                <input type="hidden" name="like" value="1">
                                                <input type="hidden" name="id_porto" value="{{ $data['id_portofolio'] }}">
                                                <button type="submit" style="background-color: #ca2221; width:300px; height:50px; border-radius:10px" >
                                                    <i class="fa-solid fa-heart" style="color: white"></i><strong style="color: white"> SUKA</strong>
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                @endif


                                {{-- @else
                                <div class="col mb-1">
                                    <div class="row">
                                        <button type="button" style="background-color: #ca2221; width:300px; height:50px; border-radius:10px" >
                                            <i class="fa-solid fa-heart" style="color: white"></i><strong style="color: white"> SUKA</strong>
                                        </button>
                                    </div>
                                </div>
                                @endif --}}

							</div>
						</div>
					</div>

				</div>
			</div> <!-- /.fancy-text-block-twenty -->

            <!--
			=============================================
				Terkait Portfolio
			==============================================
			-->
			<div class="fancy-feature-four" style="background:#110743">
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

									<h3 style="font-size:42px">
										<strong style="color: white">PORTFOLIO TERKAIT</strong>
									</h3>
								</div>

							</div>
						</div>
						<div class="inner-content">
							<div class="row justify-content-center">
								@foreach($porto as $port)
                                    <div class="col-md-4 item mix SS">
                                        <div class="block-style-twentyTwo" onclick="location.href='/portfolio/{{ $port['id_portofolio'] }}';" style="border-radius:30px; background:linear-gradient(180deg, #D9D9D9 0%, rgba(217, 217, 217, 0) 100%);" id="course" >
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
                                        </div>
                                    </div>
                                @endforeach
							</div>
						</div>
					</div>
				</div>
			</div> <!-- /.fancy-feature-four -->

@endsection

@section('js_bot')
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>

<script type="text/javascript">
    $('.slider').slick({
    infinite: true,
    speed: 2000,
    slidesToShow: 1,
    adaptiveHeight: true,
    autoplay: true,
    autoplaySpeed: 2800,
    fade: true,
    centerMode: true,
    // dots: true,
    // arrows: false,
    });
</script>
@endsection
