<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelTa extends Model
{
    
    public function AllData()
    {
        return $this->db->table('tbl_ta')
        ->orderBy('id_ta','DESC')
        ->get()->getResultArray();    
    }
    public function InsertData($data)
    {
        $this->db->table('tbl_ta')->insert($data);
    }

    public function DetailData($id_ta)
    {
        return $this->db->table('tbl_ta')
        ->where('id_ta', $id_ta)
        ->get()->getRowArray();
    }

    public function UpdateData($data)
    {
        $this->db->table('tbl_ta')
        ->where('id_ta', $data['id_ta'])
        ->update($data);
    }
    
    public function DeleteData($data)
    {
        $this->db->table('tbl_ta')
        ->where('id_ta', $data['id_ta'])
        ->delete($data);
    }

    //menampilkan data TA yang sedang aktif
    public function TaAktif()
    {
        return $this->db->table('tbl_ta')
        ->where('status', 1)
        ->get()->getRowArray();
    }

    public function reset_status_ta()
    {
        $this->db->table('tbl_ta')->update(['status' => 0]);
    }


}
