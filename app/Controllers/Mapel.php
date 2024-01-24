<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelMapel;
use App\Models\ModelJurusan;
use App\Models\ModelGuru;


class Mapel extends BaseController
{

    protected $ModelMapel;
    protected $ModelJurusan;
    protected $ModelGuru;

    public function __construct()
    {
        $this->ModelMapel = new ModelMapel();
        $this->ModelJurusan = new ModelJurusan();
        $this->ModelGuru = new ModelGuru();
    }

    public function index()
    {
        $data = [
            'judul'     => 'Master Data',
            'subjudul'  => 'Mata Pelajaran',
            'menu'      => 'master-data',
            'submenu'   => 'mapel',
            'page'      => 'admin/mapel/v_mapel',
            'jurusan'   => $this->ModelJurusan->AllData(),
        ];
        return view('v_template_admin', $data);
    }

    public function detail($id_jurusan)
    {
        $data = [
            'judul'     => 'Mata Pelajaran',
            'subjudul'  => 'Detail',
            'menu'      => 'master-data',
            'submenu'   => 'mapel',
            'page'      => 'admin/mapel/v_detail',
            'jurusan'   => $this->ModelJurusan->DetailData($id_jurusan),
            'mapel'     => $this->ModelMapel->AllDataMapel($id_jurusan),
            'guru'      => $this->ModelGuru->AllData(),
        ];
        return view('v_template_admin', $data);
    }

    public function InsertData($id_jurusan)
    {
        if ($this->validate([
            'kode_mapel' => [
                'label' => 'Kode Mata Pelajaran',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong',
                ]
            ],
            'mapel' => [
                'label' => 'Mata Pelajaran',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong',
                ]
            ],
            'id_guru' => [
                'label' => 'Nama Guru',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong',
                ]
            ],
            'jam_pelajaran' => [
                'label' => 'Jam Pelajaran',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong',
                ]
            ],
            'kategori' => [
                'label' => 'Kategori',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong',
                ]
            ],
            'smt' => [
                'label' => 'Semester',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong',
                ]
            ],
        ])) {
            //jika valid
            $smt = $this->request->getPost('smt');
            $semester = '';

            if ($smt == 1) {
                $semester = 'Ganjil';
            } else {
                $semester == 'Genap';
            }

            $data = [
                'kode_mapel'    => $this->request->getPost('kode_mapel'),
                'mapel'         => $this->request->getPost('mapel'),
                'id_guru'         => $this->request->getPost('id_guru'),
                'jam_pelajaran' => $this->request->getPost('jam_pelajaran'),
                'kategori'      => $this->request->getPost('kategori'),
                'smt'           => $this->request->getPost('smt'),
                'semester'      => $semester,
                'id_jurusan'    => $id_jurusan,
            ];
            $this->ModelMapel->InsertData($data);
            session()->setFlashdata('insert', 'Data Berhasil Ditambahkan !!');
            return redirect()->to('Mapel/Detail/' . $id_jurusan);
        } else {
            //jika tidak valid
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to('Mapel/Detail/' . $id_jurusan);
        }
    }

    public function DeleteData($id_mapel)
    {
        $this->ModelMapel->DeleteData($id_mapel);
        session()->setFlashdata('delete', 'Data Berhasil Dihapus');
        return redirect()->back();
    }
}
