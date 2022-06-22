
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data Donasi</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Data Donasi</li>
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
              <h3 class="card-title">Data Riwayat Donasi</h3>
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
                  <?php $i=1; foreach($donasi as $d): ?>
                <tr>      
                  <td><?= $i++ ?></td>
                  <td><a href="#"><span class="badge bg-primary"><h6><b>#<?= $d['kode_donasi'] ?></b></h6></a></span></td>  
                  <td><?= $d['nama_donatur_saat_donasi'] ?></td>                                              
                  <td><a target="_blank" href="<?=base_url('admin/dashboard/data-panti/detail/')?><?=$d['id_panti']?>"><?= $d['nama_panti'] ?></a></td>
                  <td>Rp. <?= number_format($d['jumlah_transfer'],2,",",".");  ?></td>
                  <td><?= $d['tgl_donasi'] ?></td>
                  <td>
                    <?php if( $d['status'] == 0 ): ?>
                      <span class="badge bg-warning">Pending</span>
                    <?php elseif($d['status'] == 1): ?>
                      <span class="badge bg-success">Valid</span>
                    <?php endif ?>
                    
                  </td>  
                  <td>
                    <?php if( $d['status'] == 0 ): ?>
                      <a href="<?= base_url() ?>admin/dashboard/data-donasi/validasi/<?= $d['id_donasi']?>" class="btn btn-info btn-sm btn-block">
                        <i class="float-left fas fa-heart text-danger"></i>
                                Validasi</a>                        
                    <?php elseif($d['status'] == 1): ?>
                      <a onclick="return confirm('Mempendingkan akan membuat totalan per bulan donasi yang bersangkutan berubah, apa anda yakin ingin melanjutkan? ')" href="<?= base_url() ?>admin/dashboard/data-donasi/pendingkan/<?= $d['id_donasi']?>" class="btn btn-warning btn-sm btn-block">
                        <i class="float-left fas fa-exclamation-circle"></i>
                                Pendingkan</a>            
                    <?php endif ?>                    
                    
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

