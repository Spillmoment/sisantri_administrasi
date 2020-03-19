<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Etrain</title>
    <link rel="icon" href={{url('etrain/img/favicon.png')}}>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href={{url('etrain/css/bootstrap.min.css')}}>
    <!-- animate CSS -->
    <link rel="stylesheet" href={{url('etrain/css/animate.css')}}>
    <!-- owl carousel CSS -->
    <link rel="stylesheet" href={{url('etrain/css/owl.carousel.min.css')}}>
    <!-- themify CSS -->
    <link rel="stylesheet" href={{url('etrain/css/themify-icons.css')}}>
    <!-- flaticon CSS -->
    <link rel="stylesheet" href={{url('etrain/css/flaticon.css')}}>
    <!-- font awesome CSS -->
    <link rel="stylesheet" href={{url('etrain/css/magnific-popup.css')}}>
    <!-- swiper CSS -->
    <link rel="stylesheet" href={{url('etrain/css/slick.css')}}>
    <!-- style CSS -->
    <link rel="stylesheet" href={{url('etrain/css/style.css')}}>
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
                            <h2>Data Lengkap</h2>
                            <p>Download data anda di bawah ini</p>
                            <p class="mt-4">
                                <a href="/data_file/cetak_pdf" class="genric-btn primary circle arrow" target="_blank">Download</a>
                            </p> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb start-->
   <!--================Blog Area =================-->
   <section class="blog_area single-post-area section_padding">
      <div class="container">
         <div class="row">
            <div class="col-lg-4">
                <div class="blog_right_sidebar">
                    <aside class="single_sidebar_widget newsletter_widget">
                        <h4 class="widget_title">Ganti Foto</h4>
                        @foreach ($santri as $item)
                        <form action="{{ route('file.updatePhoto', $item->id_wali_santri) }}" method="post" enctype="multipart/form-data">
                            @method('patch')
                            @csrf
                            <div class="form-group">
                                <input type="file" name="foto" class="form-control" required>
                            </div>
                            <button class="button rounded-0 primary-bg text-white w-100 btn_1" type="submit">simpan</button>
                            @error('foto')
                                <div style="color:red" class="mt-3">{{ $message }}</div>
                            @enderror
                        </form>
                        <img class="mt-5" src="/uploads/santri_foto/{{ $item->foto }}" alt="kk" width="100%" height="auto">
                        @endforeach
                    </aside> 
                    
                </div>
            </div>
                        
            <div class="col-lg-8 posts-list">
               <div class="single-post">
                  <div class="blog_details">
                     <h2>Data Lengkap Santri
                     </h2>
                     <p class="ml-3"><i>
                        @foreach ($santri as $item)
                        1.  Nama santri&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp; {{ $item->nama }}<br>
                        2.  Tempat lahir&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp; {{ $item->tempat_lahir }}<br>
                        3.  Tanggal lahir&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp; {{ $item->tgl }}<br>
                        4.  Jenis Kelamin&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp; {{ ($item->jenis_kelamin=="L") ? "Laki-laki" : "Perempuan" }}<br>
                        5.  Alamat&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp; {{ $item->alamat }}<br>
                        6.  Email&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp; {{ $item->email }}<br>
                        7.  Asal sekolah&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp; {{ $item->asal_sekolah }}<br>
                        8.  Telephone&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp; {{ $item->telephone }}<br>
                        @endforeach

                        @foreach ($santriPenFormal as $list)
                        9.  Pendidikan Formal&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp; {{ $list->jenjang_pendidikan }}<br>
                        @endforeach

                        @foreach ($santriPenDiniah as $list)
                        10. Pendidikan Diniah&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp; {{ $list->jenjang_pendidikan }}<br>
                        @endforeach

                        @foreach ($santriPenJurusan as $list)
                        11. Jurusan&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp; {{ $list->nm_jurusan }}<br> 
                        @endforeach
                    </i>
                     </p>
                     
                  </div>
               </div>
               <div class="navigation-top">
                  <div class="text-right text-secondary"><span>Update, {{ $item->updated_at->format('d M Y') }}</span></div>
                  <div class="single-post">
                     <div class="blog_details">
                        <h2>Data Wali Santri
                        </h2>
                        <p class="ml-3"><i>
                           @foreach ($santri as $item)
                           1.  Nama santri&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp; {{ $item->nama }}<br>
                           2.  Tempat lahir&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp; {{ $item->tempat_lahir }}<br>
                           3.  Tanggal lahir&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp; {{ $item->tgl }}<br>
                           4.  Jenis Kelamin&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp; {{ ($item->jenis_kelamin=="L") ? "Laki-laki" : "Perempuan" }}<br>
                           5.  Alamat&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp; {{ $item->alamat }}<br>
                           6.  Email&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp; {{ $item->email }}<br>
                           7.  Asal sekolah&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp; {{ $item->asal_sekolah }}<br>
                           8.  Telephone&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp; {{ $item->telephone }}<br>
                           @endforeach

                           @foreach ($santriPenFormal as $list)
                           9.  Pendidikan Formal&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp; {{ $list->jenjang_pendidikan }}<br>
                           @endforeach

                           @foreach ($santriPenDiniah as $list)
                           10. Pendidikan Diniah&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp; {{ $list->jenjang_pendidikan }}<br>
                           @endforeach

                           @foreach ($santriPenJurusan as $list)
                           11. Jurusan&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp; {{ $list->nm_jurusan }}<br> 
                           @endforeach
                        </i>
                        </p>
                        
                     </div>
                  </div>

               </div>
               
               
            </div>
            
         </div>
      </div>
   </section>
   <!--================Blog Area end =================-->

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
     <script src="{{url('/etrain/js/jquery-1.12.1.min.js')}}></script>
     <!-- popper js -->
     <script src="{{url('/etrain/js/popper.min.js')}}></script>
     <!-- bootstrap js -->
     <script src="{{url('/etrain/js/bootstrap.min.js')}}></script>
     <!-- easing js -->
     <script src="{{url('/etrain/js/jquery.magnific-popup.js')}}></script>
     <!-- swiper js -->
     <script src="{{url('/etrain/js/swiper.min.js')}}></script>
     <!-- swiper js -->
     <script src="{{url('/etrain/js/masonry.pkgd.js')}}></script>
     <!-- particles js -->
     <script src="{{url('/etrain/js/owl.carousel.min.js')}}></script>
     <script src="{{url('/etrain/js/jquery.nice-select.min.js')}}></script>
     <!-- swiper js -->
     <script src="{{url('/etrain/js/slick.min.js')}}></script>
     <script src="{{url('/etrain/js/jquery.counterup.min.js')}}></script>
     <script src="{{url('/etrain/js/waypoints.min.js')}}></script>
     <!-- custom js -->
     <script src="{{url('/etrain/js/custom.js')}}></script>
 </body>
 
 </html>