<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\ModelWilayah;
use App\Models\ModelSetting;

class Batalyon extends BaseController
{
    public function index()
    {
        $data = [
            'judul' => 'Batalyon',
            'menu'  => 'batalyon',
            'page' => 'batalyon/v_index',
        ];
        return view('v_template_back_end', $data);
    }

    public function __construct()
    {
        $this->ModelWilayah = new ModelWilayah();
        $this->ModelSetting = new ModelSetting();
    }
    
}
