<?php

namespace App\Controllers;

use App\Models\ArsipModel;
use App\Models\KategoriModel;
use App\Models\JabatanModel;
use App\Models\UserModel;
use App\Models\InstansiModel;

class ArsipUser extends BaseController
{

    protected $ArsipModel;
    protected $KategoriModel;
    protected $JabatanModel;
    protected $UserModel;
    protected $InstansiModel;
    public function __construct()
    {
        $this->ArsipModel = new ArsipModel();
        $this->KategoriModel = new KategoriModel();
        $this->JabatanModel = new JabatanModel();
        $this->UserModel = new UserModel();
        $this->InstansiModel = new InstansiModel();
    }
    // ------------------------------------------------------------index
    public function index()
    {
        $profile = $this->UserModel->detail_data(session()->get('id_user'));
                $data = [
                    'title' => 'Arsip | Instansi',
                    'instansi' => $this->InstansiModel->all_data(),
                    'profile' => $profile['nama_user'],
                    'foto' => $profile['foto'],
                ];

                return view('arsip/v_index', $data);
    }
    // -------------------------------------------------------------Berkas
    public function berkas($id_instansi, $nama_instansi)
    {
        $string = $nama_instansi;
        $newString = preg_replace("/[^a-zA-Z]/", " ", $string);
        $newString2 = preg_replace("/[^0-9]/", " ", $string);
        $newString3 = substr($newString2, -1);
        $profile = $this->UserModel->detail_data(session()->get('id_user'));
        $data = [
            'title' => 'Arsip | Folder | ' . $newString . ' ' . $newString3,
            'nama' => $string,
            'id_instansi' => $id_instansi,
            'arsip' => $this->ArsipModel->all_data_instansi($id_instansi),
            'profile' => $profile['nama_user'],
            'foto' => $profile['foto'],
        ];

        return view('arsip/v_arsip', $data);
    }
    // ----------------------------------------------------------preview
    public function preview($id_arsip, $nama)
    {
        $profile = $this->UserModel->detail_data(session()->get('id_user'));
        $data = [
            'title' => 'Preview Arsip',
            'arsip' => $this->ArsipModel->detail_data($id_arsip),
            'profile' => $profile['nama_user'],
            'nama' => $nama,
            'foto' => $profile['foto'],
        ];

        return view('arsip/v_pview', $data);
    }
    public function downloadData($id_arsip, $file_arsip)
    {
        $profile = $this->ArsipModel->detail_data($id_arsip);
        $noArsip1 = $profile['no_arsip'];
        $noArsip2 = substr($noArsip1, 0, 10);
        return $this->response->download('file_upload/' . $file_arsip, null)->setFileName($noArsip2 . $profile['nama_file'] . '.' . $profile['tipe_file']);
    }
}
