<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelKodam extends Model
{
    public function AllData()
    {
        return $this->db->table('tbl_kodam')
            ->select('tbl_kodam.*, tbl_kesatuan.kesatuan, tbl_kesatuan.marker, tbl_wilayah.nama_wilayah')
            //->select('tbl_kodam.*, tbl_kesatuan.kesatuan, tbl_kesatuan.marker') // <-- ambil nama kesatuan!
            ->join('tbl_kesatuan', 'tbl_kesatuan.id = tbl_kodam.id_kesatuan', 'left') // join yang benar
            ->join('tbl_wilayah', 'tbl_wilayah.id = tbl_kodam.id_wilayah', 'left')
            ->get()
            ->getResultArray();
    }

    // public function AllDataPerWilayah($id_wilayah)
    // {
    //     return $this->db->table('tbl_kodam')
    //         ->join('tbl_kesatuan', 'tbl_kesatuan.id = tbl_kodam.id_kesatuan', 'left')
    //         ->where('id_wilayah', $id_wilayah)
    //         ->get()->getResultArray();
    // }

    public function AllDataPerWilayah($id_wilayah)
    {
        return $this->db->table('tbl_kodam')
            ->join('tbl_wilayah', 'tbl_wilayah.id = tbl_kodam.id_wilayah', 'left')
            ->join('tbl_kesatuan', 'tbl_kesatuan.id = tbl_kodam.id_kesatuan', 'left')
            ->select('tbl_kodam.*, tbl_wilayah.nama_wilayah, tbl_kesatuan.kesatuan')
            ->where('tbl_kodam.id_wilayah', $id_wilayah)
            ->get()
            ->getResultArray();
    }

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
    //     return $this->db->table('tbl_kodam')
    //         ->join('tbl_kesatuan', 'tbl_kesatuan.id = tbl_kodam.id_kesatuan', 'left')
    //         ->join('tbl_wilayah', 'tbl_wilayah.id = tbl_kodam.id_wilayah', 'left')
    //         ->where('tbl_kodam.id', $id)
    //         ->get()->getRowArray();
    // }

    public function DetailData($id)
    {
        return $this->db->table('tbl_kodam')
            ->join('tbl_kesatuan', 'tbl_kesatuan.id = tbl_kodam.id_kesatuan', 'left')
            ->join('tbl_wilayah', 'tbl_wilayah.id = tbl_kodam.id_wilayah', 'left')
            ->where('tbl_kodam.id', $id)
            ->select('tbl_kodam.*, tbl_kesatuan.kesatuan, tbl_wilayah.id as wilayah_id, tbl_wilayah.nama_wilayah') // Perhatikan alias untuk id wilayah
            ->get()->getRowArray();
    }

    public function UpdateData($data)
    {
        $this->db->table('tbl_kodam')
            ->where('id', $data['id'])
            ->update($data);
    }

    public function DeleteData($data)
    {
        $this->db->table('tbl_kodam')
            ->where('id', $data['id'])
            ->delete($data);
    }

    //provinsi
    // public function allProvinsi()
    // {
    //     return $this->db->table('tbl_provinsi')
    //         ->orderBy('id_provinsi', 'ASC')
    //         ->get()->getResultArray();
    // }

    // public function allKabupaten($id_provinsi)
    // {
    //     return $this->db->table('tbl_kabupaten')
    //         ->where('id_provinsi', $id_provinsi)
    //         ->get()->getResultArray();
    // }

    // public function allKecamatan($id_kabupaten)
    // {
    //     return $this->db->table('tbl_kecamatan')
    //         ->where('id_kabupaten', $id_kabupaten)
    //         ->get()->getResultArray();
    // }
}
