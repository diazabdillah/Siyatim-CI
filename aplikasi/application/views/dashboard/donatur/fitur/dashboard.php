
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Donasi Saya</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Donasi Saya</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
        <div class="card">
            <div class="card-header">
              <h3 class="card-title">Data Donasi Saya</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive">
              <table id="example1" class="text-center table table-bordered table-striped">
                <thead>
                <tr>         

                  <th>No.</th>
                  <th>ID Donasi</th>
                  <th>Donatur</th>                                  
                  <th>Panti Asuhan</th>
                  <th>Donasi</th>
                  <th>Tanggal Donasi</th>
                  <th>Status Bukti</th>  
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                  <?php
                  $i=1;
                  // var_dump($donasi[0]);die;
                  foreach($donasi as $d): ?>
                <tr>    
                  <td><?= $i++ ?></td>  
                  <td><a href="#"><span class="badge bg-primary"><h6><b>#<?= $d['kode_donasi'] ?></b></h6></a></span></td>  
                  <td><?= $d['nama'] ?></td>                                              
                  <td><a target="_blank" href="<?=base_url('/panti-asuhan/')?><?=$d['id_panti']?>"><?= $d['nama_panti'] ?></a></td>
                  <td>Rp. <?= number_format($d['jumlah_transfer'],2,",",".");  ?></td>
                  <td><?= date("d M Y", strtotime($d['tgl_donasi'])) ?></td>
                  <td>
                    <?php if( $d['status'] == 0 ): ?>
                      <span class="badge bg-warning">Proses</span>
                    <?php elseif($d['status'] == 1): ?>
                      <span class="badge bg-success">Valid</span>
                    <?php endif ?>
                    
                  </td>  
                  <td>
                    
                      <a href="<?= base_url() ?>donatur/dashboard/donasi/<?= $d['id_donasi']?>" class="btn btn-info btn-sm btn-block">
                        <i class="fas fa-info"></i>
                                Detail</a>                                                   
                    
                  </td>                   
                </tr>     
                <?php endforeach ?>                          
                </tbody>
                <tfoot>
                <tr>
                  <th>No.</th>
                  <th>ID Donasi</th>
                  <th>Donatur</th>                                  
                  <th>Panti Asuhan</th>
                  <th>Donasi</th>
                  <th>Tanggal Donasi</th>
                  <th>Status Bukti</th>                  
                  <th>Aksi</th>
                </tr>
                </tfoot>
              </table>
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

