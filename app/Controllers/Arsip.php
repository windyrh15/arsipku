<?php

namespace App\Controllers;

use App\Models\ArsipModel;
use App\Models\KategoriModel;
use App\Models\JabatanModel;
use App\Models\InstansiModel;
use App\Models\UserModel;

class Arsip extends BaseController
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
        $profile = $this->UserModel->detail_data(session()->get('id_user'));
        $string = $nama_instansi;
        $newString = preg_replace("/[^a-zA-Z]/", " ", $string);
        $newString2 = preg_replace("/[^0-9]/", " ", $string);
        $newString3 = substr($newString2, -1);
        $data = [
            'title' => 'Arsip | Instansi | ' . $newString . ' ' . $newString3,
            'nama' => $string,
            'id_instansi' => $id_instansi,
            'arsip' => $this->ArsipModel->all_data_instansi($id_instansi),
            'profile' => $profile['nama_user'],
            'foto' => $profile['foto'],
        ];


        return view('arsip/v_arsip', $data);
    }
    // -------------------------------------------------------------Tambah data
    public function add($id_instansi, $nama)
    {
        $profile = $this->UserModel->detail_data(session()->get('id_user'));
        $data = [
            'title' => 'Arsip | tambah data',
            'nama' => $nama,
            'id_instansi' => $id_instansi,
            'validation' => \Config\Services::validation(),
            // 'arsip' => $this->ArsipModel->all_data(),
            'kategori' => $this->KategoriModel->all_data(),
            'profile' => $profile['nama_user'],
            'foto' => $profile['foto'],
        ];

        return view('arsip/v_add', $data);
    }

    public function tambah()
    {
        if ($this->validate([
            'nama_file' => [
                'label'  => 'nama_file',
                'rules'  => 'required|is_unique[tbl_arsip.nama_file]',
                'errors' => [
                    'required' => 'Nama arsip wajib di isi',
                    'is_unique' => 'Nama arsip sudah ada',
                ]
            ],
            'id_kategori' => [
                'label'  => 'id_kategori',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Pilih salah satu kategori arsip',
                ],
            ],
            'file_arsip' => [
                'label'  => 'file_arsip',
                'rules' => 'uploaded[file_arsip]|max_size[file_arsip,102400]|ext_in[file_arsip,7z,zip,pdf,docx,jpg,jpeg,png,wav,mp3,mp4,wma,wmv]',
                'errors' => [
                    'uploaded' => 'Harus ada file yang diupload',
                    'max_size' => 'Ukuran gambar terlalu besar (max 100mb)',
                    'ext_in' => 'Format file tidak sesuai dengan ketentuan!',
                ],
            ],
        ])) {

            $id_instansi = sprintf("%03s", $this->request->getPost('id_instansi'));
            $kategori = sprintf("%03s", $this->request->getPost('id_kategori'));
            $tanggal = $this->request->getPost('date');
            $namaRandom = $this->request->getPost('namdom');
            $no_arsip = $id_instansi . $kategori . $tanggal . $namaRandom;

            $fileArsip = $this->request->getFile('file_arsip');
            $namaArsip = $fileArsip->getRandomName();
            $namaArsip2 = $id_instansi . $kategori . $tanggal . '-' . $namaArsip;

            $size = $fileArsip->getSize('kb');
            $pecah = explode(".", $namaArsip);
            $tipeFile = $pecah[1];

            $deskripsi = $this->request->getPost('deskripsi');
            if ($deskripsi == '') {
                $newDeskripsi = 'Tidak ada deskripsi';
            } else {
                $newDeskripsi = $deskripsi;
            }

            $data = [
                'id_kategori' => $this->request->getPost('id_kategori'),
                'nama_file' => $this->request->getPost('nama_file'),
                'deskripsi' => $newDeskripsi,
                'no_arsip' => $no_arsip,
                'tgl_upload' => date('Y-m-d'),
                'tgl_update' => date('Y-m-d'),
                'id_jabatan' => session()->get('id_jabatan'),
                'id_user' => session()->get('id_user'),
                'id_instansi' => $this->request->getPost('id_instansi'),
                'size_file' => $size,
                'file_arsip' =>  $namaArsip2,
                'tipe_file' => $tipeFile,
            ];

            $fileArsip->move('file_upload', $namaArsip2);
            $this->ArsipModel->add($data);

            session()->setFlashdata('pesan', 'Data berhasil ditambahkan');
            return redirect()->to(base_url('arsip/berkas/' . $this->request->getPost('id_instansi') . '/' . $this->request->getPost('nama')));
        } else {
            return redirect()->to(base_url('arsip/add/' . $this->request->getPost('id_instansi') . '/' . $this->request->getPost('nama')))->withInput();
        }
    }

    // ------------------------------------------------------------------- Edit
    public function edit($id_arsip, $id_instansi, $nama)
    {
        $profile = $this->UserModel->detail_data(session()->get('id_user'));
        $data = [
            'title' => 'Arsip | Edit Data Arsip',
            'id_instansi' => $id_instansi,
            'nama' => $nama,
            'validation' => \Config\Services::validation(),
            'arsip' => $this->ArsipModel->detail_data($id_arsip),
            'kategori' => $this->KategoriModel->all_data(),
            'profile' => $profile['nama_user'],
            'foto' => $profile['foto'],
        ];
        return view('arsip/v_edit', $data);
    }
    public function ubah($id_arsip, $id_instansi)
    {
        $nama = $this->request->getPost('nama');
        if ($this->validate([
            'nama_file' => [
                'label'  => 'nama_file',
                'rules'  => 'is_unique[tbl_arsip.nama_file]',
                'errors' => [
                    'is_unique' => 'Nama arsip tidak boleh sama',
                ],
            ],
            'file_arsip' => [
                'label'  => 'file_arsip',
                'rules' => 'max_size[file_arsip,102400]|ext_in[file_arsip,7z,zip,pdf,docx,jpg,jpeg,png,wav,mp3,mp4,wma,wmv]',
                'errors' => [
                    'max_size' => 'Ukuran gambar terlalu besar (max 100mb)',
                    'ext_in' => 'Format file tidak sesuai dengan ketentuan!',
                ],
            ],
        ])) {

            $fileArsip = $this->request->getFile('file_arsip');

            $size = $fileArsip->getSize('kb');

            if ($fileArsip->getError() == 4) {
                $namaArsip = $this->request->getPost('fileLama');
                $newSize = $this->request->getPost('sizeLama');
            } else {
                $namaArsip = $fileArsip->getRandomName();
                $newSize = $size;
                $fileArsip->move('file_upload', $namaArsip);
                unlink('file_upload/' . $this->request->getPost('fileLama'));
            }

            $deskripsi = $this->request->getPost('deskripsi');
            if ($deskripsi == '') {
                $newDeskripsi = 'Tidak ada deskripsi';
            } else {
                $newDeskripsi = $deskripsi;
            }
            $pecah = explode(".", $namaArsip);
            $tipeFile = $pecah[1];

            if ($this->request->getPost('nama_file') == null) {
                $data = [
                    'id_arsip' => $id_arsip,
                    'id_kategori' => $this->request->getPost('id_kategori'),
                    'deskripsi' => $newDeskripsi,
                    'no_arsip' => $this->request->getPost('no_arsip'),
                    'tgl_update' => date('Y-m-d'),
                    'id_jabatan' => session()->get('id_jabatan'),
                    'id_user' => session()->get('id_user'),
                    'size_file' => $newSize,
                    'file_arsip' => $namaArsip,
                    'tipe_file' => $tipeFile,
                ];
            } else {
                $data = [
                    'id_arsip' => $id_arsip,
                    'id_kategori' => $this->request->getPost('id_kategori'),
                    'nama_file' => $this->request->getPost('nama_file'),
                    'deskripsi' => $newDeskripsi,
                    'no_arsip' => $this->request->getPost('no_arsip'),
                    'tgl_update' => date('Y-m-d'),
                    'id_jabatan' => session()->get('id_jabatan'),
                    'id_user' => session()->get('id_user'),
                    'size_file' => $newSize,
                    'file_arsip' => $namaArsip,
                    'tipe_file' => $tipeFile,
                ];
            }
            $this->ArsipModel->edit($data);
            session()->setFlashdata('pesan', 'Data berhasil ubah');
            return redirect()->to(base_url('arsip/berkas/' . $id_instansi . '/' . $nama));
        } else {
            return redirect()->to(base_url('arsip/edit/' . $id_arsip . '/' . $id_instansi . '/' . $nama))->withInput();
        }
    }
    // -----------------------------------------------------------------------------Hapus
    public function hapus($id_arsip, $id_instansi, $nama)
    {
        $data = [
            'id_arsip' => $id_arsip,
        ];

        $arsip = $this->ArsipModel->detail_data($id_arsip);

        unlink('file_upload/' . $arsip['file_arsip']);


        $this->ArsipModel->hapus($data);
        session()->setFlashdata('pesan', 'Data berhasil di hapus');
        return redirect()->to(base_url('arsip/berkas/' . $id_instansi . '/' . $nama));
    }
    // --------------------------------------------------------------- preview
    public function preview($id_arsip, $nama)
    {
        $profile = $this->UserModel->detail_data(session()->get('id_user'));
        $data = [
            'title' => 'Preview Arsip',
            'arsip' => $this->ArsipModel->detail_data($id_arsip),
            'profile' => $profile['nama_user'],
            'foto' => $profile['foto'],
            'nama' => $nama,
        ];

        return view('arsip/v_pview', $data);
    }
    // -------------------------------------------------------------- Laporan
    public function laporan($id_instansi, $nama_instansi)
    {
        $profile = $this->UserModel->detail_data(session()->get('id_user'));
        $string = $nama_instansi;
        $newString = preg_replace("/[^a-zA-Z]/", " ", $string);
        $newString2 = preg_replace("/[^0-9]/", " ", $string);
        $newString3 = substr($newString2, -1);
        $data = [
            'title' => 'Arsip | Folder | ' . $newString . ' ' . $newString3,
            'nama' => $newString . '' . $newString3,
            'id_instansi' => $id_instansi,
            'arsip' => $this->ArsipModel->all_data_instansi($id_instansi),
            'profile' => $profile['nama_user'],
            'foto' => $profile['foto'],
        ];

        return view('arsip/v_laporan', $data);
    }
    // ------------------------------------------------------------------------------
    public function laporan_all()
    {
        $profile = $this->UserModel->detail_data(session()->get('id_user'));
        $data = [
            'title' => 'All Data Arsip',
            'arsip' => $this->ArsipModel->all_data_instansi2(),
            'profile' => $profile['nama_user'],
            'foto' => $profile['foto'],
        ];

        return view('arsip/v_laporan_all', $data);
    }
    // -------------------------------------------------------------- Download
    public function downloadData($id_arsip, $file_arsip)
    {
        $profile = $this->ArsipModel->detail_data($id_arsip);
        return $this->response->download('file_upload/' . $file_arsip, null)->setFileName($profile['file_arsip']);
    }
}
