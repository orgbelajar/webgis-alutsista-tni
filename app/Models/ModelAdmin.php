<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelAdmin extends Model
{
    public function JmlWilayah()
    {
        return $this->db->table('tbl_wilayah')
            ->countAll();
    }

    public function JmlKodam()
    {
        return $this->db->table('tbl_kodam')
            ->countAll();
    }

    public function JmlLantamal()
    {
        return $this->db->table('tbl_lantamal')
            ->countAll();
    }

    public function JmlKoopsud()
    {
        return $this->db->table('tbl_koopsud')
            ->countAll();
    }

    public function TotalTank()
    {
        return $this->db->table('tbl_kodam')
            ->selectSum('jml_tank')
            ->selectSum('jml_tank_2')
            ->get()->getRowArray();
    }

    public function TotalArtileri()
    {
        return $this->db->table('tbl_kodam')
            ->selectSum('jml_artileri')
            ->selectSum('jml_artileri_2')
            ->get()->getRowArray();
    }

    public function TotalHelikopter()
    {
        return $this->db->table('tbl_kodam')
            ->selectSum('jml_helikopter')
            ->selectSum('jml_helikopter_2')
            ->get()->getRowArray();
    }

    public function TotalAlutsista()
    {
        $tank = $this->TotalTank();
        $artileri = $this->TotalArtileri();
        $heli = $this->TotalHelikopter();

        $total =
            (int)$tank['jml_tank'] + (int)$tank['jml_tank_2'] +
            (int)$artileri['jml_artileri'] + (int)$artileri['jml_artileri_2'] +
            (int)$heli['jml_helikopter'] + (int)$heli['jml_helikopter_2'];

        return $total;
    }

    public function TotalArtileriLantamal()
    {
        return $this->db->table('tbl_lantamal')
            ->selectSum('jml_artileri')
            ->selectSum('jml_artileri_2')
            ->get()->getRowArray();
    }

    public function TotalKapalSelam()
    {
        return $this->db->table('tbl_lantamal')
            ->selectSum('jml_armada_kapal_selam')
            ->selectSum('jml_armada_kapal_selam_2')
            ->get()->getRowArray();
    }

    public function TotalKapalPermukaan()
    {
        return $this->db->table('tbl_lantamal')
            ->selectSum('jml_armada_kapal_permukaan')
            ->selectSum('jml_armada_kapal_permukaan_2')
            ->get()->getRowArray();
    }

    public function TotalAmunisi()
    {
        return $this->db->table('tbl_koopsud')
            ->selectSum('jml_amunisi')
            ->selectSum('jml_amunisi_2')
            ->get()->getRowArray();
    }

    public function TotalPertahananUdara()
    {
        return $this->db->table('tbl_koopsud')
            ->selectSum('jml_pertahanan_udara')
            ->selectSum('jml_pertahanan_udara_2')
            ->get()->getRowArray();
    }

    public function TotalPesawatTerbang()
    {
        return $this->db->table('tbl_koopsud')
            ->selectSum('jml_pesawat_terbang')
            ->selectSum('jml_pesawat_terbang_2')
            ->get()->getRowArray();
    }

    public function TotalAlutsistaLantamal()
    {
        $artileri = $this->TotalArtileriLantamal();
        $kapalSelam = $this->TotalKapalSelam();
        $kapalPermukaan = $this->TotalKapalPermukaan();

        $total =
            (int)$kapalSelam['jml_armada_kapal_selam'] + (int)$kapalSelam['jml_armada_kapal_selam_2'] +
            (int)$artileri['jml_artileri'] + (int)$artileri['jml_artileri_2'] +
            (int)$kapalPermukaan['jml_armada_kapal_permukaan'] + (int)$kapalPermukaan['jml_armada_kapal_permukaan_2'];

        return $total;
    }
}
