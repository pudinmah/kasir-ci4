<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class FilterKasir implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        if (!session()->has('level') || empty(session()->get('level'))) {
            return redirect()->to(base_url('login'))->with('gagal', 'Anda harus login terlebih dahulu!');;
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        if (session()->has('level') && session()->get('level') === "2") {
            return redirect()->to(base_url('penjualan'));
        }

        return $response;
    }
}
