<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

use App\Models\ModelKesatuan;

class Kesatuan extends BaseController
{
    public function __construct()
    {
          //Cek role login
        if (session()->get('role') != 'admin') {
            session()->setFlashdata('pesan', 'Harap login dahulu sebagai admin.');
            header('Location: ' . base_url('Auth/LoginAdmin'));
            exit;
        }
        
        $this->ModelKesatuan = new ModelKesatuan();
    }

    public function index()
    {
        $data = [
            'judul' => 'Kesatuan',
            'menu'  => 'kesatuan', //variabel menu aktif
            'page' => 'v_kesatuan',
            'kesatuan' => $this->ModelKesatuan->AllData(),
        ];
        return view('v_template_back_end', $data);
    }

    public function UpdateData($id)
    {
        $marker = $this->request->getFile('marker');
        $name_file = $marker->getRandomName();
        $data = [
            'id' => $id,
            'marker' => $name_file,
        ];
        $marker->move('marker', $name_file);
        $this->ModelKesatuan->UpdateData($data);
        session()->setFlashdata('update', 'Marker Berhasil Diupdate !!');
        return redirect()->to('Kesatuan');
    }
}
