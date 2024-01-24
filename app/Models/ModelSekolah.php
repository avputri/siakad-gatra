<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelSekolah extends Model
{
    public function DetailData()
    {
        return $this->db->table('tbl_sekolah')
        ->where('id', 1)
        ->get()->getRowArray();    
    }
    public function InsertData($data)
    {
        return $this->db->table('tbl_jurusan')->insert($data);
    }
}



