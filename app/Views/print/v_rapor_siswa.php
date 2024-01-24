<?= $this->extend('v_template_print'); ?>
<?= $this->section('content'); ?>
<?php foreach ($siswa as $key => $siswa) : ?>
  <div class="wrapper-page" style="font-size: 13px;">
    <table class="table table-borderless table-sm">
      <tbody>
        <tr>
          <th class="mb-0 pb-0" style="text-align:left !important;">Nama Peserta Didik</th>
          <td class="mb-0 pb-0" style="text-align:left !important;">: <?= $siswa['nama_siswa'] ?></td>
          <th class="mb-0 pb-0" style="text-align:left !important;">Kelas</th>
          <td class="mb-0 pb-0" style="text-align:left !important;">: <?= $siswa['kelas'] ?></td>
        </tr>
        <tr>
          <th class="mb-0 pb-0" style="text-align:left !important;">Nomor Induk/NISN</th>
          <td class="mb-0 pb-0" style="text-align:left !important;">: <?= $siswa['NIS'] ?></td>
          <th class="mb-0 pb-0" style="text-align:left !important;">Jurusan</th>
          <td class="mb-0 pb-0" style="text-align:left !important;">: <?= $siswa['jurusan'] ?></td>
        </tr>
        <tr>
          <th class="mb-0 pb-0" style="text-align:left !important;">Sekolah</th>
          <td class="mb-0 pb-0" style="text-align:left !important;">: SMK Gatra Praja</td>
          <th class="mb-0 pb-0" style="text-align:left !important;">Semester</th>
          <td class="mb-0 pb-0" style="text-align:left !important;">: <?= $ta['semester'] ?></td>
        </tr>
        <tr>
          <th class="mb-0 pb-0" style="text-align:left !important;">Alamat</th>
          <td class="mb-0 pb-0" style="text-align:left !important;">: Jl. Perintis Kemerdekaan No. 9 Kota Pekalongan</td>
          <th class="mb-0 pb-0" style="text-align:left !important;">Tahun Pelajaran</th>
          <td class="mb-0 pb-0" style="text-align:left !important;">: <?= $ta['ta1'] . ' / ' . $ta['ta2'] ?></td>
        </tr>
      </tbody>
    </table>

    <table class="table table-sm table-bordered">
      <thead>
        <tr>
          <th class="text-center" style="width:85px;">No</th>
          <th class="text-left">Mata Pelajaran</th>
          <th class="text-center" style="width:85px;">KKM</th>
          <th class="text-center">Nilai Akhir</th>
          <th class="text-center" style="width:170px;">Predikat</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <th colspan="5" style="text-align: left !important; padding: 4px 20px;">A. Kelompok Mata Pelajaran Umum</th>
        </tr>
        <?php foreach ($siswa['mapel'] as $key => $mapel) : ?>
          <?php if (strtolower($mapel['kategori']) == 'umum') : ?>
            <tr>
              <td class="text-center"><?= $key + 1 ?></td>
              <td class="text-left"><?= $mapel['mapel'] ?></td>
              <td class="text-center">70</td>
              <td class="text-center"><?= $mapel['nilai']['nilai'] ?? 0 ?></td>
              <td class="text-center"><?= getPredikat($mapel['nilai']['nilai'] ?? 0) ?></td>
            </tr>
          <?php endif ?>
        <?php endforeach ?>
        <tr>
          <th colspan="5" style="text-align: left !important; padding: 4px 20px;">B. Kelompok Mata Pelajaran Kejuruan</th>
        </tr>
        <?php foreach ($siswa['mapel'] as $key => $mapel) : ?>
          <?php if (strtolower($mapel['kategori']) == 'kejuruan') : ?>
            <tr>
              <td class="text-center"><?= $key + 1 ?></td>
              <td class="text-left"><?= $mapel['mapel'] ?></td>
              <td class="text-center">70</td>
              <td class="text-center"><?= $mapel['nilai']['nilai'] ?? 0 ?></td>
              <td class="text-center"><?= getPredikat($mapel['nilai']['nilai'] ?? 0) ?></td>
            </tr>
          <?php endif ?>
        <?php endforeach ?>
      </tbody>
    </table>

    <table class="table mt-4 table-borderless">
      <tbody>
        <tr class="text-center">
          <td class="text-center">
            Orang Tua/Wali
            <br><br><br><br><br><br>
            ...................................................
          </td>
          <td class="text-center">
            Kota Pekalongan, <?= date('d F Y') ?><br>
            Wali Kelas
            <br><br><br><br><br>
            <u><strong><?= $rombel['nama_guru'] ?></strong></u>
            <br> NIP. <?= $rombel['nip'] ?>
          </td>
        </tr>
        <tr class="text-center">
          <td colspan="2" class="text-center">
            Mengetahui, <br>
            Kepala Sekolah
            <br><br><br><br><br><br>
            <u><strong>Drs. SUPRAYITNO</strong></u>
            <br> NIP. 19620629 198903 1 001
          </td>
        </tr>
      </tbody>
    </table>
  </div>
<?php endforeach ?>
<?= $this->endSection(); ?>