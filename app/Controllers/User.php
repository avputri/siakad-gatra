<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelUser;

class User extends BaseController
{
    protected $ModelUser;

    public function __construct() 
    {
        $this->ModelUser = new ModelUser();
    }

    public function index()
    {
        $data = [
            'judul'     => 'Setting',
            'subjudul'  => 'User',
            'menu'      => 'setting',
            'submenu'   => 'user',
            'page'      => 'admin/v_user',
            'user'   => $this->ModelUser->AllData(),
        ];
        return view('v_template_admin', $data);
    }

    public function InsertData()
    {
        if ($this->validate([
            'nama_user' => [
                'label' => 'Nama User',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong', 
                ]
            ],
            'username' => [
                'label' => 'Username',
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
            'foto' => [
                'label' => 'Foto',
                'rules' => 'uploaded[foto] |max_size[foto, 1024]',
                'errors' => [
                    'uploaded' => '{field} Tidak Boleh Kosong',
                    'max_size'  => 'Ukuran {field} Max Boleh 1024 KB !',
                ]
            ],
                    
        ])) {
            //mengambil file foto dari input
            $foto = $this->request->getFile('foto');
            //me-rename file foto
            $nama_file = $foto->getRandomname();
            //jika valid
            $data= [
                'nama_user' => $this->request->getPost('nama_user'),
                'username' => $this->request->getPost('username'),
                'password' => $this->request->getPost('password'),
                'foto' => $nama_file,
            ];
            //memindahkan file foto dari form input ke folder foto directory
            $foto->move('public/foto' , $nama_file); 
            $this->ModelUser->InsertData($data);
            session()->setFlashdata('insert', 'Data Berhasil Ditambahkan');
            return redirect()->to('User');

        }else {
            //jika tidak valid
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to('User')->withInput();
        }
    }

    public function UpdateData($id_user)
    {
        if ($this->validate([
            'nama_user' => [
                'label' => 'Nama User',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong', 
                ]
            ],
            'username' => [
                'label' => 'Username',
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
            'foto' => [
                'label' => 'Foto',
                'rules' => 'max_size[foto, 1024]',
                'errors' => [
                    'max_size'  => 'Ukuran {field} Max Boleh 1024 KB !',
                ]
            ],
                    
        ])) {
            //mengambil file foto dari input
            $foto = $this->request->getFile('foto');

            if ($foto->getError() == 4) {
                $data= [
                    'id_user'   => $id_user,
                    'nama_user' => $this->request->getPost('nama_user'),
                    'username' => $this->request->getPost('username'),
                    'password' => $this->request->getPost('password'),
                ];
                $this->ModelUser->UpdateData($data);
            }else{
                //menghapus foto lama
                $user = $this->ModelUser->DetailData($id_user);
                if ($user['foto'] != "") {
                    unlink('foto/'. $user['foto']);
                }
                 //me-rename file foto
                $nama_file = $foto->getRandomname();
                //jika valid
                $data= [
                    'id_user'   => $id_user,
                    'nama_user' => $this->request->getPost('nama_user'),
                    'username' => $this->request->getPost('username'),
                    'password' => $this->request->getPost('password'),
                    'foto' => $nama_file,
                ];
                //memindahkan file foto dari form input ke folder foto directory
                $foto->move('public/foto' , $nama_file); 
                $this->ModelUser->UpdateData($data);
                }
           
            session()->setFlashdata('update', 'Data Berhasil Diupdate');
            return redirect()->to('User');

        }else {
            //jika tidak valid
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to('User')->withInput();
        }
    }

    public function DeleteData($id_user)
    {
        //menghapus foto lama
        $user = $this->ModelUser->DetailData($id_user);
        if ($user['foto'] != "") {
            unlink('foto/'. $user['foto']);
        }

        $data = [
            'id_user' => $id_user,
        ];
        $this->ModelUser->DeleteData($data);
        session()->setFlashdata('delete', 'Data Berhasil Dihapus');
        return redirect()->to('User');
    }

}
