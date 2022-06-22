    
    <!-- HOME -->    
    <section class="section-hero home-section overlay inner-page bg-image" style="background-image: url('https://siyatim.com/masjid3.jpg');background-position: 50% 30%;"  id="home-section">
      <div class="container">
        <div class="row">
          <div class="col-md-7">
            <h1 class="text-white font-weight-bold"><?= $panti['nama_panti'] ?></h1>
            <div class="custom-breadcrumbs">
              <a href="<?= base_url()?>">Home</a> <span class="mx-2 slash">/</span>
              <a href="<?= base_url('explore-panti')?>">Panti Asuhan</a> <span class="mx-2 slash">/</span>
              <span class="text-white"><strong><?= $panti['nama_panti'] ?></strong></span>
            </div>
          </div>
        </div>
      </div>
    </section>
    
    <section class="site-section">
      <div class="container">
      <?= $this->session->flashdata('message'); ?>
        <div class="row align-items-center mb-5">
          <div class="col-lg-8 mb-4 mb-lg-0">
            <div class="d-flex align-items-center">
              <div class="border p-2 d-inline-block mr-3 rounded">
                <img style="width:150px;height:150px" src="<?= base_url('assets/img/panti/logo/') . $panti['logo_panti'] ?>" alt="Image">
              </div>
              <div>
                <h2><?= $panti['nama_panti'] ?></h2>
                <div>             
                  <!-- <span class="ml-0 mr-2 mb-2"><span class="icon-briefcase mr-2"></span>Puma</span> -->
                  <span class="m-2"><span class="icon-room mr-2"></span><?php if($panti['kota_panti'] == "Seluruh Indonesia"): echo "Belum ditentukan"; else: echo $panti['kota_panti']; endif ?></span>
                  <!-- <span class="m-2"><span class="icon-clock-o mr-2"></span><span class="text-primary">Full Time</span></span> -->
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="row">
              <div class="col-6">
                <a href="#" class="btn btn-block btn-light btn-md"><span class="icon-heart-o mr-2 text-danger"></span> by SIYATIM</a>
              </div>
              <div class="col-6">
                <button type="button" class="btn btn-block btn-primary btn-md"  data-toggle="modal" data-target="#exampleModal"><span class="icon-money"></span> Sedekah!</button>               
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-8">
            <div class="mb-5">
              <figure class="mb-5"><img src="<?= base_url('assets/img/panti/gambar-utama/') . $panti['gambar_utama'] ?>" alt="Image" class="img-fluid rounded"></figure>
              <h3 class="h5 d-flex align-items-center mb-4 text-primary"><span class="icon-align-left mr-3"></span>Deskripsi Singkat Panti Asuhan</h3>
              <p><?= $panti['deskripsi_panti_singkat'] ?></p>
            </div>
  

            <div class="mb-5">
              <h3 class="h5 d-flex align-items-center mb-4 text-primary"><span class="icon-turned_in mr-3"></span>Deskripsi Lengkap Panti Asuhan</h3>
                <p><?= $panti['deskripsi_panti_lengkap'] ?></p>
            </div>

            <div class="row mb-5">
              <!-- <div class="col-6">
                <a href="#" class="btn btn-block btn-light btn-md"><span class="icon-heart-o mr-2 text-danger"></span>Save Job</a>
              </div> -->
              <!-- <div class="col-6">
                <a href="#" class="btn btn-block btn-primary btn-md">Sedekah</a>
              </div> -->
            </div>

          </div>
          <div class="col-lg-4">
            <div class="bg-light p-3 border rounded mb-4">
              <h3 class="text-primary  mt-3 h5 pl-3 mb-3 ">Informasi Panti</h3>
              <ul class="list-unstyled pl-3 mb-0">
                <li class="mb-2"><strong class="text-black">Ketua Yayasan:</strong> <?= $panti['ketua_panti'] ?></li>
                <li class="mb-2"><strong class="text-black">Alamat:</strong> <?= $panti['alamat_panti'] ?></li>
                <li class="mb-2"><strong class="text-black">Telepon:</strong> <?= $panti['telepon_panti'] ?></li>
                <li class="mb-2"><strong class="text-black">Jumlah Anak Yatim:</strong> <?= $panti['jmlh_anak_yatim'] ?></li>                
              </ul>
            </div>

            <!-- <div class="bg-light p-3 border rounded">
              <h3 class="text-primary  mt-3 h5 pl-3 mb-3 ">Share</h3>
              <div class="px-3">
                <a href="#" class="pt-3 pb-3 pr-3 pl-0"><span class="icon-facebook"></span></a>
                <a href="#" class="pt-3 pb-3 pr-3 pl-0"><span class="icon-twitter"></span></a>
                <a href="#" class="pt-3 pb-3 pr-3 pl-0"><span class="icon-linkedin"></span></a>
                <a href="#" class="pt-3 pb-3 pr-3 pl-0"><span class="icon-pinterest"></span></a>
              </div>
            </div> -->

          </div>
        </div>
      </div>
    </section>

  <?php if($this->session->userdata('akses') == "donatur"): ?>
     <!-- Modal -->
     <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Yuk Sedekah!</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>

          <form action="<?= base_url('donatur/donasi') ?>" method="POST">
            <div class="modal-body">
              <input required type="text" hidden name="id-panti" hidden value="<?= $panti['id_panti']?>">
              <?= form_error('id-panti', '<small class="text-danger pl-3">', '</small>') ?>
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="basic-addon1">Nama Donatur</span>
                </div>
                <input required type="text" class="form-control" placeholder="Masukkan Nama Donatur" aria-label="nama-donatur"  id="nama-donatur" name="nama-donatur" aria-describedby="basic-addon1">
                <?= form_error('nama-donatur', '<small class="text-danger pl-3">', '</small>') ?>
              </div>
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="basic-addon1">No. WhatsApp</span>
                </div>
                <input required type="text" class="form-control" placeholder="Masukkan Nomor WhatsApp" aria-label="no-whatsapp"  id="no-whatsapp" name="no-whatsapp" aria-describedby="basic-addon1">
                <?= form_error('no-whatsapp', '<small class="text-danger pl-3">', '</small>') ?>
              </div>
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="basic-addon1">Rp.</span>
                </div>
                <input required type="number" min="1" class="form-control" placeholder="Masukkan Jumlah Donasi" aria-label="jumlah-donasi"  id="jumlah-donasi" name="jumlah-donasi" aria-describedby="basic-addon1">
                <?= form_error('jumlah-donasi', '<small class="text-danger pl-3">', '</small>') ?>
              </div>
              <p><small>* Isikan No. WhatsApp dengan nomor yang akan digunakan untk pengiriman bukti transfer</small></p>
              <p><small>* Setiap donasi yang diberikan, 3% akan diberikan untuk platform SIYATIM dan 97% untuk Panti Asuhan</small></p>               
            </div>
            <div class="modal-footer">                      
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Donasi</button>
            </div>
          </form>
        </div>
      </div>
    </div>

  <?php else: ?>

  
     <!-- Modal -->
     <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Sudah mendaftar memiliki akun?</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>

                      <div class="container">
                        
                        <div class="modal-body">
                        <div class="row justify-content-md-center">
                          
                          <div class="col-md-auto">
                            <a href="<?= base_url('login')?>" class="text-center btn btn-primary"><i class="fas fa-sign-in-alt"></i> Login Donatur</a>     
                          </div>
                          
                        </div>                        
                      </div>
                        </div>
                                     
                      
                    </div>
                  </div>
                </div>
  <?php endif ?>