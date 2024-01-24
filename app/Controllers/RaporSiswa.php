<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class RaporSiswa extends BaseController
{

    protected $ModelMapel;
    protected $ModelJurusan;
    protected $ModelGuru;
    protected $ModelNilai;
    protected $ModelRombel;
    protected $ModelTa;

    protected $dompdf;

    public function __construct()
    {
        $this->ModelMapel = new \App\Models\ModelMapel();
        $this->ModelJurusan = new \App\Models\ModelJurusan();
        $this->ModelGuru = new \App\Models\ModelGuru();
        $this->ModelNilai = new \App\Models\ModelNilai();
        $this->ModelRombel = new \App\Models\ModelRombel();
        $this->ModelTa = new \App\Models\ModelTa();

        $this->dompdf = new \Dompdf\Dompdf([
            'isRemoteEnabled' => TRUE,
            'isHtml5ParserEnabled' => true,
        ]);
    }

    public function index()
    {
        $data = [
            'judul'     => 'Rapor Siswa',
            'subjudul'  => 'Rapor Siswa',
            'menu'      => 'rapor',
            'submenu'   => 'rapor',
            'page'      => 'admin/rapor/v_index',
            'jurusan'   => $this->ModelJurusan->AllData(),
            'rombel'    => $this->ModelRombel->AllData(),
        ];
        return view('v_template_admin', $data);
    }

    public function cetak($id_rombel = null)
    {
        if (!$id_rombel) {
            return redirect()->to('/RaporSiswa');
        }

        $rombel = $this->ModelRombel->detail($id_rombel);
        $siswa = $this->ModelRombel->siswa($id_rombel);
        $mapel = $this->ModelMapel->DetailJadwalByRombel($id_rombel);
        
        // append to object siswa
        foreach ($siswa as $key => $value) {
            $siswa[$key]['mapel'] = $mapel;
        }

        // append nilai to object siswa['mapel']
        foreach ($siswa as $key => $value) {
            foreach ($siswa[$key]['mapel'] as $k => $v) {
                $siswa[$key]['mapel'][$k]['nilai'] = $this->ModelNilai->AmbilNilaiSiswa($rombel['id_ta'], $rombel['id_rombel'], $siswa[$key]['mapel'][$k]['id_jadwal'], $siswa[$key]['id_siswa']);
            }
        }

        $data = [
            'judul'     => 'Cetak Rapor Siswa',
            'subjudul'  => 'Rapor Siswa',
            'menu'      => 'rapor',
            'submenu'   => 'rapor',
            'page'      => 'print/v_rapor_siswa',
            'siswa'     => $siswa,
            'rombel'    => $rombel,
            'mapel'     => $mapel,
            'ta'        => $this->ModelTa->TaAktif(),
        ];

        $html = view('print/v_rapor_siswa', $data);
        $this->dompdf->loadHtml($html);

        // Setting ukuran dan orientasi kertas
        $this->dompdf->setPaper('A4', 'potrait');

        // Rendering dari HTML ke PDF
        $this->dompdf->render();

        // Get total pages
        $totalPages = $this->dompdf->getCanvas()->get_page_count();

        // Loop through each page
        // for ($pageNumber = 1; $pageNumber <= $totalPages; $pageNumber++) {
        //     // Add page number
        //     $this->dompdf->getCanvas()->page_script(function ($pageNumber, $pageCount, $canvas) {
        //         $text = $pageNumber . ' / ' . $pageCount;
        //         $canvas->text(285, 799, $text, null, 10, array(0, 0, 0));
        //     });
        // }
        
        // Melakukan output file PDF
        $this->dompdf->stream(str_replace('rapor_siswa_kelas_', '', strtolower(str_replace(' ', '_', $data['rombel']['nama_rombel']))) . '.pdf', ['Attachment' => 0]);

        exit(0);
    }

}
