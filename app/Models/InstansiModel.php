<?php

namespace App\Models;

use CodeIgniter\Model;

class InstansiModel extends Model
{
    public function all_data()
    {
        return $this->db->table('tbl_instansi')->orderBy('id_instansi', 'DESC')->get()->getResultArray();
    }
    // ------------------------------------------------------------------------
    public function detail_data($data)
    {
        $this->db->table('tbl_instansi')->where('id_instansi', $data['id_instansi'])->get()->getResultArray();
    }

    // -------------------------------------------------------------------------
    public function add($data)
    {
        $this->db->table('tbl_instansi')->insert($data);
    }
    // ------------------------------------------------------------------------
    public function  edit($data)
    {
        $this->db->table('tbl_instansi')->where('id_instansi', $data['id_instansi'])->update($data);
    }
    // ------------------------------------------------------------------------
    public function hapus($data)
    {
        $this->db->table('tbl_instansi')->where('id_instansi', $data['id_instansi'])->delete($data);
    }
}
