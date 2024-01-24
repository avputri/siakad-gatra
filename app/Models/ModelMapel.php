<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelMapel extends Model
{

    public function AllData()
    {
        return $this->db->table('tbl_mapel')
        ->get()->getResultArray();     
    }

    public function AllDataMapel($id_jurusan)
    {
        return $this->db->table('tbl_mapel')
        ->join('tbl_guru','tbl_guru.id_guru = tbl_mapel.id_guru','left')
        ->where('id_jurusan', $id_jurusan)
        ->orderBy('smt', 'ASC')
        ->get()->getResultArray(); 
    }
    public function InsertData($data)
    {
        $this->db->table('tbl_mapel')->insert($data);
    }

    public function DetailData($id_mapel)
    {
        return $this->db->table('tbl_mapel')
        ->where('id_mapel', $id_mapel)
        ->get()->getRowArray();
    }

    public function DeleteData($id_mapel)
    {
        $this->db->table('tbl_mapel')
        ->delete(['id_mapel' => $id_mapel]);
    }

    public function DetailJadwalByRombel($id_rombel)
    {
        return $this->db->table('tbl_jadwal')
            ->select('tbl_jadwal.*, tbl_mapel.*, tbl_guru.nip, tbl_guru.nama_guru, tbl_guru.foto_guru, tbl_rombel.*')
            ->join('tbl_mapel', 'tbl_mapel.id_mapel = tbl_jadwal.id_mapel', 'left')
            ->join('tbl_guru', 'tbl_guru.id_guru = tbl_jadwal.id_guru', 'left')
            ->join('tbl_rombel', 'tbl_rombel.id_rombel = tbl_jadwal.id_rombel', 'left')
            ->where('tbl_jadwal.id_rombel', $id_rombel)
            ->get()
            ->getResultArray();
    }

}



