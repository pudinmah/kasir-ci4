<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelSatuan;
use CodeIgniter\HTTP\ResponseInterface;

class Satuan extends BaseController
{
    public function __construct() {
        $this->ModelSatuan = new ModelSatuan();
    }

    public function index()
    {
        $data = [
            'judul' => 'Master Data',
            'subjudul' => 'satuan',
            'menu' => 'masterdata',
            'submenu' => 'satuan',
            'page' => 'v_satuan',
            'satuan' => $this->ModelSatuan->AllData(),
        ];
        return view('v_template', $data);
    }
}
