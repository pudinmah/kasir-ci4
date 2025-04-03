<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class FilterAdmin implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        if (!session()->has('level') || empty(session()->get('level'))) {
            return redirect()->to(base_url('login'))->with('gagal', 'Anda harus login terlebih dahulu!');;
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        if (session()->has('level') && session()->get('level') === "1") {
            return redirect()->to(base_url('admin/dashboard'));
        }

        return $response;
    }
}
