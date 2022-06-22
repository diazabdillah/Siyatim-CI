<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?= base_url()?>assets/template/custom_siyatim/login_dan_register/bootstrap.min.css">
    <link rel="icon" 
      type="image/png" 
      href="<?= base_url() ?>/assets/img/favicon.ico">
    <title>Masuk Akun Donatur | Siyatim</title>
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
            /* #89ba16 */
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
                        <img class="logo" src="<?= base_url()?>assets/template/custom_siyatim/login_dan_register/img/logo.png" alt="Logo Siyatim" height="150px">
                        <span class="d-block">Selamat datang Donatur,</span>
                        <span>Silahkan login menggunakan akun anda.</span></h4>
                    <h6 class="mt-3">Tidak punya akun? <a href="<?= base_url()?>daftar">Daftar
                            sekarang</a></h6>
                    <div class="dropdown-divider"></div>
                    <?= $this->session->flashdata('message'); ?>
                    <?= $this->session->flashdata('message_daftar'); ?>                
                    <form class="" action="<?= base_url('donatur/login') ?>" method="POST">
                        <div class="form-row">
                            <div class="col-md-6">
                                <div class="position-relative form-group"><label for="exampleEmail"
                                        class="">Email</label><input autofocus required name="email" id="exampleEmail"
                                        placeholder="Email anda..." type="email" class="form-control"></div>
                            </div>
                            <?= form_error('email', '<small class="text-danger pl-3">', '</small>') ?>
                            <div class="col-md-6">
                                <div class="position-relative form-group"><label for="examplePassword"
                                        class="">Password</label><input required name="password" id="examplePassword"
                                        placeholder="Password anda..." type="password" class="form-control"></div>
                            </div>
                            <?= form_error('password', '<small class="text-danger pl-3">', '</small>') ?>
                        </div>
                        <!-- <div class="position-relative form-check"><input name="check" id="exampleCheck" type="checkbox"
                                class="form-check-input"><label for="exampleCheck" class="form-check-label">Keep me
                                logged in</label></div> -->
                        <div class="divider row"></div>
                        <div class="d-flex align-items-center">
                            <div class="ml-auto"><a href="<?= base_url() ?>reset-password"
                                    class="btn-sm">Reset
                                    Password</a>
                                <button class="btn btn-sm btn-primary">Login ke Dashboard</button>
                            </div>
                        </div>
                    </form>
                </div>
            </section>
        </div>
    </div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="<?= base_url()?>assets/template/custom_siyatim/login_dan_register/jquery-3.4.1.slim.min.js"></script>
    <script src="<?= base_url()?>assets/template/custom_siyatim/login_dan_register/popper.min.js"></script>
    <script src="<?= base_url()?>assets/template/custom_siyatim/login_dan_register/bootstrap.min.js"></script>
</body>

</html>