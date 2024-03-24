<?php

namespace App\Controllers;

use \App\Models\JabatanModel;
use \App\Models\UserModel;
use CodeIgniter\Session\Session;

class Jabatan extends BaseController
{
    protected $JabatanModel;
    protected $UserModel;
    public function __construct()
    {
        $this->JabatanModel = new JabatanModel();
        $this->UserModel = new UserModel();
    }
    // -----------------------------------------------------------------------
    public function index()
    {
        $profile = $this->UserModel->detail_data(session()->get('id_user'));
        $data = [
            'title' => 'Jabatan',
            'jabatan' => $this->JabatanModel->all_data(),
            'profile' => $profile['nama_user'],
            'foto' => $profile['foto'],
        ];
        return view('jabatan/v_jabatan', $data);
    }

    //--------------------------------------------------------------------
    public function add()
    {
        if (!$this->validate([
            'nama_jabatan' => [
                'rules' =>
                'required|is_unique[tbl_jabatan.nama_jabatan]',
            ]
        ])) {
            session()->setFlashdata('pesan-error', 'tidak boleh kosong atau sama !');
            return redirect()->to(base_url('jabatan'));
        }
        $data = [
            'nama_jabatan' => $this->request->getPost('nama_jabatan'),
        ];
        $this->JabatanModel->add($data);
        session()->setFlashdata('pesan', 'Data berhasil di tambahkan');
        return redirect()->to(base_url('jabatan'));
    }
    // --------------------------------------------------------------------
    public function edit($id_jabatan)
    {
        if (!$this->validate([
            'nama_jabatan' => [
                'rules' =>
                'required|is_unique[tbl_jabatan.nama_jabatan]',
            ]
        ])) {
            session()->setFlashdata('pesan-error', 'tidak boleh kosong atau sama !');
            return redirect()->to(base_url('jabatan'));
        }
        $data = [
            'id_jabatan' => $id_jabatan,
            'nama_jabatan' => $this->request->getPost('nama_jabatan'),
        ];
        $this->JabatanModel->edit($data);
        session()->setFlashdata('pesan', 'Data berhasil di ubah');
        return redirect()->to(base_url('jabatan'));
    }
    // --------------------------------------------------------------------
    public function laporan_jabatan()
    {
        $profile = $this->UserModel->detail_data(session()->get('id_user'));
        $data = [
            'title' => 'Laporan jabatan',
            'jabatan' => $this->JabatanModel->all_data(),
            'profile' => $profile['nama_user'],
            'foto' => $profile['foto'],
        ];

        return view('jabatan/v_laporan', $data);
    }
    // --------------------------------------------------------------------
    public function hapus($id_jabatan)
    {
        $data = [
            'id_jabatan' => $id_jabatan,
        ];
        $this->JabatanModel->hapus($data);
        session()->setFlashdata('pesan', 'Data berhasil di hapus');
        return redirect()->to(base_url('jabatan'));
    }
}
