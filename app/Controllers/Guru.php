<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelGuru;

class Guru extends BaseController
{

    protected $ModelGuru;

    public function __construct() 
    {
        $this->ModelGuru = new ModelGuru();
    }

    public function index()
    {
        $data = [
            'judul'     => 'Master Data',
            'subjudul'  => 'Guru',
            'menu'      => 'master-data',
            'submenu'   => 'guru',
            'page'      => 'admin/guru/v_index',
            'guru'   => $this->ModelGuru->AllData(),
        ];
        return view('v_template_admin', $data);
    }

    public function Input()
    {
        $data = [
            'judul'     => 'Master Data',
            'subjudul'  => 'Input Guru',
            'menu'      => 'master-data',
            'submenu'   => 'guru',
            'page'      => 'admin/guru/v_input',
        ];
        return view('v_template_admin', $data);
    }
    
    public function InsertData()
    {
        if ($this->validate([
            'kode_guru' => [
                'label' => 'Kode Guru',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong', 
                ]
            ],
            'nip' => [
                'label' => 'NIP',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong',
                ]
            ],
            'nama_guru' => [
                'label' => 'Nama Guru',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong',
                ]
            ],
            'password' => [
                'label' => 'Password',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong',
                ]
            ],
            'foto_guru' => [
                'label' => 'Foto Guru',
                'rules' => 'uploaded[foto_guru] |max_size[foto_guru, 1024]',
                'errors' => [
                    'uploaded' => '{field} Tidak Boleh Kosong',
                    'max_size'  => 'Ukuran {field} Max Boleh 1024 KB !',
                ]
            ],
                    
        ])){
            $foto_guru = $this->request->getFile('foto_guru');
            $nama_file = $foto_guru->getRandomName();
            $data=[
                'kode_guru'     =>$this->request->getPost('kode_guru'),
                'nip'           =>$this->request->getPost('nip'),
                'nama_guru'     =>$this->request->getPost('nama_guru'),
                'password'      =>$this->request->getPost('password'),
                'foto_guru'     => $nama_file,
            ];
            $foto_guru->move('public/fotoguru', $nama_file);
            $this->ModelGuru->InsertData($data);
            session()->setFlashdata('insert', 'Data Berhasil Ditambahkan');
            return redirect()->to('Guru');
            //jika valid
        }else{
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to('Guru/Input')->withInput();
        }
    }

    public function Edit($id_guru)
    {
        $data = [
            'judul'     => 'Master Data',
            'subjudul'  => 'Edit Data Guru',
            'menu'      => 'master-data',
            'submenu'   => 'guru',
            'page'      => 'admin/guru/v_edit',
            'guru'      => $this->ModelGuru->DetailData($id_guru),
        ];
        return view('v_template_admin', $data);
    }

    public function UpdateData($id_guru)
    {
        if ($this->validate(
            [
            
            'nip' => [
                'label' => 'NIP',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong',
                ]
            ],
            'nama_guru' => [
                'label' => 'Nama Guru',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong',
                ]
            ],
            'password' => [
                'label' => 'Password',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong',
                ]
            ],
        'foto_guru' => [
                'label' => 'Foto Guru',
                'rules' => 'max_size[foto_guru, 1024]',
                'errors' => [
                    'max_size'  => 'Ukuran {field} Max Boleh 1024 KB !',
                ]
            ],
                    
        ])){
             //mengambil file foto dari input
             $foto = $this->request->getFile('foto_guru');

             if ($foto->getError() == 4) {
                //jika foto tidak diganti
                 $data= [
                    'id_guru'   => $id_guru,
                    'kode_guru'     =>$this->request->getPost('kode_guru'),
                    'nip'           =>$this->request->getPost('nip'),
                    'nama_guru'     =>$this->request->getPost('nama_guru'),
                    'password'      =>$this->request->getPost('password'),
                 ];
                 $this->ModelGuru->UpdateData($data);
             }else{
                 //menghapus foto lama
                 $guru = $this->ModelGuru->DetailData($id_guru);
                 if ($guru['foto_guru'] != "") {
                     unlink('fotoguru/'. $guru['foto_guru']);
                 }
                  //me-rename file foto
                 $nama_file = $foto->getRandomname();
                 //jika valid
                 $data= [
                     'id_guru'   => $id_guru,
                     'kode_guru'     =>$this->request->getPost('kode_guru'),
                     'nip'           =>$this->request->getPost('nip'),
                     'nama_guru'     =>$this->request->getPost('nama_guru'),
                     'password'      =>$this->request->getPost('password'),
                     'foto_guru' => $nama_file,
                 ];
                 //memindahkan file foto dari form input ke folder foto directory
                 $foto->move('public/fotoguru' , $nama_file); 
                 $this->ModelGuru->UpdateData($data);
                 }
            
             session()->setFlashdata('update', 'Data Berhasil Diupdate');
             return redirect()->to('Guru');
 
         }else {
             //jika tidak valid
             session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
             return redirect()->to('Guru/UpdateData/'.$id_guru)->withInput();
         }
    }

    public function DeleteData($id_guru)
    {
        $guru = $this->ModelGuru->DetailData($id_guru);
        if ($guru['foto_guru'] != "") {
            unlink('fotoguru/'. $guru['foto_guru']);
        }
        $data=[
            'id_guru' => $id_guru,
        ];
        $this->ModelGuru->DeleteData($data);
        session()->setFlashdata('delete', 'Data Berhasil Dihapus');
        return redirect()->to('Guru');
        //jika valid
    }
}
