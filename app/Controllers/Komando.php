<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

use App\Models\ModelKomando;

class Komando extends BaseController
{
    public function __construct()
    {
        $this->ModelKomando = new ModelKomando();
    }

    public function index()
    {
        $data = [
            'judul' => 'Komando',
            'menu'  => 'komando', //variabel menu aktif
            'page' => 'v_komando',
            'komando' => $this->ModelKomando->AllData(),
        ];
        return view('v_template_back_end', $data);
    }

        public function UpdateData($id_komando)
        {
            $marker = $this->request->getFile('marker');
            $name_file= $marker->getRandomName();
            $data = [
                'id_komando' => $id_komando,
                'marker'=> $name_file,
            ];
            $marker->move('marker', $name_file);
            $this->ModelKomando->UpdateData($data);
            session()->setFlashdata('update','Marker Berhasil Diupdate !!');
            return redirect()->to('Komando');
        }
    }
