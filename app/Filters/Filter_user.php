<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class Filter_user implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        if (session()->get('log') != true) {

            session()->setFlashdata('pesan', 'Anda belum login');
            return redirect()->to(base_url('auth'));
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        if (session()->get('level') == 2) {
            return redirect()->to(base_url('home'));
        }
    }
}
