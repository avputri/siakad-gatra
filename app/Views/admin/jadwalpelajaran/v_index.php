<div class="col-md-12">
  <div class="card card-outline card-primary">
    <div class="card-header">
      <h3 class="card-title"><i class="fas fa-newspaper"></i> <?= $subjudul ?></h3>


      <!-- /.card-tools -->
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <b>Tahun Akademik : </b> <?= $ta_aktif['ta1'] ?>/<?= $ta_aktif['ta2'] ?> - <?= $ta_aktif['semester'] ?>
      <table class="table table-bordered table-striped">
        <thead>
          <tr class="text-center bg-primary">
            <th width="50px">NO</th>
            <th>Kode Jurusan</th>
            <th>Jurusan</th>
            <th>Jadwal</th>
          </tr>

          <?php $no = 1;
          foreach ($jurusan as $key => $value) { ?>
            <tr>
              <td><?= $no++ ?></td>
              <td><?= $value['kode_jurusan'] ?></td>
              <td><?= $value['jurusan'] ?></td>
              <td class="text-center">
                <a href="<?php echo base_url('JadwalPelajaran/detailjadwal/' . $value['id_jurusan']) ?>" class="btn btn-success btn-flat btn-sm">
                  <i class="fa fa-calendar"></i> Jadwal</a>
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