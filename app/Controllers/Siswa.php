<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelSiswa;
use App\Models\ModelJurusan;
use App\Models\ModelKelas;

class Siswa extends BaseController
{

    protected $ModelSiswa;
    protected $ModelJurusan;
    protected $ModelKelas;

    public function __construct() 
    {
        $this->ModelSiswa = new ModelSiswa();
        $this->ModelJurusan = new ModelJurusan();
        $this->ModelKelas = new ModelKelas();
    }

    public function index()
    {
        $data = [
            'judul'     => 'Master Data',
            'subjudul'  => 'Siswa',
            'menu'      => 'master-data',
            'submenu'   => 'siswa',
            'page'      => 'admin/siswa/v_index',
            'siswa'   => $this->ModelSiswa->AllData(),
        ];
        return view('v_template_admin', $data);
    }

    public function Input()
    {
        $data = [
            'judul'     => 'Master Data',
            'subjudul'  => 'Input Siswa',
            'menu'      => 'master-data',
            'submenu'   => 'siswa',
            'page'      => 'admin/siswa/v_input',
            'jurusan'   => $this->ModelJurusan->AllData(),
            'kelas'     => $this->ModelKelas->AllData(), 
        ];
        return view('v_template_admin', $data);
    }
    
    public function InsertData()
    {
        if ($this->validate([
            'NIS' => [
                'label' => 'NIS',
                'rules' => 'required|is_unique[tbl_siswa.NIS]',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong !',
                    'is_unique'=> '{field} Sudah Ada!',
                ]
            ],
            'nama_siswa' => [
                'label' => 'Nama Siswa',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong',
                ]
            ],
            'id_jurusan' => [
                'label' => 'Jurusan',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong',
                ]
            ],
            'id_kelas' => [
                'label' => 'Kelas',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong',
                ]
            ],
            'tahun_angkatan' => [
                'label' => 'Tahun Angkatan',
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
            'foto_siswa' => [
                'label' => 'Foto Siswa',
                'rules' => 'uploaded[foto_siswa] |max_size[foto_siswa, 1024]',
                'errors' => [
                    'uploaded' => '{field} Tidak Boleh Kosong',
                    'max_size'  => 'Ukuran {field} Max Boleh 1024 KB !',
                ]
            ],
                    
        ])){
            $foto_siswa = $this->request->getFile('foto_siswa');
            $nama_file = $foto_siswa->getRandomName();
            $data=[
                'NIS'               => $this->request->getPost('NIS'),
                'nama_siswa'        => $this->request->getPost('nama_siswa'),
                'id_jurusan'        => $this->request->getPost('id_jurusan'),
                'id_kelas'          => $this->request->getPost('id_kelas'),
                'tahun_angkatan'    => $this->request->getPost('tahun_angkatan'),
                'password'          => $this->request->getPost('password'),
                'status'            => 1,
                'foto_siswa'        => $nama_file,
            ];
            $foto_siswa->move('public/fotosiswa', $nama_file);
            $this->ModelSiswa->InsertData($data);
            session()->setFlashdata('insert', 'Data Berhasil Ditambahkan');
            return redirect()->to('Siswa');
            //jika valid
        }else{
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to('Siswa/Input')->withInput();
        }
    }

    public function Edit($id_siswa)
    {
        $data = [
            'judul'     => 'Master Data',
            'subjudul'  => 'Edit Data Siswa',
            'menu'      => 'master-data',
            'submenu'   => 'siswa',
            'page'      => 'admin/siswa/v_edit',
            'siswa'      => $this->ModelSiswa->DetailData($id_siswa),
            'jurusan'   => $this->ModelJurusan->AllData(),
            'kelas'     => $this->ModelKelas->AllData(), 
        ];
        return view('v_template_admin', $data);
    }
    public function UpdateData($id_siswa)
    {
        if ($this->validate([
            'NIS' => [
                'label' => 'NIS',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong !',
                ]
            ],
            'nama_siswa' => [
                'label' => 'Nama Siswa',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong',
                ]
            ],
            'id_jurusan' => [
                'label' => 'Jurusan',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong',
                ]
            ],
            'id_kelas' => [
                'label' => 'Kelas',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong',
                ]
            ],
            'tahun_angkatan' => [
                'label' => 'Tahun Angkatan',
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
            'foto_siswa' => [
                'label' => 'Foto Siswa',
                'rules' => 'max_size[foto_siswa, 1024]',
                'errors' => [
                    'max_size'  => 'Ukuran {field} Max Boleh 1024 KB !',
                ]
            ],
                    
        ])){
            //mengambil file foto dari input
            $foto = $this->request->getFile('foto_siswa');

            if ($foto->getError() == 4) {
               //jika foto tidak diganti
                $data= [
                    'id_siswa'          => $id_siswa,
                    'NIS'               => $this->request->getPost('NIS'),
                    'nama_siswa'        => $this->request->getPost('nama_siswa'),
                    'id_jurusan'        => $this->request->getPost('id_jurusan'),
                    'id_kelas'          => $this->request->getPost('id_kelas'),
                    'tahun_angkatan'    => $this->request->getPost('tahun_angkatan'),
                    'password'          => $this->request->getPost('password'),
                    'status'            => 1,
                ];
                $this->ModelSiswa->UpdateData($data);
            }else{
                //menghapus foto lama
                $siswa = $this->ModelSiswa->DetailData($id_siswa);
                if ($siswa['foto_siswa'] != "") {
                    unlink('fotosiswa/'. $siswa['foto_siswa']);
                }
                 //me-rename file foto
                $nama_file = $foto->getRandomname();
                //jika valid
                $data= [
                    'id_siswa'   => $id_siswa,
                    'NIS'               => $this->request->getPost('NIS'),
                    'nama_siswa'        => $this->request->getPost('nama_siswa'),
                    'id_jurusan'        => $this->request->getPost('id_jurusan'),
                    'id_kelas'          => $this->request->getPost('id_kelas'),
                    'tahun_angkatan'    => $this->request->getPost('tahun_angkatan'),
                    'password'          => $this->request->getPost('password'),
                    'status'            => 1,
                    'foto_siswa' => $nama_file,
                ];
                //memindahkan file foto dari form input ke folder foto directory
                $foto->move('public/fotosiswa' , $nama_file); 
                $this->ModelSiswa->UpdateData($data);
                }
                session()->setFlashdata('update', 'Data Berhasil Diupdate');
                return redirect()->to('Siswa');
        }else{
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to('Siswa')->withInput();
        }
    }
    
    public function DeleteData($id_siswa)
    {
        $siswa = $this->ModelSiswa->DetailData($id_siswa);
                if ($siswa['foto_siswa'] != "") {
                    unlink('fotosiswa/'. $siswa['foto_siswa']);
        }
        $data=[
            'id_siswa' => $id_siswa,
        ];
        $this->ModelSiswa->DeleteData($data);
        session()->setFlashdata('delete', 'Data Berhasil Dihapus');
        return redirect()->to('Siswa');
        //jika valid
    }
}
