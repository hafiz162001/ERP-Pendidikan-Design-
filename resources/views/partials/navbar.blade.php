@php
// if no token return to login
// if(!isset($token)){
//     return redirect('/login');
// }
if(session()->has('token')){
    $token = session()->get('token');

    if(!$token){
        return redirect('/login');
    }
    // $urlB = 'https://gate.bisaai.id/elearning2/';

    $media = 'https://gate.bisaai.id/bisa_design_prod/users/media/';

    $curl = curl_init();

    curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://gate.bisaai.id/bisa_design_prod/cek_credential',
    // CURLOPT_URL => $urlB.'cek_credential',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'GET',
    CURLOPT_HTTPHEADER => array(
        'Accept: application/json',
        'Authorization: JWT '.$token,
    ),
    ));

    $response = curl_exec($curl);

    curl_close($curl);
    // to json
    $profileUser = json_decode($response, true);
    // dd($profileUser);
    $photoU = $profileUser['data'][0]['photo'];
    $nameU = $profileUser['data'][0]['name'];
    // nameu to string
    // only get the first name word if first name only have one letter add second word
    // $nameU = explode(' ', $nameU);
// dd($photoU);
}
@endphp
{{-- @dd($profileUser) --}}
{{-- @dd($photoU) --}}
<!--
			=============================================
				Theme Main Menu
			==============================================
			-->
			{{-- <div class="theme-main-menu sticky-menu theme-menu-two">
				<div class="d-flex align-items-center justify-content-center">
					<div class="logo"><a href="/"><img src="{{ asset('images/logo/logo_bisadesign.png') }}" style="height: 50px" alt=""></a></div>

					<nav id="mega-menu-holder" class="navbar navbar-expand-lg">
						<div  class="nav-container">
							<button class="navbar-toggler">
						        <span></span>
						    </button>
						   <div class="navbar-collapse collapse" id="navbarSupportedContent" style="background: #030034">
						   		<div class="d-lg-flex justify-content-between align-items-center">
						   			<ul class="navbar-nav">
						   				<li class="nav-item  position-static">
								            <a class="nav-link" href="/" style="color: white;font-family: 'Fira Code', monospace;">HOME</a>
								        </li>
						   				<li class="nav-item  position-static">
								            <a class="nav-link" href="/portfolio" style="color: white;font-family: 'Fira Code', monospace;">PORTFOLIO</a>
								        </li>
                                        <li class="nav-item dropdown mega-dropdown-md justify-content-center" >
								        	<a class="nav-link dropdown-toggle" data-toggle="dropdown" style="color: white;">COURSE ACADEMY</a>
							                <ul class="dropdown-menu" style="border-radius: 20px">
								                <li>
								                	<div class="row">
                                                        <div class="col-lg-6">
								                			<div class="menu-column">
								                				<h6 class="mega-menu-title" style="font-size: 18px; text-decoration:none">Course Academy</h6>
								                				<ul class="mega-dropdown-list">

								                					<li style="display: flex; margin-bottom:12px; align-items:center">
                                                                        <img src="{{ asset('images/icon/2.png') }}" width="40px" alt="">
                                                                        <a href="/belajar-online" class="dropdown-item">Belajar Online</a>
                                                                    </li>
								                					<li style="display: flex; margin-bottom:12px; align-items:center">
                                                                        <img src="{{ asset('images/icon/5.png') }}" width="40px" alt="">
                                                                        <a href="/premium" class="dropdown-item">Premium Class</a>
                                                                    </li>
								                					<li style="display: flex; margin-bottom:12px; align-items:center">
                                                                        <img src="{{ asset('images/icon/4.png') }}" width="40px" alt="">
                                                                        <a href="/premiumOJT" class="dropdown-item">Premium Class + On Job Training</a>
                                                                    </li>
													                <li style="display: flex; margin-bottom:12px; align-items:center">
                                                                        <img src="{{ asset('images/icon/9.png') }}" width="40px" alt="">
                                                                        <a href="https://tampil.id/event" target="_blank" class="dropdown-item">Webinar</a>
                                                                    </li>
													                <li style="display: flex; margin-bottom:12px; align-items:center">
                                                                        <img src="{{ asset('images/icon/3.png') }}" width="40px" alt="">
                                                                        <a href="/learning-path" class="dropdown-item">Learning Path</a>
                                                                    </li>
								                				</ul>
								                			</div>
								                		</div>
								                		<div class="col-lg-6">
								                			<div class="menu-column">
								                				<h6 class="mega-menu-title" style="font-size: 18px; text-decoration:none">Program Spesial</h6>
								                				<ul class="mega-dropdown-list">
								                					<li style="display: flex; margin-bottom:12px; align-items:center">
                                                                        <div style="width: 90px">
                                                                            <img src="{{ asset('images/icon/prakerja.png') }}" height="20px"  alt="">
                                                                        </div>
                                                                        <a href="/prakerja" class="dropdown-item">Prakerja</a>
                                                                    </li>
													                <li style="display: flex; margin-bottom:12px; align-items:center">
                                                                        <div style="width: 90px">
                                                                            <img src="{{ asset('images/icon/mbkm.png') }}" height="20px"  alt="">
                                                                        </div>
                                                                        <a href="/kampus-merdeka" class="dropdown-item">Kampus Merdeka</a>
                                                                    </li>
													                <li style="display: flex; margin-bottom:12px; align-items:center">
                                                                        <div style="width: 90px">
                                                                            <img src="{{ asset('images/icon/ai.png') }}" height="20px"  alt="">
                                                                        </div>
                                                                        <a href="https://ai-creation.id/" target="_blank" class="dropdown-item">Ai Creation</a>
                                                                    </li>
								                				</ul>
								                			</div>
								                		</div>
								                	</div>
								                </li>
							                </ul>
							            </li>


                                        <li class="nav-item dropdown">
								            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" style="color: white;font-family: 'Fira Code', monospace;">CERTIFICATION</a>
								            <ul class="dropdown-menu" style="border-radius: 20px">
                                                <li style="display: flex; margin-bottom:12px; margin-top: 18px">
                                                    <a href="/certification/international" class="dropdown-item" style="display: flex; align-items:center">
                                                        <div style="width: 40px">
                                                            <img src="{{ asset('images/icon/6.png') }}" height="40px" alt="">
                                                        </div>
                                                        <p>International</p>
                                                    </a>
                                                </li>
                                                <li style="display: flex; margin-bottom:12px;">
                                                    <a href="/certification/national" class="dropdown-item" style="display: flex; align-items:center">
                                                        <div style="width: 40px">
                                                            <img src="{{ asset('images/icon/7.png') }}" height="40px" alt="">
                                                        </div>
                                                        <p>National</p>
                                                    </a>
                                                </li>

								            </ul> <!-- /.dropdown-menu -->
								        </li>

								        <li class="nav-item dropdown">
								            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" style="color: white;font-family: 'Fira Code', monospace;">OTHER PLATFORM</a>
								            <ul class="dropdown-menu" style="border-radius: 20px; ">
                                                <li style="display: flex; margin-bottom:12px; margin-top:18px;">
                                                    <a href="https://bisa.ai/" target="_blank" class="dropdown-item" style="display: flex; align-items:center">
                                                        <div style="width: 50px">
                                                            <img src="{{ asset('images/icon/academy.png') }}" height="30px" alt="">
                                                        </div>
                                                        <p>Bisa Ai Academy</p>
                                                    </a>
                                                </li>
                                                <li style="display: flex; margin-bottom:12px; ">
                                                    <a href="https://bisa.business/" target="_blank" class="dropdown-item" style="display: flex; align-items:center">
                                                        <div style="width: 50px">
                                                            <img src="{{ asset('images/icon/logo_business.png') }}" height="30px" alt="">
                                                        </div>
                                                        <p>Bisa Business</p>
                                                    </a>
                                                </li>
                                                <li style="display: flex; margin-bottom:12px;">
                                                    <a href="https://bisa.network/" target="_blank" class="dropdown-item" style="display: flex; align-items:center">
                                                        <div style="width: 50px">
                                                            <img src="{{ asset('images/icon/mascot-mini.png') }}" height="30px" alt="">
                                                        </div>
                                                        <p>Bisa Network</p>
                                                    </a>
                                                </li>
                                                <li style="display: flex; margin-bottom:12px;">
                                                    <a href="https://coworking.bisa.ai/" target="_blank" class="dropdown-item" style="display: flex; align-items:center">
                                                        <div style="width: 50px">
                                                            <img src="{{ asset('images/icon/coworking.png') }}" height="30px" alt="">
                                                        </div>
                                                        <p>Coworking Space</p>
                                                    </a>
                                                </li>

								            </ul> <!-- /.dropdown-menu -->
								        </li>
								   </ul>

								   <ul class="right-widget">
									   @if(session()->has('token'))
                                       @php
                                             $data = session()->get('data');
                                            $name = explode(' ', $nameU);
                                       @endphp
									   <li class="nav-item dropdown">
                                           <div class="nav-link row user d-flex" href="#" data-toggle="dropdown">

                                               <a class="text-left" style="justify-content: center; color:white; margin:auto;">{{ $name[0] }}</a>
                                               @if ($photoU != null)
                                               <img class="nav-link" src="{{ $media.$photoU }}" height="60px" alt="" >

                                               @endif
                                            </div>

								            <ul class="dropdown-menu" style="left:50%; transform:translateX(-50%); border-radius:20px">

												<li>
                                                    <a href="/user" class="dropdown-item">My Profile</a>
                                                </li>
												<li>
                                                    <a href="/my-course" class="dropdown-item">Course Saya</a>
                                                </li>
												<li>
                                                    <a href="/my-certification" class="dropdown-item">Sertifikasi Saya</a>
                                                </li>
												<li>
                                                    <a href="/my-portfolio" class="dropdown-item">Portofolio Saya</a>
                                                </li>
												<li>
                                                    <a href="/transaction" class="dropdown-item">Riwayat Pembelian</a>
                                                </li>
                                                <li>
                                                    <a href="/logout" class="dropdown-item">Logout</a>
                                                </li>
								            </ul> <!-- /.dropdown-menu -->
								        </li>
									   @else
									   <li class="d-sm-flex">
										<ul class="user-login-button">
											<li>
                                                    <a href="/login">
                                                        <button class="signUp-action text-center ">LOGIN</button>
                                                    </a>
											</li>
										</ul>
									    </li>
										@endif
								   </ul>
						   		</div>
						   	</div>
						</div>
					</nav>
				</div>
			</div> <!-- /.theme-main-menu --> --}}

            			<!--
			=============================================
				Theme Main Menu
			==============================================
			-->
			<div class="theme-main-menu sticky-menu theme-menu-one center-white" style="background: #030034">
				<div class="d-flex align-items-center justify-content-center">
					<div class="logo"><a href="/"><img src="{{ asset('images/logo/logo_bisadesign.png') }}" style="height: 50px" alt=""></a></div>
					<nav id="mega-menu-holder" class="navbar navbar-expand-lg">
						<div class="nav-container">
							<button class="navbar-toggler">
						        <span></span>
						    </button>
						   <div class="navbar-collapse collapse" id="navbarSupportedContent" style="background: #030034">
						   		<div class="d-lg-flex align-items-center">
						   			<ul class="navbar-nav">
                                        {{-- <li class="nav-item  position-static">
								            <a class="nav-link" href="/" style="color: white;font-family: 'Fira Code', monospace;">HOME</a>
								        </li> --}}
                                        <li class="nav-item  position-static">
								            <a class="nav-link" href="/portofolio" style="color: white;font-family: 'Fira Code', monospace;">PORTFOLIO</a>
								        </li>
                                        <li class="nav-item dropdown">
								            <a class="nav-link dropdown-toggle"  data-toggle="dropdown">CERTIFICATION</a>
								            <ul class="dropdown-menu" style="border-radius: 20px">
								            	<li style="display: flex; margin-bottom:12px; margin-top: 18px">
                                                    <a href="/certification" class="dropdown-item" style="display: flex; align-items:center">
                                                        <div style="width: 40px">
                                                            <img src="{{ asset('images/icon/6.png') }}" height="40px" alt="">
                                                        </div>
                                                        <p>International</p>
                                                    </a>
                                                </li>
                                                <li style="display: flex; margin-bottom:12px;">
                                                    <a href="/certification/industry" class="dropdown-item" style="display: flex; align-items:center">
                                                        <div style="width: 40px">
                                                            <img src="{{ asset('images/icon/7.png') }}" height="40px" alt="">
                                                        </div>
                                                        <p>National</p>
                                                    </a>
                                                </li>
								            </ul> <!-- /.dropdown-menu -->
								        </li>
								        <li class="nav-item dropdown mega-dropdown-md">
								        	<a class="nav-link dropdown-toggle" data-toggle="dropdown" >COURSE ACADEMY</a>
							                <ul class="dropdown-menu" style="border-radius: 20px">
								                <li>
								                	<div class="row">
								                		<div class="col-lg-6">
								                			<div class="menu-column">
								                				<h6 class="mega-menu-title">Course Academy</h6>
								                				<ul class="mega-dropdown-list">
								                					{{-- <li><a href="about-us(cs).html" class="dropdown-item">Customer Support</a></li>
                                                                     --}}
                                                                     <li style="display: flex; margin-bottom:12px; align-items:center">
                                                                        <img src="{{ asset('images/icon/2.png') }}" width="40px" alt="">
                                                                        <a href="/course/all_course/1" class="dropdown-item">Belajar Online</a>
                                                                    </li>
                                                                    <li style="display: flex; margin-bottom:12px; align-items:center">
                                                                        <img src="{{ asset('images/icon/5.png') }}" width="40px" alt="">
                                                                        <a href="/course/all_course/3" class="dropdown-item">Premium Class</a>
                                                                    </li>
								                					<li style="display: flex; margin-bottom:12px; align-items:center">
                                                                        <img src="{{ asset('images/icon/4.png') }}" width="40px" alt="">
                                                                        <a href="/course/all_course/5" class="dropdown-item">Premium Class + On Job Training</a>
                                                                    </li>
													                <li style="display: flex; margin-bottom:12px; align-items:center">
                                                                        <img src="{{ asset('images/icon/9.png') }}" width="40px" alt="">
                                                                        <a href="https://tampil.id/event" target="_blank" class="dropdown-item">Webinar</a>
                                                                    </li>
													                <li style="display: flex; margin-bottom:12px; align-items:center">
                                                                        <img src="{{ asset('images/icon/3.png') }}" width="40px" alt="">
                                                                        <a href="/learningpath" class="dropdown-item">Learning Path</a>
                                                                    </li>
								                				</ul>
								                			</div>
								                		</div>
								                		<div class="col-lg-6">
								                			<div class="menu-column">
								                				<h6 class="mega-menu-title">Program Spesial</h6>
								                				<ul class="mega-dropdown-list" >
								                					<li style="display: flex; margin-bottom:12px; align-items:center">
                                                                        <div style="width: 90px">
                                                                            <img src="{{ asset('images/icon/prakerja.png') }}" height="20px"  alt="">
                                                                        </div>
                                                                        <a href="/prakerja" class="dropdown-item">Prakerja</a>
                                                                    </li>
													                <li style="display: flex; margin-bottom:12px; align-items:center">
                                                                        <div style="width: 90px">
                                                                            <img src="{{ asset('images/icon/mbkm.png') }}" height="20px"  alt="">
                                                                        </div>
                                                                        <a href="/kampusmerdeka" class="dropdown-item">Kampus Merdeka</a>
                                                                    </li>
													                <li style="display: flex; margin-bottom:12px; align-items:center">
                                                                        <div style="width: 90px">
                                                                            <img src="{{ asset('images/icon/ai.png') }}" height="20px"  alt="">
                                                                        </div>
                                                                        <a href="https://ai-creation.id/" target="_blank" class="dropdown-item">Ai Creation</a>
                                                                    </li>
								                				</ul>
								                			</div>
								                		</div>
								                	</div>
								                </li>
							                </ul>
							            </li>

								        <li class="nav-item dropdown">
								            <a class="nav-link dropdown-toggle" data-toggle="dropdown">OTHER PLATFORM</a>
								            <ul class="dropdown-menu" style="border-radius: 20px">
								            	<li style="display: flex; margin-bottom:12px; margin-top:18px;">
                                                    <a href="https://bisa.ai/" target="_blank" class="dropdown-item" style="display: flex; align-items:center">
                                                        <div style="width: 50px">
                                                            <img src="{{ asset('images/icon/academy.png') }}" height="30px" alt="">
                                                        </div>
                                                        <p>Bisa Ai Academy</p>
                                                    </a>
                                                </li>
                                                <li style="display: flex; margin-bottom:12px; ">
                                                    <a href="https://bisa.business/" target="_blank" class="dropdown-item" style="display: flex; align-items:center">
                                                        <div style="width: 50px">
                                                            <img src="{{ asset('images/icon/logo_business.png') }}" height="30px" alt="">
                                                        </div>
                                                        <p>Bisa Business</p>
                                                    </a>
                                                </li>
                                                <li style="display: flex; margin-bottom:12px;">
                                                    <a href="https://bisa.network/" target="_blank" class="dropdown-item" style="display: flex; align-items:center">
                                                        <div style="width: 50px">
                                                            <img src="{{ asset('images/icon/mascot-mini.png') }}" height="30px" alt="">
                                                        </div>
                                                        <p>Bisa Network</p>
                                                    </a>
                                                </li>
                                                <li style="display: flex; margin-bottom:12px;">
                                                    <a href="https://coworking.bisa.ai/" target="_blank" class="dropdown-item" style="display: flex; align-items:center">
                                                        <div style="width: 50px">
                                                            <img src="{{ asset('images/icon/coworking.png') }}" height="30px" alt="">
                                                        </div>
                                                        <p>Coworking Space</p>
                                                    </a>
                                                </li>
								            </ul> <!-- /.dropdown-menu -->
								        </li>


								   </ul>

									<ul class="right-button-group d-flex">
                                        @if(session()->has('token'))
                                        @php
                                                $data = session()->get('data');
                                                $name = explode(' ', $nameU);
                                                $name = $name[0];
                                        @endphp
                                        <ul class="nav-item dropdown">
								            <a class="nav-link justify-content-end text-right" data-toggle="dropdown" style="font-size: 20px;">
                                                <div style="display: flex; align-items:flex-end;">
                                                    @if ($photoU != null)
                                                       <img class="nav-link" src="{{ $media.$photoU }}" height="35px" alt="" >
                                                    @endif
                                                    {{ $name }}
                                                </div>
                                            </a>
								            <ul class="dropdown-menu">
								            	<li style="margin-bottom: -15px">
                                                    <a href="/user" class="dropdown-item text-left" style="font-family: Roboto, sans-serif; color:rgb(56, 56, 56)">My Profile</a>
                                                </li>
								            	<li style="margin-bottom: -15px;">
                                                    <a href="/my-course" class="dropdown-item text-left" style="font-family: Roboto, sans-serif; color:rgb(56, 56, 56)">My Course</a>
                                                </li>
								            	<li style="margin-bottom: -15px;">
                                                    <a href="/my-certificate" class="dropdown-item text-left" style="font-family: Roboto, sans-serif; color:rgb(56, 56, 56)">My Certificate</a>
                                                </li>
								            	<li style="margin-bottom: -15px;">
                                                    <a href="/my-portfolio" class="dropdown-item text-left" style="font-family: Roboto, sans-serif; color:rgb(56, 56, 56)">My Portfolio</a>
                                                </li>
                                                <li style="margin-bottom: -15px;">
                                                    <a href="/my-certification" class="dropdown-item text-left" style="font-family: Roboto, sans-serif; color:rgb(56, 56, 56)">Certification</a>
                                                </li>
								            	<li style="margin-bottom: -15px;">
                                                    <a href="/transaction" class="dropdown-item text-left" style="font-family: Roboto, sans-serif; color:rgb(56, 56, 56)">Transaction</a>
                                                </li>
								            	<li style="margin-bottom: -15px;">
                                                    <a href="/logout" class="dropdown-item text-left" style="font-family: Roboto, sans-serif; color:rgb(56, 56, 56)">Logout</a>
                                                </li>
								            </ul> <!-- /.dropdown-menu -->
								        </ul>
                                        @endif

                                        @if (!session()->has('token'))
										<li>
											<a href="/login" class="signUp-action" style="font-size: 18px">LOGIN</a>
										</li>
                                        @endif

									</ul>
						   		</div>
						   	</div>
						</div>
					</nav>
				</div>
			</div> <!-- /.theme-main-menu -->

