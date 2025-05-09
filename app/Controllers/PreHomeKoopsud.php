<?php

namespace App\Controllers;

use App\Models\ModelSetting;
use App\Models\ModelWilayah;
use App\Models\ModelKoopsud;
use App\Models\ModelKesatuan;

class PreHomeKoopsud extends BaseController
{
    public function __construct()
    {
        //Cek role login
        if (session()->get('role') != 'admin') {
            session()->setFlashdata('pesan', 'Harap login dahulu sebagai admin.');
            header('Location: ' . base_url('Auth/LoginAdmin'));
            exit;
        }
        
        $this->ModelSetting = new ModelSetting();
        $this->ModelWilayah = new ModelWilayah();
        $this->ModelKoopsud = new ModelKoopsud();
        $this->ModelKesatuan = new ModelKesatuan();
    }

    
    // public function Wilayah($id_wilayah)
    // {
    //     $dW = $this->ModelWilayah->DetailData($id_wilayah);
    //     $data = [
    //         'judul' => $dW['nama_wilayah'],
    //         'page' => 'v_detail_wilayah',
    //         'web' => $this->ModelSetting->DataWeb(),
    //         'wilayah' => $this->ModelWilayah->AllData(),
    //         'kesatuan' => $this->ModelKesatuan->AllData(),
    //         'detailwilayah' => $this->ModelWilayah->DetailData($id_wilayah),
    //         'koopsud' => $this->ModelKoopsud->AllDataPerWilayah($id_wilayah),

    //     ];
    //     return view('v_template_front_end', $data);
    // }

    public function Kesatuan($id)
    {
        session()->set('previous_url', current_url());
        $dK = $this->ModelKesatuan->DetailData($id);
        $data = [
            'judul' => $dK['kesatuan'],
            'page' => 'v_koopsud_perkesatuan',
            'web' => $this->ModelSetting->DataWeb(),
            'wilayah' => $this->ModelWilayah->AllData(),
            'kesatuan' => $this->ModelKesatuan->AllData(),
            'koopsud' => $this->ModelKoopsud->AllData(),

        ];
        return view('v_template_front_end', $data);
    }

    public function DetailKoopsud($id)
    {
        $koopsud = $this->ModelKoopsud->DetailData($id);
        $data = [
            'judul' => $koopsud['nama_koopsud'],
            'page' => 'v_detail_koopsud',
            'web' => $this->ModelSetting->DataWeb(),
            'wilayah' => $this->ModelWilayah->AllData(),
            'kesatuan' => $this->ModelKesatuan->AllData(),
            'koopsud' => $koopsud,

        ];
        return view('v_template_front_end', $data);
    }
}
