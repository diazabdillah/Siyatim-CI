<!-- Select2 -->
<link rel="stylesheet" href="<?= base_url() ?>assets/template/adminLTE3/plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>assets/template/adminLTE3/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Detail Panti Asuhan</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url('admin/dashboard') ?>">Home</a></li>
              <li class="breadcrumb-item"><a href="<?= base_url('admin/dashboard/data-panti') ?>">Data Panti Asuhan</a></li>
              <li class="breadcrumb-item active"><?= $panti['nama_panti'] ?></li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"
                       src="<?= base_url() ?>assets/img/panti/logo/<?= $panti['logo_panti'] ?>"
                       alt="User profile picture">
                </div>

                <h3 class="profile-username text-center"><?= $panti['nama_panti'] ?></h3>
                
                <div class="text-center">
                <?php if($panti['status_panti'] == 1) : ?>
                  <span class="badge bg-success">Aktif</span>
                <?php elseif($panti['status_panti'] == 0): ?>
                  <span class="badge bg-danger">Nonaktif</span>
                <?php endif ?>
                  
                </div>
                

                <p class="text-muted text-center"><?= $panti['email_panti'] ?></p>
                

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Jumlah Anak Yatim</b> <a class="float-right"><?= $panti['jmlh_anak_yatim']?></a>
                  </li>
                  <li class="list-group-item">
                    <b>Transaksi Donasi</b> <a class="float-right">543</a>
                  </li>
                  <li class="list-group-item">
                    <b>Pelaporan</b> <a class="float-right">13,287</a>
                  </li>
                </ul>

                <?php if($panti['status_panti'] == 1) : ?>
                  <a href="<?= base_url() ?>admin/dashboard/data-panti/nonaktifkan/<?= $panti['id_panti'] ?>" onclick="return confirm('Menonaktifkan panti, akan membuat panti tidak tampil pada pencarian. Anda yakin?')" class="btn btn-danger btn-block"><b>Nonaktifkan Panti</b></a>
                <?php elseif($panti['status_panti'] == 0): ?>
                  <a href="<?= base_url() ?>admin/dashboard/data-panti/aktifkan/<?= $panti['id_panti'] ?>" onclick="return confirm('Aktifkan panti, akan membuat panti tampil pada pencarian. Anda yakin?')" class="btn btn-success btn-block"><b>Aktifkan Panti</b></a>                  
                <?php endif ?>
                
                <a href="<?= base_url() ?>admin/dashboard/data-panti/reset-password/<?= $panti['id_panti'] ?>" onclick="return confirm('Mereset password panti, akan membuat password menjadi : siyatim-panti . Anda yakin?')" class="btn btn-warning btn-block"><b>Reset Password</b></a>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- About Me Box -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Tentang Panti</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <strong><i class="fas fa-person-booth mr-1"></i> Ketua Yayasan</strong>

                <p class="text-muted">
                  <?= $panti['ketua_panti'] ?>
                </p>

                <hr>

                <strong><i class="fas fa-map-marker-alt mr-1"></i> Alamat</strong>

                <p class="text-muted"><?= $panti['alamat_panti'] ?></p>

                <hr>

                <strong><i class="fas fa-phone mr-1"></i> Telepon</strong>

                <p class="text-muted">
                  <?= $panti['telepon_panti'] ?>
                </p>

                <hr>

                <strong><i class="far fa-file-alt mr-1"></i> Deskripsi Singkat</strong>

                <p class="text-muted"><?= $panti["deskripsi_panti_singkat"] ?></p>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <?= $this->session->flashdata('message'); ?>
            <?= $this->session->flashdata('message_resetpass'); ?>
            <?= $this->session->flashdata('message_aktif_non_aktif'); ?>
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Deskripsi Lengkap</a></li>
                  <li class="nav-item"><a class="nav-link" href="#donasi" data-toggle="tab">Donasi</a></li>
                  <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Kelola Informasi</a></li>
                  <li class="nav-item"><a class="nav-link" href="#pelaporan" data-toggle="tab">Pelaporan Keuangan & Transfer</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="activity">
                    <!-- Post -->
                    <div class="post">                  
                      
                      <?= $panti["deskripsi_panti_lengkap"] ?>
                      <p>
                      <a href="#" class="link-black text-sm mr-2"><i class="fas fa-share mr-1"></i> Informasi ini akan muncul di halaman panti</a>                                                
                      </p>

                    </div>
                    <!-- /.post -->
                    
                    <!-- /.post -->
                  </div>
                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="pelaporan">
                    <!-- The timeline -->
                    <div class="timeline timeline-inverse">
                    <?= form_error('bukti-transfer', '<small class="text-danger pl-3">', '</small>') ?>
                      <?php foreach($bulan as $bln): ?>
                      
                          
                        <?php if(count($bln) != 7): ?>
                          <div class="time-label">
                            <button data-toggle="modal" data-target="#modal-transfer-<?= $bln['modal']?>"class="btn-danger btn">
                            <?= $bln['bulan_tahun'] ?>
                            </button>
                          </div>
                          <div>
                        <i class="fas fa-comments bg-warning"></i>

                        <div class="timeline-item">
                          <span class="time">
                              <span style="font-size:100%" class="badge bg-danger mr-2">Belum ditransfer</span>
                              <i class="far fa-clock"></i> <?= $bln['tgl_perbarui'] ?>
                          </span>
                        
                          <h3 class="timeline-header"><a href="#"><?= $panti['nama_panti'] ?></a> mendapatkan Rp. <?= number_format($bln['total_bulanan'],2,",",".");  ?>.</h3>

                          <div class="timeline-body">
                          <span class="text-danger">Panti belum mengupload laporan keuangan pada bulan ini.</span>  
                          
                          </div>                       
                        </div>
                      </div>
                      
                        <?php else : ?>
                          <div class="time-label">
                            <button data-toggle="modal" data-target="#modal-transfer-<?= $bln['modal']?>"class="btn-success btn">
                            <?= $bln['bulan_tahun'] ?>
                            </button>
                          </div>

                          <div>
                        <i class="fas fa-comments bg-warning"></i>

                        <div class="timeline-item">
                          <span class="time">
                            <span style="font-size:100%" class="badge bg-success mr-2">Sudah ditransfer</span>
                            <i class="far fa-clock"></i> <?= $bln['tgl_perbarui'] ?>
                          </span>
                          

                          <h3 class="timeline-header"><a href="#"><?= $panti['nama_panti'] ?></a> mendapatkan Rp. <?= number_format($bln['total_bulanan'],2,",",".");  ?> . </h3>

                          <div class="timeline-body">
                            <b>Bukti transfer :</b>
                            <br>
                            <a href="<?= base_url() ?>assets/img/admin/bukti-transfer/<?= $bln['bukti_transfer'] ?>" data-toggle="lightbox" data-title="Bukti Transfer <?= $bln['bulan_tahun'] ?>" data-gallery="gallery">
                              <img src="<?= base_url() ?>assets/img/admin/bukti-transfer/<?= $bln['bukti_transfer'] ?>" class="img-fluid mb-2" width="100px" height="100px" alt="black sample"/>
                            </a>
                              <br>
                           <?php if($bln['file_laporan_panti'] == ""): ?>
                            </div>
                            <div class="timeline-body">
                              <span class="text-danger">Panti belum mengupload laporan keuangan pada bulan ini.</span>  
                            </div>   
                            
                           <?php else : ?>
                            Silahkan download laporan keuangan panti melalui tombol di bawah ini.
                          </div>
                          
                          <div class="timeline-footer">
                            <a target="_blank" href="<?= base_url() ?>assets/file/panti/laporan-keuangan/<?= $bln['file_laporan_panti'] ?>" class="btn btn-info btn-sm">Download (.xls)</a>
                            </div>
                           <?php endif ?>
                        </div>
                      </div>
                     
                        <?php endif ?>                                                                                               
                      
                      
                      <?php endforeach?>
                      
                                                        
                      <div>
                        <i class="far fa-clock bg-gray"></i>
                      </div>
                    </div>
                  </div>
                  <!-- /.tab-pane -->

                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="donasi">
                  
                  <div class="row">
                    <div class="col-4">
                      <strong>Total Donasi Donatur</strong>                      
                    </div>
                    <div class="col-8">
                      <p class="muted float-right">
                        Rp. <?= number_format($total_donasi_panti['hasil'],2,",",".");  ?>
                      </p>
                    </div>                    
                  </div>
                  <div class="row">
                    <div class="col-4">
                      <strong>Total Pendapatan Panti</strong>                      
                    </div>
                    <div class="col-8">
                      <p class="muted float-right text-danger">
                        Rp. <?= number_format($total_pendapatan_panti['hasil'],2,",",".");  ?> 
                      </p>
                    </div>                    
                  </div>
                  <div class="row">
                    <div class="col-4">
                      <strong>Total untuk Platform</strong>                      
                    </div>
                    <div class="col-8">
                      <p class="muted float-right text-success">
                        Rp. <?= number_format($total_untuk_platform['hasil'],2,",",".");  ?>
                      </p>
                    </div>                    
                  </div>
                  <hr>                
                  <div class="table-responsive">            
                <table id="example1" class="text-center table table-bordered table-striped">
                    <thead>
                    <tr>                  
                      <th>No</th>
                      <th>Tanggal Validasi</th>
                      <th>Donatur</th>                                  
                      <th>Total Donasi</th>
                      <th>Pendapatan</th>
                      <th>Platform (3% per donasi)</th>                    
                    </tr>
                    </thead>
                    <tbody>
                    <?php $i=0;
                    foreach($donasi as $d): 
                    $i++;
                    ?>
                    <tr>      
                      <td><?= $i ?></td>
                      <td><?= date("d M Y", strtotime($d['tgl_validasi_bukti'])) ?></td>
                      <td><?= $d['nama'] ?></td>                                  
                      <td>Rp. <?= number_format($d['jumlah_transfer'],2,",",".");  ?></td>
                      <td class="text-danger">Rp. <?= number_format($d['pendapatan_panti'],2,",",".");  ?></td>
                      <td class="text-success">Rp.<?= number_format($d['untuk_platform'],2,",","."); ?></td>                               
                    </tr>     
                    <?php endforeach ?>                          
                    </tbody>
                    <tfoot>
                    <tr>                    
                      <th>No</th>
                      <th>Tanggal</th>
                      <th>Donatur</th>                                  
                      <th>Total Donasi</th>
                      <th>Pendapatan</th>
                      <th>Platform (3% per donasi)</th>                     
                    </tr>                
                    </tr>
                    </tfoot>
                </table>
              </div>
 
                  </div>
                  <!-- /.tab-pane -->

                  <div class="tab-pane" id="settings">
                    <form method="POST"  enctype="multipart/form-data" action="<?= base_url() ?>admin/dashboard/data-panti/detail/<?= $panti['id_panti']?>" class="form-horizontal">
                    <input type="text" hidden name="logo-panti-lama" value="<?= $panti['logo_panti']?>">
                    <input type="text" hidden name="gambar-utama-lama" value="<?= $panti['gambar_utama']?>">
                    <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Logo Panti</label>                                                               
                        <div class="col-sm-10 text-center">                          
                          <a href="<?= base_url() ?>assets/img/panti/logo/<?= $panti['logo_panti'] ?>" data-toggle="lightbox" data-title="Logo <?= $panti['nama_panti'] ?>" data-gallery="gallery">
                            <img src="<?= base_url() ?>assets/img/panti/logo/<?= $panti['logo_panti'] ?>" class="img-fluid mb-2" width="300px" height="300px" alt="black sample"/>
                          </a>   
                        </div>                                                
                    </div>
                    <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label"></label>
                        <div class="col-sm-10">
                          <div class="custom-file">
                            <input name="logo-panti" type="file" class="custom-file-input" id="customFile">
                            <label class="custom-file-label" for="customFile">Pilih gambar (.jpg)</label>
                          </div>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Nama Panti</label>
                        <div class="col-sm-10">
                          <input required type="text" class="form-control" name="nama-panti" value="<?= $panti['nama_panti']?>" placeholder="Nama panti asuhan...">
                          <?= form_error('nama-panti', '<small class="text-danger pl-3">', '</small>') ?>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Email Panti</label>
                        <div class="col-sm-10">
                          <input required type="email" class="form-control" name="email-panti" value="<?= $panti['email_panti']?>" placeholder="Email panti asuhan...">
                          <?= form_error('email-panti', '<small class="text-danger pl-3">', '</small>') ?>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputName2" class="col-sm-2 col-form-label">Nama Ketua Yayasan</label>
                        <div class="col-sm-10">
                          <input required type="text" class="form-control" name="ketua-panti" value="<?= $panti['ketua_panti']?>" placeholder="Nama ketua yayasan...">
                          <?= form_error('ketua-panti', '<small class="text-danger pl-3">', '</small>') ?>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputName2" class="col-sm-2 col-form-label">Jumlah Anak Yatim</label>
                        <div class="col-sm-10">
                          <input required type="number" min="0" class="form-control" name="jmlh-anak-yatim" value="<?= $panti['jmlh_anak_yatim']?>" placeholder="Nama ketua yayasan...">
                          <?= form_error('jmlh-anak-yatim', '<small class="text-danger pl-3">', '</small>') ?>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputName2" class="col-sm-2 col-form-label">Telepon Panti</label>
                        <div class="col-sm-10">
                          <input required type="text" class="form-control" name="telepon-panti" value="<?= $panti['telepon_panti']?>" placeholder="Telepon panti asuhan...">
                          <?= form_error('telepon-panti', '<small class="text-danger pl-3">', '</small>') ?>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputName2" class="col-sm-2 col-form-label">Alamat Panti</label>
                        <div class="col-sm-10">
                          <input required type="text" class="form-control" name="alamat-panti" value="<?= $panti['alamat_panti']?>" placeholder="Alamat panti asuhan...">
                          <?= form_error('alamat-panti', '<small class="text-danger pl-3">', '</small>') ?>
                        </div>
                      </div>      
                      <div class="form-group row">
                      <label for="inputName2" class="col-sm-2 col-form-label">Kota/Kab</label>
                      <div class="col-sm-10">
                        <select required name="kota-panti" class="form-control select2bs4" style="width: 100%;">
                        <?php foreach ($kota as $row) : ?>
                          <option value='<?= $row->KODEKOTA ?>' <?php if($panti['id_kota_panti'] == $row->KODEKOTA): echo "selected"; endif ?> ><?= $row->NAMAKOTA ?></option>";
                        <?php endforeach ?>    
                        </select>   
                        <?= form_error('kota-panti', '<small class="text-danger pl-3">', '</small>') ?>
                      </div>
                      </div>               
                      <div class="form-group row">
                        <label for="inputExperience" class="col-sm-2 col-form-label">Deskripsi Singkat</label>
                        <div class="col-sm-10">
                          <textarea required class="form-control" name="deskripsi-panti-singkat" placeholder="Deskripsi singkat panti asuhan..."><?= $panti['deskripsi_panti_singkat']?></textarea>
                          <?= form_error('deskripsi-panti-singkat', '<small class="text-danger pl-3">', '</small>') ?>
                        </div>
                      </div> 
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Gambar Utama Panti</label>                                                               
                        <div class="col-sm-10 text-center">                          
                          <a href="<?= base_url() ?>assets/img/panti/gambar-utama/<?= $panti['gambar_utama'] ?>" data-toggle="lightbox" data-title="Gambar Utama <?= $panti['nama_panti'] ?>" data-gallery="gallery">
                            <img width="300px" height="300px" src="<?= base_url() ?>assets/img/panti/gambar-utama/<?= $panti['gambar_utama'] ?>" class="img-fluid mb-2" alt="black sample"/>
                          </a>   
                        </div>                                                
                    </div>
                    <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label"></label>
                        <div class="col-sm-10">
                          <div class="custom-file">
                            <input name="gambar-utama" type="file" class="custom-file-input" id="customFile">
                            <label class="custom-file-label" for="customFile">Pilih gambar (.jpg)</label>
                          </div>
                        </div>
                      </div>
                      <div class="form-group row">       
                      <label for="inputExperience" class="col-sm-2 col-form-label">Deskripsi Lengkap</label>                                   
                        <div class="col-sm-10"">
                          <textarea required  name="deskripsi-panti-lengkap" class="textarea" placeholder="Deskripsi lengkap panti asuhan..."
                                    style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?= $panti['deskripsi_panti_lengkap']?></textarea>
                          <?= form_error('deskripsi-panti-lengkap', '<small class="text-danger pl-3">', '</small>') ?>
                        </div>                        
                      </div>
                                          
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <button type="submit" class="btn btn-info"><i class="fas fa-save mr-2"></i>Simpan Perubahan</button>
                        </div>
                      </div>
                    </form>
                  </div>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.nav-tabs-custom -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>  
  <!-- modal start -->
  <?php foreach($bulan as $bln): ?>
                                                
  <div class="modal fade" id="modal-transfer-<?= $bln['modal'] ?>">                      
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title"><?= $bln['bulan_tahun'] ?></h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <form action="<?= base_url() ?>admin/dashboard/data-panti/upload-bukti-transfer/"  enctype="multipart/form-data" method="POST">
        <div class="modal-body">
          <p>Upload bukti transfer :</p>        
            <input type="text" name="bulan-tahun" value="<?= $bln['bulan_tahun'] ?>" hidden>
            <input type="text" name="id-admin" value="<?= $this->session->userdata('id_admin'); ?>" hidden>
            <input type="text" name="id-panti" value="<?= $panti['id_panti'] ?>" hidden>
            <div class="custom-file">            
              <input required name="bukti-transfer" type="file" class="custom-file-input" id="customFile">
              <label class="custom-file-label" for="customFile">Pilih gambar (.jpg)</label>
            </div>
            
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Upload</button>
        </div>
        </form>
      </div>
    </div>
  </div>
  <!-- model end -->

  <?php endforeach ?>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">      
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?= base_url() ?>assets/template/adminLTE3/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url() ?>assets/template/adminLTE3/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url() ?>assets/template/adminLTE3/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->

