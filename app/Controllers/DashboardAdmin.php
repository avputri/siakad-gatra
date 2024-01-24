<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelSekolah;
use App\Models\ModelDashboard;

class DashboardAdmin extends BaseController
{

    protected $ModelSekolah;
    protected $ModelDashboard;

    public function __construct() {
        $this->ModelSekolah = new ModelSekolah;
        $this->ModelDashboard = new ModelDashboard;
    }
    public function index()
    {
        $data = [
            'judul' => 'Admin',
            'subjudul' => 'Dashboard Admin',
            'menu' => 'dashboard',
            'submenu' => 'dashboard',
            'page' => 'v_dashboard_admin',
            'web' => $this->ModelSekolah->DetailData(),
            'jml_rombel' => $this->ModelDashboard->jml_rombel(),
            'jml_jurusan' => $this->ModelDashboard->jml_jurusan(),
            'jml_guru' => $this->ModelDashboard->jml_guru(),
            'jml_siswa' => $this->ModelDashboard->jml_siswa(),
        ];
        return view('v_template_admin', $data);
    }
}
