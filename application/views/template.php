<?php //echo $this->session->userdata['level']; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Toko Code404 | <?=$header?></title>

  <!-- Custom fonts for this template-->
  <link href="<?=base_url()?>asset/sb_admin2/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="<?=base_url()?>asset/sb_admin2/css/sb-admin-2.min.css" rel="stylesheet">

  <!-- Private styles untuk web ini-->
  <link href="<?=base_url()?>asset/private_style/private_style.css" rel="stylesheet">
	
	<!-- Custom styles for this page -->
  <link href="<?=base_url()?>asset/sb_admin2/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

  <!-- Sweetalert 2 style -->
  <link href="<?=base_url()?>asset/sweetalert/dist/sweetalert2.min.css" rel="stylesheet">
</head>

<body id="page-top" class="<?=$this->uri->segment(1) == 'sale' ? 'sidebar-toggled' : null ?>">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion <?=$this->uri->segment(1) == 'sale' ? 'toggled' : null ?>" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?=site_url()?>">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Toko Code <sup>404</sup></div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item <?=$this->uri->segment(1) == '' || $this->uri->segment(1) == 'dashboard' ? 'active' : null ?>">
        <a class="nav-link" href="<?=site_url()?>">
          <i class="fas fa-fw fa-home"></i>
          <span>Home</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item <?=$this->uri->segment(1) == 'customer' || $this->uri->segment(1) == 'user' || $this->uri->segment(1) == 'supplier' ? 'active' : null ?>">
        <a class="nav-link" href="#" data-toggle="collapse" data-target="#data_master" aria-expanded="true" aria-controls="data_master">
          <i class="fas fa-fw fa-folder"></i>
          <span>Data Master</span>
        </a>
        <div id="data_master" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item <?=$this->uri->segment(1) == 'customer' ? 'active' : null ?>" href="<?=site_url('customer')?>">Customer</a>

            <?php if($this->fungsi->user_login()->user_level == "Admin") { ?>
            <a class="collapse-item <?=$this->uri->segment(1) == 'user' ? 'active' : null ?>" href="<?=site_url('user')?>">User</a>
            <?php } ?>

            <a class="collapse-item <?=$this->uri->segment(1) == 'supplier' ? 'active' : null ?>" href="<?=site_url('supplier')?>">Supplier</a>
        	</div>
        </div>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item <?=$this->uri->segment(1)=='category' || $this->uri->segment(1)=='unit' || $this->uri->segment(1)=='item' ? 'active' : null ?>">
        <a class="nav-link" href="#" data-toggle="collapse" data-target="#data_produk" aria-expanded="true" aria-controls="data_produk">
          <i class="fas fa-fw fa-box"></i>
          <span>Produk</span>
        </a>
        <div id="data_produk" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item <?=$this->uri->segment(1) == 'category' ? 'active' : null ?>" href="<?=site_url('category')?>">Category</a>
            <a class="collapse-item <?=$this->uri->segment(1) == 'unit' ? 'active' : null ?>" href="<?=site_url('unit')?>">Unit</a>
            <a class="collapse-item <?=$this->uri->segment(1) == 'item' ? 'active' : null ?>" href="<?=site_url('item')?>">Item</a>
          </div>
        </div>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item <?=$this->uri->segment(1)=='sale' || $this->uri->segment(1)=='stock' ? 'active' : null ?>">
        <a class="nav-link" href="#" data-toggle="collapse" data-target="#penjualan_collapse" aria-expanded="true" aria-controls="penjualan_collapse">
          <i class="fas fa-fw fa-money-bill-wave"></i>
          <span>Transaksi</span>
        </a>
        <div id="penjualan_collapse" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item <?=$this->uri->segment(1)=='sale' ? 'active' : null ?>" href="<?=site_url('sale')?>">
            	Penjualan
            </a>
            <a class="collapse-item <?=$this->uri->segment(1)=='stock' && $this->uri->segment(2)=='in' ? 'active' : null ?>" href="<?=site_url('stock/in')?>">
            	Stock In
            </a>
            <a class="collapse-item <?=$this->uri->segment(1)=='stock' && $this->uri->segment(2)=='out' ? 'active' : null ?>" href="<?=site_url('stock/out')?>">
            	Stock Out
            </a>
        	</div>
        </div>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Alerts -->
            <li class="nav-item dropdown no-arrow mx-1">
              <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-bell fa-fw"></i>
                <!-- Counter - Alerts -->
                <span class="badge badge-danger badge-counter">3+</span>
              </a>
              <!-- Dropdown - Alerts -->
              <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                <h6 class="dropdown-header">
                  Alerts Center
                </h6>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="mr-3">
                    <div class="icon-circle bg-primary">
                      <i class="fas fa-file-alt text-white"></i>
                    </div>
                  </div>
                  <div>
                    <div class="small text-gray-500">December 12, 2019</div>
                    <span class="font-weight-bold">A new monthly report is ready to download!</span>
                  </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="mr-3">
                    <div class="icon-circle bg-success">
                      <i class="fas fa-donate text-white"></i>
                    </div>
                  </div>
                  <div>
                    <div class="small text-gray-500">December 7, 2019</div>
                    $290.29 has been deposited into your account!
                  </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="mr-3">
                    <div class="icon-circle bg-warning">
                      <i class="fas fa-exclamation-triangle text-white"></i>
                    </div>
                  </div>
                  <div>
                    <div class="small text-gray-500">December 2, 2019</div>
                    Spending Alert: We've noticed unusually high spending for your account.
                  </div>
                </a>
                <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
              </div>
            </li>

            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                	<?=ucfirst($this->fungsi->user_login()->username)?>
                </span>
                <!-- <img class="img-profile rounded-circle" src="https://source.unsplash.com/QAB-WJcbgJk/60x60"> -->
                <i class="fas fa-user text-gray-400"></i>
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </a>
                <a class="dropdown-item" href="#">
                  <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                  Settings
                </a>
                <a class="dropdown-item" href="#">
                  <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                  Activity Log
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Load Jquery -->
				<script src="<?=base_url()?>asset/sb_admin2/vendor/jquery/jquery.min.js"></script>
				<!-- Load sweetalert 2 -->
				<script src="<?=base_url()?>asset/sweetalert/dist/sweetalert2.all.min.js"></script>

        <!-- Begin Page Content -->
        <div class="container-fluid">
          <!-- Konten dinamis page -->
          <?php echo $contents ?>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2020</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a href="<?=site_url('auth/logout')?>">
            <button class="btn btn-danger" id="tmb_log_out">Logout</button>
          </a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="<?=base_url()?>asset/sb_admin2/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?=base_url()?>asset/sb_admin2/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?=base_url()?>asset/sb_admin2/js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="<?=base_url()?>asset/sb_admin2/vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="<?=base_url()?>asset/sb_admin2/vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="<?=base_url()?>asset/sb_admin2/js/demo/datatables-demo.js"></script>
</body>

</html>
