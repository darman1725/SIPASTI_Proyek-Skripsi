<!doctype html>
<html lang="en">

<head>

    <!--====== Required meta tags ======-->
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!--====== Title ======-->
    <title>Sistem Penerimaan Petugas Statistik BPS Kota Malang</title>

    <!--====== Favicon Icon ======-->
    <link rel="shortcut icon" href="{{ asset('/assets/images/favicon.png') }}" type="image/png">

    <!--====== Bootstrap css ======-->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">

    <!--====== Line Icons css ======-->
    <link rel="stylesheet" href="{{ asset('assets/css/LineIcons.css') }}">

    <!--====== Magnific Popup css ======-->
    <link rel="stylesheet" href="{{  asset('assets/css/magnific-popup.css') }}">

    <!--====== Default css ======-->
    <link rel="stylesheet" href="{{ asset('assets/css/default.css') }}">

    <!--====== Style css ======-->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">


</head>

<body>

    <!--====== HEADER PART START ======-->

    <header class="header-area">
        <div class="navgition navgition-transparent">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <nav class="navbar navbar-expand-lg">
                            <a class="navbar-brand" href="{{ url('/') }}">
                                <img src="{{ asset('assets/images/logo.svg') }}" alt="Logo">
                            </a>

                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarOne" aria-controls="navbarOne" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="toggler-icon"></span>
                                <span class="toggler-icon"></span>
                                <span class="toggler-icon"></span>
                            </button>

                            <div class="collapse navbar-collapse sub-menu-bar" id="navbarOne">
                                <ul class="navbar-nav m-auto">
                                    <li class="nav-item active">
                                        <a class="page-scroll" href="#home">HOME</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="page-scroll" href="#seleksi">SELEKSI</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="page-scroll" href="#ketentuan">KETENTUAN</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="page-scroll" href="#contact">KONTAK</a>
                                    </li>
                                </ul>
                            </div>

                            <div class="navbar-social d-none d-sm-flex align-items-center">
                                <span>FOLLOW US</span>
                                <ul>
                                    <li><a href="https://www.facebook.com/bpskotamalang"><i class="lni-facebook-filled"></i></a></li>
                                    <li><a href="https://www.instagram.com/bpskotamalang/"><i class="lni-instagram-original"></i></a></li>
                                    <li><a href="https://www.youtube.com/@BPSKotaMalang"><i class="lni-youtube-original"></i></a></li>
                                    <li><a href="https://www.linkedin.com/company/badan-pusat-statistik/mycompany/"><i class="lni-linkedin-original"></i></a></li>                                  
                                </ul>
                            </div>
                        </nav> <!-- navbar -->
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
        </div> <!-- navgition -->

        <div id="home" class="header-hero bg_cover" style="background-image: url(assets/images/header-bg.jpg)">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-8 col-lg-10">
                        <div class="header-content text-center">
                            <h3 class="header-title">Sistem Penerimaan Petugas Statistik BPS Kota Malang</h3>
                            <p class="text">Menyelenggarakan rekrutmen petugas statistik dengan cepat, efektif dan transparan
                                guna mendukung kebijakan pemerintah
                            </p>
                            <ul class="header-btn">
                                <li><a class="main-btn btn-one" href="{{ url('/login') }}">DAFTAR</a></li>
                                <li><a class="main-btn btn-two video-popup" href="https://www.youtube.com/watch?v=2ISLCgszvIM&ab_channel=MasUlulTukangSensus">LIHAT TUTORIAL<i class="lni-play"></i></a></li>
                            </ul>
                        </div> <!-- header content -->
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
            <div class="header-shape">
                <img src="{{  asset('assets/images/header-shape.svg') }}" alt="shape">
            </div>
        </div> <!-- header content -->
    </header>

    <!--====== HEADER PART ENDS ======-->

    <!--====== SERVICES PART START ======-->

    <section id="seleksi" class="services-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="section-title pb-10">
                        <h4 class="title">Informasi Seleksi</h4>
                        <p class="text">Badan Pusat Statistik (BPS) Kota Malang memanggil putra-putri terbaik yang berintegritas untuk bergabung menjadi petugas statistik dengan syarat sebagai berikut.</p>
                    </div> <!-- section title -->
                </div>
            </div> <!-- row -->
            <div class="row">
                <div class="col-lg-8">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="services-content mt-40 d-sm-flex">
                                <div class="services-icon">
                                    <i class="lni-bolt"></i>
                                </div>
                                <div class="services-content media-body">
                                    <h4 class="services-title">Domisili</h4>
                                    <p class="text">Berdomisili di wilayah Kota Malang</br> (ditunjukkan dengan bukti KTP)</p>
                                </div>
                            </div> <!-- services content -->
                        </div>
                        <div class="col-md-6">
                            <div class="services-content mt-40 d-sm-flex">
                                <div class="services-icon">
                                    <i class="lni-bar-chart"></i>
                                </div>
                                <div class="services-content media-body">
                                    <h4 class="services-title">Pendidikan</h4>
                                    <p class="text">Minimal SMA/SMK/Sederajat</br></p>
                                </div>
                            </div> <!-- services content -->
                        </div>
                        <div class="col-md-6">
                            <div class="services-content mt-40 d-sm-flex">
                                <div class="services-icon">
                                    <i class="lni-brush"></i>
                                </div>
                                <div class="services-content media-body">
                                    <h4 class="services-title">Umur</h4>
                                    <p class="text">Berumur 20-60 Tahun</br></p>
                                </div>
                            </div> <!-- services content -->
                        </div>
                        <div class="col-md-6">
                            <div class="services-content mt-40 d-sm-flex">
                                <div class="services-icon">
                                    <i class="lni-bulb"></i>
                                </div>
                                <div class="services-content media-body">
                                    <h4 class="services-title">Skema</h4>
                                    <p class="text">Bersedia bekerja terikat kontrak;</br></p>
                                </div>
                            </div> <!-- services content -->
                        </div>
                    </div> <!-- row -->
                </div> <!-- row -->
            </div> <!-- row -->
        </div> <!-- conteiner -->
        <div class="services-image d-lg-flex align-items-center">
            <div class="image">
                <img src="{{ asset('assets/images/services.png') }}" alt="Services">
            </div>
        </div> <!-- services image -->
        
        
    </section>

    <!--====== SERVICES PART ENDS ======-->

    <!--====== PRICING PART START ======-->

    <section id="ketentuan" class="pricing-area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="section-title text-center pb-10">
                        <h4 class="title">Ketentuan</h4>
                        <p class="text">Berikut ini beberapa persyaratan calon petugas statistik yang wajib dipenuhi ketika melamar ke BPS Kota Malang.</p>
                    </div> <!-- section title -->
                </div>
            </div> <!-- row -->
            <div class="row justify-content-center">
                <div class="col-lg-4 col-md-7 col-sm-9">
                    <div class="single-pricing mt-40">
                        <div class="pricing-header text-center">
                            <h5 class="sub-title">Pertama</h5>
                            <span class="price">01</span>
                            <p class="year">Syarat</p>
                        </div>
                        <div class="pricing-list">
                            <ul>
                                <li><i class="lni-check-mark-circle"></i> Berdomisili di Kota Malang</li>
                                <li><i class="lni-check-mark-circle"></i> Pendidikan minimal SMA/Sederajat</li>
                                <li><i class="lni-check-mark-circle"></i> Berumur 20-60 tahun</li>
                                <li><i class="lni-check-mark-circle"></i> Bersedia bekerja terikat kontrak</li>
                            </ul>
                        </div>
                        <div class="pricing-btn text-center">
                            <a class="main-btn" href="#">WAJIB!</a>
                        </div>
                        <div class="buttom-shape">
                            <svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 350 112.35"><defs><style>.color-1{fill:#2bdbdc;isolation:isolate;}.cls-1{opacity:0.1;}.cls-2{opacity:0.2;}.cls-3{opacity:0.4;}.cls-4{opacity:0.6;}</style></defs><title>bottom-part1</title><g id="bottom-part"><g id="Group_747" data-name="Group 747"><path id="Path_294" data-name="Path 294" class="cls-1 color-1" d="M0,24.21c120-55.74,214.32,2.57,267,0S349.18,7.4,349.18,7.4V82.35H0Z" transform="translate(0 0)"/><path id="Path_297" data-name="Path 297" class="cls-2 color-1" d="M350,34.21c-120-55.74-214.32,2.57-267,0S.82,17.4.82,17.4V92.35H350Z" transform="translate(0 0)"/><path id="Path_296" data-name="Path 296" class="cls-3 color-1" d="M0,44.21c120-55.74,214.32,2.57,267,0S349.18,27.4,349.18,27.4v74.95H0Z" transform="translate(0 0)"/><path id="Path_295" data-name="Path 295" class="cls-4 color-1" d="M349.17,54.21c-120-55.74-214.32,2.57-267,0S0,37.4,0,37.4v74.95H349.17Z" transform="translate(0 0)"/></g></g></svg>
                        </div>
                    </div> <!-- single pricing -->
                </div>
                
                <div class="col-lg-4 col-md-7 col-sm-9">
                    <div class="single-pricing pro mt-40">
                        <div class="pricing-baloon">
                            <img src="{{ asset('assets/images/baloon.svg') }}" alt="baloon">
                        </div>
                        <div class="pricing-header">
                            <h5 class="sub-title">Kedua</h5>
                            <span class="price">02</span>
                            <p class="year">Syarat</p>
                        </div>
                        <div class="pricing-list">
                            <ul>
                                <li><i class="lni-check-mark-circle"></i> Sehat jasmani dan rohani</li>
                                <li><i class="lni-check-mark-circle"></i> Disiplin dan berkomitmen</li>
                                <li><i class="lni-check-mark-circle"></i> Bekerjasama dengan team</li>
                                <li><i class="lni-check-mark-circle"></i> Berkomunikasi secara baik</li>
                            </ul>
                        </div>
                        <div class="pricing-btn text-center">
                            <a class="main-btn" href="#">Wajib!</a>
                        </div>
                        <div class="buttom-shape">
                            <svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 350 112.35"><defs><style>.color-2{fill:#0067f4;isolation:isolate;}.cls-1{opacity:0.1;}.cls-2{opacity:0.2;}.cls-3{opacity:0.4;}.cls-4{opacity:0.6;}</style></defs><title>bottom-part1</title><g id="bottom-part"><g id="Group_747" data-name="Group 747"><path id="Path_294" data-name="Path 294" class="cls-1 color-2" d="M0,24.21c120-55.74,214.32,2.57,267,0S349.18,7.4,349.18,7.4V82.35H0Z" transform="translate(0 0)"/><path id="Path_297" data-name="Path 297" class="cls-2 color-2" d="M350,34.21c-120-55.74-214.32,2.57-267,0S.82,17.4.82,17.4V92.35H350Z" transform="translate(0 0)"/><path id="Path_296" data-name="Path 296" class="cls-3 color-2" d="M0,44.21c120-55.74,214.32,2.57,267,0S349.18,27.4,349.18,27.4v74.95H0Z" transform="translate(0 0)"/><path id="Path_295" data-name="Path 295" class="cls-4 color-2" d="M349.17,54.21c-120-55.74-214.32,2.57-267,0S0,37.4,0,37.4v74.95H349.17Z" transform="translate(0 0)"/></g></g></svg>
                        </div>
                    </div> <!-- single pricing -->
                </div>
                
                <div class="col-lg-4 col-md-7 col-sm-9">
                    <div class="single-pricing enterprise mt-40">
                        <div class="pricing-flower">
                            <img src="{{ asset('assets/images/flower.svg') }}" alt="flower">
                        </div>
                        <div class="pricing-header text-right">
                            <h5 class="sub-title">Ketiga</h5>
                            <span class="price">03</span>
                            <p class="year">Syarat</p>
                        </div>
                        <div class="pricing-list">
                            <ul>
                                <li><i class="lni-check-mark-circle"></i> Bersedia mengikuti pelatihan</li>
                                <li><i class="lni-check-mark-circle"></i> Sudah Vaksinasi Covid-19</li>
                                <li><i class="lni-check-mark-circle"></i> Memiliki email dan gadget</li>
                                <li><i class="lni-check-mark-circle"></i> Memiliki rekening aktif</li>
                            </ul>
                        </div>
                        <div class="pricing-btn text-center">
                            <a class="main-btn" href="#">Wajib!</a>
                        </div>
                        <div class="buttom-shape">
                            <svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 350 112.35"><defs><style>.color-3{fill:#4da422;isolation:isolate;}.cls-1{opacity:0.1;}.cls-2{opacity:0.2;}.cls-3{opacity:0.4;}.cls-4{opacity:0.6;}</style></defs><title>bottom-part1</title><g id="bottom-part"><g id="Group_747" data-name="Group 747"><path id="Path_294" data-name="Path 294" class="cls-1 color-3" d="M0,24.21c120-55.74,214.32,2.57,267,0S349.18,7.4,349.18,7.4V82.35H0Z" transform="translate(0 0)"/><path id="Path_297" data-name="Path 297" class="cls-2 color-3" d="M350,34.21c-120-55.74-214.32,2.57-267,0S.82,17.4.82,17.4V92.35H350Z" transform="translate(0 0)"/><path id="Path_296" data-name="Path 296" class="cls-3 color-3" d="M0,44.21c120-55.74,214.32,2.57,267,0S349.18,27.4,349.18,27.4v74.95H0Z" transform="translate(0 0)"/><path id="Path_295" data-name="Path 295" class="cls-4 color-3" d="M349.17,54.21c-120-55.74-214.32,2.57-267,0S0,37.4,0,37.4v74.95H349.17Z" transform="translate(0 0)"/></g></g></svg>
                        </div>
                    </div> <!-- single pricing -->
                </div>
            </div> <!-- row -->
        </div> <!-- conteiner -->
    </section>

    <!--====== PRICING PART ENDS ======-->
    
     <!--====== CALL TO ACTION PART START ======-->

    <section id="call-to-action" class="call-to-action">
        <div class="call-action-image">
            <img src="{{ asset('assets/images/call-to-action.png') }}" alt="call-to-action">
        </div>
        
        <div class="container-fluid">
            <div class="row justify-content-end">
                <div class="col-lg-6">
                    <div class="call-action-content text-center">
                        <h2 class="call-title">Berikan penilaian pada lembaga kami</h2>
                        <p class="text">                    Penilaian terhadap sistem yang digunakan pada rekrutmen petugas statistik diharapkan dapat menjadi evaluasi kedepannya</p>
                        <div class="call-newsletter">
                            <i class="lni-envelope"></i>
                            <input type="text" placeholder="bps@email.com">
                            <button type="submit">SUBMIT</button>
                        </div>
                    </div> <!-- slider-content -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>

    <!--====== CALL TO ACTION PART ENDS ======-->
    
    <!--====== CONTACT PART START ======-->

    <section id="contact" class="contact-area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="section-title text-center pb-10">
                        <h4 class="title">Hubungi Kami</h4>
                        <p class="text">Silahkan ajukan pertanyaan yang anda inginkan melalui form dibawah ini terkait rekrutmen yang diadakan oleh BPS Kota Malang</p>
                    </div> <!-- section title -->
                </div>
            </div> <!-- row -->
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="contact-form">
                        <form id="contact-form" action="assets/contact.php" method="post" data-toggle="validator">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="single-form form-group">
                                        <input type="text" name="name" placeholder="Nama Anda..." data-error="Name is required." required="required">
                                        <div class="help-block with-errors"></div>
                                    </div> <!-- single form -->
                                </div>
                                <div class="col-md-6">
                                    <div class="single-form form-group">
                                        <input type="email" name="email" placeholder="Email Anda..." data-error="Valid email is required." required="required">
                                        <div class="help-block with-errors"></div>
                                    </div> <!-- single form -->
                                </div>
                                <div class="col-md-6">
                                    <div class="single-form form-group">
                                        <input type="text" name="subject" placeholder="Subjek..." data-error="Subject is required." required="required">
                                        <div class="help-block with-errors"></div>
                                    </div> <!-- single form -->
                                </div>
                                <div class="col-md-6">
                                    <div class="single-form form-group">
                                        <input type="text" name="phone" placeholder="No HP Anda..." data-error="Phone is required." required="required">
                                        <div class="help-block with-errors"></div>
                                    </div> <!-- single form -->
                                </div>
                                <div class="col-md-12">
                                    <div class="single-form form-group">
                                        <textarea placeholder="Deskripsi..." name="message" data-error="Please, leave us a message." required="required"></textarea>
                                        <div class="help-block with-errors"></div>
                                    </div> <!-- single form -->
                                </div>
                                <p class="form-message"></p>
                                <div class="col-md-12">
                                    <div class="single-form form-group text-center">
                                        <button type="submit" class="main-btn">Kirim pesan</button>
                                    </div> <!-- single form -->
                                </div>
                            </div> <!-- row -->
                        </form>
                    </div> <!-- row -->
                </div>
            </div> <!-- row -->
        </div> <!-- conteiner -->
    </section>

    <!--====== CONTACT PART ENDS ======-->

    <!--====== FOOTER PART START ======-->

    <footer id="footer" class="footer-area">        
        <div class="footer-copyright">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="copyright text-center">
                            <p class="text">Hak Cipta © 2023 Badan Pusat Statistik (BPS) Kota Malang</a></p>
                        </div>
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
        </div> <!-- footer copyright -->
    </footer>

    <!--====== FOOTER PART ENDS ======-->

    <!--====== BACK TO TOP PART START ======-->

    <a class="back-to-top" href="#"><i class="lni-chevron-up"></i></a>

    <!--====== BACK TO TOP PART ENDS ======-->

    <!--====== jquery js ======-->
    <script src="{{ asset('assets/js/vendor/modernizr-3.6.0.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/jquery-1.12.4.min.js') }}"></script>

    <!--====== Bootstrap js ======-->
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/popper.min.js') }}"></script>

    <!--====== Scrolling Nav js ======-->
    <script src="{{ asset('assets/js/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('assets/js/scrolling-nav.js') }}"></script>

    <!--====== Magnific Popup js ======-->
    <script src="{{ asset('assets/js/jquery.magnific-popup.min.js') }}"></script>

    <!--====== Main js ======-->
    <script src="{{ asset('assets/js/main.js') }}"></script>

</body>

</html>
