@php
$url = 'https://gate.bisaai.id/bisa_design_prod/';

$media = 'https://gate.bisaai.id/bisa_design_prod/course/media/';

@endphp

@extends('layouts.course')
@section('styles')
<style>
    .block-style-twentyTwo:hover .testimoni strong{
        white-space: normal;
        overflow: visible;
    }
</style>
@endsection
@section('content')
			<!--
			=============================================
				Fancy Hero Six
			==============================================
			-->
			<div class="fancy-hero-six">
				<div class="container">
					<h2 class="heading " style="color: white;"><strong>{{ $title }}</strong></h2>

				</div>

			</div> <!-- /.fancy-hero-six -->

			<!--
			=============================================
				Fancy Portfolio Four
			==============================================
			-->
			<div class="fancy-portfolio-four lg-container content" style="margin-top: -10px; background-color:#110743">
				<div class="container">
					<div class="bottom-border pb-130 md-pb-90" style="border: none">
                        <div class="row">
                            <div class="col-md-4 mb-2">
                                <input class="form-control form-control-lg" type="search" id="cari" placeholder="Pencarian" style="height: 70px; border-radius:30px; ">
                            </div>
                            <div class="col-md-4 mb-2">
                                <select class="form-control form-control-lg" id="rating" style="height: 70px; ">
                                    <option value="">Semua Rating</option>
                                    <option value="5">Bintang 5</option>
                                    <option value="4">Bintang 4</option>
                                    <option value="3">Bintang 3</option>
                                    <option value="2">Bintang 2</option>
                                    <option value="1">Bintang 1</option>
                                </select>
                            </div>
                            <div class="col-md-4 mb-2">
                                <select class="form-control form-control-lg" id="waktu" style="height: 70px; ">
                                    <option value="waktu_desc">Terbaru</option>
                                    <option value="waktu_asc">Terlama</option>
                                </select>
                            </div>
                        </div>

				        <div class="mixitUp-container gutter-space-two d-flex flex-wrap justify-content-center" style="margin-top: 50px; min-height:600px" id="content" >
							@foreach($testi as $testi)
                                    <div class="col-md-4 item mix SS" style="margin: 0 0 33px 0">
                                        <div class="block-style-twentyTwo" style="border-radius:30px; background: linear-gradient(90deg, rgba(197, 75, 189, 0.47) -69.94%, rgba(67, 56, 200, 0) 245.71%);" id="course" >
                                            <div class="row" style="border-radius:30px 30px 0 0;margin-top:-40px; display:block; position:relative; background-color: #ca2221">

                                            </div>
                                            <div class="grid-container" style="display:grid; grid-template-columns: 100% ; padding:8px 0">
                                                <div class="grid-item text-left testimoni" id="testimoni" style=" white-space: nowrap;overflow: hidden; text-overflow: ellipsis;">
                                                    <strong style="color: white; font-weight:700;">{{ $testi['testimonial'] }}</strong>
                                                </div>
                                            </div>
                                            <div class="grid-container mt-3" style="display:grid; grid-template-columns: 55% 5% 40% ; padding:8px 0 0 0">
                                                <div class="grid-item text-left">
                                                    <p style="color: white">{{ $testi['nama_user'] }}</p>
                                                </div>
                                                <div class="grid-tem"></div>
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
                                            <div class="grid-container mt-3" style="display:grid; grid-template-columns: 95% 5%; padding:0px 0 0 0">
                                                <div class="grid-item text-left">
                                                    <small style="color: white">{{ $testi['waktu_input'] }}</small>
                                                </div>
                                                <div class="grid-tem"></div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
				        </div> <!-- /.mixitUp-container -->
                        <div class="row justify-content-center mt-4" >
                            <button class="theme-btn-fourteen mx-auto" id="loadmore"> Loadmore </button>
                        </div>
                        @if (count($testi) == 10)
                        @endif
					</div>
				</div>
			</div> <!-- /.fancy-portfolio-four -->


@endsection


@section('js_bot')
<script>

