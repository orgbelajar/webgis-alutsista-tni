<?php

namespace App\Controllers;

use App\Models\ModelSetting;
use App\Models\ModelWilayah;
use App\Models\ModelKodam;
use App\Models\ModelKesatuan;

class HomeKodam extends BaseController
{
    public function __construct()
    {
        $this->ModelSetting = new ModelSetting();
        $this->ModelWilayah = new ModelWilayah();
        $this->ModelKodam = new ModelKodam();
        $this->ModelKesatuan = new ModelKesatuan();
    }

    // public function index(): string
    // {
    //     $data = [
    //         'judul' => 'Home',
    //         'page' => 'v_home',
    //         'web' => $this->ModelSetting->DataWeb(),
    //         'wilayah' => $this->ModelWilayah->AllData(),
    //         'kodam' => $this->ModelKodam->AllData(),
    //         'kesatuan' => $this->ModelKesatuan->AllData(),
    //     ];
    //     return view('v_template_front_end', $data);
    // }

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
            'kodam' => $this->ModelKodam->AllDataPerWilayah($id_wilayah),

        ];
        return view('v_template_front_end', $data);
    }

    public function Kesatuan($id)
    {
        session()->set('previous_url', current_url());
        $dK = $this->ModelKesatuan->DetailData($id);
        $data = [
            'judul' => $dK['kesatuan'],
            'page' => 'v_kodam_perkesatuan',
            'web' => $this->ModelSetting->DataWeb(),
            'wilayah' => $this->ModelWilayah->AllData(),
            'kesatuan' => $this->ModelKesatuan->AllData(),
            'kodam' => $this->ModelKodam->AllData(),

        ];
        return view('v_template_front_end', $data);
    }

    public function DetailKodam($id)
    {
        $kodam = $this->ModelKodam->DetailData($id);
        $data = [
            'judul' => $kodam['nama_kodam'],
            'page' => 'v_detail_kodam',
            'web' => $this->ModelSetting->DataWeb(),
            'wilayah' => $this->ModelWilayah->AllData(),
            'kesatuan' => $this->ModelKesatuan->AllData(),
            'kodam' => $kodam,

        ];
        return view('v_template_front_end', $data);
    }
}
