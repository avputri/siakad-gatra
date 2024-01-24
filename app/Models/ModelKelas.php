<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelKelas extends Model
{


    public function AllData()
    {
        return $this->db->table('tbl_kelas')
        ->get()->getResultArray();    
    }

    public function InsertData($data)
    {
        $this->db->table('tbl_kelas')->insert($data);
    }

    public function DetailData($id_kelas)
    {
        return $this->db->table('tbl_kelas')
        ->where('id_kelas', $id_kelas)
        ->get()->getRowArray();
    }

    public function UpdateData($data)
    {
        $this->db->table('tbl_kelas')
        ->where('id_kelas', $data['id_kelas'])
        ->update($data);
    }

    public function DeleteData($data)
    {
        $this->db->table('tbl_kelas')
        ->where('id_kelas', $data['id_kelas'])
        ->delete($data);
    }

}



