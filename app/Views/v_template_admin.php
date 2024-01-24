<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Akademik Gatra | <?= $judul ?></title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="<?php echo base_url('public/AdminLTE') ?>/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url('public/AdminLTE') ?>/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?php echo base_url('public/AdminLTE') ?>/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="<?php echo base_url('public/AdminLTE') ?>/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <link rel="stylesheet" href="<?php echo base_url('public/AdminLTE') ?>/dist/css/adminlte.min.css">
  <!-- summernote -->
  <link rel="stylesheet" href="<?php echo base_url('public/AdminLTE') ?>/plugins/summernote/summernote-bs4.min.css">

  <!-- REQUIRED SCRIPTS -->

  <!-- jQuery -->
  <script src="<?php echo base_url('public/AdminLTE') ?>/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="<?php echo base_url('public/AdminLTE') ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- DataTables  & Plugins -->
  <script src="<?php echo base_url('public/AdminLTE') ?>/plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="<?php echo base_url('public/AdminLTE') ?>/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="<?php echo base_url('public/AdminLTE') ?>/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
  <script src="<?php echo base_url('public/AdminLTE') ?>/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
  <script src="<?php echo base_url('public/AdminLTE') ?>/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
  <script src="<?php echo base_url('public/AdminLTE') ?>/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
  <script src="<?php echo base_url('public/AdminLTE') ?>/plugins/jszip/jszip.min.js"></script>
  <script src="<?php echo base_url('public/AdminLTE') ?>/plugins/pdfmake/pdfmake.min.js"></script>
  <script src="<?php echo base_url('public/AdminLTE') ?>/plugins/pdfmake/vfs_fonts.js"></script>
  <script src="<?php echo base_url('public/AdminLTE') ?>/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
  <script src="<?php echo base_url('public/AdminLTE') ?>/plugins/datatables-buttons/js/buttons.print.min.js"></script>
  <script src="<?php echo base_url('public/AdminLTE') ?>/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
  <!-- AdminLTE App -->
  <script src="<?php echo base_url('public/AdminLTE') ?>/dist/js/adminlte.min.js"></script>
  <!-- Summernote -->
  <script src="<?php echo base_url('public/AdminLTE') ?>/plugins/summernote/summernote-bs4.min.js"></script>

</head>

