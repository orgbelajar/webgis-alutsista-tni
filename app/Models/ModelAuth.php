<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelAuth extends Model
{
    public function Login($email)
    {
        return $this->db->table('tbl_user')
            ->where('email', $email)
            ->get()
            ->getRowArray();
    }
}
