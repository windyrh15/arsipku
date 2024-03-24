<?php

namespace App\Models;

use CodeIgniter\Model;

class ArsipModel extends Model
{
    public function all_data()
    {
        return $this->db->table('tbl_arsip')
            ->join('tbl_kategori', 'tbl_kategori.id_kategori = tbl_arsip.id_kategori', 'left')
            ->join('tbl_instansi', 'tbl_instansi.id_instansi = tbl_arsip.id_instansi', 'left')
            ->join('tbl_jabatan', 'tbl_jabatan.id_jabatan = tbl_arsip.id_jabatan', 'left')
            ->join('tbl_user', 'tbl_user.id_user = tbl_arsip.id_user', 'left')
            ->orderBy('id_arsip', 'DESC')
            ->get()
            ->getResultArray();
    }
    public function all_data_instansi2()
    {
        return $this->db->table('tbl_arsip')
            ->join('tbl_kategori', 'tbl_kategori.id_kategori = tbl_arsip.id_kategori', 'left')
            ->join('tbl_instansi', 'tbl_instansi.id_instansi = tbl_arsip.id_instansi', 'left')
            ->join('tbl_jabatan', 'tbl_jabatan.id_jabatan = tbl_arsip.id_jabatan', 'left')
            ->join('tbl_user', 'tbl_user.id_user = tbl_arsip.id_user', 'left')
            ->orderBy('tbl_arsip.id_instansi', 'AESC')
            ->get()
            ->getResultArray();
    }

    public function all_data_instansi($id_instansi)
    {
        return $this->db->table('tbl_arsip')
            ->join('tbl_kategori', 'tbl_kategori.id_kategori = tbl_arsip.id_kategori', 'left')
            ->join('tbl_instansi', 'tbl_instansi.id_instansi = tbl_arsip.id_instansi', 'left')
            ->join('tbl_jabatan', 'tbl_jabatan.id_jabatan = tbl_arsip.id_jabatan', 'left')
            ->join('tbl_user', 'tbl_user.id_user = tbl_arsip.id_user', 'left')
            ->where('tbl_arsip.id_instansi', $id_instansi)
            ->orderBy('id_arsip', 'DESC')
            ->get()
            ->getResultArray();
    }
    // ------------------------------------------------------------------------
    public function detail_data($id_arsip)
    {
        return $this->db->table('tbl_arsip')
            ->join('tbl_kategori', 'tbl_kategori.id_kategori = tbl_arsip.id_kategori', 'left')
            ->join('tbl_jabatan', 'tbl_jabatan.id_jabatan = tbl_arsip.id_jabatan', 'left')
            ->join('tbl_user', 'tbl_user.id_user = tbl_arsip.id_user', 'left')
            ->where('id_arsip', $id_arsip)
            ->get()
            ->getRowArray();
    }

    // ------------------------------------ abandon
    public function detail_dataAI($id_instansi)
    {
        return $this->db->table('tbl_arsip')
            ->join('tbl_kategori', 'tbl_kategori.id_kategori = tbl_arsip.id_kategori', 'left')
            ->join('tbl_jabatan', 'tbl_jabatan.id_jabatan = tbl_arsip.id_jabatan', 'left')
            ->join('tbl_user', 'tbl_user.id_user = tbl_arsip.id_user', 'left')
            ->where('id_instansi', $id_instansi)
            ->get()
            ->getRowArray();
    }
    // ------------------------------------------------------------------------

    public function add($data)
    {
        $this->db->table('tbl_arsip')->insert($data);
    }
    // ------------------------------------------------------------------------
    public function  edit($data)
    {
        $this->db->table('tbl_arsip')->where('id_arsip', $data['id_arsip'])->update($data);
    }
    // ------------------------------------------------------------------------
    public function hapus($data)
    {
        $this->db->table('tbl_arsip')->where('id_arsip', $data['id_arsip'])->delete($data);
    }

    public function hapusAI($data)
    {
        $this->db->table('tbl_arsip')->where('id_instansi', $data['id_instansi'])->delete($data);
    }
}
