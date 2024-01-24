<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelSekolah; 
use App\Models\ModelAuth;

class Auth extends BaseController
{

    protected $ModelSekolah;
    protected $ModelAuth;

    public function __construct() 
    {
        $this->ModelSekolah = new ModelSekolah();
        $this->ModelAuth = new ModelAuth();
    }
    public function index()
    {
        $data = [
            'judul' => 'Login',
            'subjudul' => '',
            'web' => $this->ModelSekolah->DetailData(),
        ];
        return view('v_login', $data);
    }

    public function CekLogin()
    {

        if ($this->validate([
            'username' => [
                'label' => 'Username',
                'rules' => 'required',
                'errors'=> [
                    'required' => '{field} Tidak Boleh Kosong!!'
                ]
                ],
                'level' => [
                    'label' => 'Level',
                    'rules' => 'required',
                    'errors'=> [
                        'required' => '{field} Tidak Boleh Kosong!!'
                ]
                ],
                'password' => [
                    'label' => 'Password',
                    'rules' => 'required',
                    'errors'=> [
                        'required' => '{field} Tidak Boleh Kosong!!'
                ]
                ],
        ])) {
            //jika valid
            $username = $this->request->getPost('username');
            $level = $this->request->getPost('level');
            $password = $this->request->getPost('password');
            if ($level == 1) {
                $cek_user = $this->ModelAuth->LoginUser($username, $password);
                if ($cek_user) {
                    //jika data cocok
                    session()->set('id_user', $cek_user['id_user']);
                    session()->set('level', $level);
                    session()->set('nama_user', $cek_user['nama_user']);
                    session()->set('foto', $cek_user['foto']);
                    //login
                    return redirect()->to('DashboardAdmin');
                }else {
                    //jika data tidak cocok
                    session()->setFlashdata('pesan', 'Username Atau Password Salah');
                    return redirect()->to('Auth');
                }
            
            }elseif ($level == 2) {
                //login guru
                $cek_guru = $this->ModelAuth->LoginGuru($username, $password);
                if ($cek_guru) {
                    //jika data cocok
                    session()->set('username', $cek_guru['nip']);
                    session()->set('nama_user', $cek_guru['nama_guru']);
                    session()->set('foto', $cek_guru['foto_guru']);
                    session()->set('level', $level);
                    //login
                    return redirect()->to('DashboardGuru');
                }else {
                    //jika data tidak cocok
                    session()->setFlashdata('pesan', 'Username Atau Password Salah');
                    return redirect()->to('Auth');
                }

            }elseif ($level == 3) {
                //login siswa
                $cek_siswa = $this->ModelAuth->LoginSiswa($username, $password);
                if ($cek_siswa) {
                    //jika data cocok
                    session()->set('username', $cek_siswa['NIS']);
                    session()->set('nama_user', $cek_siswa['nama_siswa']);
                    session()->set('foto', $cek_siswa['foto_siswa']);
                    session()->set('level', $level);
                    //login
                    return redirect()->to('DashboardSiswa');
                }else {
                    //jika data tidak cocok
                    session()->setFlashdata('pesan', 'Username Atau Password Salah');
                    return redirect()->to('Auth');
                }
            }
        }else {
            //jika tidak valid
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('Auth'));
        }
    }
    public function Logout()
    {
        session()->destroy();
        return redirect()->to('Auth');
    }
}
