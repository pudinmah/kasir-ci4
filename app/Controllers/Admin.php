<?php

namespace App\Controllers;

use App\Models\ModelAdmin;

class Admin extends BaseController
{
    public function __construct()
    {
        $this->ModelAdmin = new ModelAdmin();
    }
    public function index(): string
    {
        $data = [
            'judul' => 'Dashboard',
            'subjudul' => 'dashboard',
            'menu' => 'dashboard',
            'submenu' => 'setting',
            'page' => 'v_admin',
        ];
        return view('v_template', $data);
    }

    public function setting(): string
    {
        $data = [
            'judul' => 'Setting',
            'subjudul' => 'setting',
            'menu' => 'setting',
            'submenu' => 'setting',
            'page' => 'v_setting',
            'setting' => $this->ModelAdmin->DetailData(),

        ];
        return view('v_template', $data);
    }

    public function Update()
    {
        $data = [
            'id'   => 1,
            'nama_toko' => $this->request->getPost('nama_toko'),
            'slogan' => $this->request->getPost('slogan'),
            'alamat' => $this->request->getPost('alamat'),
            'no_telepon' => $this->request->getPost('no_telepon'),
            'deskripsi' => $this->request->getPost('deskripsi'),

        ];

        $this->ModelAdmin->UpdateData($data);
        session()->setFlashdata('pesan', 'Data Berhasil Di Update !!!');
        return redirect()->to(base_url('setting'));
    }
}
