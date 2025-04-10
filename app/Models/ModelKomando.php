<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelKomando extends Model
{
    public function AllData()
    {
        return $this->db->table('tbl_komando')
            ->get()->getResultArray();
    }

    public function InsertData($data)
    {
        $this->db->table('tbl_komando')->insert($data);
    }

    public function DetailData($id_komando)
    {
        return $this->db->table('tbl_komando')
        ->where('id_komando',$id_komando)
        ->get()->getRowArray();
    }

    public function UpdateData($data)
    {
        $this->db->table('tbl_komando')
        ->where('id_komando', $data['id_komando'])
        ->update($data);
    }

    public function DeleteData($data)
    {
        $this->db->table('tbl_komando')
        ->where('id_komando', $data['id_komando'])
        ->delete($data);
    }
}
