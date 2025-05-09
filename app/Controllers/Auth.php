<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelAuth;

class Auth extends BaseController
{
    public function __construct()
    {
        $this->ModelAuth = new ModelAuth;
    }

    public function LoginAdmin()
    {
        return view('v_login_admin'); // untuk admin
    }

    public function LoginUser()
    {
        return view('v_login_user'); // untuk user
    }

    // public function Login()
    // {
    //     return view('v_login'); // untuk user
    // }

    public function CekLoginAdmin()
    {
        return $this->prosesLogin('admin');
    }

    public function CekLoginUser()
    {
        return $this->prosesLogin('user');
    }

    private function prosesLogin($expectedRole)
    {
        if ($this->validate([
            'email' => 'required',
            'password' => 'required',
        ])) {
            $email = $this->request->getPost('email');
            $password = $this->request->getPost('password');

            $user = $this->ModelAuth->Login($email);

            if ($user && password_verify($password, $user['password'])) {
                if ($user['role'] != $expectedRole) {
                    session()->setFlashdata('error', 'Harap gunakan akun ' . $expectedRole . ' yang terdaftar.');
                    return redirect()->to('Auth/Login' . ucfirst($expectedRole));
                }

                session()->set([
                    'id_user' => $user['id_user'],
                    'nama_user' => $user['nama_user'],
                    'email' => $user['email'],
                    'foto' => $user['foto'],
                    'role' => $user['role'],
                    'login' => true,
                ]);

                return redirect()->to($expectedRole == 'admin' ? 'Admin' : 'Home');
            } else {
                session()->setFlashdata('error', 'Email atau Password salah.');
                return redirect()->to('Auth/Login' . ucfirst($expectedRole));
            }
        }
    }

    public function LogOutAdmin()
    {
        session()->destroy();
        session()->setFlashdata('logout', 'Anda Berhasil Keluar');
        return redirect()->to('Auth/LoginAdmin');
    }

    public function LogOutUser()
    {
        session()->destroy();
        session()->setFlashdata('logout', 'Anda Berhasil Keluar');
        return redirect()->to('Auth/LoginUser');
    }
}
