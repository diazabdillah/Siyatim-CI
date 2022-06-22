
    <!-- HOME -->
    <section class="home-section section-hero overlay bg-image" style="background-image: url('https://siyatim.com/masjid3.jpg');"
      id="home-section">

      <div class="container">
        <div class="row align-items-center justify-content-center">
          <div class="col-md-12">
            <div class="mb-5 text-center">
              <h1 class="text-white font-weight-bold">Sedekah Membuat Berkah</h1>
              <p>Cari panti asuhan dari seluruh Indonesia dan mulai bersedekah tanpa terkendala jarak dan waktu.</p>
            </div>
            <form method="get" action="<?= base_url()?>explore-panti/" class="search-jobs-form">
              <div class="row mb-5">
                <div class="col-12 col-sm-6 col-md-6 col-lg-4 mb-4 mb-lg-0">
                  <input autofocus name="panti" type="text" class="form-control form-control-lg" placeholder="Nama panti asuhan...">
                </div>
                <div class="col-12 col-sm-6 col-md-6 col-lg-4 mb-4 mb-lg-0">
                  <select required name="kota" class="selectpicker" data-style="btn-white btn-lg" data-width="100%" data-live-search="true"
                      title="Pilih Kota">
                      <?php foreach ($pilihkota as $row) : ?>
                          <option value='<?= $row->KODEKOTA ?>'><?= $row->NAMAKOTA ?></option>";
                        <?php endforeach ?>  
                  </select>                                          
                </div>
            
                <div class="col-12 col-sm-6 col-md-6 col-lg-4 mb-4 mb-lg-0">
                  <button type="submit" class="btn btn-primary btn-lg btn-block text-white btn-search"><span
                      class="icon-search icon mr-2"></span>Cari</button>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12 popular-keywords">
                <h3>Recommendation Keywords:</h3>
                  <ul class="keywords list-unstyled m-0 p-0">
                    <li><a href="#" class="">Panti</a></li>
                    <li><a href="#" class="">Asuhan</a></li>
                    <li><a href="#" class="">Yayasan</a></li>
                  </ul>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>

      <a href="#next" class="scroll-button smoothscroll">
        <span class=" icon-keyboard_arrow_down"></span>
      </a>

    </section>

    <section class="py-5 bg-image overlay-primary fixed overlay" id="next"
    style="background-image: url('https://siyatim.com/masjid3.jpg');">
      <div class="container">
        <div class="row mb-5 justify-content-center">
          <div class="col-md-7 text-center">
            <h2 class="section-title mb-2 text-white">Statistik Panti Asuhan</h2>
            <p class="lead text-white">Berikut ini adalah jumlah asuhan yang ada di Indonesia. Sangat banyak bukan? Dari total keseluruhan tersebut sebanyak 2000 sudah terdaftar di SIYATIM</p>
          </div>
        </div>
        <div class="row pb-0 block__19738 section-counter">

          <div class="col-6 col-md-6 col-lg-3 mb-5 mb-lg-0">
            <div class="d-flex align-items-center justify-content-center mb-2">
              <strong class="number" data-number="12345">0</strong>
            </div>
            <span class="caption">Panti Asuhan</span>
          </div>

          <div class="col-6 col-md-6 col-lg-3 mb-5 mb-lg-0">
            <div class="d-flex align-items-center justify-content-center mb-2">
              <strong class="number" data-number="2000"></strong>
            </div>
            <span class="caption">Terdaftar</span>
          </div>

          <div class="col-6 col-md-6 col-lg-3 mb-5 mb-lg-0">
            <div class="d-flex align-items-center justify-content-center mb-2">
              <strong class="number" data-number="120">0</strong>
            </div>
            <span class="caption">Lain-lain</span>
          </div>

          <div class="col-6 col-md-6 col-lg-3 mb-5 mb-lg-0">
            <div class="d-flex align-items-center justify-content-center mb-2">
              <strong class="number" data-number="550">0</strong>
            </div>
            <span class="caption">Lain-lain 2</span>
          </div>


        </div>
      </div>
    </section>



    <section class="site-section">
      <div class="container">

        <div class="row mb-5 justify-content-center">
          <div class="col-md-7 text-center">
            <h2 class="section-title mb-2"><?= $jumlah_panti ?> Panti Asuhan Terdaftar</h2>
          </div>
        </div>

        <ul class="job-listings mb-5">
        <?php 
        $jumlah_list = 0;
        foreach($info_panti as $in) : 
        $jumlah_list++;
        ?>
          <li class="job-listing d-block d-sm-flex pb-3 pb-sm-0 align-items-center">
            <a href="<?= base_url() ?>panti-asuhan/<?= $in['id_panti']?>"></a>
            <div class="job-listing-logo">
              <img src="<?= base_url(); ?>assets/img/panti/logo/<?=$in['logo_panti']?>" style="width:150px;height:150px"  alt="Image" class="img-fluid">
            </div>
            
            
            <div class="job-listing-about d-sm-flex custom-width w-100 justify-content-between mx-4">
              <div class="job-listing-position custom-width w-50 mb-3 mb-sm-0">
                <h2 class="font-weight-bold"><?= $in['nama_panti']?></h2>
                <p>
                <?= substr($in['deskripsi_panti_singkat'],0) ?>...
                
                </p>
              </div>
              <div class="job-listing-location mb-3 mb-sm-0 custom-width w-25">
                <span class="icon-room"></span> <?= $in['kota']?>
              </div>
              <div class="job-listing-meta">
                <span class="badge badge-success"><?= $in['jmlh_anak_yatim']?> Anak Yatim</span>
              </div>
            </div>            
          </li>    
          <?php endforeach ?>                
          
        </ul>

        <div class="row pagination-wrap">
          <div class="col-md-6 text-center text-md-left mb-4 mb-md-0">
            
          </div>
          <div class="col-md-6 text-center text-md-right">
            <div class="custom-pagination ml-auto">              
              <a href="<?= base_url('explore-panti')?>" class="next">Lebih banyak lagi</a>
            </div>
          </div>
        </div>

      </div>
    </section>

    <section class="py-5 bg-image overlay-primary fixed overlay" style="background-image: url('https://siyatim.com/masjid3.jpg');">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-md-8">
            <h2 class="text-white">Ingin segera bersedekah?</h2>
            <p class="mb-0 text-white lead">Segera mendaftar untuk dapat bersedekah ke seluruh Panti Asuhan di Indonesia yang telah tersedia di SIYATIM </p>
          </div>
          <div class="col-md-3 ml-auto">
            <a href="<?= base_url()?>daftar" class="btn btn-warning btn-block btn-lg">Buat Akun</a>
          </div>
        </div>
      </div>
    </section>


    <section class="site-section py-4">
      <div class="container">

        <div class="row align-items-center">
          <div class="col-12 text-center mt-4 mb-5">
            <div class="row justify-content-center">
              <div class="col-md-7">
                <h2 class="section-title mb-2">Partner dari SIYATIM</h2>
                <p class="lead">Berikut ini adalah nama-nama partner atau mitra kerja sama dari SIYATIM</p>
              </div>
            </div>

          </div>
          <div class="col-6 col-lg-3 col-md-6 text-center">
            <img src="<?= base_url(); ?>assets/template/jobboard/images/logo_mailchimp.svg" alt="Image" class="img-fluid logo-1">
          </div>
          <div class="col-6 col-lg-3 col-md-6 text-center">
            <img src="<?= base_url(); ?>assets/template/jobboard/images/logo_paypal.svg" alt="Image" class="img-fluid logo-2">
          </div>
          <div class="col-6 col-lg-3 col-md-6 text-center">
            <img src="<?= base_url(); ?>assets/template/jobboard/images/logo_stripe.svg" alt="Image" class="img-fluid logo-3">
          </div>
          <div class="col-6 col-lg-3 col-md-6 text-center">
            <img src="<?= base_url(); ?>assets/template/jobboard/images/logo_visa.svg" alt="Image" class="img-fluid logo-4">
          </div>

          <div class="col-6 col-lg-3 col-md-6 text-center">
            <img src="<?= base_url(); ?>assets/template/jobboard/images/logo_apple.svg" alt="Image" class="img-fluid logo-5">
          </div>
          <div class="col-6 col-lg-3 col-md-6 text-center">
            <img src="<?= base_url(); ?>assets/template/jobboard/images/logo_tinder.svg" alt="Image" class="img-fluid logo-6">
          </div>
          <div class="col-6 col-lg-3 col-md-6 text-center">
            <img src="<?= base_url(); ?>assets/template/jobboard/images/logo_sony.svg" alt="Image" class="img-fluid logo-7">
          </div>
          <div class="col-6 col-lg-3 col-md-6 text-center">
            <img src="<?= base_url(); ?>assets/template/jobboard/images/logo_airbnb.svg" alt="Image" class="img-fluid logo-8">
          </div>
        </div>
      </div>
    </section>


    <section class="bg-light pt-5 testimony-full">

      <div class="owl-carousel single-carousel">


        <div class="container">
          <div class="row">
            <div class="col-lg-6 align-self-center text-center text-lg-left">
              <blockquote>
                <p>&ldquo;Soluta quasi cum delectus eum facilis recusandae nesciunt molestias accusantium libero dolores
                  repellat id in dolorem laborum ad modi qui at quas dolorum voluptatem voluptatum repudiandae.&rdquo;
                </p>
                <p><cite> &mdash; Corey Woods, @Dribbble</cite></p>
              </blockquote>
            </div>
            <div class="col-lg-6 align-self-end text-center text-lg-right">
              <img src="<?= base_url(); ?>assets/template/jobboard/images/person_transparent_2.png" alt="Image" class="img-fluid mb-0">
            </div>
          </div>
        </div>

        <div class="container">
          <div class="row">
            <div class="col-lg-6 align-self-center text-center text-lg-left">
              <blockquote>
                <p>&ldquo;Soluta quasi cum delectus eum facilis recusandae nesciunt molestias accusantium libero dolores
                  repellat id in dolorem laborum ad modi qui at quas dolorum voluptatem voluptatum repudiandae.&rdquo;
                </p>
                <p><cite> &mdash; Chris Peters, @Google</cite></p>
              </blockquote>
            </div>
            <div class="col-lg-6 align-self-end text-center text-lg-right">
              <img src="<?= base_url(); ?>assets/template/jobboard/images/person_transparent.png" alt="Image" class="img-fluid mb-0">
            </div>
          </div>
        </div>

      </div>

    </section>

    <section class="pt-5 bg-image overlay-primary fixed overlay" style="background-image: url('https://siyatim.com/masjid3.jpg');">
      <div class="container">
        <div class="row">
          <div class="col-md-6 align-self-center text-center text-md-left mb-5 mb-md-0">
            <h2 class="text-white">Donasi Kapan Saja dan Di Mana Saja</h2>
            <p class="mb-5 lead text-white">Donasi melalui Platform SIYATIM melalui Smartphone ataupun Desktop. Website dapat diakses kapan saja dan di berbagai perangkat.</p>
            <!-- <p class="mb-0">
              <a href="#" class="btn btn-dark btn-md px-4 border-width-2"><span class="icon-apple mr-3"></span>App
                Store</a>
              <a href="#" class="btn btn-dark btn-md px-4 border-width-2"><span class="icon-android mr-3"></span>Play
                Store</a>
            </p> -->
          </div>
          <div class="col-md-6 ml-auto align-self-end">
            <img src="<?= base_url(); ?>assets/template/jobboard/images/apps.png" alt="Free Website Template by Free-Template.co" class="img-fluid">
          </div>
        </div>
      </div>
    </section>