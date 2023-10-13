{{-- @dd($user); --}}
@php
$url = 'https://gate.bisaai.id/bisa_design_prod/users/media/'
@endphp


@extends('layouts.course')


@section('content')
@if(session()->has('errorPass'))
<div class="alert alert-danger alert-dismissible fade show" role="alert" style="position:fixed; top:130px; right:20px; z-index:9999">
    {{ session()->get('errorPass') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif
@if(session()->has('successPass'))
<div class="alert alert-success alert-dismissible fade show" role="alert" style="position:fixed; top:130px; right:20px; z-index:9999">
    {{ session()->get('successPass') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif
@if(session()->has('successUpdate'))
<div class="alert alert-success alert-dismissible fade show" role="alert" style="position:fixed; bottom:10px; left:25px; z-index:9999">
    {{ session()->get('successUpdate') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

            {{-- <div class="fancy-hero-six" style="background: url({{ asset('images/bannerimg/banner2.jpg') }}) no-repeat scroll center center/cover"> --}}
            <div class="fancy-hero-six" style="margin-bottom: 60px">
                <div class="container">
                    <h4 class="heading font-gordita" style="color: white"><strong>My Profile</strong></h4>
                    {{-- <p class="sub-heading" style="color: white">Tersedia +50 Course <strong> GRATIS </strong> yang dapat kamu ikuti untuk belajar berbagai topik.<br>Dapatkan Sertifikat setelah menyelesaikan Quiz dan Tugas-nya</p> --}}
                </div>
            </div>

            <div class="fancy-text-block-twenty" style="background-color:#110743">
				{{-- <img src="images/shape/124.svg" alt="" class="shapes shape-one"> --}}
				{{-- <img src="images/shape/125.svg" alt="" class="shapes shape-two"> --}}
				<div class="container">
					{{-- <h4 class="title"><strong>{{ $syllabus[0]['course_name'] }}</strong></h4> --}}
					{{-- <div class="fancy-video-box-one mb-130 md-mb-70">
						<img src="images/media/img_65.png" alt="" class="main-img">
						<a data-fancybox="" href="https://www.youtube.com/embed/aXFSJTjVjw0" class="fancybox video-button d-flex align-items-center"><img src="images/icon/66.svg" alt=""></a>
					</div> <!-- /.fancy-video-box-one --> --}}

					<div class="row">
                        <div class="col-lg-3 flex-column-reverse" style="padding:10px" >
							<div class="client-info text-center font-rubik" style="color: white"><strong></strong> </div>

							<div class="title-style-five" >
                                <form action="/user" method="POST" id="formuser">
                                @csrf
								{{-- <h2><span>Best event</span><br> & ticket platform platform.</h2> --}}
                                <div class="justify-content-center" style="margin-bottom: 30px; border-radius:10px;">
                                    {{-- <label for="exampleFormControlFile1">Example file input</label> --}}
                                    <div class="row profile-pic-div justify-content-center">
                                        @if ($user['photo'] == null)
                                        <img src="{{ asset('images/photo/blank.png') }}" height="200px" style="border-radius: 5px; position:relative; border: 5px solid white" alt="" id="photo">
                                        @else
                                        <img src="{{ $url.$user['photo'] }}" height="200px" style="border-radius: 5px; position:relative; border: 5px solid white" alt="" id="photo">
                                        @endif
                                        <input type="file"  class="form-control-file" id="filePhoto" style="display: none" accept=".png, .jpg, .jpeg, .PNG, .JPG, .JPEG">

                                        <input type="hidden" name="photo64" id="photo64">
                                        <label for="filePhoto" id="uploadBtn" style="height: 40px;
                                        width: 50%;
                                        top: 200px;
                                        text-align: center;
                                        background: white;
                                        color: black;
                                        line-height: 30px;
                                        font-size: 15px;
                                        cursor: pointer;
                                        position:absolute;
                                        display: none;
                                        border-radius: 5px;
                                        opacity:50%">Choose Photo</label>
                                    </div>
                                </div>

                                <div class="card m-auto" style="border: none; width:280px">
                                    <div class="card-body">
                                      <div class="col mb-1">

                                        <div class="client-info text-center font-rubik" ><strong>{{ $user['name'] }}</strong> </div>
                                        <div class="row text-center">
                                            <div class="col" style="color: black">
                                                <strong> Pointku: </strong>{{ $user['points'] }}
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col" style="background-color: purple; height:80px; margin:2px; border-radius:5px; cursor:pointer">
                                                <div style="display:block; text-align:center; padding-top:20px; color:white">
                                                    <i class="fa-solid fa-gift"></i>
                                                    <p>Reedem</p>
                                                </div>
                                            </div>
                                            <div class="col" style="background-color: purple; height:80px; margin:2px; border-radius:5px; cursor:pointer">
                                                <div style="display:block; text-align:center; padding-top:20px; color:white">
                                                    <i class="fa-solid fa-circle-plus"></i>
                                                    <p>Add More</p>
                                                </div>
                                            </div>

                                        </div>
                                        </div>
                                    </div>
                                </div>


                                {{-- <div class="col mb-1">
                                    <div class="row">
                                        <div class="col-1">
                                            <i class="fa fa-certificate" aria-hidden="true" style="color: yellow; font-size:20px; margin-right:5px"></i>
                                        </div>
                                        <div class="col-10"><small>
                                            <strong>  Point: </strong>{{ $user['points'] }}</small>
                                        </div>
                                    </div>
                                </div> --}}
                                {{-- <br>

                                <div class="col mb-1">
                                    <div class="row">
                                        <button type="button" class="btn theme-btn-fourteen mx-auto" >
                                            <i class="fa-solid fa-gift"></i> Reedem Point
                                        </button>
                                    </div>
                                </div> --}}
							</div>
						</div>

						<div class="col-lg-9 ml-auto" style="padding: 0 70px 0 70px">
							<!-- Nav tabs -->
                            <div class="card" style="">
                                <h5 class="card-header">
                                    <ul class="nav nav-pills nav-fill" id="pills-tab" role="tablist">
                                        <li class="nav-item" role="presentation">
                                          <a class="nav-link active" id="pills-info-tab" data-toggle="pill" href="#pills-info" role="tab" aria-controls="pills-info" aria-selected="true"><i class="fa-solid fa-user"></i> Profile</a>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                          <a class="nav-link" id="pills-syllabus-tab" data-toggle="pill" href="#pills-syllabus" role="tab" aria-controls="pills-syllabus" aria-selected="false"><i class="fa-solid fa-key"></i> Change Pass</a>
                                        </li>
                                        {{-- <li class="nav-item" role="presentation">
                                          <a class="nav-link" id="pills-task-tab" data-toggle="pill" href="#pills-task" role="tab" aria-controls="pills-task" aria-selected="false"><i class="fa-solid fa-bars-progress"></i> My Certificate</a>
                                        </li> --}}
                                    </ul>
                                </h5>
                                <div class="card-body">
                                    <div class="tab-content" id="pills-tabContent">
                                        <div class="tab-pane fade show active" id="pills-info" role="tabpanel" aria-labelledby="pills-info-tab">
                                                <div class="form-group">
                                                  <small for="exampleFormControlInput1">Email Address</small>
                                                 <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="{{ $user['email'] }}" onkeydown="return event.key != 'Enter';">
                                                </div>
                                                <div class="form-group">
                                                  <small for="exampleFormControlInput1">Name</small>
                                                  <input type="name" min="3" class="form-control form-control-lg" id="exampleFormControlInput1" name="name" style="font-size: 16px;" value="{{ $user['name'] }}" onkeydown="return event.key != 'Enter';">
                                                </div>
                                                <div class="form-group">
                                                  <small for="exampleFormControlInput1">Gender</small>
                                                  <select class="form-control" id="exampleFormControlSelect1" name="gender">
                                                    @if ($user['gender'] == null)
                                                    <option value="1">Pria</option>
                                                    <option value="2">Wanita</option>

                                                    @endif
                                                    @if ($user['gender'] == 1)
                                                    <option value="1" selected>Pria</option>
                                                    <option value="2">Wanita</option>
                                                    @elseif ($user['gender'] == 2)
                                                    <option value="1">Pria</option>
                                                    <option value="2" selected>Wanita</option>
                                                    @endif
                                                  </select>
                                                </div>
                                                <div class="form-group">
                                                  <small for="exampleFormControlInput1">Phone Number</small>
                                                  <input type="number" min="7" class="form-control form-control-lg" id="exampleFormControlInput1" name="phone"  style="font-size: 16px;" value="{{ $user['phone'] }}" onkeydown="return event.key != 'Enter';">
                                                </div>
                                                <div class="form-group">
                                                  <small for="exampleFormControlInput1">Birth</small>
                                                  @php
                                                    $date = date_create($user['date_of_birth']);
                                                  @endphp
                                                  <input type="date" class="form-control form-control-lg" id="exampleFormControlInput1" min = "1985-01-01" max="<?= date('Y-m-d'); ?>" style="font-size: 16px;" name="bdate" value="{{ $date->format('Y-m-d') }}" onkeydown="return event.key != 'Enter';">
                                                </div>
                                                <div class="form-group">
                                                    <small for="exampleFormControlInput1">URL Linkedin</small>
                                                   <input type="url" class="form-control form-control-lg" id="linkedin" name="linkedin" value="{{ $credential['sosmed_linkedin'] }}" onkeydown="return event.key != 'Enter';">
                                                  </div>
                                                  <div class="form-group">
                                                    <small for="exampleFormControlInput1">URL Instagram</small>
                                                   <input type="url" class="form-control form-control-lg" id="instagram" name="instagram" value="{{ $credential['sosmed_instagram'] }}" onkeydown="return event.key != 'Enter';">
                                                  </div>
                                                <div class="form-group">
                                                  <small for="exampleFormControlTextarea1">Address</small>
                                                  <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="address" onkeydown="return event.key != 'Enter';">{{ $user['address'] }}</textarea>
                                                </div>
                                                <div class="form-group">
                                                  <small for="exampleFormControlTextarea1">Educational Background</small>
                                                  <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="edu" onkeydown="return event.key != 'Enter';">{{ $user['educational_background'] }}</textarea>
                                                </div>
                                                <div class="form-group mt-4">
                                                    <div class="row justify-content-center">
                                                        <button type="submit" class="theme-btn-fourteen-2 justify-content-center">Update</button>
                                                    </div>
                                                </div>
                                        </div>
                                        <div class="tab-pane fade" id="pills-syllabus" role="tabpanel" aria-labelledby="pills-syllabus-tab">
                                                {{-- <div class="row justify-content-center mb-4">
                                                    <b class="text-warning"> <strong>Kosongkan bila tidak ingin mengganti Password!</strong> </b>
                                                </div> --}}
                                                <div class="form-group">
                                                  <small for="exampleFormControlInput1">Old Password</small>
                                                 <input type="password" class="form-control form-control-lg" id="oldpass" name="oldpass" placeholder="********" autocomplete="new-password" onkeydown="return event.key != 'Enter';">
                                                </div>
                                                <div class="form-group">
                                                  <small for="exampleFormControlInput1">New Password</small>
                                                  <input type="password" class="form-control form-control-lg newpass1" id="newpass1" name="newpass1" placeholder="********" min="8" max="30" autocomplete="new-password" onkeydown="return event.key != 'Enter';">
                                                </div>
                                                <div class="form-group">
                                                  <small for="exampleFormControlInput1">Repeat New Password</small>
                                                  <input type="password" class="form-control form-control-lg newpass2" id="newpass2" name="newpass2" placeholder="********" min="8" max="30" autocomplete="new-password" onkeydown="return event.key != 'Enter';">
                                                  @if(session()->has('errormatch'))
                                                  <div class="text-right" >
                                                      <small class="text-danger">
                                                        {{ session()->get('errormatch') }}
                                                    </small>
                                                    </div>
                                                  @endif
                                                </div>
                                                <div class="form-group mt-4">
                                                    <div class="row justify-content-center">
                                                        <button type="submit" class="theme-btn-fourteen-2 justify-content-center" id="changePass">Change Password</button>
                                                    </div>
                                                </div>
                                        </form>
                                        </div>
                                        <div class="tab-pane fade" id="pills-task" role="tabpanel" aria-labelledby="pills-task-tab">
                                            <div class="row justify-content-center mb-4">
                                                <h4> <strong>My Certificate</strong> </h4>
                                            </div>
                                            @if ($sertif == null)
                                            <div class="row justify-content-center" style="padding: 0 10px">

                                                <small class="text-center">Masih Belum Ada Sertifikat, Ayo Semangat!! Tingkatkan Pengalaman dan Dapatkan Sertifikat</small>
                                            </div>

                                            @endif
                                            @php
                                                $media = 'https://gate.bisaai.id/bisa_design_prod/master_sertifikat/media/course/id_course/';
                                            @endphp
                                            @foreach ($sertif as $sertif)
                                            <div class="row" style="padding: 0 10px">
                                                <div class="col-4 mb-2">
                                                    <div class="row justify-content-center">
                                                        <img style="border-radius: 10px" src="'https://gate.bisaai.id/bisa_design_prod/master_sertifikat/media/course/2993/{{ $sertif['photo_course'] }}/" width="150px" alt="">
                                                        {{-- <img style="border-radius: 10px" src="{{ $media.$sertif['foto_sertifikat'] }}" height="160px" alt=""> --}}
                                                    </div>
                                                    <div class="row justify-content-center" style="margin-top: -20px; padding:0 10px">
                                                        <p class="text-center"> <small>{{ $sertif['course_name'] }}</small> </p>
                                                    </div>
                                                </div>
                                            </div>

                                            @endforeach

                                        </div>
                                        <div class="tab-pane fade" id="pills-discussion" role="tabpanel" aria-labelledby="pills-discussion-tab">4</div>
                                    </div>
                                </div>
                            </div>
						</div>


					</div>

				</div>
			</div> <!-- /.fancy-text-block-twenty -->
            <script>
                const imgDiv = document.querySelector('.profile-pic-div');
                const img = document.getElementById('photo');
                const filePhoto = document.getElementById('filePhoto');
                const photo64 = document.getElementById('photo64');

                // encode filePhoto to base64
                function fileToBase64(file) {
                    return new Promise((resolve, reject) => {
                        const reader = new FileReader();
                        reader.onload = () => resolve(reader.result);
                        reader.onerror = error => reject(error);
                        reader.readAsDataURL(file);
                    });
                }

                // put encoded file64 to photo64
                filePhoto.addEventListener('change', async () => {
                    const file = filePhoto.files[0];
                    const base64 = await fileToBase64(file);
                    photo64.value = base64;
                    img.src = base64;
                });

                const uploadBtn = document.getElementById('uploadBtn');

                //if user hover on img div
                imgDiv.addEventListener('mouseenter', function(){
                    uploadBtn.style.display = "block";
                });

                //if we hover out from img div
                imgDiv.addEventListener('mouseleave', function(){
                    uploadBtn.style.display = "none";
                });

                //when we choose a foto to upload
                filePhoto.addEventListener('change', function(){
                    //this refers to file
                    const choosedFile = this.files[0];

                    if (choosedFile) {
                        const reader = new FileReader(); //FileReader is a predefined function of JS

                        reader.addEventListener('load', function(){
                            img.setAttribute('src', reader.result);
                        });
                        reader.readAsDataURL(choosedFile);
                    }

                });

                // if($('#newpass1').val() != $('#newpass2').val()){
                //     $("#msg").text("Password tidak sama!");
                //     $(".notice").addClass("alert-danger");
                //     $(".notice").fadeIn(1000);
                //     setTimeout(function(){
                //         $(".notice").fadeOut(1000);
                //     }, 2000);

                //     $('$newpass1').attr('style', 'border-color: red');
                //     $('$newpass2').attr('style', 'border-color: red');
                //     // alert("Passwords do not match.");
                //     return false;
                // }
                // else{
                //     document.getElementById("newpass").value = $('#newpass1').val();
                //     return true;
                // }

                // function matchPassword(){
                //     let newpass1 = document.querySelector('.newpass1').value;
                //     console.log(newpass1);
                // }
            </script>
@endsection


<script type="text/javascript">
// matchpass if match then can click button #changePass
function matchpass(){
    var newpass1 = document.querySelector('.newpass1').value;
    var newpass2 = document.querySelector('.newpass2').value;
    if(newpass1 == newpass2){
        document.getElementById("newpass").value = newpass1;
        document.getElementById("changePass").disabled = false;
    }
    else{
        alert("Password tidak sama!");
        document.getElementById("changePass").disabled = true;

    }
}

// disable formuser hit enter to submit
$(document).on("keydown", "form", function(event) {
    return event.key != "Enter";
});




</script>

