<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelKesatuan extends Model
{
    public function AllData()
    {
        return $this->db->table('tbl_kesatuan')
            ->get()->getResultArray();
    }

    public function InsertData($data)
    {
        $this->db->table('tbl_kesatuan')->insert($data);
    }

    public function DetailData($id)
    {
        return $this->db->table('tbl_kesatuan')
        ->where('id',$id)
        ->get()->getRowArray();
    }

    public function UpdateData($data)
    {
        $this->db->table('tbl_kesatuan')
        ->where('id', $data['id'])
        ->update($data);
    }

    public function DeleteData($data)
    {
        $this->db->table('tbl_kesatuan')
        ->where('id', $data['id'])
        ->delete($data);
    }
}
