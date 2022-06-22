<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Detail Donasi</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item"><a href="#">Donasi Saya</a></li>
              <li class="breadcrumb-item active">#<?= $donasi['kode_donasi']?></li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
          <?php if($donasi['status'] == 0): ?>         
            <div class="alert alert-warning alert-dismissible">
              <h5><i class="icon fas fa-exclamation-triangle"></i> Alert!</h5>              
              Status donasi anda masih proses. Jika belum melakukan transfer, silahkan lakukan transfer sebesar <b><span> Rp. <?= number_format( $donasi['jumlah_transfer'] ,2,",",".");?> </span></b> ke nomor rekening <b> 0000000000000000 a/n SIYATIM</b> lalu kirim bukti transfer ke <b>WhatsApp 0812424234324</b>
            </div>   
          <?php endif ?>

            <!-- Main content -->
            <div class="invoice p-3 mb-3">
              <!-- title row -->
              <div class="row">
                <div class="col-12">
                  <h4>
                    <i class="fas fa-globe"></i> Informasi Donasi dan Transfer
                    <small class="float-right">Tanggal Donasi: <?= $donasi['tgl_donasi'] ?></small>
                  </h4>
                </div>
                <!-- /.col -->
              </div>
              <!-- info row -->
              <div class="row invoice-info">
                <div class="col-sm-4 invoice-col">
                  Dari
                  <address>
                    <strong> <?= $donasi['nama'] ?></strong><br>
                    Nomor WA: (804) 123-5432 (untuk konfirmasi)<br>
                    Email: <?= $this->session->userdata('email') ?>
                  </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                  Untuk
                  <address>
                    <strong><a target=_blank href="<?= base_url('panti-asuhan')?>/<?= $donasi['id_panti'] ?>"><?= $donasi['nama_panti'] ?></a></strong><br>                    
                    Telepon: <?= $donasi['telepon_panti'] ?><br>
                    Kota: <?= $donasi['NAMAKOTA'] ?>
                  </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                  <b>Kode Donasi<br>             </b>    
                  <h1>#<?= $donasi['kode_donasi']; ?></h1>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->        

              <div class="row">
                           
                <!-- /.col -->
                <div class="col-6">
                  <p class="lead">Keterangan Penerimaan</p>

                  <div class="table-responsive">
                    <table class="table">
                      <tr>
                        <th style="width:50%">Donasi:</th>
                        <td><p class="float-right d-inline">Rp. <?= number_format($donasi['jumlah_transfer'],2,",",".");  ?></p></td>
                      </tr>
                      <tr>
                        <th>Untuk SIYATIM (3%)</th>
                        <td class="text-danger"><p class="float-right d-inline">Rp. <?= number_format($donasi['untuk_platform'],2,",",".");  ?></p></td>
                      </tr>
                      <tr>
                        <th>Total untuk Panti:</th>
                        <td class="text-success"><b><p class="float-right d-inline">Rp. <?=  number_format($donasi['pendapatan_panti'],2,",",".");?></b></p></td>
                      </tr>                   
                    </table>
                  </div>
                </div>

                <div class="col-6">
                <p class="lead">Status Donasi</p>

                  <?php if($donasi['status'] == 1): ?>
                    <div class="row justify-content-md-center">
                      <div class="col-md-auto">
                        <span class="badge bg-success"><h1>Valid</h1></span>
                        </div>                      
                    </div>
                  <?php elseif($donasi['status'] == 0): ?>
                    
                    <div class="row justify-content-md-center">
                      <div class="col-md-auto">
                        <span class="badge bg-warning"><h1>Pending</h1></span>
                      </div>                      
                    </div>
                    <p class="mt-3">Silahkan lakukan pengiriman bukti transfer ke nomor WhatsApp tertera.</p>
                  <?php endif; ?>

                  
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- this row will not appear when printing -->
              <div class="row no-print">
                <div class="col-12">
                  <a href="<?= base_url('donatur/dashboard/donasi/print/')?><?= $donasi['id_donasi']?>" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print</a>                                 
                  <!-- <button type="button" class="btn btn-primary float-right" style="margin-right: 5px;">
                    <i class="fas fa-download"></i> Generate PDF
                  </button> -->
                  <a href="<?= base_url('donatur/dashboard')?>" type="button" class="btn btn-secondary float-right" style="margin-right: 5px;">
                    <i class="fas fa-arrow-left"></i> Kembali
                  </a>
                </div>
              </div>
            </div>
            <!-- /.invoice -->
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>