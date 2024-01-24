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
        <?php echo form_open_multipart('Siswa/InsertData') ?>
        

            <div class="row">
                <div class="col sm-6">
                    <div class="form-group">
                        <label>NIS</label>
                        <input name="NIS" value="<?= old('NIS')?>" maxlenght="20" class="form-control" placeholder="NIS">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Nama Siswa</label>
                        <input name="nama_siswa" value="<?= old('nama_siswa')?>" class="form-control" placeholder="Nama Siswa">
                     </div>
                </div>
            </div>
            <div class="row">
            <div class="col-sm-6">
                    <div class="form-group">
                        <label>Jurusan</label>
                        <select name="id_jurusan" class="form-control">
                            <option value="">--Pilih Jurusan--</option>
                            <?php foreach ($jurusan as $key => $value) { ?>
                               <option value="<?= $value['id_jurusan']?>"><?= $value['jurusan']?></option>
                            <?php }?>
                        </select>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Kelas</label>
                        <select name="id_kelas" class="form-control">
                            <option value="">--Pilih Kelas--</option>
                            <?php foreach ($kelas as $key => $value) { ?>
                               <option value="<?= $value['id_kelas']?>"><?= $value['kelas']?></option>
                            <?php }?>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Tahun Angkatan</label>
                        <input type="number" min="2021" name="tahun_angkatan" 
                            value="<?= old('tahun_angkatan')?>"class="form-control" placeholder="2021">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Password</label>
                        <input name="password" value="<?= old('password')?>" class="form-control" placeholder="Password">
                     </div>
                </div>
            </div>
            
           <div class="row">
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Foto Siswa</label>
                        <input name="foto_siswa" type="file" accept="image/*" name="gambar" id="preview_gambar" class="form-control">
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
                <a href="<?php echo base_url('Siswa')?>" class="btn btn-success btn-flat btn-sm">Kembali</a>
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
