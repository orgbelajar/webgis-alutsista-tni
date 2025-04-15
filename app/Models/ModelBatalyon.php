<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelBatalyon extends Model
{
    public function AllData()
    {
        return $this->db->table('tbl_batalyon')
            ->join('tbl_komando', 'tbl_komando.id_komando = tbl_batalyon.id_komando', 'left')
            ->get()->getResultArray();
    }

    public function InsertData($data)
    {
        $this->db->table('tbl_batalyon')->insert($data);
    }

    public function DetailData($id_batalyon)
    {
        return $this->db->table('tbl_batalyon')
        ->join('tbl_komando', 'tbl_komando.id_komando = tbl_batalyon.id_komando', 'left')
        ->join('tbl_kabupaten', 'tbl_kabupaten.id_kabupaten = tbl_batalyon.id_kabupaten', 'left')
        ->join('tbl_kecamatan', 'tbl_kecamatan.id_kecamatan = tbl_batalyon.id_kecamatan', 'left')
        ->where('id_batalyon',$id_batalyon)
        ->get()->getRowArray();
    }

    public function UpdateData($data)
    {
        $this->db->table('tbl_batalyon')
        ->where('id_batalyon', $data['id_batalyon'])
        ->update($data);
    }

    public function DeleteData($data)
    {
        $this->db->table('tbl_batalyon')
        ->where('id_batalyon', $data['id_batalyon'])
        ->delete($data);
    }

    //provinsi
    public function allProvinsi()
    {
        return $this->db->table('tbl_provinsi')
            ->orderBy('id_provinsi', 'ASC')
            ->get()->getResultArray();
    }

    public function allKabupaten($id_provinsi)
    {
        return $this->db->table('tbl_kabupaten')
        ->where('id_provinsi', $id_provinsi)
        ->get()->getResultArray();
    }

    public function allKecamatan($id_kabupaten)
    {
        return $this->db->table('tbl_kecamatan')
        ->where('id_kabupaten', $id_kabupaten)
        ->get()->getResultArray();
    }
}
