<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

use App\Models\ModelWilayah;
use App\Models\ModelSetting;

class Wilayah extends BaseController
{
    public function __construct()
    {
        $this->ModelWilayah = new ModelWilayah();
        $this->ModelSetting = new ModelSetting();
    }

    public function index()
    {
        $data = [
            'judul' => 'Wilayah',
            'page' => 'wilayah/v_index',
            'wilayah' => $this->ModelWilayah->AllData(),
            'web' => $this->ModelSetting->DataWeb(),
        ];
        return view('v_template_back_end', $data);
    }

    public function Input()
    {
        $data = [
            'judul' => 'Input Wilayah',
            'page' => 'wilayah/v_input',
        ];
        return view('v_template_back_end', $data);
    }
}
