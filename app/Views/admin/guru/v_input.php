<div class="col-md-12">
    <div class="card card-outline card-info">
        <div class="card-header">
          <h3 class="card-title">
            <?= $subjudul?>
          </h3>
        </div>
    
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

        <?php echo form_open_multipart('Guru/InsertData') ?>
        <div class="card-body">

            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Kode Guru</label>
                        <input name="kode_guru" maxlenght="4" class="form-control" placeholder="Kode Guru">
                    </div>
                </div>
                <div class="col sm-6">
                    <div class="form-group">
                        <label>NIP</label>
                        <input name="nip" maxlenght="20" class="form-control" placeholder="NIP">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                    <label>Nama Guru</label>
                    <input name="nama_guru" class ="form-control" placeholder="Nama Guru">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Password</label>
                        <input name="password" class="form-control" placeholder="Password">
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
               <img src="" id="gambar_load" width="150px">
            </div>
            </div>
           </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-primary btn-flat btn-sm">Simpan</button>
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