$(document).ready(function(){
    var page = 1;
    var no = 1;

    $('#cari').keyup(function(){
        page = 1;
        showTransaksi(page);
    });

    $('#rating').change(function(){
        page = 1;
        showTransaksi(page);
    });

    $('#waktu').change(function(){
        page = 1;
        showTransaksi(page);
    });

    $('#loadmore').click(function(){
        page++;
        showTransaksi(page);
    });

    function showTransaksi(pagenow = 1){
        var settings = {
          "url": "https://gate.bisaai.id/bisa_design_prod/academy/get_customer_testimoni_and_rating_landing",
          "method": "GET",
          "timeout": 0,
          "headers": {
            "Content-Type": "application/json"
          },
          "data": {
            search: $('#cari').val(),
            rating: $('#rating').val(),
            order_by: $('#waktu').val(),
            page: pagenow,
          }
        };

        $.ajax(settings).done(function (response) {
        //   console.log(response);

          var newContent = '';

        //   $('#content').html('');

          $.each(response.data, function(i, item) {
                rate = '';
                if (item.rating == 0) {
                        rate +=
                        `<i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i> `;
                    }else if(item.rating == 1){
                        rate +=
                        `<i class="fa-solid fa-star checked-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i> `;
                    }else if(item.rating == 2){
                        rate +=
                        `<i class="fa-solid fa-star checked-star"></i>
                        <i class="fa-solid fa-star checked-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i> `;
                    }else if(item.rating == 3){
                        rate +=
                        `<i class="fa-solid fa-star checked-star"></i>
                        <i class="fa-solid fa-star checked-star"></i>
                        <i class="fa-solid fa-star checked-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i> `;
                    }else if(item.rating == 4){
                        rate +=
                        `<i class="fa-solid fa-star checked-star"></i>
                        <i class="fa-solid fa-star checked-star"></i>
                        <i class="fa-solid fa-star checked-star"></i>
                        <i class="fa-solid fa-star checked-star"></i>
                        <i class="fa-solid fa-star"></i> `;
                    }else if(item.rating == 5){
                        rate +=
                        `<i class="fa-solid fa-star checked-star"></i>
                        <i class="fa-solid fa-star checked-star"></i>
                        <i class="fa-solid fa-star checked-star"></i>
                        <i class="fa-solid fa-star checked-star"></i>
                        <i class="fa-solid fa-star checked-star"></i> `;
                    }
                newContent += `<div class="col-md-4 item mix SS" style="margin: 0 0 33px 0">
                                        <div class="block-style-twentyTwo" style="border-radius:30px; background: linear-gradient(90deg, rgba(197, 75, 189, 0.47) -69.94%, rgba(67, 56, 200, 0) 245.71%);" id="course" >
                                            <div class="row" style="border-radius:30px 30px 0 0;margin-top:-40px; display:block; position:relative; background-color: #ca2221">

                                            </div>
                                            <div class="grid-container" style="display:grid; grid-template-columns: 100% ; padding:8px 0">
                                                <div class="grid-item text-left testimoni" id="testimoni" style=" white-space: nowrap;overflow: hidden; text-overflow: ellipsis;">
                                                    <strong style="color: white; font-weight:700;">${item.testimonial}</strong>
                                                </div>
                                            </div>
                                            <div class="grid-container mt-3" style="display:grid; grid-template-columns: 55% 5% 40% ; padding:8px 0 0 0">
                                                <div class="grid-item text-left">
                                                    <p style="color: white">${item.nama_user}</p>
                                                </div>
                                                <div class="grid-tem"></div>
                                                <div class="grid-item text-right">
                                                    ${rate}
                                                </div>
                                            </div>
                                            <div class="grid-container mt-3" style="display:grid; grid-template-columns: 95% 5%; padding:0px 0 0 0">
                                                <div class="grid-item text-left">
                                                    <small style="color: white">${item.waktu_input}</small>
                                                </div>
                                                <div class="grid-tem"></div>
                                            </div>
                                        </div>
                                    </div>`;

                            no++;
            });
                    if(pagenow == 1){
                        $('#content').html(newContent);
                    }else{
                        $('#content').append(newContent);
                    }

                    // hide loadmore button if no more data
                    if(response.data.length < 10){
                        $('#loadmore').hide();
                    }else{
                        $('#loadmore').show();
                    }
        });
    }


});


</script>

@endsection






