<div class="col-md-12">
  <div class="card card-outline card-primary">
    <div class="card-header">
      <h3 class="card-title"><i class="fas fa-newspaper"></i> <?= $subjudul ?></h3>

      <div class="card-tools">
        <button class="btn btn-primary btn-flat btn-sm" data-toggle="modal" data-target="#add">
          <i class="fa fa-plus"></i> Tambah
        </button>
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

    <div class="card-body">
      <table id="example1" class="table table-bordered table-striped">
        <thead>
          <tr class="text-center bg-primary">
            <th width="50px">NO</th>
            <th>Nama User</th>
            <th>Username</th>
            <th>Password</th>
            <th>Foto</th>
            <th width="100px">Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php $no = 1;
          foreach ($user as $key => $value) { ?>
            <tr>
              <td class="text-center"><?= $no++; ?></td>
              <td class="text-center"><?= $value['nama_user'] ?></td>
              <td><?= $value['username'] ?></td>
              <td><?= $value['password'] ?></td>
              <td class="text-center"><img class="img-circle" src="<?php echo base_url('public/foto/' . $value['foto']) ?>" style="object-fit: cover; object-position: center; width:60px; height:60px;"></td>
              <td class="text-center">
                <div class="btn-group">
                  <button class="btn btn-warning btn-flat btn-sm" data-toggle="modal" data-target="#edit<?= $value['id_user'] ?>"><i class="fas fa-pencil-alt"></i></button>
                  <a href="<?php echo base_url('User/DeleteData/' . $value['id_user']) ?>" onclick="return confirm('Yakin Hapus Data..?')" class="btn btn-danger btn-sm"><i class=" fas fa-trash"></i></a>
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



<!-- /.modal tambah data-->
<div class="modal fade" id="add">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Tambah <?= $subjudul ?></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?php echo form_open_multipart('User/InsertData') ?>
      <div class="modal-body">
        <div class="form-group">
          <label>Nama User</label>
          <input name="nama_user" class="form-control" placeholder="Nama User">
        </div>
        <div class="form-group">
          <label>Username</label>
          <input name="username" class="form-control" placeholder="Username">
        </div>
        <div class="form-group">
          <label>Password</label>
          <input name="password" class="form-control" placeholder="Password">
        </div>
        <div class="form-group">
          <label>Foto</label>
          <input name="foto" type="file" class="form-control">
        </div>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default btn-flat btn-sm" data-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-primary btn-flat btn-sm">Simpan</button>
      </div>
      <?php echo form_close() ?>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<!-- /.modal edit data -->
<?php foreach ($user as $key => $value) { ?>
  <div class="modal fade" id="edit<?= $value['id_user'] ?>">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Edit <?= $subjudul ?></h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <?php echo form_open_multipart('User/UpdateData/' . $value['id_user']) ?>
        <div class="modal-body">
          <div class="form-group">
            <label>Nama User</label>
            <input name="nama_user" value="<?= $value['nama_user'] ?>" class="form-control" placeholder="Nama User">
          </div>

          <div class="form-group">
            <label>Username</label>
            <input name="username" value="<?= $value['username'] ?>" class="form-control" placeholder="Username">
          </div>
          <div class="form-group">
            <label>Password</label>
            <input name="password" value="<?= $value['password'] ?>" class="form-control" placeholder="Password">
          </div>
          <div class="row">
            <div class="col-sm-8">
              <div class="form-group">
                <label>Ganti Foto</label>
                <input name="foto" type="file" class="form-control">
              </div>
            </div>
            <div class="col-sm-4">
              <label> Preview Foto</label>
              <div class="form-group">
                <img src="<?php echo base_url('public/foto/' . $value['foto']) ?>" width="100px">
              </div>
            </div>
          </div>

        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default btn-flat btn-sm" data-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-primary btn-flat btn-sm">Update</button>
        </div>
        <?php echo form_close() ?>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->
<?php } ?>