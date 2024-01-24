<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelTa;
use App\Models\ModelDashboardSiswa;
use App\Models\ModelNilai;

class DashboardSiswa extends BaseController
{

    protected $ModelTa;
    protected $ModelDashboardSiswa;
    protected $ModelNilai;

    public function __construct()
    {
        $this->ModelTa = new ModelTa;
        $this->ModelDashboardSiswa = new ModelDashboardSiswa;
        $this->ModelNilai = new ModelNilai;
    }

    public function index()
    {
        $data = [
            'judul' => 'Siswa',
            'subjudul' => 'Dashboard Siswa',
            'menu' => 'dashboard',
            'submenu' => 'dashboardsiswa',
            'page' => 'v_dashboard_siswa',
            'siswa' => $this->ModelDashboardSiswa->DataSiswa(),
        ];
        return view('v_template_admin', $data);
    }

    public function Jadwal()
    {
        $siswa = $this->ModelDashboardSiswa->DataSiswa();
        $data = [
            'judul'         => 'Akademik',
            'subjudul'      => 'Jadwal Pelajaran',
            'menu'          => 'akademik',
            'submenu'       => 'jadwal',
            'page'          => 'siswa/v_jadwal',
            'ta_aktif'      => $this->ModelTa->TaAktif(),
            'siswa'         => $this->ModelDashboardSiswa->DataSiswa(),
            'jadwal_siswa'   => $this->ModelDashboardSiswa->JadwalSiswa($siswa['id_rombel']),

        ];
        return view('v_template_admin', $data);
    }

    public function Nilai()
    {
        $siswa = $this->ModelDashboardSiswa->DataSiswa();
        $ta = $this->ModelTa->TaAktif();
        $nilai = $this->ModelNilai->NilaiBySiswa($ta['id_ta'], $siswa['id_siswa']);

        $data = [
            'judul'         => 'Akademik',
            'subjudul'      => 'Nilai',
            'menu'          => 'akademik',
            'submenu'       => 'nilai',
            'page'          => 'siswa/v_lihatnilai',
            'ta_aktif'      => $this->ModelTa->TaAktif(),
            
            'siswa'         => $siswa,
            'nilai'         => $nilai,
            'ta'            => $ta,
        ];
        return view('v_template_admin', $data);
    }
}
