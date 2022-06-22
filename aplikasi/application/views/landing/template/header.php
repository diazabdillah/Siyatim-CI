<!doctype html>
<html lang="en">

<head>
  <title><?= $title ?></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="" />
  <meta name="keywords" content="" />
  <meta name="author" content="Free-Template.co" />
  <link rel="shortcut icon" href="ftco-32x32.png">

  <link rel="stylesheet" href="<?= base_url(); ?>assets/template/jobboard/css/custom-bs.css">
  <link rel="stylesheet" href="<?= base_url(); ?>assets/template/jobboard/css/jquery.fancybox.min.css">
  <link rel="stylesheet" href="<?= base_url(); ?>assets/template/jobboard/css/bootstrap-select.min.css">
  <link rel="stylesheet" href="<?= base_url(); ?>assets/template/jobboard/fonts/icomoon/style.css">
  <link rel="stylesheet" href="<?= base_url(); ?>assets/template/jobboard/fonts/line-icons/style.css">
  <link rel="stylesheet" href="<?= base_url(); ?>assets/template/jobboard/css/owl.carousel.min.css">
  <link rel="stylesheet" href="<?= base_url(); ?>assets/template/jobboard/css/animate.min.css">

  <link rel="stylesheet" href="<?= base_url(); ?>assets/template/adminLTE3/plugins/fontawesome-free/css/all.min.css">

  <!-- MAIN CSS -->
  <link rel="stylesheet" href="<?= base_url(); ?>assets/template/jobboard/css/style.css">
  <link rel="icon" 
      type="image/png" 
      href="<?= base_url(); ?>assets/img/favicon.ico">

  <script type="text/javascript"> 
  var lebarLayar = window.screen.width
  document.cookie = "lebarLayar = " + lebarLayar 
  
  </script>

  <?php $lebar_layar = $_COOKIE['lebarLayar'];?>
</head>

