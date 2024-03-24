<?php

namespace App\Controllers;

use \App\Models\UserModel;
use \App\Models\JabatanModel;

class UserProfile extends BaseController
{
    protected $UserModel;
    protected $JabatanModel;

    public function __construct()
    {
        $this->UserModel = new UserModel();
        $this->JabatanModel = new JabatanModel();
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

    //--------------------------------------------------------------------

}
