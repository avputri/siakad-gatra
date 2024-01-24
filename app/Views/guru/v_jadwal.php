<div class="col-md-12">
  <div class="card card-outline card-success">
    <div class="card-header">
      <h3 class="card-title"><i class="fas fa-newspaper"></i> <?= $subjudul ?></h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">

    <table class="table table-bordered table-striped">
        <thead>
          <tr class="text-center bg-primary">
            <th width="50px">NO</th>
            <th>Kodel Mapel</th>
            <th>Mata Pelajaran</th>
            <th>Rombel</th>
            <th>Hari, Waktu</th>
          </tr>

          <?php $no = 1; 
          foreach ($jadwal as $key => $value) { ?>
          <tr>
            <td class="text-center"><?= $no++?></td>
            <td><?= $value['kode_mapel']?></td>
            <td><?= $value['mapel']?></td>
            <td><?= $value['nama_rombel']?></td>
            <td><?= $value['hari']?>, <?= $value['jam_ke']?></td>
          </tr>
          <?php }?>

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
