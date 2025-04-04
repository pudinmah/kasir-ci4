<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelKategori;
use CodeIgniter\HTTP\ResponseInterface;

class Kategori extends BaseController
{

    public function __construct()
    {
        $this->ModelKategori = new ModelKategori();
    }

    public function index()
    {
        $data = [
            'judul' => 'Master Data',
            'subjudul' => 'Kategori',
            'menu' => 'masterdata',
            'submenu' => 'kategori',
            'page' => 'v_kategori',
            'kategori' => $this->ModelKategori->AllData(),
        ];
        return view('v_template', $data);
    }

    public function InsertData()
    {
        $data = ['nama_kategori' => $this->request->getPost('nama_kategori')];
        $this->ModelKategori->InsertData($data);
        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan !!');
        return redirect()->to('kategori');
    }

    public function Update($id_kategori)
    {
        $data = [
            'id_kategori'   => $id_kategori, // Pastikan ID diambil dari parameter
            'nama_kategori' => $this->request->getPost('nama_kategori')
        ];

        // dd($data);

        $this->ModelKategori->UpdateData($data);

        session()->setFlashdata('pesan', 'Data Berhasil DiUpdate !!');
        return redirect()->to('kategori');
    }

    public function Delete($id_kategori)
    {
        $this->ModelKategori->DeleteData($id_kategori);
        session()->setFlashdata('pesan', 'Data Berhasil Dihapus!');
        return redirect()->to('kategori');
    }
}
