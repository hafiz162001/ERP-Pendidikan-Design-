{{-- @dd($course, $registered) --}}
{{-- @dd(session()->get('data')['email']) --}}
{{-- @dd($course) --}}
@php
$url = 'https://gate.bisaai.id/bisa_design_prod/';
$media = $url.'course/media/'

@endphp

@extends('layouts.course')

@section('js_head')
<script type="text/javascript">
    history.pushState(null, null, location.href);
    window.onpopstate = function () {
    history.go(1);
    };
</script>
@endsection

@section('content')
<!--
			=============================================
				Fancy Hero Six
			==============================================
			-->
			<div class="fancy-hero-six">
				<div class="container">
                    {{-- <div class="title-style-ten">
                        <h2 style="color: white">{{ $course['name'] }}</h2>
                      </div> --}}
					<h2 class="heading font-gordita" style="color: white"><strong>{{ $course['name'] }}</strong></h2>
					{{-- <p class="sub-heading" style="color: white">Tersedia +50 Course <strong> GRATIS </strong> yang dapat kamu ikuti untuk belajar berbagai topik.<br>Dapatkan Sertifikat setelah menyelesaikan Quiz dan Tugas-nya</p> --}}
				</div>

			</div> <!-- /.fancy-hero-six -->
      <!--
			=============================================
				Portfolio Details One
			==============================================
			-->
      <div class="portfolio-details-one mt-25 mb-150 md-mb-100">
        <div class="container">
          {{-- <div class="row" >
            <div class="col-xl-11 m-auto">
              <div class="header text-center">
                <div class="tag">Redesign, Branding</div>
                <div class="title-style-ten" >
                  <h2>{{ $course['name'] }}</h2>
                </div>
                <div class="row justify-content-center">

                </div>
              </div>
            </div>
          </div> --}}

          <div class="main-content mt-25" style="background-color: #110743">
            <img src="images/gallery/img_33.jpg" alt="" class="mb-90 md-mb-50" />
            <div class="row">
              <div class="col-xl-11 m-auto">
                <div class="row">
                  <div class="col-md-8" style="color: white">
                    {!! $course['info'] !!}
                  </div>
                  <div class="col-md-4">
                    <ul class="project-info clearfix pl-xl-5" style="color: black">
                        <li class="text-center" style="margin-bottom: 25px">
                            <strong style="font-size: 24px; color:white">CHECKOUT</strong>
                        </li>
                        <li style="margin-bottom: 25px">
                            <img src="{{ $media.$course['photo'] }}" style="border-radius: 5%"  alt="">
                        </li>

                        <li>
                        <strong style="color: white">Details</strong>
                        <div class="row" style="color: white">
                          <div class="col"><span class="text-left">Harga</span></div>
                          <div class="col"><span class="text-right">{{ $price }}</span></div>
                        </div>
                        {{-- @dd($course) --}}
                        @if ($course['price'] > 0)
                        @php
                            // random generate number 111-999
                            $number = rand(111,999);
                        @endphp
                        @endif

                    </li>
                    @if ($course['price'] > 0)
                    <form action="/course/pembelian/{{ $course['id_course'] }}/paid" method="POST">
                        @csrf
                        <div class="row" style="color: white">
                            <div class="col"><span class="text-left">Kode Unik</span></div>

                            <div class="col"><span class="text-right">{{ $number }}</span></div>
                        </div>

                        <input type="hidden" id="course_id" name="course_id" value="{{ $course['id_course'] }}">
                        <li>
                          <strong style="color: white">Gunakan Coupon(opsional)</strong>
                          <input id="coupon" name="coupon" class="form-control form-control-lg" type="text" placeholder="Kode Coupon" style="font-weight: 500; font-size: 16px"/>
                          <small class="form-text text-muted">Kosongkan jika tidak ada.</small>
                          <span> </span>
                        </li>
                        <div class="form-group" style="color: white">
                          <label for="exampleFormControlSelect1"> <strong>Metode Pembayaran</strong></label>
                          <select class="form-control form-control-lg" id="service" name="service" onchange="showDiv(this)" style="font-size: 16px">
                            <option id="service" value="1084" onclick="paymethods(1084)">Dana</option>
                            <option id="service" value="1083" onclick="paymethods(1083)">Bayarind</option>
                            {{-- <option id="service" value="1077" onclick="paymethods(1077)">LinkAja</option> --}}
                            {{-- <option id="service" value="1085" onclick="paymethods(1085)">ShopeePay</option> --}}
                          </select>
                        </div>
                        <span></span>
                        <li>
                          <div class="row mb-1" style="color: white">
                            <div class="col-6 text-left"><strong>Total</strong></div>
                            @php
                                $total = $price + $number;
                                $total_idr = "Rp".number_format($total, 0, ',', '.');
                            @endphp
                            <input type="hidden" name="kd_unik" id="kd_unik" value="{{ $number }}">
                            <input type="hidden" name="price" id="price" value="{{ $price }}">
                            <div class="col-6 text-right"><strong>{{ $total_idr }}</strong></div>
                          </div>
                          <button class="theme-btn-fourteen w-100 text-center" name="paid">Bayar</button>
                        </li>
                      </form>
                      @elseif ($registered == true)
                      <li>
                        <p class="text-center text-success"><strong>Anda Sudah Terdaftar</strong></p>
                      </li>
                      @else
                      <li>
                        <div class="row mb-5" style="color: white">
                          <div class="col-6 text-left"><strong>Total</strong></div>
                          <div class="col-6 text-right"><strong>{{ $price }}</strong></div>
                        </div>
                        <form action="/course/pembelian/{{ $course['id_course'] }}" method="POST">
                            @csrf
                            <input type="hidden" id="course_id" name="course_id" value="{{ $course['id_course'] }}">
                            {{-- @dd($course['id_course']) --}}
                            <input type="hidden" id="email" name="email" value="{{ (session()->get('data')['email']) }}">
                            <button class="theme-btn-fourteen w-100 text-center" name="free">Enroll Free</button>
                            {{-- <a href="#" class="theme-btn-eight w-100 text-center">Bayar</a> --}}
                        </form>
                      </li>
                      @endif
                      @if(session()->has('errorkupon'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert" style="margin-top: 15px; margin-bottom:10px">
                            {{ session()->get('errorkupon') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                      @endif
                      <br>
                      {{-- <p id="paydesc"></p> --}}
                      @if ($course['price'] > 0)
                      {{-- Dana --}}
                      <div id="hidden_div" style="display: none">
                        <div class="row justify-content-center mb-3">
                            <img src="{{ asset('images/logo/dana.png') }}" width="200px" alt="">
                        </div>
                          <div class="card mb-5" >
                            <div class="card-header">
                                <i class="fa fa-credit-card-alt" aria-hidden="true" style="color:black; font-size:14px"></i> Keterangan Transfer
                            </div>
                            <div class="card-body">
                                Anda akan terdaftar pada course <strong>{{ $course['name'] }}</strong> , silahkan lakukan pembayaran dengan nominal <strong> {{ $price }}</strong> dengan Dana
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
                      <div id="hidden_div2" style="display:none;">
                        <div class="row justify-content-center mb-3">
                            <img src="{{ asset('images/logo/link.png') }}" width="200px" alt="">
                        </div>
                          <div class="card mb-5" >
                            <div class="card-header">
                                <i class="fa fa-credit-card-alt" aria-hidden="true" style="color:black; font-size:14px"></i> Keterangan Transfer
                            </div>
                            <div class="card-body">
                                Anda akan terdaftar pada course <strong>{{ $course['name'] }}</strong> , silahkan lakukan pembayaran dengan nominal <strong> {{ $price }}</strong> dengan LinkAja
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
                      <div id="hidden_div3" style="display:none;">
                        <div class="row justify-content-center mb-3">
                            <img src="{{ asset('images/logo/shopee.png') }}" width="200px" alt="">
                        </div>
                          <div class="card mb-5" >
                            <div class="card-header">
                                <i class="fa fa-credit-card-alt" aria-hidden="true" style="color:black; font-size:14px"></i> Keterangan Transfer
                            </div>
                            <div class="card-body">
                                Anda akan terdaftar pada course <strong>{{ $course['name'] }}</strong> , silahkan lakukan pembayaran dengan nominal <strong> {{ $price }}</strong> dengan ShopeePay
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
                      <div id="hidden_div4" style="display:none;">
                        <div class="row justify-content-center mb-3">
                            <img src="{{ asset('images/logo/bayarind.png') }}" width="200px" alt="">
                        </div>
                          <div class="card mb-5" >
                            <div class="card-header">
                                <i class="fa fa-credit-card-alt" aria-hidden="true" style="color:black; font-size:14px"></i> Keterangan Transfer
                            </div>
                            <div class="card-body">
                                Anda akan terdaftar pada course <strong>{{ $course['name'] }}</strong> , silahkan lakukan pembayaran dengan nominal <strong> {{ $price }}</strong> dengan Bayarind
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
                      @endif
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- /.portfolio-details-one -->
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



