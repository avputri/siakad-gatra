<div class="container-fluid">
  <!-- Small boxes (Stat box) -->
  <div class="row">
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-info">
        <div class="inner">
          <h3><?= $jml_rombel ?></h3>

          <p>Rombongan Belajar</p>
        </div>
        <div class="icon">
          <i class="fas fa-school"></i>
        </div>
        <a href="<?php echo base_url('Rombel') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-success">
        <div class="inner">
          <h3><?= $jml_jurusan ?></h3>

          <p>Jurusan</p>
        </div>
        <div class="icon">
          <i class="fas fa-book-reader"></i>
        </div>
        <a href="<?php echo base_url('Jurusan') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-warning">
        <div class="inner">
          <h3><?= $jml_guru ?></h3>

          <p>Guru</p>
        </div>
        <div class="icon">
          <i class="fas fa-users"></i>
        </div>
        <a href="<?php echo base_url('Guru') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-danger">
        <div class="inner">
          <h3><?= $jml_siswa ?></h3>

          <p>Siswa</p>
        </div>
        <div class="icon">
          <i class="fas fa-graduation-cap"></i>
        </div>
        <a href="<?php echo base_url('Siswa') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
  </div>
  <!-- /.row -->
</div>