{{-- @dd($data) --}}
@php
$media = 'https://gate.bisaai.id/bisa_design_prod/certification/media/foto_certification/';
$pmedia = 'https://gate.bisaai.id/bisa_design_prod/certification/media/foto_partner/';
@endphp
{{-- @dd($data) --}}
{{-- @dd($lpath) --}}

@extends('layouts.course')

@section('content')
			<!--
			=============================================
				Fancy Hero Six
			==============================================
			-->
			<div class="fancy-hero-six">
				<div class="container">
					<h4 class="heading font-gordita" style="color: white">{{ $title }}</h4>
					{{-- <p class="sub-heading">Tersedia +50 Course <strong> GRATIS </strong> yang dapat kamu ikuti untuk belajar berbagai topik.<br>Dapatkan Sertifikat setelah menyelesaikan Quiz dan Tugas-nya</p> --}}
				</div>

			</div> <!-- /.fancy-hero-six -->

			<!--
			=============================================
				Fancy Portfolio Four
			==============================================
			-->
			<div class="fancy-portfolio-four lg-container" style="margin-top: 10px; background-color:#110743">
				<div class="container">
					<div class="pb-130 md-pb-90">
						<div class="search-filter-form">
                            <form>
                                @csrf
                                <input type="search" placeholder="Search Something" id="search" name="search" value="{{ (isset($search)) ? $search : '' }}" onkeydown="return event.key != 'Enter';">
                                {{-- <button type="submit"><img src="{{ asset('images/icon/54.svg') }}"></button> --}}
                                <select class="form-control" id="exampleFormControlSelect1" name="sort">
                                  <option value="1">Halaman</option>
                                </select>
                            </form>
                        </div>
						{{-- <div class="controls po-control-one text-center mb-90 md-mb-50 mt-40 md-mt-60" >
				            <button type="button" class="control" data-filter="all">All</button>
				            <button type="button" class="control" data-filter=".free">Free</button>
				            <button type="button" class="control" data-filter=".premium">Premium</button>
				            <button type="button" class="control" data-filter=".ojt">Premium + OJT</button>
				        </div> --}}

				        <div class="mixitUp-container gutter-space-two d-flex flex-wrap" style="margin-top: 60px; min-height:400px" >
                            @if (count($data) == 0)
                                <h4 style="margin: auto; color: white">Tidak ada Data</h4>
                            @endif
                            @foreach ($data as $dat)
                            <div class="col-md-4 item mix">
								{{-- <div class="block-style-twentyTwo" style="border-radius:20px; background:linear-gradient(180deg, #D9D9D9 0%, rgba(217, 217, 217, 0) 100%);"> --}}
								<div class="block-style-twentyTwo" onclick="location.href='/certification/{{ $dat['id_certification'] }}';" style="border-radius:20px; background:linear-gradient(180deg, #D9D9D9 0%, rgba(217, 217, 217, 0) 100%);">
									<div class="row" style="border-radius:20px 20px 0 0;margin-top:-40px; display:block; position:relative; background:linear-gradient(180deg, #D9D9D9 0%, rgba(217, 217, 217, 0) 100%);">
										<div class="icon d-flex align-items-center justify-content-center" >
                                            <img src="{{ $media.$dat['foto_sertifikasi'] }}" alt="">
                                            {{-- <span class="badge badge-success" style="position: absolute; top:15px; left:15px;">Free Certificate</span> --}}
                                        </div>
									</div>
									{{-- <div class="grid-container mt-3" style="display:grid; grid-template-columns:20% 20% 45% 15%; color:white">
										<div class="grid-item">
												<i class="fa-solid fa-chalkboard-user" aria-hidden="true"></i>
												<small>{{ $lpath['number_of_course'] }}</small>
										</div>
  										<div class="grid-item">
                                              <i class="fa-solid fa-book" aria-hidden="true" style="margin-right: 1px"></i>
                                                <small>{{ $lpath['syllabus_count'] }}</small>
										</div>
                                        <div class="grid-item"></div>
										<div class="grid-item text-right">
                                            <i class="fa fa-certificate" aria-hidden="true" ></i>
                                                <small>{{ $lpath['point'] }}</small>
										</div>

									</div> --}}
                                    {{-- <img src="{{ $pmedia.$dat['foto_partner'] }}" height="80px" alt=""> --}}
									<h4 style="color: white; font-weight:700">{{ $dat['nama_sertifikasi'] }}</h4>
									{{-- <p>{{ $dat['description_course'] }}</p> --}}
									{{-- <p>{!! $dat['description_course'] !!}</p> --}}
                                    <div class="grid-container mt-3" style="display:grid; grid-template-columns: 70% 30% ; color:white">
										<div class="grid-item text-left">
                                            <p>Nilai: {{ $dat['nilai_akhir'] }}</p>
										</div>
										<div class="grid-item justify-content-end" style="align-items: center">

										</div>
									</div>

								</div> <!-- /.block-style-twentyTwo -->
							</div>

                            @endforeach
				        </div> <!-- /.mixitUp-container -->
					</div>
				</div>
			</div> <!-- /.fancy-portfolio-four -->

@endsection

@section('js_bot')
<script>
    $(document).on("keydown", "form", function(event) {
    return event.key != "Enter";
});
</script>
@endsection
