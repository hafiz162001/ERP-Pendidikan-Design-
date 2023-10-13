{{-- @dd($course) --}}
{{-- @dd(isset($course['name'])) --}}
{{-- @dd($data) --}}
{{-- @dd($page) --}}
@php
    $media = 'https://gate.bisaai.id/bisa_design_prod/portofolio/media/foto_portofolio/';
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
					<h4 class="heading" style="color: white"><strong>Portfolio</strong></h4>
					<p class="sub-heading" style="color: white">Lihat Portofolio yang dihasilkan peserta pelatihan BISA Design Academy</p>
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
                        {{-- <div class="search-filter-form-2">
                            <form action="/portfolio" method="POST">
                                @csrf
                                <input type="search" placeholder="Search Something" id="search" name="search" value="{{ (isset($search)) ? $search : '' }}">
                                <button type="submit"><img src="{{ asset('images/icon/54.svg') }}"></button>
                                <div class="select d-flex">
                                    <select class="form-control selectform" id="exampleFormControlSelect1" name="page">
                                        <option value="1">Halaman</option>
                                        @foreach ($page as $page)
                                        <option value="{{ $page }}">{{ $page }}</option>
                                        @endforeach
                                    </select>
                                    <select class="form-control selectform" id="sortss" name="sort">
                                      <option value="">Status</option>
                                      <option value="id_desc">Terbaru</option>
                                      <option value="like_desc">Terpopuler</option>
                                    </select>
                                    <select class="form-control selectform" id="katss" name="kat">
                                        <option value="">Kategori</option>
                                        @foreach ($kategori as $kat)
                                        <option value="{{ $kat['id_kategori_portofolio'] }}">{{ $kat['nama_kategori_portofolio'] }} ({{ $kat['jumlah_portofolio'] }})</option>
                                        @endforeach
                                    </select>

                                </div>
                            </form>
                        </div> --}}

                        <div class="row">
                            <div class="col-md-3 mb-2">
                                <input class="form-control form-control-lg" type="search" id="cari" placeholder="Cari Portofolio"  style="height: 70px; border-radius:30px; ">
                            </div>
                            <div class="col-md-3 mb-2">
                                <select class="form-control form-control-lg" id="course" style="height: 70px; ">
                                    <option value="">Semua Course</option>
                                    @foreach ($list_course as $course)
                                    <option value="{{ $course['id_course'] }}">{{ $course['nama_course'] }} ({{ $course['jumlah_portofolio'] }})</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-3 mb-2">
                                <select class="form-control form-control-lg" id="kat" style="height: 70px; ">
                                    <option value="">Kategori</option>
                                    @foreach ($kategori as $kat)
                                    <option value="{{ $kat['id_kategori_portofolio'] }}">{{ $kat['nama_kategori_portofolio'] }} ({{ $kat['jumlah_portofolio'] }})</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-3 mb-2">
                                <select class="form-control form-control-lg" id="sort" style="height: 70px; ">
                                    <option value="id_desc">Terbaru</option>
                                    <option value="like_desc">Terpopuler</option>
                                </select>
                            </div>
                        </div>
				        <div class="mixitUp-container gutter-space-two d-flex flex-wrap justify-content-center" id="content"  style="margin-top: 30px; min-height:400px">
                            @foreach ($data as $dat)
                            @php
                                $id_porto = $dat['id_portofolio'];
                                $id_porto = base64_encode($id_porto);
                                $id_porto = str_replace('=', '', $id_porto);
                            @endphp
							<div class="col-lg-4 item mix SS">
								<a class="block-style-twentyTwo" href="/portofolio/detail/{{ $id_porto }}" style="border-radius:30px; background:linear-gradient(180deg, #D9D9D9 0%, rgba(217, 217, 217, 0) 100%); display:block; color:inherit">
									<div class="row" style="border-radius:5px 5px 0 0;margin-top:-40px; display:block; position:relative">
                                        <img src="{{ $media.$dat['foto_portofolio'] }}" style="border-radius: 20px 20px 0 0" alt="">
									</div>
									<h4 style="color: white; font-weight:700">{{ $dat['nama_portofolio'] }}</h4>
                                    <div class="grid-container mt-3" style="display:grid; grid-template-columns:70% 30%;">
										<div class="grid-item text-left">
													<small id="students" style="color: white; font-weight:700; font-size:20px">{{ $dat['nama_user'] }}</small>
										</div>
  										<div class="grid-item text-right">
                                                <i class="fa-solid fa-heart" aria-hidden="true" style="color: white; margin-right: 2px"></i>
												  <small style="color: white">{{ $dat['jumlah_like'] }}</small>
										</div>
									</div>
								</a> <!-- /.block-style-twentyTwo -->
							</div>
                            @endforeach
				        </div> <!-- /.mixitUp-container -->
                        @if (count($data) == 9)
                        <div class="row mb-4 justify-content-center" >
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
        // $('#cari').change(function(){
        //     showTransaksi();
        // });
        // #cari onkeyup="showTransaksi()"
        $('#cari').keyup(function(){
            // refresh
            page = 1;
            showContent(page);
        });


        $('#sort').change(function(){
            //refresh
            page = 1;
            showContent(page);
        });

        $('#kat').change(function(){
            // refresh
            page = 1;

            showContent(page);
        });

        $('#page').change(function(){
            // refresh
            page = 1;
            showContent(page);
        });

        // next page
        $('#loadmore').click(function(){
            page++;
            // fetch more data
            showContent(page);

            //
        });

        // course
        $('#course').change(function(){
            showContent();
        });

        function showContent(pagenow = 1){
            var settings = {
            "url": "https://gate.bisaai.id/bisa_design_prod/portofolio/get_portofolio_landing?mode=2&limit=9",
            "method": "GET",
            "timeout": 0,
            "data": {
                search: $('#cari').val(),
                page: pagenow,
                id_portofolio: '',
                id_kategori_portofolio: $('#kat').val(),
                id_course: $('#course').val(),
                order_by: $('#sort').val(),
            }
            };

            $.ajax(settings).done(function (response) {

                    var newContent = '';
                    // if( pagenow == 1 ){
                    //     $('#content').html('');
                    // }

                    // $('#content').html('');

                    $.each(response.data, function(i, item) {
                        var id_portos = btoa(item.id_portofolio);
                        var id_portos = id_portos.replace(/=/g, "");

                        newContent += `<div class="col-lg-4 item mix SS">
                                        <a class="block-style-twentyTwo" href="/portofolio/detail/${id_portos}" style="border-radius:30px; background:linear-gradient(180deg, #D9D9D9 0%, rgba(217, 217, 217, 0) 100%); display:block; color:inherit">
                                            <div class="row" style="border-radius:5px 5px 0 0;margin-top:-40px; display:block; position:relative">
                                                <img src="https://gate.bisaai.id/bisa_design_prod/portofolio/media/foto_portofolio/${item.foto_portofolio}" style="border-radius: 20px 20px 0 0" alt="">
                                            </div>
                                            <h4 style="color: white; font-weight:700">${item.nama_portofolio}</h4>
                                            <div class="grid-container mt-3" style="display:grid; grid-template-columns:70% 30%;">
                                                <div class="grid-item text-left">
                                                            <small id="students" style="color: white; font-weight:700; font-size:20px">${item.nama_user}</small>
                                                </div>
                                                <div class="grid-item text-right">
                                                        <i class="fa-solid fa-heart" aria-hidden="true" style="color: white; margin-right: 2px"></i>
                                                        <small style="color: white">${item.jumlah_like}</small>
                                                </div>
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
                    if(response.data.length < 9){
                        $('#loadmore').hide();
                    }else{
                        $('#loadmore').show();
                    }

                    // if data = 0 tidak ada data
                    if(response.data.length == 0){
                        $('#content').html(`<div class="col-md-12 text-center m-auto" >
                                                <h4 style="color:white">Tidak ada data</h4>
                                            </div>`);
                    }

            });


        }
    })
</script>
@endsection




