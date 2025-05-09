<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class RoleFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $role = session()->get('role');
        $uri = strtolower(service('uri')->getSegment(1));

        // Jika belum login
        if (!$role) {
            // Jika akses ke halaman user (frontend), arahkan ke LoginUser
            if (in_array($uri, ['Home', 'HomeKodam', 'HomeKoopsud', 'HomeLantamal'])) {
                return redirect()->to('Auth/LoginUser');
            }

            // Jika akses ke halaman admin, arahkan ke Login
            return redirect()->to('Auth/Login');
        }

        // Jika sudah login, batasi akses berdasarkan role
        if ($role === 'admin') {
            $allowed = ['Admin', 'User', 'Kodam', 'Koopsud', 'Lantamal', 'Kesatuan', 'Wilayah'];
            if (!in_array($uri, $allowed)) {
                return redirect()->to('Admin');
            }
        } elseif ($role === 'user') {
            $allowed = ['Home', 'HomeKodam', 'HomeKoopsud', 'HomeLantamal'];
            if (!in_array($uri, $allowed)) {
                return redirect()->to('Home');
            }
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Tidak perlu aksi after untuk filter ini
    }
}
