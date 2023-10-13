{{-- @dd($data) --}}
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
					<h4 class="heading" style="color: white"><strong>{{ $lpath['learning_path_name'] }}</strong></h4>
					{{-- <p class="sub-heading" style="color: white">Lihat Portofolio yang dihasilkan peserta pelatihan BISA Design Academy</p> --}}
				</div>

			</div> <!-- /.fancy-hero-six -->

			<!--
			=============================================
				Fancy Portfolio Four
			==============================================
			-->
			<div class="fancy-portfolio-four lg-container" style="margin-top: 10px; background-color:#110743; padding: 40px">
				<div class="container">
					<div class="pb-130 md-pb-90">
						{{-- <div class="search-filter-form">
                            <form action="/belajar-online" method="POST">
                                @csrf
                                <input type="search" placeholder="Search Something" id="search" name="search" value="{{ (isset($search)) ? $search : '' }}">
                                <button type="submit"><img src="images/icon/54.svg"></button>
                                <select class="form-control" id="exampleFormControlSelect1" name="sort">
                                  <option value="order_by_id">Courses</option>
                                  <option value="order_by_number_of_student">Certificate</option>
                                  <option value="order_by_number_of_student">Learning Path</option>
                                </select>
                            </form>
                        </div> --}}
						{{-- <div class="controls po-control-one text-center mb-90 md-mb-50 mt-40 md-mt-60" >
				            <button type="button" class="control" data-filter="all">All</button>
				            <button type="button" class="control" data-filter=".free">Free</button>
				            <button type="button" class="control" data-filter=".premium">Premium</button>
				            <button type="button" class="control" data-filter=".ojt">Premium + OJT</button>
				        </div> --}}

				        <div class="mixitUp-container gutter-space-two d-flex flex-wrap" style="margin-top: 60px;">
                            @foreach ($data as $dat)
                            <div class="col-md-4 item mix">
								<div class="block-style-twentyTwo" onclick="location.href='/my-course/syllabus/{{ $dat['id_customer_course'] }}';" style="border-radius:20px; background:linear-gradient(180deg, #D9D9D9 0%, rgba(217, 217, 217, 0) 100%);">
									<div class="row" style="border-radius:20px 20px 0 0;margin-top:-40px; display:block; position:relative; background-color: #ca2221">
										<div class="icon d-flex align-items-center justify-content-center" >
                                            <img src="{{ $media.$dat['photo_course'] }}" alt="">
                                            {{-- <span class="badge badge-success" style="position: absolute; top:15px; left:15px;">Free Certificate</span> --}}
                                        </div>
									</div>
									<div class="grid-container mt-3" style="display:grid; grid-template-columns:15% 15% 70%; color:white">
  										<div class="grid-item">
                                              <i class="fa-solid fa-book" aria-hidden="true" style="margin-right: 1px"></i>
                                                <small>{{ $dat['total_syllabus'] }}</small>
										</div>
										<div class="grid-item text-right">
                                            <i class="fa fa-certificate" aria-hidden="true" ></i>
                                                <small>{{ $dat['points'] }}</small>
										</div>
                                        <div class="grid-item"></div>
									</div>
									<h4 style="color: white; font-weight:700">{{ $dat['course_name'] }}</h4>
									{{-- <p>{{ $dat['description_course'] }}</p> --}}
									{{-- <p>{!! $dat['description_course'] !!}</p> --}}
                                    <div class="grid-container mt-3" style="display:grid; grid-template-columns: 50% 50% ;">
										<div class="grid-item text-left">
                                            @if ($dat['rating'] == 0)
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
										<div class="grid-item text-right">
											{{-- <strong style="color: white">{{ $price }}</strong> --}}
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
