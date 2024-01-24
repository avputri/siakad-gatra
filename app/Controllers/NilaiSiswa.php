<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelJurusan;
use App\Models\ModelRombel;
use App\Models\ModelJadwalPelajaran;
use App\Models\ModelNilai;
use App\Models\ModelTa;
use App\Models\ModelSiswa;

class NilaiSiswa extends BaseController
{
    protected $ModelJurusan;
    protected $ModelRombel;
    protected $ModelJadwalPelajaran;
    protected $ModelNilai;
    protected $ModelTa;
    protected $ModelSiswa;

    protected $dompdf;

    public function __construct()
    {
        $this->ModelJurusan = new ModelJurusan;
        $this->ModelRombel = new ModelRombel;
        $this->ModelJadwalPelajaran = new ModelJadwalPelajaran;
        $this->ModelNilai = new ModelNilai;
        $this->ModelTa = new ModelTa;
        $this->ModelSiswa = new ModelSiswa;

        $this->dompdf = new \Dompdf\Dompdf([
            'isRemoteEnabled' => TRUE,
        ]);
    }
    public function index()
    {
        $data = [
            'judul'     => 'Nilai Siswa',
            'subjudul'  => 'Rombel Siswa',
            'menu'      => 'nilaisiswa',
            'submenu'   => 'nilaisiswa',
            'page'      => 'admin/nilaisiswa/v_index',
            'jurusan'   => $this->ModelJurusan->AllData(),
            'rombel'    => $this->ModelRombel->AllData(),
        ];
        return view('v_template_admin', $data);
    }

    public function DetailRombel($id_rombel)
    {

        $data = [
            'judul'     => 'Jadwal Pelajaran',
            'subjudul'  => 'Jadwal Pelajaran Berdasarkan Rombel',
            'menu'      => 'nilaisiswa',
            'submenu'   => 'jadwal',
            'page'      => 'admin/nilaisiswa/v_detailrombel',
            'jadwal'    => $this->ModelNilai->DetailJadwalByRombel($id_rombel),

        ];

        return view('v_template_admin', $data);
    }

    public function DataNilai($id_jadwal)
    {
        $jadwal = $this->ModelNilai->DetailJadwal($id_jadwal);

        if (empty($jadwal)) {
            session()->setFlashdata('gagal', 'Data Nilai Tidak Ditemukan!');
            return redirect()->to(base_url('NilaiSiswa'));
        }

        $ta = $this->ModelTa->TaAktif();
        $data = [
            'judul' => 'Penilaian',
            'subjudul' => 'Nilai Siswa',
            'menu' => 'penilaian',
            'submenu' => 'nilaisiswa',
            'page' => 'admin/nilaisiswa/v_datanilai',
            'ta_aktif' => $ta,
            'jadwal' => $jadwal,
            'siswa' => $this->ModelSiswa->SiswaByRombel($jadwal['id_rombel']),
            'nilai' => $this->ModelSiswa
        ];

        return view('v_template_admin', $data);
    }


    public function PrintNilai($id_jadwal)
    {
        $jadwal = $this->ModelNilai->DetailJadwal($id_jadwal);

        
        if (empty($jadwal)) {
            session()->setFlashdata('gagal', 'Data Nilai Tidak Ditemukan!');
            return redirect()->to(base_url('NilaiSiswa'));
        }

        $ta = $this->ModelTa->TaAktif();
        $data = [
            'title' => 'Nilai Siswa ' . $jadwal['nama_rombel'],
            'page' => 'print/v_nilai_siswa',
            'ta_aktif' => $ta,
            'jadwal' => $jadwal,
            'siswa' => $this->ModelSiswa->SiswaNilai($jadwal['id_rombel']),
        ];

        $html = view('print/v_nilai_siswa', $data);
        $this->dompdf->loadHtml($html);

        // Setting ukuran dan orientasi kertas
        $this->dompdf->setPaper('A4', 'potrait');

        // Rendering dari HTML ke PDF
        $this->dompdf->render();

        // Get total pages
        $totalPages = $this->dompdf->getCanvas()->get_page_count();

        // Loop through each page
        for ($pageNumber = 1; $pageNumber <= $totalPages; $pageNumber++) {
            // Add page number
            $this->dompdf->getCanvas()->page_script(function ($pageNumber, $pageCount, $canvas) {
                $text = $pageNumber . ' / ' . $pageCount;
                $canvas->text(285, 799, $text, null, 10, array(0, 0, 0));
            });
        }
        // Melakukan output file PDF
        $this->dompdf->stream(str_replace(' ', '_', $data['title']) . '.pdf', ['Attachment' => 0]);

        exit(0);
    }

    public function SimpanNilai($id_jadwal)
    {
        if ($this->request->getMethod() === 'post') {
            // Ambil data nilai dari input form
            $nilaiPost = $this->request->getPost('nilai');
            $siswaPost = $this->request->getPost('siswa');
            $taPost = $this->request->getPost('ta');
            $rombelPost = $this->request->getPost('rombel');
            $jadwalPost = $this->request->getPost('jadwal');

            // Iterasi dan simpan nilai untuk setiap siswa
            foreach ($nilaiPost as $id_nilai => $nilai) {
                $data = [
                    'id_siswa' => $siswaPost[$id_nilai],
                    'id_ta'    => $taPost,
                    'id_rombel' => $rombelPost,
                    'id_jadwal' => $jadwalPost,
                    'nilai'    => $nilai,
                ];

                // Ambil nilai yang baru disimpan
                $nilaiBaru = $this->ModelNilai->AmbilNilaiSiswa($taPost, $rombelPost, $jadwalPost, $siswaPost[$id_nilai]);
                if (empty($nilaiBaru)) {
                    // Jika nilai belum ada, maka simpan nilai baru
                    $this->ModelNilai->SimpanNilaiBaru($data);
                } else {
                    // Jika nilai sudah ada, maka update nilai
                    $this->ModelNilai->UpdateNilai($id_nilai, $data);
                }
            }

            session()->setFlashdata('update', 'Nilai Berhasil Diupdate!');
            return redirect()->to('NilaiSiswa/DataNilai/' . $id_jadwal);
        } else {
            return redirect()->to(base_url('NilaiSiswa/DataNilai/' . $id_jadwal));
        }
    }
}
