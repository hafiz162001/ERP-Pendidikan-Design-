@php
$url = 'https://gate.bisaai.id/bisa_design_prod/';
$media = $url.'course/media/';
$media_c = 'https://gate.bisaai.id/bisa_design_prod/certification/media/foto_certification/';
$bukti = 'https://gate.bisaai.id/bisa_design_prod/transaction/media/';
@endphp
{{-- @dd($data) --}}
{{-- @dd($lpath) --}}
{{-- @dd($certif) --}}
@extends('layouts.course')

@if(session()->has('successTransaction'))
<div class="alert alert-success alert-dismissible fade show" role="alert" style="position:fixed; top:115px; right:20px; z-index:9999">
    {{ session()->get('successTransaction') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

@if(session()->has('errorTransaction'))
<div class="alert alert-danger alert-dismissible fade show" role="alert" style="position:fixed; top:115px; right:20px; z-index:9999">
    {{ session()->get('errorTransaction') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

@if (session()->has('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert" style="position:fixed; top:115px; right:20px; z-index:9999">
    {{ session()->get('success') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>

@endif

@section('content')
			<div class="fancy-hero-six" style="background:#110743">
				<div class="container">
					<h4 class="heading font-gordita" style="color: white">{{ $title }}</h4>
					{{-- <p class="sub-heading">Tersedia +50 Course <strong> GRATIS </strong> yang dapat kamu ikuti untuk belajar berbagai topik.<br>Dapatkan Sertifikat setelah menyelesaikan Quiz dan Tugas-nya</p> --}}
				</div>


			</div> <!-- /.fancy-hero-six -->

			<div class="fancy-portfolio-four lg-container" style="margin-top: -10px; background:#110743">
				<div class="container" >
					<div class="pb-130 md-pb-90">
                        <form action="/transaction" method="POST">
                        <div class="row">
                                @csrf
                                <div class="col-lg-3 mb-2">
                                    <label for="exampleInputEmail1" style="color: white">Pencarian</label>
                                    <input class="form-control form-control-lg" type="search" id="search" name="search" placeholder="Pencarian" value="{{ (isset($search)) ? $search : '' }}"  style="height: 70px; border-radius:30px; ">
                                </div>
                                <div class="col-lg-3 mb-2">
                                    <label for="exampleInputEmail1" style="color: white">Tipe</label>
                                    <select class="form-control form-control-lg" id="sort" name="sort" style="height: 70px;">
                                        <option value="course" {{ (isset($sort) && $sort == 'course') ? 'selected' : '' }}>Course Academy</option>
                                        <option value="certif" {{ (isset($sort) && $sort == 'certif') ? 'selected' : '' }}>Certification</option>
                                        <option value="lpath" {{ (isset($sort) && $sort == 'lpath') ? 'selected' : '' }}>Learning Path</option>
                                    </select>
                                </div>
                                <div class="col-lg-3 mb-2">
                                    <label for="exampleInputEmail1" style="color: white">Status</label>
                                    <select class="form-control form-control-lg" id="status" name="status" style="height: 70px;">
                                        <option value="" {{ (isset($status) && $status == '') ? 'selected' : '' }}>Semua Status</option>
                                        <option value="1" {{ (isset($status) && $status == '1') ? 'selected' : '' }}>Belum Bayar</option>
                                        <option value="2" {{ (isset($status) && $status == '2') ? 'selected' : '' }}>Sudah Bayar</option>
                                        <option value="3" {{ (isset($status) && $status == '3') ? 'selected' : '' }}>Gagal Bayar</option>
                                    </select>
                                </div>
                                <div class="col-lg-2 mb-2">
                                    <label for="exampleInputEmail1" style="color: white">Halaman</label>
                                    <select class="form-control form-control-lg" id="page" name="page" style="height: 70px; ">
                                        {{-- <option value="1">halaman</option> --}}
                                        @foreach ($page as $page)
                                        <option value="{{ $page }}" {{ (isset($pageC) && $page == $pageC) ? 'selected' : '' }}>{{ $page }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-lg-1 mb-2 justify-content-end">
                                    <label for="exampleInputEmail1" style="color: white"></label>
                                    <button class="disabled" type="submit" style="width:85px; height:70px; border-radius:5px; background: linear-gradient(
                                        90deg,
                                        #c54bbd -69.94%,
                                        rgba(67, 56, 200, 0) 245.71%
                                    );" ><img src="{{ asset('images/icon/54.svg') }}" style="margin: auto"></button>
                                </div>
                            </div>
                        </form>
                        <div class="container gutter-space-two d-flex flex-wrap" style="margin-top: 60px; min-height:400px" >
                            @if (isset($data))
                            @php
                                $data = $data['data'];
                            @endphp
                            @if (count($data) == 0)
                                <h4 style="margin: auto; color: white">Tidak ada Data</h4>
                            @endif
                            @foreach($data as $dat)
                                        @php
                                            if($dat['status'] == 2){
                                                $color = "color: green";
                                                $ket = "Transaksi Berhasil";
                                            }elseif ($dat['status'] == 1){
                                                $color = "color: orange";
                                                $ket = "Transaksi Belum Selesai";
                                            }else {
                                                $color = "color: red";
                                                $ket = "Transaksi Gagal";
                                            }

                                            if($dat['invoice_number'] == null ){
                                                $dat['invoice_number'] = '-';
                                            }

                                            $date = date_create($dat['created_at']);
                                            $date = date_format($date, 'd-m-Y');

                                            if ($dat['total_price'] == 0) {
                                                $dat['total_price'] = 'Free';
                                            } else {
                                                $dat['total_price'] = 'Rp'.number_format($dat['total_price'],0,',','.');
                                            }

                                        @endphp
                                        @php
                                            $service = '';
                                            if($dat['service_code'] == "1084"){
                                                $service = "images/logo/dana.png";
                                            }elseif ($dat['service_code'] == "1083") {
                                                $service = "images/logo/bayarind.png";
                                            }
                                        @endphp
                                        <div class="col-lg-4 item mix S" style="color: white">
                                            <div class="block-style-twentyTwo" style="border-radius:30px; background:linear-gradient(180deg, #D9D9D9 0%, rgba(217, 217, 217, 0) 100%);" id="course" >
                                                <div class="row" style="background-color: #ca2221; border-radius:5px 5px 0 0;margin-top:-40px; display:block; position:relative">
                                                    <div class="icon d-flex align-items-center justify-content-center" >
                                                        <img src="{{ $media.$dat['photo_course'] }}" alt="">
                                                        {{-- <span class="badge badge-success" style="position: absolute; top:15px; left:15px">Free Certificate</span> --}}
                                                    </div>
                                                </div>
                                                <div class="grid-container mt-3" style="display:grid; grid-template-columns:50% 50% ;">
                                                    <div class="grid-item text-left">
                                                        <p>Invoice: {{ $dat['invoice_number'] }}</p>
                                                    </div>
                                                    <div class="grid-item text-right">
                                                        <p>{{ $date }}</p>
                                                    </div>
                                                </div>
                                                @if ($dat['status'] == 2)
                                                <a href="/my-course/syllabus/{{ $dat['id_customer_course'] }}" >
                                                    <h4 style="color: white" id="courseName" name="courseName" >{{ $dat['course_name'] }}</h4>
                                                </a>
                                                @else
                                                <h4 style="color: white" id="courseName" name="courseName" onMouseOver="this.style.color='red'" onMouseOut="this.style.color='white'" style="text-decoration: none">{{ $dat['course_name'] }}</h4>
                                                @endif
                                                {{-- <p>{!! $crs['description'] !!}</p> --}}
                                                {{-- <hr> --}}
                                                <div class="grid-container mt-3" style="display:grid; grid-template-columns: 70% 30% ;">
                                                    <div class="grid-item text-left">
                                                        <strong style="{{ $color }}">{{ $ket }}</strong>
                                                    </div>
                                                    <div class="grid-item text-right">
                                                        <strong style="color: white">{{ $dat['total_price'] }}</strong>
                                                    </div>
                                                </div>
                                                @if ($dat['status'] != 2)
                                                <div class="grid-container mt-3" style="display:grid; grid-template-columns: 70% 30% ;">
                                                    @if ($dat['photo'] == null)
                                                    <div class="grid-item text-left">
                                                        <button type="button" data-toggle="modal" data-target="#modalBukti{{ $dat['id_transaction'] }}" class="openModalBukti btn btn-primary">Unggah Bukti Transfer</button>
                                                    </div>
                                                    @else
                                                    <div class="grid-item text-left">
                                                        <button type="button" data-toggle="modal" data-target="#modalBukti{{ $dat['id_transaction'] }}" class="openModalBukti btn btn-success">Lihat Bukti Transfer</button>
                                                    </div>
                                                    @endif
                                                    <div class="grid-item">
                                                        <img src="{{ asset($service) }}" width="100px" alt="">
                                                    </div>
                                                </div>
                                                <div class="grid-container mt-3" style="display:grid; grid-template-columns: 70% 30%;">
                                                    <div class="grid-item text-left">
                                                        <button type="button" data-toggle="modal" data-target="#modalBUlang{{ $dat['id_transaction'] }}" class="btn btn-success">Bayar Ulang</button>
                                                    </div>
                                                    <div class="grid-item text-center">
                                                    </div>
                                                </div>
                                                @endif
                                            </div>
                                        </div>
                                        {{-- Modal Bukti --}}
                                        <div class="modal" id="modalBukti{{ $dat['id_transaction'] }}" aria-labelledby="exampleModalLabel" >
                                            <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Unggah Bukti Transfer</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                                </div>
                                                <form method="POST" action="/transaction/bukti/{{ $dat['id_transaction'] }}">
                                                @csrf
                                                <div class="modal-body">
                                                        <div class="form-group">
                                                        <h3 id="namaCourse">{{ $dat['course_name'] }}</h3>
                                                        <br>
                                                        <input type="hidden" name="id_transaction" value="{{ $dat['id_transaction'] }}">
                                                        <input type="hidden" name="status" value="{{ $dat['status'] }}">
                                                        <div id="thumbnail{{ $dat['id_transaction'] }}" class="row justify-content-center"></div>
                                                        <img src="{{ $bukti.$dat['photo'] }}" alt="">
                                                        @if ($dat['photo'] == null)
                                                        <label for="photoBukti">Bukti Transfer</label>
                                                        <input type="file" onchange="readUrl{{ $dat['id_transaction'] }}(this)" id="inputBukti_{{ $dat['id_transaction'] }}" class="form-control-file" accept=".png, .jpg, .jpeg, .PNG, .JPG, .JPEG" value="" required>
                                                        @endif
                                                        <input type="hidden" id="photoB_{{ $dat['id_transaction'] }}" name="photoB">
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        @if ($dat['photo'] == null)
                                                        <button type="submit" onclick="displayString()" id="submitBukti" class="btn btn-primary">KIRIM</button>
                                                        @else
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        @endif
                                                    </div>
                                                </form>
                                            </div>

                                            </div>
                                        </div>
                                        {{-- End Modal Bukti --}}

                                        {{-- Modal Bayar Ulang --}}
                                        <div class="modal" id="modalBUlang{{ $dat['id_transaction'] }}" aria-labelledby="exampleModalLabel" >
                                            <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Ulangi Pembayaran</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                                </div>
                                                <form method="POST" action="/transaction/bayar-ulang/{{ $dat['id_transaction'] }}">
                                                @csrf
                                                <div class="modal-body">
                                                        <div class="form-group">
                                                        {{-- <h3 id="namaCourse">{{ $dat['course_name'] }}</h3> --}}
                                                        <br>
                                                        <input type="hidden" name="id_transaction" value="{{ $dat['id_transaction'] }}">
                                                        {{-- <input type="hidden" name="status" value="{{ $dat['status'] }}"> --}}
                                                        <div class="form-group">
                                                            <label for="exampleFormControlSelect1"> <strong>Pilih Metode Pembayaran</strong></label>
                                                            <select class="form-control form-control-lg" name="service_code" style="font-size: 16px">
                                                                <option value="1083">Bayarind</option>
                                                                <option value="1084">Dana</option>
                                                            {{-- <option id="service" value="1077" onclick="paymethods(1077)">LinkAja</option> --}}
                                                            {{-- <option id="service" value="1085" onclick="paymethods(1085)">ShopeePay</option> --}}
                                                            </select>
                                                        </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-primary">Bayar</button>
                                                    </div>
                                                </form>
                                            </div>

                                            </div>
                                        </div>
                                        {{-- End Modal Bayar Ulang --}}

                                        <script type="text/javascript">
                                            // create thumbnail #thumbnail from input file and do encode
                                            function readUrl{{ $dat['id_transaction'] }}(input) {
                                                if (input.files && input.files[0]) {
                                                    var reader = new FileReader();
                                                    reader.onload = function (e) {
                                                        $('#thumbnail{{ $dat['id_transaction'] }}').html('<img src="' + e.target.result + '" alt="">');
                                                        $('#photoB_{{ $dat['id_transaction'] }}').val(e.target.result);
                                                    }
                                                    reader.readAsDataURL(input.files[0]);
                                                }
                                            }
                                        </script>
                            @endforeach

                            @elseif (isset($lpath))
                            @if (count($lpath) == 0)
                                <h4 style="margin: auto; color: white">Tidak ada Data</h4>
                            @endif
                            @foreach($lpath as $lpath)
                                        @php
                                            if($lpath['status'] == 2){
                                                $color = "color: green";
                                                $lket = "Transaksi Berhasil";
                                            }elseif ($lpath['status'] == 1){
                                                $color = "color: orange";
                                                $lket = "Transaksi Belum Selesai";
                                            }else {
                                                $color = "color: red";
                                                $lket = "Transaksi Gagal";
                                            }

                                            $ldate = date_create($lpath['created_at']);
                                            $ldate = date_format($ldate, 'd-m-Y');

                                            if($lpath['total_price'] == 0){
                                                $lprice = "Gratis";
                                            }else{
                                                $lprice = $lpath['total_price'];
                                                // IDR format
                                                $lprice = 'Rp'.number_format($lprice,0,',','.');
                                            }
                                            $media_l = 'https://gate.bisaai.id/bisa_design_prod/learning_path/media/';
                                        @endphp
                                        <div class="col-lg-4 item mix S">
                                            <div class="block-style-twentyTwo" onclick="location.href='/my-learning-path/{{ $lpath['id_customer_learning_path'] }}';" style="background:linear-gradient(180deg, #D9D9D9 0%, rgba(217, 217, 217, 0) 100%); border-radius:30px" id="course" >
                                                <div class="row" style="margin-top:-40px; display:block; position:relative; background-color: #060435; border-radius:30px 30px 0 0; border:1px solid white">
                                                    <div class="icon d-flex align-items-center justify-content-center" >
                                                        <img src="{{ $media_l.$lpath['photo_learning_path'] }}" alt="">
                                                        {{-- <span class="badge badge-success" style="position: absolute; top:15px; left:15px">Free Certificate</span> --}}
                                                    </div>
                                                </div>
                                                <div class="grid-container mt-3" style="display:grid; grid-template-columns:50% 50% ; color:white">
                                                    <div class="grid-item text-left">
                                                        <p>Invoice: {{ $lpath['invoice_number'] }}</p>
                                                    </div>
                                                    <div class="grid-item text-right">
                                                        <p>{{ $ldate }}</p>
                                                    </div>
                                                </div>
                                                <h4 style="color: white">{{ $lpath['learning_path_name'] }}</h4>
                                                {{-- <p>{!! $crs['description'] !!}</p> --}}
                                                {{-- <hr> --}}
                                                <div class="grid-container mt-3" style="display:grid; grid-template-columns: 50% 50% ; color:white">
                                                    <div class="grid-item text-left" style="{{ $color }}">
                                                        {{ $lket }}
                                                    </div>
                                                    <div class="grid-item text-right">
                                                        <strong >{{ $lprice }}</strong>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                            @elseif(isset($certif))


                            @if (count($certif) == 0)
                                <h4 style="margin: auto; color: white">Tidak ada Data</h4>
                            @endif
                            @foreach($certif as $cer)
                                        @php
                                            $color = '';
                                            $ket = '';
                                            if($cer['status'] == 2){
                                                $color = "color: green";
                                                $ket = "Transaksi Berhasil";
                                            }elseif ($cer['status'] == 1){
                                                $color = "color: orange";
                                                $ket = "Transaksi Belum Selesai";
                                            }else {
                                                $color = "color: red";
                                                $ket = "Transaksi Gagal";
                                            }

                                            $date = date_create($cer['created_at']);
                                            $date = date_format($date, 'd-m-Y');

                                            $price = $cer['total_price'];
                                            $price = 'Rp'.number_format($price,0,',','.');
                                        @endphp
                                        <div class="col-lg-4 item mix S">
                                            <div class="block-style-twentyTwo" style="border-radius:30px; background:linear-gradient(180deg, #D9D9D9 0%, rgba(217, 217, 217, 0) 100%)" id="course" >
                                            {{-- <div class="block-style-twentyTwo" onclick="location.href='/course-detail/S';" style="border-radius:30px; background:linear-gradient(180deg, #D9D9D9 0%, rgba(217, 217, 217, 0) 100%)" id="course" > --}}
                                                <div class="row" style="border-radius:5px 5px 0 0;margin-top:-40px; display:block; position:relative">
                                                    <div class="icon d-flex align-items-center justify-content-center" >
                                                        <img src="{{ $media_c.$cer['foto_sertifikasi'] }}" alt="">
                                                    </div>
                                                </div>
                                                <div class="grid-container mt-3" style="display:grid; grid-template-columns:50% 50%; color:white">
                                                    <div class="grid-item text-left">
                                                        <p>Invoice: {{ $cer['invoice_number'] }}</p>
                                                    </div>
                                                    <div class="grid-item text-right">
                                                        <p>{{ $date }}</p>
                                                    </div>
                                                </div>
                                                {{-- <h4 style="color: white">{{ $cer['nama_sertifikasi'] }}</h4> --}}
                                                @if ($cer['status'] == 2)
                                                <a href="/certification/{{ $cer['id_certification'] }}">
                                                    <h4 style="color: white" id="cerName" name="cerName">{{ $cer['nama_sertifikasi'] }}</h4>
                                                </a>
                                                @else
                                                <h4 style="color: white" id="cerName" name="cerName" onMouseOver="this.style.color='red'" onMouseOut="this.style.color='white'" style="text-decoration: none">{{ $cer['nama_sertifikasi'] }}</h4>
                                                @endif
                                                <div class="grid-container mt-3" style="display:grid; grid-template-columns: 50% 50% ;">
                                                    <div class="grid-item text-left">
                                                        <strong style="{{ $color }}">{{ $ket }}</strong>
                                                    </div>
                                                    <div class="grid-item text-right">
                                                        <strong style="color:white">{{ $price }}</strong>
                                                    </div>
                                                </div>
                                                @if ($cer['status'] != 2)
                                                <div class="grid-container mt-3" style="display:grid; grid-template-columns: 70% 30%;">
                                                    <div class="grid-item text-left">
                                                        <button type="button" data-toggle="modal" data-target="#modalBUlangC{{ $cer['id_certification_transaction'] }}" class="btn btn-success">Bayar Ulang</button>
                                                    </div>
                                                    <div class="grid-item text-center">
                                                    </div>
                                                </div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="modal" id="modalBUlangC{{ $cer['id_certification_transaction'] }}" aria-labelledby="exampleModalLabel" >
                                            <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Ulangi Pembayaran</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                                </div>
                                                <form method="POST" action="/transaction/bayar-ulang/sertifikasi/{{ $cer['id_certification_transaction'] }}">
                                                @csrf
                                                <div class="modal-body">
                                                        <div class="form-group">
                                                        <br>
                                                        <input type="hidden" name="id_transaction" value="{{ $cer['id_certification_transaction'] }}">
                                                        <input type="hidden" name="invoice" value="{{ $cer['invoice_number'] }}">
                                                        <div class="form-group">
                                                            <label for="exampleFormControlSelect1"> <strong>Pilih Metode Pembayaran</strong></label>
                                                            <select class="form-control form-control-lg" name="service_code" style="font-size: 16px">
                                                                <option value="1083">Bayarind</option>
                                                                <option value="1084">Dana</option>
                                                            </select>
                                                        </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-primary">Bayar</button>
                                                    </div>
                                                </form>
                                            </div>
                                            </div>
                                        </div>
                            @endforeach
                            @endif
                        </div> <!-- /.mixitUp-container -->

					</div>

				</div>

			</div>
            {{-- bulan certif --}}

@endsection



@section('js_bot')
<script type="text/javascript">

    // var inputBukti = document.getElementById('inputBukti');

    // // encode inputBukti to base64
    // inputBukti.addEventListener('change', function(e) {
    //     var file = e.target.files[0];
    //     var reader = new FileReader();
    //     reader.onload = function(e) {
    //         var contents = e.target.result;
    //         document.getElementById('photoBukti').value = contents;
    //     };
    //     reader.readAsDataURL(file);
    // });

    // var inputBukti = document.getElementById('inputBukti').src;

    // // encode inputBukti to base64
    // inputBukti.addEventListener('change', function(e) {
    //     var file = e.target.files[0];
    //     var reader = new FileReader();
    //     reader.onload = function(e) {
    //         var contents = e.target.result;
    //         document.getElementById('inputBukti').value = contents;
    //     };
    //     reader.readAsDataURL(file);
    // });

</script>

@endsection



