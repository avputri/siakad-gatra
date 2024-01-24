<div class="col-md-12">
  <div class="card card-outline card-primary">
    <div class="card-header">
      <h3 class="card-title"><i class="fas fa-newspaper"></i> <?= $subjudul ?></h3>

      <!-- /.card-tools -->
    </div>

    <div class="card-body">
      <table id="example1" class="table table-bordered table-striped">
        <thead>
          <tr class="text-center bg-primary">
            <th width="50px">NO</th>
            <th>Kelas</th>
            <th>Jurusan</th>
            <th>Wali Kelas</th>
            <th width="100px">Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php $no = 1 ?>
          <?php foreach ($rombel as $key => $value) : ?>
            <tr>
              <td class="text-center"><?= $no++; ?></td>
              <td class="text-center">
                <p class="font-weight-bolder pb-0 mb-0"><?= $value['kelas'] ?></p>
                <div class="badge badge-secondary"><?= $value['nama_rombel'] ?></div>
              </td>
              <td class="text-center"><?= $value['jurusan'] ?></td>
              <td class="text-center"><?= $value['nama_guru'] ?></td>
              <td class="text-center">
                <a href="<?php echo base_url('RaporSiswa/Cetak/' . $value['id_rombel']) ?>">Cetak Rapor</a>
              </td>
            </tr>
          <?php endforeach ?>
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