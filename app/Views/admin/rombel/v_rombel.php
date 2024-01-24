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

    <div class="card-body">
      <b>Tahun Akademik : </b> <?= $ta_aktif['ta1']?>/<?= $ta_aktif['ta2']?> - <?= $ta_aktif['semester']?>
      <table id="example1" class="table table-bordered table-striped">
        <thead>
          <tr class="text-center bg-primary">
            <th width="50px">NO</th>
            <th>Kelas</th>
            <th>Nama Rombel</th>
            <th>Jurusan</th>
            <th>Wali Kelas</th>
            <th>Jumlah</th>
            <th width="50px">Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php 
          $db = \Config\Database::connect();
          $no = 1 ;
            foreach ($rombel as $key => $value){ 

              $jml = $db->table('tbl_siswa')
              ->where('id_rombel', $value['id_rombel'])
              ->countAllResults();
              
              ?>
            
            <tr>
              <td class="text-center"><?= $no++ ; ?></td>
              <td class="text-center" ><?= $value['kelas']?></td>
              <td class="text-center" ><?= $value['nama_rombel']?></td>
              <td class="text-center" ><?= $value['jurusan']?></td>
              <td class="text-center" ><?= $value['nama_guru']?></td>
              <td class="text-center">
                <p class="badge badge-info bg-green right"><?= $jml?></p>
                <br>
                <a href="<?php echo base_url('Rombel/rincian_rombel/'.$value['id_rombel'])?>">Siswa</a>
              </td>
              <td class="text-center">
                <div class="btn-group">
                  <a href="<?php echo base_url('Rombel/DeleteData/' . $value['id_rombel']) ?>" onclick="return confirm('Yakin Hapus Data..?')" class="btn btn-danger btn-sm"><i class=" fas fa-trash"></i></a>
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
        <h4 class="modal-title">Tambah <?= $subjudul ?></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <!-- /div modeal header -->

      <?php echo form_open('Rombel/InsertData')?>
        <div class="modal-body">

          <div class="form-group">
              <label>Kelas</label>
              <select name="id_kelas" class="form-control">
                <?php foreach ($kelas as $key => $value) { ?>
                  <option value="<?= $value['id_kelas']?>"> <?= $value['kelas']?></option>
                <?php }?>
              </select>
          </div>

          <div class="form-group">
            <label>Nama Rombel</label>
            <input name="nama_rombel" class="form-control" placeholder="Nama Rombel">
          </div>

          <div class="form-group">
              <label>Jurusan</label>
              <select name="id_jurusan" class="form-control">
                <option value="">--Pilih Jurusan--</option>
                <?php foreach ($jurusan as $key => $value) { ?>
                  <option value="<?= $value['id_jurusan']?>"> <?= $value['jurusan']?></option>
                <?php }?>
              </select>
          </div>

          <div class="form-group">
              <label>Wali Kelas</label>
              <select name="id_guru" class="form-control">
                <option value="">--Pilih Wali Kelas--</option>
                <?php foreach ($guru as $key => $value) { ?>
                  <option value="<?= $value['id_guru']?>"> <?= $value['nama_guru']?></option>
                <?php }?>
              </select>
          </div>
        </div>
        <!--/div body-->

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


<!-- /.modal edit data -->
<?php foreach ($rombel as $key => $value){ ?>
  <div class="modal fade" id="edit<?= $value['id_rombel'] ?>">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Edit <?= $subjudul ?></h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <?php echo form_open('Rombel/UpdateData/' . $value['id_rombel'])?>
        <div class="modal-body">
          <div class="form-group">
          </div>
        </div>

        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default btn-flat btn-sm" data-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-primary btn-flat btn-sm">Update</button>
        </div>

        <?php echo form_close()?>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->
<?php } ?>