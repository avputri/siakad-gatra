<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelTa;
use App\Models\ModelJurusan;
use App\Models\ModelJadwalPelajaran;
use App\Models\ModelMapel;
use App\Models\ModelGuru;
use App\Models\ModelRombel;

class JadwalPelajaran extends BaseController
{

    protected $ModelTa;
    protected $ModelJurusan;
    protected $ModelJadwalPelajaran;
    protected $ModelMapel;
    protected $ModelGuru;
    protected $ModelRombel;

    public function __construct() 
    {
        $this->ModelTa = new ModelTa();
        $this->ModelJurusan = new ModelJurusan();
        $this->ModelJadwalPelajaran = new ModelJadwalPelajaran();
        $this->ModelMapel = new ModelMapel();
        $this->ModelGuru = new ModelGuru();
        $this->ModelRombel = new ModelRombel();
    }

    public function index()
    {
        $ta = $this->ModelTa->TaAktif();
        $data = [
            'judul'     => 'Jadwal Pelajaran',
            'subjudul'  => 'Jadwal Pelajaran',
            'menu'      => 'jadwalpelajaran',
            'submenu'   => 'jadwalpelajaran',
            'page'      => 'admin/jadwalpelajaran/v_index',
            'ta_aktif'  => $this->ModelTa->TaAktif(),
            'jurusan'   => $this->ModelJurusan->AllData(),
            'rombel'   => $this->ModelRombel->AllData(),
        ];
        return view('v_template_admin', $data);
    }

    public function detailJadwal($id_jurusan)
    {
        $data = [
        'judul'     => 'Jadwal Pelajaran',
        'subjudul'  => 'Jadwal Pelajaran',
        'menu'      => 'jadwalpelajaran',
        'submenu'   => 'jadwalpelajaran',
        'page'      => 'admin/jadwalpelajaran/v_detail',
        'jurusan'   => $this->ModelJurusan->DetailData($id_jurusan),
        'jadwal'   => $this->ModelJadwalPelajaran->AllData($id_jurusan),
        'mapel'   => $this->ModelJadwalPelajaran->mapel($id_jurusan),
        'guru'   => $this->ModelGuru->AllData(),
        'rombel'   => $this->ModelJadwalPelajaran->rombel($id_jurusan),
        'ta_aktif'  => $this->ModelTa->TaAktif(),
        ];
        return view('v_template_admin', $data);
    }

    public function InsertData($id_jurusan)
    {
        if ($this->validate([
            'id_mapel' => [
                'label' => 'Mata Pelajaran',
                'rules' => 'required|is_unique[tbl_mapel.kode_mapel]',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong', 
                    'is_unique' => '{field} Ini Sudah Ada !'
                ]
            ],
            'id_guru' => [
                'label' => 'Guru Mapel',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong',
                ]
            ],
            'id_rombel' => [
                'label' => 'Rombongan Belajar',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong',
                ]
            ],
            'hari' => [
                'label' => 'Hari',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong',
                ]
            ],
            'jam_ke' => [
                'label' => 'Waktu',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong',
                ]
            ],    
        ])){
            //jika valid
            $ta = $this->ModelTa->TaAktif();
            $data = [
                'id_jurusan'    =>$id_jurusan,
                'id_ta'         =>$ta['id_ta'],
                'id_rombel'     =>$this->request->getPost('id_rombel'),
                'id_mapel'      =>$this->request->getPost('id_mapel'),
                'id_guru'       =>$this->request->getPost('id_guru'),
                'hari'          =>$this->request->getPost('hari'),
                'jam_ke'        =>$this->request->getPost('jam_ke'),
                ];
            $this->ModelJadwalPelajaran->InsertData($data);
            session()->setFlashdata('insert', 'Data Berhasil Ditambahkan !!');
            return redirect()->to('JadwalPelajaran/detailjadwal/' . $id_jurusan);
        }else {
            //jika tidak valid
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to('JadwalPelajaran/detailjadwal/' . $id_jurusan);
        }
    }

    public function delete($id_jadwal, $id_jurusan)
    {
        $data=[
            'id_jadwal'  => $id_jadwal,
        ];
        $this->ModelJadwalPelajaran->DeleteData($data);
        session()->setFlashdata('delete', 'Data Berhasil Dihapus');
        return redirect()->to('JadwalPelajaran/detailjadwal/' . $id_jurusan);
        //jika valid
    }
}