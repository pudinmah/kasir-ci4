<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelPenjualan;
use CodeIgniter\HTTP\ResponseInterface;

class Penjualan extends BaseController
{
    public function __construct()
    {
        $this->ModelPenjualan = new ModelPenjualan();
    }
    public function index()
    {
        $data = [
            'judul' => 'Penjualan',
            'no_faktur' => $this->ModelPenjualan->NoFaktur(),           
        ];
        return view('v_penjualan', $data);
    }
}
