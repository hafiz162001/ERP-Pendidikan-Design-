{{-- @dd($course) --}}
{{-- @dd(isset($course['name'])) --}}
@php
$url = 'https://gate.bisaai.id/bisa_design_prod/';
$media = $url.'course/media/';
@endphp

@extends('layouts.course')

@section('content')

			<!--
			=============================================
				Fancy Hero Six
			==============================================
			-->
			<div class="fancy-hero-six" >
				<div class="container">
					<h4 class="heading" style="color: white">{{ $title }}</h4>
					<p class="sub-heading" style="color: white">Program unggulan BISA DESIGN Academy selama 1 bulan penuh belajar terkait topik menarik, dipandu oleh instruktur berpengalaman, modul belajar yang lengkap dan on job training di BISA DESIGN Academy</p>
				</div>

			</div> <!-- /.fancy-hero-six -->

			<!--
			=============================================
				Fancy Portfolio Four
			==============================================
			-->
			<div class="fancy-portfolio-four lg-container" style="margin-top: -10px; background-color:#110743">
				<div class="container">
					<div class="pb-130 md-pb-90">
                        <div class="search-filter-form">
                            {{-- <form action="/belajar-online" method="POST"> --}}
                            <form>
                                {{-- @csrf --}}
                                <input type="search" placeholder="Search Something" id="search" name="search" value="{{ (isset($search)) ? $search : '' }}" onkeydown="return event.key != 'Enter';">
                                {{-- <button type="submit"><img src="{{ asset('images/icon/54.svg') }}"></button> --}}
                                <select class="form-control" id="sort" name="sort">
                                  <option value="">Terbaru</option>
                                  <option value="desc">Terpopuler</option>
                                </select>
                            </form>
                        </div>

				        <div class="mixitUp-container gutter-space-two d-flex flex-wrap"  style="margin-top: 50px; " id="content">
							@foreach($course as $crs)
                            @php
                                $id_course = $crs['id_course'];
                                $id_course = base64_encode($id_course);
                                $id_course = str_replace('=', '', $id_course);
                            @endphp
							<div class="col-lg-4 item mix {{ $crs['arranged_by'] }}">
								{{-- <div class="block-style-twentyTwo" onclick="location.href='/course-detail/{{ Str::slug($crs['name']) }}';" style="border-radius:5px;"> --}}
								<a class="block-style-twentyTwo" href="/course/detail/{{ $id_course }}/5" style="border-radius:30px; background:linear-gradient(180deg, #D9D9D9 0%, rgba(217, 217, 217, 0) 100%); display:block; color: inherit">
									<div class="row" style="background-color: #ca2221; border-radius:30px 30px 0 0;margin-top:-40px; display:block; position:relative">
										<div class="icon d-flex align-items-center justify-content-center">
                                            <img src="{{ $media.$crs['photo'] }}" alt="">
                                            {{-- <span class="badge badge-success" style="position: absolute; top:15px; left:15px;">Free Certificate</span> --}}
                                        </div>
									</div>
									<div class="grid-container mt-3" style="display:grid; grid-template-columns:20% 20% 45% 15%;">
										<div class="grid-item">
												<i class="fa fa-user" aria-hidden="true" style="color: white; margin-right: 2px"></i>
													<small id="students" style="color: white">{{ $crs['number_of_students'] }}</small>
										</div>
  										<div class="grid-item">
                                                <i class="fa-solid fa-book" aria-hidden="true" style="color: white; margin-right: 2px"></i>
												  <small style="color: white">{{ $crs['number_of_syllabus'] }}</small>
										</div>
                                        <div class="grid-item"></div>
										<div class="grid-item text-right">
												<i class="fa fa-certificate" aria-hidden="true" style="color: white; margin-right: 2px"></i>
													<small style="color: white">{{ $crs['point'] }}</small>
										</div>
									</div>
									<h4 style="color: white">{{ $crs['name'] }}</h4>
									{{-- <p>{!! $crs['description'] !!}</p> --}}
									{{-- <hr> --}}
                                    <div class="grid-container mt-3" style="display:grid; grid-template-columns: 50% 50% ;">
										<div class="grid-item text-left">
                                            <div class="grid-item text-left">
                                                @if ($crs['rating'] == 0)
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                @elseif ($crs['rating'] == 1)
                                                <i class="fa-solid fa-star checked-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                @elseif ($crs['rating'] == 2)
                                                <i class="fa-solid fa-star checked-star"></i>
                                                <i class="fa-solid fa-star chekced-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                @elseif ($crs['rating'] == 3)
                                                <i class="fa-solid fa-star checked-star"></i>
                                                <i class="fa-solid fa-star checked-star"></i>
                                                <i class="fa-solid fa-star checked-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                @elseif ($crs['rating'] == 4)
                                                <i class="fa-solid fa-star checked-star"></i>
                                                <i class="fa-solid fa-star checked-star"></i>
                                                <i class="fa-solid fa-star checked-star"></i>
                                                <i class="fa-solid fa-star checked-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                @elseif ($crs['rating'] == 5)
                                                <i class="fa-solid fa-star checked-star"></i>
                                                <i class="fa-solid fa-star checked-star"></i>
                                                <i class="fa-solid fa-star checked-star"></i>
                                                <i class="fa-solid fa-star checked-star"></i>
                                                <i class="fa-solid fa-star checked-star"></i>
                                                @endif
                                            </div>

										</div>
										<div class="grid-item text-right">
                                            {{-- @php
                                                if($crs['price'] == 0){
                                                    $price = 'Free';
                                                }else{
                                                    IDR format
                                                    $price = 'Rp. '.number_format($crs['price'],0,',','.');
                                                }
                                            @endphp --}}
											<strong style="color: white">Rp. {{ $crs['price'] }}</strong>
										</div>

									</div>

								</a> <!-- /.block-style-twentyTwo -->
							</div>
							@endforeach
				        </div> <!-- /.mixitUp-container -->
                        @if (count($course) == 10)
                        <div class="row justify-content-center mt-4" >
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
    var page = 1;
    var no = 1;

    $('#search').keyup(function(){
        page = 1;
        showTransaksi(page);
    });

    $('#sort').change(function(){
        page = 1;
        showTransaksi(page);
    });

    $('#loadmore').click(function(){
        page++;
        showTransaksi(page);
    });

    function showTransaksi(pagenow = 1){
        var settings = {
          "url": "https://gate.bisaai.id/bisa_design_prod/course/get_course?is_ojt=1&is_aktif=1",
          "method": "GET",
          "timeout": 0,
          "headers": {
            "Content-Type": "application/json"
          },
          "data": {
            q: $('#search').val(),
            order_by_number_of_student: $('#sort').val(),
            page: pagenow,
          }
        };

        $.ajax(settings).done(function (response) {
        //   console.log(response);

          var newContent = '';

        //   $('#content').html('');

          $.each(response.data, function(i, item) {
            var id_course = btoa(item.id_course);
            var id_course = id_course.replace(/=/g, "");

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
            newContent += `<div class="col-md-4 item mix SS">
								<a class="block-style-twentyTwo" href="/course/detail/${id_course}/5" style="border-radius:30px; background:linear-gradient(180deg, #D9D9D9 0%, rgba(217, 217, 217, 0) 100%); display:block; color: inherit" id="course" >
									<div class="row" style="border-radius:30px 30px 0 0;margin-top:-40px; display:block; position:relative; background-color: #ca2221">
										<div class="icon d-flex align-items-center justify-content-center" >
                                            <img src="https://gate.bisaai.id/bisa_design_prod/course/media/${item.photo}" alt="">
                                            {{-- <span class="badge badge-success" style="position: absolute; top:15px; left:15px;">Free Certificate</span> --}}
                                        </div>
									</div>
									<div class="grid-container mt-3" style="display:grid; grid-template-columns:20% 20% 45% 15%;">
										<div class="grid-item">
												<i class="fa fa-user" aria-hidden="true" style="color: white; margin-right: 2px"></i>
													<small id="students" style="color: white">${item.number_of_students}</small>
										</div>
  										<div class="grid-item">
                                                <i class="fa-solid fa-book" aria-hidden="true" style="color: white; margin-right: 2px"></i>
												  <small style="color: white">${item.number_of_syllabus}</small>
										</div>
                                        <div class="grid-item"></div>
										<div class="grid-item text-right">
												<i class="fa fa-certificate" aria-hidden="true" style="color: white; margin-right: 2px"></i>
													<small style="color: white">${item.point}</small>
										</div>
									</div>
									<h4 style="color: white">${item.name}</h4>
                                    <div class="grid-container mt-3" style="display:grid; grid-template-columns: 50% 50% ;">
										<div class="grid-item text-left">
                                            ${rate}
										</div>
										<div class="grid-item text-right">
											<strong style="color: white">Rp. ${item.price}</strong>
										</div>
									</div>
								</a>
							</div>`;
                            no++;

                        //     $('#content').append(newContent);
                        // newContent = '';
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




