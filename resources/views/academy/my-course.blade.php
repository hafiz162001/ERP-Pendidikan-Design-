{{-- @dd($data) --}}
@php
$url = 'https://gate.bisaai.id/bisa_design_prod/';
$media = $url.'course/media/';
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
			<div class="fancy-hero-six" style="background-color: #110743">
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
			<div class="fancy-portfolio-four lg-container" style="background-color:#110743">
				<div class="container">
					<div class="pb-130 md-pb-90">
						{{-- <div class="search-filter-form">
                            <form action="/my-course" method="POST">
                                @csrf
                                <input type="search" placeholder="Search Something" id="search" name="search" value="{{ (isset($search)) ? $search : '' }}">
                                <button type="submit"><img src="{{ asset('images/icon/54.svg') }}"></button>
                                <select class="form-control" id="exampleFormControlSelect1" name="sort">
                                  <option value="free">Free Course</option>
                                  <option value="master">Master Class</option>
                                  <option value="ojt">Master Class + OJT</option>
                                  <option value="lpath">Learning Path</option>
                                </select>
                            </form>
                        </div> --}}
                        <form action="/my-course" method="POST">
                            <div class="row">
                                    @csrf
                                    <div class="col-lg-3 mb-2">
                                        <label for="exampleInputEmail1" style="color: white">Pencarian</label>
                                        <input class="form-control form-control-lg" type="search" id="search" name="search" placeholder="Pencarian" value="{{ (isset($search)) ? $search : '' }}"  style="height: 70px; border-radius:30px; ">
                                    </div>
                                    <div class="col-lg-3 mb-2">
                                        <label for="exampleInputEmail1" style="color: white">Tipe Course</label>
                                        <select class="form-control form-control-lg" id="sort" name="sort" style="height: 70px;">
                                            <option value="free" {{ (isset($sort) && $sort == 'free') ? 'selected' : '' }}>Free Course</option>
                                            <option value="master" {{ (isset($sort) && $sort == 'master') ? 'selected' : '' }}>Master Class</option>
                                            <option value="ojt" {{ (isset($sort) && $sort == 'ojt') ? 'selected' : '' }}>Master Class + OJT</option>
                                            <option value="lpath" {{ (isset($sort) && $sort == 'lpath') ? 'selected' : '' }}>Learning Path</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-3 mb-2">
                                        <label for="exampleInputEmail1" style="color: white">Status</label>
                                        <select class="form-control form-control-lg" id="status" name="status" style="height: 70px; ">
                                            <option value="12" {{ (isset($status) && $status == '12') ? 'selected' : '' }}>Semua Status</option>
                                            <option value="1" {{ (isset($status) && $status == '1') ? 'selected' : '' }}>Belum Lulus</option>
                                            <option value="2" {{ (isset($status) && $status == '2') ? 'selected' : '' }}>Sudah Lulus</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-2 mb-2">
                                        <label for="exampleInputEmail1" style="color: white">Halaman</label>
                                        <select class="form-control form-control-lg" id="page" name="page" style="height: 70px;">
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


				        <div class="mixitUp-container gutter-space-two d-flex flex-wrap" style="margin-top: 60px; min-height:400px" >
                            @if (isset($data))
                            @if (count($data) == 0)
                                <h4 style="margin: auto; color: white">Tidak ada Data</h4>
                            @endif
                            @foreach ($data as $dat)
                            <div class="col-lg-4 item mix">
								<a class="block-style-twentyTwo" href="my-course/syllabus/{{ $dat['id_customer_course'] }}" style="border-radius:20px; background:linear-gradient(180deg, #D9D9D9 0%, rgba(217, 217, 217, 0) 100%); display:block; color: inherit">
									<div class="row" style="border-radius:20px 20px 0 0;margin-top:-40px; display:block; position:relative; background-color: #ca2221">
										<div class="icon d-flex align-items-center justify-content-center" >
                                            <img src="{{ $media.$dat['photo_course'] }}" alt="">
                                            {{-- <span class="badge badge-success" style="position: absolute; top:15px; left:15px;">Free Certificate</span> --}}
                                        </div>
									</div>
									<div class="grid-container mt-3" style="display:grid; grid-template-columns:20% 20% 45% 15%; color:white">
										<div class="grid-item">
												<i class="fa fa-user" aria-hidden="true"></i>
												<small>10</small>
										</div>
  										<div class="grid-item">
                                              <i class="fa-solid fa-book" aria-hidden="true" style="margin-right: 1px"></i>
                                                <small>{{ $dat['total_syllabus'] }}</small>
										</div>
                                        <div class="grid-item"></div>
										<div class="grid-item text-right">
                                            <i class="fa fa-certificate" aria-hidden="true" ></i>
                                                <small>{{ $dat['points'] }}</small>
										</div>

									</div>
									<h4 style="color: white; font-weight:700">{{ $dat['course_name'] }}</h4>
									{{-- <p>{{ $dat['description_course'] }}</p> --}}
									{{-- <p>{!! $dat['description_course'] !!}</p> --}}
                                    <div class="grid-container mt-3" style="display:grid; grid-template-columns: 50% 50% ;">
										<div class="grid-item text-left">
										</div>
										<div class="grid-item text-right">
										</div>
									</div>
                                    @php
                                    $finished = $dat['total_finished_syllabus'];
                                    $total = $dat['total_syllabus'];
                                    if($finished == 0){
                                        $percent = 0;
                                    }else{
                                        $percent = ($finished/$total)*100;
                                    }
                                    @endphp
                                    @if ($percent != 0 && $percent != 100)
                                    <div class="progress">
                                        <div class="progress-bar bg-danger" role="progressbar" style="width: {{ $percent }}%" aria-valuenow="70" aria-valuemin="0" aria-valuemax="99">{{ $dat['total_finished_syllabus'] }} / {{ $dat['total_syllabus'] }}</div>
                                    </div>
                                    @elseif ($percent != 0 && $percent == 100 && $dat['foto_sertifikat'] != null)
                                    <div class="progress">
                                        <div class="progress-bar bg-success" role="progressbar" style="width: 100%" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100">Course Telah Selesai</div>
                                    </div>
                                    @elseif ($percent != 0 && $percent == 100)
                                    <div class="progress">
                                        <div class="progress-bar bg-danger" role="progressbar" style="width: 100%" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100">Semua Silabus Telah Selesai</div>
                                    </div>
                                    @elseif ($percent == 0)
                                    <div class="progress">
                                        <div class="progress-bar bg-danger" role="progressbar" style="width: 3%" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    @endif
								</a> <!-- /.block-style-twentyTwo -->
							</div>
                            @endforeach
                            @elseif (isset($lpath))
                            @if (count($lpath) == 0)
                                <h4 style="margin: auto; color: white">Tidak ada Data</h4>
                            @endif
                            @foreach ($lpath as $lpath)
                            @php
                                $media_l = 'https://gate.bisaai.id/bisa_design_prod/learning_path/media/';
                            @endphp
                            <div class="col-lg-4 item mix">
								<a class="block-style-twentyTwo" href="/my-learning-path/{{ $lpath['id_customer_learning_path'] }}" style="border-radius:20px; background:linear-gradient(180deg, #D9D9D9 0%, rgba(217, 217, 217, 0) 100%); display:block; color: inherit">
									<div class="row" style="border-radius:20px 20px 0 0;margin-top:-40px; display:block; position:relative; background-color: #060435; border:1px solid white">
										<div class="icon d-flex align-items-center justify-content-center" >
                                            <img src="{{ $media_l.$lpath['photo_learning_path'] }}" alt="">
                                            {{-- <span class="badge badge-success" style="position: absolute; top:15px; left:15px;">Free Certificate</span> --}}
                                        </div>
									</div>
									<div class="grid-container mt-3" style="display:grid; grid-template-columns:20% 20% 45% 15%; color:white">
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

									</div>
									<h4 style="color: white; font-weight:700">{{ $lpath['name_learning_path'] }}</h4>
									{{-- <p>{{ $dat['description_course'] }}</p> --}}
									{{-- <p>{!! $dat['description_course'] !!}</p> --}}
                                    <div class="grid-container mt-3" style="display:grid; grid-template-columns: 50% 50% ;">
										<div class="grid-item text-left">
										</div>
										<div class="grid-item text-right">
										</div>
									</div>

								</a> <!-- /.block-style-twentyTwo -->
							</div>

                            @endforeach
                            @endif
				        </div> <!-- /.mixitUp-container -->
					</div>
				</div>
			</div> <!-- /.fancy-portfolio-four -->

@endsection
