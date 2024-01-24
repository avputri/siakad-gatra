<div class="col-md-12">
  <div class="card card-outline card-primary">
    <div class="card-header">
      <h3 class="card-title"><i class="fas fa-newspaper"></i> <?= $subjudul ?></h3>

      <div class="card-tools">
        <a href="<?php echo base_url('Siswa/Input') ?>" class="btn btn-primary btn-flat btn-sm">
          <i class="fa fa-table"></i> Tambah
        </a>
      </div>
      <!-- /.card-tools -->
    </div>
    <!-- /.card-header -->

    <?php
    if (session()->get('insert')) {
      echo '<div class=" alert alert-success">';
      echo session()->get('insert');
      echo '</div>';
    }
    if (session()->get('update')) {
      echo '<div class=" alert alert-primary">';
      echo session()->get('update');
      echo '</div>';
    }
    if (session()->get('delete')) {
      echo '<div class=" alert alert-danger">';
      echo session()->get('delete');
      echo '</div>';
    }
    ?>

    <div class="card-body">

      <table id="example1" class="table table-bordered table-striped">
        <thead>
          <tr class="text-center bg-primary">
            <th width="50px">NO</th>
            <th width="100">NIS</th>
            <th>Nama Siswa</th>
            <th>Kelas - Jurusan</th>
            <th>Angkatan</th>
            <th>Password</th>
            <th>Foto</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php $no = 1;
          foreach ($siswa as $key => $value) { ?>
            <tr>
              <td class="text-center"><?= $no++; ?></td>
              <td class="text-center">
                <?= $value['NIS'] ?> <br>
                <?php if ($value['status'] == '1') {
                  echo '<span class="badge badge-success">Aktif</span>';
                } elseif ($value['status'] == '2') {
                  echo '<span class="badge badge-primary">Alumni</span>';
                } elseif ($value['status'] == '3') {
                  echo '<span class="badge badge-warning">Pindah</span>';
                } elseif ($value['status'] == '4') {
                  echo '<span class="badge badge-danger">Drop Out</span>';
                } ?>

              </td>
              <td><?= $value['nama_siswa'] ?></td>
              <td><?= $value['kelas'] ?> - <?= $value['jurusan'] ?></td>
              <td class="text-center"> <?= $value['tahun_angkatan'] ?></td>
              <td><?= $value['password'] ?></td>
              <td class="text-center"><img class="img-circle" src="<?php echo base_url('public/fotosiswa/' . $value['foto_siswa']) ?>" style="object-fit: cover; object-position: center; width:60px; height:60px;"></td>
              <td class="text-center">
                <div class="btn-group">
                  <a href="<?php echo base_url('Siswa/Edit/' . $value['id_siswa']) ?>" class="btn btn-warning btn-sm"><i class=" fas fa-pencil-alt"></i></a>
                  <a href="<?php echo base_url('Siswa/DeleteData/' . $value['id_siswa']) ?>" onclick="return confirm('Yakin Hapus Data ..?')" class="btn btn-danger btn-sm"><i class=" fas fa-trash"></i></a>
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

<script>
  $(function() {
    $("#example1").DataTable({
      "paging": true,
      "searching": true,
      "responsive": true,
      "lengthChange": true,
      "autoWidth": false,
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
  });
</script>