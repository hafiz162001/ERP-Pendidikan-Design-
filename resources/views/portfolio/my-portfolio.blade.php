@php
    $mediaB = 'https://gate.bisaai.id/bisa_design_prod/portofolio/media/foto_portofolio/';
@endphp

{{-- @dd($finished_crs, $kategori) --}}

@extends('layouts.course')
@if(session()->has('successPorto'))
    <div class="alert alert-success alert-dismissible fade show" role="alert" style="position:fixed; top:150px; right:20px; z-index:9999">
        {{ session()->get('successPorto') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
@if(session()->has('errorPorto'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert" style="position:fixed; top:150px; right:20px; z-index:9999">
        {{ session()->get('errorPorto') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
<div class="alert alert-danger alert-dismissible fade show" id="alert_fail" role="alert" style="position:fixed; bottom:15px; left:10px; z-index:9999; display:none">
    Gagal Menambah Portofolio
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>

@section('content')

<!-- /.portfolio-details-one -->
			<!--
			=============================================
				Fancy Hero Six
			==============================================
			-->
			<div class="fancy-hero-six" >
				<div class="container">
					<h4 class="heading" style="color: white"><strong>Daftar Portfolioku</strong></h4>
					{{-- <p class="sub-heading" style="color: white">Lihat Portofolio yang dihasilkan peserta pelatihan BISA Design Academy</p> --}}
				</div>

			</div> <!-- /.fancy-hero-six -->

			<!--
			=============================================
				Fancy Portfolio Four
			==============================================
			-->
			<div class="fancy-portfolio-four lg-container" style="margin-top: -10px; background-color:#110743; padding-top:50px">
				<div class="container">
					<div class="pb-130 md-pb-90">

                        <div class="row">
                            <div class="col-md-4 mb-2">
                                <input class="form-control form-control-lg" type="search" id="search" placeholder="Cari Portofolio"  style="height: 60px; border-radius:30px; font-size:18px;">
                            </div>
                            <div class="col-md-4 mb-2">
                                <select class="form-control form-control-lg" id="status" style="height: 60px; font-size:18px;">
                                    <option value="">Semua Status</option>
                                    <option value="1">Menunggu Approval</option>
                                    <option value="2">Approved</option>
                                </select>
                            </div>

                            <div class="col-md-4 mb-2 justify-content-end">
                                <div class="col d-flex justify-content-center">
                                    <button type="button" style="border-radius: 30px" class="btn theme-btn-fourteen" data-toggle="modal" data-target="#exampleModal">
                                        Buat Portfolio
                                    </button>
                                </div>
                            </div>
                        </div>


				        <div class="container gutter-space-two d-flex flex-wrap" id="content"  style="margin-top: 30px; min-height:400px;">
                            @if(empty($data))
                            <div class="col-lg-12 item mix SS m-auto">
                                <h5 class="text-center" style="color: white">Tidak ada data</h5>
                            </div>
                            {{-- <div class="card">
                                <div class="card-body" style="background-color: rgb(218, 218, 218)">
                                </div>
                            </div> --}}
                            @else
                            @foreach ($data as $dat)
							<div class="col-lg-4 item mix SS">
                                <div class="block-style-twentyTwo" onclick="location.href='my-portfolio/{{ $dat['id_portofolio'] }}';" style="border-radius:30px; background:linear-gradient(180deg, #D9D9D9 0%, rgba(217, 217, 217, 0) 100%);" id="course" >
                                    <div class="row" style="border-radius: 20px 20px 0 0; margin-top:-40px; display:block; position:relative; background:linear-gradient(180deg, #D9D9D9 0%, rgba(217, 217, 217, 0) 100%);">
                                        <div>
                                            <img src="{{ $mediaB.$dat['foto_portofolio'] }}" style="margin: 0 auto; border-radius:20px 20px 0 0" alt="">
                                        </div>
                                        @if ($dat['status_portofolio'] == 2)
                                        <span class="badge badge-success" style="position: absolute; top:15px; left:15px;">Aktif</span>
                                        @elseif ($dat['status_portofolio'] == 1)
                                        <span class="badge badge-warning" style="position: absolute; top:15px; left:15px;">Belum Diapprove</span>
                                        @endif
                                    </div>
                                    <h4 style="color: white">{{ $dat['nama_portofolio'] }}</h4>
                                    <div class="grid-container mt-3" style="display:grid; grid-template-columns: 100% ;">
                                        <div class="grid-item text-left">
                                            <p style="color: white">Course: {{ $dat['nama_course'] }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
				        </div> <!-- /.mixitUp-container -->
                        @endif
                        @if (count($data) == 10)
                        <div class="row mb-4 justify-content-center">
                            <button class="theme-btn-fourteen mx-auto" id="loadmore"> Loadmore </button>
                        </div>
                        @endif
					</div>
				</div>
			</div> <!-- /.fancy-portfolio-four -->

@endsection
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static" >
    <div class="modal-dialog modal-xl modal-dialog-centered" >
    <div class="modal-content" >
        {{-- <form action="/my-portfolio" method="POST"> --}}
            {{-- @csrf --}}
            <div class="modal-header" style="border: none">
                <h5 class="modal-title" id="exampleModalLabel"><strong>Tambah Portfolio</strong> </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="col mt-4">
                <h4><strong>Photo Project</strong></h4>
            </div>

            <div class="row" style="margin: 20px 0 50px 0">
                <div class="col-md-3 justify-content-center">
                    <div id="imgprev1">
                        <img src="{{ asset('images/doc/blankdoc.jpg') }}" style="border-radius: 5px" alt="">
                    </div>
                        <div class="form-group mt-2">
                          <label for="exampleFormControlFile1">Add Project Photo max 2mb</label>
                          <input type="file" class="inputFoto1 form-control-file" id="inputFoto1" accept=".png, .jpg, .jpeg, .PNG, .JPG, .JPEG" required>
                          {{-- <input type="hidden" id="photo1_base64" name="photo1_base64" > --}}
                        </div>
                </div>
                <div class="col-md-3 justify-content-center">
                    <div id="imgprev2">
                        <img src="{{ asset('images/doc/blankdoc.jpg') }}" style="border-radius: 5px" alt="">
                    </div>
                        <div class="form-group mt-2">
                          <label for="exampleFormControlFile1">Add Project Photo max 2mb</label>
                          <input type="file" class="inputFoto2 form-control-file" id="inputFoto2" accept=".png, .jpg, .jpeg, .PNG, .JPG, .JPEG">
                          {{-- <input type="hidden" id="photo2_base64" name="photo2_base64"> --}}
                        </div>
                </div>
                <div class="col-md-3 justify-content-center">
                    <div id="imgprev3">
                        <img src="{{ asset('images/doc/blankdoc.jpg') }}" style="border-radius: 5px" alt="">
                    </div>
                        <div class="form-group mt-2">
                          <label for="exampleFormControlFile1">Add Project Photo max 2mb</label>
                          <input type="file" class="inputFoto3 form-control-file" id="inputFoto3" accept=".png, .jpg, .jpeg, .PNG, .JPG, .JPEG">
                          {{-- <input type="hidden" id="photo3_base64" name="photo3_base64"> --}}
                        </div>
                </div>
                <div class="col-md-3 justify-content-center">
                    <div id="imgprev4">
                        <img src="{{ asset('images/doc/blankdoc.jpg') }}" style="border-radius: 5px" alt="" >
                    </div>
                    <div class="form-group mt-2">
                        <label for="exampleFormControlFile1" style="color: red">Add Thumbnail max 2mb</label>
                        <input type="file" class="inputFoto4 form-control-file" id="inputFoto4" accept=".png, .jpg, .jpeg, .PNG, .JPG, .JPEG" required>
                        {{-- <input type="hidden" id="thumb_base64" name="thumb_base64"> --}}
                    </div>
                </div>
            </div>


            <div class="card" style="border: none">
                <div class="col">
                    <h4><strong>Detail Project</strong></h4>

                </div>
                    <div class="card-body">
                            <div class="form-group">
                              <label for="namaPP">Nama Portfolio</label>
                              <input type="text" class="form-control" id="namaPP" name="name" aria-describedby="namaPP" maxlength="50" style="height: 55px">
                              <small id="namaPP" class="form-text text-muted">Maksimal 50 karakter.</small>
                            </div>
                            <div class="form-group">
                                <div id="QuillEditor" style="min-height: 70px; border-radius:0 0 10px 10px"></div>

                            </div>
                            @if ($finished_crs != null)
                            <div class="form-group">
                                <label for="finished_crs">Pilih course yang sudah berhasil/lulus</label>
                                <select class="form-control" id="finished_crs" name="finished_crs" style="height: 55px">
                                    @foreach ($finished_crs as $finish)
                                    <option value="{{ $finish['id_customer_course'] }}">{{ $finish['nama_course'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @endif
                            <div class="form-group">
                                <label for="kategori">Pilih Kategori</label>
                                <select class="form-control" id="kategori" name="kategori" style="height: 55px">
                                @foreach ($kategori as $kat)
                                    <option value="{{ $kat['id_kategori_portofolio'] }}">{{ $kat['nama_kategori_portofolio'] }}</option>
                                @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="QuillEditor2">Deskripsi Lengkap</label>
                                <div id="QuillEditor2" style="min-height:100px; border-radius:0 0 10px 10px"></div>
                            </div>
                    </div>
                  </div>

                  <input type="hidden" id="token" value="{{ $token }}">
                  <input type="hidden" name="testvalue" id="testvalue">
            @if ($finished_crs != null)
            <div class="modal-footer" style="border: none">
            {{-- <button type="button" class="btn btn-danger mx-auto" data-dismiss="modal">Close</button> --}}
                <button type="submit" id="btn_submit" class="btn theme-btn-fourteen-2 mx-auto">Submit</button>
            </div>
            @else
            <div class="modal-footer" style="border: none">
                {{-- <button type="button" class="btn btn-danger mx-auto" data-dismiss="modal">Close</button> --}}
                <div class="mx-auto" style="margin-bottom: 40px">
                    <strong style="color: black">
                        <p>Anda baru dapat membuat portofolio setelah menyelesaikan satu course atau lebih</p>
                    </strong>
                </div>
            </div>
            @endif
        {{-- </form> --}}
    </div>
    </div>
</div>

@section('js_bot')

<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
<script src="{{ asset('js/ImageResize.js') }}"></script>
<script>
var token = $('#token').val();
// console.log(token);
    $(document).ready(function(){
        var token = $('#token').val();
        var page = 1;
        var no = 1;

        $('#search').keyup(function(){
            page = 1;
            showContent(page);
        });

        // status
        $('#status').change(function(){
            page = 1;
            showContent(page);
        });

        // loadmore
        $('#loadmore').click(function(){
            page++;
            showContent(page);
        });

        function showContent(pagenow = 1){

            var settings = {
                "url": "https://gate.bisaai.id/bisa_design_prod/portofolio/get_customer_portofolio?mode=2",
                "method": "GET",
                "timeout": 0,
                "data": {
                    page: pagenow,
                    search: $('#search').val(),
                    status_portofolio: $('#status').val(),
                },
                "headers": {
                    "Authorization": token
                },
            };

            $.ajax(settings).done(function (response) {
                // console.log(response);
                var newContent = '';

                $.each(response.data, function(i, item){
                    badge = '';
                    if(item.status_portofolio == 1){
                        badge += '<span class="badge badge-warning" style="position: absolute; top:15px; left:15px;">Belum Diapprove</span>';
                    }else{
                        badge += '<span class="badge badge-success" style="position: absolute; top:15px; left:15px;">Aktif</span>';
                    }
                    newContent += `<div class="col-md-4 item mix SS">
                                        <div class="block-style-twentyTwo" onclick="location.href='my-portfolio/${item.id_portofolio}';" style="background:linear-gradient(180deg, #D9D9D9 0%, rgba(217, 217, 217, 0) 100%);" id="course" >
                                            <div class="row" style="margin-top:-40px; display:block; position:relative; background:linear-gradient(180deg, #D9D9D9 0%, rgba(217, 217, 217, 0) 100%);">
                                                <div>
                                                    <img src="https://gate.bisaai.id/bisa_design_prod/portofolio/media/foto_portofolio/${item.foto_portofolio}" style="margin: 0 auto" alt="">
                                                </div>
                                                ${badge}
                                            </div>
                                            <h4 style="color: white">${item.nama_portofolio}</h4>
                                            <div class="grid-container mt-3" style="display:grid; grid-template-columns: 100% ;">
                                                <div class="grid-item text-left">
                                                    <p style="color: white">Course: ${item.nama_course}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>`;

                no++;
                });
                if(pagenow == 1){
                    $('#content').html(newContent);
                }else{
                    $('#content').append(newContent);
                }

                // hide loadmore button if no more data
                if(response.data.length < 10){
                    $('#loadmore').hide();
                }else{
                    $('#loadmore').show();
                }

                if(response.data.length == 0){
                        $('#content').html(`<div class="col-md-12 text-center m-auto" >
                                                <h4 style="color:white">Tidak ada data</h4>
                                            </div>`);
                    }


            });

        }
    })
    // get selected select finished_crs
    var selected_crs = $('#finished_crs').val();
    var selected_crs = parseInt(selected_crs);

    // get selected select kategori
    var selected_kategori = $('#kategori').val();
    var selected_kategori = parseInt(selected_kategori);

    // get namaPP value
    var namaPP = $('#namaPP').val();

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
    var inputfoto1 = document.querySelector('#inputfoto1');
    var inputfoto2 = document.querySelector('#inputfoto2');
    var inputfoto3 = document.querySelector('#inputfoto3');
    var inputfoto4 = document.querySelector('#inputfoto4');

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

    $("#btn_submit").click(function() {
        submitData();
    })

    function submitData(){
        if(img_porto == "" || img_porto == null){
            alert('Foto Thumbnail Portofolio harus diisi');
            return false;
        }
        if(img_car1 == "" || img_car2 == "" || img_car3 == ""){
            alert('Salah Satu Foto Carousel harus diisi');
            return false;
        }
        var settings = {
            "url": "https://gate.bisaai.id/bisa_design_prod/portofolio/insert_portofolio",
            "method": "POST",
            "timeout": 0,
            "headers": {
                "Authorization": token,
                "Content-Type": "application/json"
            },
            "data": JSON.stringify({
                "id_kategori_portofolio": $('#kategori').val(),
                "id_customer_course": $('#finished_crs').val(),
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
            if (response.status_code == 200) {
                alert('Portofolio berhasil ditambahkan');
                window.location.href = '/my-portfolio';
            } else {
                alert('Portofolio gagal ditambahkan, mohon lengkapi data akun anda');
            }
        });
    }

</script>
@endsection