<script src="<?= base_url() ?>assets/template/adminLTE3/plugins/summernote/summernote-bs4.min.js"></script>
<!-- Select2 -->
<script src="<?= base_url() ?>assets/template/adminLTE3/plugins/select2/js/select2.full.min.js"></script>
<!-- Ekko Lightbox -->
<script src="<?= base_url() ?>assets/template/adminLTE3/plugins/ekko-lightbox/ekko-lightbox.min.js"></script>
<!-- bs-custom-file-input -->
<script src="<?= base_url() ?>assets/template/adminLTE3/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<!-- DataTables -->
<script src="<?= base_url() ?>assets/template/adminLTE3/plugins/datatables/jquery.dataTables.js"></script>
<script src="<?= base_url() ?>assets/template/adminLTE3/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<script src="<?= base_url() ?>assets/template/adminLTE3/plugins/sweetalert2/sweetalert2.min.js"></script>
<script>
  
  $(function () {
    bsCustomFileInput.init();

    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })



     // Summernote
  $('.textarea').summernote({
      toolbar: [
        // [groupName, [list of button]]   
        ['style1', ['style']],
        ['style2', ['bold', 'italic', 'underline', 'clear']],
        ['font', ['strikethrough']],
        ['fontsize', ['fontsize']],
        ['color', ['forecolor']],
        ['para', ['ul', 'ol', 'paragraph']],
        ['insert1', ['table']],
        ['insert2', ['link', 'video']],        
        ['misc1', ['undo', 'redo']],
        ['misc2', ['fullscreen','help']]
        
      ]
    });

    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
    });

    $(document).on('click', '[data-toggle="lightbox"]', function(event) {
      event.preventDefault();
      $(this).ekkoLightbox({
        alwaysShowClose: true,
        leftArrow: '',
        rightArrow: ''
      });
    });
  });  

 
  
</script>
</body>
</html>
