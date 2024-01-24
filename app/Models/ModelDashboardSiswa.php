<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelDashboardSiswa extends Model
{
    public function DataSiswa()
    {
        return $this->db->table('tbl_siswa')
        ->join('tbl_jurusan','tbl_jurusan.id_jurusan = tbl_siswa.id_jurusan','left')
        ->join('tbl_kelas','tbl_kelas.id_kelas = tbl_siswa.id_kelas', 'left')
        ->join('tbl_rombel','tbl_rombel.id_rombel = tbl_siswa.id_rombel', 'left')
        ->join('tbl_guru','tbl_guru.id_guru = tbl_rombel.id_guru', 'left')
        ->where('nis', session()->get('username'))
        ->get()->getRowArray();    
    }

    public function JadwalSiswa($id_rombel)
    {
        return $this->db->table('tbl_jadwal')
        ->join('tbl_mapel','tbl_mapel.id_mapel = tbl_jadwal.id_mapel','left')
        ->join('tbl_guru','tbl_guru.id_guru = tbl_jadwal.id_guru','left')
        ->join('tbl_rombel','tbl_rombel.id_rombel = tbl_jadwal.id_rombel', 'left')
        ->join('tbl_jurusan','tbl_jurusan.id_jurusan = tbl_jadwal.id_jurusan','left')
        ->where('tbl_jadwal.id_rombel', $id_rombel)
        ->get()->getResultArray(); 
    }

}