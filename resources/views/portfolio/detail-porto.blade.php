@php
    $porto = 'https://gate.bisaai.id/bisa_design_prod/portofolio/media/foto_portofolio/';
    $carousel = 'https://gate.bisaai.id/bisa_design_prod/portofolio/media/carousel_portofolio/';
@endphp

{{-- @dd($data) --}}

@extends('layouts.course')

@section('content')

<div class="alert alert-danger alert-dismissible fade show" id="alert_fail" role="alert" style="position:fixed; bottom:15px; left:10px; z-index:9999; display:none">
    Gagal update data
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<div style="padding: 30px 185px 10px 185px; background-color: #110743;">
    <button type="button" class="btn btn-danger" style="height: 50px; width:120px" onclick="location.href='my-portfolio';"><strong>KEMBALI</strong></button>
</div>
<!--
			=============================================
				Fancy Hero Six
			==============================================
			-->
			{{-- <div class="fancy-hero-six" style="background: url({{ asset('images/bannerimg/banner2.jpg') }}) no-repeat scroll center center/cover"> --}}
			<div class="fancy-hero-six" style="background-color: #110743;">

				<div class="container">
                    {{-- <div class="title-style-ten">
                        <h2 style="color: white">{{ $course['name'] }}</h2>
                      </div> --}}
					<h2 style="color: white; font-family: 'Fira Code', monospace; font-weight:700"><strong>{{ $data['nama_portofolio'] }}</strong></h2>
					{{-- <p class="sub-heading" style="color: white">Tersedia +50 Course <strong> GRATIS </strong> yang dapat kamu ikuti untuk belajar berbagai topik.<br>Dapatkan Sertifikat setelah menyelesaikan Quiz dan Tugas-nya</p> --}}
				</div>

			</div> <!-- /.fancy-hero-six -->
      <!--
			=============================================
				Portfolio Details One
			==============================================
			-->
      <div class="portfolio-details-one mt-75 mb-150 md-mb-100" style="background-color: #110743;">
        <div class="container">
            <div class="carousel" style="margin-bottom:60px; margin-top:-90px; background-color:black">
                <ul class="slider">
                    @if ($data['carousel1'] != null)
                    <li>
                        <img src="{{ $carousel.$data['carousel1'] }}" style="border-radius: 10px; margin:0 auto; max-height:450px" alt="">
                    </li>
                    @endif
                    @if ($data['carousel2'] != null)
                    <li>
                        <img src="{{ $carousel.$data['carousel2'] }}" style="border-radius: 10px; margin:0 auto; max-height:450px " alt="">
                    </li>
                    @endif
                    @if ($data['carousel3'] != null)
                    <li>
                        <img src="{{ $carousel.$data['carousel3'] }}" style="border-radius: 10px; margin:0 auto; max-height:450px " alt="">
                    </li>
                    @endif
                </ul>
            </div>

          <div class="main-content mt-45" style="padding: 0 0 120px 0; ">
            {{-- <img src="{{ $media.$course['photo'] }}" alt="" class="mb-90 md-mb-50" /> --}}
            <div class="row">
              <div class="col-xl-11 m-auto">
                <div class="row">
                  <div class="col-md-8" style="background-color: white; border-radius:5px">
                    {{-- <hr /> --}}
                    <br>
                    <h4>Deskripsi Singkat</h4>
                    <p>
                        {!! $data['deskripsi_singkat'] !!}
                    </p>
                    <hr />
                    <h4>Deskripsi Lengkap</h4>
                    <p>
                        {!! $data['deskripsi_lengkap'] !!}
                    </p>
                  </div>
                  <div class="col-md-4">
                    <ul class="project-info clearfix pl-xl-5" style="color:white">
                        <li class="text-center" style="margin-bottom: 25px">
                            <strong style="font-size: 24px; ">DETAIL PORTO</strong>
                        </li>
                        <li style="margin-bottom: 25px">
                            <img src="{{ $porto.$data['foto_portofolio'] }}" style="border-radius: 5%"  alt="">
                        </li>
                        <li>
                            <div class="row">
                              <div class="col"><span class="text-left">{{ $data['nama_course'] }}</span></div>
                              {{-- <div class="col"><span class="text-right">SS</span></div> --}}
                            </div>
                          </li>
                        <li>
                            <div class="row">
                            <div class="col"><span class="text-left">Kategori:</span></div>
                            <div class="col"><span class="text-right">{{ $data['nama_kategori_portofolio'] }}</span></div>
                            </div>
                        </li>

                        <li>
                            {{-- <a href="/course-detail/SS/checkout" > --}}
                              <button class="theme-btn-fourteen" style="font-weight: 700" data-toggle="modal" data-target="#exampleModal"><i class="fa-solid fa-pen-to-square"></i> EDIT</button>
                            {{-- </a> --}}
                            {{-- <a href="/course-detail/{{ Str::slug($course['name']) }}/checkout" class="theme-btn-eight w-100 text-center">Registrasi</a> --}}
                        </li>



                      <span> </span>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- /.portfolio-details-one -->



      <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
        <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content">
            {{-- <form action="/my-portfolio/{{ $data['id_portofolio'] }}" method="POST"> --}}
                {{-- @csrf --}}
                <input type="hidden" name="id_porto" value="{{ $data['id_portofolio'] }}">
                <div class="modal-header" style="border: none">
                    <h5 class="modal-title" id="exampleModalLabel"><strong>Tambah Portfolio</strong></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                {{-- @dd($keys) --}}
                <div class="col">
                    <h4><strong>Photo Project</strong></h4>
                </div>

                <div class="row" style="margin: 20px 0 50px 0">
                    <div class="col-md-3 justify-content-center">
                        <div id="imgprev1">
                            @if ($data['carousel1'] == null)
                            <img src="{{ asset('images/doc/blankdoc.jpg') }}" style="border-radius: 5px" alt="" >
                            @else
                            <img src="{{ $carousel.$data['carousel1'] }}" style="border-radius: 5px" alt="">
                            @endif
                        </div>
                            <div class="form-group mt-2">
                              <label for="exampleFormControlFile1">Edit Project Photo max 2mb</label>
                              <input type="file" class="inputFoto1 form-control-file" id="inputFoto1" accept=".png, .jpg, .jpeg, .PNG, .JPG, .JPEG">
                              {{-- <input type="hidden" id="photo1_base64" name="photo1_base64" required> --}}
                            </div>
                    </div>
                    <div class="col-md-3 justify-content-center">
                        <div id="imgprev2">
                            @if ($data['carousel2'] == null)
                            <img src="{{ asset('images/doc/blankdoc.jpg') }}" style="border-radius: 5px" alt="" >
                            @else
                            <img src="{{ $carousel.$data['carousel2'] }}" style="border-radius: 5px" alt="">
                            @endif
                        </div>
                            <div class="form-group mt-2">
                              <label for="exampleFormControlFile1">Edit Project Photo max 2mb</label>
                              <input type="file" class="inputFoto2 form-control-file" id="inputFoto2" accept=".png, .jpg, .jpeg, .PNG, .JPG, .JPEG">
                              {{-- <input type="hidden" id="photo2_base64" name="photo2_base64"> --}}
                            </div>
                    </div>
                    <div class="col-md-3 justify-content-center">
                        <div id="imgprev3">
                            {{-- <img src="{{ $carousel.$data['carousel3'] }}" style="border-radius: 5px" alt=""> --}}
                            @if ($data['carousel3'] == null)
                            <img src="{{ asset('images/doc/blankdoc.jpg') }}" style="border-radius: 5px" alt="" >
                            @else
                            <img src="{{ $carousel.$data['carousel3'] }}" style="border-radius: 5px" alt="">
                            @endif
                            {{-- <img src="{{ asset('images/doc/blankdoc.jpg') }}" style="border-radius: 5px" alt=""> --}}
                        </div>
                            <div class="form-group mt-2">
                              <label for="exampleFormControlFile1">Edit Project Photo max 2mb</label>
                              <input type="file" class="inputFoto3 form-control-file" id="inputFoto3" accept=".png, .jpg, .jpeg, .PNG, .JPG, .JPEG">
                              {{-- <input type="hidden" id="photo3_base64" name="photo3_base64"> --}}
                            </div>
                    </div>
                    <div class="col-md-3 justify-content-center">
                        {{-- <div id="display_thumb" style=""></div> --}}
                        <div id="imgprev4">
                            {{-- <img src="{{ $porto.$data['foto_portofolio'] }}" style="border-radius: 5px" alt="" > --}}
                            @if ($data['foto_portofolio'] == null)
                            <img src="{{ asset('images/doc/blankdoc.jpg') }}" style="border-radius: 5px" alt="" >
                            @else
                            <img src="{{ $porto.$data['foto_portofolio'] }}" style="border-radius: 5px" alt="">
                            @endif
                        </div>
                        <div class="form-group mt-2">
                            <label for="exampleFormControlFile1" style="color: red">Edit Thumbnail max 2mb</label>
                            <input type="file" class="inputFoto4 form-control-file" id="inputFoto4" accept=".png, .jpg, .jpeg, .PNG, .JPG, .JPEG">
                            {{-- <input type="hidden" id="thumb_base64" name="thumb_base64"> --}}
                        </div>

                    </div>
                    {{-- <h5>
                        <strong> SS</strong>
                    </h5> --}}
                </div>

                <div class="col">
                    <h4><strong>Detail Project</strong></h4>
                    <br>
                    <div class="card" style="border: none">

                                <div class="form-group">
                                  <label for="namaPP">Nama Portfolio</label>
                                  <input type="text" class="form-control" id="namaPP" name="namaPP" aria-describedby="namaPP" maxlength="50" value="{{ $data['nama_portofolio'] }}" style="height: 55px">
                                  <small id="namaPP" class="form-text text-muted">Maksimal 50 karakter.</small>
                                </div>
                                <div class="form-group">
                                    <label for="QuillEditor">Deskripsi Singkat</label>
                                    <div id="QuillEditor" name="des_singkat" style="min-height: 70px; border-radius:0 0 10px 10px">
                                        {!! $data['deskripsi_singkat'] !!}
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="finished_crs">Pilih course yang sudah berhasil/lulus</label>
                                    <select class="form-control" id="finished_crs" name="finished_crs" style="height: 55px">
                                    @foreach ($finished as $finish)
                                        @if ($finish['id_customer_course'] == $data['id_customer_course'])
                                        <option value="{{ $finish['id_customer_course'] }}" selected>{{ $finish['nama_course'] }}</option>
                                        @endif
                                        <option value="{{ $finish['id_customer_course'] }}">{{ $finish['nama_course'] }}</option>
                                    @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="ketegori">Pilih Kategori</label>
                                    <select class="form-control" id="ketegori" name="kategori" style="height: 55px">

                                    @foreach ($kategori as $kat)
                                        @if ($kat['id_kategori_portofolio'] == $data['id_kategori_portofolio'])
                                            <option value="{{ $kat['id_kategori_portofolio'] }}" selected>{{ $kat['nama_kategori_portofolio'] }}</option>
                                        @endif
                                        <option value="{{ $kat['id_kategori_portofolio'] }}">{{ $kat['nama_kategori_portofolio'] }}</option>
                                    @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="QuillEditor2">Deskripsi Lengkap</label>
                                    <div id="QuillEditor2" name="des_lengkap" style="min-height: 70px; border-radius:0 0 10px 10px">
                                        {!! $data['deskripsi_lengkap'] !!}
                                    </div>
                                    {{-- <textarea class="form-control" id="froala" name="des_lengkap">{!! $data['deskripsi_lengkap'] !!}</textarea> --}}
                                </div>
                      </div>
                </div>
                </div>
                <input type="hidden" id="token" value="{{ $token }}">
                <input type="hidden" id="id_porto" value="{{ $id_porto }}">
                <div class="modal-footer" style="border: none">
                {{-- <button type="button" class="btn btn-danger mx-auto" data-dismiss="modal">Close</button> --}}
                    <button type="submit" id="btn_edit" class="btn theme-btn-fourteen-2 mx-auto">Edit</button>
                </div>
            {{-- </form> --}}
        </div>
        </div>
    </div>

