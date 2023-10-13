{{-- @dd($silabus) --}}
@extends('layouts.course')

@section('content')
			<!--
			=============================================
				Fancy Text block Twenty
			==============================================
			-->
			<div class="fancy-text-block-twenty" style="margin-top: -60px">
				{{-- <img src="images/shape/124.svg" alt="" class="shapes shape-one">
				<img src="images/shape/125.svg" alt="" class="shapes shape-two"> --}}
				<div class="container">
					<h1 class="title" style="color: white; font-weight:700"><strong>{{ $silabus['name'] }}</strong></h1>
                    @if ($silabus['video'] == "")

                    @elseif($silabus['video'] == null)

                    @else
					<div class="fancy-video-box-one mb-5 md-mb-70">
						<iframe width="1170" height="560" src="https://www.youtube.com/embed/{{ $silabus['video'] }}?autoplay=1" allow="fullscreen" allowfullscreen>
                        </iframe>
					</div> <!-- /.fancy-video-box-one -->
                    @endif

					<div class="row">
						<div class="col" data-aos="fade-right" data-aos-duration="1200">
							{{-- <div class="client-info font-rubik">Over <span>150,000+ client</span></div> --}}
							<div class="title-style-five">
                                <div class="card">
                                    <div class="card-body">
                                      {!! $silabus['theory'] !!}
                                      <div>
                                        <br>
                                        <hr>
                                        <h4><strong>Instruksi Khusus</strong></h4>
                                        <br>
                                        <p>{!! $silabus['task'] !!}</p>
                                        <br>
                                        @php
                                            $endTime = $silabus['end_time_task'];
                                            // GMT timezone to WITA
                                            $endTime = date('D, d M Y H:i:s', strtotime($endTime . ' +7 hours'));
                                        @endphp
                                        <h5>Batas Pengerjaan: <strong>{{ $endTime }} WIB</strong> </h5>
                                        <br>
                                        @if ($silabus['task_file'] == null)
                                        <form action="/my-course/syllabus/detail-task/{{ $silabus['id_customer_syllabus'] }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="id_customer_syllabus" value="{{ $silabus['id_customer_syllabus'] }}">
                                            <input type="hidden" name="id_customer_course" value="{{ $silabus['id_customer_course'] }}">
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
                                                <input type="file" onchange="readUrl(this)" class="form-control form-control-lg form-control-file" id="inputTugas" style="padding: 5px">
                                                <input type="hidden" name="file64" id="file64">
                                            </div>
                                            <div class="row justify-content-center mt-4 mb-4">
                                                <button type="submit" class="btn theme-btn-fourteen-2 mx-auto" id="submit">
                                                    Submit Tugas
                                                </button>
                                            </div>
                                        </form>
                                        @else
                                        <h5><strong>Jawaban sudah disubmit</strong></h5>
                                        @php
                                            $submitTime = $silabus['submit_time_task'];
                                            $submitTime = date('D, d M Y H:i:s', strtotime($submitTime . ' +7 hours'));
                                        @endphp
                                        <h5>Submit time: {{ $submitTime }} WIB</h5>
                                        <h5>Score: {{ $silabus['score_task'] }}</h5>
                                        <br>
                                        <div class="row justify-content-center mt-4 mb-4">
                                            <button type="submit" class="btn theme-btn-fourteen-2 mx-auto" id="submit" onclick="location.href='/my-course/syllabus/{{ $silabus['id_customer_course'] }}';">
                                                Kembali
                                            </button>
                                        </div>
                                        @endif
                                      </div>
                                    </div>
                                    {{-- <button class="theme-btn-fourteen">Quiz!</button> --}}

                                  </div>
                                {{-- {!! $silabus['theory'] !!} --}}
								{{-- <h2><span>Best event</span><br> & ticket platform platform.</h2> --}}
							</div>
						</div>
					</div>
				</div>
			</div> <!-- /.fancy-text-block-twenty -->



@endsection

@section('js_bot')
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
            document.getElementById('thumbnail').innerHTML = '<img style="margin-top:3px; margin-bottom:15px" src="' + e.target.result + '"height="100%" />';
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

