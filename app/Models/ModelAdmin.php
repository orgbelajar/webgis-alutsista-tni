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
}