<body id="top">

  <div id="overlayer"></div>
  <div class="loader">
    <div class="spinner-border text-primary" role="status">
      <span class="sr-only">Loading...</span>
    </div>
  </div>


  <div class="site-wrap">

    <div class="site-mobile-menu site-navbar-target">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div> <!-- .site-mobile-menu -->


    <!-- NAVBAR -->
    <header class="site-navbar mt-3">
      <div class="container-fluid">
        <div class="row align-items-center">
          <div class="site-logo col-6"><a href="<?= base_url(); ?>assets/template/jobboard/index.html">Siyatim</a></div>

          <?php if($lebar_layar < 676) : ?>
            <nav style="top: -20px" class="mx-auto site-navigation">
              <ul class="site-menu js-clone-nav d-none d-xl-block ml-0 pl-0">
                <li><a href="<?= base_url(); ?>"<?php if($this->uri->segment(1)=="") {echo 'class="active"';} ?>>Home</a></li>    
                <li><a href="<?= base_url(); ?>explore-panti"<?php if($this->uri->segment(1) == "explore-panti" || $this->uri->segment(1) == "panti-asuhan") {echo' class="active"';} ?>>Explore Panti</a></li>
                <li><a href="<?= base_url(); ?>about" <?php if($this->uri->segment(1) == "about") {echo 'class="active"';}?>>About</a></li>              
                <li><a href="https://blog.siyatim.com/">Blog</a></li>
                <li><a href="<?= base_url(); ?>contact"<?php if($this->uri->segment(1)=="contact") {echo 'class="active"';} ?>>Contact</a></li>
                <li><a href="<?= base_url(); ?>faq"<?php if($this->uri->segment(1)=="faq") {echo 'class="active"';} ?>>FAQ</a></li>    
                <li><a href="<?= base_url(); ?>contact"<?php if($this->uri->segment(1)=="contact") {echo 'class="active"';} ?>>Daftarkan Panti</a></li>
                <?php if($this->session->userdata('akses') == 'donatur'): ?>
                  <li><a href="<?= base_url(); ?>donatur/dashboard">Dashboard Donatur</a></li>   
                  <?php elseif($this->session->userdata('akses') == 'panti'): ?>
                    <li><a href="<?= base_url(); ?>panti/dashboard">Dashboard Panti</a></li>   
                  <?php else: ?>
                    <li><a href="<?= base_url(); ?>login">Login Donatur</a></li>   
                  <?php endif?>              
              </ul>
            </nav>
            <div style="top: -20px" class="right-cta-menu text-right d-flex aligin-items-center col-6">          
              <div class="ml-auto">
                <a href="<?= base_url(); ?>contact" class="d-none btn btn-outline-white border-width-2 d-lg-inline-block"><span
                    class="mr-2 icon-add"></span>Daftarkan Panti</a>                         
              <?php if($this->session->userdata('akses') == "donatur"): ?>              
                <a href="<?= base_url('donatur/dashboard'); ?>" class="d-none btn btn-primary border-width-2 d-lg-inline-block"><span
                    class="mr-2 icon-person"></span>Dashboard</a>
              <?php elseif($this->session->userdata('akses') == "panti"): ?>              
                <a href="<?= base_url('panti/dashboard'); ?>" class="d-none btn btn-primary border-width-2 d-lg-inline-block"><span
                    class="mr-2 icon-person"></span>Dashboard</a>
              <?php else : ?>
                <a href="<?= base_url(); ?>login" class="d-none btn btn-primary border-width-2 d-lg-inline-block"><span
                    class="mr-2 icon-lock_outline"></span>Log In</a>
              <?php endif ?>
              </div>
              <a href="#" class="site-menu-toggle js-menu-toggle d-inline-block d-xl-none mt-lg-2 ml-3"><span
                class="icon-menu h3 m-0 p-0 mt-2"></span></a>
          </div>
                    
          <?php else: ?>            
            <nav style="top: -20px" class="mx-auto site-navigation">
              <ul class="site-menu js-clone-nav d-none d-xl-block ml-0 pl-0">
                <li><a href="<?= base_url(); ?>"<?php if($this->uri->segment(1)=="") {echo 'class="active"';} ?>>Home</a></li>    
                <li><a href="<?= base_url(); ?>explore-panti"<?php if($this->uri->segment(1) == "explore-panti" || $this->uri->segment(1) == "panti-asuhan") {echo' class="active"';} ?>>Explore Panti</a></li>
                <li><a href="<?= base_url(); ?>about" <?php if($this->uri->segment(1) == "about") {echo 'class="active"';}?>>About</a></li>              
                <li><a href="https://blog.siyatim.com/">Blog</a></li>
                <li><a href="<?= base_url(); ?>contact"<?php if($this->uri->segment(1)=="contact") {echo 'class="active"';} ?>>Contact</a></li>
                <li><a href="<?= base_url(); ?>faq"<?php if($this->uri->segment(1)=="faq") {echo 'class="active"';} ?>>FAQ</a></li>                          
              </ul>
            </nav>
            <div style="top: -20px" class="right-cta-menu text-right d-flex aligin-items-center col-6">          
              <div class="ml-auto">
                <a href="<?= base_url(); ?>contact" class="btn btn-outline-white border-width-2 d-lg-inline-block"><span
                    class="mr-2 icon-add"></span>Daftarkan Panti</a>                         
              <?php if($this->session->userdata('akses') == "donatur"): ?>              
                <a href="<?= base_url('donatur/dashboard'); ?>" class="btn btn-primary border-width-2 d-lg-inline-block"><span
                    class="mr-2 icon-person"></span>Dashboard</a>
              <?php elseif($this->session->userdata('akses') == "panti"): ?>              
                <a href="<?= base_url('panti/dashboard'); ?>" class="btn btn-primary border-width-2 d-lg-inline-block"><span
                    class="mr-2 icon-person"></span>Dashboard</a>
              <?php else : ?>
                <a href="<?= base_url(); ?>login" class="btn btn-primary border-width-2 d-lg-inline-block"><span
                    class="mr-2 icon-lock_outline"></span>Log In</a>
              <?php endif ?>
              </div>
              <a href="#" class="site-menu-toggle js-menu-toggle d-inline-block d-xl-none mt-lg-2 ml-3"><span
                class="icon-menu h3 m-0 p-0 mt-2"></span></a>
          </div>
          <?php endif ?>
          
            

        </div>
      </div>
    </header>
