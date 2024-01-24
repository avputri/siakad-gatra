<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelTa;

class Ta extends BaseController
{
    protected $ModelTa;

    public function __construct() 
    {
        $this->ModelTa = new ModelTa();
    }
    public function index()
    {
        $data = [
            'judul'     => 'Master Data',
            'subjudul'  => 'Tahun Ajaran',
            'menu'      => 'master-data',
            'submenu'   => 'ta',
            'page'      => 'admin/v_ta',
            'ta'   => $this->ModelTa->AllData(),
        ];
        return view('v_template_admin', $data);
    }

    public function InsertData()
    {
            $data=[
                'ta1'  =>$this->request->getPost('ta1'),
                'ta2'  =>$this->request->getPost('ta2'),
                'semester'  =>$this->request->getPost('semester'),
                'status'    =>0,
            ];
            $this->ModelTa->InsertData($data);
            session()->setFlashdata('insert', 'Data Berhasil Ditambahkan !!');
            return redirect()->to('Ta');
            //jika valid
    }

    public function UpdateData($id_ta)
    {
            $data=[
                'id_ta' => $id_ta,
                'ta1'  =>$this->request->getPost('ta1'),
                'ta2'  =>$this->request->getPost('ta2'),
                'semester'  =>$this->request->getPost('semester'),
                'status'    =>0,
            ];
            $this->ModelTa->UpdateData($data);
            session()->setFlashdata('update', 'Data Berhasil Diupdate !!');
            return redirect()->to('Ta');
            //jika valid
    }

    public function DeleteData($id_ta)
    {
            $data=[
                'id_ta' => $id_ta,
            ];
            $this->ModelTa->DeleteData($data);
            session()->setFlashdata('delete', 'Data Berhasil Dihapus !!');
            return redirect()->to('Ta');
            //jika valid
    }

    //setting Tahun Ajaran
    public function Setting()
    {
        $data = [
            'judul'     => 'Setting',
            'subjudul'  => 'Tahun Ajaran',
            'menu'      => 'setting',
            'submenu'   => 'ta',
            'page'      => 'admin/v_set_ta',
            'ta'   => $this->ModelTa->AllData(),
        ];
        return view('v_template_admin', $data);
    }

    public function set_status_ta($id_ta)
    {
        //reset status ta
        $this->ModelTa->reset_status_ta();

        //set status ta
        $data = [
            'id_ta'     => $id_ta,
            'status'    => 1,
        ];
        $this->ModelTa->UpdateData($data);
        session()->setFlashdata('update', ' Status Tahun Akademik berhasil Diupdate');
        return redirect()->to('Ta/Setting');
    }
}
