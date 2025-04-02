<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelProduk;
use CodeIgniter\HTTP\ResponseInterface;

class Produk extends BaseController
{
    public function __construct()
    {
        $this->ModelProduk = new ModelProduk();
    }

    public function index()
    {
        $data = [
            'judul' => 'Master Data',
            'subjudul' => 'Produk',
            'menu' => 'masterdata',
            'submenu' => 'produk',
            'page' => 'v_produk',
            'produk' => $this->ModelProduk->AllData(),
        ];
        return view('v_template', $data);
    }

    public function InsertData()
    {
        $data = ['nama_produk' => $this->request->getPost('nama_produk')];
        $this->ModelProduk->InsertData($data);
        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan !!');
        return redirect()->to('produk');
    }

    public function Update($id_produk)
    {
        $data = [
            'id_produk'   => $id_produk, // Pastikan ID diambil dari parameter
            'nama_produk' => $this->request->getPost('nama_produk')
        ];

        // dd($data);

        $this->ModelProduk->UpdateData($data);

        session()->setFlashdata('pesan', 'Data Berhasil DiUpdate !!');
        return redirect()->to('produk');
    }

    public function Delete($id_produk)
    {
        $this->ModelProduk->DeleteData($id_produk);
        session()->setFlashdata('pesan', 'Data Berhasil Dihapus!');
        return redirect()->to('produk');
    }
}
