<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelBatalyon extends Model
{
    public function AllData()
    {
        return $this->db->table('tbl_batalyon')
            ->get()->getResultArray();
    }

    public function InsertData($data)
    {
        $this->db->table('tbl_batalyon')->insert($data);
    }

    public function DetailData($id_batalyon)
    {
        return $this->db->table('tbl_batalyon')
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
}
