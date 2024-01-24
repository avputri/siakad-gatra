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
    <table id="example1" class="table table-bordered table-striped">
        <thead>
          <tr class="text-center bg-primary">
            <th width="50px">NO</th>
            <th>Tahun Ajaran</th>
            <th>Semester</th>
            <th width="100px">Aksi</th>
          </tr>
        </thead>
        <tbody>
        <?php $no = 1 ;
        foreach ($ta as $key => $value){ ?>
        <tr>
          <td class="text-center"><?= $no++ ; ?></td>
          <td class="text-center" ><?= $value['ta1']?>/<?= $value['ta2']?></td>
          <td class="text-center" ><?= $value['semester']?></td>
          <td class="text-center">
            <div class="btn-group">
              <button class="btn btn-warning btn-flat btn-sm" data-toggle="modal" data-target="#edit<?= $value['id_ta'] ?>"><i class="fas fa-pencil-alt"></i></button>
                <a href="<?php echo base_url('Ta/DeleteData/' . $value['id_ta']) ?>" onclick="return confirm('Yakin Hapus Data..?')" class="btn btn-danger btn-sm"><i class=" fas fa-trash"></i></a>
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
      <?php echo form_open('Ta/InsertData')?>
      <div class="modal-body">
          <div class="form-group">
              <label>Tahun Ajaran</label>
              <div class="row">
                <div class="col-sm-6">
                  <input type="number" name="ta1" value="<?= date('Y') ?>"class="form-control" required>
                </div>
                <div class="col-sm-6">
                  <input type="number" name="ta2" value="<?= date('Y') + 1 ?>"class="form-control" required>
                </div>
              </div>
              </div>

          <div class="form-group">
              <label>Semester</label>
             <select name="semester" class="form-control">
                <option value="Ganjil">Ganjil</option>
                <option value="Genap">Genap</option>
             </select>
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

<!-- /.modal edit data -->
<?php foreach ($ta as $key => $value){ ?>
  <div class="modal fade" id="edit<?= $value['id_ta'] ?>">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Edit <?= $subjudul ?></h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <?php echo form_open('Ta/UpdateData/' . $value['id_ta'])?>
        <div class="modal-body">
        <div class="form-group">
          <label>Tahun Ajaran</label>
          <div class="row">
            <div class="col-sm-6">
              <input type="number" name="ta1" value="<?= $value['ta1'] ?>"class="form-control" required>
            </div>
            <div class="col-sm-6">
              <input type="number" name="ta2" value="<?= $value['ta2'] ?>"class="form-control" required>
            </div>
          </div>
          </div>

          <div class="form-group">
              <label>Semester</label>
             <select name="semester" class="form-control">
                <option value="Ganjil" <?= $value['semester'] == 'Ganjil' ?'selected' : '' ?> >Ganjil</option>
                <option value="Genap" <?= $value['semester'] == 'Genap' ?'selected' : '' ?> >Genap</option>
             </select>
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