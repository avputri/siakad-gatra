<div class="col-md-12">
  <div class="card card-outline card-primary">
    <div class="card-header">
      <h3 class="card-title"><i class="fas fa-newspaper"></i> <?= $subjudul ?></h3>

      <div class="card-tools">
        <a href="<?php echo base_url('Guru/Input') ?>" class="btn btn-primary btn-flat btn-sm">
          <i class="fa fa-plus"></i> Tambah
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
            <th width="100">Kode Guru</th>
            <th>NIP</th>
            <th>Nama Guru</th>
            <th>Password</th>
            <th>Foto</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php $no = 1;
          foreach ($guru as $key => $value) { ?>
            <tr>
              <td class="text-center"><?= $no++; ?></td>
              <td class="text-center"><?= $value['kode_guru'] ?></td>
              <td class="text-center"><?= $value['nip'] ?></td>
              <td><?= $value['nama_guru'] ?></td>
              <td><?= $value['password'] ?></td>
              <td class="text-center"><img class="img-circle" src="<?= $value['foto_guru'] == '' ? 'https://www.shutterstock.com/image-vector/vector-flat-illustration-grayscale-avatar-600nw-2281862025.jpg' : base_url('public/fotoguru/' . $value['foto_guru']) ?>" style="object-fit:cover; width:70px; height:70px;"></td>
              <td class="text-center">
                <div class="btn-group">
                  <a href="<?php echo base_url('Guru/Edit/' . $value['id_guru']) ?>" class="btn btn-warning btn-sm"><i class=" fas fa-pencil-alt"></i></a>
                  <a href="<?php echo base_url('Guru/DeleteData/' . $value['id_guru']) ?>" onclick="return confirm('Yakin Hapus Data ..?')" class="btn btn-danger btn-sm"><i class=" fas fa-trash"></i></a>
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