<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelJurusan extends Model
{

    public function AllData()
    {
        return $this->db->table('tbl_jurusan')
        ->get()->getResultArray();    
    }

    public function InsertData($data)
    {
        $this->db->table('tbl_jurusan')->insert($data);
    }

    public function DetailData($id_jurusan)
    {
        return $this->db->table('tbl_jurusan')
        ->where('id_jurusan', $id_jurusan)
        ->get()->getRowArray();
    }

    public function UpdateData($data)
    {
        $this->db->table('tbl_jurusan')
        ->where('id_jurusan', $data['id_jurusan'])
        ->update($data);
    }

    public function DeleteData($data)
    {
        $this->db->table('tbl_jurusan')
        ->where('id_jurusan', $data['id_jurusan'])
        ->delete($data);
    }

}



