<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelJadwalPelajaran extends Model
{
    public function AllData($id_jurusan)
    {
        return $this->db->table('tbl_jadwal')
        ->join('tbl_mapel','tbl_mapel.id_mapel = tbl_jadwal.id_mapel','left')
        ->join('tbl_jurusan','tbl_jurusan.id_jurusan = tbl_jadwal.id_jurusan','left')
        ->join('tbl_rombel','tbl_rombel.id_rombel = tbl_jadwal.id_rombel','left')
        ->join('tbl_guru','tbl_guru.id_guru = tbl_jadwal.id_guru','left')
        ->where('tbl_jadwal.id_jurusan', $id_jurusan)
        ->orderBy('tbl_jadwal.hari', 'ASC')
        ->get()->getResultArray(); 
    }

    public function mapel($id_jurusan)
    {
        return $this->db->table('tbl_mapel')
        ->where('id_jurusan', $id_jurusan)
        ->orderBy('smt', 'ASC')
        ->get()->getResultArray();
    }

    public function rombel($id_jurusan)
    {
        return $this->db->table('tbl_rombel')
        ->where('id_jurusan', $id_jurusan)
        ->orderBy('nama_rombel', 'ASC')
        ->get()->getResultArray();    
    }

    public function InsertData($data)
    {
        $this->db->table('tbl_jadwal')->insert($data);
    }
    public function DeleteData($data)
    {
        $this->db->table('tbl_jadwal')
        ->where('id_jadwal', $data['id_jadwal'])
        ->delete($data);
    }

}