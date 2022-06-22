<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/template/custom_siyatim/login_dan_register/bootstrap.min.css">

    <title>Daftar Akun Donatur | Siyatim</title>
    <link rel="icon" 
      type="image/png" 
      href="<?= base_url(); ?>assets/img/favicon.ico">
    <style>
        #kiri {
            padding: 0;
            background-image: url('<?= base_url()?>assets/template/custom_siyatim/login_dan_register/img/sidebar.jpg');
            background-position: 50%;
            background-size: cover;        

        }
        #quotes {
            position: absolute;
        }

        body,
        html {
            height: 100%;
            /* font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji"; */
            font-family: Arial, Helvetica, sans-serif;
        }

        .carousel-caption {
            bottom: 40vh;
        }

        .cover {
            object-fit: cover;
        }

        h4 span {
            font-size: 1.1rem;
        }

        /* .logo {
            margin-bottom: 3rem;
        } */

        #kanan {
            color: #4A5057;
        }

        .btn-primary {
            background-color: #4ac1b9;
            border-color: #4ac1b9;
        }

        .btn-primary:focus {
            color: #fff;
            background-color: #4ac1b9;
        }

        .btn-primary:hover,
        .btn-primary:focus,
        .btn-primary:active,
        .btn-primary.active,
        .open>.dropdown-toggle.btn-primary {
            color: #fff;
            background-color: #00b3db;
            border-color: #00b3db;
            /*set the color you want here*/
        }
        a {
            color: #4ac1b9;
        }
    </style>
</head>

<body>
    <div class="container-fluid h-100">
        <div class="row h-100">
            <!-- <div id="bungkus-kiri"> -->
            <section id="kiri" class="col-md-4 d-none d-lg-block d-md-block d-xl-block d-xl-none">
                
            </section>
            <!-- </div> -->

            <section id="kanan"
                class="h-100 d-flex bg-white justify-content-center align-items-center col-md-12 col-lg-8">
                <div id="input" class="mx-auto col-sm-12 col-md-10 col-lg-9">

                    <h4 class="mb-0">
                        <img class="logo" src="<?= base_url(); ?>assets/template/custom_siyatim/login_dan_register/img/logo.png" alt="Logo Siyatim" height="150px">
                        <span class="d-block">Daftar akun baru,</span>
                        <span>Silahkan masukkan email dan password.</span></h4>    
                        <?= $this->session->flashdata('message_daftar'); ?>                
                    <div class="dropdown-divider"></div>
                    <form class="" method="post" action="<?= base_url('donatur/register') ?>">
                        <div class="form-row">
                            <div class="col-md-4">
                                <div class="position-relative form-group"><label for="nama"
                                        class="">Nama</label><input required autofocus name="nama" id="nama"
                                        placeholder="Nama anda..." type="text" class="form-control"></div>
                                        <?= form_error('nama', '<small class="text-danger">', '</small>') ?>
                            </div>
                            <div class="col-md-8">
                                <div class="position-relative form-group"><label for="email"
                                        class="">Email</label><input required name="email" id="email"
                                        placeholder="Email anda..." type="email" class="form-control"></div>
                                        <?= form_error('email', '<small class="text-danger">', '</small>') ?>
                            </div>
                            <div class="col-md-6">
                                <div class="position-relative form-group"><label for="password"
                                        class="">Password</label><input required name="password" id="password"
                                        placeholder="Password anda..." type="password" class="form-control"></div>
                                        <?= form_error('password', '<small class="text-danger">', '</small>') ?>
                            </div>
                            <div class="col-md-6">
                                <div class="position-relative form-group"><label for="password_confirm"
                                        class="">Ulangi Password</label><input required name="password_confirm" id="password_confirm"
                                        placeholder="Ulangi password..." type="password" class="form-control"></div>
                                        <?= form_error('password_confirm', '<small class="text-danger">', '</small>') ?>
                            </div>
                        </div>                        
                        <div class="divider row"></div>
                        <div class="d-flex align-items-center">
                            <div class="ml-auto">
                            <a href="<?= base_url() ?>login"
                                    class="btn-sm">Kembali</a>
                                <button class="btn btn-sm btn-primary">Daftarkan Akun</button>
                            </div>
                        </div>
                    </form>
                </div>
            </section>
        </div>
    </div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="<?= base_url(); ?>assets/template/custom_siyatim/login_dan_register/jquery-3.4.1.slim.min.js"></script>
    <script src="<?= base_url(); ?>assets/template/custom_siyatim/login_dan_register/popper.min.js"></script>
    <script src="<?= base_url(); ?>assets/template/custom_siyatim/login_dan_register/bootstrap.min.js"></script>
</body>

</html>