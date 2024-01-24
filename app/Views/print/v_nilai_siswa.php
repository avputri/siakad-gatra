<!-- v_template_print -->
<?= $this->extend('v_template_print'); ?>
<?= $this->section('content'); ?>
<table class="table table-borderless w-100">
  <tr style="width: 100%;">
    <td style="width: 50%; text-align: center; vertical-align: middle;">
      <h6 class="font-weight-bold">
        DAFTAR NILAI <br />
        SUMATIF TENGAH SEMESTER <?= strtoupper($ta_aktif['semester']) ?> <br />
        SMK GRATRA PRAJA PEKALONGAN <br />
        TAHUN AJARAN <?= $ta_aktif['ta1'] ?>/<?= $ta_aktif['ta2'] ?>
      </h6>
    </td>
    <td style="width: 50%; text-align: left !important; vertical-align: middle !important;">
      <table class="table table-borderless table-sm table-compact text-sm">
        <tr>
          <th class="pb-0 mb-0" style="text-align: left !important;">MAPEL</th>
          <td class="pb-0 mb-0" style="text-align: left !important;">:</td>
          <td class="pb-0 mb-0" style="text-align: left !important;"><?= $jadwal['mapel'] ?></td>
        </tr>
        <tr>
          <th class="pb-0 mb-0" style="text-align: left !important;">KELAS</th>
          <td class="pb-0 mb-0" style="text-align: left !important;">:</td>
          <td class="pb-0 mb-0" style="text-align: left !important;">
            <?= $jadwal['nama_rombel'] ?>
          </td>
        </tr>
        <tr>
          <th class="pb-0 mb-0" style="text-align: left !important;">WALIKELAS</th>
          <td class="pb-0 mb-0" style="text-align: left !important;">:</td>
          <td class="pb-0 mb-0" style="text-align: left !important;"><?= $jadwal['nama_guru'] ?></td>
        </tr>
      </table>
    </td>
  </tr>
</table>

<table class="table table-bordered table-sm" style="font-size: 12px; width: 100%;">
  <thead class="text-center">
    <tr>
      <th rowspan="2" style="vertical-align: middle;">No</th>
      <th rowspan="2" style="vertical-align: middle;">NIS</th>
      <th rowspan="2" style="vertical-align: middle;">Nama Siswa</th>
      <th colspan="2" style="vertical-align: middle;">Keterampilan</th>
    </tr>
    <tr>
      <th style="vertical-align: middle;">KKM</th>
      <th style="vertical-align: middle;">NILAI</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($siswa as $key => $item) : ?>
      <tr>
        <td  style="vertical-align: middle;" class="text-center"><?= $key + 1 ?></td>
        <td  style="vertical-align: middle;" class="text-center"><?= $item['NIS'] ?></td>
        <td  style="vertical-align: middle;"><?= $item['nama_siswa'] ?></td>
        <td  style="vertical-align: middle;" class="text-center"><?= $jadwal['kategori'] == 'kejuruan' ? 75 : 70 ?></td>
        <td  style="vertical-align: middle;" class="text-center"><?= $item['nilai'] ?></td>
      </tr>
    <?php endforeach ?>
  </tbody>
</table>

<!-- ttd onright -->
<table class="table table-borderless table-sm mt-4" style="font-size: 13px; width: 100%;">
  <tr>
    <td style="width: 50%;"></td>
    <td style="width: 50%; text-align: center;">
      <p class="p-0 m-0">Pekalongan, <?= date('d M Y') ?></p>
      Wali Kelas
      <br />
      <br />
      <br />
      <br />
      <p><strong><u><?= $jadwal['nama_guru'] ?></u></strong></p>
    </td>
  </tr>
</table>
<?= $this->endSection(); ?>