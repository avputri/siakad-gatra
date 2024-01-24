<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelRombel;
use App\Models\ModelTa;
use App\Models\ModelKelas;
use App\Models\ModelGuru;
use App\Models\ModelJurusan;



class Rombel extends BaseController
{

    protected $ModelRombel;
    protected $ModelTa;
    protected $ModelKelas;
    protected $ModelGuru;
    protected $ModelJurusan;

    public function __construct() 
    {
        $this->ModelRombel = new ModelRombel();
        $this->ModelTa = new ModelTa();
        $this->ModelKelas = new ModelKelas();
        $this->ModelGuru = new ModelGuru();
        $this->ModelJurusan = new ModelJurusan();
    }
    
    public function index()
    {
        $data = [
            'judul'     => 'Rombongan Belajar',
            'subjudul'  => 'Rombongan Belajar',
            'menu'      => 'rombel',
            'submenu'   => 'rombel',
            'page'      => 'admin/rombel/v_rombel',
            'rombel'    => $this->ModelRombel->AllData(),
            'ta_aktif'  => $this->ModelTa->TaAktif(),
            'kelas'     => $this->ModelKelas->AllData(),
            'guru'      => $this->ModelGuru->AllData(),
            'jurusan'   => $this->ModelJurusan->AllData(),
        ];
        return view('v_template_admin', $data);
    }

    public function InsertData()
    {if ($this->validate([
        'nama_rombel' => [
            'label' => 'Nama Rombel',
            'rules' => 'required|is_unique[tbl_mapel.kode_mapel]',
            'errors' => [
                'required' => '{field} Tidak Boleh Kosong', 
                'is_unique' => '{field} Ini Sudah Ada !'
            ]
        ],
        'id_kelas' => [
            'label' => 'Nama Kelas',
            'rules' => 'required',
            'errors' => [
                'required' => '{field} Tidak Boleh Kosong',
            ]
        ],
        'id_jurusan' => [
            'label' => 'Nama Jurusan',
            'rules' => 'required',
            'errors' => [
                'required' => '{field} Tidak Boleh Kosong',
            ]
        ],
        'id_guru' => [
            'label' => 'NamaGuru',
            'rules' => 'required',
            'errors' => [
                'required' => '{field} Tidak Boleh Kosong',
            ]
        ],
    ])){
        $ta = $this->ModelTa->TaAktif();
        $data=[
            'id_kelas'      =>$this->request->getPost('id_kelas'),
            'nama_rombel'   =>$this->request->getPost('nama_rombel'),
            'id_jurusan'       =>$this->request->getPost('id_jurusan'),
            'id_guru'     =>$this->request->getPost('id_guru'),
            'id_ta'         =>$ta['id_ta'],
        ];
        $this->ModelRombel->InsertData($data);
        session()->setFlashdata('insert', 'Data Berhasil Ditambahkan !!');
        return redirect()->to('Rombel');
        //jika valid
        }
    }

    public function DeleteData($id_rombel)
    {
            $data=[
                'id_rombel'  => $id_rombel,
            ];
            $this->ModelRombel->DeleteData($data);
            session()->setFlashdata('delete', 'Data Berhasil Dihapus');
            return redirect()->to('Rombel');
            //jika valid
    }

    public function rincian_rombel($id_rombel)
    {
        $data = [
            'judul'     => 'Rombongan Belajar',
            'subjudul'  => 'Rombongan Belajar',
            'menu'      => 'rombel',
            'submenu'   => 'rombel',
            'page'      => 'admin/rombel/v_rincian_rombel',
            'rombel'    => $this->ModelRombel->detail($id_rombel),
            'siswa'     => $this->ModelRombel->siswa($id_rombel),
            'jml'       => $this->ModelRombel->jml_siswa($id_rombel),
            'siswa_tr'  => $this->ModelRombel->siswa_tanpa_rombel(),
        ];
        return view('v_template_admin', $data);   
    }

    public function add_anggota_rombel($id_siswa, $id_rombel)
    {
        $data=[
            'id_siswa'  => $id_siswa,
            'id_rombel' => $id_rombel,
        ];
        $this->ModelRombel->UpdateSiswa($data);
        session()->setFlashdata('update', 'Siswa Berhasil Ditambah Ke Rombel !');
        return redirect()->to('Rombel/rincian_rombel/' . $id_rombel);
    }

    public function delete_anggota_rombel($id_siswa, $id_rombel)
    {
        $data=[
            'id_siswa'  => $id_siswa,
            'id_rombel' => null,
        ];
        $this->ModelRombel->UpdateSiswa($data);
        session()->setFlashdata('update', 'Siswa Berhasil Dihapus Dari Rombel !');
        return redirect()->to('Rombel/rincian_rombel/' . $id_rombel);
    }
    
}