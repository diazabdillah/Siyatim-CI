  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data Panti Asuhan</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url('admin/dashboard') ?>">Home</a></li>
              <li class="breadcrumb-item active">Data Panti Asuhan</li>
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
                    <h3 class="card-title">Tambah User Panti Asuhan</h3>
                </div>

                <div class="card-body">
                <?= $this->session->flashdata('message'); ?>
                    <form method="POST" action="<?= base_url() ?>admin/dashboard/data-panti">
                        <div class="form-group row">
                            <label for="nama-panti" class="col-sm-2 col-form-label">Nama Panti Asuhan</label>
                            <div class="col-sm-10">
                                <input name="nama-panti" placeholder="Masukkan nama panti asuhan..." type="text" class=" form-control" id="nama-panti">
                                <?= form_error('nama-panti', '<small class="text-danger pl-3">', '</small>') ?>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email-panti" class="col-sm-2 col-form-label">Email Panti Asuhan</label>
                            <div class="col-sm-10">
                                <input name="email-panti" placeholder="Masukkan email panti asuhan..." type="email" class=" form-control" id="email-panti">
                                <?= form_error('email-panti', '<small class="text-danger pl-3">', '</small>') ?>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-panti" class="col-sm-2 col-form-label">Password Default</label>
                            <div class="col-sm-10">
                                <input value="siyatim-panti" disabled placeholder="Masukkan password asuhan..." type="text" class=" form-control" id="password-panti">
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
              <h3 class="card-title">Data Panti Asuhan</h3> 
            </div>
            <!-- /.card-header -->            
            <div class="card-body">
            <?= $this->session->flashdata('message_hapus'); ?>
            <div class="table-responsive">            
                <table id="example1" class="text-center table table-bordered table-striped">
                    <thead>
                    <tr>                  
                    <th>No</th>
                    <th>Logo</th>
                    <th>Nama Panti Asuhan</th>                                  
                    <th>Email</th>
                    <th>Status</th>
                    <th>Kota</th>
                    <th>Aksi</th>  
                    </tr>
                    </thead>
                    <tbody>
                    <?php $i=0;
                    foreach($panti as $p): 
                    $i++;
                    ?>
                    <tr>      
                    <td><?= $i ?></td>  
                    <td>
                        <img src="<?= base_url() ?>assets/img/panti/logo/<?= $p['logo_panti']?>" alt="Logo Panti" width="50px" height="50px">
                    </td>
                    <td><?= $p['nama_panti']?></td>
                    <td><?= $p['email_panti']?></td>  
                    <td>
                        <?php if($p['status_panti'] == 1) : ?>
                            <span class="badge bg-success">Aktif</span>
                        <?php elseif($p['status_panti'] == 0): ?>
                            <span class="badge bg-danger">Nonaktif</span>
                        <?php endif ?>                   
                    </td>                                       
                    <td><?= $p['kota_panti']?></td>
                    <td>
                        <a href="<?= base_url() ?>admin/dashboard/data-panti/detail/<?= $p['id_panti']?>" class="btn btn-primary btn-sm btn-block">
                        <i class="fas fa-folder"></i>
                                Detail</a>
                        <a href="<?= base_url() ?>admin/dashboard/data-panti/hapus/<?= $p['id_panti']?>" onclick="return confirm('Anda yakin mau menghapus?')" class="btn btn-danger btn-sm btn-block">
                        <i class="fas fa-trash"></i>
                        Hapus</a>
                    </td>                                
                    </tr>     
                    <?php endforeach ?>                          
                    </tbody>
                    <tfoot>
                    <tr>
                    <th>No</th>
                    <th>Logo</th>
                    <th>Nama Panti Asuhan</th>                                  
                    <th>Email</th>
                    <th>Status</th>
                    <th>Kota</th>
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