@endsection

@section('js_bot')


<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
<script src="{{ asset('js/ImageResize.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
<script>
    $('.slider').slick({
    infinite: true,
    speed: 2000,
    slidesToShow: 1,
    adaptiveHeight: true,
    autoplay: true,
    autoplaySpeed: 2800,
    fade: true,
    centerMode: true,
    // dots: true,
    // arrows: false,
    });

    var toolbarOptions = [
        ['bold', 'italic', 'underline', 'strike'],        // toggled buttons
        [{ 'header': 1 }, { 'header': 2 }],               // custom button values
        [{ 'size': ['small', false, 'large', 'huge'] }],  // custom dropdown
        [{ 'header': [1, 2, 3, 4, 5, 6, false] }],
        ['clean']                                         // remove formatting button
    ]
    var des_singkat = new Quill('#QuillEditor', {
        modules: {
        toolbar: toolbarOptions
        },
        theme: 'snow'
    });

    var toolbarOptions2 = [
        ['bold', 'italic', 'underline', 'strike'],        // toggled buttons
        ['blockquote', 'code-block'],
        [{ 'header': 1 }, { 'header': 2 }],               // custom button values
        [{ 'list': 'ordered'}, { 'list': 'bullet' }],
        [{ 'script': 'sub'}, { 'script': 'super' }],      // superscript/subscript
        [{ 'indent': '-1'}, { 'indent': '+1' }],          // outdent/indent
        [{ 'size': ['small', false, 'large', 'huge'] }],  // custom dropdown
        [{ 'header': [1, 2, 3, 4, 5, 6, false] }],
        ['link', 'image', 'video'],
        ['clean']                                         // remove formatting button
    ]
    var des_lengkap = new Quill('#QuillEditor2', {
        theme: 'snow',
        modules: {
            imageResize: {
                displaySize: true
            },
            toolbar: toolbarOptions2
        }
    });


