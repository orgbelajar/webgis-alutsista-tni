<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelLantamal extends Model
{
    public function AllData()
    {
        return $this->db->table('tbl_lantamal')
            //->join('tbl_kesatuan', 'tbl_kesatuan.id = tbl_lantamal.id_kesatuan', 'left')
            ->select('tbl_lantamal.*, tbl_kesatuan.kesatuan, tbl_kesatuan.marker, tbl_wilayah.nama_wilayah') // <-- ambil nama kesatuan!
            ->join('tbl_kesatuan', 'tbl_kesatuan.id = tbl_lantamal.id_kesatuan', 'left') // join yang benar
            ->join('tbl_wilayah', 'tbl_wilayah.id = tbl_lantamal.id_wilayah', 'left')
            ->get()
            ->getResultArray();
    }

    public function AllDataPerWilayah($id_wilayah)
    {
        return $this->db->table('tbl_lantamal')
            ->join('tbl_wilayah', 'tbl_wilayah.id = tbl_lantamal.id_wilayah', 'left')
            ->join('tbl_kesatuan', 'tbl_kesatuan.id = tbl_lantamal.id_kesatuan', 'left')
            ->select('tbl_lantamal.*, tbl_wilayah.nama_wilayah, tbl_kesatuan.kesatuan')
            ->where('tbl_lantamal.id_wilayah', $id_wilayah)
            ->get()
            ->getResultArray();
    }

    public function AllDataPerKesatuan($id)
    {
        return $this->db->table('tbl_lantamal')
            ->join('tbl_kesatuan', 'tbl_kesatuan.id = tbl_lantamal.id_kesatuan', 'left')
            ->where('tbl_lantamal.id_kesatuan', $id)
            ->get()->getResultArray();
    }

    public function InsertDataLantamal($data)
    {
        $this->db->table('tbl_lantamal')->insert($data);
    }

    public function DetailData($id)
    {
        return $this->db->table('tbl_lantamal')
            ->join('tbl_kesatuan', 'tbl_kesatuan.id = tbl_lantamal.id_kesatuan', 'left')
            ->join('tbl_wilayah', 'tbl_wilayah.id = tbl_lantamal.id_wilayah', 'left')
            ->where('tbl_lantamal.id', $id)
            ->select('tbl_lantamal.*, tbl_kesatuan.kesatuan, tbl_wilayah.id as wilayah_id, tbl_wilayah.nama_wilayah') // Perhatikan alias untuk id wilayah
            ->get()->getRowArray();
    }

    public function UpdateData($data)
    {
        $this->db->table('tbl_lantamal')
            ->where('id', $data['id'])
            ->update($data);
    }

    public function DeleteData($data)
    {
        $this->db->table('tbl_lantamal')
            ->where('id', $data['id'])
            ->delete($data);
    }
}
