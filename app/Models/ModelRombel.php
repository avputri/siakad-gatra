<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelRombel extends Model
{
    public function AllData()
    {
        return $this->db->table('tbl_rombel')
        ->join('tbl_kelas','tbl_kelas.id_kelas = tbl_rombel.id_kelas','left')
        ->join('tbl_jurusan','tbl_jurusan.id_jurusan = tbl_rombel.id_jurusan','left')
        ->join('tbl_ta','tbl_ta.id_ta = tbl_rombel.id_ta','left')
        ->join('tbl_guru','tbl_guru.id_guru = tbl_rombel.id_guru','left')
        ->where('tbl_ta.status',1)
        ->orderBy('tbl_rombel.id_jurusan', 'ASC')
        ->get()->getResultArray();    
    }

    public function detail($id_rombel)
    {
        return $this->db->table('tbl_rombel')
        ->select('tbl_rombel.*, tbl_kelas.*, tbl_jurusan.*, tbl_ta.*, tbl_guru.*')
        ->join('tbl_kelas','tbl_kelas.id_kelas = tbl_rombel.id_kelas','left')
        ->join('tbl_jurusan','tbl_jurusan.id_jurusan = tbl_rombel.id_jurusan','left')
        ->join('tbl_ta','tbl_ta.id_ta = tbl_rombel.id_ta','left')
        ->join('tbl_guru','tbl_guru.id_guru = tbl_rombel.id_guru','left')
        ->where('id_rombel', $id_rombel)
        ->get()->getRowArray();  
    }
    public function InsertData($data)
    {
        $this->db->table('tbl_rombel')->insert($data);
    }

    public function DetailData($id_rombel)
    {
        return $this->db->table('tbl_rombel')
        ->where('id_rombel', $id_rombel)
        ->get()->getRowArray();
    }
    
    public function siswa($id_rombel)
    {
        return $this->db->table('tbl_siswa')
        ->join('tbl_jurusan','tbl_jurusan.id_jurusan = tbl_siswa.id_jurusan','left')
        ->join('tbl_kelas','tbl_kelas.id_kelas = tbl_siswa.id_kelas', 'left')
        ->where('id_rombel', $id_rombel)
        ->orderBy('id_siswa','DESC')
        ->get()->getResultArray();  
    }

    //menampilkan siswa yang belum ada rombel
    public function siswa_tanpa_rombel()
    {
        return $this->db->table('tbl_siswa')
        ->join('tbl_jurusan','tbl_jurusan.id_jurusan = tbl_siswa.id_jurusan','left')
        ->join('tbl_kelas','tbl_kelas.id_kelas = tbl_siswa.id_kelas', 'left')
        ->where('id_rombel', '0')
        ->orderBy('id_siswa','DESC')
        ->get()->getResultArray();   
    }

    public function jml_siswa($id_rombel)
    {
        return $this->db->table('tbl_siswa')
        ->where('id_rombel', $id_rombel)
        ->countAllResults();
    }

    public function DeleteData($data)
    {
        $this->db->table('tbl_rombel')
        ->where('id_rombel', $data['id_rombel'])
        ->delete($data);
    }

    public function UpdateSiswa($data)
    {
        $this->db->table('tbl_siswa')
        ->where('id_siswa', $data['id_siswa'])
        ->update($data);
    }

}