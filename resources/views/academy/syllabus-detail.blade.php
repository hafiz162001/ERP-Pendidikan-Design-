{{-- @dd($quiz) --}}
{{-- @dd($data) --}}
@extends('layouts.course')

@section('content')

{{-- @dd($data[0]['name']) --}}
@foreach ($data as $silabus )
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
						<div class="col">
							{{-- <div class="client-info font-rubik">Over <span>150,000+ client</span></div> --}}
							<div class="title-style-five">
                                <div class="card">
                                    <div class="card-body">
                                      {!! $silabus['theory'] !!}
                                    </div>
                                    {{-- <button class="theme-btn-fourteen">Quiz!</button> --}}
                                    @if ($data[0]['score'] < 70 && $quiz != null)
                                    <div class="m-auto">
                                        <button type="button" class="btn theme-btn-fourteen-2" style="margin-bottom: 30px; margin-top:60px" data-toggle="modal" data-target="#exampleModal">
                                            Quiz
                                        </button>
                                    </div>
                                    @endif
                                    @if ($quiz == null )
                                    {{-- <button type="button" class="btn theme-btn-fourteen" data-toggle="modal" data-target="#exampleModal">
                                        Quiz Belum Tersedia
                                    </button> --}}

                                    @endif
                                  </div>
                                {{-- {!! $silabus['theory'] !!} --}}
								{{-- <h2><span>Best event</span><br> & ticket platform platform.</h2> --}}
							</div>
						</div>
					</div>
				</div>
			</div> <!-- /.fancy-text-block-twenty -->

            @if ($quiz != null)
            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
                <div class="modal-dialog modal-xl modal-dialog-centered">
                <div class="modal-content">
                    <form action="/my-course/syllabus/detail/{{ $data[0]['id_customer_syllabus'] }}" method="post">
                        @csrf
                        <input type="hidden" name="syllabus_id" value="{{ $data[0]['id_customer_course'] }}">
                        <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Quiz {{ $quiz[0]['syllabus_name'] }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                        <div class="modal-body">
                        <?php
                        // loop $i until $quiz length
                        $jumlah_quiz = count($quiz);
                        // get array key
                        $keys = array_keys($quiz);
                        // + 1 for every keys
                        $keys = array_map(function($key) {
                            return $key + 1;
                        }, $keys);

                        ?>
                        {{-- @dd($keys) --}}

                        @foreach ($quiz as $quizs)
                        <div class="col soal" style="margin-top: 40px">
                            <?php
                            $quiz_id = $quizs['id_quiz'];
                            ?>

                            <input type="hidden" id="{{ $quizs['id_quiz'] }}" name="quiz_id_{{ $quizs['id_quiz'] }}" value="{{ $quizs['id_quiz'] }}">

                            <h5>
                                <strong> <span id="noSoal_{{ $quizs['id_quiz'] }}"></span>. {!! $quizs['quiz'] !!}</strong>
                            </h5>

                                {{-- @dd($quizs['id_quiz']) --}}
                            <div id="answers_{{ $quizs['id_quiz'] }}" required>
                                <div class="form-check pt-4">
                                    <input class="form-check-input" type="radio" name="{{ $quizs['id_quiz'] }}_answer" id="{{ $quizs['id_quiz'] }}_answer1" value="answer1">
                                    <div class="row">
                                        <label class="col form-check-label" for="{{ $quizs['id_quiz'] }}_answer1">
                                          <h6> <span id="opsiAnswer"></span>
                                            {!! $quizs['answer1'] !!}
                                        </h6>
                                        </label>
                                    </div>
                                </div>
                                <div class="form-check pt-4">
                                    <input class="form-check-input" type="radio" name="{{ $quizs['id_quiz'] }}_answer" id="{{ $quizs['id_quiz'] }}_answer2" value="answer2">
                                    <div class="row">
                                        <label class="col form-check-label" for="{{ $quizs['id_quiz'] }}_answer2">
                                          <h6>{!! $quizs['answer2'] !!}</h6>
                                        </label>
                                    </div>
                                </div>
                                <div class="form-check pt-4">
                                    <input class="form-check-input" type="radio" name="{{ $quizs['id_quiz'] }}_answer" id="{{ $quizs['id_quiz'] }}_answer3" value="answer3">
                                    <div class="row">
                                        <label class="col form-check-label" for="{{ $quizs['id_quiz'] }}_answer3">
                                          <h6>{!! $quizs['answer3'] !!}</h6>
                                        </label>
                                    </div>
                                </div>
                                <div class="form-check pt-4">
                                    <input class="form-check-input" type="radio" name="{{ $quizs['id_quiz'] }}_answer" id="{{ $quizs['id_quiz'] }}_answer4" value="answer4">
                                    <div class="row">
                                        <label class="col form-check-label" for="{{ $quizs['id_quiz'] }}_answer4">
                                          <h6>{!! $quizs['answer4'] !!}</h6>
                                        </label>
                                    </div>
                                </div>
                                <div class="form-check pt-4">
                                    <input class="form-check-input" type="radio" name="{{ $quizs['id_quiz'] }}_answer" id="{{ $quizs['id_quiz'] }}_answer5" value="answer5">
                                    <div class="row">
                                        <label class="col form-check-label" for="{{ $quizs['id_quiz'] }}_answer5">
                                          <h6>{!! $quizs['answer5'] !!}</h6>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <script>
                            // random shuffle answer_{{ $quizs['id_quiz'] }}
                            var answers = document.getElementById("answers_{{ $quizs['id_quiz'] }}");
                            var answers_child = answers.children;
                            var answers_length = answers_child.length;
                            var random_answers = [];
                            var i;
                            for (i = 0; i < answers_length; i++) {
                                random_answers.push(answers_child[i]);
                            }
                            random_answers.sort(function() {return 0.5 - Math.random()});
                            for (i = 0; i < answers_length; i++) {
                                answers.appendChild(random_answers[i]);
                            }

                            // set noSoal number from array $keys
                            var noSoal = document.getElementById("noSoal_{{ $quizs['id_quiz'] }}");
                            noSoal.innerHTML = "{{ $keys[$loop->index] }}";


                        </script>
                        @endforeach
                        </div>
                        <div class="modal-footer" style="border: none; margin-top:40px">
                        {{-- <button type="button" class="btn btn-danger mx-auto" data-dismiss="modal">Close</button> --}}
                            <button type="submit" class="btn theme-btn-fourteen-2 mx-auto">Submit</button>
                        </div>
                    </form>
                </div>
                </div>
            </div>
            @endif

		<!-- Optional JavaScript _____________________________  -->
        {{-- <script>


        </script> --}}

    	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
    	<!-- jQuery -->
		<script src="vendor/jquery.min.js"></script>
		<!-- Popper js -->
		<script src="vendor/popper.js/popper.min.js"></script>
		<!-- Bootstrap JS -->
		<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
	    <!-- menu  -->
		<script src="vendor/mega-menu/assets/js/custom.js"></script>
		<!-- AOS js -->
		<script src="vendor/aos-next/dist/aos.js"></script>
		<!-- js count to -->
		<script src="vendor/jquery.appear.js"></script>
		<script src="vendor/jquery.countTo.js"></script>
		<!-- Slick Slider -->
		<script src="vendor/slick/slick.min.js"></script>
		<!-- Fancybox -->
		<script src="vendor/fancybox/dist/jquery.fancybox.min.js"></script>
@endforeach
@endsection

