<div class="col-md-12">
  <div class="card card-outline card-primary">
    <div class="card-header">
      <h3 class="card-title"><i class="fas fa-newspaper"></i> <?= $subjudul ?>
        <b>Tahun Akademik : </b> <?= $ta_aktif['ta1'] ?>/<?= $ta_aktif['ta2'] ?> - <?= $ta_aktif['semester'] ?>
      </h3>
      <!-- /.card-tools -->
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <div class="row">
        <table class="table-striped table-responsive">
          <tr class="">
            <th rowspan="7"><img class="mr-3" src="<?php echo base_url('public/fotosiswa/' . $siswa['foto_siswa']) ?>" style="object-fit:cover; object-position:center; width:160px; height:200px;"></th>
            <th width="200px">Tahun Akademik</th>
            <th width="50px">:</th>
            <th><?= $ta_aktif['ta1'] ?>/<?= $ta_aktif['ta2'] ?> - <?= $ta_aktif['semester'] ?></th>
          </tr>
          <tr>
            <th>NIS</th>
            <th>:</th>
            <td><?= $siswa['NIS'] ?></td>
          </tr>
          <tr>
            <th>Nama Siswa</th>
            <th>:</th>
            <td><?= $siswa['nama_siswa'] ?></td>
          </tr>
          <tr>
            <th>Jurusan</th>
            <th>:</th>
            <td><?= $siswa['jurusan'] ?></td>
          </tr>
          <tr>
            <th>Rombel</th>
            <th>:</th>
            <td><?= $siswa['nama_rombel'] ?></td>
          </tr>
          <tr>
            <th>Wali Kelas</th>
            <th>:</th>
            <td><?= $siswa['nama_guru'] ?></td>
          </tr>
        </table>
      </div>
    </div>


    <div class="card-body">
      <table class="table table-bordered table-striped">
        <thead>

          <tr class="text-center bg-primary">
            <th width="50px">NO</th>
            <th>Kode Mapel</th>
            <th>Mata Pelajaran</th>
            <th>Rombel - Jurusan</th>
            <th>Guru Mapel</th>
            <th>Waktu</th>
          </tr>

          <?php $no = 1;
          foreach ($jadwal_siswa as $key => $value) { ?>
            <tr>
              <td><?= $no++ ?></td>
              <td><?= $value['kode_mapel'] ?></td>
              <td><?= $value['mapel'] ?></td>
              <td><?= $value['nama_rombel'] ?> - <?= $value['jurusan'] ?></td>
              <td><?= $value['nama_guru'] ?></td>
              <td><?= $value['hari'] ?>, <?= $value['jam_ke'] ?></td>
            </tr>
          <?php } ?>
        </thead>
        <tbody>


        </tbody>
      </table>
    </div>
  </div>
  <!-- /.card -->
</div>
<!-- /.col -->