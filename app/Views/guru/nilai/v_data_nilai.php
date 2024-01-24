<div class="col-md-12">
    <div class="card card-outline card-success">
        <div class="card-header">
            <h3 class="card-title"><i class="fas fa-newspaper"></i> <?= $subjudul ?>
                <b>Tahun Akademik : </b> <?= $ta_aktif['ta1'] ?>/<?= $ta_aktif['ta2'] ?> - <?= $ta_aktif['semester'] ?>
            </h3>
        </div> <!-- /.card-header -->


        <div class="col-sm-12">

            <?php
            if (session()->get('insert')) {
                echo '<div class=" alert alert-success">';
                echo session()->get('insert');
                echo '</div>';
            }
            if (session()->get('update')) {
                echo '<div class=" alert alert-primary">';
                echo session()->get('update');
                echo '</div>';
            }
            if (session()->get('delete')) {
                echo '<div class=" alert alert-danger">';
                echo session()->get('delete');
                echo '</div>';
            }
            ?>


            <div class="card-body">
                <div class="col-sm-12">
                    <div class="row">
                        <table class="table-striped table-responsive">
                            <tr>
                                <th width="">Mata Pelajaran</th>
                                <th width="30px">:</th>
                                <td width=""><?= $jadwal['mapel'] ?> - <?= $jadwal['kode_mapel'] ?></td>
                            </tr>
                            <tr>
                                <th>Nama Guru Mapel</th>
                                <th>:</th>
                                <td><?= $jadwal['nama_guru'] ?></td>
                            </tr>
                            <tr>
                                <th>Rombel - Jurusan</th>
                                <th>:</th>
                                <td><?= $jadwal['nama_rombel'] ?> - <?= $jadwal['jurusan'] ?></td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="col-sm-12">
                    <a href="<?php echo base_url('NilaiSiswa/PrintNilai/' . $jadwal['id_jadwal']) ?>" target="_blank" class="btn btn-xs btn-flat btn-success"><i class="fa fa-print"></i> Print Nilai</a>
                </div>

                <?php if (isset($nilaiBaru)) : ?>
                    <h3>Nilai Baru:</h3>
                    <pre><?php print_r($nilaiBaru); ?></pre>
                <?php endif; ?>

                <!--  form untuk setiap siswa dengan input nilai -->
                <form method="post" action="<?= base_url('DashboardGuru/SimpanNilai/' . $jadwal['id_jadwal']) ?>">
                    <!--  form untuk setiap siswa dengan input nilai -->
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th width="50px">NO</th>
                                <th>Nama Siswa</th>
                                <th width="150px">Nilai</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($siswa as $no => $siswa) : ?>
                                <?php $n = $nilai->NilaiBySiswa($siswa['id_siswa'], $jadwal['id_jadwal']); ?>
                                <?php if ($no == 0) : ?>
                                    <input type="hidden" name="ta" value="<?= $jadwal['id_ta'] ?>">
                                    <input type="hidden" name="rombel" value="<?= $jadwal['id_rombel'] ?>">
                                    <input type="hidden" name="jadwal" value="<?= $jadwal['id_jadwal'] ?>">
                                <?php endif ?>
                                <tr>
                                    <td class="text-center"><?= $no + 1 ?></td>
                                    <td><?= $siswa['nama_siswa'] ?></td>
                                    <td class="text-center">
                                        <input type="text" name="nilai[<?= $n['id_nilai'] ?? '' ?>]" value="<?= $n['nilai'] ?? '' ?>" class="form-control">
                                        <input type="hidden" name="siswa[<?= $n['id_nilai'] ?? '' ?>]" value="<?= $siswa['id_siswa'] ?? '' ?>">
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <!--  tombol submit untuk menyimpan nilai -->
                    <button type="submit" class="btn btn-primary btn-flat btn-sm">Simpan Nilai</button>
                </form>
            </div>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>
<!-- /.col -->