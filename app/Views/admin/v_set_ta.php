<div class="col-md-12">
  <div class="card card-outline card-primary">
    <div class="card-header">
      <h3 class="card-title"><i class="fas fa-newspaper"></i> <?= $subjudul ?></h3>
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
            <th>Status</th>
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
            <?php if ($value['status'] == 0) {
              echo '<p class="badge badge-info bg-red right">Non-Aktif</p>';
             } else {
              echo '<p class="badge badge-info bg-green right">Aktif</p>';
             }?>
          </td>
          <td class="text-center">
            <div class="btn-group">
              <?php if ($value['status'] == 0) { ?>
                <a href="<?php echo base_url('Ta/set_status_ta/' .$value['id_ta'])?>" class="btn btn-success btn-flat btn-sm"><i class="fas fa-check">Aktifkan</i></a>
              <?php } ?>
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