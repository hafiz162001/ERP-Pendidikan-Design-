{{-- {{ dd($course, $registered) }} --}}
{{-- {{ dd(session()->all()) }} --}}
{{-- @dd($data) --}}
@php
$media = 'https://gate.bisaai.id/bisa_design_prod/certification/media/foto_certification/';
$pmedia = 'https://gate.bisaai.id/bisa_design_prod/certification/media/foto_partner/';
$crs = 'https://gate.bisaai.id/bisa_design_prod/course/media/';
@endphp
{{-- @dd($passReq) --}}
{{-- @dd($reqCrs) --}}
@extends('layouts.course')

@section('content')
@if(session()->has('error'))
<div class="alert alert-danger alert-dismissible fade show" role="alert" style="position:fixed; top:120px; right:20px; z-index:9999">
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
			<div class="fancy-hero-six">
				<div class="container">
                    {{-- <div class="title-style-ten">
                        <h2 style="color: white">{{ $data['nama'] }}</h2>
                      </div> --}}
					<h2 class="heading font-gordita" style="color: white"><strong>{{ $data['nama'] }}</strong></h2>
					{{-- <p class="sub-heading" style="color: white">Tersedia +50 Course <strong> GRATIS </strong> yang dapat kamu ikuti untuk belajar berbagai topik.<br>Dapatkan Sertifikat setelah menyelesaikan Quiz dan Tugas-nya</p> --}}
				</div>

			</div> <!-- /.fancy-hero-six -->
      <!--
			=============================================
				Portfolio Details One
			==============================================
			-->
      <div class="portfolio-details-one mt-75 mb-150 md-mb-100" style="background-color: #110743; padding:70px">
        <div class="container">
          <div class="row">
            <div class="col-xl-11 m-auto">
            </div>
          </div>

          <div class="main-content mt-45">
            {{-- <img src="{{ $media.$course['photo'] }}" alt="" class="mb-90 md-mb-50" /> --}}
            <div class="row">
              <div class="col-xl-11 m-auto">
                <div class="row">
                  <div class="col-md-8" style="color: rgb(35, 35, 35)">
                    {{-- <h4>Masterclass On Job Training : Graphic Design Batch 1</h4>
                    <p>Graphic Design merupakan sebuah ilmu yang memahami bagaimana sebuah desain dibuat sedemikian rupa</p> --}}
                    <div style="color: white">

                        <h4 style="color: white">Info Singkat</h4>
                        {!! $data['info_singkat'] !!}
                        <hr />
                        <h4 style="color: white">Deskripsi</h4>
                        {!! $data['deskripsi'] !!}
                    </div>
                    <hr />

                  </div>
                  <div class="col-md-4">
                    <ul class="project-info clearfix pl-xl-5" style="color: white">
                        <li class="text-center" style="margin-bottom: 25px">
                            <strong style="font-size: 24px;">DETAIL COURSE</strong>
                        </li>
                        <li style="margin-bottom: 25px">
                            <div style="background-color: white; border-radius:20px">
                                <img src="{{ $media.$data['foto'] }}" style="border-radius: 5%"  alt="">
                            </div>
                        </li>
                      <li>
                        <div class="row">
                          <div class="col"><span class="text-left to-upper">Peserta</span></div>
                          <div class="col"><span class="text-right">{{ $data['jumah_peserta'] }}</span></div>
                        </div>
                      </li>
                      @if (session()->has('token'))

                      @if ($data['harga'] == 0)
                      <li>
                        <div class="row">
                          <div class="col"><span class="text-left">Harga</span></div>
                          <div class="col"><span class="text-right">FREE</span></div>
                        </div>
                      </li>

                      <form action="/certification/detail/{{ $data['id_certification'] }}/enrollFree" method="POST">
                        @csrf
                        <li>
                            <input type="hidden" name="id_certification" value="{{ $data['id_certification'] }}">
                            <button class="theme-btn-fourteen w-100 text-center mb-4">REGIST FREE</button>
                          </li>
                      </form>
                      @endif

                      @if ($data['harga'] > 0)
                      <li>
                        <div class="row">
                          <div class="col"><span class="text-left">Harga</span></div>
                          <div class="col"><span class="text-right">{{ $price }}</span></div>
                        </div>
                      </li>

                      @php
                        $kd_unik = rand(111,999);
                      @endphp
                      <form action="/certification/detail/{{ $data['id_certification'] }}/enroll" method="POST">
                        @csrf
                          <div class="row" style="color: white">
                            <div class="col"><span class="text-left">Kode Unik</span></div>
                            {{-- <input type="hidden" name="kd_unik" value="{{ $kd_unik }}"> --}}
                            <div class="col"><span class="text-right">{{ $kd_unik }}</span></div>
                          </div>

                          <li>
                            <strong style="color: white">Gunakan Promo</strong>
                            <input id="kupon" name="kupon" class="form-control form-control-lg" type="text" placeholder="Kode Promo" style="font-weight: 500; font-size: 16px" />
                            <span> </span>
                          </li>

                          <div class="form-group" style="color: white">
                            <label for="exampleFormControlSelect1"> <strong>Payment Method</strong></label>
                            <select class="form-control form-control-lg" id="service" name="service" onchange="showDiv(this)" style="font-size: 16px">
                              <option id="service" value="1084" onclick="paymethods(1084)">Dana</option>
                              <option id="service" value="1083" onclick="paymethods(1083)">Bayarind</option>
                              {{-- <option id="service" value="1077" onclick="paymethods(1077)">LinkAja</option> --}}
                              {{-- <option id="service" value="1085" onclick="paymethods(1085)">ShopeePay</option> --}}
                            </select>
                          </div>
                          <span> </span>
                          <li>
                            <div class="row mb-1" style="color: white">
                              <div class="col-6 text-left"><strong>Total</strong></div>
                              @php
                                  $price =  (int )$data['harga'];
                                  $total = $price + $kd_unik;
                                  $total_idr = "Rp".number_format($total, 0, ',', '.');
                              @endphp
                              <input type="hidden" name="id_certification" value="{{ $data['id_certification'] }}">
                              <input type="hidden" name="kd_unik" id="kd_unik" value="{{ $kd_unik }}">
                              <input type="hidden" id="price" value="{{ $total }}">
                              <div class="col-6 text-right"><strong>{{ $total_idr }}</strong></div>
                            </div>
                            <button class="theme-btn-fourteen w-100 text-center mb-4">Bayar</button>
                          </li>

                      </form>
                      @endif

                      {{-- Dana --}}
                      <div id="hidden_div" style="display: none; color:black">
                        <div class="row justify-content-center mb-3">
                            <img src="{{ asset('images/logo/dana.png') }}" width="200px" alt="">
                        </div>
                          <div class="card mb-5" >
                            <div class="card-header">
                                <i class="fa fa-credit-card-alt" aria-hidden="true" style="color:black; font-size:14px"></i> Keterangan Transfer
                            </div>
                            <div class="card-body">
                                Anda akan terdaftar pada course <strong>{{ $data['nama'] }}</strong> , silahkan lakukan pembayaran dengan nominal <strong> {{ $price }}</strong> dengan Dana
                            </div>
                          </div>
                          <div class="card mt-5" >
                            <div class="card-header">
                                <i class="fa fa-credit-card-alt" aria-hidden="true" style="color:black; font-size:14px"></i> Cara Pembayaran
                            </div>
                            <div class="card-body ket-langkah" style="padding-left: 40px">
                                <ol>
                                    <li>Pilih pembayaran menggunakan Dana</li>
                                    <li>Klik tombol pembayaran</li>
                                    <li>Masukkan nomor telpon yang terhubung dengan Dana</li>
                                    <li>Cek kembali total biaya dan lakukan pembayaran</li>
                                </ol>
                            </div>
                        </div>
                      </div>
                      {{-- LinkAja --}}
                      <div id="hidden_div2" style="display:none; color:black">
                        <div class="row justify-content-center mb-3">
                            <img src="{{ asset('images/logo/link.png') }}" width="200px" alt="">
                        </div>
                          <div class="card mb-5" >
                            <div class="card-header">
                                <i class="fa fa-credit-card-alt" aria-hidden="true" style="color:black; font-size:14px"></i> Keterangan Transfer
                            </div>
                            <div class="card-body">
                                Anda akan terdaftar pada course <strong>{{ $data['nama'] }}</strong> , silahkan lakukan pembayaran dengan nominal <strong> {{ $price }}</strong> dengan LinkAja
                            </div>
                          </div>
                          <div class="card mt-5" >
                            <div class="card-header">
                                <i class="fa fa-credit-card-alt" aria-hidden="true" style="color:black; font-size:14px"></i> Cara Pembayaran
                            </div>
                            <div class="card-body ket-langkah" style="padding-left: 40px">
                                <ol>
                                    <li>Pilih pembayaran menggunakan Link Aja</li>
                                    <li>Klik tombol pembayaran</li>
                                    <li>Masukkan nomor telpon yang terhubung dengan akun LinkAja anda</li>
                                    <li>Cek kembali total biaya dan lakukan pembayaran</li>
                                </ol>
                            </div>
                        </div>
                      </div>
                      {{-- ShopeePay --}}
                      <div id="hidden_div3" style="display:none; color:black">
                        <div class="row justify-content-center mb-3">
                            <img src="{{ asset('images/logo/shopee.png') }}" width="200px" alt="">
                        </div>
                          <div class="card mb-5" >
                            <div class="card-header">
                                <i class="fa fa-credit-card-alt" aria-hidden="true" style="color:black; font-size:14px"></i> Keterangan Transfer
                            </div>
                            <div class="card-body">
                                Anda akan terdaftar pada course <strong>{{ $data['nama'] }}</strong> , silahkan lakukan pembayaran dengan nominal <strong> {{ $price }}</strong> dengan ShopeePay
                            </div>
                          </div>
                          <div class="card mt-5" >
                            <div class="card-header">
                                <i class="fa fa-credit-card-alt" aria-hidden="true" style="color:black; font-size:14px"></i> Cara Pembayaran
                            </div>
                            <div class="card-body ket-langkah" style="padding-left: 40px">
                                <ol>
                                    <li>Pilih pembayaran menggunakan ShopeePay</li>
                                    <li>Klik tombol pembayaran</li>
                                    <li>Masukkan nomor telpon yang terhubung dengan akun shopee anda</li>
                                    <li>Cek kembali total biaya dan lakukan pembayaran</li>
                                </ol>
                            </div>
                        </div>
                      </div>
                      {{-- Bayarind --}}
                      <div id="hidden_div4" style="display:none; color:black">
                        <div class="row justify-content-center mb-3">
                            <img src="{{ asset('images/logo/bayarind.png') }}" width="200px" alt="">
                        </div>
                          <div class="card mb-5" >
                            <div class="card-header">
                                <i class="fa fa-credit-card-alt" aria-hidden="true" style="color:black; font-size:14px"></i> Keterangan Transfer
                            </div>
                            <div class="card-body">
                                Anda akan terdaftar pada course <strong>{{ $data['nama'] }}</strong> , silahkan lakukan pembayaran dengan nominal <strong> {{ $price }}</strong> dengan Bayarind
                            </div>
                          </div>
                          <div class="card mt-5" >
                            <div class="card-header">
                                <i class="fa fa-credit-card-alt" aria-hidden="true" style="color:black; font-size:14px"></i> Cara Pembayaran
                            </div>
                            <div class="card-body ket-langkah" style="padding-left: 40px">
                                <ol>
                                    <li>Pilih pembayaran menggunakan Bayarind</li>
                                    <li>Klik tombol pembayaran</li>
                                    <li>Masukkan nomor telpon yang terhubung dengan akun Bayarind anda</li>
                                    <li>Cek kembali total biaya dan lakukan pembayaran</li>
                                </ol>
                            </div>
                        </div>
                      </div>

                        @else
                        <li>
                            <div class="text-center">
                                <p>Silahkan <a href="/login" style="text-decoration: underline; color:red"><strong>Login</strong> </a> Untuk Mendaftar!</p>
                            </div>
                        </li>

                      @endif
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>

      </div>
      @if ($reqCrs != null)
      <div class="fancy-hero-six" >
        <div class="container">
            <h2 class="heading " style="color: white"><strong>Syarat Course</strong></h2>
        </div>

    </div>


    <div class="mixitUp-container gutter-space-two d-flex flex-wrap"  style="margin-top: 50px; padding:0 170px" id="content">
        @foreach($reqCrs as $req)

        <div class="col-md-4 item mix SS">
            <div class="block-style-twentyTwo" onclick="location.href='/course-detail/{{ $req['id_course'] }}';" style="border-radius:30px; background:linear-gradient(180deg, #D9D9D9 0%, rgba(217, 217, 217, 0) 100%);" id="course" >
                <div class="row" style="border-radius:30px 30px 0 0;margin-top:-40px; display:block; position:relative; background-color: #ca2221">
                    <div class="icon d-flex align-items-center justify-content-center" >
                        <img src="{{ $crs.$req['foto_course'] }}" alt="">
                    </div>
                </div>
                <h4 style="color: white">{{ $req['nama_course'] }}</h4>
            </div>
        </div>
        @endforeach

    </div>
    @endif



      <script>
        function showDiv(select){
              if(select.value == 1084){
                  document.getElementById('hidden_div').style.display = "block";
              } else{
                  document.getElementById('hidden_div').style.display = "none";
              }

              if(select.value == 1077){
                  document.getElementById('hidden_div2').style.display = "block";
              } else{
                  document.getElementById('hidden_div2').style.display = "none";
              }

              if(select.value == 1085){
                  document.getElementById('hidden_div3').style.display = "block";
              } else{
                  document.getElementById('hidden_div3').style.display = "none";
              }

              if(select.value == 1083){
                  document.getElementById('hidden_div4').style.display = "block";
              } else{
                  document.getElementById('hidden_div4').style.display = "none";
              }
        }
    </script>





@endsection

