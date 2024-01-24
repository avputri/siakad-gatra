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
            <th>Nama Rombel</th>
            <th>Jurusan</th>
            <th>Wali Kelas</th>
            <th width="50px">Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php 
         
          $no = 1 ;
            foreach ($rombel as $key => $value){ 

              ?>
            <tr>
              <td class="text-center"><?= $no++ ; ?></td>
              <td class="text-center" ><?= $value['kelas']?></td>
              <td class="text-center" ><?= $value['nama_rombel']?></td>
              <td class="text-center" ><?= $value['jurusan']?></td>
              <td class="text-center" ><?= $value['nama_guru']?></td>
              <td class="text-center">
                <a href="<?php echo base_url('NilaiSiswa/DetailRombel/'.$value['id_rombel'])?>">Detail</a>
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
