<div class="col-md-12">
  <div class="card card-outline card-primary">
    <div class="card-header">
      <h3 class="card-title"></i> <?= $judul ?> <?= $jurusan['jurusan']?></h3>
    </div>
    <div class="card-body">
      <table class="table table-bordered table-striped">
        <thead>
          <tr>
            <th width="100px">Jurusan</th>
              <td width="50px">:</td>
              <td><?= $jurusan['jurusan']?></td>
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
    <?php 
    if (session()->get('insert')){
    echo '<div class=" alert alert-success">';
    echo session()->get('insert');
    echo '</div>';
    }
    if (session()->get('update')){
      echo '<div class=" alert alert-primary">';
      echo session()->get('update');
      echo '</div>';
    }
    if (session()->get('delete')){
      echo '<div class=" alert alert-danger">';
      echo session()->get('delete');
      echo '</div>';
    }
    ?>
        <?php 
            $errors = session()->getFlashdata('errors');
            if (!empty($errors)) { ?>
              <div class= "alert alert-danger" role="alert">
                <ul>
                  <?php foreach ($errors as $key => $value) { ?>
                    <li><?=esc($value) ?></li>
                <?php } ?>
                </ul>
              </div>
            <?php } ?>
            
    <div class="card-body">
    <b>Tahun Akademik : </b> <?= $ta_aktif['ta1']?>/<?= $ta_aktif['ta2']?> - <?= $ta_aktif['semester']?>
    <table id="example1" class="table table-bordered table-striped">
        <thead>
          <tr class="text-center bg-primary">
            <th>NO</th>
            <th>Semester</th>
            <th>Kode Mapel</th>
            <th>Mata Pelajaran</th>
            <th>Guru Mapel</th>
            <th>Rombel</th>
            <th>Hari</th>
            <th>waktu</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php $no = 1;
          foreach ($jadwal as $key => $value) { ?>
            <tr>
              <td><?= $no++ ?></td>
              <td><?= $value['semester']?></td>
              <td><?= $value['kode_mapel']?></td>
              <td><?= $value['mapel']?></td>
              <td><?= $value['nama_guru']?></td>
              <td><?= $value['nama_rombel']?></td>
              <td><?= $value['hari']?></td>
              <td><?= $value['jam_ke']?></td>
              <td class="text-center">
                <a href="<?php echo base_url('Jadwalpelajaran/delete/' . $value['id_jadwal'].'/'. $jurusan['id_jurusan'])?>" onclick="return confirm('Yakin Hapus Data ..?')"  class="btn btn-flat btn-xs btn-danger">
                  <i class="fa fa-trash"></i>
                </a>
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
  $(function () {
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
      <?php echo form_open('JadwalPelajaran/InsertData/'. $jurusan['id_jurusan'])?>
      <div class="modal-body">
          <div class="form-group">
              <label>Mata Pelajaran</label>
              <select name="id_mapel" class="form-control">
                <option value="">--Pilih Mata Pelajaran--</option>
                <?php foreach ($mapel as $key => $value) { ?>
                  <?php if ($value['semester'] == $ta_aktif['semester']) { ?>
                    <option value="<?= $value['id_mapel']?>"> <?= $value['semester']?> || <?= $value['kode_mapel']?> || <?= $value['mapel']?> </option>
                  <?php }?>
                  <?php }?>

              </select>
          </div>
          <div class="form-group">
              <label>Guru</label>
              <select name="id_guru" class="form-control">
                <option value="">--Pilih Guru Mapel--</option>
                <?php foreach ($guru as $key => $value) {?>
                  <option value="<?= $value['id_guru']?>"> <?= $value['kode_guru']?> || <?= $value['nama_guru']?> </option>
                <?php }?>

              </select>
          </div>
          <div class="form-group">
              <label>Rombel</label>
                <select name="id_rombel" class="form-control">
                  <option value="">--Pilih Rombongan Kelas--</option>
                  <?php foreach ($rombel as $key => $value) {?>
                  <option value="<?= $value['id_rombel']?>"> <?= $value['nama_rombel']?> </option>
                <?php }?>
                </select>
          </div>

          <div class="row">
            <div class="col-sm-6">
              <div class="form-group">
                <label>Hari</label>
                  <select name="hari" class="form-control">
                    <option value="">--Plih Hari--</option>
                    <option value="Senin">Senin</option>
                    <option value="Selasa">Selasa</option>
                    <option value="Rabu">Rabu</option>
                    <option value="Kamis">Kamis</option>
                    <option value="Jumat">Jumat</option>
                    <option value="Sabtu">Sabtu</option>
                  </select>
              </div>
            </div>

            <div class="col-sm-6">
              <div class="form-group">
                <label>Waktu</label>
                  <input name="jam_ke"class="form-control" placeholder="Ex: 07.00-08.40">
              </div>
            </div>
          </div>
          
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default btn-flat btn-sm" data-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-primary btn-flat btn-sm">Simpan</button>
          </div>
      <?php echo form_close()?>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
</div>
