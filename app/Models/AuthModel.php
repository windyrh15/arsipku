<?php

namespace App\Models;

use CodeIgniter\Model;

class AuthModel extends Model
{
    public function login($email)
    {
        return $this->db->table('tbl_user')->where([
            'email' => $email,
        ])->get()->getRowArray();
    }
    public function detail($email)
    {
        return $this->db->table('tbl_user')->where([
            'email' => $email,
        ])->get()->getRowArray();
    }
    public function edit($data)
    {
        $this->db->table('tbl_user')->where('email', $data['email'])->update($data);
    }
    // --------------------------------------------------------------   
}
