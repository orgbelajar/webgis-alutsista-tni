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

    public function Kesatuan($id)
    {
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
}