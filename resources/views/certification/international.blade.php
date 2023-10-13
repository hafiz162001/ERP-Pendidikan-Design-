@php
$media = 'https://gate.bisaai.id/bisa_design_prod/certification/media/foto_certification/';
$pmedia = 'https://gate.bisaai.id/bisa_design_prod/certification/media/foto_partner/';
@endphp
{{-- @dd($data) --}}
{{-- @dd($data, $partner) --}}

@extends('layouts.course')

@section('content')
{{-- <img src="{{ $pmedia.$partner[0]['foto'] }}" width="400px" alt=""> --}}
			<!--
			=============================================
				Fancy Hero Six
			==============================================
			-->
			<div class="fancy-hero-six">
				<div class="container">
					<h2 class="heading " style="color: white;"><strong>{{ $title }}</strong></h2>
					<p class="sub-heading" style="color: white">Raih Sertifikasi International dan standard kompetensi international dari vendor teknologi dunia bidang Desain, UI/UX dan Produk. Ikuti Pelatihan Singkat dan Sertifikasi-nya melalui BISA Design Academy.</p>
				</div>

			</div>

			<!--
			=============================================
				Fancy Portfolio Four
			==============================================
			-->
			<div class="fancy-portfolio-four lg-container" style="margin-top: -10px; background-color:#110743">
				<div class="container">
					<div class="pb-130 md-pb-90">
                        <div class="row">
                            <div class="col-md-4 mb-2">
                                <input class="form-control form-control-lg" type="search" id="cari" placeholder="Pencarian" style="height: 70px; border-radius:30px; ">
                            </div>
                            <div class="col-md-4 mb-2">
                                <select class="form-control form-control-lg" id="partner" style="height: 70px; ">
                                    <option value="">Partner</option>
                                    @foreach ($partner as $p)
                                        <option value="{{ $p['id_certification_partner'] }}">{{ $p['nama'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-4 mb-2">
                                <select class="form-control form-control-lg" id="kat" style="height: 70px; ">
                                    <option value="">Kategori</option>
                                    @foreach ($kat as $k)
                                        <option value="{{ $k['id_certification_category'] }}">{{ $k['nama'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>


				        <div class="mixitUp-container gutter-space-two d-flex flex-wrap"  style="margin-top: 50px; min-height:700px" id="content">
							@foreach($data as $dat)
							<div class="col-lg-4 item mix SS">
								{{-- <div class="block-style-twentyTwo" onclick="location.href='/course-detail/{{ Str::slug($dat['name']) }}';" style="border-radius:5px;"> --}}
								<a class="block-style-twentyTwo" href="/certification/detail/{{ $dat['id_certification'] }}" style="border-radius:30px; background:linear-gradient(180deg, #D9D9D9 0%, rgba(217, 217, 217, 0) 100%); display:block; color: inherit">
									<div class="row" style="background-color: white; border-radius:30px 30px 0 0;margin-top:-40px; display:block; position:relative">
										<div class="icon d-flex align-items-center justify-content-center">
                                            <img src="{{ $media.$dat['foto'] }}" alt="">
                                            {{-- <span class="badge badge-success" style="position: absolute; top:15px; left:15px;">Free Certificate</span> --}}
                                        </div>
									</div>
									<div class="grid-container mt-3" style="display:grid; grid-template-columns:20% 20% 45% 15%;">
										<div class="grid-item">
												<i class="fa fa-user" aria-hidden="true" style="color: white; margin-right: 2px"></i>
													<small id="students" style="color: white">{{ $dat['jumah_peserta'] }}</small>
										</div>

									</div>
									<h4 style="color: white">{{ $dat['nama'] }}</h4>
									{{-- <p>{!! $dat['description'] !!}</p> --}}
									{{-- <hr> --}}
                                    <div class="grid-container mt-3" style="display:grid; grid-template-columns: 50% 50% ;">
										<div class="grid-item text-left">
                                            <div class="grid-item text-left">
                                                @if ($dat['jumlah_rating'] == 0)
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                @elseif ($dat['jumlah_rating'] == 1)
                                                <i class="fa-solid fa-star checked-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                @elseif ($dat['jumlah_rating'] == 2)
                                                <i class="fa-solid fa-star checked-star"></i>
                                                <i class="fa-solid fa-star chekced-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                @elseif ($dat['jumlah_rating'] == 3)
                                                <i class="fa-solid fa-star checked-star"></i>
                                                <i class="fa-solid fa-star checked-star"></i>
                                                <i class="fa-solid fa-star checked-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                @elseif ($dat['jumlah_rating'] == 4)
                                                <i class="fa-solid fa-star checked-star"></i>
                                                <i class="fa-solid fa-star checked-star"></i>
                                                <i class="fa-solid fa-star checked-star"></i>
                                                <i class="fa-solid fa-star checked-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                @elseif ($dat['jumlah_rating'] == 5)
                                                <i class="fa-solid fa-star checked-star"></i>
                                                <i class="fa-solid fa-star checked-star"></i>
                                                <i class="fa-solid fa-star checked-star"></i>
                                                <i class="fa-solid fa-star checked-star"></i>
                                                <i class="fa-solid fa-star checked-star"></i>
                                                @endif
                                            </div>

										</div>
										<div class="grid-item text-right">
                                            @php
                                                if($dat['harga'] == 0){
                                                    $price = 'Free';
                                                }else{
                                                    // IDR format
                                                    $price = 'Rp. '.number_format($dat['harga'],0,',','.');
                                                }
                                            @endphp
											<strong style="color: white">{{ $price }}</strong>
										</div>

									</div>

								</a> <!-- /.block-style-twentyTwo -->
							</div>
							@endforeach
				        </div> <!-- /.mixitUp-container -->


					</div>
				</div>
			</div> <!-- /.fancy-portfolio-four -->

@endsection

@section('js_bot')
<script>

$(document).ready(function(){

    $('#cari').keyup(function(){
        showTransaksi();
    });

    $('#partner').change(function(){
        showTransaksi();
    });

    $('#kat').change(function(){
        showTransaksi();
    });

    function showTransaksi(){
        var settings = {
            "url": "https://gate.bisaai.id/bisa_design_prod/certification/get_certification?tipe=1&is_aktif=1",
            "method": "GET",
            "timeout": 0,
            "data": {
                search: $('#cari').val(),
                id_certification_partner: $('#partner').val(),
                id_certification_category: $('#kat').val(),
            }
        };

        $.ajax(settings).done(function (response) {
        //   console.log(response);

          var newContent = '';

          $('#content').html('');

          $.each(response.data, function(i, item) {
            rate = '';
                if (item.jumlah_rating == 0) {
                        rate +=
                        `<i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i> `;
                    }else if(item.jumlah_rating == 1){
                        rate +=
                        `<i class="fa-solid fa-star checked-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i> `;
                    }else if(item.jumlah_rating == 2){
                        rate +=
                        `<i class="fa-solid fa-star checked-star"></i>
                        <i class="fa-solid fa-star checked-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i> `;
                    }else if(item.jumlah_rating == 3){
                        rate +=
                        `<i class="fa-solid fa-star checked-star"></i>
                        <i class="fa-solid fa-star checked-star"></i>
                        <i class="fa-solid fa-star checked-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i> `;
                    }else if(item.jumlah_rating == 4){
                        rate +=
                        `<i class="fa-solid fa-star checked-star"></i>
                        <i class="fa-solid fa-star checked-star"></i>
                        <i class="fa-solid fa-star checked-star"></i>
                        <i class="fa-solid fa-star checked-star"></i>
                        <i class="fa-solid fa-star"></i> `;
                    }else if(item.jumlah_rating == 5){
                        rate +=
                        `<i class="fa-solid fa-star checked-star"></i>
                        <i class="fa-solid fa-star checked-star"></i>
                        <i class="fa-solid fa-star checked-star"></i>
                        <i class="fa-solid fa-star checked-star"></i>
                        <i class="fa-solid fa-star checked-star"></i> `;
                    }
            newContent += `<div class="col-lg-4 item mix SS">
								<a class="block-style-twentyTwo" href="/certification/detail/${item.id_certification}"  style="border-radius:30px; background:linear-gradient(180deg, #D9D9D9 0%, rgba(217, 217, 217, 0) 100%); display:block; color: inherit">
									<div class="row" style="background-color: white; border-radius:30px 30px 0 0;margin-top:-40px; display:block; position:relative">
										<div class="icon d-flex align-items-center justify-content-center">
                                            <img src="https://gate.bisaai.id/bisa_design_prod/certification/media/foto_certification/${item.foto}" alt="">
                                        </div>
									</div>
									<div class="grid-container mt-3" style="display:grid; grid-template-columns:20% 20% 45% 15%;">
										<div class="grid-item">
												<i class="fa fa-user" aria-hidden="true" style="color: white; margin-right: 2px"></i>
													<small id="students" style="color: white">${item.jumah_peserta}</small>
										</div>
									</div>
									<h4 style="color: white">${item.nama}</h4>
                                    <div class="grid-container mt-3" style="display:grid; grid-template-columns: 50% 50% ;">
										<div class="grid-item text-left">
                                            <div class="grid-item text-left">
                                                ${rate}
                                            </div>

										</div>
										<div class="grid-item text-right">
											<strong style="color: white">Rp. ${item.harga}</strong>
										</div>

									</div>

								</a> <!-- /.block-style-twentyTwo -->
							</div>`;

                            $('#content').append(newContent);
                        newContent = '';
          })
        });
    }


});
</script>

@endsection