// portfolio photo

    var img_car1;
    var img_car2;
    var img_car3;
    var img_porto;
    // getelement by id imgprev1
    var imgprev1 = document.getElementById('imgprev1');
    var imgprev2 = document.getElementById('imgprev2');
    var imgprev3 = document.getElementById('imgprev3');
    var imgprev4 = document.getElementById('imgprev4');
    // get element by id ubahfoto1
    var inputfoto1 = document.querySelector('#inputFoto1');
    var inputfoto2 = document.querySelector('#inputFoto2');
    var inputfoto3 = document.querySelector('#inputFoto3');
    var inputfoto4 = document.querySelector('#inputFoto4');

    // const testvalue = document.querySelector('#testvalue');
    // inputfoto1 to base64
    inputfoto1.addEventListener('change', function(e) {
        var file = e.target.files[0];
        var reader = new FileReader();
        reader.onload = function(e) {
            img_car1 = e.target.result.split(',')[1];
            imgprev1.innerHTML = `<img src="${e.target.result}" style="border-radius: 5px">`;
        };
        reader.readAsDataURL(file);
    });

    // inputfoto2 to base64
    inputfoto2.addEventListener('change', function(e) {
        var file = e.target.files[0];
        var reader = new FileReader();
        reader.onload = function(e) {
            img_car2 = e.target.result.split(',')[1];
            imgprev2.innerHTML = `<img src="${e.target.result}" style="border-radius: 5px">`;
        };
        reader.readAsDataURL(file);
    });

    // inputfoto3 to base64
    inputfoto3.addEventListener('change', function(e) {
        var file = e.target.files[0];
        var reader = new FileReader();
        reader.onload = function(e) {
            img_car3 = e.target.result.split(',')[1];
            imgprev3.innerHTML = `<img src="${e.target.result}" style="border-radius: 5px">`;
        };
        reader.readAsDataURL(file);
    });

    // inputfoto4 to base64
    inputfoto4.addEventListener('change', function(e) {
        var file = e.target.files[0];
        var reader = new FileReader();
        reader.onload = function(e) {
            // testvalue.value = e.target.result.split(',')[1];
            img_porto = e.target.result.split(',')[1];
            imgprev4.innerHTML = `<img src="${e.target.result}" style="border-radius: 5px">`;
        };
        reader.readAsDataURL(file);
    });

    var token = document.querySelector('#token').value;
    var id_porto = document.querySelector('#id_porto').value;
    // console.log(id_porto);
    // Edit Portofolio
    $("#btn_edit").click(function(){
        editData();
    })

    function editData(){
        var settings = {
            "url": "https://gate.bisaai.id/bisa_design_prod/portofolio/update_portofolio",
            "method": "PUT",
            "timeout": 0,
            "headers": {
                "Authorization": token,
                "Content-Type": "application/json"
            },
            "data": JSON.stringify({
                "id_portofolio": id_porto,
                "id_kategori_portofolio": $('#kategori').val(),
                "id_customer_course": $('#finished_course').val(),
                "nama_portofolio": $('#namaPP').val(),
                "deskripsi_singkat": des_singkat.root.innerHTML,
                "deskripsi_lengkap": des_lengkap.root.innerHTML,
                "carousel1": img_car1,
                "carousel2": img_car2,
                "carousel3": img_car3,
                "foto_portofolio": img_porto
            }),
        };

        $.ajax(settings).done(function (response) {
            // console.log(response);
            if(response.status_code == 200){
                alert('Portofolio berhasil diubah');
                // alert_success display css to block
                // $('#alert_success').css('display', 'block');
                window.location.href = '/my-portfolio/'+id_porto;
            }else{
                alert('Portofolio gagal diubah');
                // $('#alert_fail').css('display', 'block');
            }
        });
    }
</script>
@endsection




