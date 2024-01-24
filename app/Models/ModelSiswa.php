<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelSiswa extends Model
{
    public function AllData()
    {
        return $this->db->table('tbl_siswa')
            ->join('tbl_jurusan', 'tbl_jurusan.id_jurusan = tbl_siswa.id_jurusan', 'left')
            ->join('tbl_kelas', 'tbl_kelas.id_kelas = tbl_siswa.id_kelas', 'left')
            ->orderBy('id_siswa', 'DESC')
            ->get()->getResultArray();
    }

    // by id_rombel
    public function AllDataByRombel($id_rombel)
    {
        return $this->db->table('tbl_siswa')
            ->join('tbl_jurusan', 'tbl_jurusan.id_jurusan = tbl_siswa.id_jurusan', 'left')
            ->join('tbl_kelas', 'tbl_kelas.id_kelas = tbl_siswa.id_kelas', 'left')
            ->where('tbl_siswa.id_rombel', $id_rombel)
            ->orderBy('id_siswa', 'DESC')
            ->get()->getResultArray();
    }

    public function InsertData($data)
    {
        $this->db->table('tbl_siswa')->insert($data);
    }

    public function DetailData($id_siswa)
    {
        return $this->db->table('tbl_siswa')
            ->where('id_siswa', $id_siswa)
            ->get()->getRowArray();
    }

    public function UpdateData($data)
    {
        $this->db->table('tbl_siswa')
            ->where('id_siswa', $data['id_siswa'])
            ->update($data);
    }
    
    public function DeleteData($data)
    {
        $this->db->table('tbl_siswa')
            ->where('id_siswa', $data['id_siswa'])
            ->delete($data);
    }

    // SiswaByRombel
    public function SiswaByRombel($id_rombel)
    {
        return $this->db->table('tbl_siswa')
            ->where('id_rombel', $id_rombel)
            ->orderBy('nama_siswa', 'ASC')
            ->get()->getResultArray();
    }

    // get nilai by id_siswa dan id_jadwal
    public function NilaiBySiswa($id_siswa, $id_jadwal)
    {
        return $this->db->table('tbl_penilaian')
            ->where('id_siswa', $id_siswa)
            ->where('id_jadwal', $id_jadwal)
            ->get()->getRowArray();
    }

    // siswa dan nilai left join
    public function SiswaNilai($id_jadwal)
    {
        return $this->db->table('tbl_siswa')
            ->select('tbl_siswa.*, tbl_penilaian.id_rombel, tbl_penilaian.id_nilai, tbl_penilaian.id_ta, tbl_penilaian.id_jadwal, tbl_penilaian.nilai')
            ->join('tbl_penilaian', 'tbl_penilaian.id_siswa = tbl_siswa.id_siswa', 'left')
            ->where('tbl_penilaian.id_jadwal', $id_jadwal)
            ->orderBy('tbl_siswa.nama_siswa', 'DESC')
            ->get()->getResultArray();
    }
}
