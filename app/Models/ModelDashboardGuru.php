<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelDashboardGuru extends Model
{
    public function DataGuru(){
        return $this->db->table('tbl_guru')
        ->where('nip', session()->get('username'))
        ->get()->getRowArray();
    }

    public function JadwalGuru($id_guru)
    {
        return $this->db->table('tbl_jadwal')
        ->join('tbl_mapel', 'tbl_mapel.id_mapel = tbl_jadwal.id_mapel', 'left')
        ->join('tbl_rombel', 'tbl_rombel.id_rombel = tbl_jadwal.id_rombel', 'left')
        ->where('tbl_jadwal.id_guru', $id_guru)
        ->get()->getResultArray();
    }


    public function DetailJadwal($id_jadwal)
    {
        // Ubah method untuk menggunakan get() agar mengembalikan satu baris
        return $this->db->table('tbl_jadwal')
            ->join('tbl_jurusan', 'tbl_jurusan.id_jurusan = tbl_jadwal.id_jurusan', 'left')
            ->join('tbl_mapel', 'tbl_mapel.id_mapel = tbl_jadwal.id_mapel', 'left')
            ->join('tbl_guru', 'tbl_guru.id_guru = tbl_jadwal.id_guru', 'left')
            ->join('tbl_rombel', 'tbl_rombel.id_rombel = tbl_jadwal.id_rombel', 'left')
            ->where('tbl_jadwal.id_jadwal', $id_jadwal)
            ->get()->getRowArray();
    }

    public function siswa($id_jadwal)
    {
        return $this->db->table('tbl_penilaian')
            ->join('tbl_siswa', 'tbl_siswa.id_siswa = tbl_penilaian.id_siswa', 'left')
            ->where('tbl_penilaian.id_jadwal', $id_jadwal)
            ->get()->getResultArray();
    }

    public function SimpanNilai($data)
    {
        // untuk melihat query yang dijalankan
        $this->db->getLastQuery();
        
        // update agar sesuai dengan id_nilai
        $this->db->table('tbl_penilaian')
            ->where('id_nilai', $data['id_nilai'])
            ->update(['nilai' => $data['nilai']]);
    }

    public function AmbilNilaiSiswa($id_nilai)
    {
        return $this->db->table('tbl_penilaian')
            ->where('id_nilai', $id_nilai)
            ->get()->getRowArray();
    }

}
