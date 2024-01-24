<div class="col-md-12">
  <div class="card card-outline card-primary">
    <div class="card-header">
      <h3 class="card-title"></i> <?= $judul ?> <?= $jurusan['jurusan'] ?></h3>
    </div>
    <div class="card-body">
      <table class="table table-bordered table-striped">
        <thead>
          <tr>
            <th width="100px">Jurusan</th>
            <td width="50px">:</td>
            <td><?= $jurusan['jurusan'] ?></td>
          </tr>
        </thead>
      </table>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.col -->

<div class="col-md-12">
  <div class="card card-outline card-primary">
    <div class="card-header">
      <h3 class="card-title"><i class="fas fa-newspaper"></i> <?= $judul ?></h3>
      <div class="card-tools">
        <button class="btn btn-primary btn-flat btn-sm" data-toggle="modal" data-target="#add">
          <i class="fa fa-plus"></i> Tambah
        </button>
      </div>
      <!-- /.card-tools -->
    </div>
    <!-- /.card-header -->

    <div class="card-body">
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

      <table id="example1" class="table table-bordered table-striped">
        <thead>
          <tr class="text-center bg-primary">
            <th width="50px">NO</th>
            <th>Kode Mapel</th>
            <th>Mata Pelajaran</th>
            <th>Guru Mata Pelajaran</th>
            <th>Jam Pelajaran</th>
            <th>Kategori</th>
            <th>Semester</th>
            <th width="100px">Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php $no = 1;
          foreach ($mapel as $key => $value) { ?>
            <tr>
              <td><?= $no++ ?></td>
              <td class="text-center"><?= $value['kode_mapel'] ?></td>
              <td><?= $value['mapel'] ?></td>
              <td><?= $value['nama_guru'] ?></td>
              <td class="text-center"><?= $value['jam_pelajaran'] ?></td>
              <td class="text-center"><?= $value['kategori'] ?></td>
              <td class="text-center"><?= $value['smt'] ?> (<?= $value['semester'] ?>)</td>
              <td class="text-center">
                <a href="<?php echo base_url('Mapel/DeleteData/' . $value['id_mapel']) ?>" onclick="return confirm('Yakin Hapus Data ..?')" class="btn btn-danger btn-sm"><i class=" fas fa-trash"></i></a>
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
        <h4 class="modal-title">Tambah <?= $judul ?></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?php echo form_open('Mapel/InsertData/' . $jurusan['id_jurusan']) ?>
      <div class="modal-body">
        <div class="form-group">
          <label>Kode Mata Pelajaran</label>
          <input name="kode_mapel" class="form-control" placeholder="Kode Mata Pelajaran">
        </div>
        <div class="form-group">
          <label>Mata Pelajaran</label>
          <input name="mapel" class="form-control" placeholder="Mata Pelajaran">
        </div>
        <div class="form-group">
          <label>Guru Mata Pelajaran</label>
          <select name="id_guru" class="form-control">
            <option value="">--Pilih Guru Mapel--</option>
            <?php foreach ($guru as $key => $value) { ?>
              <option value="<?= $value['id_guru'] ?>"> <?= $value['nama_guru'] ?></option>
            <?php } ?>
          </select>
        </div>
        <div class="form-group">
          <label>Jam Pelajaran</label>
          <select name="jam_pelajaran" class="form-control">
            <option value="">--Pilih Jam Pelajaran--</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
          </select>
        </div>

        <div class="form-group">
          <label>Kategori</label>
          <select name="kategori" class="form-control">
            <option value="">--Plih Kategori--</option>
            <option value="Umum">Umum</option>
            <option value="Kejuruan">Kejuruan</option>
          </select>
        </div>

        <div class="form-group">
          <label>Semester</label>
          <select name="smt" class="form-control">
            <option value="">--Pilih Semester--</option>
            <option value="1">1</option>
            <option value="2">2</option>
          </select>
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
</div>