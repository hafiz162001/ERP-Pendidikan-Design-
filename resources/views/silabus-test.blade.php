{{-- {{ dd($course) }} --}}

@extends('layouts.course')

@section('content')
      <!--
			=============================================
				Portfolio Details One
			==============================================
			-->
      <div class="portfolio-details-one mt-75 mb-150 md-mb-100">
        <div class="container">
          <div class="row">
            <div class="col-xl-11 m-auto">
              <div class="header text-center">
                <div class="tag">ss</div>
                <div class="title-style-ten">
                  <h2>SS</h2>
                </div>
                <ul class="d-flex justify-content-center social-icon mt-35">
                  <li>
                    <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                  </li>
                  <li>
                    <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                  </li>
                  <li>
                    <a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                  </li>
                </ul>
              </div>
            </div>
          </div>

          <div class="main-content mt-75">
            {{-- <img src="{{ asset('images/gallery/img_33.jpg') }}" alt="" class="mb-90 md-mb-50" /> --}}
            <div class="row">
              <div class="col-xl-11 m-auto">
                <div class="row">
                  <div class="col-md-8">
                    <h4>Masterclass On Job Training : Graphic Design Batch 1</h4>
                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                          <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Home</a>
                        </li>
                        <li class="nav-item" role="presentation">
                          <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Profile</a>
                        </li>
                        <li class="nav-item" role="presentation">
                          <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Contact</a>
                        </li>
                      </ul>
                      <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                            <div class="card" style="margin: 5px 0px 5px 0px">
                                <a href="">
                                    <div class="card-body" style="height: 110px">
                                        <h4>Design Principle</h4>
                                        <p style="margin-top: 10px; color:rgb(85, 85, 85); margin-top: -20px">Score</p>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">...</div>
                        <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">...</div>
                      </div>
                  </div>
                  <div class="col-md-4">

                    <ul class="project-info clearfix pl-xl-5">
                        <li class='text-center'>
                            <strong style="font-size: 24px; margin-bottom: 20px">DETAIL COURSE</strong>
                          </li>
                        <div class="row justify-content-center" style="margin-bottom: 20px;">
                            <img src="images/media/img_67.png" style="border-radius:15px; padding:15px" alt="">
                        </div>
                        <li>
                            <div class="row">

                                <div class="col">
                                    <span> <i class="fa fa-certificate" aria-hidden="true" style="color: black; font-size:20px; margin-right:5px"></i><small><strong>Score Penyelesaian:</strong>  1000</small></span>
                                </div>

                            </div>
                          </li>
                          <li>
                            <div class="row">
                              <div class="col"><span class="text-left">Pengikut</span></div>
                              <div class="col"><span class="text-right">100</span></div>
                            </div>
                          </li>

                          <li>
                            <div class="row">
                              <div class="col-9"><span class="text-left to-upper"><i class="fa fa-globe" aria-hidden="true" style="color: black; font-size:20px; margin-right:5px"></i>Silabus</span></div>
                              <div class="col-3"><span class="text-right">8</span></div>
                            </div>
                          </li>

                          <li>
                            <div class="row">
                              <div class="col"><span class="text-left">Harga</span></div>
                              <div class="col"><span class="text-right">Rp 15000</span></div>
                            </div>
                          </li>
                          <hr />
                          <li>
                            <a href="/course-checkout" class="theme-btn-eight w-100 text-center">Registrasi</a>
                            <span> </span>
                          </li>
                    </ul>
                  </div>
                </div>
                <!-- <div class="top-border mt-70 pt-50 md-mt-40">
                  <ul class="portfolio-pagination d-flex justify-content-between">
                    <li>
                      <a href="#" class="d-flex align-items-center">
                        <img src="images/gallery/img_34.jpg" alt="" class="d-none d-lg-block" />
                        <span class="d-inline-block pl-lg-4">
                          <span class="tp1 d-block">Previous</span>
                          <span class="tp2 d-block">Product Branding</span>
                        </span>
                      </a>
                    </li>
                    <li>
                      <a href="#" class="d-flex flex-row-reverse align-items-center text-right">
                        <img src="images/gallery/img_35.jpg" alt="" class="d-none d-lg-block" />
                        <span class="d-inline-block pr-lg-4">
                          <span class="tp1 d-block">Next</span>
                          <span class="tp2 d-block">Uber App Design</span>
                        </span>
                      </a>
                    </li>
                  </ul>
                </div> -->
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- /.portfolio-details-one -->

@endsection

