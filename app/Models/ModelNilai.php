<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelNilai extends Model
{  
    public function DetailJadwalByRombel($id_rombel)
    {
        return $this->db->table('tbl_jadwal')
            ->join('tbl_mapel', 'tbl_mapel.id_mapel = tbl_jadwal.id_mapel', 'left')
            ->join('tbl_guru', 'tbl_guru.id_guru = tbl_jadwal.id_guru', 'left')
            ->join('tbl_rombel', 'tbl_rombel.id_rombel = tbl_jadwal.id_rombel', 'left')
            ->join('tbl_jurusan', 'tbl_jurusan.id_jurusan = tbl_jadwal.id_jurusan', 'left')
            ->where('tbl_jadwal.id_rombel', $id_rombel)
            ->get()
            ->getResultArray();
    }

    public function DetailJadwal($id_jadwal)
    {
        return $this->db->table('tbl_jadwal')
            ->join('tbl_mapel', 'tbl_mapel.id_mapel = tbl_jadwal.id_mapel', 'left')
            ->join('tbl_guru', 'tbl_guru.id_guru = tbl_jadwal.id_guru', 'left')
            ->join('tbl_rombel', 'tbl_rombel.id_rombel = tbl_jadwal.id_rombel', 'left')
            ->join('tbl_jurusan', 'tbl_jurusan.id_jurusan = tbl_jadwal.id_jurusan', 'left')
            ->where('tbl_jadwal.id_jadwal', $id_jadwal)
            ->get()
            ->getRowArray();
    }

    public function siswa($id_jadwal)
    {
        return $this->db->table('tbl_penilaian')
            ->join('tbl_siswa', 'tbl_siswa.id_siswa = tbl_penilaian.id_siswa', 'left')
            ->where('tbl_penilaian.id_jadwal', $id_jadwal)
            ->get()
            ->getResultArray();
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

    public function UpdateNilai($id_nilai, $data)
    {
        $this->db->table('tbl_penilaian')
            ->where('id_nilai', $id_nilai)
            ->update($data);
    }

    public function SimpanNilaiBaru($data)
    {
        $this->db->table('tbl_penilaian')
            ->insert($data);
    }

    public function AmbilNilaiSiswa($id_ta, $id_rombel, $id_jadwal, $id_siswa)
    {
        return $this->db->table('tbl_penilaian')
            ->where('id_ta', $id_ta)
            ->where('id_rombel', $id_rombel)
            ->where('id_jadwal', $id_jadwal)
            ->where('id_siswa', $id_siswa)
            ->get()->getRowArray();
    }

    public function NilaiBySiswa($id_ta, $id_siswa)
    {
        return $this->db->table('tbl_penilaian')
            ->join('tbl_jadwal', 'tbl_jadwal.id_jadwal = tbl_penilaian.id_jadwal', 'left')
            ->join('tbl_mapel', 'tbl_mapel.id_mapel = tbl_jadwal.id_mapel', 'left')
            ->join('tbl_guru', 'tbl_guru.id_guru = tbl_jadwal.id_guru', 'left')
            ->join('tbl_rombel', 'tbl_rombel.id_rombel = tbl_jadwal.id_rombel', 'left')
            ->where('tbl_penilaian.id_ta', $id_ta)
            ->where('tbl_penilaian.id_siswa', $id_siswa)
            ->get()
            ->getResultArray();
    }
}
