<?php

namespace App\Controllers;

use App\Models\ModelSetting;
use App\Models\ModelWilayah;
use App\Models\ModelLantamal;
use App\Models\ModelKesatuan;

class HomeLantamal extends BaseController
{
    public function __construct()
    {
        if (session()->get('role') != 'user') {
            session()->setFlashdata('pesan', 'Harap login terlebih dahulu.');
            header('Location: ' . base_url('Auth/LoginUser'));
            exit;
        }
        
        $this->ModelSetting = new ModelSetting();
        $this->ModelWilayah = new ModelWilayah();
        $this->ModelLantamal = new ModelLantamal();
        $this->ModelKesatuan = new ModelKesatuan();
    }

    public function index(): string
    {
        $data = [
            'judul' => 'Home',
            'page' => 'v_home',
            'web' => $this->ModelSetting->DataWeb(),
            'wilayah' => $this->ModelWilayah->AllData(),
            'lantamal' => $this->ModelLantamal->AllData(),
            'kesatuan' => $this->ModelKesatuan->AllData(),
        ];
        return view('v_template_front_end', $data);
    }

    public function Wilayah($id_wilayah)
    {
        $dW = $this->ModelWilayah->DetailData($id_wilayah);
        $data = [
            'judul' => $dW['nama_wilayah'],
            'page' => 'v_detail_wilayah',
            'web' => $this->ModelSetting->DataWeb(),
            'wilayah' => $this->ModelWilayah->AllData(),
            'kesatuan' => $this->ModelKesatuan->AllData(),
            'detailwilayah' => $this->ModelWilayah->DetailData($id_wilayah),
            'lantamal' => $this->ModelLantamal->AllDataPerWilayah($id_wilayah),

        ];
        return view('v_template_front_end', $data);
    }

    public function Kesatuan($id)
    {
        session()->set('previous_url', current_url());
        $dK = $this->ModelKesatuan->DetailData($id);
        $data = [
            'judul' => $dK['kesatuan'],
            'page' => 'v_lantamal_perkesatuan',
            'web' => $this->ModelSetting->DataWeb(),
            'wilayah' => $this->ModelWilayah->AllData(),
            'kesatuan' => $this->ModelKesatuan->AllData(),
            'lantamal' => $this->ModelLantamal->AllData(),

        ];
        return view('v_template_front_end', $data);
    }

    public function DetailLantamal($id)
    {

        $lantamal = $this->ModelLantamal->DetailData($id);
        $data = [
            'judul' => $lantamal['nama_lantamal'],
            'page' => 'v_detail_lantamal',
            'web' => $this->ModelSetting->DataWeb(),
            'wilayah' => $this->ModelWilayah->AllData(),
            'kesatuan' => $this->ModelKesatuan->AllData(),
            'lantamal' => $lantamal,

        ];
        return view('v_template_front_end', $data);
    }
}
