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
            <th width="150px">Kode Jurusan</th>
            <th>Jurusan</th>
            <th width="100px">Aksi</th>
          </tr>
        </thead>
        <tbody>
        <?php $no = 1 ;
        foreach ($jurusan as $key => $value){ ?>
        <tr>
          <td class="text-center"><?= $no++ ; ?></td>
          <td class="text-center" ><?= $value['kode_jurusan']?></td>
          <td class="text-center" ><?= $value['jurusan']?></td>
          <td class="text-center">
            <div class="btn-group">
              <button class="btn btn-warning btn-flat btn-sm" data-toggle="modal" data-target="#edit<?= $value['id_jurusan'] ?>"><i class="fas fa-pencil-alt"></i></button>
                <a href="<?php echo base_url('Jurusan/DeleteData/' . $value['id_jurusan']) ?>" onclick="return confirm('Yakin Hapus Data..?')" class="btn btn-danger btn-sm"><i class=" fas fa-trash"></i></a>
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
      <?php echo form_open('Jurusan/InsertData')?>
      <div class="modal-body">
      <div class="form-group">
              <label>Kode Jurusan</label>
              <input name="kode_jurusan" class="form-control" placeholder="kode Jurusan" required>
          </div>

          <div class="form-group">
              <label>Jurusan</label>
              <input name="jurusan" class="form-control" placeholder="Jurusan" required>
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
<?php foreach ($jurusan as $key => $value){ ?>
  <div class="modal fade" id="edit<?= $value['id_jurusan'] ?>">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Edit <?= $subjudul ?></h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <?php echo form_open('Jurusan/UpdateData/' . $value['id_jurusan'])?>
        <div class="modal-body">
          <div class="form-group">
                <label>Kode Jurusan</label>
                <input name="kode_jurusan" value="<?= $value['kode_jurusan']?>" class="form-control"  required>
            </div>    
        
          <div class="form-group">
                <label>Jurusan</label>
                <input name="jurusan" value="<?= $value['jurusan']?>" class="form-control"  required>
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
