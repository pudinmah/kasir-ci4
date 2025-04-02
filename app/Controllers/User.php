<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelUser;
use CodeIgniter\HTTP\ResponseInterface;

class User extends BaseController
{
    public function __construct()
    {
        $this->ModelUser = new ModelUser();
    }

    public function index()
    {
        $data = [
            'judul' => 'User',
            'subjudul' => 'user',
            'menu' => 'masterdata',
            'submenu' => 'user',
            'page' => 'v_user',
            'user' => $this->ModelUser->AllData(),
        ];
        return view('v_template', $data);
    }

    public function InsertData()
    {
        $data = [
            'nama_user' => $this->request->getPost('nama_user'),
            'email' => $this->request->getPost('email'),
            'password' => sha1($this->request->getPost('password')),
            'level' => $this->request->getPost('level'),
        ];

        $this->ModelUser->InsertData($data);

        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan !!');
        return redirect()->to('user');
    }

    public function Update($id_user)
    {
        $data = [
            'id_user'   => $id_user, // Pastikan ID diambil dari parameter
            'nama_user' => $this->request->getPost('nama_user'),
            'email' => $this->request->getPost('email'),
            'level' => $this->request->getPost('level'),
        ];

        // dd($data);

        $this->ModelUser->UpdateData($data);

        session()->setFlashdata('pesan', 'Data Berhasil DiUpdate !!');
        return redirect()->to('user');
    }

    public function Delete($id_user)
    {
        $this->ModelUser->DeleteData($id_user);
        session()->setFlashdata('pesan', 'Data Berhasil Dihapus!');
        return redirect()->to('user');
    }
}
