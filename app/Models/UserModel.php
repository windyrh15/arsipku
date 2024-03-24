<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    public function all_data()
    {
        return $this->db->table('tbl_user')
            ->join('tbl_jabatan', 'tbl_jabatan.id_jabatan = tbl_user.id_jabatan', 'left')
            ->orderBy('id_user', 'DESC')
            ->get()
            ->getResultArray();
    }
    // ------------------------------------------------------------------------
    public function detail_data($id_user)
    {
        return $this->db->table('tbl_user')
            ->join('tbl_jabatan', 'tbl_jabatan.id_jabatan = tbl_user.id_jabatan', 'left')
            ->where('id_user', $id_user)
            ->get()
            ->getRowArray();
    }
    // ------------------------------------------------------------------------

    public function add($data)
    {
        $this->db->table('tbl_user')->insert($data);
    }
    // ------------------------------------------------------------------------
    public function edit($data)
    {
        $this->db->table('tbl_user')->where('id_user', $data['id_user'])->update($data);
    }
    // ------------------------------------------------------------------------
    public function hapus($data)
    {
        $this->db->table('tbl_user')->where('id_user', $data['id_user'])->delete($data);
    }
}
