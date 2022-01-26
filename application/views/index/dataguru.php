<!DOCTYPE html>
<html lang="en">

<head>

    <title>Data Guru</title>

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

            <a class="navbar-brand" href=" <?= base_url('Login/index') ?>#home">
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
                        <a href=" <?= base_url('Login/index') ?>#home" class="nav-link smoothScroll">Home</a>
                    </li>

                    <li class="nav-item">
                        <a href=" <?= base_url('Login/index') ?>#about" class="nav-link smoothScroll">Visi Misi</a>
                    </li>

                    <li class="nav-item">
                        <a href="<?= base_url('Login/index') ?>#class" class="nav-link smoothScroll">Berita</a>
                    </li>

                    <li class="nav-item">
                        <a href=" <?= base_url('Login/index') ?>#contact" class="nav-link smoothScroll">Contact</a>
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



    <!-- ABOUT -->
    <section class="about section" id="about">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md">
                    <div class="col-lg-12 col-12 text-center mb-5">
                        <h2 data-aos="fade-up">DATA GURU</h2>
                    </div>
                    

                    <div class="card-deck mb-5 mt-3 ">
                        <div class="row">
                            <?php
                            $i = 1;

                            if (count($datas) >= 3) {
                                foreach ($datas as $data) {

                            ?>
                                    <div class="col-4 mb-3 ">
                                        <div class="card">
                                            <img class="card-img-top" height="300px" width="50px" src="<?= base_url('/assets/imagesData/fotoGuru/') . $data->foto_guru ?>" alt="Card image cap">
                                            <div class="card-body  mb-2">
                                                <!-- <?php echo count($datas); ?> -->

                                                <h3 class="card-title">Nama: <strong><?php echo $data->nama_guru; ?></strong></h3>
                                                <p style="color: lightslategrey;" class="card-text">NIP: <strong><?php echo $data->nip; ?></strong> </p>
                                                <p style="color: lightslategrey;" class="card-text">Alamat: <strong><?php echo $data->alamat; ?></strong> </p>
                                                <p style="color: lightslategrey;" class="card-text">Email: <strong><?php echo $data->email; ?></strong> </p>
                                            </div>

                                        </div>
                                    </div>

                                <?php }
                            } else {
                                foreach ($datas as $data) { ?>
                                    <div class="col-6 mb-3 ">
                                        <div class="card">
                                            <img class="card-img-top" height="300px" width="50px" src="<?= base_url('/assets/imagesData/fotoGuru/') . $data->foto_guru ?>" alt="Card image cap">
                                            <div class="card-body  mb-2">
                                                <h3 class="card-title">Nama: <strong><?php echo $data->nama_guru; ?></strong></h3>
                                                <p style="color: lightslategrey;" class="card-text">NIP: <strong><?php echo $data->nip; ?></strong> </p>
                                                <p style="color: lightslategrey;" class="card-text">Alamat: <strong><?php echo $data->alamat; ?></strong> </p>
                                                <p style="color: lightslategrey;" class="card-text">Email: <strong><?php echo $data->email; ?></strong> </p>
                                            </div>

                                        </div>
                                    </div>

                            <?php }
                            } ?>
                        </div>
                    </div>


                </div>


            </div>
    </section>


    <!-- CLASS -->




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