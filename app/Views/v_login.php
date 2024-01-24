<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Akademik Gatra | <?= $judul ?></title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url('public/AdminLTE') ?>/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?php echo base_url('public/AdminLTE') ?>/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url('public/AdminLTE') ?>/dist/css/adminlte.min.css">
</head>

<body class="hold-transition login-page">
  <div class="content">
    <!-- /.login-logo -->
    <div class="card card-outline card-primary">
      <div class="login-box">

      </div>
      <div class="card-body">
        <div class="row">
          <div class="col-sm-12">
            <div class="card-header text-center">
              <img src="<?php echo base_url('public/asset/' . $web['logo_sekolah']) ?>" width="180px" height="180px">
              <h2><b>Akademik</b> Gatra</h2>
            </div>
          </div>

          <div class="col-sm-12">
            <?php
            $errors = session()->getFlashdata('errors');
            if (!empty($errors)) { ?>
              <div class="alert alert-danger" role="alert">
                <ul>
                  <?php foreach ($errors as $key => $value) { ?>
                    <li><?= esc($value) ?></li>
                  <?php } ?>
                </ul>
              </div>
            <?php } ?>

            <?php
            if (session()->getFlashdata('pesan')) {
              echo '<div class="alert alert-warning" role="alert">';
              echo session()->getFlashdata('pesan');
              echo '</div>';
              # code...
            }
            ?>

            <?php
            echo form_open('Auth/CekLogin')
            ?>

            <div class="form-group">
              <label>USERNAME</label>
              <input name="username" type="username" class="form-control" placeholder="Username">

            </div>

            <div class="form-group">
              <label>LEVEL</label>
              <select name="level" class="form-control">
                <option value="">--Level--</option>
                <option value="1">Admin</option>
                <option value="2">Guru</option>
                <option value="3">Siswa</option>
              </select>

            </div>

            <div class="form-group">
              <label>PASSWORD</label>
              <input name="password" type="password" class="form-control" placeholder="Password">

            </div>

            <!-- /.col -->
            <div class="row">
              <div class="col-12">
                <button type="submit" class="btn btn-primary btn-block btn-flat"><i class="fas fa-sign-in-alt"></i>Login</button>
              </div>
            </div>

            <!-- /.col -->
          </div>
          <?php echo form_close() ?>
          <!-- /.card-body -->
        </div>
      </div>
    </div>


    <!-- /.card -->
  </div>
  <!-- /.login-box -->

  <!-- jQuery -->
  <script src="<?php echo base_url('public/AdminLTE') ?>/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="<?php echo base_url('public/AdminLTE') ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="<?php echo base_url('public/AdminLTE') ?>/dist/js/adminlte.min.js"></script>
</body>

</html>