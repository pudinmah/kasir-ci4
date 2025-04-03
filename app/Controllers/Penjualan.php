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

    public function CekProduk()
    {
        $kode_produk = $this->request->getPost('kode_produk');
        $produk = $this->ModelPenjualan->CekProduk($kode_produk);
        $data = [
            'nama_produk'   => $produk['nama_produk'] ?? '',
            'nama_kategori' => $produk['nama_kategori'] ?? '',
            'nama_satuan'   => $produk['nama_satuan'] ?? '',
            'harga_jual'    => $produk['harga_jual'] ?? '',
        ];
        echo json_encode($data);
    }
}
