<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Kategori extends BaseController
{
    public function index()
    {
        $data = [
            'judul' => 'Kategori',
            'page' => 'v_kategori',
        ];
        return view('v_template', $data);
    }
}
