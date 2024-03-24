<?php

namespace App\Controllers;

use App\Models\InstansiModel;
use App\Models\ArsipModel;
use \App\Models\UserModel;
use CodeIgniter\Session\Session;

class Instansi extends BaseController
{
    protected $InstansiModel;
    protected $ArsipModel;
    protected $UserModel;
    public function __construct()
    {
        $this->InstansiModel = new InstansiModel();
        $this->ArsipModel = new ArsipModel();
        $this->UserModel = new UserModel();
    }
    // -----------------------------------------------------------------------
    public function index()
    {
        $profile = $this->UserModel->detail_data(session()->get('id_user'));
        $data = [
            'title' => 'Instansi',
            'instansi' => $this->InstansiModel->all_data(),
            'profile' => $profile['nama_user'],
            'foto' => $profile['foto'],
        ];
        return view('instansi/v_Instansi', $data);
    }

    //--------------------------------------------------------------------
    public function add()
    {
        if (!$this->validate([
            'nama_instansi' => [
                'rules' =>
                'required|is_unique[tbl_instansi.nama_instansi]',
            ]
        ])) {
            session()->setFlashdata('pesan-error', 'tidak boleh kosong atau sama !');
            return redirect()->to(base_url('instansi'));
        }
        $data = [
            'nama_instansi' => $this->request->getPost('nama_instansi'),
        ];
        $this->InstansiModel->add($data);
        session()->setFlashdata('pesan', 'Data berhasil di tambahkan');
        return redirect()->to(base_url('instansi'));
    }
    // --------------------------------------------------------------------
    public function edit($id_instansi)
    {
        if (!$this->validate([
            'nama_instansi' => [
                'rules' =>
                'required|is_unique[tbl_instansi.nama_instansi]',
            ]
        ])) {
            session()->setFlashdata('pesan-error', 'tidak boleh kosong atau sama !');
            return redirect()->to(base_url('instansi'));
        }
        $data = [
            'id_instansi' => $id_instansi,
            'nama_instansi' => $this->request->getPost('nama_instansi'),
        ];
        $this->InstansiModel->edit($data);
        session()->setFlashdata('pesan', 'Data berhasil di ubah');
        return redirect()->to(base_url('instansi'));
    }
    // --------------------------------------------------------------------
    public function laporan_instansi()
    {
        $profile = $this->UserModel->detail_data(session()->get('id_user'));
        $data = [
            'title' => 'Laporan instansi',
            'instansi' => $this->InstansiModel->all_data(),
            'profile' => $profile['nama_user'],
            'foto' => $profile['foto'],
        ];

        return view('instansi/v_laporan', $data);
    }
    // --------------------------------------------------------------------
    public function hapus($id_instansi)
    {
        $data = [
            'id_instansi' => $id_instansi,
        ];

        $arsip = $this->ArsipModel->all_data_instansi($id_instansi);

        foreach ($arsip as $a) {
            unlink('file_upload/' . $a['file_arsip']);
        }

        $this->ArsipModel->hapusAI($data);

        $this->InstansiModel->hapus($data);

        session()->setFlashdata('pesan', 'Data berhasil di hapus');
        return redirect()->to(base_url('instansi'));
    }
}
