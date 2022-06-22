
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?= base_url() ?>" class="brand-link">
      <img src="<?= base_url(); ?>assets/img/android-chrome-512x512.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">SIYATIM</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?= base_url(); ?>assets/img/panti/logo/<?= $panti['logo_panti']?>"" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?= $this->session->userdata('nama'); ?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
         
          <li class="nav-item">
            <a href="<?= base_url()?>panti/dashboard/" class="nav-link <?php if($this->uri->segment(3)=="" || $this->uri->segment(3)=="donasi") {echo "active";} ?>">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Dashboard Utama
                <!-- <span class="right badge badge-danger">New</span> -->
              </p>
            </a>
          </li>
          
   
          <li class="nav-header"></li>
          <li class="nav-item">
            <a href="<?= base_url()?>panti/dashboard/logout" class="nav-link">
              <i class="nav-icon fas fa-sign-out-alt"></i>
              <p>Keluar</p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
