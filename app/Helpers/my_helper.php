<?php

function getPredikat($nilai)
{
  if ($nilai >= 90) {
    return 'Sangat Baik';
  } elseif ($nilai >= 80) {
    return 'Baik';
  } elseif ($nilai >= 70) {
    return 'Cukup';
  } else {
    return 'Kurang';
  }
}

function isWali()
{
  $db = \Config\Database::connect();
  $query = $db->table('tbl_guru')
    ->where('nip', session()->get('username'))
    ->get();

  if ($query->getRowArray() == null) {
    return false;
  }

  $id_guru = $query->getRowArray()['id_guru'];

  // id guru ada di tabel tbl_rombel
  $query = $db->table('tbl_rombel')
    ->where('id_guru', $id_guru)
    ->get();

  if ($query->getRowArray() != null) {
    return true;
  } else {
    return false;
  }
}

// url print rapor wali kelas
function urlPrintRaporWali()
{
  if (isWali()) {
    $db = \Config\Database::connect();
    $query = $db->table('tbl_guru')
      ->where('nip', session()->get('username'))
      ->get();

    if ($query->getRowArray() == null) {
      return '#';
    }

    $id_guru = $query->getRowArray()['id_guru'];

    $query = $db->table('tbl_rombel')
      ->where('id_guru', $id_guru)
      ->get();

    if ($query->getRowArray() == null) {
      return '#';
    }

    $id_rombel = $query->getRowArray()['id_rombel'];

    return base_url('RaporSiswa/Cetak/' . $id_rombel);
  } else {
    return '#';
  }
}
