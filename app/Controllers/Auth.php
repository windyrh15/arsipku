<?php

namespace App\Controllers;

use App\Models\AuthModel;

class Auth extends BaseController
{
    protected $AuthModel;
    public function __construct()
    {
        $this->AuthModel = new AuthModel();
    }
    public function index()
    {
        $data = [
            'title' => 'Arsipku | Login',
        ];
        return view('auth/v_login', $data);
    }
    public function login()
    {
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');
        if ($email && $password == !null) {
            $cek = $this->AuthModel->login($email);
            if ($cek == !null) {
                if (password_verify($password, $cek['password'])) {
                    if ($cek) {
                        session()->set('log', true);
                        session()->set('id_user', $cek['id_user']);
                        session()->set('nama_user', $cek['nama_user']);
                        session()->set('email', $cek['email']);
                        session()->set('level', $cek['level']);
                        session()->set('foto', $cek['foto']);
                        session()->set('id_jabatan', $cek['id_jabatan']);
                        return redirect()->to(base_url('home'));
                    }
                } else {
                    session()->setFlashdata('errors', 'password yang anda masukan salah');
                    return redirect()->to(base_url())->withInput();
                }
            } else {
                session()->setFlashdata('errors', 'Email yang anda masukan tidak terdaftar');
                return redirect()->to(base_url())->withInput();
            }
        } else {
            session()->setFlashdata('errors', 'email dan password tidak boleh kosong');
            return redirect()->to(base_url())->withInput();
        }
    }
    // -----------------------------------------------------------------------------------------
    public function email()
    {
        $data = [
            'title' => 'Arsipku | Lupa Password',
        ];
        return view('auth/v_forgot', $data);
    }

    public function cekEmail()
    {
        $getEmail = $this->request->getPost('email');
        if ($getEmail == !null) {
            $cek = $this->AuthModel->detail($getEmail);
            if ($cek == null) {
                session()->setFlashdata('pesan-error', 'E-mail tidak terdaftar');
                return redirect()->to(base_url('auth/email'));
            } elseif ($getEmail == $cek['email']) {
                session()->setFlashdata('pesan', 'E-mail terdaftar');
                return redirect()->to(base_url('auth/pin/' . $getEmail));
            }
        } else {
            session()->setFlashdata('pesan-error', 'E-mail tidak boleh kosong');
            return redirect()->to(base_url('auth/email'));
        }
    }

    public function pin($getEmail)
    {
        $cek = $this->AuthModel->detail($getEmail);
        if ($cek == null) {
            return redirect()->to(base_url('auth/index'));
        }
        $data = [
            'title' => 'Arsipku | Lupa Password',
            'email' => $getEmail,
        ];
        return view('auth/v_cekpin', $data);
    }

    public function cekPin()
    {
        $getEmail = $this->request->getPost('email');
        $getpin = $this->request->getPost('pin');
        $cek = $this->AuthModel->detail($getEmail);
        if ($cek == null) {
            return redirect()->to(base_url('auth/index'));
        }
        if (password_verify($getpin, $cek['pin'])) {
            $data = [
                'title' => 'Arsipku | Lupa Password',
                'email' =>  $getEmail,
            ];
            return view('auth/v_forgotpass', $data);
        } else {
            session()->setFlashdata('pesan-error', 'Pin salah');
            return redirect()->to(base_url('auth/pin/' . $getEmail));
        }
    }
    // ---------------------------------------------------------------- Forgot password
    public function updatePasswordView($email)
    {
        $data = [
            'title' => 'Arsipku | Lupa Password',
            'email' => $email,
        ];

        return view('auth/v_forgotpass', $data);
    }

    public function updatePassword()
    {
        $email = $this->request->getPost('email');
        $password1 = $this->request->getPost('password1');
        $password2 = $this->request->getPost('password2');
        if ($password2 != $password1) {
            session()->setFlashdata('errors', 'Konfirmasi password tidak sesuai, Coba lagi!');
            return redirect()->to(base_url('auth/index'));
        } elseif (empty($password1 && $password2)) {
            session()->setFlashdata('errors', 'Password gagal diubah');
            return redirect()->to(base_url('auth/index'));
        } else {
            $data = [
                'email' => $email,
                'password' => password_hash($password1, PASSWORD_DEFAULT),
            ];
            $this->AuthModel->edit($data);
            session()->setFlashdata('pesan', 'Password berhasil diubah');
            return redirect()->to(base_url('auth/index'));
        }
    }
    // send email -----------------------------------------------------------------------
    public function sendEmailView()
    {
        $data = [
            'title' => 'Arsipku | Forgot password',
        ];
        return view('auth/v_sendemail', $data);
    }
    
    public function sendEmail()
    {

    $emailUser = $this->request->getPost('email');

    if($emailUser != null){
    $cek = $this->AuthModel->detail($emailUser);
    if ($cek == null) {
        session()->setFlashdata('errors', 'E-mail tidak terdaftar');
        return redirect()->to(base_url('auth'));
    } else {
        $email = \Config\Services::email();

        
        // Konfigurasi email
        $email->setTo($emailUser);
        $email->setFrom('loremipsum1556@gmail.com', 'ArsipKu.com');
        $email->setSubject('Tes Sending Email');

        // Buat tautan dengan parameter emailUser
        $resetLink = base_url('auth/updatePasswordView/' . $emailUser);

        // Buat pesan email dengan tautan
        $emailMessage = "Klik tautan berikut untuk mengubah password Anda: <a href='$resetLink'>$resetLink</a>";

        // Set pesan email
        $email->setMessage($emailMessage);

        // Kirim email
        if ($email->send()) {
            echo 'Email berhasil dikirim.';
        } else {
            $data = $email->printDebugger(['headers']);
            print_r($data);
        }

        session()->setFlashdata('pesan', 'E-mail terdaftar dan pesan berhasil terkirim !');
        return redirect()->to(base_url('auth'));
}
    }else{
        session()->setFlashdata('errors', 'E-mail tidak boleh kosong');
        return redirect()->to(base_url('auth'));
    }
    }
    // End-PR-----------------------------PR----------------------------PR---------------

    //--------------------------------------------------------------------
    public function logout()
    {
        session()->remove('log');
        session()->remove('nama_user');
        session()->remove('email');
        session()->remove('level');
        session()->remove('foto');
        session()->remove('id_jabatan');
        session()->setFlashdata('logout', 'Anda sudah logout');
        return redirect()->to(base_url('auth'));
    }
}
