<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Etrain</title>
    <link rel="icon" href="{{url('etrain/img/favicon.png')}}">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{url('etrain/css/bootstrap.min.css')}}">
    <!-- animate CSS -->
    <link rel="stylesheet" href="{{url('etrain/css/animate.css')}}">
    <!-- owl carousel CSS -->
    <link rel="stylesheet" href="{{url('etrain/css/owl.carousel.min.css')}}">
    <!-- themify CSS -->
    <link rel="stylesheet" href="{{url('etrain/css/themify-icons.css')}}">
    <!-- flaticon CSS -->
    <link rel="stylesheet" href="{{url('etrain/css/flaticon.css')}}">
    <link rel="stylesheet" href="{{url('etrain/css/nice-select.css')}}">
    <!-- font awesome CSS -->
    <link rel="stylesheet" href="{{url('etrain/css/magnific-popup.css')}}">
    <!-- swiper CSS -->
    <link rel="stylesheet" href="{{url('etrain/css/slick.css')}}">
    <!-- style CSS -->
    <link rel="stylesheet" href="{{url('etrain/css/style.css')}}">
</head>

<body>
    <!--::header part start::-->
    <header class="main_menu single_page_menu">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <nav class="navbar navbar-expand-lg navbar-light">
                        <a class="navbar-brand logo_1" href="index.html"> <img src="/etrain/img/single_page_logo.png" alt="logo"> </a>
                        <a class="navbar-brand logo_2" href="index.html"> <img src="/etrain/img/logo.png" alt="logo"> </a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse main-menu-item justify-content-end"
                            id="navbarSupportedContent">
                            <ul class="navbar-nav align-items-center">
																<li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="blog.html" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Data
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="/data_santri">Santri</a>
                                        <a class="dropdown-item" href="/data_wali">Wali Santri</a>
                                        <a class="dropdown-item" href="/data_file">File Download</a>
                                    </div>
                                </li>
																
                                <li class="nav-item">
                                    @if(Auth::check())
                                    <span class="nav-link">Halo, {{ Auth::user()->username }}</span>
                                    @endif
                                </li>
                                <li class="d-none d-lg-block">
                                    <a class="btn_1" href="/logout">Log out</a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- Header part end-->
	
	<!-- breadcrumb start-->
    <section class="breadcrumb breadcrumb_bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb_iner text-center">
                        <div class="breadcrumb_iner_item">
							<h2>Santri</h2>
							<p>Edit formulir pendaftaran</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
	<!-- End banner Area -->

	<!-- Start Align Area -->
	<div class="whole-wrap">
		<div class="container box_1170">
			
			{{-- Start data santri --}}
				<div class="section-top-border">
					<div class="row justify-content-between">
					<div class="col-lg-6 col-md-8">
						<h3 class="mb-30">Data Santri</h3>
                        @foreach ($santri as $item)
                        <form action="/data_santri/{{$item->id_wali_santri}}" method="POST">
                            @method('patch')
                            @csrf
                        @endforeach
							<div class="input-group-icon form-group">
									<label for="nama"> Wilayah </label>
								<div class="icon"><i class="fa fa-plane" aria-hidden="true"></i></div>
								<div class="form-select" id="default-select"">
									<select name="id_wilayah">
										@foreach ($santriWilayah as $list)
											<option value={{$list->id_wilayah}}>{{$list->nama_wilayah}}</option>
										@endforeach
										
										@foreach ($wilayah as $list)
											<option value={{$list->id_wilayah}}>{{$list->nama_wilayah}}</option>
										@endforeach
									</select>
								</div>
							</div>

							<div class="input-group-icon form-group">
									<label for="nama"> Pendidikan Formal </label>
								<div class="icon"><i class="fa fa-plane" aria-hidden="true"></i></div>
								<div class="form-select" id="default-select"">
									<select name="kd_jp_formal">
										@foreach ($santriPenFormal as $list)
											<option value={{$list->kd_jp_formal}}>{{$list->jenjang_pendidikan}}</option>
										@endforeach
										
										@foreach ($penFormal as $list)
											<option value={{$list->kd_jp_formal}}>{{$list->jenjang_pendidikan}}</option>
										@endforeach
									</select>
								</div>
							</div>

							<div class="input-group-icon form-group">
									<label for="nama"> Pendidikan Diniah </label>
								<div class="icon"><i class="fa fa-plane" aria-hidden="true"></i></div>
								<div class="form-select" id="default-select"">
									<select name="kd_jp_diniah">
										@foreach ($santriPenDiniah as $list)
											<option value={{$list->kd_jp_diniah}}>{{$list->jenjang_pendidikan}}</option>
										@endforeach
										
										@foreach ($penDiniah as $list)
											<option value={{$list->kd_jp_diniah}}>{{$list->jenjang_pendidikan}}</option>
										@endforeach
									</select>
								</div>
							</div>

							<div class="input-group-icon form-group">
									<label for="nama"> Jurusan </label>
								<div class="icon"><i class="fa fa-plane" aria-hidden="true"></i></div>
								<div class="form-select" id="default-select"">
									<select name="kd_jurusan">
										@foreach ($santriPenJurusan as $list)
											<option value={{$list->kd_jurusan}}>{{$list->nm_jurusan}}</option>
										@endforeach
										
										@foreach ($penJurusan as $list)
											<option value={{$list->kd_jurusan}}>{{$list->nm_jurusan}}</option>
										@endforeach
									</select>
								</div>
							</div>

							@foreach ($santri as $item)
								
								<div class="form-group">
									<label for="nama"> Nama Santri</label>
									<input type="text" id="nama" name="nama"
									required class="single-input" value="{{ $item->nama }}">
								</div>
								<div class="form-group">
									<label for="tempat_lahir"> Tempat Lahir</label>
									<input type="text" id="tempat_lahir" name="tempat_lahir"
									required class="single-input" value="{{ $item->tempat_lahir }}">
								</div>
								<div class="form-group">
									<label for="tanggal_lahir"> Tanggal Lahir</label>
									<input type="date" id="tgl" name="tgl"
									required class="single-input" value="{{ $item->tgl }}">
								</div>
								<div class="form-group">
									<label for="jenis_kelamin"> Jenis Kelamin</label><br>
									<label class="radio-inline"><input type="radio" name="jenis_kelamin" value="L" {{ ($item->jenis_kelamin=="L") ? "checked" : "" }}> Laki-laki</label>
									<label class="radio-inline ml-3"><input type="radio" name="jenis_kelamin" value="P" {{ ($item->jenis_kelamin=="P") ? "checked" : "" }}> Perempuan</label>
								</div>
								<div class="form-group">
									<label for="alamat"> Alamat</label>
									<textarea id="alamat" name="alamat" class="single-textarea" placeholder="Message" required>{{ $item->alamat }}</textarea>
								</div>
								<div class="form-group">
									<label for="email"> Email</label>
									<input type="text" id="email" name="email"
									required class="single-input" value="{{ $item->email }}">
								</div>
								<div class="form-group">
									<label for="asal_sekolah"> Asal Sekolah</label>
									<input type="text" id="asal_sekolah" name="asal_sekolah"
									required class="single-input" value="{{ $item->asal_sekolah }}">
								</div>
								<div class="form-group">
									<label for="telephone"> Telephone</label>
									<input type="text" id="telephone" name="telephone"
									required class="single-input" value="{{ $item->telephone }}">
								</div>

								@endforeach

								<div class="form-group">
									<input type="submit" class="genric-btn info radius" value="Simpan">
								</div>

						</form>
					</div>
					<div class="col-lg-4">
                        <div class="blog_right_sidebar">
                            <aside class="single_sidebar_widget newsletter_widget">
                                <h4 class="widget_title">Kartu Keluarga</h4>
                                @foreach ($santri as $item)
                                <img src="/uploads/santri_foto_kk/{{ $item->foto_kk }}" alt="kk" width="100%" height="auto">
                                @endforeach
                            </aside>
                        </div>
                        <div class="blog_right_sidebar">
                            <aside class="single_sidebar_widget newsletter_widget">
                                <h4 class="widget_title">Foto Santri</h4>
                                @foreach ($santri as $item)
                                <img src="/uploads/santri_foto/{{ $item->foto }}" alt="kk" width="100%" height="auto">
                                @endforeach
                            </aside>
                        </div>

                        {{-- <div class="single-element-widget">
                            <h3 class="mb-3">Kartu Keluarga</h3>
                            @foreach ($santri as $item)
                            <img src="/uploads/santri_foto_kk/{{ $item->foto_kk }}" alt="kk" width="100%" height="auto">
                            <form action="{{ route('santri.PhotoKK', $item->id_wali_santri) }}" method="post" enctype="multipart/form-data">
                                @method('patch')
                                @csrf
                                <input type="file" name="foto_kk" class="mt-2">
                                <button type="submit" class="genric-btn info mt-4 radius">Simpan</button>
                                @error('foto_kk')
                                    <div style="color:red">{{ $message }}</div>
                                @enderror
                            </form>
                            @endforeach
                        </div> --}}

                    </div>
                    
				</div>
			</div>
			{{-- End data santri --}}

		</div>
	</div>
	<!-- End Align Area -->

	<!-- footer part start-->
    <footer class="footer-area">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-sm-6 col-md-4 col-xl-3">
                    <div class="single-footer-widget footer_1">
                        <a href="index.html"> <img src="/etrain/img/logo.png" alt=""> </a>
                        <p>But when shot real her. Chamber her one visite removal six
                            sending himself boys scot exquisite existend an </p>
                        <p>But when shot real her hamber her </p>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 col-xl-4">
                    <div class="single-footer-widget footer_2">
                        <h4>Newsletter</h4>
                        <p>Stay updated with our latest trends Seed heaven so said place winged over given forth fruit.
                        </p>
                        <form action="#">
                            <div class="form-group">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" placeholder='Enter email address'
                                        onfocus="this.placeholder = ''"
                                        onblur="this.placeholder = 'Enter email address'">
                                    <div class="input-group-append">
                                        <button class="btn btn_1" type="button"><i class="ti-angle-right"></i></button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div class="social_icon">
                            <a href="#"> <i class="ti-facebook"></i> </a>
                            <a href="#"> <i class="ti-twitter-alt"></i> </a>
                            <a href="#"> <i class="ti-instagram"></i> </a>
                            <a href="#"> <i class="ti-skype"></i> </a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 col-md-4">
                    <div class="single-footer-widget footer_2">
                        <h4>Contact us</h4>
                        <div class="contact_info">
                            <p><span> Address :</span> Hath of it fly signs bear be one blessed after </p>
                            <p><span> Phone :</span> +2 36 265 (8060)</p>
                            <p><span> Email : </span>info@colorlib.com </p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="copyright_part_text text-center">
                        <div class="row">
                            <div class="col-lg-12">
                                <p class="footer-text m-0"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="ti-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- footer part end-->

    <!-- jquery plugins here-->
    <!-- jquery -->
    <script src="{{url('etrain/js/jquery-1.12.1.min.js')}}"></script>
    <!-- popper js -->
    <script src="{{url('etrain/js/popper.min.js')}}"></script>
    <!-- bootstrap js -->
    <script src="{{url('etrain/js/bootstrap.min.js')}}"></script>
    <!-- easing js -->
    <script src="{{url('etrain/js/jquery.magnific-popup.js')}}"></script>
    <!-- swiper js -->
    <script src="{{url('etrain/js/swiper.min.js')}}"></script>
    <!-- swiper js -->
    <script src="{{url('etrain/js/masonry.pkgd.js')}}"></script>
    <!-- particles js -->
    <script src="{{url('etrain/js/owl.carousel.min.js')}}"></script>
    <script src="{{url('etrain/js/jquery.nice-select.min.js')}}"></script>
    <!-- swiper js -->
    <script src="{{url('etrain/js/slick.min.js')}}"></script>
    <script src="{{url('etrain/js/jquery.counterup.min.js')}}"></script>
    <script src="{{url('etrain/js/waypoints.min.js')}}"></script>
    <!-- custom js -->
    <script src="{{url('etrain/js/custom.js')}}"></script>
</body>

</html>