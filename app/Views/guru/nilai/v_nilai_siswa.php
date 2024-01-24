<div class="col-md-12">
  <div class="card card-outline card-success">
    <div class="card-header">
      <h3 class="card-title"><i class="fas fa-newspaper"></i> <?= $subjudul ?> </h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <b>Tahun Akademik : </b> <?= $ta_aktif['ta1'] ?>/<?= $ta_aktif['ta2'] ?> - <?= $ta_aktif['semester'] ?>
      <table class="table table-bordered table-striped">
        <thead>
          <tr class="text-center bg-primary">
            <th width="50px">NO</th>
            <th>Kode Mapel</th>
            <th>Mata Pelajaran</th>
            <th>Rombel</th>
            <th width="150px">Nilai</th>
          </tr>

          <?php $no = 1;
          foreach ($nilai as $key => $value) { ?>
            <tr>
              <td class="text-center"><?= $no++ ?></td>
              <td><?= $value['kode_mapel'] ?></td>
              <td><?= $value['mapel'] ?></td>
              <td><?= $value['nama_rombel'] ?></td>
              <td class="text-center">
                <a href="<?php echo base_url('DashboardGuru/DataNilai/' . $value['id_jadwal']) ?>" class="btn btn-flat btn-primary btn-sm"><i class="fa fa-calendar"></i> Input Nilai</a>
              </td>
            </tr>
          <?php } ?>

        </thead>
        <tbody>
        </tbody>
      </table>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.col -->