<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelAuth;

use CodeIgniter\HTTP\ResponseInterface;

class Auth extends BaseController
{

    public function __construct()
    {
        $this->ModelAuth = new ModelAuth;
    }

    public function Login()
    {
        $data = [
            'judul' => 'Login',
        ];
        return view('v_login', $data);
    }

    public function CekLogin()
    {
        if ($this->validate([
            'email' => [
                'label' => 'E-Mail',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!'
                ]
            ],
            'password' => [
                'label' => 'Password',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!'
                ]
            ],
        ])) {
            //     //jika login
            //     $email = $this->request->getPost('email');
            //     $password = sha1($this->request->getPost('password'));

            //     $CekLogin = $this->ModelAuth->Login($email, $password);
            //     if ($CekLogin) {
            //         # jika berhasil Login
            //         session()->set('nama_user', $CekLogin['nama_user']);
            //         session()->set('foto', $CekLogin['foto']);
            //         session()->set('login', 1);
            //         return redirect()->to('Admin');
            //     } else {
            //         # jika gagal Login...
            //         session()->setFlashdata('pesan', 'Email Atau Password Salah');
            //         return redirect()->to('Auth/Login');
            //     }
            // } else {
            //     //jika validasi gagal
            //     session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            //     return redirect()->to('Auth/Login')->withInput('validation', \Config\Services::validation());
            // }

            $email = $this->request->getPost('email');
            $password = $this->request->getPost('password');

            // Cek apakah user dengan email tersebut ada
            $CekLogin = $this->ModelAuth->Login($email);

            if ($CekLogin) {
                // Verifikasi password dengan bcrypt
                if (password_verify($password, $CekLogin['password'])) {
                    session()->set('nama_user', $CekLogin['nama_user']);
                    session()->set('foto', $CekLogin['foto']);
                    session()->set('login', 1);
                    return redirect()->to('Admin');
                } else {
                    session()->setFlashdata('pesan', 'Password Salah');
                    return redirect()->to('Auth/Login');
                }
            } else {
                session()->setFlashdata('pesan', 'Email Tidak Ditemukan');
                return redirect()->to('Auth/Login');
            }
        }
    }

    public function LogOut()
    {
        session()->remove('nama_user');
        session()->remove('foto');
        session()->remove('login');
        session()->setFlashdata('logout', 'Anda Berhasil LogOut');
        return redirect()->to('Auth/Login');
    }
}
