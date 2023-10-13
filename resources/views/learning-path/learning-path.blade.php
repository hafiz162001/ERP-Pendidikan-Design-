{{-- @dd($data) --}}
@php
$media = 'https://gate.bisaai.id/bisa_design_prod/learning_path/media/';
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
					<h2 class="heading font-gordita" style="color: white;"><strong>Learning Path</strong></h2>
					<p class="sub-heading" style="color: white">Membantu menemukan pola dan path belajar terbaik bidang Desain, UI/UX dan Game</p>
				</div>
			</div> <!-- /.fancy-hero-six -->

			<!--
			=============================================
				Fancy Portfolio Four
			==============================================
			-->
			<div class="fancy-portfolio-four lg-container" style="margin-top: -10px; background:#110743; min-height:900px">
				<div class="container">
					<div class="bottom-border pb-130 md-pb-90" style="border: none">
                        <div class="search-filter-form">
                            <form>
                                <input type="search" placeholder="Search Something" id="search" name="search" value="{{ (isset($search)) ? $search : '' }}">
                                {{-- <button type="submit"><img src="images/icon/54.svg"></button> --}}
                                <select class="form-control" id="sort" name="sort">
                                  <option value="">Status</option>
                                  <option value="desc">Terbaru</option>
                                </select>
                            </form>
                        </div>



				        <div class="mixitUp-container gutter-space-two d-flex flex-wrap" id="content"  style="margin-top: 50px">
                            @foreach ($data as $dat)
                            @php
                                $id_lp = $dat['id_learning_path'];
                                $id_lp = base64_encode($id_lp);
                                $id_lp = str_replace('=', '', $id_lp);
                            @endphp
							<div class="col-md-4 item mix SS">
								<a class="block-style-twentyTwo" href="/learningpath/detail/{{ $id_lp }}" style="border-radius:30px; background:linear-gradient(180deg, #D9D9D9 0%, rgba(217, 217, 217, 0) 100%); display:block; color: inherit" id="course" >
									<div class="row" style="border-radius:30px 30px 0 0;margin-top:-40px; display:block; position:relative; background-color: #060435; border:0.5px solid white">
										<div class="icon d-flex align-items-center justify-content-center" >
                                            <img src="{{ $media.$dat['photo'] }}" alt="">
                                        </div>
									</div>
									<div class="grid-container mt-3" style="display:grid; grid-template-columns:20% 20% 45% 15%;">
                                        <div class="grid-item text-left">
                                            <i class="fa-solid fa-chalkboard-user" aria-hidden="true" style="color: white; margin-right: 2px"></i>
                                            <small style="color: white">{{ $dat['course_count'] }}</small>
										</div>
                                        <div class="grid-item">
                                                <i class="fa fa-book" aria-hidden="true" style="color: white; margin-right: 2px"></i>
                                                    <small id="students" style="color: white">{{ $dat['syllabus_count'] }}</small>
                                        </div>
                                        <div class="grid-item"></div>
										<div class="grid-item text-right">
                                            <i class="fa fa-certificate" aria-hidden="true" style="color: white; margin-right: 2px"></i>
                                            <small style="color: white">{{ $dat['point'] }}</small>
										</div>
									</div>
									<h4 style="color: white">{{ $dat['name'] }}</h4>
                                    <div class="grid-container mt-3" style="display:grid; grid-template-columns: 50% 50% ;">
										<div class="grid-item text-left">
                                            @if ($dat['rating'] == 0 || $dat['rating'] == null)
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            @elseif ($dat['rating'] == 1)
                                            <i class="fa-solid fa-star checked-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            @elseif ($dat['rating'] == 2)
                                            <i class="fa-solid fa-star checked-star"></i>
                                            <i class="fa-solid fa-star chekced-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            @elseif ($dat['rating'] == 3)
                                            <i class="fa-solid fa-star checked-star"></i>
                                            <i class="fa-solid fa-star checked-star"></i>
                                            <i class="fa-solid fa-star checked-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            @elseif ($dat['rating'] == 4)
                                            <i class="fa-solid fa-star checked-star"></i>
                                            <i class="fa-solid fa-star checked-star"></i>
                                            <i class="fa-solid fa-star checked-star"></i>
                                            <i class="fa-solid fa-star checked-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            @elseif ($dat['rating'] == 5)
                                            <i class="fa-solid fa-star checked-star"></i>
                                            <i class="fa-solid fa-star checked-star"></i>
                                            <i class="fa-solid fa-star checked-star"></i>
                                            <i class="fa-solid fa-star checked-star"></i>
                                            <i class="fa-solid fa-star checked-star"></i>
                                            @endif
										</div>
                                        @php
                                            if ($dat['price'] == 0) {
                                                $price = "Free";
                                            } else {
                                                $price = $dat['price'];
                                                // IDR format
                                                $price = number_format($price, 0, ',', '.');
                                            }
                                        @endphp
										<div class="grid-item text-right">
											<strong style="color: white">{{ $price }}</strong>
										</div>
									</div>
								</a>
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

    $('#search').keyup(function(){
        showTransaksi();
    });

    $('#sort').change(function(){
        showTransaksi();
    });

    function showTransaksi(){
        var settings = {
            "url": "https://gate.bisaai.id/bisa_design_prod/learning_path/get_learning_path?is_aktif=1",
            "method": "GET",
            "timeout": 0,
            "headers": {
                "Content-Type": "application/json"
            },
          "data": {
            q: $('#search').val(),
            order_by_id: $('#sort').val(),
          }
        };

        $.ajax(settings).done(function (response) {
        //   console.log(response);

          var newContent = '';

          $('#content').html('');

          $.each(response.data, function(i, item) {
            if(item.price) {
                var price = item.price;
                // IDR format
                price = number_format(price, 0, ',', '.');
            } else {
                var price = 'Free';
            }
            rate = '';
                if (item.rating == 0 || item.rating == null) {
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
								<a class="block-style-twentyTwo" href="/learning-path/{{ $dat['id_learning_path'] }}" style="border-radius:30px; background:linear-gradient(180deg, #D9D9D9 0%, rgba(217, 217, 217, 0) 100%); display:block; color: inherit" id="course" >
									<div class="row" style="border-radius:30px 30px 0 0;margin-top:-40px; display:block; position:relative; background-color: #060435; border:0.5px solid white">
										<div class="icon d-flex align-items-center justify-content-center" >
                                            <img src="https://gate.bisaai.id/bisa_design_prod/learning_path/media/${item.photo}" alt="">
                                        </div>
									</div>
									<div class="grid-container mt-3" style="display:grid; grid-template-columns:20% 20% 45% 15%;">
                                        <div class="grid-item text-left">
                                            <i class="fa-solid fa-chalkboard-user" aria-hidden="true" style="color: white; margin-right: 2px"></i>
                                            <small style="color: white">${item.course_count}</small>
										</div>
                                        <div class="grid-item">
                                                <i class="fa fa-book" aria-hidden="true" style="color: white; margin-right: 2px"></i>
                                                    <small id="students" style="color: white">${item.syllabus_count}</small>
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
                                        @php
                                            if ($dat['price'] == 0) {
                                                $price = "Free";
                                            } else {
                                                $price = $dat['price'];
                                                // IDR format
                                                $price = number_format($price, 0, ',', '.');
                                            }
                                        @endphp
										<div class="grid-item text-right">
											<strong style="color: white">${price}</strong>
										</div>
									</div>
								</a>
							</div>`;

                            $('#content').append(newContent);
                        newContent = '';
          })
        });
    }


});
</script>

@endsection




