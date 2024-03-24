<?php

namespace App\Controllers;

use App\Models\KategoriModel;
use \App\Models\UserModel;
use CodeIgniter\Session\Session;

class Kategori extends BaseController
{
    protected $KategoriModel;
    protected $UserModel;
    public function __construct()
    {
        $this->KategoriModel = new KategoriModel();
        $this->UserModel = new UserModel();
    }
    // -----------------------------------------------------------------------
    public function index()
    {
        $profile = $this->UserModel->detail_data(session()->get('id_user'));
        $data = [
            'title' => 'Kategori',
            'kategori' => $this->KategoriModel->all_data(),
            'profile' => $profile['nama_user'],
            'foto' => $profile['foto'],
        ];
        return view('kategori/v_kategori', $data);
    }

    //--------------------------------------------------------------------
    public function add()
    {
        if (!$this->validate([
            'nama_kategori' => [
                'rules' =>
                'required|is_unique[tbl_kategori.nama_kategori]',
            ]
        ])) {
            session()->setFlashdata('pesan-error', 'tidak boleh kosong atau sama !');
            return redirect()->to(base_url('kategori'));
        }
        $data = [
            'nama_kategori' => $this->request->getPost('nama_kategori'),
        ];
        $this->KategoriModel->add($data);
        session()->setFlashdata('pesan', 'Data berhasil di tambahkan');
        return redirect()->to(base_url('kategori'));
    }
    // --------------------------------------------------------------------
    public function edit($id_kategori)
    {
        if (!$this->validate([
            'nama_kategori' => [
                'rules' =>
                'required|is_unique[tbl_kategori.nama_kategori]',
            ]
        ])) {
            session()->setFlashdata('pesan-error', 'tidak boleh kosong atau sama !');
            return redirect()->to(base_url('kategori'));
        }
        $data = [
            'id_kategori' => $id_kategori,
            'nama_kategori' => $this->request->getPost('nama_kategori'),
        ];
        $this->KategoriModel->edit($data);
        session()->setFlashdata('pesan', 'Data berhasil di ubah');
        return redirect()->to(base_url('kategori'));
    }
    // --------------------------------------------------------------------
    public function laporan_kategori()
    {
        $profile = $this->UserModel->detail_data(session()->get('id_user'));
        $data = [
            'title' => 'Laporan kategori',
            'kategori' => $this->KategoriModel->all_data(),
            'profile' => $profile['nama_user'],
            'foto' => $profile['foto'],
        ];

        return view('kategori/v_laporan', $data);
    }
    // --------------------------------------------------------------------
    public function hapus($id_kategori)
    {
        $data = [
            'id_kategori' => $id_kategori,
        ];
        $this->KategoriModel->hapus($data);
        session()->setFlashdata('pesan', 'Data berhasil di hapus');
        return redirect()->to(base_url('kategori'));
    }
}
