<div class="col-md-12">
  <div class="card card-outline card-primary">
    <div class="card-header">
      <h3 class="card-title"><i class="fas fa-newspaper"></i> <?= $subjudul ?></h3>


      <!-- /.card-tools -->
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table class="table table-bordered table-striped">
        <thead>
          <tr class="text-center bg-primary">
            <th width="50px">NO</th>
            <th>Kode Jurusan</th>
            <th>Jurusan</th>
            <th width="150px">Mata Pelajaran</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>

          <?php
            $db = \Config\Database::connect();
            $no = 1;
            foreach ($jurusan as $key => $value) {
              $jml = $db->table('tbl_mapel')->where('id_jurusan', $value['id_jurusan'])->countAllResults();
          ?>

            <tr>
              <td class="text-center"><?= $no++; ?></td>
              <td class="text-center"><?= $value['kode_jurusan'] ?></td>
              <td><?= $value['jurusan'] ?></td>
              <td class="text-center">
                <p class="badge badge-info bg-green right"><?= $jml ?></p>
              </td>
              <td class="text-center">
                <div class="btn-group">
                  <a href="<?php echo base_url('Mapel/Detail/' . $value['id_jurusan']) ?>" class="btn btn-warning btn-sm btn-flat"><i class=" fas fa-list"></i> Mata Pelajaran</a>
                </div>
              </td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.col -->