<!DOCTYPE html>
<html lang="en">

<head>

    <title>Home</title>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css') ?> ">
    <link rel="stylesheet" href="<?= base_url('assets/css/font-awesome.min.css') ?> ">
    <link rel="stylesheet" href="<?= base_url('assets/css/aos.css') ?>">

    <!-- MAIN CSS -->
    <link rel="stylesheet" href=" <?= base_url('assets/css/tooplate-gymso-style.css') ?>">
    <!--
Tooplate 2119 Gymso Fitness
https://www.tooplate.com/view/2119-gymso-fitness
-->
    <link rel="icon" href="<?= base_url('assets/images/Logo.png') ?>">
</head>

<body data-spy="scroll" data-target="#navbarNav" data-offset="50">

    <!-- MENU BAR -->
    <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container">

            <a class="navbar-brand" href="index.html">
                <img src=" <?= base_url('assets/images/Logo.png') ?>" alt="" width="55px" height="55px" class="d-inline-block align-text-top mt-10"> SPENDAWALI
            </a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-lg-auto">
                    <div class="nav-item">
                        <a class="navbar-brand" href="#">

                        </a>
                    </div>
                    <li class="nav-item">
                        <a href="#home" class="nav-link smoothScroll">Home</a>
                    </li>

                    <li class="nav-item">
                        <a href="#about" class="nav-link smoothScroll">Visi Misi</a>
                    </li>

                    <li class="nav-item">
                        <a href="#class" class="nav-link smoothScroll">Berita</a>
                    </li>

                    <li class="nav-item">
                        <a href="#contact" class="nav-link smoothScroll">Contact</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Data Sekolah</a>
                        <ul class="dropdown-menu" aria-labelledby="dropdown01">
                            <li><a class="dropdown-item" href="<?= base_url('Login/dataguru'); ?>">Data Guru</a></li>
                            <li>
                                <div class="dropdown-divider"></div>
                            </li>
                            <li><a class="dropdown-item" href="<?= base_url('Login/datasiswa'); ?>">Data Siswa</a></li>
                            <li>
                                <div class="dropdown-divider"></div>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="<?= base_url('Login/index_login') ?>" class="nav-link smoothScroll">LOGIN</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>


    <!-- HERO -->
    <section class="hero d-flex flex-column justify-content-center align-items-center" id="home">

        <div class="bg-overlay"></div>

        <div class="container">
            <div class="row">

                <div class="col-lg-8 col-md-10 mx-auto col-12">
                    <div class="hero-text mt-5 text-center">

                        <h6 data-aos="fade-up" data-aos-delay="300"></h6>

                        <h1 class="text-white" data-aos="fade-up" data-aos-delay="500">SELAMAT DATANG di</h1>
                        <h1 class="text-white" data-aos="fade-up" data-aos-delay="500">SMP Negeri 2 Wadaslintang</h1>

                        <a href="#about" class="btn custom-btn bordered mt-3" data-aos="fade-up" data-aos-delay="700">Kenal Lebih dekat</a>

                    </div>
                </div>

            </div>
        </div>
    </section>


    <!-- ABOUT -->
    <section class="about section" id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-12 text-center mb-5">
                    <h2 data-aos="fade-up">AGAMIS - BERBUDI MULIA - BERBUDAYA BERPRESTASI</h2>
                </div>
                <div class="mt-4 mb-lg-0 mb-4 col-lg-6 col-md-10 mx-auto col-12">
                    <h2 class="mb-4" data-aos="fade-up" data-aos-delay="300">HALLO, SELAMAT DATANG DI SMP NEGERI 2 Wadaslintang</h2>

                    <p data-aos="fade-up" data-aos-delay="400">SMP Negeri 2 Wadaslintang adalah sebuah Sekolah yang mengedepankan akhlak mulia berdasarkan agama, berbudi mulia untuk menjadikan peserta didik yang berprestasi</p>

                    <p data-aos="fade-up" data-aos-delay="500">Sikap kreatif, inspiratif, dan integritas merupakan hal wajib yang dimiliki warga SMP Negeri 2 Wadaslintang</p>
                </div>
                <div class="mt-4 ml-lg-auto col-lg-4 col-md-6 col-12" data-aos="fade-up" data-aos-delay="700">
                    <div class="team-thumb">
                        <img src=" <?= base_url('assets/images/Pramuka1.jpeg') ?> " class="img-fluid" alt="Trainer">
                    </div>
                </div>
            </div>
            <div class="row mt-5">
                <div class="ml-lg-auto col-lg-4 col-md-6 col-12" data-aos="fade-up" data-aos-delay="700">
                    <div class="team-thumb">
                        <img src=" <?= base_url('assets/images/paduan_suara.jpeg') ?> " class="img-fluid" alt="Trainer">
                    </div>
                </div>

                <div class="mb-lg-0 mb-4 col-lg-6 col-md-10 mx-auto col-12">
                    <h2 class="mb-4" data-aos="fade-up" data-aos-delay="300">Visi</h2>

                    <p data-aos="fade-up" data-aos-delay="400">Mewujudkan peserta didik yang religius, berprestasi, berdaya saing, dan berwawasan lingkungan</p>
                </div>
            </div>
            <div class="row mt-5">
                <div class="mb-lg-0 mb-4 col-lg-6 col-md-10 mx-auto col-12">
                    <h2 class="mb-4" data-aos="fade-up" data-aos-delay="300">Misi</h2>
                    <p data-aos="fade-up" data-aos-delay="400">1. Melaksanakan pembelajaran dan bimbingan secara efektif dan efisien</p>
                    <p data-aos="fade-up" data-aos-delay="400">2. Mengantarkan siswa SMP untuk lulus 100%</p>
                    <p data-aos="fade-up" data-aos-delay="400">3. Melaksanakan MBS secara efektif san efisien</p>
                    <p data-aos="fade-up" data-aos-delay="400">4. Melaksanakan pembinaan Tim Olimpiade Sains secara efektif</p>
                    <p data-aos="fade-up" data-aos-delay="400">5. Melaksanakan kegiatan olahraga secara efektif</p>
                    <p data-aos="fade-up" data-aos-delay="400">6. Melaksanakan pembinaan Karya Ilmiah Remaja</p>
                    <p data-aos="fade-up" data-aos-delay="400">7. Melaksanakan pembinaan dalam karya sastra dan seni</p>
                    <p data-aos="fade-up" data-aos-delay="400">8. Melaksanakan Pembinaan Kegiatan Kepramukaan secara kesinambungan</p>
                </div>
                <div class=" ml-lg-auto col-lg-4 col-md-6 col-12" data-aos="fade-up" data-aos-delay="700">
                    <div class="team-thumb">
                        <img src=" <?= base_url('assets/images/ruang_komputer2.jpeg') ?>" class="img-fluid" alt="Trainer">
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-lg-12 col-12 text-center mt-3 mb-2">
                    <h2 class="mb-5" data-aos="fade-up">SAMBUTAN KEPALA DINAS DIKPORA WONOSOBO</h2>
                    <div data-aos="fade-up" data-aos-delay="400">
                        <iframe width="800" height="500" src="https://www.youtube.com/embed/_eEbm18F-uQ?start=1" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- CLASS -->
    <section class="class section" id="class">
        <div class="container">
            <div class="row">

                <div class="col-lg-12 col-12 text-center mb-5">
                    <h2 data-aos="fade-up" data-aos-delay="200">Berita Terkini</h2>
                </div>

                <div class="col-lg-4 col-md-6 col-12" data-aos="fade-up" data-aos-delay="400">
                    <div class="class-thumb">
                        <img src=" <?= base_url('assets/images/pramuka2.jpeg') ?> " class="img-fluid" alt="Class">

                        <div class="class-info">
                            <h3 class="mb-1">Press Release</h3>

                            <span><strong>Oleh</strong> - Bima</span>

                            <p class="mt-3">Lorem ipsum dolor sit amet, consectetur adipiscing</p>
                            <a href=" <?= base_url('Login/berita') ?> " class="btn btn-primary">Baca Selengkapnya</a>
                        </div>
                    </div>
                </div>

                <div class="mt-5 mt-lg-0 mt-md-0 col-lg-4 col-md-6 col-12" data-aos="fade-up" data-aos-delay="500">
                    <div class="class-thumb">
                        <img src=" <?= base_url('assets/images/halaman.jpg') ?> " class="img-fluid" alt="Class">

                        <div class="class-info">
                            <h3 class="mb-1">Serah Terima Jabatan</h3>
                            <span><strong>Oleh</strong> - Ki Sudadi</span>
                            <p class="mt-3">Lorem ipsum dolor sit amet, consectetur adipiscing</p>
                            <a href="<?= base_url('Login/berita') ?>" class="btn btn-primary">Baca Selengkapnya</a>
                        </div>
                    </div>
                </div>

                <div class="mt-5 mt-lg-0 col-lg-4 col-md-6 col-12" data-aos="fade-up" data-aos-delay="600">
                    <div class="class-thumb">
                        <img src=" <?= base_url('assets/images/ruang_komputer2.jpeg') ?> " class="img-fluid" alt="Class">

                        <div class="class-info">
                            <h3 class="mb-1">Hari Raya Idul Adha</h3>
                            <span><strong>Oleh</strong> - Sariman</span>
                            <p class="mt-3">Lorem ipsum dolor sit amet, consectetur adipiscing</p>
                            <a href=" <?= base_url('Login/berita') ?> " class="btn btn-primary">Baca Selengkapnya</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <!-- CONTACT -->
    <section class="contact section" id="contact">
        <div class="container">
            <div class="row">

                <div class="ml-auto col-lg-5 col-md-6 col-12">
                    <h2 class="mb-4 pb-2" data-aos="fade-up" data-aos-delay="200">Kirimkan Masukan Anda</h2>

                    <form action="#" method="post" class="contact-form webform" data-aos="fade-up" data-aos-delay="400" role="form">
                        <input type="text" class="form-control" name="cf-name" placeholder="Name">

                        <input type="email" class="form-control" name="cf-email" placeholder="Email">

                        <textarea class="form-control" rows="5" name="cf-message" placeholder="Message"></textarea>

                        <button type="submit" class="form-control" id="submit-button" name="submit">Send Message</button>
                    </form>
                </div>

                <div class="mx-auto mt-4 mt-lg-0 mt-md-0 col-lg-5 col-md-6 col-12">
                    <h2 class="mb-4" data-aos="fade-up" data-aos-delay="600">Temukan kami di: </h2>

                    <p data-aos="fade-up" data-aos-delay="800"><i class="fa fa-map-marker mr-1"></i> Binangun, Lancar, Lancar, Kec. Wadaslintang, Kab. Wonosobo Prov. Jawa Tengah</p>
                    <!-- How to change your own map point
	1. Go to Google Maps
	2. Click on your location point
	3. Click "Share" and choose "Embed map" tab
	4. Copy only URL and paste it within the src="" field below
-->
                    <div class="google-map" data-aos="fade-up" data-aos-delay="900">
                        <iframe src="https://maps.google.com/maps?q=Smp%20n%202%20wadaslintang&t=&z=13&ie=UTF8&iwloc=&output=embed" width="1920" height="250" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
                    </div>
                </div>

            </div>
        </div>
    </section>


    <!-- FOOTER
   

    <!-- SCRIPTS -->
    <script src="<?= base_url('assets/js/jquery.min.js') ?> "></script>
    <script src=" <?= base_url('assets/js/bootstrap.min.js') ?> "></script>
    <script src=" <?= base_url('assets/js/aos.js') ?> "></script>
    <script src=" <?= base_url('assets/js/smoothscroll.js') ?>"></script>
    <script src=" <?= base_url('assets/js/custom.js') ?> "></script>

</body>

</html>