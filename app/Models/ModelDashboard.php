<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelDashboard extends Model
{
    public function jml_rombel()
    {
        return $this->db->table('tbl_rombel')
        ->countAll();
    }

    public function jml_jurusan()
    {
        return $this->db->table('tbl_jurusan')
        ->countAll();
    }

    public function jml_guru()
    {
        return $this->db->table('tbl_guru')
        ->countAll();
    }

    public function jml_siswa()
    {
        return $this->db->table('tbl_siswa')
        ->countAll();
    }
}
