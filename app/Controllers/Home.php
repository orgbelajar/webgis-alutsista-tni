<?php

namespace App\Controllers;
use App\Models\ModelSetting;
use App\Models\ModelWilayah;
use App\Models\ModelBatalyon;
use App\Models\ModelKomando;

class Home extends BaseController
{
    public function __construct()
    {
        $this->ModelSetting = new ModelSetting();
        $this->ModelWilayah = new ModelWilayah();
        $this->ModelBatalyon = new ModelBatalyon();
        $this->ModelKomando = new ModelKomando();
    }

    public function index(): string
    {
        $data = [
            'judul' => 'Home',
            'page' => 'v_home',
            'web' => $this->ModelSetting->DataWeb(),
            'wilayah' => $this->ModelWilayah->AllData(),
            'batalyon' => $this->ModelBatalyon->AllData(),
            'komando' => $this->ModelKomando->AllData(),
        ];
        return view('v_template_front_end', $data);
    }

    public function Wilayah($id_wilayah)
    {
        $data = [
            'judul' => 'Detail Wilayah',
            'page' => 'v_detail_wilayah',
            'web' => $this->ModelSetting->DataWeb(),
            'wilayah' => $this->ModelWilayah->AllData(),
            'komando' => $this->ModelKomando->AllData(),
            'detailwilayah' => $this->ModelWilayah->DetailData($id_wilayah), 
            'batalyon' => $this->ModelBatalyon->AllDataPerWilayah($id_wilayah), 

        ];
        return view('v_template_front_end', $data);
    }

    public function Komando($id_komando)
    {
        $data = [
            'judul' => 'Home',
            'page' => 'v_batalyon_per_komando',
            'web' => $this->ModelSetting->DataWeb(),
            'wilayah' => $this->ModelWilayah->AllData(),
            'komando' => $this->ModelKomando->AllData(),
            'batalyon' => $this->ModelBatalyon->AllDataPerKomando($id_komando), 

        ];
        return view('v_template_front_end', $data);
    }
}
