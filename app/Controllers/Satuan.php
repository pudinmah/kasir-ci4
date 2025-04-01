<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelSatuan;
use CodeIgniter\HTTP\ResponseInterface;

class Satuan extends BaseController
{
    public function __construct()
    {
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

    public function InsertData()
    {
        $data = ['nama_satuan' => $this->request->getPost('nama_satuan')];
        $this->ModelSatuan->InsertData($data);
        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan !!');
        return redirect()->to('satuan');
    }

    public function Update($id_satuan)
    {
        $data = [
            'id_satuan'   => $id_satuan, // Pastikan ID diambil dari parameter
            'nama_satuan' => $this->request->getPost('nama_satuan')
        ];

        // dd($data);

        $this->ModelSatuan->UpdateData($data);

        session()->setFlashdata('pesan', 'Data Berhasil DiUpdate !!');
        return redirect()->to('satuan');
    }

    public function Delete($id_satuan)
    {
        $this->ModelSatuan->DeleteData($id_satuan);
        session()->setFlashdata('pesan', 'Data Berhasil Dihapus!');
        return redirect()->to('satuan');
    }
}
