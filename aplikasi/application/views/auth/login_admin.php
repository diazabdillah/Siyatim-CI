<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?= base_url()?>assets/template/custom_siyatim/login_dan_register/bootstrap.min.css">

    <title>Masuk Akun Admin | Siyatim</title>
    <link rel="icon" 
      type="image/png" 
      href="<?= base_url(); ?>assets/img/favicon.ico">
</head>
<style>
    body,
    html {
        height: 100%;
        /* font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji"; */
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        color: #4A5057;
    }

    .bg-plum-plate {
        background-image: linear-gradient(135deg, #53BCDA 0%, #A9D48D 100%) !important;
    }

    .bg-animation {
        animation: bg-pan-left 8s both;
    }

    .inputan-admin {
        margin: 0;
        top: 20vh;
    }

    .modal-content {
        border: 0px;
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

    .input-container h4 {
        margin-bottom: 1.5rem;
        font-weight: normal;
    }
  
</style>

<body>
    <div class="h-100 app-container app-theme-white body-tabs-shadow">
        <div class="h-100 app-container">
            <div class="h-100 bg-plum-plate bg-animation">
                <div class="d-flex h-100 justify-content-center align-items-center">
                    <div class="mx-auto input-container col-md-8">
                        <!-- <div class="logo mx-auto mb-3"></div> -->                    
                        <div class="modal-dialog w-100 mx-auto">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <div class="h5 modal-title text-center">
                                        <img src="<?= base_url()?>assets/template/custom_siyatim/login_dan_register/img/logo.png" height="100px" alt="Logo Siyatim">
                                        <h4 class="mt-2">
                                            <div>Selamat datang admin,</div>
                                            <span>Silahkan login menggunakan akun anda.</span>
                                        </h4>
                                    </div>
                                    <?= $this->session->flashdata('message'); ?>
                                    <form class="" action="<?= base_url('admin/login-rahasia-banget') ?>" method="POST">
                                        <div class="form-row">
                                            <div class="col-md-12">
                                                <div class="position-relative form-group">
                                                    <input autofocus required
                                                        id="exampleEmail" name="username" placeholder="Username..." type="text"
                                                        class="form-control">
                                                        <?= form_error('username', '<small class="text-danger pl-3">', '</small>') ?>
                                                    </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="position-relative form-group"><input required
                                                        id="examplePassword" name="password" placeholder="Password..."
                                                        type="password" class="form-control">
                                                        <?= form_error('password', '<small class="text-danger pl-3">', '</small>') ?>
                                                    </div>
                                            </div>
                                        </div>                                        
                                    
                                    <div class="divider"></div>
                                    <!-- <h6 class="mb-0">No account? <a href="javascript:void(0);" class="text-primary">Sign
                                            up now</a></h6> -->
                                </div>
                                <div class="modal-footer clearfix">
                                    <!-- <div class="float-left"><a href="javascript:void(0);"
                                            class="btn-sm btn btn-link">Recover Password</a></div> -->
                                    <div class="float-right">
                                        <button type="submit" class="btn btn-primary btn-sm">Login ke Dashboard</button>
                                    </div>
                                </div>
                                </form>
                            </div>
                        </div>
                        <div class="text-center text-white opacity-8 mt-3">Copyright © Siyatim 2020</div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="<?= base_url()?>assets/template/custom_siyatim/login_dan_register/jquery-3.4.1.slim.min.js"></script>
    <script src="<?= base_url()?>assets/template/custom_siyatim/login_dan_register/popper.min.js"></script>
    <script src="<?= base_url()?>assets/template/custom_siyatim/login_dan_register/bootstrap.min.js"></script>
</body>

</html>