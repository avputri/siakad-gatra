
<div class="col-md-12">
  <div class="card card-outline card-primary">
    <div class="card-header">
      <h3 class="card-title"><i class="fas fa-newspaper"></i> <?= $judul ?> <?= $rombel['nama_rombel']?></h3>
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
        <table class="table table-bordered table-striped">
          <tr>
              <th width="150px" >Nama Rombel</th>
              <td width="50px" >:</td>
              <td width="200px" ><?= $rombel['nama_rombel']?></td>
              <th width="150px" >Kelas</th>
              <td width="50px" >:</td>
              <td><?= $rombel['kelas']?></td>
          </tr>

          <tr>
              <th>Jurusan</th>
              <td>:</td>
              <td><?= $rombel['jurusan']?></td>
              <th>Jumlah Siswa</th>
              <td>:</td>
              <td><?= $jml?></td>
          </tr>
      </table>
          <br>

    </div> <!-- /.card-body -->
  </div> <!-- /.card -->
</div> <!-- /.col -->

<div class="col-sm-12">
            <div class="card card-outline card-primary">
              <div class="card-body">
                <table class="table table-bordered table-striped">
                  <tr class="text-center bg-primary">
                    <th width="50px" >No</th>
                    <th width="150px" >NIS</th>
                    <th>Nama Siswa</th>
                    <th width="50px" >Aksi</th>
                  </tr>
                  <?php $no =1;
                  foreach ($siswa as $key => $value) { ?>
                    <tr>
                      <td><?= $no ++?></td>
                      <td><?=$value['NIS']?></td>
                      <td><?= $value['nama_siswa']?></td>
                      <td class="text-center">
                        <a href="<?php echo base_url('Rombel/delete_anggota_rombel/' . $value['id_siswa'].'/'. $rombel['id_rombel'])?>" onclick="return confirm('Yakin Hapus Data ..?')"  class="btn btn-flat btn-xs btn-danger">
                          <i class="fa fa-trash"></i>
                        </a>
                      </td>
                  </tr>
                  <?php } ?>
                </table>

              </div> <!-- /card body -->
            </div> <!--/card outline-->
          </div> <!-- /col -->


          <!-- /.modal tambah data-->
<div class="modal fade" id="add">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Tambah Siswa</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
      </div>
      <div class="modal-body">
        <table class="table table-bordered table-striped">
          <thead>
            <th>No</th>
            <th>NIS</th>
            <th>Nama Siswa</th>
            <th>Kelas</th>
            <th>Jurusan</th>
            <th width="50px">aksi</th>
          </thead>
          <tbody>
            <?php $no = 1;
            foreach ($siswa_tr as $key => $value) {?>
            <?php if ($rombel['id_kelas'] == $value['id_kelas']) {?>
              <tr>
                <td><?= $no++ ?></td>
                <td><?= $value['NIS']?></td>
                <td><?= $value['nama_siswa']?></td>
                <td><?= $value['kelas']?></td>
                <td><?= $value['jurusan']?></td>
                <td class="text-center">
                  <a href="<?php echo base_url('Rombel/add_anggota_rombel/' . $value['id_siswa'].'/'. $rombel['id_rombel'])?>"class="btn btn-success btn-flat btn-xs"><i class="fa fa-plus"></i></a>
                </td>
              </tr>
              <?php }?>
            <?php }?>
          </tbody>
        </table>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->



    
    