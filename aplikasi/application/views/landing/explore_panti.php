    <!-- HOME -->
  <section class="section-hero home-section overlay inner-page bg-image" style="background-image: url('https://siyatim.com/masjid3.jpg');background-position: 50% 30%;"  id="home-section">

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

    
    <section class="site-section" id="next">
      <div class="container">

        <div class="row mb-5 justify-content-center">
          <div class="col-md-7 text-center">
            <h2 class="section-title mb-2">Terdapat <?= $jumlah_panti ?> Panti Asuhan</h2>
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
            <span>Menampilkan 1-<?= $jumlah_list ?> dari <?= $jumlah_panti ?> Panti Asuhan</span>
          </div>
          <div class="col-md-6 text-center text-md-right">
            <!-- <div class="custom-pagination ml-auto">
              <a href="#" class="prev">Prev</a>
              <div class="d-inline-block">
              <a href="#" class="active">1</a>
              <a href="#">2</a>
              <a href="#">3</a>
              <a href="#">4</a>
              </div>
              <a href="#" class="next">Next</a>              
            </div> -->
    
            <div class="custom-pagination ml-auto">              
              
                <?= $this->pagination->create_links(); ?>
                                   
            </div>

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
