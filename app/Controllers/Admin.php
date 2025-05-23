<?php

namespace App\Controllers;

use App\Models\ModelSetting;
use App\Models\ModelAdmin;
use App\Models\ModelKesatuan;

class Admin extends BaseController
{
    public function __construct()
    {
        //Cek role login
        if (session()->get('role') != 'admin') {
            header('Location: ' . base_url('Auth/LoginAdmin'));
            exit;
        }

        
        $this->ModelSetting = new ModelSetting();
        $this->ModelAdmin = new ModelAdmin();
        $this->ModelKesatuan = new ModelKesatuan();
    }

    public function index(): string
    {
        $totalTank = $this->ModelAdmin->TotalTank();
        $totalArtileri = $this->ModelAdmin->TotalArtileri();
        $totalHelikopter = $this->ModelAdmin->TotalHelikopter();
        //$totalAlutsista = $this->ModelAdmin->TotalAlutsista();

        $totalArtileriLantamal = $this->ModelAdmin->TotalArtileriLantamal();
        $totalKapalSelam = $this->ModelAdmin->TotalKapalSelam();
        $totalKapalPermukaan = $this->ModelAdmin->TotalKapalPermukaan();
        //$totalAlutsista = $this->ModelAdmin->TotalAlutsista();

        $totalAmunisi = $this->ModelAdmin->TotalAmunisi();
        $totalPertahananUdara = $this->ModelAdmin->TotalPertahananUdara();
        $totalPesawatTerbang = $this->ModelAdmin->TotalPesawatTerbang();

        $data = [
            'judul' => 'Dashboard',
            'menu'  => 'dashboard',
            'page' => 'v_dashboard',
            'jmlkodam' => $this->ModelAdmin->JmlKodam(),
            'jmllantamal' => $this->ModelAdmin->JmlLantamal(),
            'jmlkoopsud' => $this->ModelAdmin->JmlKoopsud(),
            'jmlwilayah' => $this->ModelAdmin->JmlWilayah(),
            'kesatuan' => $this->ModelKesatuan->AllData(),

            // Tambahan total alutsista
            'total_tank' => (int)$totalTank['jml_tank'] + (int)$totalTank['jml_tank_2'],
            'total_artileri' => (int)$totalArtileri['jml_artileri'] + (int)$totalArtileri['jml_artileri_2'],
            'total_helikopter' => (int)$totalHelikopter['jml_helikopter'] + (int)$totalHelikopter['jml_helikopter_2'],
            //'total_alutsista' => $totalAlutsista,

            'total_artileri_lantamal' => (int)$totalArtileriLantamal['jml_artileri'] + (int)$totalArtileriLantamal['jml_artileri_2'],
            'total_kapal_selam' => (int)$totalKapalSelam['jml_armada_kapal_selam'] + (int)$totalKapalSelam['jml_armada_kapal_selam_2'],
            'total_kapal_permukaan' => (int)$totalKapalPermukaan['jml_armada_kapal_permukaan'] + (int)$totalKapalPermukaan['jml_armada_kapal_permukaan_2'],


            'total_amunisi' => (int)$totalAmunisi['jml_amunisi'] + (int)$totalAmunisi['jml_amunisi_2'],
            'total_pertahanan_udara' => (int)$totalPertahananUdara['jml_pertahanan_udara'] + (int)$totalPertahananUdara['jml_pertahanan_udara_2'],
            'total_pesawat_terbang' => (int)$totalPesawatTerbang['jml_pesawat_terbang'] + (int)$totalPesawatTerbang['jml_pesawat_terbang_2'],
        ];

        return view('v_template_back_end', $data);
    }

    public function Setting(): string
    {
        $data = [
            'judul' => 'Setting',
            'menu'  => 'setting',
            'page' => 'v_setting',
            'web' => $this->ModelSetting->DataWeb(),
        ];
        return view('v_template_back_end', $data);
    }

    public function Kodam(): string
    {
        $data = [
            'judul' => 'Kodam',
            'menu'  => 'Kodam',
            'page' => 'v_kodam',
            'web' => $this->ModelSetting->DataWeb(),
        ];
        return view('v_template_back_end', $data);
    }

    public function Lantamal(): string
    {
        $data = [
            'judul' => 'Lantamal',
            'menu'  => 'Lantamal',
            'page' => 'v_lantamal',
            'web' => $this->ModelSetting->DataWeb(),
        ];
        return view('v_template_back_end', $data);
    }

    public function Koopsud(): string
    {
        $data = [
            'judul' => 'Koopsud',
            'menu'  => 'Koopsud',
            'page' => 'v_koopsud',
            'web' => $this->ModelSetting->DataWeb(),
        ];
        return view('v_template_back_end', $data);
    }

    public function PostSetting(): string
    {
        $data = [
            'judul' => 'PostSetting',
            'page' => 'v_setting',
        ];
        return view('v_template_back_end', $data);
    }

    public function UpdateSetting()
    {
        $data = [
            'id' => 1,
            'nama_web' => $this->request->getPost('nama_web'),
            'coordinate_wilayah' => $this->request->getPost('coordinate_wilayah'),
            'zoom_view' => $this->request->getPost('zoom_view'),
        ];
        $this->ModelSetting->UpdateData($data);
        session()->setFlashdata('pesan', 'Settingan Web Telah Diupdate !!!');
        return redirect()->to('Admin/Setting');
    }
}
