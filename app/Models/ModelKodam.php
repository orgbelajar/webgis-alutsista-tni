<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelKodam extends Model
{
    public function AllData()
    {
        return $this->db->table('tbl_kodam')
            ->select('tbl_kodam.*, tbl_kesatuan.kesatuan, tbl_kesatuan.marker, tbl_wilayah.nama_wilayah')
            ->join('tbl_kesatuan', 'tbl_kesatuan.id = tbl_kodam.id_kesatuan', 'left') // join yang benar
            ->join('tbl_wilayah', 'tbl_wilayah.id = tbl_kodam.id_wilayah', 'left')
            ->get()
            ->getResultArray();
    }

    public function AllDataPerAlutsista()
    {
        return $this->db->table('tbl_kodam')
            ->select("tbl_kodam.*, 
                (COALESCE(jml_artileri, 0) + 
                 COALESCE(jml_artileri_2, 0) + 
                 COALESCE(jml_tank, 0) + 
                 COALESCE(jml_tank_2, 0) + 
                 COALESCE(jml_helikopter, 0) + 
                 COALESCE(jml_helikopter_2, 0)) AS total_alutsista")
            ->get()
            ->getResultArray();
    }

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

    public function InsertData($data)
    {
        $this->db->table('tbl_kodam')->insert($data);
    }

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
}
