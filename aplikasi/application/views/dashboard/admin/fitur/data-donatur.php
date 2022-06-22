  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data Donatur</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Data Donatur</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
    <div class="row">
        <div class="col-12">
            <dic class="card">
                <div class="card-header">
                    <h3 class="card-title">Tambah User Donatur</h3>
                </div>

                <div class="card-body">
                <?= $this->session->flashdata('message'); ?>
                    <form method="POST" action="<?= base_url() ?>admin/dashboard/data-donatur">
                        <div class="form-group row">
                            <label for="inputPassword" class="col-sm-2 col-form-label">Nama Donatur</label>
                            <div class="col-sm-10">
                                <input name="nama" placeholder="Masukkan nama Donatur..." type="text" class=" form-control" id="inputPassword">
                                <?= form_error('nama', '<small class="text-danger pl-3">', '</small>') ?>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputPassword" class="col-sm-2 col-form-label">Email Donatur</label>
                            <div class="col-sm-10">
                                <input name="email" placeholder="Masukkan email Donatur..." type="email" class=" form-control" id="inputPassword">
                                <?= form_error('email', '<small class="text-danger pl-3">', '</small>') ?>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputPassword" class="col-sm-2 col-form-label">Password Default</label>
                            <div class="col-sm-10">
                                <input value="siyatim-donatur" disabled placeholder="Masukkan password donatur..." type="text" class=" form-control" id="inputPassword">
                            </div>
                        </div>

                        
                        <div class="row">
                            <button class="btn btn-info btn-block btn-sm" type="submit"><i class="fas fa-plus"></i> Tambah Data</button>
                        </div>
                    </form>
                </div>
            </dic>
        </div>
    </div>
      <div class="row">
        <div class="col-12">
        <div class="card">
            <div class="card-header">
              <h3 class="card-title">Data Donatur</h3> 
            </div>
            <!-- /.card-header -->            
            <div class="card-body">
            <?= $this->session->flashdata('message_hapus'); ?>
            <div class="table-responsive">            
                <table id="example1" class="text-center table table-bordered table-striped">
                    <thead>
                    <tr>                  
                    <th>No</th>
                    <th>Nama Panti Asuhan</th>                                  
                    <th>Email</th>
                    <th>Status Email</th>
                    <th>Aksi</th>  
                    </tr>
                    </thead>
                    <tbody>
                    <?php $i=0;
                    foreach($donatur as $p): 
                    $i++;
                    ?>
                    <tr>      
                    <td><?= $i ?></td>  
                    
                    <td><?= $p['nama']?></td>
                    <td><?= $p['email']?></td>  
                    <!-- <td>
                        <img src="<?= base_url() ?>assets/img/panti/logo/<?= $p['logo']?>" alt="Logo" width="50px" height="50px">
                    </td> -->
                    <td>
                        <?php if($p['status'] == 1) : ?>
                            <span class="badge bg-success">Terverifikasi</span>
                        <?php elseif($p['status'] == 0): ?>
                            <span class="badge bg-danger">Belum Terverifikasi</span>
                        <?php endif ?>                   
                   </td>  
                    <td>      
                       <?php if($p['status'] == 0): ?>
                        <a href="<?= base_url('admin/dashboard/data-donatur/verifikasi/')?><?= $p['id_donatur']?>" class="btn btn-info btn-sm btn-block">
                        <i class="float-left fas fa-heart"></i> Verifikasi</a> 
                       <?php else : ?>
                        <a onclick="return confirm('Un-verifikasi akan  menyebabkan donatur tidak bisa login. Anda yakin?')" href="<?= base_url('admin/dashboard/data-donatur/unverifikasi/')?><?= $p['id_donatur']?>" class="btn btn-secondary btn-sm btn-block">
                        <i class="float-left fas fa-heart-broken"></i>
                                Un-verifikasi</a>
                       <?php endif ?>
                        <a href="data-donatur/hapus/<?= $p['id_donatur']?>" onclick="return confirm('Anda yakin mau menghapus?')" class="btn btn-danger btn-sm btn-block">
                        <i class="float-left fas fa-trash"></i>
                        Hapus  </a>
                    </td>                              
                    </tr>     
                    <?php endforeach ?>                          
                    </tbody>
                    <tfoot>
                    <tr>
                    <th>No</th>
                    <th>Nama donatur</th>                                  
                    <th>Email</th>
                    <th>Status Email</th>
                    <th>Aksi</th>  
                    </tr>                
                    </tr>
                    </tfoot>
                </table>
              </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>  
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    
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
<!-- DataTables -->
<script src="<?= base_url() ?>assets/template/adminLTE3/plugins/datatables/jquery.dataTables.js"></script>
<script src="<?= base_url() ?>assets/template/adminLTE3/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url() ?>assets/template/adminLTE3/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?= base_url() ?>assets/template/adminLTE3/dist/js/demo.js"></script>

<!-- page script -->
<script>
  $(function () {
    $("#example1").DataTable();

    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
    });
  });

</script>
</body>
</html>

