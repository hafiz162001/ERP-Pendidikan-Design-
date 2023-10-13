{{-- @dd($syllabus) --}}
{{-- @dd($course_info) --}}
{{-- @dd($discuss) --}}
@php
$id = $course_info[0]['id_course'];
// dd($id);
$url = 'https://gate.bisaai.id/bisa_design_prod/';
$media = 'https://gate.bisaai.id/bisa_design_prod/course/media/';
$mediasertif = "https://gate.bisaai.id/bisa_design_prod/master_sertifikat/media/course/$id/";
// dd($media);
@endphp

@extends('layouts.course')

@if(session()->has('errorRating'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert" style="position:fixed; top:115px; right:20px; z-index:9999">
        {{ session()->get('errorRating') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

@if(session()->has('successRating'))
    <div class="alert alert-success alert-dismissible fade show" role="alert" style="position:fixed; top:115px; right:20px; z-index:9999">
        {{ session()->get('successRating') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

@if(session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert" style="position:fixed; top:115px; right:20px; z-index:9999">
        {{ session()->get('success') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

@if(session()->has('scoreFail'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert" style="position:fixed; top:115px; right:20px; z-index:9999;">
        {{ session()->get('scoreFail') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
@if(session()->has('scoreLulus'))
    <div class="alert alert-success alert-dismissible fade show" role="alert" style="position:fixed; top:115px; right:20px; z-index:9999;">
        {{ session()->get('scoreLulus') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

@section('content')
<!--
			=============================================
				Fancy Hero Six
			==============================================
			-->
			<div class="fancy-hero-six" style="padding: 70px 0 60px 0; background-color:#110743">
				<div class="container">
					<h2 style="color: white"><strong>{{ $syllabus[0]['course_name'] }}</strong></h2>
					{{-- <p class="sub-heading" style="color: white">Tersedia +50 Course <strong> GRATIS </strong> yang dapat kamu ikuti untuk belajar berbagai topik.<br>Dapatkan Sertifikat setelah menyelesaikan Quiz dan Tugas-nya</p> --}}
				</div>

			</div> <!-- /.fancy-hero-six -->
			<!--
			=============================================
				Fancy Text block Twenty
			==============================================
			-->
			<div class="fancy-text-block-twenty" style="background-color:#110743; margin-top:-70px">
				<div class="container">
					<div class="row" >
						<div class="col-lg-9 ml-auto" style="padding: -10px 70px 0 70px">
							<!-- Nav tabs -->
                            <div class="card">
                                <h5 class="card-header">
                                    <ul class="nav nav-pills nav-fill" id="pills-tab" role="tablist">
                                        <li class="nav-item" role="presentation">
                                          <a class="nav-link" id="pills-info-tab" data-toggle="pill" href="#pills-info" role="tab" aria-controls="pills-info" aria-selected="true"><i class="fa-solid fa-circle-info"></i> Info</a>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                          <a class="nav-link active" id="pills-syllabus-tab" data-toggle="pill" href="#pills-syllabus" role="tab" aria-controls="pills-syllabus" aria-selected="false"><i class="fa-solid fa-book"></i> Syllabus</a>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                          <a class="nav-link" id="pills-task-tab" data-toggle="pill" href="#pills-task" role="tab" aria-controls="pills-task" aria-selected="false"><i class="fa-solid fa-bars-progress"></i> Task</a>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                          <a class="nav-link" id="pills-discussion-tab" data-toggle="pill" href="#pills-discussion" role="tab" aria-controls="pills-discussion" aria-selected="false"><i class="fa-solid fa-comment-dots"></i> Discussion</a>
                                        </li>
                                    </ul>
                                </h5>
                                <div class="card-body">
                                    <div class="tab-content" id="pills-tabContent">
                                        <div class="tab-pane fade" id="pills-info" role="tabpanel" aria-labelledby="pills-info-tab">
                                            {{-- <h3 class="font-rubik"><strong>Title</strong></h3> --}}
                                            <h4>
                                                <strong>
                                                    Course {{ $syllabus[0]['course_name'] }}
                                                </strong>
                                            </h4>
							  		        {{-- <p class="font-rubik">{!! $course_info[0]['info_course'] !!}</p> --}}
                                            <h5 class="mt-2">
                                                {!! $course_info[0]['info_course'] !!}
                                            </h5>

                                        </div>
                                        <div class="tab-pane fade show active" id="pills-syllabus" role="tabpanel" aria-labelledby="pills-syllabus-tab">
                                            @foreach ($syllabus as $silabus )
                                            @if ($silabus['status'] == 1 && $silabus['score'] == 0)
                                            <div class="card card-silabus" style="margin: 5px 0px 15px 0px; cursor:pointer; background-color:white" onclick="location.href='detail/{{ $silabus['id_customer_syllabus'] }}';">
                                                    <div class="card-body" style="height: 140px; position: relative;">
                                                        <h4>{{ $silabus['name'] }}</h4>
                                                        <p style="margin-top: 10px; color:rgb(85, 85, 85); margin-top: -20px" >Score Task: {{ $silabus['score'] }}</p>
                                                    </div>
                                                    {{-- <div class="row" style="position: absolute; right:5%; top:30%">
                                                        <p style="font-size: 15px"> <span style="font-size: 15px; margin-left:2px" class="badge badge-info">10 Soal</span></p>
                                                    </div> --}}
                                            </div>
                                            @elseif ($silabus['status'] == 1 && $silabus['score'] < 70)
                                            <div class="card card-silabus" style="margin: 5px 0px 15px 0px; cursor:pointer; background-color:red;" onclick="location.href='detail/{{ $silabus['id_customer_syllabus'] }}';">
                                                <div class="card-body" style="height: 140px; position: relative;">
                                                    <h4 style="color: white">{{ $silabus['name'] }}</h4>
                                                    <p style="margin-top: 10px; color:white; margin-top: -20px" >Score Task: {{ $silabus['score'] }}</p>
                                                </div>
                                            </div>
                                            @elseif ($silabus['status'] == 2 && $course_info[0]['is_ojt'] != 1)
                                            <div class="card card-silabus" style="margin: 5px 0px 15px 0px; cursor:pointer; background-color:green;" onclick="location.href='detail/{{ $silabus['id_customer_syllabus'] }}';">
                                                <div class="card-body" style="height: 140px; position: relative;">
                                                    <h4 style="color: white">{{ $silabus['name'] }}</h4>
                                                    <p style="margin-top: 10px; color:white; margin-top: -20px" >Score Task: {{ $silabus['score'] }}</p>
                                                </div>
                                                {{-- <div class="row" style="position: absolute; right:5%; top:30%">
                                                    <p style="font-size: 15px"> <span style="font-size: 15px; margin-left:2px" class="badge badge-info">10 Soal</span></p>
                                                </div> --}}
                                            </div>
                                            @elseif ($silabus['status'] == 2 && $course_info[0]['is_ojt'] == 1 && $silabus['task_file'] == null && $silabus['start_time_task'] == null)
                                            <div class="card card-silabus" style="margin: 5px 0px 15px 0px;background-color:green;" >
                                                <div class="card-body" style="height: 180px; position: relative;">
                                                    <div onclick="location.href='detail/{{ $silabus['id_customer_syllabus'] }}';" style=" cursor:pointer; ">
                                                        <h4 style="color: white">{{ $silabus['name'] }}</h4>
                                                        <p style="margin-top: 10px; color:white; margin-top: -20px" >Score Task: {{ $silabus['score'] }}</p>
                                                    </div>
                                                    <div style="margin-top: 20px;">
                                                        <button  style="background-color: red; height:40px; color:white; border-radius:5px; padding:0 15px" data-toggle="modal" data-target="#modalOJT_{{ $silabus['id_customer_syllabus'] }}">Upload Tugas</button>
                                                    </div>
                                                </div>
                                            </div>
                                            @elseif ($silabus['status'] == 2 && $course_info[0]['is_ojt'] == 1 && $silabus['task_file'] == null && $silabus['start_time_task'] != null)
                                            <div class="card card-silabus" style="margin: 5px 0px 15px 0px;background-color:green;" >
                                                <div class="card-body" style="height: 180px; position: relative;">
                                                    <div onclick="location.href='detail/{{ $silabus['id_customer_syllabus'] }}';" style=" cursor:pointer; ">
                                                        <h4 style="color: white">{{ $silabus['name'] }}</h4>
                                                        <p style="margin-top: 10px; color:white; margin-top: -20px" >Score Task: {{ $silabus['score'] }}</p>
                                                    </div>
                                                    <div style="margin-top: 20px;">
                                                        <button onclick="location.href='detail-task/{{ $silabus['id_customer_syllabus'] }}';"   style="background-color: red; height:40px; color:white; border-radius:5px; padding:0 15px" >Lanjutkan Tugas</button>
                                                    </div>
                                                </div>
                                            </div>
                                            @elseif ($silabus['status'] == 2 && $course_info[0]['is_ojt'] == 1 && $silabus['task_file'] != null)
                                            <div class="card card-silabus" style="margin: 5px 0px 15px 0px;background-color:green;" >
                                                <div class="card-body" style="height: 180px; position: relative;">
                                                    <div onclick="location.href='detail/{{ $silabus['id_customer_syllabus'] }}';" style=" cursor:pointer; ">
                                                        <h4 style="color: white">{{ $silabus['name'] }}</h4>
                                                        <p style="margin-top: 10px; color:white; margin-top: -20px" >Score Task: {{ $silabus['score'] }}</p>
                                                    </div>
                                                    <div style="margin-top: 20px;">
                                                        <button onclick="location.href='detail-task/{{ $silabus['id_customer_syllabus'] }}';" style="background-color: rgb(255, 153, 0); height:40px; color:white; border-radius:5px; padding:0 15px" >Lihat Tugas</button>
                                                    </div>
                                                </div>
                                            </div>
                                            @endif
                                            @endforeach
                                        </div>
                                        <div class="tab-pane fade" id="pills-task" role="tabpanel" aria-labelledby="pills-task-tab">
                                            <h4>Tugas Akhir</h4>
                                            {{-- <p>{{ $course_info[0]['task_description_course'] }}</p> --}}
                                            <p>{!! $course_info[0]['task_description_course'] !!}</p>
                                            @if ($pass_ta == true)
                                            {{-- @dd($pass_ta) --}}
                                            @if ($course_info[0]['task_final'] != null)
                                            <br>
                                            <hr>
                                            <strong style="color: black">Tugas akhir telah disubmit</strong>
                                            <p>File Tugas: {{ $course_info[0]['task_final'] }}</p>
                                            <span style="color: black">Waktu Submit: {{ $course_info[0]['task_time_submit'] }}</span>
                                            @endif
                                            {{-- @if ($course_info[0]['task_final'] == null)
                                            @endif --}}
                                            @if ($course_info[0]['task_final'] == null)
                                            <br>

                                            <hr>
                                            <div class="row justify-content-center">
                                                {{-- <button type="submit" class="btn theme-btn-fourteen mx-auto" name="submit">Submit Tugas Akhir</button> --}}
                                                <!-- Button trigger modal -->
                                                    <button type="button" class="btn theme-btn-fourteen-2 mx-auto" data-toggle="modal" data-target="#exampleModal">
                                                        Submit Tugas Akhir
                                                    </button>

                                                </div>
                                            @endif

                                            @else
                                            <div style="margin-top: 15px">
                                                <div class="alert alert-primary" role="alert">
                                                    Tugas akhir akan tersedia apabila seluruh silabus yang tersedia sudah terselesaikan.
                                                </div>
                                            </div>
                                            @endif
                                        </div>
                                        <div class="tab-pane fade" id="pills-discussion" role="tabpanel" aria-labelledby="pills-discussion-tab" style="min-height: 150px">
                                            @if(!empty($discuss) || $discuss != null)
                                            @foreach ($discuss as $dis)
                                            <div class="card card-silabus" style="margin: 5px 0px 15px 0px; cursor:pointer;">
                                                <div class="card-body" style="position: relative;">
                                                    <h4><strong>{{ $dis['description'] }}</strong></h4>
                                                    <p style="margin-top: 10px; margin-top: -30px" >Room ID: {{ $dis['room_id'] }}</p>
                                                    <p style="margin-top: 10px; margin-top: -40px" >Room Password: {{ $dis['room_password'] }}</p>
                                                    <p style="margin-top: 10px; margin-top: -40px" >Teacher: {{ $dis['teacher_name'] }}</p>
                                                    <p style="margin-top: 10px; margin-top: -40px" >Tanggal: {{ $dis['date'] }}</p>
                                                </div>
                                            </div>
                                            @endforeach
                                            @else
                                            <div>
                                                <h4>Tidak ada Data</h4>
                                            </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
						</div>

                        <div class="col-lg-3 flex-column-reverse" style="color: white" data-aos="fade-right" data-aos-duration="1200" style="padding:10px" >
							<div class="text-center"><strong style="font-size: 28px">INFO COURSE</strong> </div>

							<div class="title-style-five">
								{{-- <h2><span>Best event</span><br> & ticket platform platform.</h2> --}}
                                <div class="row justify-content-center" style="margin-bottom: 30px; ">
                                    <img src="{{ $media.$course_info[0]['photo_course'] }}" style="border-radius: 5px; pointer-events: none;" alt="">
                                </div>


                                <div class="col mb-1">
                                    <div class="row">
                                        <div class="col-1">
                                            <i class="fa fa-certificate" aria-hidden="true" style="color: white; font-size:20px; margin-right:5px"></i>
                                        </div>
                                        <div class="col-10"><small>
                                            <strong>  Score Penyelesaian:</strong> {{ $course_info[0]['points'] }}</small>
                                        </div>
                                    </div>
                                </div>
                                <hr>

                                {{-- <div class="col mb-1">
                                    <div class="row">
                                        <div class="col-1">
                                            <i class="fa fa-user" aria-hidden="true" style="color: black; font-size:20px; margin-right:5px"></i>
                                        </div>
                                        <div class="col-10"><small>
                                            <strong>  Pengajar:</strong> Rendy</small>
                                        </div>
                                    </div>
                                </div>
                                <hr> --}}

                                <div class="col mb-1">
                                    <div class="row">
                                        <div class="col-1">
                                            <i class="fa fa-users" aria-hidden="true" style="color: white; font-size:15px; margin-right:5px"></i>
                                        </div>
                                        <div class="col-10"><small>
                                            <strong>  Pengikut:</strong> 70</small>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                {{-- <div class="col mb-1">
                                    <div class="row">
                                        <div class="col-1">
                                            <i class="fa fa-clock-o" aria-hidden="true" style="color: black; font-size:20px; margin-right:5px"></i>
                                        </div>
                                        <div class="col-10"><small>
                                            <strong>  Durasi Pengerjaan:</strong> 6 Jam</small>
                                        </div>
                                    </div>
                                </div>
                                <hr> --}}
                                <div class="col mb-1">
                                    <div class="row">
                                        <div class="col-1">
                                            <i class="fa fa-globe" aria-hidden="true" style="color: white; font-size:20px; margin-right:5px"></i>
                                        </div>
                                        <div class="col-10"><small>
                                            <strong>  Bahasa:</strong> Indonesia</small>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="col mb-1">
                                    <div class="row">
                                        <div class="col-1">
                                            <i class="fa fa-star" aria-hidden="true" style="color: white; font-size:20px; margin-right:5px"></i>
                                        </div>
                                        <div class="col-10"><small>
                                            <strong>  Rating:</strong>
                                            @if ($course_info[0]['rating'] == 0)
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            @elseif ($course_info[0]['rating'] == 1)
                                            <i class="fa-solid fa-star checked-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            @elseif ($course_info[0]['rating'] == 2)
                                            <i class="fa-solid fa-star checked-star"></i>
                                            <i class="fa-solid fa-star chekced-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            @elseif ($course_info[0]['rating'] == 3)
                                            <i class="fa-solid fa-star checked-star"></i>
                                            <i class="fa-solid fa-star checked-star"></i>
                                            <i class="fa-solid fa-star checked-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            @elseif ($course_info[0]['rating'] == 4)
                                            <i class="fa-solid fa-star checked-star"></i>
                                            <i class="fa-solid fa-star checked-star"></i>
                                            <i class="fa-solid fa-star checked-star"></i>
                                            <i class="fa-solid fa-star checked-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            @elseif ($course_info[0]['rating'] == 5)
                                            <i class="fa-solid fa-star checked-star"></i>
                                            <i class="fa-solid fa-star checked-star"></i>
                                            <i class="fa-solid fa-star checked-star"></i>
                                            <i class="fa-solid fa-star checked-star"></i>
                                            <i class="fa-solid fa-star checked-star"></i>
                                            @endif
                                            </small>
                                        </div>
                                    </div>
                                </div>
                                <hr>

                                {{-- certificate --}}
                                @if ($course_info[0]['status'] == 2)
                                <div class="card col justify-content-center">
                                    <div class="card-body mb-2">
                                        <h5 class="card-title text-center">Certificate</h5>
                                        {{-- <img src="{{ $media.$sertif['photo_course'] }}" height="100%" alt="img_path" download> --}}
                                        <img src="{{ $mediasertif.$course_info[0]['foto_sertifikat'] }}" height="100%" alt="img_path" style="pointer-events: none;">
                                    </div>
                                    <div class="" style="margin:auto">
                                        <input type="hidden" id="url_sertif" value="{{ $mediasertif.$course_info[0]['foto_sertifikat'] }}">
                                        <input type="hidden" id="name_sertif" value="{{ $course_info[0]['foto_sertifikat'] }}">
                                        <a id="download_sertif">
                                        {{-- <a target="_blank" href="{{ $mediasertif.$course_info[0]['foto_sertifikat'] }}" download="{{ $mediasertif.$course_info[0]['foto_sertifikat'] }}"> --}}
                                        <button class="btn theme-btn-fourteen-2 mb-3" style="width: 230px">Unduh Sertifikat</button></a>
                                    </div>
                                </div>
                                @endif
                                <script>
                                    var url_sertif = document.getElementById('url_sertif').value;
                                    var name_sertif = document.getElementById('name_sertif').value;
                                    var download_sertif = document.getElementById('download_sertif');

                                    download_sertif.addEventListener('click', function(e) {
                                        e.preventDefault();
                                        var url = document.getElementById('url_sertif').value;
                                        // blob
                                        fetch(url)
                                        .then(response => response.blob())
                                        .then(blob => {
                                            const objectURL = URL.createObjectURL(blob);
                                            const a = document.createElement('a');
                                            a.href = objectURL;
                                            a.download = name_sertif;
                                            document.body.appendChild(a);
                                            a.click();
                                            URL.revokeObjectURL(objectURL);
                                        });
                                    });
                                </script>

                                <hr>
                                @if ($testimoni['rating'] == null && $testimoni['testimonial'] == null)
                                <div class="card col justify-content-center">
                                    <div class="card-body mb-2">
                                        <h5 class="card-title text-center">
                                            <small style="color: black">Belum ada review</small>

                                        </h5>
                                        {{-- <img src="{{ $media.$sertif['photo_course'] }}" height="100%" alt="img_path" download> --}}
                                        {{-- <img src="{{ $mediasertif.$course_info[0]['foto_sertifikat'] }}" height="100%" alt="img_path" download> --}}
                                    </div>
                                    <div class="" style="margin:auto">
                                        {{-- <a target="_blank" href="{{ $mediasertif.$course_info[0]['foto_sertifikat'] }}" download="{{ $mediasertif.$course_info[0]['foto_sertifikat'] }}"> --}}
                                        <button class="btn theme-btn-fourteen-2 mb-3" data-toggle="modal" data-target="#modalRating" style="width: 230px">Tambah Review</button></a>
                                    </div>
                                </div>
                                @endif


							</div>
						</div>
					</div>

				</div>
			</div> <!-- /.fancy-text-block-twenty -->

            <!-- Modal Final Task -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <form action="/my-course/syllabus/{{ $syllabus[0]['id_customer_course'] }}" method="POST">
                        @csrf
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Upload Tugas Akhir</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" id="id_customer_course" name="id_customer_course" value="{{ $course_info[0]['id_customer_course'] }}">
                            {{-- <input type="hidden" id="active_final" name="active_final" value="{{ $active_final['status_code'] }}"> --}}
                            <div class="form-group">
                                <label for="formGroupExampleInput">
                                    <h5>Deskripsi</h5>
                                </label>
                                <input type="text" class="form-control form-control-lg" id="deksripsi" name="deskripsi" placeholder="Deskripsi Tugas">
                            </div>
                            <div class="form-group">
                                <label for="formGroupExampleInput2">
                                    <h5>Nama File Tugas</h5>
                                </label>
                                <input type="text" class="form-control form-control-lg" id="formGroupExampleInput2" name="file_name"  placeholder="Default sesuai dengan nama file terlampir">
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlFile1">
                                    <h5>File Tugas</h5>
                                </label>
                                <div id="thumbnail" class="row justify-content-center"></div>
                                <input type="file" onchange="readUrl(this)" class="form-control form-control-lg form-control-file" id="inputTugas" name="file" style="padding: 5px">
                                <input type="hidden" name="file64" id="file64">
                            </div>
                        </div>
                        <div class="modal-footer">
                        {{-- <button type="button" class="btn btn-secondary mx-auto" data-dismiss="modal">Close</button> --}}
                            <button type="submit" class="btn theme-btn-fourteen-2 mx-auto" id="submit">
                                Submit Tugas
                            </button>
                        </div>
                    </form>
                </div>
                </div>
            </div>

            {{-- Modal Rating --}}
            <!-- Modal -->
            <div class="modal fade" id="modalRating" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

                <div class="modal-dialog modal-dialog-centered">

                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tulis Review</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body">
                        <form action="/my-course/syllabus/{{ $syllabus[0]['id_customer_course'] }}/rating" method="POST">
                            @csrf
                            <input type="hidden" name="id_customer_course" value="{{ $course_info[0]['id_customer_course'] }}">
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Rating</label>
                                <select class="form-control" id="exampleFormControlSelect1" name="rating">
                                    <option value="5">Bintang 5</option>
                                    <option value="4">Bintang 4</option>
                                    <option value="3">Bintang 3</option>
                                    <option value="2">Bintang 2</option>
                                    <option value="1">Bintang 1</option>
                                </select>
                              </div>
                              <div class="form-group">
                                  <label for="exampleFormControlTextarea1">Testimonial</label>
                                  <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="testimoni"></textarea>
                                </div>
                            </div>
                            <div class="modal-footer">
                                {{-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> --}}
                                <button type="submit" class="btn theme-btn-fourteen-2 mx-auto" id="submitRating">
                                    Submit Rating
                                </button>
                            </div>
                        </form>
                </div>
                </div>
            </div>

            <!-- Modal Task OJT -->
            @foreach ($syllabus as $syllabus)
            <div class="modal fade" id="modalOJT_{{ $syllabus['id_customer_syllabus'] }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <form action="/my-course/syllabus/{{ $syllabus['id_customer_syllabus'] }}/start-syllabusOJT" method="POST">
                        @csrf
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Konfirmasi</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            {{-- <p>{{ $syllabus['id_customer_syllabus'] }}</p> --}}
                            <p>Apakah anda yakin ingin memulai mengerjakan tugas?</p>
                            <input type="hidden" name="id_customer_syllabus" value="{{ $syllabus['id_customer_syllabus'] }}">
                            {{-- <input type="hidden" id="active_final" name="active_final" value="{{ $active_final['status_code'] }}"> --}}

                        </div>
                        <div class="modal-footer">
                        {{-- <button type="button" class="btn btn-secondary mx-auto" data-dismiss="modal">Close</button> --}}
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-success">Lanjutkan</button>
                        </div>
                    </form>
                </div>
                </div>
            </div>
            @endforeach

            <script>
                var inputTugas = document.getElementById('inputTugas');

                // File Name
                inputTugas.addEventListener('change', function(e) {
                    var fileName = document.getElementById('inputTugas').value.split('\\').pop().split('.')[0];
                    document.getElementById('formGroupExampleInput2').value = fileName;
                });

                // create thumbnail from file input if only image is submitted
                function readUrl(file) {
                    // if file is an image then display thumbnail
                    if (file.files && file.files[0] && (file.files[0].type === 'image/jpeg' || file.files[0].type === 'image/png')) {
                        var reader = new FileReader();
                        reader.onload = function(e) {
                            document.getElementById('thumbnail').innerHTML = '<img style="margin-top:3px; margin-bottom:15px" src="' + e.target.result + '"height="250" />';
                        };
                        reader.readAsDataURL(file.files[0]);
                    }
                    // if file is not an image then clear thumbnail
                    else {
                        document.getElementById('thumbnail').innerHTML = '<p></p>';
                    }

                }

                // encode inputTugas to base64 string
                function fileToBase64(file) {
                    return new Promise((resolve, reject) => {
                        const reader = new FileReader();
                        reader.readAsDataURL(file);
                        reader.onload = () => resolve(reader.result);
                        reader.onerror = error => reject(error);
                    });
                }

                // input tugas to base64
                inputTugas.addEventListener('change', function(e) {
                    fileToBase64(inputTugas.files[0]).then(function(base64) {
                        document.getElementById('inputTugas').value = base64;
                    });
                });

                // put encode 64 to file64
                inputTugas.addEventListener('change', function(e) {
                    fileToBase64(inputTugas.files[0]).then(function(base64) {
                        document.getElementById('file64').value = base64;
                    });
                });
            </script>

@endsection
