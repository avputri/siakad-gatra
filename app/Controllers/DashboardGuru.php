<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelDashboardGuru;
use App\Models\ModelTa;
use App\Models\ModelNilai;
use App\Models\ModelSiswa;

class DashboardGuru extends BaseController
{

    protected $ModelDashboardGuru;
    protected $ModelTa;
    protected $ModelNilai;
    protected $ModelSiswa;

    public function __construct()
    {
        $this->ModelDashboardGuru = new ModelDashboardGuru();
        $this->ModelTa = new ModelTa();
        $this->ModelNilai = new ModelNilai();
        $this->ModelSiswa = new ModelSiswa();
    }
    
    public function index()
    {
        $data = [
            'judul' => 'Guru',
            'subjudul' => 'Dashboard Guru',
            'menu' => 'dashboard',
            'submenu' => 'dashboard',
            'page' => 'v_dashboard_guru',
            'guru'  => $this->ModelDashboardGuru->DataGuru(),
            'ta_aktif'  => $this->ModelTa->TaAktif(),

        ];
        return view('v_template_admin', $data);
    }

    public function JadwalMengajar()
    {
        $guru = $this->ModelDashboardGuru->DataGuru();
        $data = [
            'judul' => 'Akademik',
            'subjudul' => 'Jadwal Mengajar',
            'menu' => 'akademik',
            'submenu' => 'jadwalmengajar',
            'page' => 'guru/v_jadwal',
            'jadwal' => $this->ModelDashboardGuru->JadwalGuru($guru['id_guru']),
        ];
        return view('v_template_admin', $data);
    }

    public function NilaiSiswa()
    {
        $ta = $this->ModelTa->TaAktif();
        $guru = $this->ModelDashboardGuru->DataGuru();

        $data = [
            'judul' => 'Akademik',
            'subjudul' => 'Mata Pelajaran',
            'menu' => 'akademik',
            'submenu' => 'nilaisiswa',
            'page' => 'guru/nilai/v_nilai_siswa',
            'nilai' => $this->ModelDashboardGuru->JadwalGuru($guru['id_guru'], $ta['id_ta']),
            'ta_aktif' => $ta,
        ];
        return view('v_template_admin', $data);
    }


    public function DataNilai($id_jadwal)
    {
        $jadwal = $this->ModelNilai->DetailJadwal($id_jadwal);

        if (empty($jadwal)) {
            session()->setFlashdata('gagal', 'Data Nilai Tidak Ditemukan!');
            return redirect()->to(base_url('DashboardGuru/DataNilai/'. $id_jadwal));
        }

        $ta = $this->ModelTa->TaAktif();
        $data = [
            'judul' => 'Akademik',
            'subjudul' => 'Nilai Siswa',
            'menu' => 'akademik',
            'submenu' => 'nilaisiswa',
            'page' => 'guru/nilai/v_data_nilai',
            'ta_aktif' => $ta,
            'jadwal' => $jadwal,
            'siswa' => $this->ModelSiswa->SiswaByRombel($jadwal['id_rombel']),
            'nilai' => $this->ModelSiswa
        ];
        return view('v_template_admin', $data);
    }


    public function SimpanNilai($id_jadwal)
    {
        if ($this->request->getMethod() === 'post') {
            // Ambil data nilai dari input form
            $nilaiPost = $this->request->getPost('nilai');

            // Iterasi dan simpan nilai untuk setiap siswa
            foreach ($nilaiPost as $id_nilai => $nilai) {
                $data = [
                    'id_nilai' => $id_nilai,
                    'nilai'    => $nilai,
                ];
                $this->ModelDashboardGuru->SimpanNilai($data);

                // Ambil nilai yang baru disimpan
                $nilaiBaru = $this->ModelDashboardGuru->AmbilNilaiSiswa($id_nilai);

            }

            session()->setFlashdata('update', 'Nilai Berhasil Diupdate!');
            return redirect()->to('DashboardGuru/DataNilai/' . $id_jadwal);
        }
    }
}
