<?php

namespace App\Controllers;

use \App\Models\UserModel;
use \App\Models\JabatanModel;

class User extends BaseController
{
    protected $JabatanModel;
    protected $UserModel;

    public function __construct()
    {
        $this->UserModel = new UserModel();
        $this->JabatanModel = new JabatanModel();
    }
    //--------------------------------------------------------------------index
    public function index()
    {
        $profile = $this->UserModel->detail_data(session()->get('id_user'));
        $data = [
            'title' => 'User',
            'user' => $this->UserModel->all_data(),
            'profile' => $profile['nama_user'],
            'foto' => $profile['foto'],
        ];
        return view('user/v_index', $data);
    }


    //--------------------------------------------------------------------Tambah Data
    public function add()
    {
        $profile = $this->UserModel->detail_data(session()->get('id_user'));
        $data = [
            'title' => 'Arsipku | Tambah Data User',
            'validation' => \Config\Services::validation(),
            'jabatan' => $this->JabatanModel->all_data(),
            'profile' => $profile['nama_user'],
            'foto' => $profile['foto'],
        ];
        return view('user/v_add', $data);
    }

    public function tambah()
    {
        if ($this->validate([
            'nama_user' => [
                'label'  => 'nama_user',
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Nama user wajib di isi',
                ]
            ],
            'email' => [
                'label'  => 'email',
                'rules'  => 'required|is_unique[tbl_user.email]',
                'errors' => [
                    'required' => '{field} wajib di isi',
                    'is_unique' => '{field} sudah ada, gunakan {field} lain',
                ]
            ],
            'password' => [
                'label'  => 'Password',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} wajib di isi',
                ]
            ],
            'password2' => [
                'label'  => 'Password Konfirmasi',
                'rules'  => 'required|matches[password]',
                'errors' => [
                    'required' => '{field} wajib di isi',
                    'matches' => '{field} tidak sesuai',
                ]
            ],
            'level' => [
                'label'  => 'level',
                'rules'  => 'required',
                'errors' => [
                    'required' => 'pilih salah satu {field} yang tersedia',
                ]
            ],
            'id_jabatan' => [
                'label'  => 'id_dep',
                'rules'  => 'required',
                'errors' => [
                    'required' => 'pilih salah satu jabatan yang tersedia',
                ]
            ],
            'foto' => [
                'label'  => 'foto',
                'rules' => 'max_size[foto,2048]|is_image[foto]|mime_in[foto,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran gambar terlalu besar (max 2mb)',
                    'is_image' => 'Yang anda pilih bukan gambar',
                    'mime_in' => 'Format file yang boleh diupload (jpg/jpeg/png)',
                ],
            ],
        ])) {
            $filefoto = $this->request->getFile('foto');
            if ($filefoto->getError() == 4) {
                $namafoto = 'user.jpg';
            } else {
                $namafoto = $filefoto->getRandomName();
                $filefoto->move('img', $namafoto);
            }
            $data = [
                'nama_user' => $this->request->getPost('nama_user'),
                'email' => $this->request->getPost('email'),
                'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
                'level' => $this->request->getPost('level'),
                'id_jabatan' => $this->request->getPost('id_jabatan'),
                'foto' => $namafoto,
            ];
            $this->UserModel->add($data);

            session()->setFlashdata('pesan', 'Data berhasil ditambahkan');
            return redirect()->to(base_url('user'));
        } else {
            return redirect()->to(base_url('user/add'))->withInput();
        }
    }

    // -------------------------------------------------------------------------------Edit

    public function edit($id_user)
    {
        $profile = $this->UserModel->detail_data(session()->get('id_user'));
        $data = [
            'title' => 'Arsipku | Edit Data User',
            'validation' => \Config\Services::validation(),
            'user' => $this->UserModel->detail_data($id_user),
            'jabatan' => $this->JabatanModel->all_data(),
            'profile' => $profile['nama_user'],
            'foto' => $profile['foto'],
        ];
        return view('user/v_edit', $data);
    }

    public function ubah($id_user)
    {
        if ($this->validate([
            'nama_user' => [
                'label'  => 'nama_user',
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Nama user wajib di isi',
                ]
            ],
            'level' => [
                'label'  => 'level',
                'rules'  => 'required',
                'errors' => [
                    'required' => 'pilih salah satu {field} yang tersedia',
                ]
            ],
            'id_jabatan' => [
                'label'  => 'id_dep',
                'rules'  => 'required',
                'errors' => [
                    'required' => 'pilih salah satu jabtan yang tersedia',
                ]
            ],
            'id_jabatan' => [
                'label'  => 'id_dep',
                'rules'  => 'required',
                'errors' => [
                    'required' => 'pilih salah satu jabtan yang tersedia',
                ]
            ],
            'foto' => [
                'label'  => 'foto',
                'rules' => 'max_size[foto,2048]|is_image[foto]|mime_in[foto,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran gambar terlalu besar (max 2mb)',
                    'is_image' => 'Yang anda pilih bukan gambar',
                    'mime_in' => 'Format file yang boleh diupload (jpg/jpeg/png)',
                ],
            ],
        ])) {
            $filefoto = $this->request->getFile('foto');
            if ($filefoto->getError() == 4) {
                $namafoto = $this->request->getPost('fotoLama');
            } else {
                $fotoLama = $this->request->getPost('fotoLama');
                $namafoto = $filefoto->getRandomName();
                $filefoto->move('img', $namafoto);
                if ($fotoLama != 'user.jpg') {
                    unlink('img/' . $this->request->getPost('fotoLama'));
                }
            }
            if (empty($this->request->getPost('password1'))) {
                $data = [
                    'id_user' => $id_user,
                    'nama_user' => $this->request->getPost('nama_user'),
                    // 'email' => $this->request->getPost('email'),
                    // 'password' => $this->request->getPost('password'),
                    'level' => $this->request->getPost('level'),
                    'id_jabatan' => $this->request->getPost('id_jabatan'),
                    'foto' => $namafoto,
                ];

                $this->UserModel->edit($data);
                session()->setFlashdata('pesan', 'Data berhasil ubah');
                return redirect()->to(base_url('user'));
            } elseif (!empty($this->request->getPost('password1'))) {
                $password = $this->request->getPost('password1') == $this->request->getPost('password2');
                if ($password == true) {
                    $data = [
                        'id_user' => $id_user,
                        'nama_user' => $this->request->getPost('nama_user'),
                        // 'email' => $this->request->getPost('email'),
                        'password' => password_hash($this->request->getPost('password1'), PASSWORD_DEFAULT),
                        'level' => $this->request->getPost('level'),
                        'id_jabatan' => $this->request->getPost('id_jabatan'),
                        'foto' => $namafoto,
                    ];

                    $this->UserModel->edit($data);
                    session()->setFlashdata('pesan', 'Data berhasil ubah');
                    return redirect()->to(base_url('user'));
                } else {
                        session()->setFlashdata('pesan-error-password', 'Konfirmasi password sesuai!');
                        return redirect()->to(base_url('user/edit/' . $id_user))->withInput();
                }
            }
        } else {
            return redirect()->to(base_url('user/edit/' . $id_user))->withInput();
        }
    }

    // -----------------------------------------------------------------------------------------------
    public function editProfile()
    {
        $profile = $this->UserModel->detail_data(session()->get('id_user'));
        $data = [
            'title' => 'Arsipku | Edit Profile',
            'validation' => \Config\Services::validation(),
            'user' => $this->UserModel->detail_data(session()->get('id_user')),
            'jabatan' => $this->JabatanModel->all_data(),
            'profile' => $profile['nama_user'],
            'foto' => $profile['foto'],
        ];
        return view('user/v_profile', $data);
    }
    public function ubahProfile($id_user)
    {
        if ($this->validate([
            'nama_user' => [
                'label'  => 'nama_user',
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Nama user wajib di isi',
                ]
            ],
            'foto' => [
                'label'  => 'foto',
                'rules' => 'max_size[foto,2048]|mime_in[foto,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran gambar terlalu besar (max 2mb)',
                    'mime_in' => 'Format file yang boleh diupload (jpg/jpeg/png)',
                ],
            ],
        ])) {
            $filefoto = $this->request->getFile('foto');
            if ($filefoto->getError() == 4) {
                $namafoto = $this->request->getPost('fotoLama');
            } else {
                $fotoLama = $this->request->getPost('fotoLama');
                $namafoto = $filefoto->getRandomName();
                $filefoto->move('img', $namafoto);
                if ($fotoLama != 'user.jpg') {
                    unlink('img/' . $this->request->getPost('fotoLama'));
                }
            }

            if (empty($this->request->getPost('password'))) {
                $data = [
                    'id_user' => $id_user,
                    'nama_user' => $this->request->getPost('nama_user'),
                    // 'password' => $this->request->getPost('password'),
                    'foto' => $namafoto,
                ];

                $this->UserModel->edit($data);
                session()->setFlashdata('pesan', 'Profile berhasil ubah');
                return redirect()->to(base_url('home'));
            }elseif (!empty($this->request->getPost('password'))) {
                $userDetail = $this->UserModel->detail_data($id_user);
                $password = password_verify($this->request->getPost('password'), $userDetail['password']);

                if ($password == true) {
                    $passwordbaru = $this->request->getPost('password1');
                    if (strlen($passwordbaru) == 0) {
                        session()->setFlashdata('pesan-error', 'Password baru dan konfirmasi password tidak diisi, gagal mengubah profile');
                        return redirect()->to(base_url('home'));
                    } elseif (strlen($passwordbaru) != 0) {
                        $passwordBaru = $this->request->getPost('password1') == $this->request->getPost('password2');
                        if ($passwordBaru == true) {
                            $data = [
                                'id_user' => $id_user,
                                'nama_user' => $this->request->getPost('nama_user'),
                                'password' => password_hash($this->request->getPost('password1'), PASSWORD_DEFAULT),
                                'foto' => $namafoto,
                            ];

                            $this->UserModel->edit($data);
                            session()->setFlashdata('pesan', 'Profile berhasil ubah');
                            return redirect()->to(base_url('home'));
                        } else {
                            session()->setFlashdata('pesan-error', 'Konfirmasi password tidak sama');
                            return redirect()->to(base_url('home'));
                        }
                    } else {
                        session()->setFlashdata('pesan-error', 'password tidak sesuai');
                        return redirect()->to(base_url('home'));
                    }
                } else {
                    session()->setFlashdata('pesan-error', 'password salah');
                    return redirect()->to(base_url('home'));
                }
            } else {
                session()->setFlashdata('pesan-error', 'Nama tidak boleh kosong dan format foto harus jpg,jpeg,png (max 2mb)');
                return redirect()->to(base_url('home'));
            }
        } else {
            session()->setFlashdata('pesan-error', 'Nama tidak boleh kosong dan format foto harus jpg,jpeg,png (max 2mb)');
            return redirect()->to(base_url('home'));
        }
    }
    // ------------------------------------------------------------------------------Laporan
    public function laporan_user()
    {
        $profile = $this->UserModel->detail_data(session()->get('id_user'));
        $data = [
            'title' => 'Laporan user',
            'user' => $this->UserModel->all_data(),
            'profile' => $profile['nama_user'],
            'foto' => $profile['foto'],
        ];

        return view('user/v_laporan', $data);
    }
    // ------------------------------------------------------------------------------Hapus
    public function hapus($id_user)
    {
        $data = [
            'id_user' => $id_user,
        ];

        $user = $this->UserModel->detail_data($id_user);

        if ($user['foto'] != 'user.jpg') {
            unlink('img/' . $user['foto']);
        }

        $this->UserModel->hapus($data);
        session()->setFlashdata('pesan', 'Data berhasil di hapus');
        return redirect()->to(base_url('user'));
    }
}
