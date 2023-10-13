{{-- @dd($course) --}}
{{-- @dd($course[0]['id_course']) --}}
{{-- @dd(isset($course['name'])) --}}
{{-- @dd(count($data) ) --}}
{{-- @dd($data) --}}
@php
$url = 'https://gate.bisaai.id/bisa_design_prod/';

$media = 'https://gate.bisaai.id/bisa_design_prod/course/media/';

$count = count($data);
// get base url
$base_url = url('/');
@endphp

@extends('layouts.course')

@section('content')
			<!--
			=============================================
				Fancy Hero Six
			==============================================
			-->
			<div class="fancy-hero-six">
				<div class="container">
					<h2 class="heading " style="color: white;"><strong>{{ $title }}</strong></h2>
					{{-- <p class="sub-heading" style="color: white">Tersedia +50 Course <strong> GRATIS </strong> yang dapat kamu ikuti untuk belajar berbagai topik.<br>Dapatkan Sertifikat setelah menyelesaikan Quiz dan Tugas-nya</p> --}}
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
                        <div class="search-filter-form">
                            <form>
                                <input type="text" placeholder="Search Something" id="search" name="search" value="{{ (isset($search)) ? $search : '' }}" onkeydown="return event.key != 'Enter';">
                                {{-- <button class="disabled" type="submit"><img src="{{ asset('images/icon/54.svg') }}"></button> --}}

                            </form>
                        </div>
                        <input type="hidden" id="token" value="{{ $token }}">
				        <div class="mixitUp-container gutter-space-two d-flex flex-wrap justify-content-center" style="margin-top: 50px; min-height:400px" id="content" >
                            @if (count($data) == 0 || $data == null)
                            <h4 style="margin: auto; color: white">Tidak ada Data</h4>

                            @endif
							@foreach($data as $data)
                            @php
                                    $id_course = $data['id_course'];
                                    $id_customer = $data['id_customer_course'];
                                    $foto = $data['foto_sertifikat'];
                                    $foto_sertif = "https://gate.bisaai.id/bisa_design_prod/master_sertifikat/media/course/$id_course/$foto";
                            @endphp
							<div class="col-lg-4 item mix SS">
                                <input id="url_sertif{{ $id_customer }}" type="hidden" value="{{ $foto_sertif }}">
                                <input id="name_sertif{{ $id_customer }}" type="hidden" value="{{ $foto }}">
                                <a href="/my-course/syllabus/{{ $data['id_customer_course'] }}">
                                    <div class="block-style-twentyTwo" style="border-radius:30px; background:linear-gradient(180deg, #D9D9D9 0%, rgba(217, 217, 217, 0) 100%);" id="course" >
                                        <div class="row" style="border-radius:30px 30px 0 0;margin-top:-40px; display:block; position:relative; background-color: #ca2221">
                                            <img src="{{ $foto_sertif }}" alt="">
                                        </div>
                                        <h4 style="color: white">{{ $data['course_name'] }}</h4>
                                    </div>
                                </a>
							</div>

							@endforeach
				        </div> <!-- /.mixitUp-container -->

                        @if ($count == 10)
                        <div class="row justify-content-center mt-4">
                            <button class="theme-btn-fourteen mx-auto" id="loadmore"> Loadmore </button>
                        </div>
                        @else
                        <div class="row justify-content-center mt-4" style="display: none">
                            <button class="theme-btn-fourteen mx-auto" id="loadmore"> Loadmore </button>
                        </div>
                        @endif
					</div>
				</div>
			</div> <!-- /.fancy-portfolio-four -->

@endsection


@section('js_bot')
<script>
$(document).ready(function(){
    var token = $('#token').val();
    var token = "JWT " + token;
    // console.log(token);
    var page = 1;
    var no = 1;

    $('#search').keyup(function(){
        page = 1;
        showTransaksi(page);
    });

    $('#loadmore').click(function(){
        page++;
        showTransaksi(page);
    });

    function showTransaksi(pagenow = 1){
        var settings = {
          "url": "https://gate.bisaai.id/bisa_design_prod/academy/get_my_sertifikat?status=2",
          "method": "GET",
          "timeout": 0,
          "headers": {
            "Content-Type": "application/json",
            "Authorization": token
          },
          "data": {
            q: $('#search').val(),
            page: pagenow,
          }
        };

        $.ajax(settings).done(function (response) {
        //   console.log(response);

          var newContent = '';

        //   $('#content').html('');

          $.each(response.data, function(i, item) {
                var id_course = item.id_course;
                var id_customer = item.id_customer_course;
                var foto = item.foto_sertifikat;
                var foto_sertif =  `https://gate.bisaai.id/bisa_design_prod/master_sertifikat/media/course/${id_course}/${foto}`;
                // blob foto_sertif
                var url = `https://gate.bisaai.id/bisa_design_prod/master_sertifikat/media/course/${id_course}/${foto}`;

                newContent += `<div class="col-lg-4 item mix SS">
                                <a href="my-course/syllabus/${id_customer}">
                                    <div class="block-style-twentyTwo" style="border-radius:30px; background:linear-gradient(180deg, #D9D9D9 0%, rgba(217, 217, 217, 0) 100%);" id="course" >
                                        <div class="row" style="border-radius:30px 30px 0 0;margin-top:-40px; display:block; position:relative; background-color: #ca2221">
                                            <img src="${foto_sertif}" alt="">
                                        </div>
                                        <h4 style="color: white">${item.course_name}</h4>
                                    </div>
                                </a>
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

$(document).on("keydown", "form", function(event) {
    return event.key != "Enter";
});
</script>

@endsection






