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
            <h1>Pengaturan Akun</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url('donatur/dashboard') ?>">Home</a></li>
              <li class="breadcrumb-item"><a href="<?= base_url('donatur/dashboard/pengaturan') ?>">Pengaturan Akun</a></li>
              <li class="breadcrumb-item active"><?= $this->session->userdata('nama') ?></li>
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
                       src="<?= base_url() ?>assets/img/donatur/foto-profil/<?= $donatur['foto'] ?>"
                       alt="User profile picture">
                </div>

                <h3 class="profile-username text-center"><?= $donatur['nama'] ?></h3>
                              
                <p class="text-muted text-center"><?= $donatur['email'] ?></p>                                          
                
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
                  <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Foto Profil</a></li>                  
                  <li class="nav-item"><a class="nav-link" href="#ganti-password" data-toggle="tab">Ganti Password</a></li>

                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="activity">
                  <form method="POST"  enctype="multipart/form-data" action="<?= base_url() ?>donatur/dashboard/ganti-foto" class="form-horizontal">
                    
                    <input required type="text" hidden name="foto-lama" value="<?= $donatur['foto']?>">
                    <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Foto Profil</label>                                                               
                        <div class="col-sm-10 text-center">                          
                          <a href="<?= base_url() ?>assets/img/donatur/foto-profil/<?= $donatur['foto'] ?>" data-toggle="lightbox" data-title="Foto Profil <?= $donatur['nama'] ?>" data-gallery="gallery">
                            <img src="<?= base_url() ?>assets/img/donatur/foto-profil/<?= $donatur['foto'] ?>" class="img-fluid mb-2" width="300px" height="300px" alt="black sample"/>
                          </a>   
                        </div>                                                
                    </div>
                    <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label"></label>
                        <div class="col-sm-10">
                          <div class="custom-file">
                            <input required name="foto" type="file" class="custom-file-input" id="customFile">
                            <label class="custom-file-label" for="customFile">Pilih gambar (.jpg)</label>
                          </div>
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                        <button type="submit"  class="btn btn-info mt-2 mb-3"><i class="fas fa-file-upload mr-2"></i>Ganti</button>                                                                
                        </div>
                    </div>
                    </form>
                                        
                    <!-- /.post -->
                  </div>
                  <!-- /.tab-pane -->

                  <div class="tab-pane" id="ganti-password">
                  <form method="POST" action="<?= base_url() ?>donatur/dashboard/pengaturan" class="form-horizontal">                                       
                    <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Password Lama</label>
                        <div class="col-sm-10">
                          <input required type="password" class="form-control" name="password-lama" placeholder="Password lama...">
                          <?= form_error('password-lama', '<small class="text-danger">', '</small>') ?>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Password Baru</label>
                        <div class="col-sm-10">
                          <input required type="password" class="form-control" name="password-baru" placeholder="Password baru...">
                          <?= form_error('password-baru', '<small class="text-danger">', '</small>') ?>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Ulangi</label>
                        <div class="col-sm-10">
                          <input required type="password" class="form-control" name="password-baru-ulangi" placeholder="Ulangi password baru...">
                          <?= form_error('password-baru-ulangi', '<small class="text-danger">', '</small>') ?>
                        </div>
                      </div>
                    <!-- /.post -->
                    <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                            <button type="submit" class="btn btn-info"><i class="fas fa-save mr-2"></i>Simpan Perubahan</button>
                        </div>
                    </div>
                    <!-- /.post -->
                </form>
                  </div>
                  

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
        alwaysShowClose: true
      });
    });
  });  

 
  
</script>
</body>
</html>
