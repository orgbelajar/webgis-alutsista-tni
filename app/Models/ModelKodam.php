<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelKodam extends Model
{
    public function AllData()
    {
        return $this->db->table('tbl_kodam')
            //->join('tbl_kesatuan', 'tbl_kesatuan.id = tbl_kodam.id_kesatuan', 'left')
            ->select('tbl_kodam.*, tbl_kesatuan.kesatuan') // <-- ambil nama kesatuan!
            ->join('tbl_kesatuan', 'tbl_kesatuan.id = tbl_kodam.id_kesatuan', 'left') // join yang benar
            ->get()
            ->getResultArray();
    }

    // public function AllDataPerWilayah($id_wilayah)
    // {
    //     return $this->db->table('tbl_batalyon')
    //         ->join('tbl_komando', 'tbl_komando.id_komando = tbl_batalyon.id_komando', 'left')
    //         ->where('id_wilayah', $id_wilayah)
    //         ->get()->getResultArray();
    // }

    public function AllDataPerKesatuan($id)
    {
        return $this->db->table('tbl_kodam')
            ->join('tbl_kesatuan', 'tbl_kesatuan.id = tbl_kodam.id_kesatuan', 'left')
            ->where('tbl_kodam.id_kesatuan', $id)
            ->get()->getResultArray();
    }

    public function InsertDataKodam($data)
    {
        $this->db->table('tbl_kodam')->insert($data);
    }

    // public function DetailData($id)
    // {
    //     return $this->db->table('tbl_batalyon')
    //         ->join('tbl_komando', 'tbl_komando.id_komando = tbl_batalyon.id_komando', 'left')
    //         ->join('tbl_provinsi', 'tbl_provinsi.id_provinsi = tbl_batalyon.id_provinsi', 'left')
    //         ->join('tbl_kabupaten', 'tbl_kabupaten.id_kabupaten = tbl_batalyon.id_kabupaten', 'left')
    //         ->join('tbl_kecamatan', 'tbl_kecamatan.id_kecamatan = tbl_batalyon.id_kecamatan', 'left')
    //         ->join('tbl_wilayah', 'tbl_wilayah.id_wilayah = tbl_batalyon.id_wilayah', 'left')
    //         ->where('id', $id)
    //         ->get()->getRowArray();
    // }

    // public function UpdateData($data)
    // {
    //     $this->db->table('tbl_batalyon')
    //         ->where('id_batalyon', $data['id_batalyon'])
    //         ->update($data);
    // }

    // public function DeleteData($data)
    // {
    //     $this->db->table('tbl_batalyon')
    //         ->where('id_batalyon', $data['id_batalyon'])
    //         ->delete($data);
    // }

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
