
    <!-- HOME -->
    <section class="section-hero overlay inner-page bg-image" style="background-image: url('https://siyatim.com/masjid3.jpg');background-position: 50% 30%;" id="home-section">
      <div class="container">
        <div class="row">
          <div class="col-md-7">
            <h1 class="text-white font-weight-bold">Contact Us</h1>
            <div class="custom-breadcrumbs">
              <a href="#">Home</a> <span class="mx-2 slash">/</span>
              <span class="text-white"><strong>Contact Us</strong></span>
            </div>
          </div>
        </div>
      </div>
    </section>
    <?= $this->session->flashdata('msg'); ?>
    <section class="site-section" id="next-section">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 mb-5 mb-lg-0">
            <form action="<?= base_url()?>contact" method="post" class="">

              <div class="row form-group">
                <div class="col-md-6 mb-3 mb-md-0">
                  <label class="text-black" for="fname">Nama Awal</label>
                  <input autofocus type="text" id="fname" name="fname" class="form-control">
                  <?= form_error('fname', '<small class="text-danger pl-3">', '</small>') ?>
                </div>
                <div class="col-md-6">
                  <label class="text-black" for="lname">Nama Akhir</label>
                  <input type="text" id="lname" name="lname" class="form-control">
                  <?= form_error('lname', '<small class="text-danger pl-3">', '</small>') ?>
                </div>
              </div>

              <div class="row form-group">
                
                <div class="col-md-12">
                  <label class="text-black" for="email">Email</label> 
                  <input type="email" name="email" id="email" class="form-control">
                  <?= form_error('email', '<small class="text-danger pl-3">', '</small>') ?>
                </div>
              </div>

              <div class="row form-group">
                
                <div class="col-md-12">
                  <label class="text-black" for="subject">Subjek</label> 
                  <input type="subject" name="subject" id="subject" class="form-control">
                  <?= form_error('subject', '<small class="text-danger pl-3">', '</small>') ?>
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12">
                  <label class="text-black" for="message">Isi Pesan</label> 
                  <textarea name="message" id="message" cols="30" rows="7" class="form-control" placeholder="Tuliskan pesan atau pertanyaanmu di sini..."></textarea>
                  <?= form_error('message', '<small class="text-danger pl-3">', '</small>') ?>
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12">
                  <input type="submit" value="Kirim Pesan" class="btn btn-primary btn-md text-white">
                </div>
              </div>

  
            </form>
          </div>
          <div class="col-lg-5 ml-auto">
            <div class="p-4 mb-3 bg-white">
              <p class="mb-0 font-weight-bold">Alamat</p>
              <p class="mb-4">203 Fake St. Mountain View, San Francisco, California, USA</p>

              <p class="mb-0 font-weight-bold">Nomor Telepon</p>
              <p class="mb-4"><a href="#">+1 232 3235 324</a></p>

              <p class="mb-0 font-weight-bold">Alamat Email</p>
              <p class="mb-0"><a href="#">kontak@siyatim.com</a></p>

            </div>
          </div>
        </div>
      </div>
    </section>

   