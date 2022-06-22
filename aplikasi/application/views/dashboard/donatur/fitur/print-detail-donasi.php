<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?= $title ?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Bootstrap 4 -->

  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url(); ?>assets/template/adminLTE3/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url(); ?>assets/template/adminLTE3/dist/css/adminlte.min.css">

  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <link rel="icon" 
      type="image/png" 
      href="<?= base_url(); ?>assets/img/favicon.ico">
</head>
<body>
<div class="wrapper">
  <!-- Main content -->
  <section class="invoice">
  <div class="row">
          <div class="col-12">
            <div class="callout callout-info">
              <h5><i class="fas fa-info"></i> Catatan:</h5>
              Silahkan lakukan transfer sebesar Rp.<span class="text-success"> <?= number_format( $donasi['jumlah_transfer'] ,2,",",".");?> </span> ke nomor rekening 0000000000000000 a/n SIYATIM lalu kirim bukti transfer ke WhatsApp 0812424234324
            </div>            

            <!-- Main content -->
            <div class="invoice p-3 mb-3">
              <!-- title row -->
              <div class="row">
                <div class="col-12">
                  <h4>
                    <i class="fas fa-globe"></i> Informasi Donasi dan Transfer
                    <small class="float-right">Tanggal: <?= $donasi['tgl_donasi'] ?></small>
                  </h4>
                </div>
                <!-- /.col -->
              </div>
              <!-- info row -->
              <div class="row invoice-info">
                <div class="col-sm-4 invoice-col">
                  Dari
                  <address>
                    <strong> <?= $this->session->userdata('nama') ?></strong><br>
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

                    <span class="badge bg-success"><h1>Valid</h1></span>
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

          </div><!-- /.col -->
        </div><!-- /.row -->
  </section>
  <!-- /.content -->
</div>
<!-- ./wrapper -->

<script type="text/javascript"> 
  window.addEventListener("load", window.print());
</script>
</body>
</html>
