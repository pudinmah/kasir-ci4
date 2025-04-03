<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Penjualan extends BaseController
{
    public function index()
    {
        $data = [
            'judul' => 'Master Data',
            'subjudul' => 'Penjualan',
            'menu' => 'masterdata',
            'submenu' => 'penjualan',
            // 'satuan' => $this->ModelSatuan->AllData(),
        ];
        return view('v_penjualan', $data);
    }
}
