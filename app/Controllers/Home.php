<?php

namespace App\Controllers;

use App\Models\ModelSetting;
use App\Models\ModelWilayah;
use App\Models\ModelKodam;
use App\Models\ModelKesatuan;

class Home extends BaseController
{
    public function __construct()
    {
        $this->ModelSetting = new ModelSetting();
        $this->ModelWilayah = new ModelWilayah();
        $this->ModelKodam = new ModelKodam();
        $this->ModelKesatuan = new ModelKesatuan();
    }

    public function index(): string
    {
        $data = [
            'judul' => 'Home',
            'page' => 'v_home',
            'web' => $this->ModelSetting->DataWeb(),
            'wilayah' => $this->ModelWilayah->AllData(),
            'kodam' => $this->ModelKodam->AllData(),
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
            'kodam' => $this->ModelKodam->AllDataPerWilayah($id_wilayah),

        ];
        return view('v_template_front_end', $data);
    }

    public function Kesatuan($id)
    {
        $dK = $this->ModelKesatuan->DetailData($id);
        $data = [
            'judul' => $dK['kesatuan'],
            'page' => 'v_kodam_perkesatuan',
            'web' => $this->ModelSetting->DataWeb(),
            'wilayah' => $this->ModelWilayah->AllData(),
            'kesatuan' => $this->ModelKesatuan->AllData(),
            'kodam' => $this->ModelKodam->AllDataPerKesatuan($id),

        ];
        return view('v_template_front_end', $data);
    }

    public function DetailBatalyon($id_kodam)
    {
        $kodam = $this->ModelKodam->DetailData($id_kodam);
        $data = [
            'judul' => $kodam['nama_batalyon'],
            'page' => 'v_detail_batalyon',
            'web' => $this->ModelSetting->DataWeb(),
            'wilayah' => $this->ModelWilayah->AllData(),
            'kesatuan' => $this->ModelKesatuan->AllData(),
            'kodam' => $kodam,

        ];
        return view('v_template_front_end', $data);
    }
}
