<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelKategori;
use App\Models\ModelProduk;
use App\Models\ModelSatuan;
use CodeIgniter\HTTP\ResponseInterface;

class Produk extends BaseController
{
    public function __construct()
    {
        $this->ModelProduk = new ModelProduk();
        $this->ModelKategori = new ModelKategori();
        $this->ModelSatuan = new ModelSatuan();
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
            'kategori' => $this->ModelKategori->AllData(),
            'satuan' => $this->ModelSatuan->AllData(),
        ];
        return view('v_template', $data);
    }

    public function InsertData()
    {
        if ($this->validate([
            'kode_produk' => [
                'label' => 'Kode Produk / Barcode',
                'rules' => 'required|is_unique[tbl_produk.kode_produk]',
                'errors' => [
                    'is_unique' => '{field} Sudah Ada, Masukkan Kode Lain !!',
                ]
            ],
            'id_satuan' => [
                'label' => 'Satuan',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Belum Dipilih !!',
                ]
            ],
            'id_kategori' => [
                'label' => 'Kategori',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Belum Dipilih !!',
                ]
            ]
        ])) {
            $hargabeli = str_replace(",", "", $this->request->getPost('harga_beli'));
            $hargajual = str_replace(",", "", $this->request->getPost('harga_jual'));

            $data = [
                'kode_produk' => $this->request->getPost('kode_produk'),
                'nama_produk' => $this->request->getPost('nama_produk'),
                'id_kategori' => $this->request->getPost('id_kategori'),
                'id_satuan' => $this->request->getPost('id_satuan'),
                'harga_beli' => $hargabeli,
                'harga_jual' => $hargajual,
                'stok' => $this->request->getPost('stok'),
            ];

            $this->ModelProduk->InsertData($data);
            session()->setFlashdata('pesan', 'Data Berhasil Di Tambahkan !!!');
            return redirect()->to(base_url('produk'));
        } else {
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('produk'))->withInput('validation', \Config\Services::validation());
        }
    }

    public function Update($id_produk)
    {
        if ($this->validate([
            'id_satuan' => [
                'label' => 'Satuan',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Belum Dipilih !!',
                ]
            ],
            'id_kategori' => [
                'label' => 'Kategori',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Belum Dipilih !!',
                ]
            ]
        ])) {
            $hargabeli = str_replace(",", "", $this->request->getPost('harga_beli'));
            $hargajual = str_replace(",", "", $this->request->getPost('harga_jual'));

            $data = [
                'id_produk'   => $id_produk,
                'nama_produk' => $this->request->getPost('nama_produk'),
                'id_kategori' => $this->request->getPost('id_kategori'),
                'id_satuan' => $this->request->getPost('id_satuan'),
                'harga_beli' => $hargabeli,
                'harga_jual' => $hargajual,
                'stok' => $this->request->getPost('stok'),
            ];

            $this->ModelProduk->UpdateData($data);
            session()->setFlashdata('pesan', 'Data Berhasil Di Update !!!');
            return redirect()->to(base_url('produk'));
        } else {
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('produk'))->withInput('validation', \Config\Services::validation());
        }
    }

    public function Delete($id_produk)
    {
        $data = [
            'id_produk' => $id_produk
        ];

        $this->ModelProduk->DeleteData($data);

        session()->setFlashdata('pesan', 'Data Berhasil Dihapus!');
        return redirect()->to('produk');
    }
}
