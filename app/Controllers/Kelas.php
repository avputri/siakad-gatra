<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelKelas;

class Kelas extends BaseController
{

    protected $ModelKelas;

    public function __construct() 
    {
        $this->ModelKelas = new ModelKelas();
    }

    public function index()
    {
        $data = [
            'judul'     => 'Master Data',
            'subjudul'  => 'Kelas',
            'menu'      => 'master-data',
            'submenu'   => 'kelas',
            'page'      => 'admin/v_kelas',
            'kelas'   => $this->ModelKelas->AllData(),
        ];
        return view('v_template_admin', $data);
    }

    public function InsertData()
    {
            $data=[
                'kelas'  =>$this->request->getPost('kelas'),
            ];
            $this->ModelKelas->InsertData($data);
            session()->setFlashdata('insert', 'Data Berhasil Ditambahkan !!');
            return redirect()->to('Kelas');
            //jika valid
    }

    public function UpdateData($id_kelas)
    {
            $data=[
                'id_kelas'  => $id_kelas,
                'kelas'     =>$this->request->getPost('kelas'),
            ];
            $this->ModelKelas->UpdateData($data);
            session()->setFlashdata('update', 'Data Berhasil Diupdate !!');
            return redirect()->to('Kelas');
            //jika valid
    }

    public function DeleteData($id_kelas)
    {
            $data=[
                'id_kelas'  => $id_kelas,
            ];
            $this->ModelKelas->DeleteData($data);
            session()->setFlashdata('delete', 'Data Berhasil Dihapus !!');
            return redirect()->to('Kelas');
            //jika valid
    }
}
