<div class="col-md-12">
    <div class="card card-outline card-info">
        <div class="card-header">
          <h3 class="card-title">
            <?= $subjudul?>
          </h3>
        </div>
        
    <div class="card-body">
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

            <?php
            if (session()->getFlashdata('pesan')) {
              echo '<div class="alert alert-warning" role="alert">';
              echo session()->getFlashdata('pesan');
              echo '</div>';
            }
            ?>
        <?php echo form_open_multipart('Guru/UpdateData/'. $guru['id_guru']) ?>
        

            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Kode Guru</label>
                        <input name="kode_guru" value="<?= $guru['kode_guru'] ?>" maxlenght="4" class="form-control" >
                    </div>
                </div>
                <div class="col sm-6">
                    <div class="form-group">
                        <label>NIP</label>
                        <input name="nip" value="<?= $guru['nip'] ?>" maxlenght="20" class="form-control" >
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Nama Guru</label>
                        <input name="nama_guru" value="<?= $guru['nama_guru'] ?>" class="form-control" >
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Password</label>
                        <input name="password" value="<?= $guru['password'] ?>" class="form-control" >
                    </div>
                </div>
            </div>
                        
           <div class="row">
            <div class="col-sm-4">
            <div class="form-group">
                <label>Foto Guru</label>
                <input name="foto_guru" type="file" accept="image/*" name="gambar" id="preview_gambar" class="form-control">
            </div>
            </div>

            <div class="col-sm-8">
            <div class="form-group">
                <label>Preview Foto</label><br>
               <img src="<?php echo base_url('public/fotoguru/'. $guru['foto_guru'])?>" id="gambar_load" width="150px">
            </div>
            </div>
           </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-primary btn-flat btn-sm">Update</button>
                <a href="<?php echo base_url('Guru')?>" class="btn btn-success btn-flat btn-sm">Kembali</a>
            </div>
            <?php echo form_close() ?>
        </div>
    </div>
    <!-- /.col-->
</div>


<script>
    function bacaGambar(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#gambar_load').attr('src',e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $('#preview_gambar').change(function() {
        bacaGambar(this);
    })
</script>
