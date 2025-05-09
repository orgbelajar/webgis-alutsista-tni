<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelUser;

class User extends BaseController
{
    public function __construct()
    {
        //Cek role login
        if (session()->get('role') != 'admin') {
            session()->setFlashdata('pesan', 'Harap login dahulu sebagai admin.');
            header('Location: ' . base_url('Auth/LoginAdmin'));
            exit;
        }

        $this->ModelUser = new ModelUser();
    }

    public function index()
    {
        $data = [
            'judul' => 'User',
            'menu' => 'user',
            'page' => 'user/v_index',
            'user' => $this->ModelUser->AllData(),
        ];
        return view('v_template_back_end', $data);
    }

    public function Add()
    {
        $data = [
            'judul' => 'Tambah User',
            'menu' => 'user',
            'page' => 'user/v_input',
        ];
        return view('v_template_back_end', $data);
    }

    public function Insert()
    {
        if (!$this->validate([
            'nama_user' => 'required',
            'email'     => 'required|valid_email|is_unique[tbl_user.email]',
            'password'  => 'required|min_length[8]',
            'foto'      => [
                'uploaded[foto]',
                'mime_in[foto,image/jpg,image/jpeg,image/png]',
                'max_size[foto,2048]',
            ],
        ])) {
            return redirect()->to(base_url('User/Add'))->withInput();
        }

        // proses upload foto
        $foto = $this->request->getFile('foto');
        $nama_foto = $foto->getRandomName();
        $foto->move('foto_user', $nama_foto);

        // menyimpan data ke database
        $data = [
            'nama_user' => $this->request->getPost('nama_user'),
            'email'     => $this->request->getPost('email'),
            'password'  => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            'foto'      => $nama_foto,

            // tentukan role langsung, agar tidak bisa dimanipulasi dari form
            'role'      => 'user',
        ];

        $this->ModelUser->InsertData($data);
        session()->setFlashdata('success', 'Data User berhasil ditambahkan!');
        return redirect()->to(base_url('User'));
    }


    public function Edit($id_user)
    {
        $data = [
            'judul' => 'Edit User',
            'menu' => 'user',
            'page' => 'user/v_edit',
            'user' => $this->ModelUser->DetailData($id_user),
        ];
        return view('v_template_back_end', $data);
    }

    // 

    public function Update($id_user)
    {
        // Ambil data user lama dari database
        $userLama = $this->ModelUser->DetailData($id_user);

        // Cek apakah user ada
        if (!$userLama) {
            session()->setFlashdata('error', 'User tidak ditemukan');
            return redirect()->to('User');
        }

        $data = [
            'id_user'   => $id_user,
            'email'     => $this->request->getPost('email'),
            'nama_user' => $this->request->getPost('nama_user'),
            // Role tetap pakai nilai lama agar tidak bisa dimanipulasi
            'role'      => $userLama['role'],
        ];

        // Jika password diisi, update password
        $password = $this->request->getPost('password');
        if (!empty($password)) {
            $data['password'] = password_hash($password, PASSWORD_DEFAULT);
        }

        // Jika ada file foto diunggah, ganti foto lama
        $foto = $this->request->getFile('foto');
        if ($foto && $foto->isValid() && !$foto->hasMoved()) {
            // Hapus foto lama jika ada
            if ($userLama['foto'] && file_exists('foto_user/' . $userLama['foto'])) {
                unlink('foto_user/' . $userLama['foto']);
            }

            $nama_foto = $foto->getRandomName();
            $foto->move('foto_user', $nama_foto);
            $data['foto'] = $nama_foto;
        }

        $this->ModelUser->UpdateData($data);
        session()->setFlashdata('success', 'User berhasil diupdate');
        return redirect()->to('User');
    }

    public function Delete($id_user)
    {
        $user = $this->ModelUser->DetailData($id_user);

        if (!$user) {
            session()->setFlashdata('error', 'User tidak ditemukan');
            return redirect()->to('User');
        }

        if ($user['role'] === 'admin') {
            session()->setFlashdata('error', 'User dengan role admin tidak bisa dihapus!');
            return redirect()->to('User');
        }

        // Hapus foto jika ada
        if ($user['foto'] && file_exists('foto_user/' . $user['foto'])) {
            unlink('foto_user/' . $user['foto']);
        }

        $this->ModelUser->DeleteData(['id_user' => $id_user]);
        session()->setFlashdata('success', 'User berhasil dihapus');
        return redirect()->to('User');
    }
}
