<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelJurusan;

class Jurusan extends BaseController
{

    protected $ModelJurusan;

    public function __construct() 
    {
        $this->ModelJurusan = new ModelJurusan();
    }
    
    public function index()
    {
        $data = [
            'judul'     => 'Master Data',
            'subjudul'  => 'Jurusan',
            'menu'      => 'master-data',
            'submenu'   => 'jurusan',
            'page'      => 'admin/v_jurusan',
            'jurusan'   => $this->ModelJurusan->AllData(),
        ];
        return view('v_template_admin', $data);
    }
    public function Input()
    {
        $data = [
            'judul'     => 'Jurusan',
            'subjudul'  => 'Input Jurusan',
            'menu'      => 'master-data',
            'submenu'   => 'jurusan',
            'page'      => 'admin/v_jurusan',
            'jurusan'   => $this->ModelJurusan->AllData(),
        ];
        return view('v_template_admin', $data);
    }
    public function InsertData()
    {
            $data=[
                'kode_jurusan'  =>$this->request->getPost('kode_jurusan'),
                'jurusan'  =>$this->request->getPost('jurusan'),
            ];
            $this->ModelJurusan->InsertData($data);
            session()->setFlashdata('insert', 'Data Berhasil Ditambahkan !!');
            return redirect()->to('Jurusan');
            //jika valid
    }

    public function Edit($id_jurusan)
    {
        $data = [
            'judul'     => 'Jurusan',
            'subjudul'  => 'Edit Jurusan',
            'menu'      => 'master-data',
            'submenu'   => 'jurusan',
            'page'      => 'admin/v_jurusan',
            'jurusan'   => $this->ModelJurusan->DetailData($id_jurusan),
        ];
        
    return view('v_template_admin', $data);
    }

    public function UpdateData($id_jurusan)
    {
        $data=[
            'id_jurusan'    =>$id_jurusan,
            'kode_jurusan'  =>$this->request->getPost('kode_jurusan'),
            'jurusan'  =>$this->request->getPost('jurusan'),
        ];
        $this->ModelJurusan->UpdateData($data);
        session()->setFlashdata('update', 'Data Berhasil Diupdate !!');
        return redirect()->to('Jurusan');
        //jika valid
    }

    public function DeleteData($id_jurusan)
    {
        $data=[
            'id_jurusan' => $id_jurusan,
        ];
        $this->ModelJurusan->DeleteData($data);
        session()->setFlashdata('delete', 'Data Berhasil Dihapus');
        return redirect()->to('Jurusan');
        //jika valid
    }
}