<body class="hold-transition sidebar-mini">
  <div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <!-- Right navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" data-widget="fullscreen" href="#" role="button">
            <i class="fas fa-expand-arrows-alt"></i>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url('Auth/Logout') ?>">
            <i class="fas fa-sign-out-alt"></i>Logout
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="#" class="brand-link">
        <img src="" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Akademik Gatra</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex align-items-center justify-content-center">
          <div class="image">
            <?php if (session()->get('level') == 1) { ?>
              <img src="<?= session()->get('foto') ? base_url('public/foto/' .  session()->get('foto')) : 'https://www.shutterstock.com/image-vector/vector-flat-illustration-grayscale-avatar-600nw-2281862025.jpg' ?>" class="img-circle elevation" alt="Image" style="object-fit:cover; width:50px; height:50px;" />
            <?php } elseif (session()->get('level') == 2) { ?>
              <img src="<?= session()->get('foto') ? base_url('public/fotoguru/' .  session()->get('foto')) : 'https://www.shutterstock.com/image-vector/vector-flat-illustration-grayscale-avatar-600nw-2281862025.jpg' ?>" class="img-circle elevation" alt="Image" style="object-fit:cover; width:50px; height:50px;" />
            <?php } elseif (session()->get('level') == 3) { ?>
              <img src="<?= session()->get('foto') ? base_url('public/fotosiswa/' .  session()->get('foto')) : 'https://www.shutterstock.com/image-vector/vector-flat-illustration-grayscale-avatar-600nw-2281862025.jpg' ?>" class="img-circle elevation" alt="Image" style="object-fit:cover; width:50px; height:50px;" />
            <?php } ?>
          </div>
          <div class="info">
            <a href="#" class="text text-color-light">
              <b>
                <?= session()->get('nama_user') ?>
                <br>- <?= in_array(session()->get('level'), ['2', '3']) ? session()->get('username') : "Admin" ?> -<br>
              </b>
            </a>
          </div>
        </div>


        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <?php if (session()->get('level') == 1) { ?>
              <!--Menu-Menu Halaman Admin -->
              <li class="nav-item">
                <a href="<?php echo base_url("DashboardAdmin") ?>" class="nav-link <?= $menu == 'dashboard' ? 'active' : '' ?>">
                  <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p>Dashboard</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="<?php echo base_url('NilaiSiswa') ?>" class="nav-link <?= $menu == 'penilaian' ? 'active' : '' ?>">
                  <i class="nav-icon fas fa-users"></i>
                  <p>Penilaian</p>
                </a>
              </li>

              <li class="nav-item <?= $menu == 'master-data' ? 'menu-open' : '' ?>">
                <a href="" class="nav-link <?= $menu == 'master-data' ? 'active' : '' ?>">
                  <i class="nav-icon fas fa-table"></i>
                  <p> Master Data<i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="<?php echo base_url('Ta') ?>" class="nav-link <?= $submenu == 'ta' ? 'active' : '' ?>">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Tahun Ajaran</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="<?php echo base_url('Jurusan') ?>" class="nav-link <?= $submenu == 'jurusan' ? 'active' : '' ?>">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Jurusan</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="<?php echo base_url('Kelas') ?>" class="nav-link <?= $submenu == 'kelas' ? 'active' : '' ?>">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Kelas</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="<?php echo base_url('Mapel') ?>" class="nav-link <?= $submenu == 'mapel' ? 'active' : '' ?>">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Mata Pelajaran</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="<?php echo base_url('Guru') ?>" class="nav-link <?= $submenu == 'guru' ? 'active' : '' ?>">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Guru</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="<?php echo base_url('Siswa') ?>" class="nav-link <?= $submenu == 'siswa' ? 'active' : '' ?>">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Siswa</p>
                    </a>
                  </li>
                </ul>
              </li>

              <li class="nav-item <?= $menu == 'setting' ? 'menu-open' : '' ?>">
                <a href="" class="nav-link <?= $menu == 'setting' ? 'active' : '' ?>">
                  <i class="nav-icon fas fa-cog"></i>
                  <p>
                    Setting
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="<?php echo base_url('User') ?>" class="nav-link <?= $submenu == 'user' ? 'active' : '' ?>">
                      <i class="far fa-circle nav-icon"></i>
                      <p>User</p>
                    </a>
                  </li>
                </ul>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="<?php echo base_url('Ta/Setting') ?>" class="nav-link <?= $submenu == 'ta' ? 'active' : '' ?>">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Tahun Ajaran</p>
                    </a>
                  </li>
                </ul>
              </li>

              <li class="nav-item">
                <a href="<?php echo base_url('Rombel') ?>" class="nav-link <?= $menu == 'rombel' ? 'active' : '' ?>">
                  <i class="nav-icon fas fa-users"></i>
                  <p>Rombel</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url('JadwalPelajaran') ?>" class="nav-link <?= $menu == 'jadwalpelajaran' ? 'active' : '' ?>">
                  <i class="nav-icon fas fa-users"></i>
                  <p>Jadwal Pelajaran</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="<?php echo base_url('RaporSiswa') ?>" class="nav-link <?= $menu == 'rapor' ? 'active' : '' ?>">
                  <i class="nav-icon fas fa-book"></i>
                  <p>Rapor Siswa</p>
                </a>
              </li>

              <!--End Menu Halaman Admin -->

            <?php } elseif (session()->get('level') == 2) { ?>
              <!--Menu-Menu Halaman Guru -->
              <li class="nav-item">
                <a href="<?php echo base_url("DashboardGuru") ?>" class="nav-link <?= $menu == 'dashboard' ? 'active' : '' ?>">
                  <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p>Dashboard</p>
                </a>
              </li>

              <?php if (isWali()) : ?>
                <li class="nav-item">
                  <a href="<?= urlPrintRaporWali() ?>" class="nav-link <?= $menu == 'rapor' ? 'active' : '' ?>" target="_blank">
                    <i class="nav-icon fas fa-book"></i>
                    <p>Cetak Rapor Siswa</p>
                  </a>
                </li>
              <?php endif ?>

              <li class="nav-item <?= $menu == 'akademik' ? 'menu-open' : '' ?>">
                <a href="" class="nav-link <?= $menu == 'akademik' ? 'active' : '' ?>">
                  <i class="nav-icon fas fa-table"></i>
                  <p>Akademik<i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="<?php echo base_url('DashboardGuru/JadwalMengajar') ?>" class="nav-link <?= $submenu == 'jadwalmengajar' ? 'active' : '' ?>">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Jadwal Mengajar</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="<?php echo base_url('DashboardGuru/NilaiSiswa') ?>" class="nav-link <?= $submenu == 'nilaisiswa' ? 'active' : '' ?>">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Nilai Siswa</p>
                    </a>
                  </li>
                </ul>
              </li>

            <?php } elseif (session()->get('level') == 3) { ?>
              <!--Menu-Menu Halaman Siswa -->
              <li class="nav-item">
                <a href="<?php echo base_url("DashboardSiswa") ?>" class="nav-link <?= $menu == 'dashboard' ? 'active' : '' ?>">
                  <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p>Dashboard</p>
                </a>
              </li>

              <li class="nav-item <?= $menu == 'akademik' ? 'menu-open' : '' ?>">
                <a href="" class="nav-link <?= $menu == 'akademik' ? 'active' : '' ?>">
                  <i class="nav-icon fas fa-table"></i>
                  <p>Akademik<i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="<?php echo base_url('DashboardSiswa/Jadwal') ?>" class="nav-link <?= $submenu == 'jadwal' ? 'active' : '' ?>">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Jadwal Pelajaran</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="<?php echo base_url('DashboardSiswa/Nilai') ?>" class="nav-link <?= $submenu == 'nilai' ? 'active' : '' ?>">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Nilai</p>
                    </a>
                  </li>
                </ul>
              </li>

            <?php } ?>
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0"><?= $subjudul ?></h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#"><?= $judul ?></a></li>
                <li class="breadcrumb-item active"><?= $subjudul ?></li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <div class="content">
        <div class="container-fluid">
          <div class="row">

            <?php if ($page) {
              echo view($page);
            } ?>
            <!-- /.col-md-6 -->
          </div>
          <!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->


    <!-- Main Footer -->
    <footer class="main-footer">
      <!-- To the right -->
      <div class="float-right d-none d-sm-inline">
        Anything you want
      </div>
      <!-- Default to the left -->
      <strong>Copyright &copy; Ayu Varisma Putri</strong> All rights reserved.
    </footer>
  </div>
  <!-- ./wrapper -->


</body>

</html>